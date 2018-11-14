<?php
require('./util/shortuid.php');
session_start();

class device_act extends spController
{
	function info(){

		$table = spClass('device');
		$list = $table->findAll();
		echo json_encode($list);
	}
	
	function owner(){
		$token = $this->spArgs("token");
		$uid = $this->spArgs("uid");
		if( strlen($token)>0 )
		 	session_id ($token);
		$uid = $_SESSION['uid'];
		if(strlen($uid)<=0){
			$ret = array("success"=>false, "cause"=>"invalid login");
			echo json_encode($ret);
			return;
		}
		$sql = "select o.id as oid,o.uid,  d.name, d.url, o.life, o.produce, o.sn, if( o.life>0,o.power,0) as power, o.status 
			from device_owner o, device d 
			where d.id=o.did and o.uid= ".$uid;
		$list = spClass('device')->findSql($sql);
		
		
		//echo json_encode($list);
		$ret = array("success"=>true, "info"=>$list);
		echo json_encode($ret);
		return;
	}
	
	function money_v1(){
		$token = $this->spArgs("token");
		$uid = $this->spArgs("uid");
		if( strlen($token)>0 )
		 	session_id ($token);
		$uid = $_SESSION['uid'];
		if(strlen($uid)<=0){
			$ret = array("success"=>false, "cause"=>"invalid login");
			echo json_encode($ret);
			return;
		}
		
		$sql = "select DATE_FORMAT(digtime,'%y年%m月%d日 %H时') as hours,sum(power) as sum_power,sum(money) as sum_money, '挖矿' as source from device_money
				where uid = $uid
				group by hours
				ORDER BY hours";
		$list = spClass('device')->findSql($sql);
		
		//echo json_encode($list);
		$ret = array("success"=>true, "power"=>99,"info"=>$list);
		echo json_encode($ret);
		return;
	}
	
	function money(){
		$token = $this->spArgs("token");
		$uid = $this->spArgs("uid");
		if( strlen($token)>0 )
		 	session_id ($token);
		$uid = $_SESSION['uid'];
		if(strlen($uid)<=0){
			$ret = array("success"=>false, "cause"=>"invalid login");
			echo json_encode($ret);
			return;
		}  
		$curr = date("Y-m-d H:i:s");
		$last = date("Y-m-d H:i:s", time()-86400*3);
		$sql = "select DATE_FORMAT(logtime,'%y年%m月%d日 %H:%i') as hours, coin as sum_money, cause as source from history_user_coin
				where logtime<'".$curr."' and logtime>'".$last."' and uid = $uid 
				ORDER BY logtime desc ";	//limit 50
		$list = spClass('device')->findSql($sql);
		$newlist = array();
		foreach($list as $item){
			$item['source'] = str_replace("package dealed","成功購買計劃",$item['source']);
			$item['source'] = str_replace("mine","礦機挖礦",$item['source']);
			$item['source'] = str_replace("member","商會會員收入",$item['source']);
			$item['source'] = str_replace("recommend","推薦會員收入",$item['source']);
			$item['source'] = str_replace("promt","系統",$item['source']);
			$item['source'] = str_replace("uorder","訂購礦機",$item['source']);
			$item['sum_money'] = round(floatval($item['sum_money']),10);
			$newlist[] = $item;
		}
		$cond = array('id'=>$uid);
		$user = spClass('user')->find($cond);
		$power = round(floatval($user['power']),2);
		//echo json_encode($list);
		$ret = array("success"=>true, "power"=>$power,"info"=>$newlist);
		echo json_encode($ret);
		return;
	}
	
	function check($uid){
		
	}
	function buy(){
		$token = $this->spArgs("token");
		$uid = $this->spArgs("uid");
		if( strlen($token)>0 )
		 	session_id ($token);
		$uid = $_SESSION['uid'];
		if(strlen($uid)<=0){
			$ret = array("success"=>false, "cause"=>"用戶未登陸，請登陸");
			echo json_encode($ret);
			return;
		}
		
		//未认证，不能购买
		$table = spClass('user');
		$cond = array('id'=>$uid);
		$item = $table->find($cond);
		if(!$item){
			$ret = array("success"=>false, "cause"=>"用戶未註冊，請註冊用戶");
			die(json_encode($ret));
		}
		$user_own_money = floatval($item['money']);
		if( $item['status']=='invalid' ){
			$ret = array("success"=>false, "cause"=>"用戶未認證，請認證后購買");
			die(json_encode($ret));
		}
		
		$content = file_get_contents('php://input');
		file_put_contents("order_log.txt",$content.PHP_EOL,FILE_APPEND);
		
		$obj = json_decode($content,TRUE);
		if( strlen($content)<=0 || !is_array($obj) || count($obj)<=0){
			$ret = array("success"=>false, "cause"=>"请输入参数内容");
			echo json_encode($ret);
			return;
		}
		
		$all_price = 0;
		$all_descr = "";
		$new_list = array();
		foreach($obj as $item){
			$did = intval($item['id']);
			$num = intval($item['num']);
			$cond = array('id'=>$did);
			$info = spClass('device')->find($cond);
			if(!info){
				$ret = array("success"=>false, "cause"=>"該礦機已停止發售，請購買其他礦機");
				die(json_encode($ret));
			}
			$price = $num*floatval($info['price']);
			$descr = $info['name']."X".$num;
			$all_price = $all_price + $price;
			$all_descr = $all_descr.$descr.";";
			
			//new json info
			$new_item = array("did"=>$did,"num"=>$num);
			$new_list[] = $new_item;
		}
		$order_no = "D".date('mdHis').rand(10,99);
		
		$ret = array("success"=>true, "price"=>$all_price, "order"=>$order_no);
		//echo json_encode($ret);
		
		$content = json_encode(array("type"=>"device", "info"=>$new_list, "uid"=>$uid));
		//创建订单
		$item = array("no"=>$order_no, "type"=>"礦機購買", "content"=>$content, "price"=>$all_price, "coin"=>0, "uid"=>$uid, "createtime"=>date("Y-m-d H:i:s"), "state"=>"create", "descr"=>$all_descr);
		$oid = spClass('uorder')->create($item);
		
		//查看用戶餘額
		if( $user_own_money<$all_price ){
		
			//创建消息中心
			$content = "你的訂單號 $order_no 已經成功下單，因帳號中的BRC不足，請聯絡客服處理";
			$item = array("uid"=>$uid, "froms"=>"order", "content"=>$content ,"sendtime"=>date("Y-m-d H:i:s"), "status"=>"init");
			spClass('message')->create($item);
			
			//
			$ret = array("success"=>true, "price"=>$all_price, "order"=>$order_no, "display"=>"帳號中的BRC不足，請聯絡客服處理");
			echo json_encode($ret);
		}else{
			//直接扣費
			$refer = "購買礦機，賬戶餘額扣除，訂單號:".$order_no;
			$content = json_encode(array('type'=>'uorder','info'=>$item));
			$item = array("logtime"=>date('Y-m-d H:i:s'), "uid"=>$uid, "coin"=>$all_price*-1, "cause"=>"uorder", "info"=>$content, "refer"=>$refer);
			spClass('history_user_coin')->create($item);
			
			//update to finish status
			$cond = array('id'=>$oid);
			spClass('uorder')->updateField($cond, 'state', "finish");
			
			//bind a device to user
			$url="http://".$_SERVER['HTTP_HOST']."/io/?c=order_act&a=update_order&oid=".$oid;
    		$content = file_get_contents($url);
			file_put_contents("order_log.txt","UpdateOrder - ".$url.PHP_EOL.$content.PHP_EOL,FILE_APPEND);
			
			$ret = array("success"=>true, "price"=>$all_price, "order"=>$order_no, "display"=>"已扣除你賬戶BRC，并為你分配礦機");
			echo json_encode($ret);
			
			//update money
			$url="http://localhost:8000/io/?c=useraction&a=update_alluser_money";
			$content = file_get_contents($url);
		}
		return;
	}
	
	function bind_device_user(){
		$uid = intval($this->spArgs("uid"));
		$info = urldecode($this->spArgs("info"));
		$obj = json_decode($info, TRUE);
		//check info
		if($uid<=0 || strlen($info)<=0){
			$ret = array("success"=>false, "cause"=>"ERROR INFO");
			echo json_encode($ret);
			return;
		}
		//device array
		foreach($obj as $item){
			$did = intval($item['did']);
			$num = intval($item['num']);
			if($did<=0) continue;
			$cond = array('id'=>$did);
			$info = spClass('device')->find($cond);
			if(!info) continue;
			$life = intval($info['life']);
			$power = floatval($info['power']);
			$produce = floatval($info['produce']);
			
			$refer = $this->spArgs("refer");
			while($num>0){
				$new = array("uid"=>$uid, "did"=>$did, "power"=>$power, "produce"=>$produce, "life"=>$life, 
							"start"=>date('Y-m-d H:i:s'), 'status'=>'6月26日開始運作',"refer"=>"訂單號：".$refer);//挖礦中..
				$id = spClass('device_owner')->create($new);
			
				$cond = array("id"=>$id);
				echo json_encode($cond);
				$uuid = shortuid($id);
				spClass('device_owner')->updateField($cond, 'sn', $uuid);
				$num--;
			}
		}
		$this->update_power_user_mgroup($uid);
		return;
		
		//update total
		$sql = "update `user` u set power = (
					select sum(o.power) as sum_pow from device_owner o
					where  o.life>0 and o.uid=$uid)
				where id=$uid ;";
		spClass('user')->runSql($sql);
		
		//update mgroup
		$item = spClass('user')->find(array('id'=>$uid));
		if(!$item) return;
		$gid = $item['gid'];
		$sql = "update mgroup m set m.power= (
					select sum(u.power) as sum_pow from user u
					where u.gid=$gid)
				where m.id=$gid ;";
		spClass('user')->runSql($sql);
	}
	function update_power_user_mgroup($uid){
		
		//update total
		$sql = "update `user` u set power = (
					select sum(o.power) as sum_pow from device_owner o
					where  o.life>0 and o.uid=$uid)
				where id=$uid ;";
		spClass('user')->runSql($sql);
		
		//update mgroup
		$item = spClass('user')->find(array('id'=>$uid));
		if(!$item) return;
		$gid = $item['gid'];
		$sql = "update mgroup m set m.power= (
					select sum(u.power) as sum_pow from user u
					where u.gid=$gid)
				where m.id=$gid ;";
		spClass('user')->runSql($sql);
	}
	function create_device_user(){
		$id=intval($this->spArgs("device_own_id"));
		if($id<=0){
			return;
		}
		
		$table = spClass('device_owner');
		$cond = array('id'=>$id);
		$item = $table->find($cond);
		if(!$item){
			return;
		}
		$did = $item['did'];
		$uid = $item['uid'];
		
		$device = spClass('device')->find(array('id'=>$did));
		if(!$device){
			return;
		}
		if( $item['status']=='壽命已到，已停止' )
		{
			$device['power'] = 0;
			$device['life'] = 0;
		}
		$uuid = shortuid($id);
		$table->updateField($cond, 'status', '新創建');
		$table->updateField($cond, 'power', $device['power']);
		$table->updateField($cond, 'life',  $device['life']);
		$table->updateField($cond, 'produce',  $device['produce']);
		$table->updateField($cond, 'sn', $uuid);
		if( strlen($item['start'])<=0 )
			$table->updateField($cond, 'start', date('Y-m-d H:i:s'));
			
		$starttime = '2018-06-26'; 
        $tmstamp = strtotime($starttime);
		$time = time();
		if($time<$tmstamp)
			$table->updateField($cond, 'status', '6月26日開始運作');

		//up user power
		$sql = "update `user` u set power = (
					select sum(o.power) as sum_pow from device_owner o
					where  o.life>0 and o.uid=$uid)
				where id=$uid ;";
		spClass('user')->runSql($sql);
		
		$this->update_power_user_mgroup($uid);
		return;
	}
	function update_device_user(){
		$id=intval($this->spArgs("device_own_id"));
		if($id<=0){
			return;
		}
		$table = spClass('device_owner');
		$cond = array('id'=>$id);
		$item = $table->find($cond);
		if(!$item){
			return;
		}
		if( $item['status']=='壽命已到，已停止' )
		{
			$table->updateField($cond, 'power', 0);
			$table->updateField($cond, 'life', 0);
			
			$this->update_power_user_mgroup($uid);
			return;
		}
	}
}
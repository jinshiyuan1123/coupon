<?php

namespace App\Http\Controllers\Wap;

use App\Http\Controllers\Api\ApiClientController;
use App\Http\Controllers\Member\PtController;
use App\Http\Controllers\Web\WebBaseController;
use App\Models\Api;
use App\Models\BankCard;
use App\Models\BlackListIp;
use App\Models\DailiMoneyLog;
use App\Models\Dividend;
use App\Models\Drawing;
use App\Models\GameList;
use App\Models\GameRecord;
use App\Models\Member;
use App\Models\MemberDailiApply;
use App\Models\MemberLoginLog;
use App\Models\Recharge;
use App\Models\SystemConfig;
use App\Models\SystemNotice;
use App\Models\TcgGameList;
use App\Models\Transfer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\ValidationTrait;
use App\Models\Coupons;
use App\Models\Couponsbusiness;
use App\Models\ScoreLog;
use App\Models\MomentsClass;
use App\Models\Moments;
use App\Models\Dianzan;
use App\Models\Userecord;
use App\Models\Momentssms;
use App\Models\Couponsmiandanuser;
use App\Models\Couponsmiandan;
use App\Models\Couponsshop;
use App\Models\Couponsshopuser;
use Auth;
use Hash;
use App\Models\Activity;
use Session;
class IndexController extends WebBaseController
{
    use ValidationTrait;
    //首页
    public function index()
    {
		$time=date("Y-m-d h:i:s",time());
		$coupons_business=Couponsbusiness::Where('status',1)->Where('begintime','<=',$time)->Where('endtime','>=',$time)->orderBy('created_at', 'desc')->paginate(config('web.page-size'));
        $system_notices = SystemNotice::where('on_line', 0)->orderBy('sort', 'asc')->orderBy('created_at', 'desc')->get();
        return view('wap.index', compact('system_notices','coupons_business'));
    }  
   //朋友圈
    public function moments()
    {
        $data=Moments::Where('statu',1)->orderBy('created_at', 'desc')->paginate(config('web.page-size'));
		for($i=0;$i<count($data);$i++){
			$MomentsClassname = MomentsClass::find($data[$i]['cnameid']);
			$Member = Member::find($data[$i]['uid']);
			$data[$i]['MomentsClassname']=$MomentsClassname->cname;
			$data[$i]['headpic']=$Member->headpic;
			$data[$i]['nichen']=$Member->nichen;
			if($data[$i]['imgurl']!=''){
			$data[$i]['imgurl']=explode(',',$data[$i]['imgurl']);
			$data[$i]['imgurltotal']=count($data[$i]['imgurl']);				
			}else{
				$data[$i]['imgurltotal']=0;
			}

		}
		if($this->getMember()){
		$arrayzan=$this->getMember()->zan;
		$arrayzan=explode(',',$arrayzan);
		}else{
			$arrayzan=array();
		}
        return view('wap.moments', compact('data','arrayzan'));
    }
	//点赞
    public function zan($id)
    {
      if(!$this->getMember()){
		  $msg=1;
	  }
	  $getMemberzan=$this->getMember()->zan;
	  if(is_null($getMemberzan) || $getMemberzan==''){
		  $getMemberzan=array();
	  }else{
		  $getMemberzan=explode(',',$getMemberzan);
	  }	  
      $getMemberzan1='';
	  $Dianzan=Dianzan::Where('momentsid',$id)->Where('uid',$this->getMember()->id)->pluck('id')->toArray();
	  if($Dianzan){
		  //存在点赞则删除
		  Dianzan::destroy($Dianzan[0]);
		  $msg=2;
		  //移除会员的点赞
		  if(in_array($id, $getMemberzan)){
			 
			$key = array_search($id, $getMemberzan);
			 
			if ($key !== false){
			 
			  array_splice($getMemberzan, $key, 1);
			 
			}
	       }
           $getMemberzan1=implode(",",$getMemberzan);		   
	  }else{
		  
		  //不存在则添加
        Dianzan::create([
            'momentsid' => $id,
            'uid' => $this->getMember()->id
        ]);		
        $msg=3;	
		  if(!in_array($id, $getMemberzan)){
			 $getMemberzan1=$this->getMember()->zan.','.$id;
	       }		
	  }
	  $Member= Member::findOrFail($this->getMember()->id);
               $Member->update([
                    'zan' => $getMemberzan1
                ]);
	  $zan=Dianzan::Where('momentsid',$id)->pluck('id')->toArray();;
	  $zan=count($zan);	  
	  $Moments= Moments::findOrFail($id);
               $Moments->update([
                    'zan' => $zan
                ]);
	  $return=([
	     'zan'=>$zan,
		 'msg'=>$msg
	  ]);
      return  $return;
    }
    public function nav()
    {
		$member = $this->getMember();
		$time=time();
		$notice=Coupons::where('uid',$member['id'])->where('begintime','<',$time)->where('endtime','>',$time)->where('status','=',0)->get();
		for($i=0;$i<count($notice);$i++){
			if($notice[$i]['type']==0){
				$notice[$i]['notice']='满减';
			}
			if($notice[$i]['type']==1){
				$notice[$i]['notice']='折扣';
			}	
			if($notice[$i]['type']==2){
				$notice[$i]['notice']='免单';
			}			
		}
        return view('wap.nav', compact('member','notice'));
    }
    //免单中心
    public function activity_list()
    {
		$time=date("Y-m-d h:i:s",time());
		$coupons_miandan=Couponsmiandan::Where('status',1)->Where('begintime','<=',$time)->Where('endtime','>=',$time)->orderBy('created_at', 'desc')->paginate(config('web.page-size'));

        return view('wap.activity_list', compact('coupons_miandan'));
    }
    public function activity_shop()
    {
		$coupons_shop=Couponsshop::Where('status',1)->orderBy('created_at', 'desc')->paginate(config('web.page-size'));

        return view('wap.activity_shop', compact('coupons_shop'));
    }
    public function activity_hb()
    {
		$time=date("Y-m-d h:i:s",time());
		$coupons_miandan=Couponsmiandan::Where('status',1)->Where('begintime','<=',$time)->Where('endtime','>=',$time)->orderBy('created_at', 'desc')->paginate(config('web.page-size'));

        return view('wap.activity_hb', compact('coupons_miandan'));
    }	
    public function activity_list_id($id)
    {
		$activity_list_id=Couponsmiandan::find($id);
        return view('wap.activity_list_info', compact('activity_list_id'));
    }
    public function postactivity_list_id($id)
    {
		$score=$this->getMember()->score;
		$uid=$this->getMember()->id;
		$datacrad=Couponsmiandan::find($id);  
	    if($datacrad['score']>$score)
			return responseWrong('您的积分不足');
		//检测是否有领取过
		$ispay=Couponsmiandanuser::Where('uid',$uid)->pluck('id')->toArray();
		if(count($ispay)>0){
			return responseWrong('您已领取过该免单劵');
		}
	  $Member= Member::findOrFail($uid);
               $Member->update([
                    'score' => ($score-$datacrad['score'])
                ]);
        $code=$time;				
		//写入免单数据
        Couponsmiandanuser::create([
		    'uid' => $uid,
            'couponsmiandanid' => $id,
            'businessname' => $datacrad['businessname'],
            'term' => $datacrad['term'],
            'decrease' => $datacrad['decrease'],
            'begintime' => $datacrad['begintime'],
            'endtime' => $datacrad['endtime'],
			'tel' => $datacrad['tel'],
			'score' => $datacrad['score'],
			'code'=>$code,
            'address' => $datacrad['address']
        ]);		
		//写入积分使用数据
		$explan='兑换了'.$datacrad['decrease'].'元免单劵';
		ScoreLog::create([
            'uid' => $this->getMember()->id,
            'score' => -$datacrad['score'],
            'explain' => $explan
        ]);	
       return responseSuccess('','兑换成功', route('wap.mycard'));
    }	
    public function activity_shop_id($id)
    {
		$activity_shop_id=Couponsshop::find($id);
        return view('wap.activity_shop_info', compact('activity_shop_id'));
    }
    public function postactivity_shop_id($id)
    {
		$score=$this->getMember()->score;
		$uid=$this->getMember()->id;
		$datacrad=Couponsshop::find($id);
		if(is_null($this->getMember()->address1) || is_null($this->getMember()->address2) || is_null($this->getMember()->address3) || is_null($this->getMember()->address4))
        return responseWrong('您的收货地址不完整，请先填写收货地址');  		
        if($datacrad['score']>$score)
			return responseWrong('您的积分不足');

	  $Member= Member::findOrFail($uid);
               $Member->update([
                    'score' => ($score-$datacrad['score'])
                ]);		
		//写入订单数据
        Couponsshopuser::create([
		    'uid' => $uid,
            'couponsshopid' => $id,
            'shoptitle' => $datacrad['shoptitle'],
            'score' => $datacrad['score'],
            'imgurl' => $datacrad['imgurl'],
            'tel' => $datacrad['tel'],
            'address' => $datacrad['address'],
			'info' => $datacrad['info']
        ]);		
		//写入积分使用数据
		$explan='兑换了商品【'.$datacrad['shoptitle'].'】';
		ScoreLog::create([
            'uid' => $this->getMember()->id,
            'score' => -$datacrad['score'],
            'explain' => $explan
        ]);	
       return responseSuccess('','兑换成功', route('wap.mycard'));
    }	
    public function activity_hb_id($id)
    {
		$activity_list_id=Couponsmiandan::find($id);
        return view('wap.activity_hb_info', compact('activity_list_id'));
    }	
    public function activity_detail($id)
    {
        $data = Activity::findOrFail($id);

        return view('wap.activity_detail', compact('data'));
    }

    //pt 真人游戏列表
    public function pt_live_game_list()
    {
        $data = TcgGameList::where('productCode', 'PT')->where('on_line', 0)->where('gameType', 'LIVE')->orderBy('sort', 'asc')->get();

        return view('wap.pt.live_game_list', compact('data'));
    }

    public function png_rng_game_list()
    {
        $data = TcgGameList::where('productCode', 'PNG')->where('client_type', 'html5')->where('on_line', 0)->where('gameType', 'RNG')->orderBy('sort', 'asc')->get();

        return view('wap.png.rng_game_list', compact('data'));
    }

    public function ttg_rng_game_list()
    {
        $data = TcgGameList::where('productCode', 'TTG')->where('client_type', 'html5')->where('on_line', 0)->where('gameType', 'RNG')->orderBy('sort', 'asc')->get();

        return view('wap.ttg.rng_game_list', compact('data'));
    }

    public function gg_rng_game_list()
    {
        $data = TcgGameList::where('productCode', 'GG')->where('client_type', 'html5')->where('on_line', 0)->where('gameType', 'RNG')->orderBy('sort', 'asc')->get();

        return view('wap.gg.rng_game_list', compact('data'));
    }

    public function pt_rng_game_list()
    {
        return view('wap.pt.rng_game_list');
    }

    public function dt_rng_game_list()
    {
        return view('wap.dt.rng_game_list');
    }

    //ag 电子游戏列表
    public function ag_eGame_list()
    {
        return view('wap.ag.eGame_list');
    }

    //mg 电子游戏列表
    public function mg_eGame_list()
    {
        return view('wap.mg.eGame_list');
    }

    public function login()
    {
        return view('wap.login');
    }

    public function register(Request $request)
    {
        $i_code = $request->get('i');

        return view('wap.register', compact('i_code'));
    }

    public function postRegister(Request $request)
    {
        if(session('milkcaptcha') != $request->get('captcha'))
            return responseWrong('验证码错误');

        $validator = $this->verify($request, 'wap.register');

        if ($validator->fails())
        {
            $messages = $validator->messages()->toArray();
            return responseWrong($messages);
        }

        //验证ip
        if (in_array($request->getClientIp(), BlackListIp::pluck('ip')->toArray()))
            return responseWrong('该ip限制，请联系客服');

        //必须以字母开头
        /*if (!preg_match('/^[a-z]+$/', substr((string)$request->get('name'),0,1)) || !preg_match('/^[0-9a-z]+$/', $request->get('name')))
            return responseWrong('用户名只能以小写字母开头且字母数字组合');
*/
         if (!preg_match('/^[0-9]+$/', $request->get('name')))
            return responseWrong('账号只能为11位数字的手机号码');
            if (session('phone_v_code') != $request->get('code'))
                return responseWrong('手机验证码错误 ');
       /* if(strlen((string)$request->get('qk_pwd')) != 6)
            return responseWrong('取款密码为6位纯数字');
*/
        $data = $request->all();

        $dali_mod = '';//判断域名
        $do_main = $_SERVER['HTTP_HOST'];

        Member::create([
            'name' => $data['name'],
            'password' => bcrypt($data['password']),
            'original_password' => substr(md5(md5($data['name'])), 0,10),
            'o_password' => $data['password'],
            'invite_code' => getRandom(7),
            'nichen' => $data['nichen'],
			'phone' => $data['name'],
            'register_ip' => $request->getClientIp()
        ]);

        if (Auth::guard('member')->attempt(['name' => $request->name, 'password' => $request->password]))
        {
            $member = auth('member')->user();
            $member->last_session = Session::getId();
            $member->save();
            MemberLoginLog::create([
                'member_id' => $member->id,
                'ip' => $request->getClientIp()
            ]);
            return responseSuccess('', '登录成功', route('wap.index'));
        }

        return responseSuccess('','注册成功', route('wap.login'));
    }

    //个人中心
    public function userinfo(Request $request)
    {
        $api_mod= Api::where('on_line', 0)->orderBy('created_at', 'desc')->get();
        return view('wap.userinfo', compact('api_mod'));
    }
    //我的动态
    public function mymoments(Request $request)
    {
		if(!$this->getMember()){
			 return view('wap.login');
		}
        $data=Moments::Where('uid',$this->getMember()->id)->orderBy('created_at', 'desc')->paginate(config('web.page-size'));
		for($i=0;$i<count($data);$i++){
			$MomentsClassname = MomentsClass::find($data[$i]['cnameid']);
			$Member = Member::find($data[$i]['uid']);
			$data[$i]['MomentsClassname']=$MomentsClassname->cname;
			$data[$i]['headpic']=$Member->headpic;
			$data[$i]['nichen']=$Member->nichen;
			if($data[$i]['imgurl']!=''){
			$data[$i]['imgurl']=explode(',',$data[$i]['imgurl']);
			$data[$i]['imgurltotal']=count($data[$i]['imgurl']);				
			}else{
				$data[$i]['imgurltotal']=0;
			}

		}
		$arrayzan=$this->getMember()->zan;
		$arrayzan=explode(',',$arrayzan);		
        return view('wap.mymoments',compact('data','arrayzan'));
    }
    public function mymomentsc($id)
    {
		if(!$this->getMember()){
			 return view('wap.login');
		}
          $data=Moments::find($id);
		if(!$data){
			return responseWrong('系统错误');
		}
			$MomentsClassname = MomentsClass::find($data->cnameid);
			$Member = Member::find($data->uid);
			$data->MomentsClassname=$MomentsClassname->cname;
			$data->headpic=$Member->headpic;
			$data->nichen=$Member->nichen;
			if($data->imgurl!=''){
			$data->imgurl=explode(',',$data->imgurl);
			$data->imgurltotal=count($data->imgurl);				
			}else{
				$data->imgurltotal=0;
			}
           //留言
		   $Momentssms=Momentssms::Where('momentsid',$id)->orderBy('created_at', 'desc')->paginate(config('web.page-size'));
		   for($i=0;$i<count($Momentssms);$i++){
			   $MomentssmsMember = Member::find($Momentssms[$i]['uid']);
			   $Momentssms[$i]['nichen']=$MomentssmsMember->nichen;			   
		   }   
		$arrayzan=$this->getMember()->zan;
		$arrayzan=explode(',',$arrayzan);			
        return view('wap.mymomentsc',compact('data','arrayzan','Momentssms'));
    }
    public function postmymomentsc(Request $request)
    {
		$data=Moments::find($request->get('momentsid'));
		if(!$data){
			return responseWrong('系统错误');
		}else{
			if($request->get('content')==''){
				return responseWrong('请填写留言内容');
			}
			if(mb_strlen($request->get('content'),'UTF8')>100){
				return responseWrong('留言不能多于100个字');
			}
            Momentssms::create([
                'momentsid' => $request->get('momentsid'),
                'uid' => $this->getMember()->id,
				'content'=>$request->get('content')
            ]);	
			 $message=$data->message+1;
               $data->update([
                    'message' => $message
                ]);			
             return responseSuccess('','留言成功', route('wap.mymomentsc', ['id' => $request->get('momentsid')]));			
		}
        
    }
    public function delectmymoments($id)
    {
		 $data=Moments::find($id);
		 if(!$data){
			return responseWrong('系统错误'); 
		 }
		 if($data->uid!=$this->getMember()->id){
			return responseWrong('系统错误');  
		 }
		 Moments::destroy($id);
		 //删除留言
		 $Momentssms=Momentssms::where('momentsid',$id)->pluck('id')->toArray();
		 foreach($Momentssms as $v){
			 Moments::destroy($v);
		 }
		 //删除赞
		 Dianzan::destroy($id);
		 $Momentssms=Dianzan::where('momentsid',$id)->pluck('id')->toArray();
		 foreach($Momentssms as $v){
			 Dianzan::destroy($v);
		 }
         return responseSuccess('','删除成功', route('wap.mymoments'));
        
    }	
    //发布动态
    public function releasemoments(Request $request)
    {
        $MomentsClass=MomentsClass::orderBy('id', 'asc')->get();
        return view('wap.release_moments',compact('MomentsClass'));
    }
    public function postreleasemoments(Request $request)
    {
		if(!$request->get('momentsclass') || $request->get('momentsclass')=='')
		return responseWrong('动态分类不能为空！');
		if(!$request->has('inputimages') && $request->get('content')=='')
		return responseWrong('请添加动态内容');	
	    $inputimages='';
	    if($request->has('inputimages')){
			if(count($request->get('momentsclass'))>9)
			return responseWrong('图片上传错误！');	
           foreach($request->get('inputimages') as $v){
			   if($inputimages==''){
				   $inputimages=$v;
			   }else{
				   $inputimages=$inputimages.','.$v;
			   }
		   }	
		}
            Moments::create([
                'uid' => $this->getMember()->id,
				'cnameid' => $request->get('momentsclass'),
				'content' => $request->get('content'),
                'imgurl' => $inputimages
            ]);
        return responseSuccess('','发布成功', route('wap.mymoments'));
    }		
	//我的留言
    public function mymessage(Request $request)
    {
        $data=Moments::Where('uid',$this->getMember()->id)->orderBy('created_at', 'desc')->paginate(config('web.page-size'));
		for($i=0;$i<count($data);$i++){
			$mymessage=Momentssms::Where('momentsid',$data[$i]['id'])->orderBy('created_at', 'desc')->get();
			for($k=0;$k<count($mymessage);$k++){
				$nichen=Member::find($mymessage[$k]['uid']);
				$mymessage[$k]['nichen']=$nichen->nichen;
			}
			$data[$i]['mymessage']=$mymessage;
		}
        return view('wap.mymessage',compact('data'));
    }	
    //商家
    public function agent()
    {
		$time=date("Y-m-d",time());
		$bt=$time.' 00:00:00';
		$et=$time.' 23:59:59';
		$userecord=Userecord::Where('businessid',$this->getMember()->id)->Where('created_at','>=',$bt)->Where('created_at','<=',$et)->orderBy('created_at', 'desc')->get();
		$todaymoney = 0;
		foreach($userecord as $item){
		  $todaymoney +=$item['businessimoney'];
		}	     
	   return view('wap.agent',compact('todaymoney'));
    }
    public function ad()
    {
        return view('wap.ad');
    }	
    public function card()
    {
		$data=Couponsbusiness::Where('businessid',$this->getMember()->id)->orderBy('created_at', 'desc')->paginate(config('web.page-size'));
        return view('wap.card',compact('data'));
    }
	public function addcard()
    {
		$cn_begin='';
		$cn_end='';
        return view('wap.addcard',compact('cn_begin','cn_end'));
    }
	public function postaddcard(Request $request)
    {
        $validator = $this->verify($request, 'wap.post_card');

        if ($validator->fails())
        {
            $messages = $validator->messages()->toArray();
            return responseWrong($messages);
        }	
		$endtime=$request->get('cn_end').' 23:59:59';
            Couponsbusiness::create([
                'couponstitle' => $request->get('couponstitle'),
				'businessid' => $this->getMember()->id,
				'term' => $request->get('term'),
				'decrease' => $request->get('decrease'),
				'begintime' => $request->get('cn_begin'),
				'endtime' => $endtime,
                'info' => $request->get('info')
            ]);
	return responseSuccess('','添加成功，等待后台审核', route('wap.card'));	
    }	
	public function cardinfo($id)
    {
		$usemem=Coupons::Where('couponid',$id)->Where('status',2)->pluck('id')->toArray();
		$term = 0;
		$decrease = 0;
		foreach($usemem as $item){
		  $term += (int) $item['term'];
		  $decrease += (int) $item['decrease'];
		}		
		$usemem=count($usemem);
		$data=Couponsbusiness::find($id);
        return view('wap.cardinfo',compact('data','usemem','term','decrease'));
    }
	public function ucardinfo($id)
    {
		$data=Couponsbusiness::find($id);
		$business=Member::find($data['businessid']);
        return view('wap.ucardinfo',compact('data','business'));
    }
	public function usecard($id)
    {
		$data=Couponsbusiness::find($id);
		$business=Member::find($data['businessid']);
		$sys = SystemConfig::find(1);
        return view('wap.usecard',compact('data','business','sys'));
    }
    //商家申请页面
    public function agent_apply()
    {
        return view('wap.agent_apply');
    }
    public function Businessupload()
    {
        return view('wap.Businessupload');
    }
    public function post_Businessupload(Request $request)
    {
		if($request['headpic']==''){
		   return responseWrong('请选择图片');	
		}
        $data = $request->all();
        $member = $this->getMember();
        $member->update([
            'Businessheadpic' => $data['headpic']
        ]);		
         return responseSuccess('', '上传成功', route('wap.agent'));
    }
    public function set()
    {
        return view('wap.set');
    }
    public function postset(Request $request)
    {
        $validator = $this->verify($request, 'wap.post_set');

        if ($validator->fails())
        {
            $messages = $validator->messages()->toArray();
            return responseWrong($messages);
        }	
        $data = $request->all();
        $member = $this->getMember();

        $member->update($data);	
		return responseSuccess('','提交成功', route('wap.set'));
    }	
    public function post_agent_apply(Request $request)
    {
		if (session('phone_v_code') != $request->get('code'))
                return responseWrong('手机验证码错误 ');
        $validator = $this->verify($request, 'wap.post_agent_apply');

        if ($validator->fails())
        {
            $messages = $validator->messages()->toArray();
            return responseWrong($messages);
        }
        $data = $request->all();
        $member = $this->getMember();
        MemberDailiApply::create([
            'member_id' => $member->id,
			'name'=>$data['real_name'],
			'Businessname'=>$data['Businessname'],
			'Businessaddress'=>$data['Businessaddress'],
            'phone' => $data['set_phone'],
            'idcard' => $data['idcard'],
			'Business' => $data['Business'],
            'about' => $data['about']
        ]);

        return responseSuccess('','提交成功', route('wap.agent'));
    }

    public function bind_bank()
    {
        return view('wap.bind_bank');
    }
    public function address()
    {
        return view('wap.address');
    }
    public function post_bind_bank(Request $request)
    {
        $sys = SystemConfig::find(1);
        if ($sys->is_sms_on == 0)
        {
            if (!$request->has('v_code'))
                return responseWrong('请输入 手机验证码');

            if (session('phone_v_code') != $request->get('v_code'))
                return responseWrong('验证码错误 '.session('phone_v_code'));
        }

        $validator = $this->verify($request, 'wap.update_bank_info');

        if ($validator->fails())
        {
            $messages = $validator->messages()->toArray();
            return responseWrong($messages);
        }
        $data = $request->all();
        $member = $this->getMember();

        $member->update($data);

        return responseSuccess('', '绑定成功', route('wap.draw'));
    }
    public function post_address(Request $request)
    {
        $sys = SystemConfig::find(1);
        if ($sys->is_sms_on == 0)
        {
            if (!$request->has('v_code'))
                return responseWrong('请输入 手机验证码');

            if (session('phone_v_code') != $request->get('v_code'))
				return responseWrong('验证码错误 ');
                //return responseWrong('验证码错误 '.session('phone_v_code'));
        }
        if ($request->get('addressname')=='')
                return responseWrong('请输入 收货人');   
        if ($request->get('addressphone')=='')
                return responseWrong('请输入 手机号码');   
        if ($request->get('address1')=='省份')
                return responseWrong('请选择 省份');   
        if ($request->get('address2')=='地级市')
                return responseWrong('请选择 地级市');   
        if ($request->get('address2')=='市、县级市')
                return responseWrong('请选择 市、县级市');   			
        $data = $request->all();
        $member = $this->getMember();

        $member->update($data);

        return responseSuccess('', '添加修改成功', route('wap.address'));
    }	

    public function set_phone()
    {
        return view('wap.set_phone');
    }

    public function post_set_phone(Request $request)
    {
        $sys = SystemConfig::find(1);
        if ($sys->is_sms_on == 0)
        {
            if (!$request->has('code'))
                return responseWrong('请输入 手机验证码');

            if (session('phone_v_code') != $request->get('code'))
                return responseWrong('验证码错误 ');
        }
        $validator = $this->verify($request, 'wap.post_set_phone');
        if ($validator->fails())
        {
            $messages = $validator->messages()->toArray();
            return responseWrong($messages);
        }
        $data = $request->all();
        $member = $this->getMember();

        $member->update([
            'phone' => $data['phone']
        ]);

        return responseSuccess('', '设置成功', route('wap.userinfo'));
    }
    public function set_nichen()
    {
        return view('wap.set_nichen');
    }	
    public function post_set_nichen(Request $request)
    {
        if($request->get('nichen')=='' || strlen($request->get('nichen'))>20){
			return responseWrong('请输入昵称或昵称过长');
		}
        $data = $request->all();
        $member = $this->getMember();
        $member->update([
            'nichen' => $data['nichen']
        ]);

        return responseSuccess('', '设置成功', route('wap.userinfo'));
    }
	public function upload(){
		return view('wap.upload');
	}	
    /**
     * ajax上传文件
     */
    public function uploadImages(Request $request)
    {
        if ($request->ajax()) {
			if($request->file('image')){
				$file = $request->file('image');
			}else{
				$file = $request->file('image1');
			}
            // 第一个参数代表目录, 第二个参数代表我上方自己定义的一个存储媒介
			$up=date('Y-m-d');
            $path = $file->store('headpic/'.$up, 'uploads');
            return response()->json(array('msg' => $path));
        }
        return view('wap.upload');
    }
    public function post_upload(Request $request)
    {
		if($request['headpic']==''){
		   return responseWrong('请选择图片');	
		}
        $data = $request->all();
        $member = $this->getMember();
        $member->update([
            'headpic' => $data['headpic']
        ]);		
         return responseSuccess('', '上传成功', route('wap.userinfo'));
    }



    public function draw()
    {

        if (!$this->getMember()->bank_card)
            return redirect()->to(route('wap.bind_bank'));

        return view('wap.draw');
    }

    public function post_draw(Request $request)
    {
        $member = $this->getMember();
        if (!$member->bank_card)
            return responseWrong('请先设置银行卡信息','', route('wap.update_bank_info'));


        $data = $request->all();

        if ($data['money'] > $member->money)
            return responseWrong('提款金额大于余额');


        Drawing::create([
            'bill_no' => getBillNo(),
            'member_id' => $member->id,
            'name' => $member->bank_username,
            'money' => $data['money'],
            'account' => $member->bank_card,
            'bank_name' => $member->bank_name,
            'bank_card' => $member->bank_card,
            'bank_address' => $member->bank_address
        ]);

        $member->decrement('money', $data['money']);

        return responseSuccess('','提交成功', route('wap.draw_record'));
    }
    public function draw_record(Request $request)
    {
		
        $data = Drawing::where('member_id', $this->getMember()->id)->orderBy('created_at', 'desc')->paginate(config('web.page-size'));

        return view('wap.draw_record', compact('data'));
    }



    public function recharge()
    {
        return view('wap.recharge');
    }

    public function weixin_pay()
    {
        return view('wap.weixin_pay');
    }

    public function post_weixin_pay(Request $request)
    {
        $validator = $this->verify($request, 'wap.post_weixin_pay');

        if ($validator->fails())
        {
            $messages = $validator->messages()->toArray();
            return responseWrong($messages);
        }

        $data = $request->all();
        $member = $this->getMember();

        Recharge::create([
            'bill_no' => getBillNo(),
            'member_id' => $member->id,
            'name' => $member->name,
            'money' => $data['money'],
            'payment_type' => 2,
            'account' => $data['account'],
            'status' => 1,
            'hk_at' => $data['paytime'].' '.$data['date_h'].':'.$data['date_i'].':'.$data['date_s']
        ]);

        return responseSuccess('', '', route('wap.recharge_record'));
    }

    public function ali_pay()
    {
        return view('wap.ali_pay');
    }

    public function third_bank_pay()
    {
        return view('wap.third_bank_pay');
    }

    public function third_pay_scan()
    {
        return view('wap.third_pay_scan');
    }

    public function post_ali_pay(Request $request)
    {
        $validator = $this->verify($request, 'wap.post_ali_pay');

        if ($validator->fails())
        {
            $messages = $validator->messages()->toArray();
            return responseWrong($messages);
        }

        $data = $request->all();
        $member = $this->getMember();

        Recharge::create([
            'bill_no' => getBillNo(),
            'member_id' => $member->id,
            'name' => $member->name,
            'money' => $data['money'],
            'payment_type' => 1,
            'account' => $data['account'],
            'status' => 1,
            'hk_at' => $data['paytime'].' '.$data['date_h'].':'.$data['date_i'].':'.$data['date_s']
        ]);

        return responseSuccess('', '', route('wap.recharge_record'));
    }

    public function bank_pay()
    {
        $bank_card_list = BankCard::where('on_line', 0)->orderBy('created_at', 'desc')->get();

        return view('wap.bank_pay', compact('bank_card_list'));
    }

    public function post_bank_pay(Request $request)
    {
        $validator = $this->verify($request, 'wap.post_bank_pay');

        if ($validator->fails())
        {
            $messages = $validator->messages()->toArray();
            return responseWrong($messages);
        }

        $data = $request->all();
        $member = $this->getMember();

        Recharge::create([
            'bill_no' => getBillNo(),
            'member_id' => $member->id,
            'name' => $data['name'],
            'money' => $data['money'],
            'payment_type' => 3,
            'account' => $data['account'],
            'payment_desc' => $data['payment_desc'],
            'status' => 1,
            'hk_at' => $data['paytime'].' '.$data['date_h'].':'.$data['date_i'].':'.$data['date_s']
        ]);

        return responseSuccess('', '', route('wap.recharge_record'));
    }

    public function reset_password()
    {
        return view('wap.reset_password');
    }

    public function reset_login_password(Request $request)
    {
        $validator = $this->verify($request, 'wap.update_login_password');

        if ($validator->fails())
        {
            $messages = $validator->messages()->toArray();
            return responseWrong($messages);
        }

        $data = $request->all();
        $member = $this->getMember();
        if (!Hash::check($data['old_password'], $member->password))
        {
            return responseWrong('原密码错误');
        }

        $member->update([
            'password' => bcrypt($data['password']),
            //'original_password' => $data['password']
        ]);

        return responseSuccess('', '修改成功');
    }

    public function reset_qk_password(Request $request)
    {
        $validator = $this->verify($request, 'wap.update_qk_password');

        if ($validator->fails())
        {
            $messages = $validator->messages()->toArray();
            return responseWrong($messages);
        }

        $data = $request->all();
        $member = $this->getMember();

        if ($member->qk_pwd != $data['old_password'])
        {
            return responseWrong('原密码错误');
        }

        $member->update([
            'qk_pwd' => $data['password']
        ]);

        return responseSuccess('', '修改成功');
    }

    public function transfer()
    {
        return view('wap.transfer');
    }
    public function post_transfer(Request $request)
    {
        $validator = $this->verify($request, 'wap.post_transfer');

        if ($validator->fails())
        {
            $messages = $validator->messages()->toArray();
            return responseWrong($messages);
        }

        $member = $this->getMember();
        $in_account = $request->get('in_account');
        $out_account = $request->get('out_account');
        $money = $request->get('money');

        $o = new ApiClientController();

        if ($in_account == $out_account || ($in_account> 2 && $out_account > 2))
        {
            return responseWrong('不支持该种类型转换，请重新选择');
        }

        //
        if ($out_account == 1)//从中心账户转出
        {
            if ($member->money < $money)
                return responseWrong('账户余额不足');

            $api = Api::findOrFail($in_account);

            $res = $o->deposit($api->api_name, $member->name, $member->original_password, $money, 'money');
            if ($res['Code'] != 0)
                return responseWrong('失败！错误代码'.$res['Code'].' 请联系客服解决');
        } elseif ($out_account == 2){//从返水账户转出

            if ($member->fs_money < $money)
                return responseWrong('账户余额不足');

            $api = Api::findOrFail($in_account);

            $res = $o->deposit($api->api_name, $member->name, $member->original_password, $money, 'fs_money');
            if ($res['Code'] != 0)
                return responseWrong($res['Message']);
        } elseif ($in_account == 1){// 转入中心账户

            $api = Api::findOrFail($out_account);
            $res = $o->withdrawal($api->api_name, $member->name, $member->original_password, $money, 'money');
            if ($res['Code'] != 0)
                return responseWrong($res['Message']);
        }

        return responseSuccess('', '转换成功', route('wap.transfer'));
    }

    public function drawing_record(Request $request)
    {
        return view('wap.drawing_record');
    }

    public function game_record(Request $request)
    {

        $api_type = '';
        $mod = new GameRecord();
        if ($request->has('api_type'))
        {
            $api_type = $request->get('api_type');
            $mod = $mod->where('api_type', $api_type);
        }

        $data = $mod->where('member_id', $this->getMember()->id)->orderBy('created_at', 'desc')->paginate(config('web.page-size'));

        return view('wap.game_record', compact('data', 'api_type'));
    }

    public function recharge_record(Request $request)
    {

        $data = Recharge::where('member_id', $this->getMember()->id)->orderBy('created_at', 'desc')->paginate(config('web.page-size'));

        return view('wap.recharge_record', compact('data'));
    }

    public function transfer_record(Request $request)
    {
        $cn_begin = $cn_end = date('Y-m-d');

        $s_begin_h = $request->get('s_begin_h')?:'00';
        $s_begin_i = $request->get('s_begin_i')?:'00';

        $s_end_h  = $request->get('s_end_h')?:'23';

        $s_end_i = $request->get('s_end_i')?:'59';

        $mod = new Transfer();
        if ($request->has('cn_begin'))
        {
            $cn_begin = $request->get('cn_begin');
            $mod = $mod->where('created_at', '>=', $cn_begin." ".$s_begin_h.":".$s_begin_i.":00");
        }

        if ($request->has('cn_end'))
        {
            $cn_end = $request->get('cn_end');
            $mod = $mod->where('created_at', '<=', $cn_end." ".$s_end_h.":".$s_end_i.":00");
        }


        $data = $mod->where('member_id', $this->getMember()->id)->orderBy('created_at', 'desc')->paginate(config('web.page-size'));

        return view('wap.transfer_record', compact('data', 'cn_begin', 'cn_end', 's_begin_h', 's_begin_i', 's_end_h', 's_end_i'));
    }
	/*
	*我的优惠券
	*/	
    public function mycard(Request $request)
    {   $status=4;
        $mod = new Coupons();
        if ($request->has('status'))
        {
            $status = $request->get('status');
            $mod = $mod->where('status', $status);
        }

        $data = $mod->where('uid', $this->getMember()->id)->orderBy('created_at', 'desc')->paginate(config('web.page-size'));

        return view('wap.mycard', compact('data','status'));
    }
	/*
	*我的商品订单
	*/	
    public function mymiandan(Request $request)
    {   
        $data = Couponsmiandanuser::where('uid', $this->getMember()->id)->orderBy('created_at', 'desc')->paginate(config('web.page-size'));

        return view('wap.mymiandan', compact('data'));
    }	
	/*
	*我的商品订单
	*/	
    public function myshop(Request $request)
    {   
        $data = Couponsshopuser::where('uid', $this->getMember()->id)->orderBy('created_at', 'desc')->paginate(config('web.page-size'));

        return view('wap.myshop', compact('data'));
    }
	/*
	*我的红包
	*/	
    public function myhb(Request $request)
    {   


        return view('wap.myhb', compact('data'));
    }	
	/*
	*我的积分
	*/	
    public function myscore(Request $request)
    {


        $mod = new ScoreLog();
        $data = $mod->where('uid', $this->getMember()->id)->orderBy('created_at', 'desc')->paginate(config('web.page-size'));

        return view('wap.myscore', compact('data'));
    }	
    public function daili_money_log(Request $request)
    {
        $data = DailiMoneyLog::where('member_id', $this->getMember()->id)->orderBy('created_at', 'desc')->paginate(config('web.page-size'));

        return view('wap.daili_money_log', compact('data'));
    }

    public function member_offline(Request $request)
    {
        $data = Member::where('top_id', $this->getMember()->id)->orderBy('created_at', 'desc')->paginate(config('web.page-size'));

        return view('wap.member_offline', compact('data'));
    }

    public function member_offline_recharge()
    {
       
        $data = Userecord::Where('businessid',$this->getMember()->id)->orderBy('created_at', 'desc')->paginate(config('web.page-size'));

        return view('wap.member_offline_recharge' ,compact('data'));
    }

    public function member_offline_drawing(Request $request)
    {
        $mod = new Drawing();
        $name = '';
        $cn_begin =  date('Y-m-d');

        $cn_end = date('Y-m-d');

        if ($request->has('cn_begin'))
        {
            $cn_begin = $request->get('cn_begin');
            $mod = $mod->where('created_at', '>=', "$cn_begin");
        }

        if ($request->has('cn_end'))
        {
            $cn_end = $request->get('cn_end');
            $mod = $mod->where('created_at', '<=', date('Y-m-d 23:59:59', strtotime($cn_end)));
        }

        if ($request->has('name'))
        {
            $name = $request->get('name');
            $m_list = Member::where('top_id', $this->getMember()->id)->where('name', 'LIKE', "%$name%")->pluck('id');
        } else {
            $m_list = Member::where('top_id', $this->getMember()->id)->pluck('id');
        }

        $mod = $mod->whereIn('member_id', $m_list);

        $data = $mod->orderBy('created_at', 'desc')->paginate(config('web.page-size'));

        return view('wap.member_offline_drawing' ,compact('data', 'name', 'cn_begin', 'cn_end'));
    }


    public function member_offline_sy(Request $request)
    {
        $cn_begin =  '';

        $cn_end = '';

        $m_list = Member::where('top_id', $this->getMember()->id)->pluck('id');
        $recharge_mod = new Recharge();
        $drawing_mod = new Drawing();
        $dividend_mod = new Dividend();

        if ($request->has('cn_begin'))
        {
            $cn_begin = $request->get('cn_begin');
            $recharge_mod = $recharge_mod->where('created_at', '>=', $cn_begin);
            $drawing_mod = $drawing_mod->where('created_at', '>=', $cn_begin);
            $dividend_mod = $dividend_mod->where('created_at', '>=', $cn_begin);
        }

        if ($request->has('cn_end'))
        {
            $cn_end = $request->get('cn_end');
            $recharge_mod = $recharge_mod->where('created_at', '<=', date('Y-m-d 23:59:59', strtotime($cn_end)));
            $drawing_mod = $drawing_mod->where('created_at', '>=', date('Y-m-d 23:59:59', strtotime($cn_end)));
            $dividend_mod = $dividend_mod->where('created_at', '>=', date('Y-m-d 23:59:59', strtotime($cn_end)));
        }

        $total_recharge = $recharge_mod->where('status', 2)->whereIn('member_id', $m_list)->sum('money');
        $recharge_count = $recharge_mod->where('status', 2)->whereIn('member_id', $m_list)->count();

        $total_drawing = $drawing_mod->where('status', 2)->whereIn('member_id', $m_list)->sum('money');
        $drawing_count = $drawing_mod->where('status', 2)->whereIn('member_id', $m_list)->count();

        $total_dividend = $dividend_mod->whereIn('member_id', $m_list)->sum('money');
        $dividend_count = $dividend_mod->whereIn('member_id', $m_list)->count();


        return view('wap.member_offline_sy', compact('cn_begin', 'cn_end', 'total_recharge', 'recharge_count', 'total_drawing', 'drawing_count', 'total_dividend', 'dividend_count'));
    }



}

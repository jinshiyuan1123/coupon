<?php

namespace App\Http\Controllers\Admin;

use App\Models\GameList;
use App\Models\Api;
use App\Services\TcgService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class GameListController extends AdminBaseController
{
    public function index(Request $request)
    {
        $mod = new GameList();

        $name = $game_type = $api_id = $client_type = '';

        if ($request->has('name'))
        {
            $name = $request->get('name');
            $mod = $mod->where('name', 'LIKE', "%$name%");
        }

        if ($request->has('game_type'))
        {
            $game_type = $request->get('game_type');
            $mod = $mod->where('game_type', $game_type);
        }

        if ($request->has('api_id'))
        {
            $api_id = $request->get('api_id');
            $mod = $mod->where('api_id', $api_id);
        }

        if ($request->has('client_type'))
        {
            $client_type = $request->get('client_type');
            $mod = $mod->where('client_type', $client_type);
        }


        $data = $mod->orderBy('created_at', 'desc')->paginate(config('admin.page-size'));

        return view('admin.game_list.index', compact('data', 'name','game_type', 'api_id', 'client_type'));
    }

    public function create()
    {
        //$path = public_path();
		
		 
		 
		return view('admin.game_list.create');
    }

    public function store(Request $request)
    {
        
		
		 
		
		$validator = $this->verify($request, 'game_list.store');
		
		
        if ($validator->fails())
        {
            $messages = $validator->messages()->toArray();
			$msg='';
			foreach($messages as $v){
				$msg.=$v[0].'\n';
				
			}
			exit("<script>alert('".$msg."');history.back(-1);</script>");
			
            //return responseWrong($messages);
        }
	
		
		
		
        $data = $request->all();
		unset($data['fileto']);
		
		//上传图片操作
		$info=$_FILES["fileto"];
		if(!empty($info['name'])){
			 $api_info=Api::where('id', $data['api_id'])->first();
		 	 $api_name=strtolower($api_info->api_name);//bbin
			 $path = public_path();	
			 $path=$path.'/web/images/games/'.$api_name.'/';
			 $img_name=$this->upload_image($info,$path);
			 $data['img_pc']= $img_name;
			 $data['img_phone']=$img_name;
			 $data['img_path']=$img_name;
		}
		
		
//        if (GameList::where('api_id', $data['api_id'])->where('game_id', $data['game_id'])->first())
//            return responseWrong('该接口下已存在该游戏代码');

        
		
		GameList::create($data);
		exit("<script>alert('添加成功！');window.location.href='".route('game_list.index')."';</script>");
       // return responseSuccess('', '', route('game_list.index'));

    }
	
	
	public function upload_image($info,$path){
		
			//获取图片后缀
			$pre = strrchr($info["name"],".");
			$img_name = 'Game_'.date("YmdHis").$pre;
			
			//图片类型过滤
			$pic_arr = array("image/jpeg","image/jpg","image/pjpeg","image/png","image/x-png","image/gif");
			if(!in_array($info["type"],$pic_arr)){
				
				exit("<script>alert('上传的文件必须是 jpg、png、gif格式的');history.back(-1);</script>");
				//$result=array('result'=>0,'msg'=>'上传的文件必须是 jpg、png、gif格式的');
				//return $result;
			}
			//图片大小过滤
			if($info["size"]>(2*1024*1024)){
				 //$result=array('result'=>0,'msg'=>'上传图片的大小不能超过 2M');
				 //return $result;
				exit("<script>alert('上传图片的大小不能超过 2M');history.back(-1);</script>");
			}
			if(is_uploaded_file($info["tmp_name"])){
				move_uploaded_file($info["tmp_name"],$path.$img_name);
				return $img_name;
			}


}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
    public function edit($id)
    {
        $data = GameList::findOrFail($id);

        return view('admin.game_list.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $validator = $this->verify($request, 'game_list.store');

        if ($validator->fails())
        {
            $messages = $validator->messages()->toArray();
            //return responseWrong($messages);
			$msg='';
			foreach($messages as $v){
				$msg.=$v[0].'\n';
				
			}
			exit("<script>alert('".$msg."');history.back(-1);</script>");
			
			
			
        }
        $data = $request->all();

        if (GameList::where('game_id', $data['game_id'])->where('id', '!=', $id)->first())
           // return responseWrong('已存在该游戏代码');
		   exit("<script>alert('已存在该游戏代码');history.back(-1);</script>");
		
		unset($data['fileto']);
		
		//上传图片操作
		$info=$_FILES["fileto"];
		if(!empty($info['name'])){
			 $api_info=Api::where('id', $data['api_id'])->first();
		 	 $api_name=strtolower($api_info->api_name);//bbin
			 $path = public_path();	
			 $path=$path.'/web/images/games/'.$api_name.'/';
			 $img_name=$this->upload_image($info,$path);
			 $data['img_pc']= $img_name;
			 $data['img_phone']=$img_name;
			 $data['img_path']=$img_name;
		}
		
		
        $mod = GameList::findOrFail($id);

        $mod->update($data);
		exit("<script>alert('修改成功！');window.location.href='".route('game_list.index')."';</script>");
        //return responseSuccess('', '', route('game_list.index'));

    }

    public function destroy($id)
    {
        GameList::destroy($id);

        return respS();
    }

    public function check($id, $status)
    {
        $mod = GameList::findOrFail($id);

        $mod->update([
            'on_line' => $status
        ]);

        return respS();
    }

    public function pull(Request $request)
    {
        $o = new TcgService();
        $type = $request->get('type')?:'RNG';
        $productType =  $request->get('productType')?:3;
        $client_type = $request->get('client_type')?:'web';
        $platform = $request->get('platform')?:'flash';
        $res = json_decode($o->gameList($productType,$type,$client_type,$platform), TRUE);

        if ($res['status'] == 0)
        {

            $data = $res['games'];

            if (count($data) > 0)
            {
                GameList::where('productType', $productType)->where('game_type', $type)->where('client_type', $client_type)->where('id', '>', 1)->delete();

                foreach ($data as $value) {
                    GameList::create([
                        'displayStatus' => $value['displayStatus'],
                        'game_type' => $value['game_type'],
                        'name' => $value['name'],
                        'tcgGameCode' => $value['tcgGameCode'],
                        'api_id' => $value['api_id'],
                        'productType' => $productType,
                        'platform' => $value['platform'],
                        'client_type' => $client_type
                    ]);
                }

            }


            return respS('拉取成功');
        } else {
            return respS('错误代码 '.$res['status']);
        }
    }
}

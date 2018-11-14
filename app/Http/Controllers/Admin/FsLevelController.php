<?php

namespace App\Http\Controllers\Admin;

use App\Models\FsLevel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Couponsmiandan;
use App\Models\Couponsmiandanuser;
class FsLevelController extends AdminBaseController
{
    public function index(Request $request)
    {
        $mod = new Couponsmiandan();

        $miandanID = $status = $start_at = $end_at =  '';
        $time=date("Y-m-d h:i:s",time());
        if ($request->has('miandanID'))
        {
            $miandanID = $request->get('miandanID');
            $mod = $mod->where('id', $miandanID);
        }
        if ($request->has('status'))
        {
			$status = $request->get('status');
			if($status==1){
				$mod = $mod->where('status', 1);
			}
			if($status==2){
				$mod = $mod->where('status', 0);
			}  
			if($status==3){
				$mod = $mod->Where('endtime','<',$time);
			}			
        }
        if ($request->has('start_at'))
        {
            $start_at = $request->get('start_at');
            $mod = $mod->where('created_at', '>=', $start_at);
        }
        if ($request->has('end_at'))
        {
            $end_at = $request->get('end_at');
            $mod = $mod->where('created_at', '<=',$end_at);
        }		
        $data = $mod->orderBy('created_at', 'desc')->paginate(config('admin.page-size'));
			foreach($data as $v){
				$Couponsmiandanuser=Couponsmiandanuser::Where('couponsmiandanid',$v->id)->pluck('id')->toArray();
				$v->Couponsmiandanuser=count($Couponsmiandanuser);	
				$sumuse=Couponsmiandanuser::Where('couponsmiandanid',$v->id)->Where('status',1)->pluck('id')->toArray();
				$v->sumuse=count($sumuse);
				if($v->endtime > $time){
					if($v->status == 1){
						$v->statustag='已上架';
					}else{
						$v->statustag='未上架';
					}
				}else{
					$v->statustag='已过期';
				}
			}
        return view('admin.fs_level.index', compact('data', 'miandanID','status','start_at','end_at'));
    }

    public function create()
    {
        return view('admin.fs_level.create');
    }

    public function store(Request $request)
    {
        $validator = $this->verify($request, 'fs_level.store');

        if ($validator->fails())
        {
            $messages = $validator->messages()->toArray();
            return responseWrong($messages);
        }

        $data = $request->all();

        Couponsmiandan::create($data);

        return responseSuccess('', '', route('fs_level.index'));

    }

    public function edit($id)
    {
        $data = Couponsmiandan::findOrFail($id);

        return view('admin.fs_level.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $validator = $this->verify($request, 'fs_level.store');

        if ($validator->fails())
        {
            $messages = $validator->messages()->toArray();
            return responseWrong($messages);
        }
        $data = $request->all();

        $mod = Couponsmiandan::findOrFail($id);

        $mod->update($data);

        return responseSuccess('', '', route('fs_level.index'));

    }

    public function destroy($id)
    {
        Couponsmiandan::destroy($id);

        return respS();
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Models\FsLevel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Couponsmiandan;
use App\Models\Member;
use App\Models\Couponsmiandanuser;
class MiandanuserController extends AdminBaseController
{
    public function index(Request $request)
    {
        $mod = new Couponsmiandanuser();

        $uid = $status = $start_at = $end_at =  '';
        $time=date("Y-m-d h:i:s",time());
        if ($request->has('uid'))
        {
            $uid = $request->get('uid');
            $mod = $mod->where('uid', $uid);
        }
        if ($request->has('status'))
        {
			$status = $request->get('status');
				$mod = $mod->where('status', $status);		
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
		  $membername=Member::findOrFail($v->uid);
		  $v->member_name=$membername['name'];
		  $miandanname=Couponsmiandan::findOrFail($v->couponsmiandanid);
		  $v->businessname=$miandanname['businessname'];
		  $v->title=$miandanname['title'];
	  }         
        return view('admin.miandanuser.index', compact('data', 'uid','status','start_at','end_at'));
    }

    public function create()
    {
        return view('admin.miandanuser.create');
    }

    public function store(Request $request)
    {
        $validator = $this->verify($request, 'miandanuser.store');

        if ($validator->fails())
        {
            $messages = $validator->messages()->toArray();
            return responseWrong($messages);
        }

        $data = $request->all();

        Couponsmiandanuser::create($data);

        return responseSuccess('', '', route('miandanuser.index'));

    }

    public function edit($id)
    {
        $data = Couponsmiandanuser::findOrFail($id);

        return view('admin.miandanuser.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();

        $mod = Couponsmiandanuser::findOrFail($id);

        $mod->update($data);

        return responseSuccess('', '', route('miandanuser.index'));

    }

    public function destroy($id)
    {
        Couponsmiandanuser::destroy($id);

        return respS();
    }
}

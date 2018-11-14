<?php

namespace App\Http\Controllers\Admin;

use App\Models\FsLevel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Member;
use App\Models\Couponsshopuser;
use App\Models\Couponsshop;
class ShopuserController extends AdminBaseController
{
    public function index(Request $request)
    {
        $mod = new Couponsshopuser();

        $uid = $status = $shopid = $start_at = $end_at =  '';
        $time=date("Y-m-d h:i:s",time());
        if ($request->has('shopid'))
        {
            $shopid = $request->get('shopid');
            $mod = $mod->where('couponsshopid', $shopid);
        }		
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
	  }         
        return view('admin.shopuser.index', compact('data', 'uid','status','start_at','end_at','shopid'));
    }

    public function create()
    {
        return view('admin.shopuser.create');
    }

    public function store(Request $request)
    {
        $validator = $this->verify($request, 'shopuser.store');

        if ($validator->fails())
        {
            $messages = $validator->messages()->toArray();
            return responseWrong($messages);
        }

        $data = $request->all();

        Couponsshopuser::create($data);

        return responseSuccess('', '', route('shopuser.index'));

    }

    public function edit($id)
    {
        $data = Couponsshopuser::findOrFail($id);

        return view('admin.shopuser.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();

        $mod = Couponsshopuser::findOrFail($id);

        $mod->update($data);

        return responseSuccess('', '', route('shopuser.index'));

    }

    public function destroy($id)
    {
        Couponsmiandanuser::destroy($id);

        return respS();
    }
}

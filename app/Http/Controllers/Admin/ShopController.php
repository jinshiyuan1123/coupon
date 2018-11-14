<?php

namespace App\Http\Controllers\Admin;

use App\Models\FsLevel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Couponsmiandan;
use App\Models\Couponsmiandanuser;
use App\Models\Couponsshop;
use App\Models\Couponsshopuser;
class ShopController extends AdminBaseController
{
    public function index(Request $request)
    {
        $mod = new Couponsshop();

        $shopID = $status = $start_at = $end_at =  '';
        $time=date("Y-m-d h:i:s",time());
        if ($request->has('shopID'))
        {
            $shopID = $request->get('shopID');
            $mod = $mod->where('id', $shopID);
        }
        if ($request->has('status'))
        {
			$status = $request->get('status');
				$mod = $mod->where('status',$status);
		
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
				$Couponsshopuser=Couponsshopuser::Where('couponsshopid',$v->id)->pluck('id')->toArray();
				$v->Couponsshopuser=count($Couponsshopuser);	
			}
			$total_score=$mod->sum('score');
			$total_Couponsshopuser=$data->sum('Couponsshopuser');
        return view('admin.shop.index', compact('data', 'shopID','status','start_at','end_at','total_score','total_Couponsshopuser'));
    }

    public function create()
    {
        return view('admin.shop.create');
    }

    public function store(Request $request)
    {
        $validator = $this->verify($request, 'shop.store');

        if ($validator->fails())
        {
            $messages = $validator->messages()->toArray();
            return responseWrong($messages);
        }

        $data = $request->all();

        Couponsshop::create($data);

        return responseSuccess('', '', route('shop.index'));

    }

    public function edit($id)
    {
        $data = Couponsshop::findOrFail($id);

        return view('admin.shop.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $validator = $this->verify($request, 'shop.store');

        if ($validator->fails())
        {
            $messages = $validator->messages()->toArray();
            return responseWrong($messages);
        }
        $data = $request->all();

        $mod = Couponsshop::findOrFail($id);

        $mod->update($data);

        return responseSuccess('', '', route('shop.index'));

    }

    public function destroy($id)
    {
        Couponsmiandan::destroy($id);

        return respS();
    }
}

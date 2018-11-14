<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Member;
use App\Models\Couponsbusiness;
use DB;
class MemberOfflineController extends Controller
{
    public function index(Request $request)
    {
        $mod = new Couponsbusiness();
        $businessid = '';
        if ($request->has('businessid'))
        {
            $businessid = $request->get('businessid');
            $mod = $mod->where('businessid', 'like', "%$businessid%");
        }


        $data = $mod->Where('status',0)->orderBy('created_at', 'desc')->paginate(config('admin.page-size'));

		foreach($data as $v){
			$businessname=Member::findOrFail($v->businessid);
			$v->businessname=$businessname['Businessname'];
			$v->name=$businessname['name'];
		}
		
        return view('admin.member_offline.index', compact('data', 'businessid'));
    }
    public function show($id)
    {
        $mod = Couponsbusiness::findOrFail($id);

        try{
            DB::transaction(function() use($mod) {

                $mod->update([
                    'status' => 1
                ]);

            });
        }catch(Exception $e){
            DB::rollback();
            return respF('创建失败');
        }

        return respS();
    }	
    public function update($id)
    {
        $mod = Couponsbusiness::findOrFail($id);

        try{
            DB::transaction(function() use($mod) {

                $mod->update([
                    'status' => 2
                ]);

            });
        }catch(Exception $e){
            DB::rollback();
            return respF('创建失败');
        }

        return respS();
    }		
}

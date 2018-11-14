<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Member;
use App\Models\PayRecord;
class MemberOfflineDrawingController extends Controller
{
    public function index(Request $request)
    {
        $mod = new PayRecord();

        $couponid = $businessid = $start_at = $end_at =  '';
        if ($request->has('couponid'))
        {
            $couponid = $request->get('couponid');
            $mod = $mod->where('couponid', $couponid);
        }		
        if ($request->has('businessid'))
        {
            $businessid = $request->get('businessid');
            $mod = $mod->where('businessid', $businessid);
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
		  $membername=Member::findOrFail($v->member_id);
		  $v->member_name=$membername['name'];
		  $v->business_name=$membername['Businessname'];
	  }
		   $total_allmoney = $mod->sum('allmoney');
		   $total_decrease = $mod->sum('decrease');
		   $total_descore = $mod->sum('descore');
		   $total_descoremoney = $mod->sum('descoremoney');
		   $total_money = $mod->sum('money');
		   $total_poundage = $mod->sum('poundage');
		   $total_score = $mod->sum('score');
/*         $total_money = $mod->sum('money');
        $total_counter_fee = $mod->sum('counter_fee'); */

        return view('admin.member_offline_drawing.index', compact('data', 'couponid', 'businessid', 'start_at', 'end_at','total_allmoney','total_decrease','total_descore','total_descoremoney','total_money','total_poundage','total_score'));
    }
}

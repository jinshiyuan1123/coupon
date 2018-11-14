<?php

namespace App\Http\Controllers\Admin;

use App\Models\Member;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Couponsbusiness;
use App\Models\PayRecord;
class MemberOfflineRechargeController extends Controller
{
    public function index(Request $request)
    {
        $mod = new Couponsbusiness();

        $id = $status =  $businessid = $start_at = $end_at = '';
        if ($request->has('id'))
        {
            $id = $request->get('id');
            $mod = $mod->where('id', $id);
        }
        if ($request->has('businessid'))
        {
            $businessid = $request->get('businessid');
            $mod = $mod->where('businessid','like', "%$businessid%");
        }
       $time=date("Y-m-d h:i:s",time());
        if ($request->has('status'))
        {
            $status = $request->get('status');
			if($status==4){
				$mod = $mod->where('endtime','<=',$time)->where('status',1);
			}
			if($status==3){
				$mod = $mod->where('begintime','<=',$time)->where('endtime','>=',$time)->where('status',1);
			}			
			if($status==1){
				$mod = $mod->where('status', 0);
			}
			if($status==2){
				$mod = $mod->where('status', 2);
			}			
        }
        if ($request->has('start_at'))
        {
            $start_at = $request->get('start_at');
            $mod = $mod->where('begintime', '>=', $start_at);
        }
        if ($request->has('end_at'))
        {
            $end_at = $request->get('end_at');
            $mod = $mod->where('endtime', '<=',$end_at);
        }

        $data = $mod->orderBy('created_at', 'desc')->paginate(config('admin.page-size'));
		foreach($data as $v){
			$businessname=Member::findOrFail($v->businessid);
			$v->businessname=$businessname['Businessname'];
			$v->name=$businessname['name'];
			if($v->status==0){
				$v->statustag='审核中';
			}
			if($v->status==1){
				if($v->begintime<=$time && $v->endtime>=$time){
					$v->statustag='生效中';
				}else{
					$v->statustag='已失效';
				}
			}
			if($v->status==2){
				$v->statustag='审核失败';
			}	
            $Coupons=PayRecord::Where('couponid',$v->id)->Where('businessid',$v->businessid)->Where('status',1)->get();
            $v->useCouponsall=	count($Coupons);
			$v->payallmoney=$Coupons->sum('allmoney');
            $v->paymoney=$Coupons->sum('money');
            $v->paydecrease=$Coupons->sum('decrease');	
            $v->paydescore=$Coupons->sum('descore');		
            $v->paydescoremoney=$Coupons->sum('descoremoney');	
            $v->paypoundage=$Coupons->sum('poundage');			
			
		}
		$useCouponsalltotal=$data->sum('useCouponsall');
		$payallmoneytotal=$data->sum('payallmoney');
		$paymoneytotal=$data->sum('paymoney');
		$paydecreasetotal=$data->sum('paydecrease');
		$paydescoretotal=$data->sum('paydescore');
		$paydescoremoneytotal=$data->sum('paydescoremoney');
		$paypoundagetotal=$data->sum('paypoundage');
        return view('admin.member_offline_recharge.index', compact('data', 'status', 'businessid' , 'start_at', 'end_at','useCouponsalltotal','payallmoneytotal','paymoneytotal','paydecreasetotal','paydescoretotal','paydescoremoneytotal','paypoundagetotal'));
    }
}

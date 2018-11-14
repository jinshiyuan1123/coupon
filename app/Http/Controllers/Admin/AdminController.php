<?php

namespace App\Http\Controllers\Admin;

use App\Models\Drawing;
use App\Models\Recharge;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Member;
use App\Models\Dividend;
class AdminController extends Controller
{
    public function index()
    {
		$modRecharge = new Recharge();
		$beginToday=date("Y-m-d H:i:s",mktime(0,0,0,date('m'),date('d'),date('Y')));
        $endToday=date("Y-m-d H:i:s",mktime(0,0,0,date('m'),date('d')+1,date('Y'))-1);
	    //今日充值笔数
		$jrczbs=Recharge::where('status', 2)->where('confirm_at', '>=',$beginToday )->where('confirm_at', '<=',$endToday )->count();
		 //今日出款笔数
		$jrckbs=Drawing::where('status', 2)->where('confirm_at', '>=',$beginToday )->where('confirm_at', '<=',$endToday )->count();
		//今日送出红利笔数
		$jrschlbs=Dividend::where('created_at', '>=',$beginToday )->where('created_at', '<=',$endToday )->count();
		//今日注册人数
		$jrzcrs=Member::where('created_at', '>=',$beginToday )->where('created_at', '<=',$endToday )->count();
		//总注册人数
		$zcrs=Member::count();
		//今日充值金额
		$jrczje=Recharge::where('status', 2)->where('confirm_at', '>=',$beginToday )->where('confirm_at', '<=',$endToday )->sum('money');
		//平台总充值
		$czje=Recharge::where('status', 2)->sum('money');
		//今日出款金额
		$jrckje=Drawing::where('status', 2)->where('confirm_at', '>=',$beginToday )->where('confirm_at', '<=',$endToday )->sum('money');
		//平台总出款
		$ckje=Drawing::where('status', 2)->sum('money');
		//今日送出红利金额
		$jrschlje=Dividend::where('created_at', '>=',$beginToday )->where('created_at', '<=',$endToday )->sum('money');
		//平台总红利
		$schlje=Dividend::sum('money');
        return view('admin.index',compact('data','jrczbs','jrckbs','jrschlbs','jrzcrs','zcrs','jrczje','czje','jrckje','ckje','jrschlje','schlje'));
    }

    public function hk_notice()
    {
        $return['status'] = 0;
        if (Recharge::where('status', 1)->count() > 0)
            $return['status'] = 1;

        return $return;
    }

    public function tk_notice()
    {
        $return['status'] = 0;
        if (Drawing::where('status', 1)->count() > 0)
            $return['status'] = 1;

        return $return;
    }
}

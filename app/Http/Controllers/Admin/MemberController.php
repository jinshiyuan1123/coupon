<?php

namespace App\Http\Controllers\Admin;

use App\Models\Dividend;
use App\Models\Drawing;
use App\Models\GameRecord;
use App\Models\Recharge;
use App\Models\Transfer;
use Illuminate\Http\Request;
use App\Models\Member;
use Auth;
use App\Models\AdminActionMoneyLog;
use App\Models\MemberLoginLog;
use App\Models\ScoreLog;
use App\Models\PayRecord;
use App\Models\userecord;
class MemberController extends AdminBaseController
{
    public function index(Request $request)
    {
        $mod = new Member();
        $name = $id = $status = $register_ip = $on_line = '';
        if ($request->has('id'))
        {
            $id = $request->get('id');
            $mod = $mod->where('id',$id);
        }		
        if ($request->has('name'))
        {
            $name = $request->get('name');
            $mod = $mod->where('name', 'like', "%$name%");
        }
        if ($request->has('register_ip'))
        {
            $register_ip = $request->get('register_ip');
            $mod = $mod->where('register_ip', 'like', "%$register_ip%");
        }
        if ($request->has('status'))
        {
            $status = $request->get('status');
            $mod = $mod->where('status', $status);
        }
        if ($request->has('on_line'))
        {
            $on_line = $request->get('on_line');
            if ($on_line == 1)
            {
                $_online_member_array = MemberLoginLog::where('created_at', '>=', date('Y-m-d H:i:s', strtotime('-3 hours')))->pluck('member_id')->toArray();
                $mod = $mod->whereIn('id', $_online_member_array);
            }

        }

        $data = $mod->orderBy('created_at', 'desc')->paginate(config('admin.page-size'));

        return view('admin.member.index', compact('data', 'name', 'status', 'register_ip', 'on_line'));
    }

    public function assign($id)
    {
        $data = Member::findOrFail($id);
        $daili_list = Member::where('is_daili', 1)->pluck('name', 'id')->toArray();

        return view('admin.member.assign', compact('data', 'daili_list'));
    }

    public function post_assign(Request $request, $id)
    {
        if (!$request->has('top_id'))
            return responseWrong('请选择 代理');

        $member = Member::findOrFail($id);
        $member->update([
            'top_id' => $request->get('top_id')
        ]);

        return responseSuccess('', '分配代理成功', route('member.index'));
    }

    public function showGameRecordInfo(Request $request, $id)
    {
        $mod = new ScoreLog();
        $start_at = $end_at = $api_type ='';
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

        $mod = $mod->where('uid', $id);

        $data = $mod->orderBy('created_at', 'desc')->paginate(config('admin.page-size'));


        $total_score = $mod->sum('score');

        return view('admin.member.showGameRecordInfo', compact('data','start_at', 'end_at', 'total_score',  'id'));
    }

    public function showRechargeInfo(Request $request, $id)
    {
        $mod = new PayRecord();



        $mod = $mod->where('member_id', $id);

        $data = $mod->orderBy('created_at', 'asc')->paginate(config('admin.page-size'));

        $total_recharge = $mod->sum('money');

        return view('admin.member.showRechargeInfo', compact('data', 'total_recharge', 'id'));
    }

    public function showDrawingInfo(Request $request, $id)
    {
        $mod = new Drawing();

        $status = '';

        if ($request->has('status'))
        {
            $status = $request->get('status');
            $mod = $mod->where('status', $status);
        }
        $mod = $mod->where('member_id', $id);

        $data = $mod->orderBy('created_at', 'asc')->paginate(config('admin.page-size'));

        $total_money = $mod->sum('money');
        $total_counter_fee = $mod->sum('counter_fee');

        return view('admin.member.showDrawingInfo', compact('data', 'status', 'total_money', 'total_counter_fee', 'id'));
    }

    public function showDividendInfo(Request $request, $id)
    {
        $mod = new Userecord();


        $mod = $mod->where('businessid', $id);

        $data = $mod->orderBy('created_at', 'asc')->paginate(config('admin.page-size'));

        $allmomey = $mod->sum('allmomey');
		$decrease = $mod->sum('decrease');
		$paymomey = $mod->sum('paymomey');
		$ratemoney = $mod->sum('ratemoney');
		$businessimoney = $mod->sum('businessimoney');
		$score = $mod->sum('score');

        return view('admin.member.showDividendInfo', compact('data','allmomey', 'decrease','paymomey','ratemoney','businessimoney','score','id'));
    }

    public function checkBalance($id)
    {
        $data = Member::FindOrFail($id);

        return view('admin.member.checkBalance', compact('data', 'id'));
    }

    public function showTransfer(Request $request, $id)
    {
        $mod = new Transfer();
        $name = $type = $transfer_type = $transfer_in_account = $transfer_out_account = $start_at = $end_at = '';
        if ($request->has('name'))
        {
            $name = $request->get('name');
            $m_list = Member::where('name', 'LIKE', "%$name%")->pluck('id');
            $mod = $mod->whereIn('member_id', $m_list);
        }
        if ($request->has('transfer_in_account'))
        {
            $transfer_in_account = $request->get('transfer_in_account');
            $mod = $mod->where('transfer_in_account', 'LIKE', "%$transfer_in_account%");
        }
        if ($request->has('transfer_out_account'))
        {
            $transfer_out_account = $request->get('transfer_out_account');
            $mod = $mod->where('transfer_out_account', 'LIKE', "%$transfer_in_account%");
        }
        if ($request->has('transfer_type'))
        {
            $transfer_type = $request->get('transfer_type');
            $mod = $mod->where('transfer_type', $transfer_type);
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

        $mod = $mod->where('member_id', $id);
        $total_money = $mod->sum('money');
        $total_diff_money = $mod->sum('diff_money');

        $data = $mod->orderBy('created_at', 'desc')->paginate(config('admin.page-size'));

        return view('admin.member.showTransfer', compact('data', 'name', 'transfer_in_account', 'transfer_out_account', 'transfer_type', 'start_at', 'end_at', 'total_money', 'total_diff_money', 'id'));
    }

    public function export(Request $request)
    {
        $map = [];
        if ($request->has('name'))
        {
            $name = $request->get('name');
            $map['name'] = ['name', 'like', "%$name%"];
        }

        if ($request->has('realname'))
        {
            $realname = $request->get('realname');
            $map['realname'] = ['realname', 'like', "%$realname%"];
        }

        //默认不显示超级管理员
        $map['is_super_admin'] = 0;
        $data = MemberRepository::getByWhere($map)->toArray();

        Excel::create('测试', function ($excel) use ($data) {
            $excel->sheet('Sheetname', function ($sheet) use ($data) {
                $sheet->rows(
                    $data
                );
            });
        })->download('xls');
    }

    public function create()
    {
        return view('admin.member.create');
    }

    /**
     *
     * 创建
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validator = $this->verify($request, 'member.store');

        if ($validator->fails())
        {
            $messages = $validator->messages()->toArray();
            return responseWrong($messages);
        }

        $data = $request->all();

        Member::create($data);

        return responseSuccess('','', route('member.index'));
    }

    /**
     *
     * 编辑
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $data= Member::findOrFail($id);

        return view('admin.member.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
//        $validator = $this->verify($request, 'member.update');
//
//        if ($validator->fails())
//        {
//            $messages = $validator->messages()->toArray();
//            return responseWrong($messages);
//        }

        if ($request->has('qk_pwd'))
        {
            $q = (string)$request->get('qk_pwd');
            if (!is_numeric($request->get('qk_pwd')) || strlen($q) != 6)
                return responseWrong('取款密码为6位数字');
        }

        $member= Member::findOrFail($id);
        $old_money = $member->money;
        $old_fs_money = $member->fs_money;
        $new_money = $request->get('money');
        $new_fs_money = $request->get('fs_money');
        if (!$request->has('password'))
        {
            if ($request->has('qk_pwd'))
                $member->update([
                    'money' => $request->get('money'),
                    'fs_money' => $request->get('fs_money'),
                    'email' => $request->get('email'),
                    'phone' => $request->get('phone'),
                    'qk_pwd' => $request->get('qk_pwd'),
                    'bank_username' => $request->get('bank_username'),
                    'bank_name' => $request->get('bank_name'),
                    'bank_branch_name' => $request->get('bank_branch_name'),
                    'bank_card' => $request->get('bank_card'),
                    'bank_address' => $request->get('bank_address'),

                ]);
            else
                $member->update([
                    'money' => $request->get('money'),
                    'fs_money' => $request->get('fs_money'),
                    'email' => $request->get('email'),
                    'phone' => $request->get('phone'),
                    'bank_username' => $request->get('bank_username'),
                    'bank_name' => $request->get('bank_name'),
                    'bank_branch_name' => $request->get('bank_branch_name'),
                    'bank_card' => $request->get('bank_card'),
                    'bank_address' => $request->get('bank_address'),
                ]);
        }else{
            $data = $request->all();
            $data['o_password'] = $request->get('password');
            $member->update($data);
        }

        //如果
        if ($old_money != $new_money || $old_fs_money != $new_fs_money)
        {
            $user = \Auth::user();
            AdminActionMoneyLog::create([
                'member_id' => $member->id,
                'user_id' => $user->id,
                'old_money' => $old_money,
                'new_money' => $new_money,
                'old_fs_money' => $old_fs_money,
                'new_fs_money' => $new_fs_money
            ]);

            //红利记录
            if ($old_fs_money != $new_fs_money)
            {
                Dividend::create([
                    'member_id' => $member->id,
                    'type' => 1,
                    'money' => $new_fs_money - $old_fs_money,
                    'describe' => '管理员派送金额',
//                        'before_money' => $mod->member->money,
//                        'after_money' => $mod->member->money + $data['money'],
                    'status' => 1
                ]);
            }
        }

        return responseSuccess('','', route('member.index'));
    }

    public function destroy($id)
    {
        Member::destroy($id);

        return respS();
    }

    public function check($id, $status)
    {
        $mod = Member::findOrFail($id);
        $mod->update([
            'status' => $status
        ]);

        return respS();
    }
}

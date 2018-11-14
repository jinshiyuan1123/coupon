<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Web\WebBaseController;
use App\Models\Api;
use App\Models\GameRecord;
use App\Models\Member;
use App\Models\MemberAPi;
use App\Models\Transfer;
use App\Services\BiService;
use App\Services\EgService;
use App\Services\TcgService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class EgController extends WebBaseController
{
    protected $service,$api;
    public function __construct()
    {
        $this->service = new EgService();
        $this->api = Api::where('api_name', 'EG')->first();
    }

    public function register($platformCode, $username)
    {
        $res = $this->service->register($platformCode , $username);
    }

    public function balance($username, $password)
    {
        //检查账号是否注册
        $member = Member::where('name', $username)->first();
        $member_api = $member->apis()->where('api_id', $this->api->id)->first();

        $return = [
            'Code' => 0,
            'Message' => 'success',
            'url' => '',
            'Data' => '',
        ];

        if (!$member_api)
        {
            $res = json_decode($this->service->register($this->api->prefix.$username, $password), TRUE);
            if ($res['Code'] != 1101)
            {
                $return['Code'] = $res['Code'];
                $return['Message'] = '开通失败！错误 '.$res['Msg'].' 请联系客服';

                return $return;
            }

            //创建api账号
            $member_api = MemberAPi::create([
                'member_id' => $member->id,
                'api_id' => $this->api->id,
                'username' => $this->api->prefix.$member->name,
                'password' => $member->original_password
            ]);
        }

        $res = json_decode($this->service->balance($this->api->prefix.$username, $password), TRUE);

        if ($res['Code'] == 1101)
        {
            $member_api->update([
                'money' => $res['Data']
            ]);
            $return['Data'] = $res['Data'];
            $return['Code'] = 0;
        } else {
            $return['Data'] = 0;
        }

        return $return;
    }

    //存钱
    public function deposit($username, $password,$amount, $amount_type = 'money')
    {
        //检查账号是否注册
        $member = Member::where('name', $username)->first();
        $member_api = $member->apis()->where('api_id', $this->api->id)->first();

        $return = [
            'Code' => 0,
            'Message' => 'success',
            'url' => '',
            'Data' => '',
        ];

        if (!$member_api)
        {
            $res = json_decode($this->service->register($this->api->prefix.$username, $password), TRUE);
            if ($res['Code'] != 1101)
            {
                $return['Code'] = $res['Code'];
                $return['Message'] = '开通失败！ '.$res['Msg'].' 请联系客服';

                return $return;
            }

            //创建api账号
            $member_api = MemberAPi::create([
                'member_id' => $member->id,
                'api_id' => $this->api->id,
                'username' => $this->api->prefix.$member->name,
                'password' => $member->original_password
            ]);
        }
        //判断余额
        if ($amount_type == 'money')
        {
            if ($member->money < $amount)
            {
                $return['Code'] = -1;
                $return['Message'] = '账户余额不足';
                return $return;
            }
        } else {
            if ($member->fs_money < $amount)
            {
                $return['Code'] = -1;
                $return['Message'] = '账户余额不足';
                return $return;
            }
        }

        //判断接口是否有钱
        $api_money = $this->api->api_money;

        if ($api_money < $amount)
        {
            $return['Code'] = -2;
            $return['Message'] = '接口余额不足';
            return $return;
        }

        //先扣除用户余额
        $member->decrement($amount_type , $amount);

        $bill_no = getBillNo();
        $result = $this->service->transfer($this->api->prefix.$username,$password,$amount, 'IN');
        $res = json_decode($result, TRUE);


        if (is_array($res) && $res['Code'] == 1101)
        {
            try{
                DB::transaction(function() use($member_api, $res,$amount_type,$amount,$member,$result,$bill_no,$return) {
                    //平台账户
                    $member_api->increment('money', $amount);
                    //额度转换记录
                    Transfer::create([
                        'bill_no' => $bill_no,
                        'api_type' => $member_api->api_id,
                        'member_id' => $member->id,
                        'transfer_type' => 0,
                        'money' => $amount,
                        'transfer_in_account' => $member_api->api->api_name.'账户',
                        'transfer_out_account' => $amount_type == 'money'?'中心账户':'返水账户',
                        'result' => $result
                    ]);
                    //修改api账号余额
                    $this->api->decrement('api_money' , $amount);
                    $return['Code'] = 0;
                });
            }catch(\Exception $e){
                DB::rollback();
                //退回用户
                $member->increment($amount_type , $amount);
            }
        }else {
            //退回用户
            $member->increment($amount_type , $amount);
            $return['Code'] = $res['Code'];
            $return['Message'] = '错误 '.$res['Msg'].' 请联系客服';
        }

        return $return;
    }

    public function withdrawal($username,$password, $amount, $amount_type = 'money')
    {
        //检查账号是否注册
        $member = Member::where('name', $username)->first();
        $member_api = $member->apis()->where('api_id', $this->api->id)->first();

        $return = [
            'Code' => 0,
            'Message' => 'success',
            'url' => '',
            'Data' => '',
        ];

        if (!$member_api)
        {
            $res = json_decode($this->service->register($this->api->prefix.$username, $password), TRUE);
            if ($res['Code'] != 1101)
            {
                $return['Code'] = $res['Code'];
                $return['Message'] = '开通失败！ '.$res['Msg'].' 请联系客服';

                return $return;
            }

            //创建api账号
            $member_api = MemberAPi::create([
                'member_id' => $member->id,
                'api_id' => $this->api->id,
                'username' => $this->api->prefix.$member->name,
                'password' => $member->original_password
            ]);
        }

        if ($member_api->money < $amount)
        {
            $return['Code'] = -1;
            $return['Message'] = '余额不足';
            return $return;
        }

        $bill_no = getBillNo();
        $result = $this->service->transfer($this->api->prefix.$username,$password,$amount, 'OUT');
        $res = json_decode($result, TRUE);

        if (is_array($res) && $res['Code'] == 1101)
        {
            try{
                DB::transaction(function() use($member_api, $res,$amount_type,$amount,$member,$result,$bill_no,$return) {
                    //平台账户
                    $member_api->decrement('money' , $amount);
                    //个人账户
                    $member->increment($amount_type , $amount);
                    //额度转换记录
                    Transfer::create([
                        'bill_no' => $bill_no,
                        'api_type' => $member_api->api_id,
                        'member_id' => $member->id,
                        'transfer_type' => 1,
                        'money' => $amount,
                        'transfer_in_account' => $amount_type == 'money'?'中心账户':'返水账户',
                        'transfer_out_account' => $member_api->api->api_name.'账户',
                        'result' => $result
                    ]);
                    //修改api账号余额
                    $this->api->increment('api_money' , $amount);
                    $return['Code'] = 0;
                });
            }catch(\Exception $e){
                DB::rollback();
            }
        }else {
            $return['Code'] = $res['Code'];
            $return['Message'] = '错误代码 '.$res['Code'].' 请联系客服';
        }

        return $return;
    }

    public function login(Request $request){
        //检查账号是否注册
        $member = $this->getMember();
        $username = $member->name;
        $password = $member->original_password;
        $member_api = $member->apis()->where('api_id', $this->api->id)->first();

        $return = [
            'Code' => 0,
            'Message' => 'success',
            'url' => '',
            'Data' => '',
        ];

        if (!$member_api)
        {
            $res = json_decode($this->service->register($this->api->prefix.$username, $password), TRUE);
            if ($res['Code'] != 1101)
            {
                $return['Code'] = $res['Code'];
                $return['Message'] = '开通失败！ '.$res['Code'].' 请联系客服';

                return $return;
            }

            //创建api账号
            $member_api = MemberAPi::create([
                'member_id' => $member->id,
                'api_id' => $this->api->id,
                'username' => $this->api->prefix.$member->name,
                'password' => $member->original_password
            ]);
        }

        $fc_id = $request->get('fc_id')?:0;
        $device = $request->get('device')?:0;
        $result = $this->service->login($this->api->prefix.$username,$password, $fc_id, $device);
        $res = json_decode($result, TRUE);
        if ($res['Code'] == 1101)
        {
            $url = $res['Data'];
            return redirect()->to($url);
        } else {
            echo '错误 '.$res['Msg'].' 请联系客服';exit;
        }
    }

    public function game_record()
    {
        return view('api.getRecord_eg');
    }
    public function game_record_3d()
    {
        return view('api.getRecord_eg_3d');
    }

    public function game_record_pl3()
    {
        return view('api.getRecord_eg_pl3');
    }

    public function game_record_6hc()
    {
        return view('api.getRecord_eg_6hc');
    }

    public function getGameRecord($startTime, $endTime, $fc_type,$fc_id,$PageIndex)
    {
        $res = $this->service->betrecord($startTime, $endTime, $fc_type,$fc_id,$PageIndex);

        return json_decode($res, TRUE);
    }
}

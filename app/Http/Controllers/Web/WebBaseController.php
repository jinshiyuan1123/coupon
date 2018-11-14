<?php

namespace App\Http\Controllers\Web;

use App\Models\Member;
use App\Models\SystemConfig;
use App\Services\UcpaasService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\ValidationTrait;
use Auth;
use Gregwar\Captcha\CaptchaBuilder;
use Session;
class WebBaseController extends Controller
{
    use ValidationTrait;

    public function getMember()
    {
        return auth('member')->user();
    }

    public function captcha($tmp)
    {
        //生成验证码图片的Builder对象，配置相应属性
        $builder = new CaptchaBuilder;
        //可以设置图片宽高及字体
        $builder->build($width = 100, $height = 40, $font = null);
        //获取验证码的内容
        $phrase = $builder->getPhrase();

        //把内容存入session
        Session::flash('milkcaptcha', $phrase);
        //生成图片
        header("Cache-Control: no-cache, must-revalidate");
        header('Content-Type: image/jpeg');
        $builder->output();
    }

  /*  public function sendSms(Request $request)
    {
        $phone = $request->get('phone');
        if (!preg_match('/^1[34578]\d{9}$/', $phone))
        {
            return responseWrong('请输入正确的手机号码');
        }

        //判断该手机是否已经绑定账号
        if (Member::where('phone', $phone)->first())
            return responseWrong('该手机号已绑定过账号');

        $sys = SystemConfig::find(1);

        //发送短信
        $v_sms = rand(1000, 9999);

        $option = [
            'option' => [
                'accountsid' => $sys->sms_id,
                'token' => $sys->sms_token
            ],
            'appId' => $sys->sms_key
        ];

        $ucpass = new UcpaasService($option['option']);

        $appId = $sys->sms_key;
        $to = $phone;
        $templateId = $sys->sms_temp_id;
        $param=$v_sms;
        //Session::put('phone_v_code', $v_sms);
        session(['phone_v_code' => $v_sms]);
        //echo $ucpass->templateSMS($appId,$to,$templateId,$param);exit;
        $res = json_decode($ucpass->templateSMS($appId,$to,$templateId,$param), TRUE);
        if ($res['resp']['respCode'] != 000000)
            return responseWrong('发送失败，请稍后重试');

        return responseSuccess('', '发送成功！');
    }*/
    public function sendSms(Request $request)
    {
        $phone = $request->get('phone');
        if (!preg_match('/^1[34578]\d{9}$/', $phone))
        {
            return responseWrong('请输入正确的手机号码');
        }


        $sys = SystemConfig::find(1);

        //发送短信
        $v_sms = rand(1000, 9999);

        session(['phone_v_code' => $v_sms]);
		$statusStr = array(		
		"0" => "短信发送成功",
		"-1" => "参数不全",
		"-2" => "服务器空间不支持,请确认支持curl或者fsocket，联系您的空间商解决或者更换空间！",
		"30" => "密码错误",
		"40" => "账号不存在",
		"41" => "余额不足",
		"42" => "帐户已过期",
		"43" => "IP地址限制",
		"50" => "内容含有敏感词"
		);
		$smsapi = $sys->sms_url;
		$user = $sys->sms_id; //短信平台帐号
		$pass = md5($sys->sms_key); //短信平台密码
		//$phonecode=rand(0000,9999);
		$member = $this->getMember();
		$data['phonecode']=$v_sms;
		$content="【怪优惠】您的验证码为:".$v_sms;//要发送的短信内容
		$phone = $request->get('phone');//要发送短信的手机号码
		$sendurl = $smsapi."sms?u=".$user."&p=".$pass."&m=".$phone."&c=".urlencode($content);
		$result =file_get_contents($sendurl) ;
        return responseSuccess('', $statusStr[$result]);
    }	
	
}

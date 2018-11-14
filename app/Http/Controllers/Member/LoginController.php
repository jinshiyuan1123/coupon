<?php

namespace App\Http\Controllers\Member;

use App\Models\BlackListIp;
use App\Models\Member;
use App\Models\MemberLoginLog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Traits\ValidationTrait;
use Session;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers,ValidationTrait;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/member/dash';
    protected $username;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:member', ['except' => 'logout']);
        //$this->username = config('admin.global.username');
    }
    /**
     * 重写登录视图页面
     * @author 晚黎
     * @date   2016-09-05T23:06:16+0800
     * @return [type]                   [description]
     */
    public function showLoginForm()
    {
        return view('member.auth.login');
    }

    public function postLogin(Request $request)
    {
        if(session('milkcaptcha') != $request->get('captcha'))
            return responseWrong('验证码错误');

        $validator = $this->verify($request, 'member.login');

        if ($validator->fails())
        {
            $messages = $validator->messages()->toArray();
            return responseWrong($messages);
        }

        $member = Member::where('name', $request->name)->first();
        if ($member)
        {
            if ($member->status == 1)
                return responseWrong('该账号被禁用');
        }


        if (Auth::guard('member')->attempt(['name' => $request->name, 'password' => $request->password]))
        {
            //return respS('登录成功',  route('member.index'));
            $member = auth('member')->user();
//            $member->update([
//                'is_login' => 1
//            ]);
            //
            $member->last_session = Session::getId();
            $member->save();
            MemberLoginLog::create([
                'member_id' => $member->id,
                'ip' => $request->getClientIp()
            ]);
            return responseSuccess('', '登录成功', route('member.userCenter'));
        }
        return responseWrong('用户名或密码错误');
    }

    public function logout()
    {
//        $member = auth('member')->user();
//        $member->update([
//            'is_login' => 0
//        ]);
        Auth::guard('member')->logout();
        return redirect()->route('web.index');
    }

    /**
     * 自定义认证驱动
     * @author 晚黎
     * @date   2016-09-05T23:53:07+0800
     * @return [type]                   [description]
     */
//    protected function guard()
//    {
//        return auth()->guard('member');
//    }
}

@extends('wap.layouts.main')
@section('content')
    <div class="m_container">
        <div class="">
            <div class="m_login">
                <img src="{{ asset('/wap/images/bg_register.png') }}" alt="">
                <div class="m_login-form">
                    <form id="form1"  action="{{ route('wap.register.post') }}" method="post" name="form1">
                        <input type="hidden" name="i_code" value="{{ $i_code }}">
                        <div class="m_login-field">
                            <label class="m_need" for="">*账号</label>
                            <input id="name" name="name" type="text" placeholder="手机号码" minlength="11" maxlength="11">
                        </div>
                        <div class="m_login-field captcha">
                            <label class="m_need" for="">*验证码</label>
                            <input id="code" name="code" type="text" placeholder="手机验证码" minlength="4" maxlength="6">
                            <a href="javascript:;" class="sendMsg">发送验证码</a>
                        </div>						
                        <div class="m_login-field">
                            <label class="m_need" for="">*密码</label>
                            <input id="passwd" name="password" type="password" placeholder="密码" minlength="6" maxlength="14">
                        </div>
                        <div class="m_login-field">
                            <label class="m_need" for="">*昵称</label>
                            <input id="nichen" name="nichen" type="text" placeholder="昵称" maxlength="10">
                        </div>
                        <div class="m_login-field captcha">
                            <label class="m_need" for="">*验证码</label>
                            <input id="paypasswd" name="captcha" type="text" placeholder="">
                            <a onclick="javascript:re_captcha();" ><img src="{{ URL('kit/captcha/1') }}" id="c2c98f0de5a04167a9e427d883690ff6"></a>
                            <script>
                                function re_captcha() {
                                    $url = "{{ URL('kit/captcha') }}";
                                    $url = $url + "/" + Math.random();
                                    document.getElementById('c2c98f0de5a04167a9e427d883690ff6').src=$url;
                                }
                            </script>
                        </div>
                        <div class="m_login-field textRight">
                            <a href="{{ route('wap.login') }}" class="m_forget-pwd">已有账号?立即登录</a>
                        </div>
                        <div class="m_login-field">
                            <button type="submit" class="m_login-m_register ajax-submit-btn">立即注册</button>
                        </div>
						 <div class="m_login-field">
						 </div>
                        <div class="m_register-tips">
                            <h2>备注：</h2>
                            <p>标记有 * 者为必填项目。</p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        var set_phone_url = "{{ route('sendSms') }}";
        var commomModule = (function ($) {

            //验证码倒计时
            var codeCountDown = function ($me, time) {
                if (!$me.hasClass('active')) {
                    $me.time = time || 60;
                    $me.addClass('active');
                    $me.html('重新获取(' + $me.time + '秒)');
                    $me.timer = setInterval(function () {
                        $me.time--;
                        $me.html('重新获取(' + $me.time + '秒)');
                        if ($me.time == 0) {
                            clearInterval($me.timer);
                            $me.html('重发送验证码').removeClass('active');
                        }
                    }, 1000);
                } else {
                    return false;
                }
            };

            return {
                // scrollbarWidth: scrollbarWidth,$(this),60
                codeCountDown: codeCountDown
            }
        })(jQuery);

        (function($){
            $(function(){
                $('.sendMsg').on('click',function(){
                    var btn = $(this);
                    var phone = $('#name').val();
                    var myreg = /^1[34578]\d{9}$/;
                    if(!myreg.test(phone))
                    {
                        layer.open({
                            content: '请输入有效的手机号码',
                            //time: 1.5,
                            style: 'color: #333; background-color: #fff; width: auto'
                        });
                        return false;
                    }
                    $.ajax({
                        type: 'get',
                        url: set_phone_url,
                        data: {phone:phone},
                        dataType: "json",
                        success: function(data){
                            //layer.close(detailLoad);
                            btn.attr('disabled', false);

                            var html = '';
                            var obj = JSON.parse (data.status.msg);

                            for ( var p in obj )
                            {
                                if (typeof (obj[p]) == 'string')
                                {
                                    html+= '<p><b>'+ obj[p] + '</b></p>';
                                } else if(obj[p] instanceof Array)
                                {
                                    for (var i=0;i<obj[p].length;i++)
                                    {
                                        html+= '<p><b>'+ obj[p][i] + '</b></p>';
                                    }

                                }
                            }
                            //
                            if (data.status.errorCode == 0)
                            {
                                commomModule.codeCountDown(btn,60);
                                btn.attr('disabled', true);
                            }
                            layer.open({
                                content: html,
                                //time: 1.5,
                                style: 'color: #333; background-color: #fff; width: auto'
                            });

                        }
                    });
                });
            })
        })(jQuery)
    </script>		
@endsection
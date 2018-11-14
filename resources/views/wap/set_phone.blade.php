@extends('wap.layouts.main')
@section('content')
    <div class="m_container">
        <div class="">
            <div class="container-fluid gm_main">
                <div class="m_member-title clear textCenter">
                    <a class="pull-left" href="javascript:history.go(-1);">&nbsp;返回</a>
                    绑定手机号
                </div>
                <div class="m_userCenter-line"></div>
                <div class="userInfo setCard">
                    <form action="{{ route('wap.post_set_phone') }}" method="post" name="form1">
                        <dl>
                            <dt>会员信息</dt>
                            <dd>
                                <div class="pull-left">
                                    会员账户
                                </div>
                                <div class="pull-right">
                                    {{ $_member->name }}
                                </div>
                            </dd>
                        </dl>
                        <dl class="set_card">
                            <dt>
                                绑定电话 <br>
                            </dt>
                            <dd>
                                <div class="pull-left">
                                    电话号码
                                </div>
                                <input id="set_phone" class="pull-left" type="tel" placeholder="输入手机号码" name="phone" style="width: 42%" value="{{ $_member->phone }}">
                            </dd>
                            <dd>
                                <div class="pull-left">验证码</div>
                                <input id="code" class="pull-left" type="text" placeholder="输入验证码" name="code" style="width: 42%">
								<a href="javascript:;" class="sendMsg">发送验证码</a>
                            </dd>
                            <dd>
                                <input type="button" value="确定" class="submit_btn  ajax-submit-btn">
                            </dd>
                        </dl>
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
                            $me.html('重新发送验证码').removeClass('active');
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
                    var phone = $('#set_phone').val();
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
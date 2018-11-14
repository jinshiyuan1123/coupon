@extends('wap.layouts.main')
@section('content')
    @extends('wap.layouts.header')

    <div class="m_container">
        <div class="m_body">
            <div class="container-fluid gm_main">
                <div class="m_member-title clear textCenter">
                    <a class="pull-left" href="javascript:history.go(-1);">&nbsp;返回</a>
                    商家认证
                </div>
                <div class="m_userCenter-line"></div>
                <div class="userInfo setCard">
                    <form action="{{ route('wap.post_agent_apply') }}" method="post" name="form1">
                        <dl class="set_card">

                            <dd>
                                <div class="pull-left">
                                    姓名
                                </div>		
                                <input id="real_name" class="pull-left" type="tel" placeholder="姓名" name="real_name" value="{{$_member->real_name}}">
                            </dd>
                            <dd>
                                <div class="pull-left">
                                    名称
                                </div>		
                                <input id="Businessname" class="pull-left" type="tel" placeholder="商家名称" name="Businessname" value="{{$_member->Businessname}}">
                            </dd>
                            <dd>
                                <div class="pull-left">
                                    地址
                                </div>		
                                <input id="Businessaddress" class="pull-left" type="tel" placeholder="店铺地址" name="Businessaddress" value="{{$_member->Businessaddress}}">
                            </dd>								
                            <dd>
                                <div class="pull-left">
                                    手机
                                </div>
                                <input id="set_phone" class="pull-left" type="tel" placeholder="手机号码" name="set_phone" value="{{$_member->phone}}">
                            </dd>							
                            <dd>
                                <div class="pull-left">
                                    验证码
                                </div>
                                <input id="code" class="pull-left" type="text" placeholder="输入验证码" name="code" style="width: 30%">
								<a href="javascript:;" class="sendMsg">发送验证码</a>
                            </dd>							
                            <dd>
                                <div class="pull-left">
                                    身份证
                                </div>
                                <input id="idcard" class="pull-left" type="hidden"  name="idcard" value="">
                            </dd>							
                            <dd>
							<div class="js-reset-image" style="width:243px;height:153px;margin:0 auto"><img class="addimg-loading" src="{{ asset('/wap/images/addimg.png') }}" width="243px" height="153px" alt=""></div>

                            </dd>
                            <dd>
                                <div class="pull-left">
                                    营业执照
                                </div>
								<input id="Business" class="pull-left" type="hidden"  name="Business" value="">
                            </dd>							
                            <dd>
                              <div class="js-reset-image1" style="width:243px;height:153px;margin:0 auto"><img class="addimg-loading1" src="{{ asset('/wap/images/addimg.png') }}" width="243px" height="153px" alt=""></div>
                            </dd>
                            <dd>
                                <div class="pull-left">申请说明</div>
                                <textarea name="about" id="about" rows="10" placeholder="选填"></textarea>
                            </dd>
                            <dd>
                                <button type="button" class="submit_btn ajax-submit-btn">提交认证</button>
                            </dd>
                        </dl>
                    </form>
                </div>
            </div>
        </div>
    </div>
			<form id="uploadForm" action="{{ route('wap.uploads') }}" method="post"">
			{{csrf_field()}}
			<input style="display: none;" name="image" type="file" class="inputFile" />
			</form>	
			<form id="uploadForm1" action="{{ route('wap.uploads') }}" method="post"">
			{{csrf_field()}}
			<input style="display: none;" name="image1" type="file" class="inputFile" />
			</form>				
<script type="text/javascript">
$(function (e) {
    $("#uploadForm").on('submit', function(e){
        e.preventDefault();
        $.ajax({
            url: "{{ route('wap.uploads') }}",
            type: "POST",
            data:  new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            // 显示加载图片
            beforeSend: function () {
                $('.addimg-loading').attr('src', '{{ asset('/wap/images/loading.gif') }}');
            },
            success: function (data) {
                // 预览
                $('.addimg-loading').attr('src', '/uploads/' + data.msg);
				$("#idcard").val('/uploads/' + data.msg);
            },
            error: function(){}             
        });
    });
    $("#uploadForm1").on('submit', function(e){
        e.preventDefault();
        $.ajax({
            url: "{{ route('wap.uploads') }}",
            type: "POST",
            data:  new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            // 显示加载图片
            beforeSend: function () {
                $('.addimg-loading1').attr('src', '{{ asset('/wap/images/loading.gif') }}');
            },
            success: function (data) {
                // 预览
                $('.addimg-loading1').attr('src', '/uploads/' + data.msg);
				$("#Business").val('/uploads/' + data.msg);
            },
            error: function(){}             
        });
    });	

    // 选择完要上传的文件后, 直接触发表单提交
    $('input[name=image]').on('change', function () {
        // 如果确认已经选择了一张图片, 则进行上传操作
        if ($.trim($(this).val())) {
            $("#uploadForm").trigger('submit');
        }
    });
    // 选择完要上传的文件后, 直接触发表单提交
    $('input[name=image1]').on('change', function () {
        // 如果确认已经选择了一张图片, 则进行上传操作
        if ($.trim($(this).val())) {
            $("#uploadForm1").trigger('submit');
        }
    });	

    // 触发文件选择窗口
    $('.js-reset-image').on('click', function () {
        $('input[name=image]').trigger('click');
    });
    // 触发文件选择窗口
    $('.js-reset-image1').on('click', function () {
        $('input[name=image1]').trigger('click');
    });	
});
</script>
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
<?php $__env->startSection('content'); ?>
<script type="text/javascript" src="<?php echo e(asset('/wap/js/area.js')); ?>"></script>
    <div class="m_container">
        <div class="m_body2">
            <div class="container-fluid gm_main">
                <div class="m_member-title clear textCenter">
                    <a class="pull-left" href="javascript:history.go(-1);">&nbsp;返回</a>
                    收货地址
                </div>
                <div class="m_userCenter-line"></div>
                <div class="userInfo setCard">
                    <form action="<?php echo e(route('wap.post_address')); ?>" method="post" name="form1">
                        <dl>
                            <dt>收货人信息</dt>
                            <dd>
                                <div class="pull-left">
                                    会员账户
                                </div>
                                <div class="pull-right">
                                    <?php echo e($_member->name); ?>

                                </div>
                            </dd>
                            <dd>
                                <div class="pull-left">
                                    收货地址
                                </div>
                                <div class="pull-right">
                                   <?php echo e($_member->address1); ?> - <?php echo e($_member->address2); ?> - <?php echo e($_member->address3); ?> - <?php echo e($_member->address4); ?> - <?php echo e($_member->addressname); ?> - <?php echo e($_member->addressphone); ?>

                                </div>
                            </dd>							
                        </dl>
				
                        <dl class="set_card">
                            <dt>
                                收货信息修改 <br>
                            </dt>
                            <dd>
                                <div class="pull-left">收货人</div>
                                <input id="addressname" class="pull-left" type="text" placeholder="收货人" name="addressname" value="<?php echo e($_member->addressname); ?>">
                            </dd>						
                            <dd>
                                <div class="pull-left">
                                    省
                                </div>
                                <select id="s_province" name="address1">
								   
								</select>     
                            </dd>
                            <dd>
                                <div class="pull-left">市</div>
                                <select id="s_city" name="address2" ></select> 
                            </dd>
                            <dd>
                                <div class="pull-left">县/区</div>
                                <select id="s_county" name="address3"></select>
                            </dd>
                            <dd>
                                <div class="pull-left">街道/门牌号</div>
                                <input class="pull-left" type="text" placeholder="街道/门牌号" name="address4" value="<?php echo e($_member->address4); ?>">
                            </dd>							
                            <?php if($_system_config->is_sms_on == 0): ?>
                            <dd>
                                <div class="pull-left">手机号</div>
                                <input id="addressphone" class="pull-left m_phone" type="text" placeholder="手机号" name="addressphone" value="<?php echo e($_member->addressphone); ?>">
                                <a href="javascript:;" class="sendMsg">发送验证码</a>
                            </dd>
                            <dd>
                                <div class="pull-left">验证码</div>
                                <input class="pull-left" type="text" placeholder="验证码" name="v_code">
                            </dd>
                            <?php endif; ?>
                            <dd>
                               <div id="show" style="width:100%"></div>
                            </dd>							
                            <dd>
                                <input type="button" value="确定" class="submit_btn ajax-submit-btn">
                            </dd>
                        </dl>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script class="resources library" src="area.js" type="text/javascript"></script>
    <script type="text/javascript">_init_area();</script>	
<script type="text/javascript">
function Gid($){
	return document.getElementById($);
}
var showArea = function(){
	Gid('show').innerHTML = "省" + Gid('s_province').value + " - 市" + 	
	Gid('s_city').value + " - 县/区" + 
	Gid('s_county').value + ""
							}
Gid('s_county').setAttribute('onchange','showArea()');
</script>	
    <script>
        var addressphone_url = "<?php echo e(route('sendSms')); ?>";
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
                    var phone = $('#addressphone').val();
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
                        url: addressphone_url,
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('wap.layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
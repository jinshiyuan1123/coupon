<?php $__env->startSection('content'); ?>
    <div class="m_container">
        <div class="m_body2">
            <div class="container-fluid gm_main">
                <div class="m_member-title clear textCenter">
                    <a class="pull-left" href="javascript:history.go(-1);">&nbsp;返回</a>
                    会员资料
                </div>
                <div class="m_userCenter-line"></div>
                <div class="userInfo">
                    <dl>
                        <dt>账户安全</dt>
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
                                头像
                            </div>
							<div class="pull-right">
	<style type="text/css">
		.normal{
		  margin:10px auto;
		  background-image: url(<?php echo e($_member->headpic); ?>);
		  background-position:center center;
		  width: 100px;
		  height: 100px;
		  border-radius: 50%;
		  background-size: 100px 100px;
		  background-repeat: no-repeat;
		  background-position-y: 9%;
		}
	</style>	
                <a href="<?php echo e(route('wap.upload')); ?>" class="c_blue"><div class="normal"></div></a>
				</div>
                        </dd>						
                        <dd>
                            <div class="pull-left">昵称</div>
                            <div class="pull-right">
                                <?php if($_member->nichen): ?>
                                    <a href="<?php echo e(route('wap.set_nichen')); ?>" class="c_blue"><?php echo e($_member->nichen); ?></a>
                                <?php else: ?>
                                    <a href="<?php echo e(route('wap.set_nichen')); ?>" class="c_blue">未设置</a>
                                <?php endif; ?>
                            </div>
                        </dd>						
                        <dd>
                            <div class="pull-left">手机号码</div>
                            <div class="pull-right">
                                <?php if($_member->phone): ?>
                                    <?php echo e($_member->phone); ?>

                                <?php else: ?>
                                    <a href="<?php echo e(route('wap.set_phone')); ?>" class="c_blue">未设置</a>
                                <?php endif; ?>
                            </div>
                        </dd>
                        <dd>
                            <div class="pull-left">注册时间</div>
                            <div class="pull-right"><?php echo e($_member->created_at); ?></div>
                        </dd>
                        <dd>
                            <div class="pull-left">最后登录时间</div>
                            <div class="pull-right"><?php echo e($_member->last_login_time); ?></div>
                        </dd>
                    </dl>
					    <dl>
                        <dt>收货地址 <span style="float:right">[<a href="<?php echo e(route('wap.address')); ?>" class="c_blue">修改</a>]</span></dt>
                        <dd>
                            <div class="pull-left">姓名</div>
                            <div class="pull-right"><?php echo e($_member->addressname); ?></div>
                        </dd>
                        <dd>
                            <div class="pull-left">电话</div>
                            <div class="pull-right">
                                <?php if($_member->addressphone): ?>
                                    <?php echo e($_member->addressphone); ?>

                                <?php else: ?>
                                    <a href="<?php echo e(route('wap.address')); ?>" class="c_blue">未设置</a>
                                <?php endif; ?>
                            </div>
                        </dd>						
                        <dd>
                            <div class="pull-left">省</div>
                            <div class="pull-right">
                                <?php if($_member->address1): ?>
                                    <?php echo e($_member->address1); ?>

                                <?php else: ?>
                                    <a href="<?php echo e(route('wap.address')); ?>" class="c_blue">未设置</a>
                                <?php endif; ?>
                            </div>
                        </dd>
                        <dd>
                            <div class="pull-left">市</div>
                            <div class="pull-right">
                                <?php if($_member->address2): ?>
                                    <?php echo e($_member->address2); ?>

                                <?php else: ?>
                                    <a href="<?php echo e(route('wap.address')); ?>" class="c_blue">未设置</a>
                                <?php endif; ?>
                            </div>
                        </dd>
                        <dd>
                            <div class="pull-left">县/区</div>
                            <div class="pull-right">
                                <?php if($_member->address3): ?>
                                    <?php echo e($_member->address3); ?>

                                <?php else: ?>
                                    <a href="<?php echo e(route('wap.address')); ?>" class="c_blue">未设置</a>
                                <?php endif; ?>
                            </div>
                        </dd>
                        <dd>
                            <div class="pull-left">详细地址</div>
                            <div class="pull-right">
                                <?php if($_member->address4): ?>
                                    <?php echo e($_member->address4); ?>

                                <?php else: ?>
                                    <a href="<?php echo e(route('wap.address')); ?>" class="c_blue">未设置</a>
                                <?php endif; ?>
                            </div>
                        </dd>						
                    </dl>					

					<!---    <dl>
                        <dt>提现信息</dt>
                        <dd>
                            <div class="pull-left">开户姓名</div>
                            <div class="pull-right"><?php echo e($_member->real_name); ?></div>
                        </dd>
                        <dd>
                            <div class="pull-left">提款银行</div>
                            <div class="pull-right">
                                <?php if($_member->bank_name): ?>
                                    <?php echo e($_member->bank_name); ?>

                                <?php else: ?>
                                    <a href="<?php echo e(route('wap.bind_bank')); ?>" class="c_blue">未设置</a>
                                <?php endif; ?>
                            </div>
                        </dd>
                        <dd>
                            <div class="pull-left">银行账户</div>
                            <div class="pull-right">
                                <?php if($_member->bank_card): ?>
                                    <?php echo e($_member->bank_card); ?>

                                <?php else: ?>
                                    <a href="<?php echo e(route('wap.bind_bank')); ?>" class="c_blue">未设置</a>
                                <?php endif; ?>
                            </div>
                        </dd>
                        <dd>
                            <div class="pull-left">开户银行地址</div>
                            <div class="pull-right">
                                <?php if($_member->bank_address): ?>
                                    <?php echo e($_member->bank_address); ?>

                                <?php else: ?>
                                    <a href="<?php echo e(route('wap.bind_bank')); ?>" class="c_blue">未设置</a>
                                <?php endif; ?>
                            </div>
                        </dd>
                    </dl>--->
                </div>

            </div>
        </div>
    </div>
    
        
            
            
            
            
                
                
            
        
    
    <script>
        (function ($) {
            var $loading_img="<?php echo e(asset('/wap/images/loading.gif')); ?>";
            var $refresh_img="<?php echo e(asset('/wap/images/user_refresh.png')); ?>";
            $(function () {
                $('.api_check').on('click', function () {
                    var $img = $(this).find('img');
                    var $uri=$(this).attr('data-uri');
                    var $span=$(this).prev('.balance_span');
                    $img.attr('src',$loading_img);
                    $.get($uri, function (data) {
                        //data = JSON.parse(data)
                        $img.attr('src',$refresh_img);
                        $span.html(data.Data + '元');
                    });
                });
            });
        })(jQuery);
    </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('wap.layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->startSection('content'); ?>
    <div class="m_container">
        <div class="">
            <div class="container-fluid gm_main">
                <div class="m_member-title clear textCenter">
                    <a class="pull-left" href="javascript:history.go(-1);">&nbsp;返回</a>
                    设置
                </div>
                <div class="m_userCenter-line"></div>

           <div class="m_userCenter">
          
                <ul class="m_userCenter-list">
                    <li>
                        <a href="<?php echo e(route('wap.userinfo')); ?>">
                            <img class="trade-icon" src="<?php echo e(asset('/wap/images/aside_8.png')); ?>" alt="">
                            个人资料
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('wap.reset_password')); ?>">
                            <img class="trade-icon" src="<?php echo e(asset('/wap/images/aside_9.png')); ?>" alt="">
                            修改密码
                        </a>
                    </li>	
					<li>
                        <a href="javascript:;" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
						<img class="trade-icon" src="<?php echo e(asset('/wap/images/loginout.png')); ?>" alt="">
													 登出
						</a>						
                    </li>	
                <form id="logout-form" action="<?php echo e(route('wap.logout')); ?>" method="POST" style="display: none;">
                    <?php echo e(csrf_field()); ?>

                </form>					
				</ul>	
            </div>					

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('wap.layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->startSection('content'); ?>
</div>
    <div class="m_container">	
        <div class="m_body">
   <!--消息通知start-->			
            <div class="m_notice">
                <div class="notice_content" style="margin:0 auto">
                    <marquee id="mar0" behavior="scroll" direction="left" scrollamount="4">
					<?php if(count($notice)>0): ?>
                        <?php $__currentLoopData = $notice; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="module" style="display: inline;word-break: keep-all;white-space: nowrap;">
                                <span>~亲爱的用户，您获得了<?php echo e($v->notice); ?>劵~</span>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					<?php else: ?>
                            <div class="module" style="display: inline;word-break: keep-all;white-space: nowrap;">
                                <span>~暂无消息~</span>
                            </div>						
                    <?php endif; ?>						
                    </marquee>
                </div>
            </div>	
<!--消息通知end-->	
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
                <a href="<?php echo e(route('wap.userinfo')); ?>" class="c_blue"><div class="normal"></div></a>
				<div class="nichen">
				                <?php if($_member->nichen): ?>
                                    <a href="<?php echo e(route('wap.userinfo')); ?>" class="c_blue"><?php echo e($_member->nichen); ?></a>
                                <?php else: ?>
                                    <a href="<?php echo e(route('wap.set_nichen')); ?>" class="c_blue">未设置昵称</a>
                                <?php endif; ?>
				</div>
		
            <div class="m_userCenter">
          
                <ul class="m_userCenter-list">
                    <li>
                        <a href="<?php echo e(route('wap.mycard')); ?>">
                            <img class="trade-icon" src="<?php echo e(asset('/wap/images/aside_4.png')); ?>" alt="">
                            我的券
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('wap.myscore')); ?>">
                            <img class="trade-icon" src="<?php echo e(asset('/wap/images/aside_3.png')); ?>" alt="">
                            我的积分
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('wap.mymoments')); ?>">
                            <img class="trade-icon" src="<?php echo e(asset('/wap/images/aside_7.png')); ?>" alt="">
                            我的动态
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('wap.mymessage')); ?>">
                            <img class="trade-icon" src="<?php echo e(asset('/wap/images/aside_12.png')); ?>" alt="">
                            @我的留言
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('wap.agent')); ?>">
                            <img class="trade-icon" src="<?php echo e(asset('/wap/images/m_userCenter-icon9.png')); ?>" alt="">
                            商家中心
                        </a>
                    </li>					
                    <li>
                        <a href="<?php echo e(route('wap.drawing_record')); ?>">
                            <img class="trade-icon" src="<?php echo e(asset('/wap/images/aside_8.png')); ?>" alt="">
                            设置
                        </a>
                    </li>			
                    <li>
                        <a href="">
                            <img class="trade-icon" src="<?php echo e(asset('/wap/images/aside_10.png')); ?>" alt="">
                            客服：<?php echo e($_system_config->phone1); ?>

                        </a>
                    </li>

                </ul>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('wap.layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->startSection('content'); ?>
    <div class="m_container">
        <div class="m_body2">
            <div class="container-fluid gm_main">
                <div class="m_member-title clear textCenter">
                    <a class="pull-left" href="javascript:history.go(-1);">&nbsp;返回</a>
                    我的免单
                </div>
                <div class="m_userCenter-line"></div>
                <div class="wrap userInfo">
				<!--优惠券-->
				  <div class="coupons">
				  <div class="title">
				 <ul>
				    <li><a href="<?php echo e(route('wap.mycard')); ?>" >优惠券</a></li>
					<li><a href="<?php echo e(route('wap.mymiandan')); ?>" class="on">免单劵</a></li>	
				    <li><a href="<?php echo e(route('wap.myshop')); ?>" >商品订单</a></li>	
                    <li><a href="<?php echo e(route('wap.myhb')); ?>" >红包</a></li>					
				  </ul>
				  </div>
				      <ul>
					  <?php if($data->total() > 0): ?>
                       <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

						  <li id="<?php echo e($item->code); ?>" onclick="yzm(this.id)">
						  <div class="ico_2">
						    <div class="left">
							<span class="danwei">￥</span>
							<span class="money"><?php echo e($item->decrease); ?></span>
							</div>
							<div class="right">
							<P><span class="ttype">免单劵</span></p>
							<P><span class="ttext"><?php echo e($item->businessname); ?></span></p>
							</div>
						  </div>
						 </li>
						 
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>												
					  </ul>
				  </div>
				

                    <table border="0" cellspacing="0" cellpadding="0" class="page">
                        <?php echo $data->links(); ?>

                    </table>
                </div>

            </div>
        </div>
    </div>
<script>
function yzm(id){
	alert("您的免单验证码为："+id);
}
</script>	
<?php $__env->stopSection(); ?>
<?php $__env->startSection('after.js'); ?>
    <script type="text/javascript" src="<?php echo e(asset('/wap/js/laydate.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('wap.layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
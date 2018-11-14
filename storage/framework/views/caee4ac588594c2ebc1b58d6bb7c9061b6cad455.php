<?php $__env->startSection('after.css'); ?>

    <link type="text/css" rel="stylesheet" href="<?php echo e(asset('/wap/css/main.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <?php echo $__env->make('wap.layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="m_container">
        <div class="m_body">
            <div class="m_banner">
                <div id="slide" class="container-fluid slide">
                    <ul class="bd">
                        <li><a href="#"><img class="carousel-inner" src="<?php echo e(asset('/wap/images/m_banner1.jpg')); ?>"></a>
                        </li>
                        <li><a href="#"><img class="carousel-inner" src="<?php echo e(asset('/wap/images/m_banner1.jpg')); ?>"></a>
                        </li>
                        <li><a href="#"><img class="carousel-inner" src="<?php echo e(asset('/wap/images/m_banner1.jpg')); ?>"></a>
                        </li>
                        <li><a href="#"><img class="carousel-inner" src="<?php echo e(asset('/wap/images/m_banner1.jpg')); ?>"></a>
                        </li>
                    </ul>
                    <ul class="hd"></ul>
                </div>
            </div>


            <div class="m_wrapper clear">
                <div class="m_category">
                    <a href="/"><div class="titlel active">优惠券</div></a>  <a href="<?php echo e(route('wap.moments')); ?>"><div class="titler">颖上朋友圈</div></a>
                </div>
                <div class="list_box">
					<ul>
					<?php $__currentLoopData = $coupons_business; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<li>                                
					    <a href="<?php echo e(route('wap.ucardinfo',['id'=>$v->id])); ?>" style="color:#000">
						<div style="width:100%;height:100%;background:#D04C4C;padding:5px;text-align:center;border-radius:10px;font-size:16px;">
						<div style="font-size:14px;color:#f0f1d1;line-height:20px;text-align:left;">满减卷</div>
								<div style="line-height:20px">
								<span style="font-size:2em;font-weight:700;color:#d9edf7;"><?php echo e($v->decrease); ?></span>&nbsp;<span style="font-size:1em;font-weight:700;">元</span>
								</div>
								<div style="line-height:20px">
								<span style="font-size:0.6em;color:#f0f1d1">全店满<?php echo e($v->term); ?>使用</span>
								</div>
                                <div style="text-align:right;line-height:20px"><span style="color:#fff;font-size:12px;">&nbsp;<?php echo e($v->couponstitle); ?>&nbsp;</span></div>
                        </div>
						</a>						
					</li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</ul>

					
                </div>
            </div>
 <div style="width:95%;margin:0 auto">
<?php echo $coupons_business->links(); ?>

</div>	 
         


        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('wap.layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
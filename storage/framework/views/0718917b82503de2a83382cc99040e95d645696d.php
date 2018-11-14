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
                <div class="list_shop">
				<!---	<ul>
					<li><img src="<?php echo e(asset('/wap/images/ico.png')); ?>" /></li>
					<li><img src="<?php echo e(asset('/wap/images/ico.png')); ?>" /></li>
					<li><img src="<?php echo e(asset('/wap/images/ico.png')); ?>" /></li>
					<li><img src="<?php echo e(asset('/wap/images/ico.png')); ?>" /></li>
					</ul>--->
                    <div class="htitle">积分兑换推荐</div>
                </div>
				<div class="shop_nav">
				   <span>兑换:</span>
				   <a href="<?php echo e(route('wap.activity_list')); ?>"><span style="background:#06c1ae;">免单</span></a>
				   <a href="<?php echo e(route('wap.activity_shop')); ?>"><span>实物</span></a>
				   <a href="<?php echo e(route('wap.activity_hb')); ?>"><span>红包</span></a>
				</div>
            

                <div class="list_box">
					<ul>
					<?php $__currentLoopData = $coupons_miandan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<li>                                
					    <a href="<?php echo e(route('wap.activity_list_id',['id'=>$v->id])); ?>" style="color:#000">
						<div style="width:100%;height:100%;background:#D04C4C;padding:5px;text-align:center;border-radius:10px;font-size:16px;">
						<div style="font-size:14px;color:#f0f1d1;line-height:20px">免单劵</div>
								<div style="line-height:30px">
								<span style="font-size:2.2em;font-weight:700;color:#d9edf7;"><?php echo e($v->decrease); ?></span>&nbsp;<span style="font-weight:700;">元</span>&nbsp;
								<span style="font-size:12px;color:#d9edf7;">兑&nbsp;换&nbsp;》</span></div>
                                <div style="text-align:right"><span style="color:#fff;font-size:12px;">&nbsp;<?php echo e($v->businessname); ?>&nbsp;</span></div>
                        </div>
						</a>
					</li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</ul>

					
                </div>
 <div style="width:95%;margin:0 auto">
<?php echo $coupons_miandan->links(); ?>

</div>	             				
        </div>
        </div>
    </div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('wap.layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
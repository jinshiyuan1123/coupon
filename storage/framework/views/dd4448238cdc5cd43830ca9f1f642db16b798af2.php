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
				   <a href="<?php echo e(route('wap.activity_list')); ?>"><span>免单</span></a>
				   <a href="<?php echo e(route('wap.activity_shop')); ?>"><span style="background:#06c1ae;">实物</span></a>
				   <a href="<?php echo e(route('wap.activity_hb')); ?>"><span>红包</span></a>
				</div>
            

                <div class="list_box">
					<ul>
					<?php $__currentLoopData = $coupons_shop; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<li>                                
					    <a href="<?php echo e(route('wap.activity_shop_id',['id'=>$v->id])); ?>" style="color:#000">
						<div style="width:100%;height:80%;background:#f6f6f6;padding:5px;text-align:center;border-radius:10px;font-size:16px;">
								<img src="<?php echo e($v->imgurl); ?>" width="100%" height="100%" />
                        </div>
						<div style="width:100%;height:20%;text-align:center;"><?php echo e($v->shoptitle); ?></div>
						</a>
					</li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</ul>

					
                </div>
 <div style="width:95%;margin:0 auto">
<?php echo $coupons_shop->links(); ?>

</div>	             				
        </div>
        </div>
    </div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('wap.layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
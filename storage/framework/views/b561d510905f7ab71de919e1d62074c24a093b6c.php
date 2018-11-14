<?php $__env->startSection('content'); ?>
    <div class="m_container">
        <div class="m_body2">
            <div class="container-fluid gm_main">
                <div class="m_member-title clear textCenter">
                    <a class="pull-left" href="javascript:history.go(-1);">&nbsp;返回</a>
                    我的优惠券
                </div>
                <div class="m_userCenter-line"></div>
                <div class="wrap userInfo">
				<!--优惠券-->
				  <div class="coupons">
				  <div class="title">
				 <ul>
				    <li><a href="<?php echo e(route('wap.mycard')); ?>" <?php if($status==4): ?>
						class="on"
					   <?php endif; ?>
					>优惠券</a></li>
					<li><a href="<?php echo e(route('wap.mymiandan')); ?>" >免单劵</a></li>	
				    <li><a href="<?php echo e(route('wap.myshop')); ?>" >商品订单</a></li>	
                    <li><a href="<?php echo e(route('wap.myhb')); ?>" >红包</a></li>					
					 <!---<li><a href="<?php echo e(route('wap.mycard')); ?>?status=0" <?php if($status==0): ?>
						class="on"
					   <?php endif; ?>>审核中</a></li>
					<li><a href="<?php echo e(route('wap.mycard')); ?>?status=1" <?php if($status==1): ?>
						class="on"
					   <?php endif; ?>>未使用</a></li>
					<li><a href="<?php echo e(route('wap.mycard')); ?>?status=2" <?php if($status==2): ?>
						class="on"
					   <?php endif; ?>>已使用</a></li>
					<li><a href="<?php echo e(route('wap.mycard')); ?>?status=3" <?php if($status==3): ?>
						class="on"
					   <?php endif; ?>>已失效</a></li>--->
				  </ul>
				  </div>
				      <ul>
					  <?php if($data->total() > 0): ?>
                       <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					     <?php if($item->type==1): ?> 
						  <a href="<?php echo e(route('wap.usecard',['id'=>$item->couponid])); ?>">	 
						  <li>
						  <div class="
						      <?php if($item->status==0): ?>
							  ico_12
						      <?php elseif($item->status==1): ?>
							  ico_3
						      <?php elseif($item->status==2): ?>
							  ico_6	
						      <?php else: ?>
							  ico_9								  
							  <?php endif; ?>
							  "
						      >
						    <div class="left">
							<span class="danwei">￥</span>
							<span class="money"><?php echo e($item->decrease); ?></span>
							</div>
							<div class="right">
							<P><span class="ttype">满减劵</span></p>
							<P><span class="ttext">满<?php echo e($item->term); ?>使用</span></p>
							</div>
						  </div>
						 </li>
						 </a>
                         <?php endif; ?>	
					     <?php if($item->type==2): ?> 
						  <li>
						  <div class="
						      <?php if($item->status==0): ?>
							  ico_10
						      <?php elseif($item->status==1): ?>
							  ico_1
						      <?php elseif($item->status==2): ?>
							  ico_4	
						      <?php else: ?>
							  ico_7							  
							  <?php endif; ?>
							  "
						      >
						    <div class="left">
							<span class="danwei">￥</span>
							<span class="money"><?php echo e($item->decrease); ?></span>
							</div>
							<div class="right">
							<P><span class="ttype">活动劵</span></p>
							<P><span class="ttext">满<?php echo e($item->term); ?>使用</span></p>
							</div>
						  </div>
						 </li>
                         <?php endif; ?>	
					     <?php if($item->type==3): ?> 
						  <li>
						  <div class="
						      <?php if($item->status==0): ?>
							  ico_11
						      <?php elseif($item->status==1): ?>
							  ico_2
						      <?php elseif($item->status==2): ?>
							  ico_5	
						      <?php else: ?>
							  ico_8							  
							  <?php endif; ?>
							  "
						      >
						    <div class="left">
							<span class="danwei">￥</span>
							<span class="money"><?php echo e($item->decrease); ?></span>
							</div>
							<div class="right">
							<P><span class="ttype">免单劵</span></p>
							<P><span class="ttext">满<?php echo e($item->term); ?>使用</span></p>
							</div>
						  </div>
						 </li>
                         <?php endif; ?>							 
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>

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
<?php $__env->stopSection(); ?>
<?php $__env->startSection('after.js'); ?>
    <script type="text/javascript" src="<?php echo e(asset('/wap/js/laydate.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('wap.layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
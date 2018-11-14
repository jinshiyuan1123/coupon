<?php $__env->startSection('content'); ?>
    <div class="m_container">
        <div class="m_body2">
            <div class="container-fluid gm_main">
                <div class="m_member-title clear textCenter">
                    <a class="pull-left" href="javascript:history.go(-1);">&nbsp;返回</a>
                    我的订单
                </div>
                <div class="m_userCenter-line"></div>
                <div class="wrap userInfo">
			
				<!--优惠券-->
				  <div class="coupons">
				  <div class="title">
				 <ul>
				    <li><a href="<?php echo e(route('wap.mycard')); ?>" >优惠券</a></li>
					<li><a href="<?php echo e(route('wap.mymiandan')); ?>">免单劵</a></li>	
				    <li><a href="<?php echo e(route('wap.myshop')); ?>"  class="on">商品订单</a></li>	
                    <li><a href="<?php echo e(route('wap.myhb')); ?>" >红包</a></li>					
				  </ul>
				  </div>			    
				  </div>

                </div>

                <div class="userInfo" >
                    <dl>
					<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <dd>
                            
                                <div style="width:100%;height:25px;line-height:25px;font-size:16px;font-weight:700">
								<img src="<?php echo e($v->imgurl); ?>" width="30px" height="30px" />&nbsp;<?php echo e($v->shoptitle); ?>

                                </div>
                                <div style="width:100%;height:25px;line-height:25px;text-align:right;">
									<span style="color:red">
									<?php 
									$begintime=strtotime($v->begintime);
									$endtime=strtotime($v->endtime);
									if($v->status==0){
										echo "[待发货]";
									}else{
									echo "[已发货]";	
									}									
									?>
									</span>
									<span><?php echo e($v->updated_at); ?></span><br/>
                                </div>	
                                <div><?php echo e($v->orderno); ?> </div>								
                        </dd>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	
                    </dl>
                </div>				
				
                    <table border="0" cellspacing="0" cellpadding="0" class="page">
                        <?php echo $data->links(); ?>

                    </table>				
            </div>
	

	
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('after.js'); ?>
    <script type="text/javascript" src="<?php echo e(asset('/wap/js/laydate.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('wap.layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
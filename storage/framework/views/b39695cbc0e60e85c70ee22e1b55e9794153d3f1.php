<?php $__env->startSection('content'); ?>
    

    <div class="m_container">
        <div class="m_body">
            <div class="container-fluid gm_main">
                <div class="m_member-title clear textCenter">
                    <a class="pull-left" href="javascript:history.go(-1);">&nbsp;返回</a>
                    实物兑换
                </div>
                <div class="m_userCenter-line"></div>
						<div style="width:90%;height:200px;margin:10px auto;background:#eae9e9;padding:5px;text-align:center;border-radius:10px;font-size:16px;">
								<img src="<?php echo e($activity_shop_id['imgurl']); ?>" width="100%" height="100%" />
                        </div>
                <div class="userInfo setCard" >
				
                    <dl class="dy_center_info">
                        <dd>
                    		<div class="normal"></div>
                        </dd>					
                        <dd>
                            <span style="font-size:18px"><?php echo e($activity_shop_id['shoptitle']); ?></span>
                        </dd>
                        <dd>
                            <div class="pull-left">兑换积分</div>
							&nbsp;&nbsp;<span><?php echo e($activity_shop_id['score']); ?></span>
                        </dd>
						<dd>
						您的积分余额：<?php echo e($_member->score); ?>

						<form action="<?php echo e(route('wap.postactivity_shop_id',['id'=>$activity_shop_id['id']])); ?>" method="post" name="form1">
						 <input type="button" value="立即兑换" class="submit_btn  ajax-submit-btn">   
						</form> 					
						</dd>						
                        <dd>
                            <div class="pull-left">
                                商品介绍
                            </div>
							 &nbsp;&nbsp;<?php if($activity_shop_id['info']): ?>
                               <?php echo e($activity_shop_id['info']); ?>

                            <?php else: ?>
                               无
                            <?php endif; ?>						   
                        </dd>						
                    </dl>

                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="<?php echo e(asset('/wap/js/laydate.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('/wap/js/clipboard.min.js')); ?>"></script>
    <script>
        var clipboard = new Clipboard('.btn');

        clipboard.on('success', function (e) {
            console.info('Action:', e.action);
            console.info('Text:', e.text);
            console.info('Trigger:', e.trigger);

            e.clearSelection();
        });

        clipboard.on('error', function (e) {
            console.error('Action:', e.action);
            console.error('Trigger:', e.trigger);
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('wap.layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('wap.layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
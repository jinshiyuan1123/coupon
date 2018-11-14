<?php $__env->startSection('content'); ?>
    
	<style type="text/css">
		.normal{
		  margin:10px auto;
		  background-image: url(<?php echo e($business['Businessheadpic']); ?>);
		  background-position:center center;
		  width: 100px;
		  height: 100px;
		  border-radius: 50%;
		  background-size: 100px 100px;
		  background-repeat: no-repeat;
		  background-position-y: 9%;
		}
	</style>
    <div class="m_container">
        <div class="m_body">
            <div class="container-fluid gm_main">
                <div class="m_member-title clear textCenter">
                    <a class="pull-left" href="javascript:history.go(-1);">&nbsp;返回</a>
                    优惠券信息
                </div>
                <div class="m_userCenter-line"></div>
                <div class="userInfo setCard" >
				
                    <dl class="dy_center_info">
                        <dd>
                    		<div class="normal"></div>
                        </dd>					
                        <dd>
                            <div class="pull-left">商家名称</div>
							&nbsp;&nbsp;<span style="font-size:18px"><?php echo e($business['Businessname']); ?></span>
                        </dd>
                        <dd>
                            <div class="pull-left">商家电话</div>
							&nbsp;&nbsp;<span style="font-size:18px"><?php echo e($business['Businessphone']); ?></span>
                        </dd>	
                        <dd>
                            <div class="pull-left">商家地址</div>
							&nbsp;&nbsp;<span style="font-size:18px"><?php echo e($business['Businessaddress']); ?></span>
                        </dd>							
                        <dd>
                            <div class="pull-left">标题</div>
							&nbsp;&nbsp;<span style="font-size:18px"><?php echo e($data['couponstitle']); ?></span>
                        </dd>					
                        <dd>
                            <div class="pull-left">
                                满
                            </div>
                            &nbsp;&nbsp;<span style="font-size:18px;color:#F90606"><?php echo e($data['term']); ?></span>&nbsp;元
                        </dd>						
                        <dd>
                            <div class="pull-left">
                                减
                            </div>
								&nbsp;&nbsp;<span style="font-size:18px;color:#F90606"><?php echo e($data['decrease']); ?></span>&nbsp;元
                        </dd>
						<dd>
                        <table cellspacing="0" cellpadding="0" border="0" class="tab1">
                            <tr>
                                <td class="bg" align="right">开始日期：</td>
                                <td>
                                   &nbsp;&nbsp;<span style="font-size:18px"><?php echo e($data['begintime']); ?></span>
                                </td>
                            </tr>
                            <tr>
                                <td class="bg" align="right">结束日期：</td>
                                <td>
                                    &nbsp;&nbsp;<span style="font-size:18px"><?php echo e($data['endtime']); ?></span>
                                </td>
                            </tr>
                        </table>						
                        </dd>						
                        <dd>
                            <div class="pull-left">
                                说明
                            </div>
							 &nbsp;&nbsp;<?php if($data['info']): ?>
                               <?php echo e($data['info']); ?>

                            <?php else: ?>
                               无
                            <?php endif; ?>						   
                        </dd>
						<dd>
						   <a href="<?php echo e(route('wap.usecard',['id'=>$data['id']])); ?>"><div class="submit_btn" style="text-align:center">领取使用</div></a>
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
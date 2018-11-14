<?php $__env->startSection('content'); ?>
    <div class="m_container">
        <div class="m_body2">
            <div class="container-fluid gm_main">
                <div class="m_member-title clear textCenter">
                    <a class="pull-left" href="javascript:history.go(-1);">&nbsp;返回</a>
                    我的积分
                </div>
                <div class="m_userCenter-line"></div>
                <div class="wrap userInfo">
                        <table cellspacing="0" cellpadding="0" border="0" class="tab1">
                                           <tr>
                                                  <td align="center">积分余额：<span style="color:#10aec7"><?php echo e($_member->score); ?></span></td>              
												</tr>
                        </table>
                    <table cellspacing="1" cellpadding="0" border="0" class="tab1 mt10 text-center">
                        <tr class="tic" style="font-weight:700;">
                            <td width="25%">时间</td>
                            <td width="25%">积分</td>
                            <td width="30%">明细</td>
                        </tr>
                        <?php if($data->total() > 0): ?>
                            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($item->created_at); ?></td>
                                    <td><?php echo e($item->score); ?></td>
                                    <td><?php echo e($item->explain); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="4">暂无积分记录！</td>
                            </tr>
                        <?php endif; ?>
                    </table>
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
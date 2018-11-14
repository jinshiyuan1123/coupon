<?php $__env->startSection('content'); ?>
    
    <div class="m_container">
        <div class="m_body">
            <div class="container-fluid gm_main">
                <div class="m_member-title clear textCenter">
                    <a class="pull-left" href="javascript:history.go(-1);">&nbsp;返回</a>
                    广告合作
                </div>
                <div class="m_userCenter-line"></div>
                <div class="wrap userInfo" style="width:95%;margin:0 auto;word-wrap: break-word">
                         <?php echo e($_system_config->maintain_desc); ?>

                </div>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('after.js'); ?>
    <script type="text/javascript" src="<?php echo e(asset('/wap/js/laydate.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('wap.layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('wap.layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->startSection('after.css'); ?>

    <link type="text/css" rel="stylesheet" href="<?php echo e(asset('/wap/css/main.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="m_container">
        <div class="m_body2">


            <div class="m_wrapper clear">
                <div class="m_member-title clear textCenter">
                    <a class="pull-left" href="javascript:history.go(-1);">&nbsp;返回</a>
                    @我的留言
                </div>
                <div class="m_userCenter-line"></div>
                <div class="moments_box">
					<ul>
					<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<?php if(count($v->mymessage)>0): ?>
					<li>
					<div class="maxtext"><div style="float:left;font-size:16px;width:85%; white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">您的动态:&nbsp;<a href="<?php echo e(route('wap.mymoments')); ?>/<?php echo e($v->id); ?>"><?php echo e($v->content); ?></a></div></div>
					 <?php $__currentLoopData = $v->mymessage; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					 <div class="maxtext">@<span class="usernichen"><?php echo e($t->nichen); ?></span>：<?php echo e($t->content); ?><span class="uptime">&nbsp;<?php echo e($t->created_at); ?></span></div>
					 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					<a href="<?php echo e(route('wap.mymoments')); ?>/<?php echo e($v->id); ?>">
					<div class="tagline">				
					<span class="comment">回复</span>
					</div>
					</a>
					</li>
					<?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				
					
					
					</ul>
                
					
                </div>
            </div>

 <div style="width:95%;margin:0 auto">
<?php echo $data->links(); ?>

</div>	        


        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('wap.layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
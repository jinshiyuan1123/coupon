<?php if(session('msg_ok')|| session('msg_no') || $errors->any()): ?>
    <div>
        <?php if(session('msg_no')): ?>
            <div class="alert alert-error alert-msg" style="border-radius: 0;margin:0 auto;width:100%;text-align: center" id="noMsg">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong><?php echo e(session('msg_no')); ?></strong>
            </div>
        <?php endif; ?>
        <?php if(session('msg_ok')): ?>
            <div class="alert alert-success alert-msg" style="border-radius: 0;margin:0 auto;width:100%;text-align: center" id="okMSg">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong><?php echo e(session('msg_ok')); ?></strong>
            </div>
        <?php endif; ?>
        <?php if($errors->any()): ?>
            <div class="alert alert-error alert-msg"  style="border-radius: 0;margin:0 auto;width:100%;text-align: center">
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <p><?php echo e($error); ?></p>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php endif; ?>
    </div>
<?php endif; ?>
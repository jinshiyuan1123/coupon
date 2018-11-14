<div class="box-header">
    <form action="" method="get" id="searchForm">
        <div class="row">
            <div class="col-lg-3">
                <div class="input-group">
                    <span class="input-group-addon">姓名</span>
                    <input type="text" class="form-control" name="name" placeholder="关键字" value="<?php echo e($name); ?>">
                </div>
            </div>
            <div class="col-lg-3">
                <div class="input-group">
                    <span class="input-group-addon">管理组</span>
                    <select name="role_id" id="role_id" class="form-control">
                        <option value="">--请选择--</option>
                        <?php $__currentLoopData = $role_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($k); ?>" <?php if($k == $role_id): ?> selected <?php endif; ?>><?php echo e($v); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="input-group">
                    <button type="submit" class="btn btn-primary">搜索</button>&nbsp;
                    <button type="button" class="btn btn-warning" id="restSearchForm">重置</button>&nbsp;
                    <a href="<?php echo e(route('user.create')); ?>" class="btn btn-danger"><span class="glyphicon glyphicon-plus"></span>添加管理员</a>
                </div>
            </div>
        </div>
    </form>
</div>
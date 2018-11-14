<div class="container-fluid" style="margin-bottom: 10px;">
    <form action="" method="get" id="searchForm">
        <div class="row">
            <div class="col-lg-2">
                <div class="input-group">
                    <span class="input-group-addon">平台类型</span>
                    <select name="api_type" id="api_type" class="form-control">
                        <option value="">--请选择--</option>
                        <?php $__currentLoopData = $_api_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($k); ?>" <?php if($api_type == $k): ?> selected <?php endif; ?>><?php echo e($v); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="input-group">
                    <span class="input-group-addon">游戏类型</span>
                    <select name="gameType" id="gameType" class="form-control">
                        <?php $__currentLoopData = config('platform.game_type'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($k); ?>" <?php if($k == $gameType): ?> selected <?php endif; ?>><?php echo e($v); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>

                </div>
            </div>
            <div class="col-lg-2">
                <div class="input-group">
                    <span class="input-group-addon">账户</span>
                    <input type="text" class="form-control" name="name" value="<?php echo e($name); ?>">
                </div>
            </div>

        </div>
        <div class="row" style="margin-top: 5px;">
            <div class="col-lg-3">
                <div class="input-group">
                    <span class="input-group-addon">开始时间</span>
                    <input type="text" class="form-control" name="start_at" id="start_at" value="<?php echo e($start_at); ?>" readonly>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="input-group">
                    <span class="input-group-addon">结束时间</span>
                    <input type="text" class="form-control" name="end_at" id="end_at" value="<?php echo e($end_at); ?>" readonly>
                </div>
            </div>
            <div class="col-lg-2 pull-right">
                <div class="input-group">
                    <button type="submit" class="btn btn-primary">搜索</button>&nbsp;
                    <button type="button" class="btn btn-warning" id="restSearchForm">重置</button>&nbsp;
                </div>
            </div>
        </div>
    </form>
</div>

<?php $__env->startSection('content'); ?>
    <section class="content">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">关联权限--<?php echo e($data->name); ?></h3>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" id="form" action="<?php echo e(route('role.relation', ['id' => $data->id])); ?>" method="post">
                    <table class="table table-striped">
                        <?php
                            $check_routers = $data->routers()->pluck('router')->toArray();
                        ?>
                        <?php $__currentLoopData = config('admin_menu'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="row">
                                <td class="col-md-1 pull-left">
                                    <strong style="color: red"><?php echo e($item['name']); ?></strong>
                                </td>
                            </tr>

                            <tr class="row">
                                <td class="col-md-1 pull-left">菜单权限：</td>
                                <?php $__currentLoopData = $item['submenus']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <td class="col-md-1 pull-left">
                                        <label>
                                            <input type="checkbox" name="routers[]" value="<?php echo e($v['router']); ?>" <?php if(in_array($v['router'], $check_routers)): ?> checked <?php endif; ?> <?php if($v['is_hide'] == 0): ?> disabled <?php endif; ?>><?php echo e($v['title']); ?>

                                        </label>
                                    </td>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tr>
                            <tr class="row">
                                <td class="col-md-1 pull-left">操作权限：</td>
                                <?php $__currentLoopData = $item['submenus']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php $__currentLoopData = $v['actions']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <td class="col-md-1 pull-left">
                                            <label>
                                                <input type="checkbox" name="routers[]" value="<?php echo e($val['router']); ?>" <?php if(in_array($val['router'], $check_routers)): ?> checked <?php endif; ?>><?php echo e($val['name']); ?>

                                            </label>
                                        </td>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <tfoot>
                            <tr>
                                <td colspan="12">
                                    <button type="button" class="btn btn-primary submit-form-sync">提交</button>
                                    &nbsp;<a href="<?php echo e(route('role.index')); ?>" class="btn btn-info">返回</a>
                                </td>
                            </tr>
                        </tfoot>
                    </table>

                </form>

            </div>
        </div>

    </section><!-- /.content -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->startSection('content'); ?>

    <section class="content">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">会员登录记录</h3>
            </div>
            <div class="panel-body">
                <?php echo $__env->make('admin.member_login_log.filter', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                <table class="table table-bordered table-hover text-center">
                    <tr>
                        <th style="width: 10%">ID</th>
                        <th style="width: 15%">账号</th>
                        <th  >IP</th>
                        <th  style="width: 15%">登录时间</th>
                        
                    </tr>
                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td>
                                <?php echo e($item->id); ?>

                            </td>
                            <td>
                                <?php echo e(isset($item->member->name) ? $item->member->name : '已删除'); ?>

                            </td>
                            <td>
                                <?php echo e($item->ip); ?>

                            </td>
                            <td>
                                <?php echo e($item->created_at); ?>

                            </td>

                            
                            
                            
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </table>
                <div class="clearfix">
                    <div class="pull-left" style="margin: 0;">
                        <p>总共 <strong style="color: red"><?php echo e($data->total()); ?></strong> 条</p>
                    </div>
                    <div class="pull-right" style="margin: 0;">
                        <?php echo $data->appends(['name' => $name, 'start_at' => $start_at, 'end_at' => $end_at, 'ip' => $ip])->links(); ?>

                    </div>
                </div>
            </div>
        </div>

    </section><!-- /.content -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
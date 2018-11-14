<?php $__env->startSection('content'); ?>
    <section class="content">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">反馈列表</h3>
            </div>
            <div class="panel-body">
                <?php echo $__env->make('admin.feedback.filter', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                <table class="table table-bordered table-hover text-center">
                    <tr>
                        <th style="width: 5%">ID</th>
                        <th style="width: 10%">提交人账号</th>
                        <th style="width: 15%">反馈类型</th>
                        <th>反馈内容</th>
                        <th style="width: 10%">已读/未读</th>
                        <th style="width: 10%">提交时间</th>
                        <th style="width: 10%">操作</th>
                    </tr>
                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td>
                                <?php echo e($item->id); ?>

                            </td>
                            <td>
                                <?php echo e($item->member->name); ?>

                            </td>
                            <td>
                                <?php echo e(config('platform.feedback_type')[$item->type]); ?>

                            </td>
                            <td>
                                <?php echo e($item->content); ?>

                            </td>
                            <td>
                                <?php echo \App\Models\Base::$IS_READ_HTML[$item->is_read]; ?>

                            </td>
                            <td>
                                <?php echo e($item->created_at); ?>

                            </td>
                            <td>
                                <?php if($item->is_read == 1): ?>
                                    <a href="<?php echo e(route('feedback.check', ['id' => $item->getKey(), 'status' => 0])); ?>" class="btn btn-danger btn-xs" onclick="return confirm('确定标记为未读吗？')">未读</a>
                                <?php elseif($item->is_read == 0): ?>
                                    <a href="<?php echo e(route('feedback.check', ['id' => $item->getKey(), 'status' => 1])); ?>" class="btn btn-success btn-xs" onclick="return confirm('确定标记为已读吗？')">已读</a>
                                <?php endif; ?>
                                    <button class="btn btn-danger btn-xs"
                                    data-url="<?php echo e(route('feedback.destroy', ['id' => $item->getKey()])); ?>"
                                    data-toggle="modal"
                                    data-target="#delete-modal"
                                    >
                                    删除
                                    </button>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </table>
                <div class="clearfix">
                    <div class="pull-left" style="margin: 0;">
                        <p>总共 <strong style="color: red"><?php echo e($data->total()); ?></strong> 条</p>
                    </div>
                    <div class="pull-right" style="margin: 0;">
                        <?php echo $data->appends(['is_read' => $is_read, 'start_at' => $start_at, 'end_at' => $end_at])->links(); ?>

                    </div>
                </div>

            </div>
        </div>

    </section><!-- /.content -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection("after.js"); ?>
    <?php echo $__env->make('admin.layouts.delete',['title'=>'操作提示','content'=>'你确定要删除这条反馈吗?'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
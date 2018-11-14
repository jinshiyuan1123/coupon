<?php $__env->startSection('content'); ?>
    <div class="container-fluid" style="margin-top: 10px;">

        <div>
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="<?php echo e(route('member.showGameRecordInfo', ['id' => $id])); ?>" aria-controls="home" role="tab" data-toggle="tab">历史积分</a></li>
                <li role="presentation"><a href="<?php echo e(route('member.showRechargeInfo', ['id' => $id])); ?>" aria-controls="profile" role="tab" data-toggle="tab">历史消费</a></li>
                <li role="presentation"><a href="<?php echo e(route('member.showDrawingInfo', ['id' => $id])); ?>" aria-controls="messages" role="tab" data-toggle="tab">历史提款</a></li>
                <li role="presentation"><a href="<?php echo e(route('member.showDividendInfo', ['id' => $id])); ?>" aria-controls="settings" role="tab" data-toggle="tab">历史收益</a></li>
            </ul>
        </div>

        <section class="content" style="margin-top: 10px;">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">历史积分</h3>
                </div>
                <div class="panel-body">
                    <div class="container-fluid" style="margin-bottom: 10px;">
                        <form action="" method="get" id="searchForm">
                            <div class="row">

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

                            </div>
                            <div class="row" style="margin-top: 5px;">
                                <div class="col-lg-2 pull-right">
                                    <div class="input-group">
                                        <button type="submit" class="btn btn-primary">搜索</button>&nbsp;
                                        <button type="button" class="btn btn-warning" id="restSearchForm">重置</button>&nbsp;
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <table class="table table-bordered table-hover text-center">
                        <tr>
                            <th style="width: 5%">ID</th>
                            <th style="width: 10%">积分</th>
                            <th>说明</th>
                            <th style="width: 20%">时间</th>
                        </tr>
                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td>
                                    <?php echo e($item->id); ?>

                                </td>
                                 <td>
                                    <?php echo e($item->score); ?>

                                </td>
                                <td>
                                    <?php echo e($item->explain); ?>

                                </td>								
                                <td>
                                    <?php echo e($item->created_at); ?>

                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <tfoot>
                        <tr>
                            <td><strong style="color: red">总合计</strong></td>
                            <td><strong style="color: red"><?php echo e($total_score); ?></strong></td>
                            <td colspan="3"></td>
                        </tr>
                        </tfoot>
                    </table>
                    <div class="clearfix">
                        <div class="pull-left" style="margin: 0;">
                            <p>总共 <strong style="color: red"><?php echo e($data->total()); ?></strong> 条</p>
                        </div>
                        <div class="pull-right" style="margin: 0;">
                            <?php echo $data->appends(['start_at' => $start_at, 'end_at' => $end_at])->links(); ?>

                        </div>
                    </div>

                </div>
            </div>

        </section><!-- /.content -->
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.basic', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
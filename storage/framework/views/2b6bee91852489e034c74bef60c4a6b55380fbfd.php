<?php $__env->startSection('content'); ?>
    <section class="content">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">提款列表</h3>
            </div>
            <div class="panel-body">
                <?php echo $__env->make('admin.drawing.filter', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                <table class="table table-bordered table-hover text-center">
                    <tr>
                        <th style="width: 5%">ID</th>
                        <th>订单号</th>
                        <th style="width: 10%">提款金额</th>
                        <th style="width: 5%">手续费</th>
                        <th style="width: 15%">开户行/卡号</th>
                        <th style="width: 15%">开户人/开户地址</th>
                        <th style="width: 5%">用户名</th>
                        <th style="width: 10%">申请时间</th>
                        <th style="width: 10%">状态</th>
                        <th style="width: 15%">操作</th>
                    </tr>
                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td>
                                <?php echo e($item->id); ?>

                            </td>
                            <td>
                                <?php echo e($item->bill_no); ?>

                            </td>
                            <td>
                                <?php echo e($item->money); ?>

                            </td>
                            <td>
                                <?php echo e($item->counter_fee); ?>

                            </td>
                            <td>
                                <?php echo e($item->bank_name); ?>/<?php echo e($item->bank_card); ?>

                            </td>
                            <td>
                                <?php echo e($item->name); ?>/<?php echo e($item->bank_address); ?>

                            </td>
                            <td>
                                <?php echo e($item->member->name); ?>

                            </td>
                            <td>
                                <?php echo e($item->created_at); ?>

                            </td>
                            <td>
                                <?php echo \App\Models\Base::$DRAWING_STATUS_HTML[$item->status]; ?>

                            </td>
                            <td>
                                <?php if($item->status == 1): ?>
                                    <a href="<?php echo e(route('drawing.show', ['id' => $item->getKey()])); ?>" class="btn btn-primary btn-xs">同意</a>

                                    <button type="button" class="btn btn-danger btn-xs" data-uri="<?php echo e(route('drawing.update', ['id' => $item->id])); ?>" onclick="showRemark(this)">不同意</button>
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <tfoot>
                        <tr>
                            <td><strong style="color: red">总合计</strong></td>
                            <td></td>
                            <td><strong style="color: red"><?php echo e($total_money); ?></strong></td>
                            <td><strong style="color: red"><?php echo e($total_counter_fee); ?></strong></td>
                            <td colspan="6"></td>
                        </tr>
                    </tfoot>
                </table>
                <div class="clearfix">
                    <div class="pull-left" style="margin: 0;">
                        <p>总共 <strong style="color: red"><?php echo e($data->total()); ?></strong> 条</p>
                    </div>
                    <div class="pull-right" style="margin: 0;">
                        <?php echo $data->appends(['status' => $status, 'name' => $name, 'start_at' => $start_at, 'end_at' => $end_at])->links(); ?>

                    </div>
                </div>

            </div>
        </div>

    </section><!-- /.content -->

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="myModalLabel">不通过原因</h4>
                </div>
                <div class="modal-body">
                    <form action="" method="post" class="form-horizontal" id="updateReason">
                        <?php echo csrf_field(); ?>

                        <input type="hidden" name="_method" value="put">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="fail_reason" class="col-sm-3 control-label"><span style="color: red">不通过原因</span></label>
                                <div class="col-sm-8">
                                    <textarea name="fail_reason" id="fail_reason" rows="3" required class="form-control"></textarea>
                                </div>
                            </div>
                        </div><!-- /.box-body -->
                        <div class="box-footer">
                            <div class="form-group">
                                <label class="col-sm-3 control-label"></label>
                                <div class="col-sm-8">
                                    <button type="submit" class="btn btn-info btn-flat">提交</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        function showRemark(e)
        {
            var uri = $(e).attr('data-uri');
            $('#updateReason').attr('action',uri)
            $('#myModal').modal('show');
        }
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
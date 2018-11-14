<?php $__env->startSection('content'); ?>
    <section class="content">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">管理员操作账户记录</h3>
            </div>
            <div class="panel-body">
                <?php echo $__env->make('admin.admin_action_money_log.filter', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                <table class="table table-bordered table-hover text-center">
                    <tr>
                        <th style="width: 5%">ID</th>
                        <th style="width: 10%">账号名称</th>
                        <th style="width: 10%">发生前余额</th>
                        <th style="width: 10%">发生后余额</th>
                        <th>备注</th>
                        <th style="width: 5%">操作人</th>
                        <th style="width: 15%">生成时间</th>
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
                                <?php echo e($item->old_money); ?>

                            </td>
                            <td>
                                <?php echo e($item->new_money); ?>

                            </td>
                            <td>
                                <?php echo e($item->remark); ?>

                            </td>
                            <td>
                                <?php echo e(isset($item->user->name) ? $item->user->name : '已删除'); ?>

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
                        <?php echo $data->appends(['start_at' => $start_at, 'end_at' => $end_at])->links(); ?>

                    </div>
                </div>

            </div>
        </div>

    </section><!-- /.content -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection("after.js"); ?>
    <script>
        var start = {
            elem: '#start_at',
            format: 'YYYY-MM-DD hh:mm:ss',
            //min: laydate.now(), //设定最小日期为当前日期
            max: '2099-06-16 23:59:59', //最大日期
            istime: true,
            istoday: false,
            choose: function(datas){
                end.min = datas; //开始日选好后，重置结束日的最小日期
                end.start = datas //将结束日的初始值设定为开始日
            }
        };
        var end = {
            elem: '#end_at',
            format: 'YYYY-MM-DD 23:59:59',
            //min: laydate.now(),
            max: '2099-06-16 23:59:59',
            istime: true,
            istoday: true,
            choose: function(datas){
                start.max = datas; //结束日选好后，重置开始日的最大日期
            }
        };
        laydate(start);
        laydate(end);
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->startSection('content'); ?>
    <div class="container-fluid" style="margin-top: 10px;">

        <div>
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation"><a href="<?php echo e(route('member.showGameRecordInfo', ['id' => $id])); ?>" aria-controls="home" role="tab" data-toggle="tab">历史积分</a></li>
                <li role="presentation"><a href="<?php echo e(route('member.showRechargeInfo', ['id' => $id])); ?>" aria-controls="profile" role="tab" data-toggle="tab">历史消费</a></li>
                <li role="presentation"><a href="<?php echo e(route('member.showDrawingInfo', ['id' => $id])); ?>" aria-controls="messages" role="tab" data-toggle="tab">历史提款</a></li>
                <li role="presentation" class="active"><a href="<?php echo e(route('member.showDividendInfo', ['id' => $id])); ?>" aria-controls="settings" role="tab" data-toggle="tab">历史收益</a></li>
            </ul>
        </div>

        <section class="content" style="margin-top: 10px;">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">历史收益</h3>
                </div>
                <div class="panel-body">


                    <table class="table table-bordered table-hover text-center">
                        <tr>
                            <th style="width: 5%">ID</th>
                            <th style="width: 5%">用户</th>
                            <th style="width: 5%">优惠券</th>
                            <th style="width: 10%">总金额</th>
							<th style="width: 10%">折扣金额</th>
							<th style="width: 10%">实际支付</th>
							<th style="width: 5%">费率</th>
							<th style="width: 10%">扣费</th>
							<th style="width: 10%">所得</th>
							<th style="width: 10%">奖励积分</th>
                            <th style="width: 10%">发放时间</th>
                        </tr>
                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td>
                                    <?php echo e($item->id); ?>

                                </td>
                                <td>
                                    <?php echo e($item->member->uid); ?>

                                </td>
                                <td>
                                    <?php echo e($item->couponid); ?>

                                </td>
                                <td>
                                    <?php echo e($item->allmomey); ?>

                                </td>
                                <td>
                                    <?php echo e($item->decrease); ?>

                                </td>
                                <td>
                                    <?php echo e($item->paymomey); ?>

                                </td>
                                <td>
                                    <?php echo e($item->rate); ?>

                                </td>
                                <td>
                                    <?php echo e($item->ratemoney); ?>

                                </td>
                                <td>
                                    <?php echo e($item->businessimoney); ?>

                                </td>
                                <td>
                                    <?php echo e($item->score); ?>

                                </td>								
                                <td>
                                    <?php echo e($item->created_at); ?>

                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <tfoot>
                        <tr>
                            <td><strong style="color: red">总合计</strong></td>
                            <td></td>
                            <td></td>
                            <td><strong style="color: red"><?php echo e($allmomey); ?></strong></td>
							<td><strong style="color: red"><?php echo e($decrease); ?></strong></td>
							<td><strong style="color: red"><?php echo e($paymomey); ?></strong></td>
							<td></td>
							<td><strong style="color: red"><?php echo e($ratemoney); ?></strong></td>
							<td><strong style="color: red"><?php echo e($businessimoney); ?></strong></td>
							<td><strong style="color: red"><?php echo e($score); ?></strong></td>
                            <td></td>
                        </tr>
                        </tfoot>
                    </table>
                    <div class="clearfix">
                        <div class="pull-left" style="margin: 0;">
                            <p>总共 <strong style="color: red"><?php echo e($data->total()); ?></strong> 条</p>
                        </div>
                        <div class="pull-right" style="margin: 0;">
                            <?php echo $data->links(); ?>

                        </div>
                    </div>

                </div>
            </div>

        </section><!-- /.content -->
    </div>

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
<?php echo $__env->make('admin.layouts.basic', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
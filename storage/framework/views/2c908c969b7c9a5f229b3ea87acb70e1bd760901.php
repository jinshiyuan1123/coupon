<?php $__env->startSection('content'); ?>
    <section class="content">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">提款列表</h3>
            </div>
            <div class="panel-body">
                <?php echo $__env->make('admin.member_offline_drawing.filter', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                <table class="table table-bordered table-hover text-center">
                    <tr>
                        <th style="width: 5%">ID</th>
                        <th style="width: 5%">用户</th>
                        <th style="width: 5%">优惠券ID</th>
                        <th style="width: 5%">商家名称</th>
                        <th style="width: 10%">使用条件</th>
                        <th style="width: 5%">总金额</th>
                        <th style="width: 5%">满减</th>
                        <th style="width: 10%">抵扣积分</th>
						<th style="width: 5%">抵扣金额</th>
						<th style="width: 10%">实付</th>
						<th style="width: 5%">抽佣</th>
						<th style="width: 10%">商家所得</th>
						<th style="width: 10%">获得积分</th>
						<th style="width: 10%">使用时间</th>
                    </tr>
                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td>
                                <?php echo e($item->id); ?>

                            </td>
                            <td>
                                <a href="/admin/member?id=<?php echo e($item->member_id); ?>"><?php echo e($item->member_name); ?></a>
                            </td>
                            <td>
                                <a href="/admin/member_offline_recharge?id=<?php echo e($item->couponid); ?>"><?php echo e($item->couponid); ?></a>
                            </td>
                            <td>
                                <a href="/admin/member_daili?id=<?php echo e($item->businessid); ?>"><?php echo e($item->business_name); ?></a>
                            </td>
                            <td>
                                满<?php echo e($item->term); ?>减<?php echo e($item->decrease); ?>

                            </td>
                            <td>
                                <?php echo e($item->allmoney); ?>

                            </td>
                            <td>
                                <?php echo e($item->decrease); ?>

                            </td>
                            <td>
                               <?php echo e($item->descore); ?>

                            </td>
                            <td>
                               <?php echo e($item->descoremoney); ?>

                            </td>
                            <td>
                               <?php echo e($item->money); ?>

                            </td>
                            <td>
                               <?php echo e($item->poundage); ?>

                            </td>
                            <td>
                               <?php echo e($item->money-$item->poundage); ?>

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
                            <td></td>
                            <td></td>
							<td><strong style="color: red"><?php echo e($total_allmoney); ?></strong></td>
							<td><strong style="color: red"><?php echo e($total_decrease); ?></strong></td>
							<td><strong style="color: red"><?php echo e($total_descore); ?></strong></td>
							<td><strong style="color: red"><?php echo e($total_descoremoney); ?></strong></td>
							<td><strong style="color: red"><?php echo e($total_money); ?></strong></td>
							<td><strong style="color: red"><?php echo e($total_poundage); ?></strong></td>
							<td><strong style="color: red"><?php echo e($total_money-$total_poundage); ?></strong></td>
							<td><strong style="color: red"><?php echo e($total_score); ?></strong></td>
							<td></td>
                        </tr>
                    </tfoot>
                </table>
                <div class="clearfix">
                    <div class="pull-left" style="margin: 0;">
                        <p>总共 <strong style="color: red"><?php echo e($data->total()); ?></strong> 条</p>
                    </div>
                <div class="pull-right" style="margin: 0;">
                    <?php echo $data->appends(['couponid' => $couponid, 'businessid' =>$businessid, 'start_at' => $start_at, 'end_at' => $end_at])->links(); ?>

                </div>
                </div>

            </div>
        </div>

    </section><!-- /.content -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
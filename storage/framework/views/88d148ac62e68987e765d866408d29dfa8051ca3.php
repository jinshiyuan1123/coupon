<?php $__env->startSection('content'); ?>
    <section class="content">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">优惠券列表</h3>
            </div>
            <div class="panel-body">
                <?php echo $__env->make('admin.member_offline_recharge.filter', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                <table class="table table-bordered table-hover text-center">
                    <tr>
                        <th style="width: 5%">ID</th>
                        <th style="width: 5%">商家ID</th>
                        <th style="width: 8%">商家名称</th>
                        <th style="width: 8%">名称</th>
                        <th style="width: 8%">优惠条件</th>
						<th style="width: 10%">使用/金额/减扣/</th>
						<th style="width: 8%">抵扣积分/金额</th>
						<th style="width: 5%">实付</th>
						<th style="width: 5%">抽佣</th>
                        <th style="width: 10%">开始时间</th>
                        <th style="width: 10%">结束时间</th>
						<th style="width: 10%">介绍</th>
                        <th style="width: 10%">状态</th>
                    </tr>
                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td>
                                <?php echo e($item->id); ?>

                            </td>
                            <td>
                                 <a href="/admin/member_daili?name=<?php echo e($item->name); ?>"><?php echo e($item->businessid); ?></a>
                            </td>
                            <td>
                                <a href="/admin/member_daili?name=<?php echo e($item->name); ?>"><?php echo e($item->businessname); ?></a>
                            </td>
                            <td>
                                <?php echo e($item->couponstitle); ?>

                            </td>
                            <td>
                               满<?php echo e($item->term); ?>减<?php echo e($item->decrease); ?>

                            </td>
                            <td>
                               <a href="/admin/member_offline_drawing?businessid=<?php echo e($item->businessid); ?>&couponid=<?php echo e($item->id); ?>"><?php echo e($item->useCouponsall); ?>/<?php echo e($item->payallmoney); ?>/<?php echo e($item->paydecrease); ?></a>
                            </td>							
                            <td>
                                <a href="/admin/member_offline_drawing?businessid=<?php echo e($item->businessid); ?>&couponid=<?php echo e($item->id); ?>"><?php echo e($item->paydescore); ?>/<?php echo e($item->paydescoremoney); ?></a>
                            </td>
                            <td>
                               <a href="/admin/member_offline_drawing?businessid=<?php echo e($item->businessid); ?>&couponid=<?php echo e($item->id); ?>"> <?php echo e($item->paymoney); ?></a>
                            </td>							
                            <td>
                               <a href="/admin/member_offline_drawing?businessid=<?php echo e($item->businessid); ?>&couponid=<?php echo e($item->id); ?>"> <?php echo e($item->paypoundage); ?></a>
                            </td>							
                            <td>
							   <?php echo e($item->begintime); ?>

                            </td>
                            <td>
                               <?php echo e($item->endtime); ?>

                            </td>							
                            <td>
                                <?php echo e($item->info); ?>

                            </td>
                            <td>
							<?php if($item->statustag=='生效中'): ?>
							    <span style="color:green;"><?php echo e($item->statustag); ?></span>
                            <?php else: ?>
								 <span style="color:red;"><?php echo e($item->statustag); ?></span>
                            <?php endif; ?>								
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
							<td><strong style="color: red"><?php echo e($useCouponsalltotal); ?>/<?php echo e($payallmoneytotal); ?>/<?php echo e($paydecreasetotal); ?></strong></td>
							<td><strong style="color: red"><?php echo e($paydescoretotal); ?>/<?php echo e($paydescoremoneytotal); ?></strong></td>
							<td><strong style="color: red"><?php echo e($paymoneytotal); ?></strong></td>
							<td><strong style="color: red"><?php echo e($paypoundagetotal); ?></strong></td>
                            <td></td>
							<td></td>
							<td></td>
							<td></td>
                        </tr>
                    </tfoot>
                </table>
                <div class="clearfix">
                    <div class="pull-left" style="margin: 0;">
                        <p>总共 <strong style="color: red"><?php echo e($data->total()); ?></strong> 条</p>
                    </div>
                    <div class="pull-right" style="margin: 0;">
                        <?php echo $data->appends(['status' => $status, 'businessid' =>$businessid, 'start_at' => $start_at, 'end_at' => $end_at])->links(); ?>

                    </div>
                </div>

            </div>
        </div>

    </section><!-- /.content -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
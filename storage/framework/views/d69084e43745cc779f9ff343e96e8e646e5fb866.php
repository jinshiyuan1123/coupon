<?php $__env->startSection('content'); ?>
     <section class="content">
         <div class="panel panel-primary">
             <div class="panel-heading">
                 <h3 class="panel-title">商品列表</h3>
             </div>
             <div class="panel-body">
                 <?php echo $__env->make('admin.shop.filter', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                 <table class="table table-bordered table-hover text-center">
                     <tr>
                         <th  style="width: 5%">ID</th>
                         <th  style="width: 10%">标题</th>
                         <th  style="width: 5%">图片</th>
                         <th  style="width: 5%">兑换积分</th>
                         <th  style="width: 5%">兑换</th>
                         <th  style="width: 15%">说明</th>
						 <th  style="width: 5%">状态</th>
						 <th  style="width: 5%">添加时间</th>
                         <th  style="width: 10%">操作</th>
                     </tr>
                     <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                         <tr>
                             <td>
                                 <?php echo e($item->id); ?>

                             </td>
                             <td>
                                <?php echo e($item->shoptitle); ?>

                             </td>
                             <td>
                                <a href="<?php echo e($item->imgurl); ?>" target="_blank"><img src="<?php echo e($item->imgurl); ?>" width="70px" height="30px;" /></a>
                             </td>
                             <td>
                                <?php echo e($item->score); ?>

                             </td>
                             <td>
                                <?php echo e($item->Couponsshopuser); ?> 
                             </td>
                             <td>
                                <?php echo e($item->info); ?>

                             </td>
                             <td>
                                <?php if($item->status==0): ?>
									<strong style="color:red">未上架</strong>
								<?php else: ?>
									<strong style="color:green">上架</strong>
								<?php endif; ?>
                             </td>
                             <td>
                                <?php echo e($item->created_at); ?>

                             </td>								 
                             <td>
                                 <a href="<?php echo e(route('shop.edit', ['id' => $item->getKey()])); ?>" class="btn btn-primary btn-xs">修改</a>
                                <!--- <button class="btn btn-danger btn-xs"
                                         data-url="<?php echo e(route('fs_level.destroy', ['id' => $item->getKey()])); ?>"
                                         data-toggle="modal"
                                         data-target="#delete-modal"
                                 >
                                     删除
                                 </button>--->
                             </td>
                         </tr>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <tfoot>
                        <tr>
                            <td><strong style="color: red">总合计</strong></td>
                            <td></td>
                            <td></td>
							<td><strong style="color: red"><?php echo e($total_score); ?></strong></td>
							<td><strong style="color: red"><?php echo e($total_Couponsshopuser); ?></strong></td>
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
                     <?php echo $data->appends(['status' => $status, 'shopID' =>$shopID, 'start_at' => $start_at, 'end_at' => $end_at])->links(); ?>

                 </div>
                 </div>
             </div>
         </div>

     </section><!-- /.content -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection("after.js"); ?>
     <?php echo $__env->make('admin.layouts.delete',['title'=>'操作提示','content'=>'你确定要删除这个优惠劵吗?'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->startSection('content'); ?>
     <section class="content">
         <div class="panel panel-primary">
             <div class="panel-heading">
                 <h3 class="panel-title">免单劵列表</h3>
             </div>
             <div class="panel-body">
                 <?php echo $__env->make('admin.fs_level.filter', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                 <table class="table table-bordered table-hover text-center">
                     <tr>
                         <th  style="width: 5%">ID</th>
                         <th  style="width: 10%">标题</th>
                         <th  style="width: 5%">商家名称</th>
                         <th  style="width: 5%">电话</th>
                         <th  style="width: 5%">地址</th>
                         <th  style="width: 15%">说明</th>
						 <th  style="width: 5%">金额</th>
						 <th  style="width: 5%">兑换积分</th>
						 <th  style="width: 10%">兑换/使用</th>
						 <th  style="width: 10%">开始时间</th>
						 <th  style="width: 10%">结束时间</th>
						 <th  style="width: 5%">状态</th>
                         <th  style="width: 10%">操作</th>
                     </tr>
                     <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                         <tr>
                             <td>
                                 <?php echo e($item->id); ?>

                             </td>
                             <td>
                                <?php echo e($item->title); ?>

                             </td>
                             <td>
                                <?php echo e($item->businessname); ?> 
                             </td>
                             <td>
                                <?php echo e($item->tel); ?> 
                             </td>
                             <td>
                                <?php echo e($item->address); ?>

                             </td>							 
                             <td>
                                <?php echo e($item->info); ?>

                             </td>
                             <td>
                                <?php echo e($item->decrease); ?>

                             </td>							 
                             <td>
                                <?php echo e($item->score); ?>

                             </td>
                             <td>
                                 <?php echo e($item->Couponsmiandanuser); ?>/<?php echo e($item->sumuse); ?>

                             </td>
                             <td>
                                <?php echo e($item->begintime); ?>

                             </td>
                             <td>
                                <?php echo e($item->endtime); ?>

                             </td>
                             <td>
							    <?php echo e($item->statustag); ?>

                             </td>							 
                             <td>
                                 <a href="<?php echo e(route('fs_level.edit', ['id' => $item->getKey()])); ?>" class="btn btn-primary btn-xs">修改</a>
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
                 </table>
                 <div class="clearfix">
                     <div class="pull-left" style="margin: 0;">
                         <p>总共 <strong style="color: red"><?php echo e($data->total()); ?></strong> 条</p>
                     </div>
                 <div class="pull-right" style="margin: 0;">
                     <?php echo $data->appends(['status' => $status, 'miandanID' =>$miandanID, 'start_at' => $start_at, 'end_at' => $end_at])->links(); ?>

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
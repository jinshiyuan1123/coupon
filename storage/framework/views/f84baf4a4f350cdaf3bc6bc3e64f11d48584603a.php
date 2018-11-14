<?php $__env->startSection('content'); ?>

     <section class="content">
         <div class="panel panel-primary">
             <div class="panel-heading">
                 <h3 class="panel-title">下线会员列表</h3>
             </div>
             <div class="panel-body">
                 <?php echo $__env->make('admin.member_offline.filter', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                 <table class="table table-bordered table-hover text-center">
                     <tr>
                         <th style="width: 5%">ID</th>
						 <th style="width: 5%">商家ID</th>
                         <th style="width: 10%">商家名称</th>
                         <th  style="width: 10%">名称</th>
                         <th  style="width: 10%">优惠条件</th>
                         <th  style="width: 10%">开始时间</th>
                         <th  style="width: 10%">截止时间</th>
                         <th  style="width: 10%">添加时间</th>
                         <th  style="width: 10%">介绍</th>
                         <th  style="width: 15%">操作</th>
                     </tr>
                     <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                         <tr>
                             <td>
                                 <?php echo e($item->id); ?>

                             </td>
                             <td>
                                <a href="/admin/member_daili?name=<?php echo e($item->name); ?>"> <?php echo e($item->businessid); ?></a>
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
                                 <?php echo e($item->begintime); ?>

                             </td>
                             <td>
                                 <?php echo e($item->endtime); ?>

                             </td>						 
                             <td>
                                 <?php echo e($item->created_at); ?>

                             </td>
                             <td>
							    <?php if($item->info): ?>
								 <?php echo e($item->info); ?>

							    <?php else: ?>
									无
								<?php endif; ?>
                             </td>
                             <td>
							  <a href="<?php echo e(route('member_offline.show', ['id' => $item->getKey()])); ?>" class="btn btn-primary btn-xs" onclick="return confirm('确定通过吗？')">通过</a>
                              <a href="<?php echo e(route('member_offline.update', ['id' => $item->getKey()])); ?>" class="btn btn-danger btn-xs" onclick="return confirm('确定不通过吗？')">不通过</a>
							 </td>
                         </tr>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                 </table>
                 <div class="clearfix">
                     <div class="pull-left" style="margin: 0;">
                         <p>总共 <strong style="color: red"><?php echo e($data->total()); ?></strong> 条</p>
                     </div>
                     <div class="pull-right" style="margin: 0;">
                         <?php echo $data->appends(['businessid' => $businessid])->links(); ?>

                     </div>
                 </div>
             </div>
         </div>

     </section><!-- /.content -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection("after.js"); ?>
     <?php echo $__env->make('admin.layouts.delete',['title'=>'操作提示','content'=>'你确定要删除这个用户吗?'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
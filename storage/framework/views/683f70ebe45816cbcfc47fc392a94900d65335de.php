<?php $__env->startSection('content'); ?>
     <section class="content">
         <div class="panel panel-primary">
             <div class="panel-heading">
                 <h3 class="panel-title">免单兑换列表</h3>
             </div>
             <div class="panel-body">
                 <?php echo $__env->make('admin.miandanuser.filter', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                 <table class="table table-bordered table-hover text-center">
                     <tr>
                         <th  style="width: 5%">ID</th>
                         <th  style="width: 10%">用户</th>
                         <th  style="width: 5%">商家名称</th>
                         <th  style="width: 5%">免单卷</th>
                         <th  style="width: 5%">金额</th>
                         <th  style="width: 15%">兑换积分</th>
						 <th  style="width: 10%">验证码</th>
						 <th  style="width: 10%">添加时间</th>
						 <th  style="width: 5%">状态</th>
                         <th  style="width: 10%">操作</th>
                     </tr>
                     <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                         <tr>
                             <td>
                                 <?php echo e($item->id); ?>

                             </td>
                             <td>
                                 <a href="/admin/member?id=<?php echo e($item->uid); ?>"><?php echo e($item->member_name); ?></a>
                             </td>							 
                             <td>
                                <?php echo e($item->businessname); ?>

                             </td>
                             <td>
                                 <a href="/admin/fs_level?miandanID=<?php echo e($item->couponsmiandanid); ?>"><?php echo e($item->title); ?></a>
                             </td>
                             <td>
                                <?php echo e($item->decrease); ?>

                             </td>
                             <td>
                                <?php echo e($item->score); ?>

                             </td>							 
                             <td>
                                <?php echo e($item->code); ?>

                             </td>
                             <td>
                                <?php echo e($item->created_at); ?>

                             </td>							 
                             <td>
                                <?php if($item->status==0): ?>
									<strong style="color:red">未使用</strong>
								<?php else: ?>
									<strong style="color:green">已使用</strong>
								<?php endif; ?>
                             </td>						 
                             <td>
							 <a href="<?php echo e(route('miandanuser.edit', ['id' => $item->getKey()])); ?>" class="btn btn-primary btn-xs">修改</a>
                                 <button class="btn btn-danger btn-xs"
                                         data-url="<?php echo e(route('miandanuser.destroy', ['id' => $item->getKey()])); ?>"
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
                     <?php echo $data->appends(['status' => $status, 'uid' =>$uid, 'start_at' => $start_at, 'end_at' => $end_at])->links(); ?>

                 </div>
                 </div>
             </div>
         </div>

     </section><!-- /.content -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection("after.js"); ?>
     <?php echo $__env->make('admin.layouts.delete',['title'=>'操作提示','content'=>'你确定要删除这个用户免单劵吗?'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->startSection('content'); ?>
     <section class="content">
         <div class="panel panel-primary">
             <div class="panel-heading">
                 <h3 class="panel-title">朋友圈审核</h3>
             </div>
             <div class="panel-body">
                 <?php echo $__env->make('admin.activity.filter', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                 <table class="table table-bordered table-hover text-center">
                     <tr>
                         <th style="width: 10%">ID</th>
                         <th class="text-center">用户</th>
						 <th  style="width: 10%">分类</th>
                         <th  style="width: 20%">内容</th>
                         <th  style="width: 20%">图片</th>
                         <th  style="width: 20%">操作</th>
                     </tr>
                     <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                         <tr>
                             <td>
                                 <?php echo e($item->id); ?>

                             </td>
                             <td>
							     <a href="/admin/member?id=<?php echo e($item->uid); ?>"><?php echo e($item->member_name); ?> </a>
                             </td>
                             <td>
                                 <?php echo e($item->Momentsclass); ?>

                             </td>
                             <td>
                                 <?php echo e($item->content); ?>

                             </td>
                             <td>
							 <?php 
							    $imgurl=explode(',',$item->imgurl);
								if($item->imgurl !=''){
                                for($i=0;$i<count($imgurl);$i++){	
							?>
							<a href="<?=$imgurl[$i]?>" target="_blank" style="background-color: #337ab7;"><img src="<?=$imgurl[$i]?>" width="20px" height="20px" /></a>
								<?php }}?>
                             </td>
                             <td>
                                <a href="<?php echo e(route('activity.check', ['id' => $item->getKey(), 'status' => 1])); ?>" class="btn btn-primary btn-xs" onclick="return confirm('确定通过吗？')">通过</a>
                                 <!---<a href="<?php echo e(route('activity.edit', ['id' => $item->getKey()])); ?>" class="btn btn-primary btn-xs">修改</a>-->
                                 <button class="btn btn-danger btn-xs"
                                         data-url="<?php echo e(route('activity.destroy', ['id' => $item->getKey()])); ?>"
                                         data-toggle="modal"
                                         data-target="#delete-modal"
                                 >
                                     不通过
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
                     <?php echo $data->appends([ 'end_at' => $end_at])->links(); ?>

                 </div>
                 </div>
             </div>
         </div>

     </section><!-- /.content -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection("after.js"); ?>
     <?php echo $__env->make('admin.layouts.delete',['title'=>'操作提示','content'=>'你确定要删除这个动态吗?'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
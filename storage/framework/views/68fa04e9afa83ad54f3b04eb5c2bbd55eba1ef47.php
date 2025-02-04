<?php $__env->startSection('content'); ?>
     <section class="content">
         <div class="panel panel-primary">
             <div class="panel-heading">
                 <h3 class="panel-title">商家审核列表</h3>
             </div>
             <div class="panel-body">
                 <?php echo $__env->make('admin.member_daili_apply.filter', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                 <table class="table table-bordered table-hover text-center">
                     <tr>
                         <th style="width: 5%">用户</th>
                         <th style="width: 5%">电话</th>
                         <th style="width: 10%">商家名称</th>
						 <th style="width: 10%">地址</th>
						 <th style="width: 5%">姓名</th>
						 <th style="width: 10%">身份证</th>
						 <th style="width: 10%">营业执照</th>
                         <th style="width: 10%">申请理由</th>
                         <th style="width: 10%">状态</th>
                         <th style="width: 10%">拒绝理由</th>
                         <th style="width: 10%">操作</th>
                     </tr>
                     <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                         <tr>
                             <td>
                                 <?php echo e($item->member_id); ?>

                             </td>
                             <td>
                                 <?php echo e($item->phone); ?>

                             </td>
                             <td>
                                 <?php echo e($item->Businessname); ?>

                             </td>
                             <td>
                                 <?php echo e($item->Businessaddress); ?>

                             </td>
                             <td>
                                 <?php echo e($item->name); ?>

                             </td>	
                             <td>
                                <a href="<?php echo e($item->idcard); ?>" target="_blank"> <img src="<?php echo e($item->idcard); ?>" width="50px" height="50px" /></a>
                             </td>	
                             <td>
                                  <a href="<?php echo e($item->Business); ?>" target="_blank"> <img src="<?php echo e($item->Business); ?>" width="50px" height="50px" /></a>
                             </td>
                             <td>
							 <?php echo e($item->about); ?>

                             </td>								 
                             <td>
                                 <?php if($item->status == 0): ?>
                                     <strong style="color: orange">待审核</strong>
                                 <?php elseif($item->status == 1): ?>
                                     <strong style="color: green">审核通过</strong>
                                 <?php elseif($item->status == 2): ?>
                                     <strong style="color: red">审核不通过</strong>
                                 <?php endif; ?>
                             </td>
                             <td>
                                 <?php echo e($item->fail_reason); ?>

                             </td>
                             <td>
                                 <?php if($item->status == 0): ?>
                                 <a href="<?php echo e(route('member_daili_apply.show', ['id' => $item->getKey()])); ?>" class="btn btn-primary btn-xs" onclick="return confirm('确定通过吗？')">同意</a>

                                 <button type="button" class="btn btn-danger btn-xs" data-uri="<?php echo e(route('member_daili_apply.update', ['id' => $item->id])); ?>" onclick="showRemark(this)">不同意</button>
                                 
                                         
                                         
                                         
                                 
                                     
                                 
                                     <?php endif; ?>
                             </td>
                         </tr>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                 </table>
                 <div class="clearfix">
                     <div class="pull-left" style="margin: 0;">
                         <p>总共 <strong style="color: red"><?php echo e($data->total()); ?></strong> 条</p>
                     </div>
                 <div class="pull-right" style="margin: 0;">
                    <?php echo $data->appends(['phone' => $phone])->links(); ?>

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
<?php $__env->startSection("after.js"); ?>
     <?php echo $__env->make('admin.layouts.delete',['title'=>'操作提示','content'=>'你确定要删除这个返水等级吗?'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->startSection('content'); ?>

     <section class="content">
         <div class="panel panel-primary">
             <div class="panel-heading">
                 <h3 class="panel-title">会员列表</h3>
             </div>
             <div class="panel-body">
                 <?php echo $__env->make('admin.member.filter', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                 <table class="table table-bordered table-hover text-center">
                     <tr>
                         <th style="width: 2%">ID</th>
                         <th class="text-center">用户名</th>
                         <th  style="width: 8%">账户余额</th>
                         <th  style="width: 8%">积分余额</th>
                         <th  style="width: 8%">昵称</th>
                         <th  style="width: 10%">是否是商家</th>
                         <th  style="width: 10%">手机/邮箱</th>
                         <th  style="width: 10%">注册IP</th>
                         <th  style="width: 10%">注册时间</th>
                         <th  style="width: 5%">状态</th>
                         <th  style="width: 5%">在线</th>
                         <th  style="width: 20%">操作</th>
                     </tr>
                     <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                         <tr>
                             <td>
                                 <?php echo e($item->id); ?>

                             </td>
                             <td>
                                 <?php echo e($item->name); ?>

                             </td>
                             <td>
                                 <?php echo e($item->money); ?>

                             </td>
                             <td>
                                 <?php echo e($item->score); ?>

                             </td>
                             <td>
                                 <?php echo e($item->nichen); ?>

                             </td>
                             <td>
                                 <?php if($item->is_daili == 1): ?>
                                     <span style="color: red">是</span>
                                 <?php else: ?>
                                     <span>否</span>
                                 <?php endif; ?>
                                 
                             </td>
                             <td>
                                 <?php echo e($item->phone); ?>/<?php echo e($item->email); ?>

                             </td>
                             <td>
                                 <?php echo e($item->register_ip); ?>

                             </td>
                             <td>
                                 <?php echo e($item->created_at); ?>

                             </td>
                             <td>
                                 <?php echo \App\Models\Base::$MEMBER_STATUS_HTML[$item->status]; ?>

                             </td>
                             <td>
                                 <?php if(in_array($item->id, $_online_member_array)): ?> 是  <?php else: ?> 否 <?php endif; ?>
                             </td>
                             <td>
                                 <button type="button" data-uri="<?php echo e(route('member.showGameRecordInfo', ['id' => $item->getKey()])); ?>" class="btn btn-info btn-xs show-cate">查看</button>
                                 <a href="<?php echo e(route('member.edit', ['id' => $item->getKey()])); ?>" class="btn btn-primary btn-xs">修改</a>
                                <!--- <a href="<?php echo e(route('member.assign', ['id' => $item->getKey()])); ?>" class="btn btn-warning btn-xs">分配代理</a>--->
                             <?php if($item->status == 0): ?>
                                    <a href="<?php echo e(route('member.check', ['id' => $item->getKey(), 'status' => 1])); ?>" class="btn btn-danger btn-xs" onclick="return confirm('确定禁用吗？')">禁用</a>
                                 <?php elseif($item->status == 1): ?>
                                     <a href="<?php echo e(route('member.check', ['id' => $item->getKey(), 'status' => 0])); ?>" class="btn btn-success btn-xs" onclick="return confirm('确定启用吗？')">启用</a>
                                 <?php endif; ?>
                                <!--- <button class="btn btn-danger btn-xs"
                                         data-url="<?php echo e(route('member.destroy', ['id' => $item->getKey()])); ?>"
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
                         <?php echo $data->appends(['name' => $name, 'status' => $status, 'register_ip' =>$register_ip,'on_line' => $on_line])->links(); ?>

                     </div>
                 </div>
             </div>
         </div>

     </section><!-- /.content -->
     <script>
         $(function(){
             $('.show-cate').click(function(){
                 var url = $(this).attr('data-uri');
                 layer.open({
                     type: 2,
                     title: '记录',
                     shadeClose: false,
                     shade: 0.8,
                     area: ['90%', '90%'],
                     content: url
                 });
             })
         });
     </script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection("after.js"); ?>
     <?php echo $__env->make('admin.layouts.delete',['title'=>'操作提示','content'=>'你确定要删除这个用户吗?'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->startSection('content'); ?>
    <section class="content">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">管理员列表</h3>
            </div>
            <div class="panel-body">
                <?php echo $__env->make('admin.user.filter', ['excel' => true], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                <table class="table table-hover">
                    <tr class="row">
                        <th class="col-lg-1 text-center">ID</th>
                        <th class="text-center">姓名</th>
                        <th class="col-lg-2 text-center">管理组</th>
                        <th class="col-lg-2 text-center">email</th>
                        <th class="col-lg-2 text-center">操作</th>
                    </tr>
                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="row text-center">
                            <td class="col-lg-1">
                                <?php echo e($item->id); ?>

                            </td>
                            <td>
                                <?php echo e($item->name); ?>

                            </td>
                            <td>
                                <?php echo e($item->role->name); ?>

                            </td>
                            <td class="col-lg-2">
                                <?php echo e($item->email); ?>

                            </td>
                            <td class="col-lg-2">
                                <a href="<?php echo e(route('user.edit', ['id' => $item->getKey()])); ?>" class="btn btn-primary btn-xs">修改</a>
                                <?php if($_user->is_super_admin == 1): ?>
                                    | <button class="btn btn-danger btn-xs"
                                              data-url="<?php echo e(route('user.destroy', ['id' => $item->getKey()])); ?>"
                                              data-toggle="modal"
                                              data-target="#delete-modal"
                                    >
                                        删除
                                    </button>
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
                    <?php echo $data->appends(['name' => $name, 'role_id' => $role_id])->links(); ?>

                    </div>
                </div>
            </div>
        </div>

    </section><!-- /.content -->

     <!-- Main content -->
     
         
             
                 
                     
                     
                             
                     
                         
                             
                                 
                                 
                                 
                                 
                             
                             
                                 
                                     
                                         
                                     
                                     
                                         
                                     
                                     
                                         
                                     
                                     
                                         
                                         
                                          
                                                 
                                                 
                                                 
                                         
                                             
                                         
                                             
                                     
                                 
                             
                         
                         
                             
                                 
                             
                             
                                 
                             
                         
                     
                 
             
         

     
<?php $__env->stopSection(); ?>
<?php $__env->startSection("after.js"); ?>
     <?php echo $__env->make('admin.layouts.delete',['title'=>'操作提示','content'=>'你确定要删除这个用户吗?'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
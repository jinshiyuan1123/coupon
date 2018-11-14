<?php $__env->startSection('content'); ?>

     <section class="content">
         <div class="panel panel-primary">
             <div class="panel-heading">
                 <h3 class="panel-title">商家列表</h3>
             </div>
             <div class="panel-body">
                 <?php echo $__env->make('admin.member_daili.filter', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                 <table class="table table-bordered table-hover text-center">
                     <tr>
                         <th style="width: 5%">ID</th>
                         <th class="text-center" style="width: 5%">用户名</th>
                         <th  style="width: 15%">真实姓名/注册时间</th>
						 <th  style="width: 5%">店标</th>
                         <th  style="width: 10%">名称/电话</th>
                         <th  style="width: 10%">地址</th>
						 <th  style="width: 10%">证件</th>
						 <th  style="width: 5%">余额</th>
						 <th  style="width: 10%">优惠券/使用</th>
						 <th  style="width: 5%">收款总额</th>
                         <th  style="width: 5%">状态</th>
                         <th  style="width: 10%">操作</th>
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
                                 <?php echo e($item->real_name); ?><br>
                                 <?php echo e($item->created_at); ?>

                             </td>
                             <td>
                                 <a href="<?php echo e($item->Businessheadpic); ?>" target="_blank"><img src="<?php echo e($item->Businessheadpic); ?>" width="30px;" height="30px"/></a>
                             </td>							 
                             <td>
                                 <?php echo e($item->Businessname); ?><br>
                                 <?php echo e($item->Businessphone); ?>

                             </td>
                             <td>
							 <?php echo e($item->Businessaddress); ?>

                             </td>
                             <td>
                                 <a href="<?php echo e($item->idcard); ?>" target="_blank"><img src="<?php echo e($item->idcard); ?>" width="20px;" height="20px"/></a>
								 <a href="<?php echo e($item->Business); ?>" target="_blank"><img src="<?php echo e($item->Business); ?>" width="20px;" height="20px"/></a>
                             </td>
                             <td>
                                <?php echo e($item->money); ?> 
                             </td>
                             <td>
							 <a href="/admin/member_offline_recharge?businessid=<?php echo e($item->id); ?>"><?php echo e($item->coupons); ?>/
							 <?php echo e($item->usecoupons); ?></a>
                             </td>
                             <td>
                                <?php echo e($item->paymoney); ?> 
                             </td>								 						 
                             <td>
                                 <?php echo \App\Models\Base::$MEMBER_STATUS_HTML[$item->status]; ?>

                             </td>
                             <td>
                                 <a href="<?php echo e(route('member_daili.edit', ['id' => $item->getKey()])); ?>" class="btn btn-primary btn-xs">修改</a>
                                 <!--<button class="btn btn-danger btn-xs"
                                         data-url="<?php echo e(route('member_daili.destroy', ['id' => $item->getKey()])); ?>"
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
                     <?php echo $data->appends(['name' => $name])->links(); ?>

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
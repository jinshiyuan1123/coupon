<?php $__env->startSection('content'); ?>
    <section class="content">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">编辑免单劵</h3>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" id="form" action="<?php echo e(route('fs_level.update', ['id' => $data->id])); ?>" method="post">
                    <input type="hidden" name="_method" value="put">
                    <div class="box-body">
                                               <div class="form-group">
                            <label for="status" class="col-sm-2 control-label">选择状态</label>
                            <div class="col-sm-7">
                                <select name="status" id="status" class="form-control">
                                        <option value="1" <?php if($data['status'] == 1): ?> selected <?php endif; ?>>上架</option>
										 <option value="0" <?php if($data['status'] == 0): ?> selected <?php endif; ?>>未上架</option>

                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="title" class="col-sm-2 control-label">标题</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="title" name="title" value="<?php echo e($data['title']); ?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="businessname" class="col-sm-2 control-label">商家名称</label>
                            <div class="col-sm-7">
                                <input type="number" class="form-control" id="businessname" name="businessname"  value="<?php echo e($data['businessname']); ?>"  />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="decrease" class="col-sm-2 control-label">免单金额</label>
                            <div class="col-sm-7">
                                <input type="number" class="form-control" id="decrease" name="decrease" value="<?php echo e($data['decrease']); ?>" />
                            </div>
                        </div>

                <div class="form-group">
                    <label for="begintime" class="col-sm-2 control-label">开始时间</label>
					<div class="col-sm-7">
                    <input type="text" class="form-control" name="begintime" id="start_at" value="<?php echo e($data['begintime']); ?>" readonly>
					</div>
                </div>
                <div class="form-group">
                    <label for="endtime" class="col-sm-2 control-label">结束时间</label>
					<div class="col-sm-7">
                    <input type="text" class="form-control" name="endtime" id="end_at" value="<?php echo e($data['endtime']); ?>" readonly>
					</div>
                </div>						
                        <div class="form-group">
                            <label for="tel" class="col-sm-2 control-label">电话</label>
                            <div class="col-sm-7">
                                <input type="number" class="form-control" id="tel" name="tel" value="<?php echo e($data['tel']); ?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="address" class="col-sm-2 control-label">地址</label>
                            <div class="col-sm-7">
                                <input type="number" class="form-control" id="address" name="address" value="<?php echo e($data['address']); ?>" />
                            </div>
                        </div>	
                        <div class="form-group">
                            <label for="info" class="col-sm-2 control-label">说明</label>
                            <div class="col-sm-7">
                                <input type="number" class="form-control" id="info" name="info" value="<?php echo e($data['info']); ?>" />
                            </div>
                        </div>	
                        <div class="form-group">
                            <label for="score" class="col-sm-2 control-label">兑换积分</label>
                            <div class="col-sm-7">
                                <input type="number" class="form-control" id="score" name="score" value="<?php echo e($data['score']); ?>" />
                            </div>
                        </div>				
                    </div><!-- /.box-body -->
                    <div class="box-footer">
                        <div class="form-group">
                            <label class="col-sm-2 control-label"></label>
                            <div class="col-sm-7">
                                <button type="button" class="btn btn-primary submit-form-sync">提交</button>
                                &nbsp;<a href="<?php echo e(route('fs_level.index')); ?>" class="btn btn-info">返回</a>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>

    </section><!-- /.content -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
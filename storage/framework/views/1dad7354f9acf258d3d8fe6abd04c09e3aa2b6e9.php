<?php $__env->startSection('content'); ?>
    <section class="content">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">编辑免单劵状态</h3>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" id="form" action="<?php echo e(route('miandanuser.update', ['id' => $data->id])); ?>" method="post">
                    <input type="hidden" name="_method" value="put">
                    <div class="box-body">
                                               <div class="form-group">
                            <label for="status" class="col-sm-2 control-label">选择状态</label>
                            <div class="col-sm-7">
                                <select name="status" id="status" class="form-control">
                                        <option value="1" <?php if($data['status'] == 1): ?> selected <?php endif; ?>>已使用</option>
										 <option value="0" <?php if($data['status'] == 0): ?> selected <?php endif; ?>>未使用</option>

                                </select>
                            </div>
                        </div>			
                    </div><!-- /.box-body -->
                    <div class="box-footer">
                        <div class="form-group">
                            <label class="col-sm-2 control-label"></label>
                            <div class="col-sm-7">
                                <button type="button" class="btn btn-primary submit-form-sync">提交</button>
                                &nbsp;<a href="<?php echo e(route('miandanuser.index')); ?>" class="btn btn-info">返回</a>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>

    </section><!-- /.content -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
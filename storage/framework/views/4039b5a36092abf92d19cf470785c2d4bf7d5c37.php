<div class="container-fluid" style="margin-bottom: 10px;">
    <form action="" method="get" id="searchForm">
        <div class="row">
            <div class="col-lg-3">
                <div class="input-group">
                    <span class="input-group-addon">免单劵ID</span>
                    <input type="text" class="form-control" name="miandanID" placeholder="免单劵ID" value="<?php echo e($miandanID); ?>">
                </div>
            </div>
            <div class="col-lg-2">
                <div class="input-group">
                    <span class="input-group-addon">状态</span>
                    <select name="status"  class="form-control">
					    <option value="0" <?php if($status == 0): ?> selected <?php endif; ?>>--请选择--</option>
                        <option value="1" <?php if($status == 1): ?> selected <?php endif; ?>>上架</option>
						<option value="2" <?php if($status == 2): ?> selected <?php endif; ?>>未上架</option>
						<option value="4" <?php if($status == 3): ?> selected <?php endif; ?>>已过期</option>
						
                    </select>
                </div>
            </div>	
            <div class="col-lg-2">
                <div class="input-group">
                    <span class="input-group-addon">开始时间</span>
                    <input type="text" class="form-control" name="start_at" id="start_at" value="<?php echo e($start_at); ?>" readonly>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="input-group">
                    <span class="input-group-addon">结束时间</span>
                    <input type="text" class="form-control" name="end_at" id="end_at" value="<?php echo e($end_at); ?>" readonly>
                </div>
            </div>				
        </div>
		<div class="row">
            <div class="col-lg-2 pull-right">
                <div class="input-group">
                    <button type="submit" class="btn btn-primary">搜索</button>&nbsp;&nbsp;
                    <a class="btn btn-info" href="<?php echo e(route('fs_level.create')); ?>"><span class="glyphicon glyphicon-plus"></span>添加免单劵</a>
                </div>
            </div>		
		</div>
    </form>
</div>
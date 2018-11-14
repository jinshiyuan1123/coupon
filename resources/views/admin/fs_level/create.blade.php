@extends('admin.layouts.main')
@section('content')
    <section class="content">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">添加免单劵</h3>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" id="form" action="{{ route('fs_level.store') }}" method="post">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="status" class="col-sm-2 control-label">选择状态</label>
                            <div class="col-sm-7">
                                <select name="status" id="status" class="form-control">
                                        <option value="1">上架</option>
										 <option value="0">未上架</option>

                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="title" class="col-sm-2 control-label">标题</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="title" name="title" placeholder="例：肯德基优惠" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="businessname" class="col-sm-2 control-label">商家名称</label>
                            <div class="col-sm-7">
                                <input type="number" class="form-control" id="businessname" name="businessname" placeholder="例：肯德基" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="decrease" class="col-sm-2 control-label">免单金额</label>
                            <div class="col-sm-7">
                                <input type="number" class="form-control" id="decrease" name="decrease" />
                            </div>
                        </div>

                <div class="form-group">
                    <label for="begintime" class="col-sm-2 control-label">开始时间</label>
					<div class="col-sm-7">
                    <input type="text" class="form-control" name="begintime" id="start_at" value="" readonly>
					</div>
                </div>
                <div class="form-group">
                    <label for="endtime" class="col-sm-2 control-label">结束时间</label>
					<div class="col-sm-7">
                    <input type="text" class="form-control" name="endtime" id="end_at" value="" readonly>
					</div>
                </div>						
                        <div class="form-group">
                            <label for="tel" class="col-sm-2 control-label">电话</label>
                            <div class="col-sm-7">
                                <input type="number" class="form-control" id="tel" name="tel" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="address" class="col-sm-2 control-label">地址</label>
                            <div class="col-sm-7">
                                <input type="number" class="form-control" id="address" name="address" />
                            </div>
                        </div>	
                        <div class="form-group">
                            <label for="info" class="col-sm-2 control-label">说明</label>
                            <div class="col-sm-7">
                                <input type="number" class="form-control" id="info" name="info" />
                            </div>
                        </div>	
                        <div class="form-group">
                            <label for="score" class="col-sm-2 control-label">兑换积分</label>
                            <div class="col-sm-7">
                                <input type="number" class="form-control" id="score" name="score" />
                            </div>
                        </div>							
                    </div><!-- /.box-body -->
                    <div class="box-footer">
                        <div class="form-group">
                            <label class="col-sm-2 control-label"></label>
                            <div class="col-sm-7">
                                <button type="button" class="btn btn-primary submit-form-sync">提交</button>
                                &nbsp;<a href="{{ route('fs_level.index') }}" class="btn btn-info">返回</a>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>

    </section><!-- /.content -->
@endsection
@extends('admin.layouts.main')
@section('content')
    <section class="content">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">编辑商品</h3>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" id="form" action="{{ route('shop.update', ['id' => $data->id]) }}" method="post">
                    <input type="hidden" name="_method" value="put">
                    <div class="box-body">
                                               <div class="form-group">
                            <label for="status" class="col-sm-2 control-label">选择状态</label>
                            <div class="col-sm-7">
                                <select name="status" id="status" class="form-control">
                                        <option value="1" @if($data['status'] == 1) selected @endif>上架</option>
										 <option value="0" @if($data['status'] == 0) selected @endif>未上架</option>

                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="shoptitle" class="col-sm-2 control-label">标题</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="shoptitle" name="shoptitle" value="{{$data['shoptitle']}}" />
                            </div>
                        </div>
                                    <div class="form-group">
                                        <label for="imgurl" class="col-sm-2 control-label">图片</label>
                                        <div class="col-sm-7">
                                            <input id="fileupload4" type="file" name="file" multiple>
                                            <div id="progress4" class="progress">
                                                <div class="progress-bar progress-bar-success"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="subtitle" class="col-sm-2 control-label"></label>
                                        <div class="col-sm-7">
                                            <div id="files4" class="files">
                                                    <div class="pull-left" style="position:relative;margin: 10px;">
                                                        <a href="{{ $data['imgurl'] }}" target="_blank"><img src="{{ $data['imgurl'] }}" alt="" style="width: 100px;"></a>
                                                        <a href="javascript:;" class="glyphicon glyphicon-remove" style="position: absolute;right: 0;top: 0;" onclick="removeDiv(this)"></a>
                                                        <input type="hidden" name="imgurl" value="{{ $data['imgurl'] }}">
                                                    </div>                                            
                                            </div>
                                        </div>
                                    </div>							
                        <div class="form-group">
                            <label for="info" class="col-sm-2 control-label">说明</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="info" name="info"  value="{{$data['info']}}"  />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="score" class="col-sm-2 control-label">兑换积分</label>
                            <div class="col-sm-7">
                                <input type="number" class="form-control" id="score" name="score" value="{{$data['score']}}" />
                            </div>
                        </div>
			
                    </div><!-- /.box-body -->
                    <div class="box-footer">
                        <div class="form-group">
                            <label class="col-sm-2 control-label"></label>
                            <div class="col-sm-7">
                                <button type="button" class="btn btn-primary submit-form-sync">提交</button>
                                &nbsp;<a href="{{ route('shop.index') }}" class="btn btn-info">返回</a>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>

    </section><!-- /.content -->
@endsection
@extends('admin.layouts.main')
@section('content')
 @include('admin.layouts.ueditor_admin')
    <script>
        var ue = UE.getEditor('editor');
        ue.ready(function(){
            //var content = "";
          ue.setContent('{!! $data->content !!}');
        })


    </script>
 <section class="content">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">代理编辑优惠</h3>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" id="form1" action="Hot" method="post">
                    <div class="box-body">
                  
                        <div class="form-group">
                            <label for="title" class="col-sm-2 control-label">标题 <strong style="color: red">*</strong></label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="title" name="title" value="{{$data->title}}" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="subtitle" class="col-sm-2 control-label">副标题</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="subtitle" name="subtitle" value="{{$data->subtitle}}" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="quota" class="col-sm-2 control-label">说明</label>
                            <div class="col-sm-7">
                                <script id="editor" name="content" type="text/plain"></script>
                            </div>
                        </div>
                       
                    </div><!-- /.box-body -->
                    <div class="box-footer">
                        <div class="form-group">
                            <label class="col-sm-2 control-label"></label>
                            <div class="col-sm-7">
                                <input type="submit" class="btn btn-primary submit-form-sync"></input>
                                
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>

    </section>
@endsection

<?php $__env->startSection('after.css'); ?>
    
    <link rel="stylesheet" href="<?php echo e(asset('/backstage/css/jquery.fileupload.css')); ?>">
    
    
    
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.layouts.ueditor_admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <script>
        var ue = UE.getEditor('editor');
        ue.ready(function(){
            //var content = "";
            ue.setContent('');
        })

        var ue2 = UE.getEditor('title_editor');
        ue2.ready(function(){
            //var content = "";
            ue.setContent('');
        })

        var ue3 = UE.getEditor('rule_editor');
        ue3.ready(function(){
            //var content = "";
            ue.setContent('');
        })
    </script>
    <section class="content">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">添加活动</h3>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" id="form" action="<?php echo e(route('activity.store')); ?>" method="post">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="title" class="col-sm-2 control-label">活动类型 <strong style="color: red">*</strong></label>
                            <div class="col-sm-7">
                                <select name="type" id="type" class="form-control">
                                    <option value="">--请选择--</option>
                                    <?php $__currentLoopData = config('platform.activity_type'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($k); ?>" <?php if($k == 3): ?> selected <?php endif; ?>><?php echo e($v); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="title" class="col-sm-2 control-label">活动标题 <strong style="color: red">*</strong></label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="title" name="title" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="subtitle" class="col-sm-2 control-label">活动副标题</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="subtitle" name="subtitle" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="sort" class="col-sm-2 control-label">排序</label>
                            <div class="col-sm-7">
                                <input type="number" class="form-control" id="sort" name="sort" value="1"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="subtitle" class="col-sm-2 control-label">活动列表图片(1张)</label>
                            <div class="col-sm-7">
                                <span class="btn btn-primary fileinput-button">
                                    <i class="glyphicon glyphicon-plus"></i>
                                    <span>选择文件</span>
                                    <input id="fileupload" type="file" name="file" multiple>
                                </span>

                                <div id="progress" class="progress">
                                <div class="progress-bar progress-bar-success"></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="subtitle" class="col-sm-2 control-label"></label>
                            <div class="col-sm-7">
                                <div id="files" class="files" style="clear: both">

                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="start_at" class="col-sm-2 control-label">活动开始时间</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" id="start_at" name="start_at" readonly />
                            </div>

                            <label for="end_at" class="col-sm-1 control-label">活动截止时间</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" id="end_at" name="end_at" readonly />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="date_desc" class="col-sm-2 control-label">活动时间文字描述</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="date_desc" name="date_desc" value="长期有效" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="money" class="col-sm-2 control-label">活动所需达到的金额</label>
                            <div class="col-sm-3">
                                <input type="number" class="form-control" id="money" name="money" />
                            </div>

                            <label for="rate" class="col-sm-1 control-label">赠送比例</label>
                            <div class="col-sm-3">
                                <input type="number" class="form-control" id="rate" name="rate"  />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="gift_limit_money" class="col-sm-2 control-label">赠送金额上限</label>
                            <div class="col-sm-7">
                                <input type="number" class="form-control" id="gift_limit_money" name="gift_limit_money" />
                            </div>
                        </div>
                        
                            
                            
                                
                                    
                                
                            
                        
                        <div class="form-group">
                            <label for="quota" class="col-sm-2 control-label">标题内容</label>
                            <div class="col-sm-7">
                                <script id="title_editor" name="title_content" type="text/plain"></script>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="quota" class="col-sm-2 control-label">活动说明</label>
                            <div class="col-sm-7">
                                <script id="editor" name="content" type="text/plain"></script>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="quota" class="col-sm-2 control-label">活动规则</label>
                            <div class="col-sm-7">
                                <script id="rule_editor" name="rule_content" type="text/plain"></script>
                            </div>
                        </div>
                    </div><!-- /.box-body -->
                    <div class="box-footer">
                        <div class="form-group">
                            <label class="col-sm-2 control-label"></label>
                            <div class="col-sm-7">
                                <button type="button" class="btn btn-primary submit-form-sync">提交</button>
                                &nbsp;<a href="<?php echo e(route('activity.index')); ?>" class="btn btn-info">返回</a>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>

    </section><!-- /.content -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('after.js'); ?>
    <script src="<?php echo e(asset('/backstage/js/jquery.ui.widget.js')); ?>"></script>
    <!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
    <script src="<?php echo e(asset('/backstage/js/jquery.iframe-transport.js')); ?>"></script>
    <!-- The basic File Upload plugin -->
    <script src="<?php echo e(asset('/backstage/js/jquery.fileupload.js')); ?>"></script>
    <script>
        var start = {
            elem: '#start_at',
            format: 'YYYY-MM-DD hh:mm:ss',
            //min: laydate.now(), //设定最小日期为当前日期
            max: '2099-06-16 23:59:59', //最大日期
            istime: true,
            istoday: false,
            choose: function(datas){
                end.min = datas; //开始日选好后，重置结束日的最小日期
                end.start = datas //将结束日的初始值设定为开始日
            }
        };
        var end = {
            elem: '#end_at',
            format: 'YYYY-MM-DD 23:59:59',
            //min: laydate.now(),
            max: '2099-06-16 23:59:59',
            istime: true,
            istoday: true,
            choose: function(datas){
                start.max = datas; //结束日选好后，重置开始日的最大日期
            }
        };
        laydate(start);
        laydate(end);
    </script>
    <script>
        /*jslint unparam: true */
        /*global window, $ */
        var upload_url = "<?php echo e(route('upload.post')); ?>";
        $(function () {
            'use strict';
            // Change this to the location of your server-side upload handler:
            var url = upload_url;
            $('#fileupload').fileupload({
                url: url,
                dataType: 'json',
                done: function (e, data) {

                    var res = data.result;
                    //console.log(res)
                    if (res.status == 0)
                    {
                        alert(res.message);
                        return false;
                    }
                    var img_path = res.data.url;
                    var html = '<div class="pull-left" style="position:relative;margin: 10px;">' +
                                '<a href="'+img_path+'" target="_blank">' +
                                '<img src="'+img_path+'" style="width: 100px;" />' +
                                '</a>' +
                            '<a href="javascript:;" class="glyphicon glyphicon-remove" style="position: absolute;right: 0;top: 0;" onclick="removeDiv(this)"></a>'+
                                '<input type="hidden" name="title_img" value="'+img_path+'">' +
                                '</div>';
                    $('#files').append(html)

                    //console.log(data)
//                    $.each(data.result.files, function (index, file) {
//                        console.log(file)
//                        $('<p/>').text(file.name).appendTo('#files');
//                        var img = '<img src="'+file.thumbnailUrl+'" style="width: 50px;" />';
//                        $('#imgs').append(img)
//                    });
                },
                progressall: function (e, data) {
                    var progress = parseInt(data.loaded / data.total * 100, 10);
                    $('#progress .progress-bar').css(
                        'width',
                        progress + '%'
                    );
                }
            }).prop('disabled', !$.support.fileInput)
                .parent().addClass($.support.fileInput ? undefined : 'disabled');
        });

        function removeDiv(e)
        {
            $(e).closest('div').remove();
        }
    </script>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
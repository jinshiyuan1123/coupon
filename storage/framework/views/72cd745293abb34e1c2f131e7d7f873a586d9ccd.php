<?php $__env->startSection('content'); ?>
    <section class="content">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">系统设置</h3>
            </div>
            <div class="panel-body">
                <div>

                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">信息</a></li>
                        <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">佣金/积分</a></li>
                       <!--- <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">交易账号</a></li>
                        <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">第三方支付</a></li>--->
                        <li role="presentation"><a href="#verify" aria-controls="verify" role="tab" data-toggle="tab">验证</a></li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="home">
                            <form class="form-horizontal" id="form" action="<?php echo e(route('system_config.update', ['id' => 1])); ?>" method="post">
                                <input type="hidden" name="_method" value="put">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="site_name" class="col-sm-2 control-label">网站名称</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" id="site_name" name="site_name" value="<?php echo e($data->site_name); ?>"  />
                                        </div>
                                    </div>
                                  <!---  <div class="form-group">
                                        <label for="subtitle" class="col-sm-2 control-label">网站logo</label>
                                        <div class="col-sm-7">
                                            <input id="fileupload" type="file" name="file" multiple>
                                            <div id="progress" class="progress">
                                                <div class="progress-bar progress-bar-success"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="subtitle" class="col-sm-2 control-label"></label>
                                        <div class="col-sm-7">
                                            <div id="files" class="files">
                                                <?php if($data->site_logo): ?>
                                                    <div class="pull-left" style="position:relative;margin: 10px;">
                                                        <a href="<?php echo e($data->site_logo); ?>" target="_blank"><img src="<?php echo e($data->site_logo); ?>" alt="" style="width: 100px;"></a>
                                                        <a href="javascript:;" class="glyphicon glyphicon-remove" style="position: absolute;right: 0;top: 0;" onclick="removeDiv(this)"></a>
                                                        <input type="hidden" name="site_logo" value="<?php echo e($data->site_logo); ?>">
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>--->
                                    <div class="form-group">
                                        <label for="subtitle" class="col-sm-2 control-label">手机站logo</label>
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
                                                <?php if($data->m_site_logo): ?>
                                                    <div class="pull-left" style="position:relative;margin: 10px;">
                                                        <a href="<?php echo e($data->m_site_logo); ?>" target="_blank"><img src="<?php echo e($data->m_site_logo); ?>" alt="" style="width: 100px;"></a>
                                                        <a href="javascript:;" class="glyphicon glyphicon-remove" style="position: absolute;right: 0;top: 0;" onclick="removeDiv(this)"></a>
                                                        <input type="hidden" name="m_site_logo" value="<?php echo e($data->m_site_logo); ?>">
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="site_title" class="col-sm-2 control-label">网站标题</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" id="site_title" name="site_title" value="<?php echo e($data->site_title); ?>" />
                                        </div>
                                    </div>
                                    <!---<div class="form-group">
                                        <label for="site_domain" class="col-sm-2 control-label">网站主域名</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" id="site_domain" name="site_domain" value="<?php echo e($data->site_domain); ?>" />
                                        </div>
                                    </div>--->
                                    <div class="form-group">
                                        <label for="keyword" class="col-sm-2 control-label">关键字</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" id="keyword" name="keyword"  value="<?php echo e($data->keyword); ?>" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="phone1" class="col-sm-2 control-label">客服电话1</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" id="phone1" name="phone1"  value="<?php echo e($data->phone1); ?>" />
                                        </div>
                                       <!--- <label for="phone2" class="col-sm-1 control-label">客服电话2</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" id="phone2" name="phone2"  value="<?php echo e($data->phone2); ?>" />
                                        </div>--->
                                    </div>
                                    <!---<div class="form-group">
                                        <label for="qq" class="col-sm-2 control-label">客服qq</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" id="qq" name="qq" placeholder="直接填写 qq号"  value="<?php echo e($data->qq); ?>" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="service_link" class="col-sm-2 control-label">客服链接</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" id="service_link" name="service_link"  value="<?php echo e($data->service_link); ?>" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="keyword" class="col-sm-2 control-label">网站模式</label>
                                        <div class="col-sm-7">
                                            <label><input type="radio" name="is_maintain"  value="0" <?php if($data->is_maintain == 0): ?>checked <?php endif; ?> />正常</label>
                                            <label><input type="radio" name="is_maintain"  value="1" <?php if($data->is_maintain == 1): ?>checked <?php endif; ?> />维护</label>
                                        </div>
                                    </div>--->
                                    <div class="form-group">
                                        <label for="maintain_desc" class="col-sm-2 control-label">广告合作</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" id="maintain_desc" name="maintain_desc"  value="<?php echo e($data->maintain_desc); ?>" />
                                        </div>
                                    </div>
                                </div><!-- /.box-body -->
                                <div class="box-footer">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label"></label>
                                        <div class="col-sm-7">
                                            <button type="button" class="btn btn-primary submit-form-sync">提交</button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                        <div role="tabpanel" class="tab-pane" id="profile">
                            <form class="form-horizontal" id="form" action="<?php echo e(route('system_config.update', ['id' => 1])); ?>" method="post">
                                <input type="hidden" name="_method" value="put">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="active_member_money" class="col-sm-2 control-label">平台抽取佣金比例（%）</label>
                                        <div class="col-sm-7">
                                            <input type="number" class="form-control" id="active_member_money" name="active_member_money"  value="<?php echo e($data->active_member_money); ?>" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="active_member_money" class="col-sm-2 control-label">消费奖励积分比例（%）</label>
                                        <div class="col-sm-7">
                                            <input type="number" class="form-control" id="active_member_money2" name="active_member_money2"  value="<?php echo e($data->active_member_money2); ?>" />
                                        </div>
                                    </div>									
                                </div><!-- /.box-body -->
                                <div class="box-footer">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label"></label>
                                        <div class="col-sm-7">
                                            <button type="button" class="btn btn-primary submit-form-sync">提交</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                       <!--- <div role="tabpanel" class="tab-pane" id="messages">
                            <form class="form-horizontal" id="form" action="<?php echo e(route('system_config.update', ['id' => 1])); ?>" method="post">
                                <input type="hidden" name="_method" value="put">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="is_wechat_on" class="col-sm-2 control-label"><span style="color: red">是否开放银行卡转账</span></label>
                                        <div class="col-sm-7">
                                            <label><input type="radio" name="is_bankpay_on"  value="0" <?php if($data->is_bankpay_on == 0): ?>checked <?php endif; ?> />开放</label>
                                            <label><input type="radio" name="is_bankpay_on"  value="1" <?php if($data->is_bankpay_on == 1): ?>checked <?php endif; ?> />关闭</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="is_alipay_on" class="col-sm-2 control-label"><span style="color: red">是否开放支付宝转账</span></label>
                                        <div class="col-sm-7">
                                            <label><input type="radio" name="is_alipay_on"  value="0" <?php if($data->is_alipay_on == 0): ?>checked <?php endif; ?> />开放</label>
                                            <label><input type="radio" name="is_alipay_on"  value="1" <?php if($data->is_alipay_on == 1): ?>checked <?php endif; ?> />关闭</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="is_wechat_on" class="col-sm-2 control-label"><span style="color: red">是否开放微信转账</span></label>
                                        <div class="col-sm-7">
                                            <label><input type="radio" name="is_wechat_on"  value="0" <?php if($data->is_wechat_on == 0): ?>checked <?php endif; ?> />开放</label>
                                            <label><input type="radio" name="is_wechat_on"  value="1" <?php if($data->is_wechat_on == 1): ?>checked <?php endif; ?> />关闭</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="alipay_nickname" class="col-sm-2 control-label">支付宝昵称</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" id="alipay_nickname" name="alipay_nickname"  value="<?php echo e($data->alipay_nickname); ?>" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="alipay_account" class="col-sm-2 control-label">支付宝账号</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" id="alipay_account" name="alipay_account"  value="<?php echo e($data->alipay_account); ?>" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="subtitle" class="col-sm-2 control-label">支付宝二维码</label>
                                        <div class="col-sm-7">
                                            <input id="fileupload2" type="file" name="file" multiple>
                                            <div id="progress2" class="progress">
                                                <div class="progress-bar progress-bar-success"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="subtitle" class="col-sm-2 control-label"></label>
                                        <div class="col-sm-7">
                                            <div id="files2" class="files">
                                                <?php if($data->alipay_qrcode): ?>
                                                    <div class="pull-left" style="position:relative;margin: 10px;">
                                                        <a href="<?php echo e($data->alipay_qrcode); ?>" target="_blank"><img src="<?php echo e($data->alipay_qrcode); ?>" alt="" style="width: 100px;"></a>
                                                        <a href="javascript:;" class="glyphicon glyphicon-remove" style="position: absolute;right: 0;top: 0;" onclick="removeDiv(this)"></a>
                                                        <input type="hidden" name="alipay_qrcode" value="<?php echo e($data->alipay_qrcode); ?>">
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="wechat_nickname" class="col-sm-2 control-label">微信昵称</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" id="wechat_nickname" name="wechat_nickname"  value="<?php echo e($data->wechat_nickname); ?>" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="wechat_account" class="col-sm-2 control-label">微信账号</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" id="wechat_account" name="wechat_account"  value="<?php echo e($data->wechat_account); ?>" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="subtitle" class="col-sm-2 control-label">微信二维码</label>
                                        <div class="col-sm-7">
                                            <input id="fileupload3" type="file" name="file" multiple>
                                            <div id="progress3" class="progress">
                                                <div class="progress-bar progress-bar-success"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="subtitle" class="col-sm-2 control-label"></label>
                                        <div class="col-sm-7">
                                            <div id="files3" class="files">
                                                <?php if($data->wechat_qrcode): ?>
                                                    <div class="pull-left" style="position:relative;margin: 10px;">
                                                        <a href="<?php echo e($data->wechat_qrcode); ?>" target="_blank"><img src="<?php echo e($data->wechat_qrcode); ?>" alt="" style="width: 100px;"></a>
                                                        <a href="javascript:;" class="glyphicon glyphicon-remove" style="position: absolute;right: 0;top: 0;" onclick="removeDiv(this)"></a>
                                                        <input type="hidden" name="wechat_qrcode" value="<?php echo e($data->wechat_qrcode); ?>">
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="box-footer">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label"></label>
                                        <div class="col-sm-7">
                                            <button type="button" class="btn btn-primary submit-form-sync">提交</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>---->
                       <!--- <div role="tabpanel" class="tab-pane" id="settings">
                            <form class="form-horizontal" id="form" action="<?php echo e(route('system_config.update', ['id' => 1])); ?>" method="post">
                                <input type="hidden" name="_method" value="put">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="is_thirdpay_on" class="col-sm-2 control-label"><span style="color: red">是否开放第三方支付</span></label>
                                        <div class="col-sm-7">
                                            <label><input type="radio" name="is_thirdpay_on"  value="0" <?php if($data->is_thirdpay_on == 0): ?>checked <?php endif; ?> />开放</label>
                                            <label><input type="radio" name="is_thirdpay_on"  value="1" <?php if($data->is_thirdpay_on == 1): ?>checked <?php endif; ?> />关闭</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="third_version" class="col-sm-2 control-label">第三方版本</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" id="third_version" name="third_version" value="<?php echo e($data->third_version); ?>"  />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="third_userid" class="col-sm-2 control-label">第三方userid</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" id="third_userid" name="third_userid" placeholder="例：9999" value="<?php echo e($data->third_userid); ?>"  />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="third_userkey" class="col-sm-2 control-label">第三方userkey</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" id="third_userkey" name="third_userkey" placeholder="例：011d495aaaab9611cd7f1f31ccaaa9377c565aaa15" value="<?php echo e($data->third_userkey); ?>"  />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="third_pay_url" class="col-sm-2 control-label">第三方 url</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" id="third_pay_url" name="third_pay_url" value="<?php echo e($data->third_pay_url); ?>"  />
                                        </div>
                                    </div>
                                </div>
                                <div class="box-footer">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label"></label>
                                        <div class="col-sm-7">
                                            <button type="button" class="btn btn-primary submit-form-sync">提交</button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>--->
                        <div role="tabpanel" class="tab-pane" id="verify">
                            <form class="form-horizontal" id="form" action="<?php echo e(route('system_config.update', ['id' => 1])); ?>" method="post">
                                <input type="hidden" name="_method" value="put">
                                <div class="box-body">
                                    <!---<div class="form-group">
                                        <label for="is_sms_on" class="col-sm-2 control-label"><span style="color: red">是否开放短信</span></label>
                                        <div class="col-sm-7">
                                            <label><input type="radio" name="is_sms_on"  value="0" <?php if($data->is_sms_on == 0): ?>checked <?php endif; ?> />开放</label>
                                            <label><input type="radio" name="is_sms_on"  value="1" <?php if($data->is_sms_on == 1): ?>checked <?php endif; ?> />关闭</label>
                                        </div>
                                    </div>--->
                                    <div class="form-group">
                                        <label for="sms_id" class="col-sm-2 control-label">ID</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" id="sms_id" name="sms_id" placeholder="例：41aff2fd3ee4d4a9d94a5ac20fa166666" value="<?php echo e($data->sms_id); ?>"  />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="sms_key" class="col-sm-2 control-label">KEY</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" id="sms_key" name="sms_key" placeholder="例：8e3b4a8aac68472eaae7362a82a66666" value="<?php echo e($data->sms_key); ?>"  />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="sms_url" class="col-sm-2 control-label">APIURL</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" id="sms_url" name="sms_url" placeholder="例：http://api.123456.com_addref" value="<?php echo e($data->sms_url); ?>"  />
                                        </div>
                                    </div>
                                    <!---<div class="form-group">
                                        <label for="sms_temp_id" class="col-sm-2 control-label">模板ID</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" id="sms_temp_id" name="sms_temp_id" value="<?php echo e($data->sms_temp_id); ?>" placeholder="例：12345"  />
                                        </div>
                                    </div>--->
                                </div><!-- /.box-body -->
                                <div class="box-footer">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label"></label>
                                        <div class="col-sm-7">
                                            <button type="button" class="btn btn-primary submit-form-sync">提交</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
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
                        '<input type="hidden" name="site_logo" value="'+img_path+'">' +
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

            //手机站logo
            $('#fileupload4').fileupload({
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
                        '<input type="hidden" name="m_site_logo" value="'+img_path+'">' +
                        '</div>';
                    $('#files4').append(html)

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
                    $('#progress4 .progress-bar').css(
                        'width',
                        progress + '%'
                    );
                }
            }).prop('disabled', !$.support.fileInput)
                .parent().addClass($.support.fileInput ? undefined : 'disabled');

            //支付宝
            $('#fileupload2').fileupload({
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
                        '<input type="hidden" name="alipay_qrcode" value="'+img_path+'">' +
                        '</div>';
                    $('#files2').append(html)

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
                    $('#progress2 .progress-bar').css(
                        'width',
                        progress + '%'
                    );
                }
            }).prop('disabled', !$.support.fileInput)
                .parent().addClass($.support.fileInput ? undefined : 'disabled');

            //微信
            $('#fileupload3').fileupload({
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
                        '<input type="hidden" name="wechat_qrcode" value="'+img_path+'">' +
                        '</div>';
                    $('#files3').append(html)

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
                    $('#progress3 .progress-bar').css(
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
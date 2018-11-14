@extends('wap.layouts.main')
@section('content')
    @extends('wap.layouts.header')

    <div class="m_container">
        <div class="m_body">
            <div class="container-fluid gm_main">
                <div class="m_member-title clear textCenter">
                    <a class="pull-left" href="javascript:history.go(-1);">&nbsp;返回</a>
                    添加优惠券
                </div>
                <div class="m_userCenter-line"></div>
                <div class="userInfo setCard" >
				<form action="{{ route('wap.postaddcard') }}" method="post" name="form1">
                    <dl class="dy_center_info">
                        <dd>
                            <div class="pull-left">名称</div>
							<input id="couponstitle" class="pull-left" type="tel" placeholder="输入名称" name="couponstitle" style="margin-left:10px;width: 50%;border: 1px solid #e0dfdf;">
                        </dd>					
                        <dd>
                            <div class="pull-left">
                                满
                            </div>
                            <input id="term" class="pull-left" type="tel" placeholder="输入使用条件金额，整数" name="term" style="margin-left:10px;width: 50%;border: 1px solid #e0dfdf;">
                        </dd>						
                        <dd>
                            <div class="pull-left">
                                减
                            </div>
								 <input id="decrease" class="pull-left" type="tel" placeholder="输入优惠金额，整数" name="decrease" style="margin-left:10px;width: 50%;border: 1px solid #e0dfdf;">
                        </dd>
						<dd>
                        <table cellspacing="0" cellpadding="0" border="0" class="tab1">
                            <tr>
                                <td class="bg" align="right">开始日期：</td>
                                <td>
                                    <input name="cn_begin" type="text" id="cn_begin" required
                                           class="input_150 laydate-icon"
                                           readonly="readonly" value="<?= $cn_begin ?>" onclick="laydate();"
                                           style="cursor: pointer; margin-bottom: 5px;border: 1px solid #e0dfdf;"/>
                                </td>
                            </tr>
                            <tr>
                                <td class="bg" align="right">结束日期：</td>
                                <td>
                                    <input name="cn_end" type="text" id="cn_end" required class="input_150 laydate-icon"
                                           readonly="readonly"
                                           value="<?= $cn_end ?>" onclick="laydate();"
                                           style="cursor: pointer; margin-bottom: 5px;border: 1px solid #e0dfdf;"/>
                                </td>
                            </tr>
                        </table>						
                        </dd>						
                        <dd>
                            <div class="pull-left">
                            使用说明
                            </div>
                               <textarea id="info" name="info" rows="3" maxlength="100" onchange="this.value=this.value.substring(0, 100)" onkeydown="this.value=this.value.substring(0, 100)" onkeyup="this.value=this.value.substring(0, 100)" placeholder="优惠卷使用说明,100字以内……"></textarea>								
                        </dd>
						<dd>
                                <input type="button" value="确定" class="submit_btn  ajax-submit-btn">
                        </dd>
                    </dl>
                   </form>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="{{ asset('/wap/js/laydate.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/wap/js/clipboard.min.js') }}"></script>
    <script>
        var clipboard = new Clipboard('.btn');

        clipboard.on('success', function (e) {
            console.info('Action:', e.action);
            console.info('Text:', e.text);
            console.info('Trigger:', e.trigger);

            e.clearSelection();
        });

        clipboard.on('error', function (e) {
            console.error('Action:', e.action);
            console.error('Trigger:', e.trigger);
        });
    </script>
@endsection
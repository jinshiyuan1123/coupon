@extends('wap.layouts.main')
@section('content')
    @extends('wap.layouts.header')

    <div class="m_container">
        <div class="m_body">
            <div class="container-fluid gm_main">
                <div class="m_member-title clear textCenter">
                    <a class="pull-left" href="javascript:history.go(-1);">&nbsp;返回</a>
                    免单劵兑换
                </div>
                <div class="m_userCenter-line"></div>
						<div style="width:90%;height:200px;margin:10px auto;background:#D04C4C;padding:5px;text-align:center;border-radius:10px;font-size:16px;">

						<div style="width:100%;height:100%;background:#D04C4C;padding:5px;text-align:center;border-radius:10px;font-size:16px;">
						<div style="font-size:1.5em;color:#f0f1d1;line-height:30px">免单劵</div>
								<div style="line-height:70px">
								<span style="font-size:4.2em;font-weight:700;color:#d9edf7;">{{$activity_list_id['decrease']}}</span>&nbsp;<span style="font-size:2.2em;font-weight:700;">元</span>&nbsp;
								</div>
								<div style=""><span style="font-size:14px;color:#d9edf7;">积&nbsp;分&nbsp;兑&nbsp;换&nbsp;：{{$activity_list_id['score']}}</span></div>
                                <div style="text-align:right"><span style="color:rgb(245, 163, 163);font-size:18px;">&nbsp;{{$activity_list_id['businessname']}}&nbsp;</span></div>
                        </div>

                        </div>
                <div class="userInfo setCard" >
				
                    <dl class="dy_center_info">
                        <dd>
                    		<div class="normal"></div>
                        </dd>					
                        <dd>
                            <div class="pull-left">商家电话</div>
							&nbsp;&nbsp;<span style="font-size:18px">{{$activity_list_id['tel']}}</span>
                        </dd>	
                        <dd>
                            <div class="pull-left">商家地址</div>
							&nbsp;&nbsp;<span style="font-size:18px">{{$activity_list_id['address']}}</span>
                        </dd>																
						<dd>
                        <table cellspacing="0" cellpadding="0" border="0" class="tab1">
                            <tr>
                                <td class="bg" align="right">开始日期：</td>
                                <td>
                                   &nbsp;&nbsp;<span style="font-size:18px">{{$activity_list_id['begintime']}}</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="bg" align="right">结束日期：</td>
                                <td>
                                    &nbsp;&nbsp;<span style="font-size:18px">{{$activity_list_id['endtime']}}</span>
                                </td>
                            </tr>
                        </table>						
                        </dd>						
                        <dd>
                            <div class="pull-left">
                                说明
                            </div>
							 &nbsp;&nbsp;@if($activity_list_id['info'])
                               {{$activity_list_id['info']}}
                            @else
                               无
                            @endif						   
                        </dd>
						<dd>
						您的积分余额：{{$_member->score}}
						</dd>
						<dd>
						<form action="{{route('wap.postactivity_list_id',['id'=>$activity_list_id['id']])}}" method="post" name="form1">
						 <input type="button" value="立即兑换" class="submit_btn  ajax-submit-btn">   
						</form> 
                        </dd>
                    </dl>

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
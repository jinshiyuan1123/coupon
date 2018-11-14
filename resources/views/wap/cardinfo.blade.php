@extends('wap.layouts.main')
@section('content')
    @extends('wap.layouts.header')

    <div class="m_container">
        <div class="m_body">
            <div class="container-fluid gm_main">
                <div class="m_member-title clear textCenter">
                    <a class="pull-left" href="javascript:history.go(-1);">&nbsp;返回</a>
                    优惠券信息
                </div>
                <div class="m_userCenter-line"></div>
                <div class="userInfo setCard" >
				<dl class="dy_center_info"><dd><div><span style="color:red">{{$usemem}}</span>人使用 &nbsp;共计：<span style="color:red">{{$term}}</span>元 &nbsp;满减：<span style="color:red">{{$decrease}}</span>元 </div></dd></dl>
				
                    <dl class="dy_center_info">
                        <dd>
                            <div class="pull-left">名称</div>
							&nbsp;&nbsp;<span style="font-size:18px">{{$data['couponstitle']}}</span>
                        </dd>					
                        <dd>
                            <div class="pull-left">
                                满
                            </div>
                            &nbsp;&nbsp;<span style="font-size:18px;color:#F90606">{{$data['term']}}</span>&nbsp;元
                        </dd>						
                        <dd>
                            <div class="pull-left">
                                减
                            </div>
								&nbsp;&nbsp;<span style="font-size:18px;color:#F90606">{{$data['decrease']}}</span>&nbsp;元
                        </dd>
						<dd>
                        <table cellspacing="0" cellpadding="0" border="0" class="tab1">
                            <tr>
                                <td class="bg" align="right">开始日期：</td>
                                <td>
                                   &nbsp;&nbsp;<span style="font-size:18px">{{$data['begintime']}}</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="bg" align="right">结束日期：</td>
                                <td>
                                    &nbsp;&nbsp;<span style="font-size:18px">{{$data['endtime']}}</span>
                                </td>
                            </tr>
                        </table>						
                        </dd>						
                        <dd>
                            <div class="pull-left">
                                说明
                            </div>
							 &nbsp;&nbsp;@if($data['info'])
                               {{$data['info']}}
                            @else
                               无
                            @endif						   
                        </dd>
						<dd>
                              
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
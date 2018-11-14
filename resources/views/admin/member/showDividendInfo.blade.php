@extends('admin.layouts.basic')
@section('content')
    <div class="container-fluid" style="margin-top: 10px;">

        <div>
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation"><a href="{{ route('member.showGameRecordInfo', ['id' => $id]) }}" aria-controls="home" role="tab" data-toggle="tab">历史积分</a></li>
                <li role="presentation"><a href="{{ route('member.showRechargeInfo', ['id' => $id]) }}" aria-controls="profile" role="tab" data-toggle="tab">历史消费</a></li>
                <li role="presentation"><a href="{{ route('member.showDrawingInfo', ['id' => $id]) }}" aria-controls="messages" role="tab" data-toggle="tab">历史提款</a></li>
                <li role="presentation" class="active"><a href="{{ route('member.showDividendInfo', ['id' => $id]) }}" aria-controls="settings" role="tab" data-toggle="tab">历史收益</a></li>
            </ul>
        </div>

        <section class="content" style="margin-top: 10px;">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">历史收益</h3>
                </div>
                <div class="panel-body">


                    <table class="table table-bordered table-hover text-center">
                        <tr>
                            <th style="width: 5%">ID</th>
                            <th style="width: 5%">用户</th>
                            <th style="width: 5%">优惠券</th>
                            <th style="width: 10%">总金额</th>
							<th style="width: 10%">折扣金额</th>
							<th style="width: 10%">实际支付</th>
							<th style="width: 5%">费率</th>
							<th style="width: 10%">扣费</th>
							<th style="width: 10%">所得</th>
							<th style="width: 10%">奖励积分</th>
                            <th style="width: 10%">发放时间</th>
                        </tr>
                        @foreach($data as $item)
                            <tr>
                                <td>
                                    {{ $item->id }}
                                </td>
                                <td>
                                    {{ $item->member->uid }}
                                </td>
                                <td>
                                    {{$item->couponid}}
                                </td>
                                <td>
                                    {{ $item->allmomey }}
                                </td>
                                <td>
                                    {{ $item->decrease }}
                                </td>
                                <td>
                                    {{ $item->paymomey }}
                                </td>
                                <td>
                                    {{ $item->rate }}
                                </td>
                                <td>
                                    {{ $item->ratemoney }}
                                </td>
                                <td>
                                    {{ $item->businessimoney }}
                                </td>
                                <td>
                                    {{ $item->score }}
                                </td>								
                                <td>
                                    {{ $item->created_at }}
                                </td>
                            </tr>
                        @endforeach
                        <tfoot>
                        <tr>
                            <td><strong style="color: red">总合计</strong></td>
                            <td></td>
                            <td></td>
                            <td><strong style="color: red">{{ $allmomey }}</strong></td>
							<td><strong style="color: red">{{ $decrease }}</strong></td>
							<td><strong style="color: red">{{ $paymomey }}</strong></td>
							<td></td>
							<td><strong style="color: red">{{ $ratemoney }}</strong></td>
							<td><strong style="color: red">{{ $businessimoney }}</strong></td>
							<td><strong style="color: red">{{ $score }}</strong></td>
                            <td></td>
                        </tr>
                        </tfoot>
                    </table>
                    <div class="clearfix">
                        <div class="pull-left" style="margin: 0;">
                            <p>总共 <strong style="color: red">{{ $data->total() }}</strong> 条</p>
                        </div>
                        <div class="pull-right" style="margin: 0;">
                            {!! $data->links() !!}
                        </div>
                    </div>

                </div>
            </div>

        </section><!-- /.content -->
    </div>

@endsection
@section("after.js")
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
@endsection
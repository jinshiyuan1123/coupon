@extends('admin.layouts.basic')
@section('content')
    <div class="container-fluid" style="margin-top: 10px;">

        <div>
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation"><a href="{{ route('member.showGameRecordInfo', ['id' => $id]) }}" aria-controls="home" role="tab" data-toggle="tab">历史积分</a></li>
                <li role="presentation" class="active"><a href="{{ route('member.showRechargeInfo', ['id' => $id]) }}" aria-controls="profile" role="tab" data-toggle="tab">历史消费</a></li>
                <li role="presentation"><a href="{{ route('member.showDrawingInfo', ['id' => $id]) }}" aria-controls="messages" role="tab" data-toggle="tab">历史提款</a></li>
                <li role="presentation"><a href="{{ route('member.showDividendInfo', ['id' => $id]) }}" aria-controls="settings" role="tab" data-toggle="tab">历史收益</a></li>
            </ul>
        </div>

        <section class="content" style="margin-top: 10px;">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">历史消费</h3>
                </div>
                <div class="panel-body">

                    <table class="table table-bordered table-hover text-center">
                        <tr>
                            <th style="width: 5%">ID</th>
                            <th style="width: 15%">订单号</th>
                            <th style="width: 10%">金额</th>
                            <th>说明</th>
                            <th style="width: 10%">时间</th>
                        </tr>
                        @foreach($data as $item)
                            <tr>
                                <td>
                                    {{ $item->id }}
                                </td>
                                <td>
                                    {{ $item->order_no }}
                                </td>
                                <td>
                                    {{ $item->money }}
                                </td>
                                <td>
                                    {{ $item->explain }}
                                </td>
                                <td>
                                    {{ $item->created_at }}
                                </td>
                            </tr>
                        @endforeach
                        <tfoot>
                        <tr>
                            <td><strong style="color: red">总合计</strong></td>
                            <td>{{ $total_recharge }}</td>
                            <td colspan="3"></td>
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
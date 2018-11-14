@extends('admin.layouts.main')
@section('content')
    <section class="content">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">提款列表</h3>
            </div>
            <div class="panel-body">
                @include('admin.member_offline_drawing.filter')

                <table class="table table-bordered table-hover text-center">
                    <tr>
                        <th style="width: 5%">ID</th>
                        <th style="width: 5%">用户</th>
                        <th style="width: 5%">优惠券ID</th>
                        <th style="width: 5%">商家名称</th>
                        <th style="width: 10%">使用条件</th>
                        <th style="width: 5%">总金额</th>
                        <th style="width: 5%">满减</th>
                        <th style="width: 10%">抵扣积分</th>
						<th style="width: 5%">抵扣金额</th>
						<th style="width: 10%">实付</th>
						<th style="width: 5%">抽佣</th>
						<th style="width: 10%">商家所得</th>
						<th style="width: 10%">获得积分</th>
						<th style="width: 10%">使用时间</th>
                    </tr>
                    @foreach($data as $item)
                        <tr>
                            <td>
                                {{ $item->id }}
                            </td>
                            <td>
                                <a href="/admin/member?id={{ $item->member_id}}">{{ $item->member_name }}</a>
                            </td>
                            <td>
                                <a href="/admin/member_offline_recharge?id={{ $item->couponid }}">{{ $item->couponid }}</a>
                            </td>
                            <td>
                                <a href="/admin/member_daili?id={{ $item->businessid }}">{{ $item->business_name }}</a>
                            </td>
                            <td>
                                满{{ $item->term }}减{{ $item->decrease }}
                            </td>
                            <td>
                                {{ $item->allmoney }}
                            </td>
                            <td>
                                {{ $item->decrease }}
                            </td>
                            <td>
                               {{ $item->descore }}
                            </td>
                            <td>
                               {{ $item->descoremoney }}
                            </td>
                            <td>
                               {{ $item->money }}
                            </td>
                            <td>
                               {{ $item->poundage }}
                            </td>
                            <td>
                               {{ $item->money-$item->poundage }}
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
                            <td></td>
                            <td></td>
							<td><strong style="color: red">{{$total_allmoney}}</strong></td>
							<td><strong style="color: red">{{$total_decrease}}</strong></td>
							<td><strong style="color: red">{{$total_descore}}</strong></td>
							<td><strong style="color: red">{{$total_descoremoney}}</strong></td>
							<td><strong style="color: red">{{$total_money}}</strong></td>
							<td><strong style="color: red">{{$total_poundage}}</strong></td>
							<td><strong style="color: red">{{$total_money-$total_poundage}}</strong></td>
							<td><strong style="color: red">{{$total_score}}</strong></td>
							<td></td>
                        </tr>
                    </tfoot>
                </table>
                <div class="clearfix">
                    <div class="pull-left" style="margin: 0;">
                        <p>总共 <strong style="color: red">{{ $data->total() }}</strong> 条</p>
                    </div>
                <div class="pull-right" style="margin: 0;">
                    {!! $data->appends(['couponid' => $couponid, 'businessid' =>$businessid, 'start_at' => $start_at, 'end_at' => $end_at])->links() !!}
                </div>
                </div>

            </div>
        </div>

    </section><!-- /.content -->
@endsection
@extends('admin.layouts.main')
@section('content')
    <section class="content">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">优惠券列表</h3>
            </div>
            <div class="panel-body">
                @include('admin.member_offline_recharge.filter')

                <table class="table table-bordered table-hover text-center">
                    <tr>
                        <th style="width: 5%">ID</th>
                        <th style="width: 5%">商家ID</th>
                        <th style="width: 8%">商家名称</th>
                        <th style="width: 8%">名称</th>
                        <th style="width: 8%">优惠条件</th>
						<th style="width: 10%">使用/金额/减扣/</th>
						<th style="width: 8%">抵扣积分/金额</th>
						<th style="width: 5%">实付</th>
						<th style="width: 5%">抽佣</th>
                        <th style="width: 10%">开始时间</th>
                        <th style="width: 10%">结束时间</th>
						<th style="width: 10%">介绍</th>
                        <th style="width: 10%">状态</th>
                    </tr>
                    @foreach($data as $item)
                        <tr>
                            <td>
                                {{ $item->id }}
                            </td>
                            <td>
                                 <a href="/admin/member_daili?name={{$item->name}}">{{ $item->businessid }}</a>
                            </td>
                            <td>
                                <a href="/admin/member_daili?name={{$item->name}}">{{ $item->businessname }}</a>
                            </td>
                            <td>
                                {{ $item->couponstitle }}
                            </td>
                            <td>
                               满{{ $item->term }}减{{ $item->decrease }}
                            </td>
                            <td>
                               <a href="/admin/member_offline_drawing?businessid={{$item->businessid}}&couponid={{ $item->id }}">{{$item->useCouponsall}}/{{$item->payallmoney}}/{{$item->paydecrease}}</a>
                            </td>							
                            <td>
                                <a href="/admin/member_offline_drawing?businessid={{$item->businessid}}&couponid={{ $item->id }}">{{$item->paydescore}}/{{$item->paydescoremoney}}</a>
                            </td>
                            <td>
                               <a href="/admin/member_offline_drawing?businessid={{$item->businessid}}&couponid={{ $item->id }}"> {{$item->paymoney}}</a>
                            </td>							
                            <td>
                               <a href="/admin/member_offline_drawing?businessid={{$item->businessid}}&couponid={{ $item->id }}"> {{$item->paypoundage}}</a>
                            </td>							
                            <td>
							   {{$item->begintime}}
                            </td>
                            <td>
                               {{$item->endtime}}
                            </td>							
                            <td>
                                {{$item->info}}
                            </td>
                            <td>
							@if($item->statustag=='生效中')
							    <span style="color:green;">{{$item->statustag}}</span>
                            @else
								 <span style="color:red;">{{$item->statustag}}</span>
                            @endif								
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
							<td><strong style="color: red">{{$useCouponsalltotal}}/{{$payallmoneytotal}}/{{$paydecreasetotal}}</strong></td>
							<td><strong style="color: red">{{$paydescoretotal}}/{{$paydescoremoneytotal}}</strong></td>
							<td><strong style="color: red">{{$paymoneytotal}}</strong></td>
							<td><strong style="color: red">{{$paypoundagetotal}}</strong></td>
                            <td></td>
							<td></td>
							<td></td>
							<td></td>
                        </tr>
                    </tfoot>
                </table>
                <div class="clearfix">
                    <div class="pull-left" style="margin: 0;">
                        <p>总共 <strong style="color: red">{{ $data->total() }}</strong> 条</p>
                    </div>
                    <div class="pull-right" style="margin: 0;">
                        {!! $data->appends(['status' => $status, 'businessid' =>$businessid, 'start_at' => $start_at, 'end_at' => $end_at])->links() !!}
                    </div>
                </div>

            </div>
        </div>

    </section><!-- /.content -->
@endsection
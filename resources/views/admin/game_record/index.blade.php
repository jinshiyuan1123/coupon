@extends('admin.layouts.main')
@section('content')
    <section class="content">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">游戏记录</h3>
            </div>
            <div class="panel-body">
                @include('admin.game_record.filter')

                <table class="table table-bordered table-hover text-center">
                    <tr>
                        <th style="width: 5%">ID</th>
                        <th>账号</th>
                        {{--<th style="width: 15%">平台账号</th>--}}
                        <th style="width: 5%">平台名称</th>
                        <th style="width: 10%">游戏类别</th>
                        <th style="width: 10%">输赢情况</th>
                        <th style="width: 10%">下注金额</th>
                        <th style="width: 10%">有效下注</th>
                        <th style="width: 10%">彩票种类</th>
                        <th style="width: 10%">玩法名字</th>
                        <th style="width: 10%">下注号码</th>
                        <th style="width: 20%">下注时间</th>
                    </tr>
                    @foreach($data as $item)
                        <tr>
                            <td>
                                {{ $item->id }}
                            </td>
                            <td>
                                {{ $item->member->name or '已删除' }}
                            </td>
                            {{--<td>--}}
                            {{--{{ $item->playerName }}--}}
                            {{--</td>--}}
                            <td>
                                {{ $_api_list[$item->api_type] }}
                            </td>
                            <td>
                                {{ config('platform.game_type')[$item->gameType] }}
                            </td>
                            <td>
                                {{ $item->netAmount -  $item->betAmount }}
                            </td>
                            <td>
                                {{ $item->betAmount }}
                            </td>
                            <td>
                                {{ $item->validBetAmount }}
                            </td>
                            <td>
                                @if($item->api->api_name == 'EG')
                                    {{ $item->gameCode }}
                                @endif
                            </td>
                            <td>
                                @if($item->api->api_name == 'EG')
                                    {{ $item->tableCode }}
                                @endif
                            </td>
                            <td>
                                {{ $item->stringex }}@if($item->api->api_name == 'EG')@if($item->flag == 1)<span style="color: green">(已结算)</span> @else <span style="color: red">(未结算)</span> @endif @endif
                            </td>
                            <td>
                                {{ $item->betTime }}
                            </td>
                        </tr>
                    @endforeach
                    <tfoot>
                    <tr>
                        <td><strong style="color: red">总合计</strong></td>
                        <td colspan="3"></td>
                        <td><strong style="color: red">{{ $total_netAmount }}</strong></td>
                        <td><strong style="color: red">{{ $total_betAmount }}</strong></td>
                        <td><strong style="color: red">{{ $total_validBetAmount }}</strong></td>
                        <td colspan="4"></td>
                    </tr>
                    </tfoot>
                </table>
                <div class="clearfix">
                    <div class="pull-left" style="margin: 0;">
                        <p>总共 <strong style="color: red">{{ $data->total() }}</strong> 条</p>
                    </div>
                    <div class="pull-right" style="margin: 0;">
                        {!! $data->appends(['playerName' => $playerName, 'start_at' => $start_at, 'end_at' => $end_at, 'api_type' => $api_type, 'gameType' => $gameType])->links() !!}
                    </div>
                </div>

            </div>
        </div>

    </section><!-- /.content -->

@endsection
@extends('admin.layouts.main')
@section('content')
    <section class="content">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">平台转账记录</h3>
            </div>
            <div class="panel-body">
                @include('admin.transfer.filter')

                <table class="table table-bordered table-hover text-center">
                    <tr>
                        <th style="width: 5%">ID</th>
                        <th>用户名称</th>
                        <th style="width: 10%">转换类型</th>
                        <th style="width: 10%">转出账户</th>
                        <th style="width: 10%">转入账户</th>
                        <th style="width: 10%">转换金额</th>
                        <th style="width: 10%">红利金额</th>
                        <th style="width: 10%">转账时间</th>
                    </tr>
                    @foreach($data as $item)
                        <tr>
                            <td>
                                {{ $item->id }}
                            </td>
                            <td>
                                {{ $item->member->name }}
                            </td>
                            <td>
                                {{ config('platform.transfer_type')[$item->transfer_type] }}
                            </td>
                            <td>
                                {{ $item->transfer_out_account }}
                            </td>
                            <td>
                                {{ $item->transfer_in_account }}
                            </td>
                            <td>
                                {{ $item->money }}
                            </td>
                            <td>
                                {{ $item->diff_money }}
                            </td>
                            <td>
                                {{ $item->created_at }}
                            </td>
                        </tr>
                    @endforeach
                    <tfoot>
                    <tr>
                        <td><strong style="color: red">总合计</strong></td>
                        <td colspan="4"></td>
                        <td><strong style="color: red">{{ $total_money }}</strong></td>
                        <td><strong style="color: red">{{ $total_diff_money }}</strong></td>
                        <td></td>
                    </tr>
                    </tfoot>
                </table>
                <div class="clearfix">
                    <div class="pull-left" style="margin: 0;">
                        <p>总共 <strong style="color: red">{{ $data->total() }}</strong> 条</p>
                    </div>
                    <div class="pull-right" style="margin: 0;">
                        {!! $data->appends(['name' => $name, 'transfer_type' => $transfer_type, 'transfer_in_account' => $transfer_in_account, 'transfer_out_account' => $transfer_out_account, 'start_at' => $start_at, 'end_at' => $end_at])->links() !!}
                    </div>
                </div>

            </div>
        </div>

    </section><!-- /.content -->
@endsection
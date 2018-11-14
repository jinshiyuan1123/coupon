@extends('admin.layouts.main')
@section('content')

    <section class="content">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">会员登录记录</h3>
            </div>
            <div class="panel-body">
                @include('admin.member_login_log.filter')

                <table class="table table-bordered table-hover text-center">
                    <tr>
                        <th style="width: 10%">ID</th>
                        <th style="width: 15%">账号</th>
                        <th  >IP</th>
                        <th  style="width: 15%">登录时间</th>
                        {{--<th  style="width: 20%">操作</th>--}}
                    </tr>
                    @foreach($data as $item)
                        <tr>
                            <td>
                                {{ $item->id }}
                            </td>
                            <td>
                                {{ $item->member->name or '已删除'}}
                            </td>
                            <td>
                                {{ $item->ip }}
                            </td>
                            <td>
                                {{ $item->created_at }}
                            </td>

                            {{--<td>--}}
                            {{--<button type="button" class="btn btn-info btn-xs">查看</button>--}}
                            {{--</td>--}}
                        </tr>
                    @endforeach
                </table>
                <div class="clearfix">
                    <div class="pull-left" style="margin: 0;">
                        <p>总共 <strong style="color: red">{{ $data->total() }}</strong> 条</p>
                    </div>
                    <div class="pull-right" style="margin: 0;">
                        {!! $data->appends(['name' => $name, 'start_at' => $start_at, 'end_at' => $end_at, 'ip' => $ip])->links() !!}
                    </div>
                </div>
            </div>
        </div>

    </section><!-- /.content -->
@endsection
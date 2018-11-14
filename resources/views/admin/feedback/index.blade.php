@extends('admin.layouts.main')
@section('content')
    <section class="content">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">反馈列表</h3>
            </div>
            <div class="panel-body">
                @include('admin.feedback.filter')

                <table class="table table-bordered table-hover text-center">
                    <tr>
                        <th style="width: 5%">ID</th>
                        <th style="width: 10%">提交人账号</th>
                        <th style="width: 15%">反馈类型</th>
                        <th>反馈内容</th>
                        <th style="width: 10%">已读/未读</th>
                        <th style="width: 10%">提交时间</th>
                        <th style="width: 10%">操作</th>
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
                                {{ config('platform.feedback_type')[$item->type] }}
                            </td>
                            <td>
                                {{ $item->content }}
                            </td>
                            <td>
                                {!! \App\Models\Base::$IS_READ_HTML[$item->is_read] !!}
                            </td>
                            <td>
                                {{ $item->created_at }}
                            </td>
                            <td>
                                @if ($item->is_read == 1)
                                    <a href="{{ route('feedback.check', ['id' => $item->getKey(), 'status' => 0]) }}" class="btn btn-danger btn-xs" onclick="return confirm('确定标记为未读吗？')">未读</a>
                                @elseif($item->is_read == 0)
                                    <a href="{{ route('feedback.check', ['id' => $item->getKey(), 'status' => 1]) }}" class="btn btn-success btn-xs" onclick="return confirm('确定标记为已读吗？')">已读</a>
                                @endif
                                    <button class="btn btn-danger btn-xs"
                                    data-url="{{route('feedback.destroy', ['id' => $item->getKey()])}}"
                                    data-toggle="modal"
                                    data-target="#delete-modal"
                                    >
                                    删除
                                    </button>
                            </td>
                        </tr>
                    @endforeach
                </table>
                <div class="clearfix">
                    <div class="pull-left" style="margin: 0;">
                        <p>总共 <strong style="color: red">{{ $data->total() }}</strong> 条</p>
                    </div>
                    <div class="pull-right" style="margin: 0;">
                        {!! $data->appends(['is_read' => $is_read, 'start_at' => $start_at, 'end_at' => $end_at])->links() !!}
                    </div>
                </div>

            </div>
        </div>

    </section><!-- /.content -->
@endsection
@section("after.js")
    @include('admin.layouts.delete',['title'=>'操作提示','content'=>'你确定要删除这条反馈吗?'])
@endsection
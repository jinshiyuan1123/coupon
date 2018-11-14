@extends('wap.layouts.main')
@section('content')
    @extends('wap.layouts.header')
    <div class="m_container">
        <div class="m_body">
            <div class="container-fluid gm_main">
                <div class="m_member-title clear textCenter">
                    <a class="pull-left" href="javascript:history.go(-1);">&nbsp;返回</a>
                    提款记录
                </div>
                <div class="m_userCenter-line"></div>
                <div class="wrap data_h_money">
                    <table cellspacing="1" cellpadding="0" border="0" class="tab1 text-center">
                        <tr class="tic">
                            <td width="33.333%">提款时间</td>
                            <td width="33.333%">提款金额</td>
                            <td width="33.333%">提款状态</td>
                        </tr>
                        @if ($data->total() > 0)
                            @foreach($data as $item)
                                <tr>
                                    <td>{{ $item->created_at }}</td>
                                    <td>{{ $item->money }}</td>
                                    <td>{!! \App\Models\Base::$DRAWING_STATUS_HTML[$item->status] !!}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="3">暂无提款记录！</td>
                            </tr>
                        @endif
                    </table>
                    <table border="0" cellpadding="0" cellspacing="0" class="page">
                        {!! $data->render() !!}
                    </table>
                </div>

            </div>
        </div>
    </div>
@endsection
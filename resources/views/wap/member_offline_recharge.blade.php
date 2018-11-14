@extends('wap.layouts.main')
@section('content')
    @extends('wap.layouts.header')
    <div class="m_container">
        <div class="m_body">
            <div class="container-fluid gm_main">
                <div class="m_member-title clear textCenter">
                    <a class="pull-left" href="javascript:history.go(-1);">&nbsp;返回</a>
                    商家账单
                </div>
                <div class="m_userCenter-line"></div>
                <div class="wrap userInfo">
                    <table cellspacing="1" cellpadding="0" border="0" class="tab1 mt10 text-center">
                        <tr class="tic">
                            <td width="33.33%">支付金额</td>
                            <td width="33.33%">所得金额</td>
                            <td width="33.33%">时间</td>
                        </tr>
                        @if ($data->total() > 0)
                            @foreach($data as $item)
                                <tr>
                                    <td>{{ $item->member->paymomey }}</td>
                                    <td>{{ $item->businessimoney }}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>成功</td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="3">暂无记录！</td>
                            </tr>
                        @endif
                    </table>
                    <table border="0" cellspacing="0" cellpadding="0" class="page">
                        {!! $data->links() !!}
                    </table>
                </div>

            </div>
        </div>
    </div>
@endsection
@section('after.js')
    <script type="text/javascript" src="{{ asset('/wap/js/laydate.js') }}"></script>
@endsection
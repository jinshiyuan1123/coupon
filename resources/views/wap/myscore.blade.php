@extends('wap.layouts.main')
@section('content')
    <div class="m_container">
        <div class="m_body2">
            <div class="container-fluid gm_main">
                <div class="m_member-title clear textCenter">
                    <a class="pull-left" href="javascript:history.go(-1);">&nbsp;返回</a>
                    我的积分
                </div>
                <div class="m_userCenter-line"></div>
                <div class="wrap userInfo">
                        <table cellspacing="0" cellpadding="0" border="0" class="tab1">
                                           <tr>
                                                  <td align="center">积分余额：<span style="color:#10aec7">{{ $_member->score }}</span></td>              
												</tr>
                        </table>
                    <table cellspacing="1" cellpadding="0" border="0" class="tab1 mt10 text-center">
                        <tr class="tic" style="font-weight:700;">
                            <td width="25%">时间</td>
                            <td width="25%">积分</td>
                            <td width="30%">明细</td>
                        </tr>
                        @if ($data->total() > 0)
                            @foreach($data as $item)
                                <tr>
                                    <td>{{ $item->created_at }}</td>
                                    <td>{{ $item->score }}</td>
                                    <td>{{ $item->explain}}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="4">暂无积分记录！</td>
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
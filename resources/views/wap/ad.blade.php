@extends('wap.layouts.main')
@section('content')
    @extends('wap.layouts.header')
    <div class="m_container">
        <div class="m_body">
            <div class="container-fluid gm_main">
                <div class="m_member-title clear textCenter">
                    <a class="pull-left" href="javascript:history.go(-1);">&nbsp;返回</a>
                    广告合作
                </div>
                <div class="m_userCenter-line"></div>
                <div class="wrap userInfo" style="width:95%;margin:0 auto;word-wrap: break-word">
                         {{ $_system_config->maintain_desc}}
                </div>

            </div>
        </div>
    </div>
@endsection
@section('after.js')
    <script type="text/javascript" src="{{ asset('/wap/js/laydate.js') }}"></script>
@endsection
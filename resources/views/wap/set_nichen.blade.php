@extends('wap.layouts.main')
@section('content')
    <div class="m_container">
        <div class="">
            <div class="container-fluid gm_main">
                <div class="m_member-title clear textCenter">
                    <a class="pull-left" href="javascript:history.go(-1);">&nbsp;返回</a>
                    昵称设置
                </div>
                <div class="m_userCenter-line"></div>
                <div class="userInfo setCard">
                    <form action="{{ route('wap.post_set_nichen') }}" method="post" name="form1">
                        <dl class="set_card">
                            <dt>
                                昵称设置 <br>
                            </dt>
                            <dd>
                                <div class="pull-left">
                                    昵称
                                </div>
                                <input id="nichen" class="pull-left" type="tel" placeholder="输入昵称" name="nichen" style="width: 42%" value="{{ $_member->nichen }}">
                            </dd>
                            <dd>
                                <input type="button" value="确定" class="submit_btn  ajax-submit-btn">
                            </dd>
                        </dl>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
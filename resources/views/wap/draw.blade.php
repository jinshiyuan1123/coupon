@extends('wap.layouts.main')
@section('content')
    @extends('wap.layouts.header')
    <div class="m_container">
        <div class="m_body">
            <div class="container-fluid gm_main">
                <div class="m_member-title1 clear textCenter">
                    <a class="pull-left" href="javascript:history.go(-1);">&nbsp;返回</a>
                    在线提款
					<a href="{{ route('wap.draw_record') }}" class="pull-right" style="color:#00BCD4">提款记录</a>
                </div>
                <div class="m_userCenter-line"></div>
                <div class="userInfo">
                    <form action="{{ route('wap.post_draw') }}" method="post" name="form1">
                        <dl>
                            <dt>账户信息</dt>
                            <dd>
                                <div class="pull-left">
                                    用户账号
                                </div>
                                <div class="pull-right">
                                    {{ $_member->name }}
                                </div>
                            </dd>
                            <dd>
                                <div class="pull-left">可用提款额度</div>
                                <div class="pull-right">{{ $_member->money }}元</div>
                            </dd>
                            <dd>
                                <div class="pull-left">收款人姓名</div>
                                <div class="pull-right">{{ $_member->real_name }}</div>
                            </dd>
                            <dd>
                                <div class="pull-left">收款银行</div>
                                <div class="pull-right">{{ $_member->bank_name }}</div>
                            </dd>
                            <dd>
                                <div class="pull-left">收款账号</div>
                                <div class="pull-right">{{ $_member->bank_card }}</div>
                            </dd>
                            <dd>
                                <div class="pull-left">收款银行地址</div>
                                <div class="pull-right">{{ $_member->bank_address }}</div>
                            </dd>
                        </dl>
                        <dl class="set_card">
                            <dt>发起提款申请</dt>
                            <dd>
                                <div class="pull-left">
                                    提款金额
                                </div>
                                <input class="pull-left" type="number" placeholder="请输入提款金额" name="money" id="pay_value"
                                       maxlength="10">

                            </dd>

                            <dd>
                                <div class="pull-left">
                                    取款金额下限
                                </div>
                                &nbsp;&nbsp;&nbsp;5
                            </dd>
                            <dd>
                                <div class="pull-left">
                                    取款金额上限
                                </div>
                                &nbsp;&nbsp;&nbsp;100000
                            </dd>
                            <dd>
                                <input type="button" value="申请提款" class="submit_btn ajax-submit-btn">
                            </dd>
                        </dl>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{--<script>--}}
        {{--(function($){--}}
            {{--$(function(){--}}
                {{--var css = 'color: #333; background-color: #fff; width: auto';--}}
                {{--var html = '首次充值需20倍流水，否则需扣除提款金额60%的手续费,非首次需1倍流水，否则需扣除提款金额20%的手续费'--}}
                {{--layer.open({--}}
                    {{--content: html,--}}
                    {{--//time: 1.5,--}}
                    {{--style: css--}}
                {{--});--}}
            {{--})--}}
        {{--})(jQuery)--}}
    {{--</script>--}}
@endsection
<div class="m_footer">
    <div class="m_container">
        <ul class="clear">
            <li @if(in_array($_wap_router, ['wap.index','wap.init'])) class="active" @endif>
                <a href="{{ route('wap.index') }}">
                    <p class="m_footer-link-text">首页</p>
                </a>
            </li>
            <li @if($_wap_router=='wap.activity_list') class="active" @endif>
                <a href="{{ route('wap.activity_list') }}">
                    <p class="m_footer-link-text">我要免单</p>
                </a>
            </li>
            <li @if(in_array($_wap_router, ['wap.login','wap.nav'])) class="active" @endif>
                @if (Auth::guard('member')->guest())
                    <a href="{{ route('wap.login') }}">
                        <p class="m_footer-link-text">我的</p>
                    </a>
                @else
                    <a href="{{ route('wap.nav') }}">
                        <p class="m_footer-link-text">我的</p>
                    </a>
                @endif
            </li>
        </ul>
    </div>
</div>
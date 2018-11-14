@extends('wap.layouts.main')
@section('content')
    <div class="m_container">
        <div class="">
            <div class="container-fluid gm_main">
                <div class="m_member-title clear textCenter">
                    <a class="pull-left" href="javascript:history.go(-1);">&nbsp;返回</a>
                    设置
                </div>
                <div class="m_userCenter-line"></div>

           <div class="m_userCenter">
          
                <ul class="m_userCenter-list">
                    <li>
                        <a href="{{ route('wap.userinfo') }}">
                            <img class="trade-icon" src="{{ asset('/wap/images/aside_8.png') }}" alt="">
                            个人资料
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('wap.reset_password') }}">
                            <img class="trade-icon" src="{{ asset('/wap/images/aside_9.png') }}" alt="">
                            修改密码
                        </a>
                    </li>	
					<li>
                        <a href="javascript:;" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
						<img class="trade-icon" src="{{ asset('/wap/images/loginout.png') }}" alt="">
													 登出
						</a>						
                    </li>	
                <form id="logout-form" action="{{ route('wap.logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>					
				</ul>	
            </div>					

            </div>
        </div>
    </div>
@endsection
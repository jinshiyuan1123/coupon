@extends('wap.layouts.main')
@section('content')
</div>
    <div class="m_container">	
        <div class="m_body">
   <!--消息通知start-->			
            <div class="m_notice">
                <div class="notice_content" style="margin:0 auto">
                    <marquee id="mar0" behavior="scroll" direction="left" scrollamount="4">
					@if(count($notice)>0)
                        @foreach($notice as $v)
                            <div class="module" style="display: inline;word-break: keep-all;white-space: nowrap;">
                                <span>~亲爱的用户，您获得了{{ $v->notice }}劵~</span>
                            </div>
                        @endforeach
					@else
                            <div class="module" style="display: inline;word-break: keep-all;white-space: nowrap;">
                                <span>~暂无消息~</span>
                            </div>						
                    @endif						
                    </marquee>
                </div>
            </div>	
<!--消息通知end-->	
	<style type="text/css">
		.normal{
		  margin:10px auto;
		  background-image: url({{ $_member->headpic }});
		  background-position:center center;
		  width: 100px;
		  height: 100px;
		  border-radius: 50%;
		  background-size: 100px 100px;
		  background-repeat: no-repeat;
		  background-position-y: 9%;
		}
	</style>	
                <a href="{{ route('wap.userinfo') }}" class="c_blue"><div class="normal"></div></a>
				<div class="nichen">
				                @if ($_member->nichen)
                                    <a href="{{ route('wap.userinfo') }}" class="c_blue">{{ $_member->nichen }}</a>
                                @else
                                    <a href="{{ route('wap.set_nichen') }}" class="c_blue">未设置昵称</a>
                                @endif
				</div>
		
            <div class="m_userCenter">
          
                <ul class="m_userCenter-list">
                    <li>
                        <a href="{{ route('wap.mycard') }}">
                            <img class="trade-icon" src="{{ asset('/wap/images/aside_4.png') }}" alt="">
                            我的券
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('wap.myscore') }}">
                            <img class="trade-icon" src="{{ asset('/wap/images/aside_3.png') }}" alt="">
                            我的积分
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('wap.mymoments') }}">
                            <img class="trade-icon" src="{{ asset('/wap/images/aside_7.png') }}" alt="">
                            我的动态
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('wap.mymessage') }}">
                            <img class="trade-icon" src="{{ asset('/wap/images/aside_12.png') }}" alt="">
                            @我的留言
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('wap.agent') }}">
                            <img class="trade-icon" src="{{ asset('/wap/images/m_userCenter-icon9.png') }}" alt="">
                            商家中心
                        </a>
                    </li>					
                    <li>
                        <a href="{{ route('wap.drawing_record') }}">
                            <img class="trade-icon" src="{{ asset('/wap/images/aside_8.png') }}" alt="">
                            设置
                        </a>
                    </li>			
                    <li>
                        <a href="">
                            <img class="trade-icon" src="{{ asset('/wap/images/aside_10.png') }}" alt="">
                            客服：{{ $_system_config->phone1}}
                        </a>
                    </li>

                </ul>
            </div>
        </div>
    </div>
@endsection
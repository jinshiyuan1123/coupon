@extends('wap.layouts.main')
@section('content')
    <div class="m_container">
        <div class="m_body2">
            <div class="container-fluid gm_main">
                <div class="m_member-title clear textCenter">
                    <a class="pull-left" href="javascript:history.go(-1);">&nbsp;返回</a>
                    我的红包
                </div>
                <div class="m_userCenter-line"></div>
                <div class="wrap userInfo">
			
				<!--优惠券-->
				  <div class="coupons">
				  <div class="title">
				 <ul>
				    <li><a href="{{ route('wap.mycard') }}" >优惠券</a></li>
					<li><a href="{{ route('wap.mymiandan') }}">免单劵</a></li>	
				    <li><a href="{{ route('wap.myshop') }}" >商品订单</a></li>	
                    <li><a href="{{ route('wap.myhb') }}" class="on" >红包</a></li>					
				  </ul>
				  </div>			    
				  </div>

                </div>

 <div style="width:80%;line-height:90px;margin:0 auto;text-align:center"> 暂无数据！</div>				
            </div>
	

	
        </div>
    </div>
@endsection
@section('after.js')
    <script type="text/javascript" src="{{ asset('/wap/js/laydate.js') }}"></script>
@endsection
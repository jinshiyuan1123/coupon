@extends('wap.layouts.main')
@section('content')
    <div class="m_container">
        <div class="m_body2">
            <div class="container-fluid gm_main">
                <div class="m_member-title clear textCenter">
                    <a class="pull-left" href="javascript:history.go(-1);">&nbsp;返回</a>
                    我的免单
                </div>
                <div class="m_userCenter-line"></div>
                <div class="wrap userInfo">
				<!--优惠券-->
				  <div class="coupons">
				  <div class="title">
				 <ul>
				    <li><a href="{{ route('wap.mycard') }}" >优惠券</a></li>
					<li><a href="{{ route('wap.mymiandan') }}" class="on">免单劵</a></li>	
				    <li><a href="{{ route('wap.myshop') }}" >商品订单</a></li>	
                    <li><a href="{{ route('wap.myhb') }}" >红包</a></li>					
				  </ul>
				  </div>
				      <ul>
					  @if ($data->total() > 0)
                       @foreach($data as $item)

						  <li id="{{$item->code}}" onclick="yzm(this.id)">
						  <div class="ico_2">
						    <div class="left">
							<span class="danwei">￥</span>
							<span class="money">{{$item->decrease}}</span>
							</div>
							<div class="right">
							<P><span class="ttype">免单劵</span></p>
							<P><span class="ttext">{{$item->businessname}}</span></p>
							</div>
						  </div>
						 </li>
						 
                        @endforeach
                        @endif												
					  </ul>
				  </div>
				

                    <table border="0" cellspacing="0" cellpadding="0" class="page">
                        {!! $data->links() !!}
                    </table>
                </div>

            </div>
        </div>
    </div>
<script>
function yzm(id){
	alert("您的免单验证码为："+id);
}
</script>	
@endsection
@section('after.js')
    <script type="text/javascript" src="{{ asset('/wap/js/laydate.js') }}"></script>
@endsection
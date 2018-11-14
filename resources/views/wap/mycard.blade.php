@extends('wap.layouts.main')
@section('content')
    <div class="m_container">
        <div class="m_body2">
            <div class="container-fluid gm_main">
                <div class="m_member-title clear textCenter">
                    <a class="pull-left" href="javascript:history.go(-1);">&nbsp;返回</a>
                    我的优惠券
                </div>
                <div class="m_userCenter-line"></div>
                <div class="wrap userInfo">
				<!--优惠券-->
				  <div class="coupons">
				  <div class="title">
				 <ul>
				    <li><a href="{{ route('wap.mycard') }}" @if($status==4)
						class="on"
					   @endif
					>优惠券</a></li>
					<li><a href="{{ route('wap.mymiandan') }}" >免单劵</a></li>	
				    <li><a href="{{ route('wap.myshop') }}" >商品订单</a></li>	
                    <li><a href="{{ route('wap.myhb') }}" >红包</a></li>					
					 <!---<li><a href="{{ route('wap.mycard') }}?status=0" @if($status==0)
						class="on"
					   @endif>审核中</a></li>
					<li><a href="{{ route('wap.mycard') }}?status=1" @if($status==1)
						class="on"
					   @endif>未使用</a></li>
					<li><a href="{{ route('wap.mycard') }}?status=2" @if($status==2)
						class="on"
					   @endif>已使用</a></li>
					<li><a href="{{ route('wap.mycard') }}?status=3" @if($status==3)
						class="on"
					   @endif>已失效</a></li>--->
				  </ul>
				  </div>
				      <ul>
					  @if ($data->total() > 0)
                       @foreach($data as $item)
					     @if($item->type==1) 
						  <a href="{{route('wap.usecard',['id'=>$item->couponid])}}">	 
						  <li>
						  <div class="
						      @if($item->status==0)
							  ico_12
						      @elseif($item->status==1)
							  ico_3
						      @elseif($item->status==2)
							  ico_6	
						      @else
							  ico_9								  
							  @endif
							  "
						      >
						    <div class="left">
							<span class="danwei">￥</span>
							<span class="money">{{$item->decrease}}</span>
							</div>
							<div class="right">
							<P><span class="ttype">满减劵</span></p>
							<P><span class="ttext">满{{$item->term}}使用</span></p>
							</div>
						  </div>
						 </li>
						 </a>
                         @endif	
					     @if($item->type==2) 
						  <li>
						  <div class="
						      @if($item->status==0)
							  ico_10
						      @elseif($item->status==1)
							  ico_1
						      @elseif($item->status==2)
							  ico_4	
						      @else
							  ico_7							  
							  @endif
							  "
						      >
						    <div class="left">
							<span class="danwei">￥</span>
							<span class="money">{{$item->decrease}}</span>
							</div>
							<div class="right">
							<P><span class="ttype">活动劵</span></p>
							<P><span class="ttext">满{{$item->term}}使用</span></p>
							</div>
						  </div>
						 </li>
                         @endif	
					     @if($item->type==3) 
						  <li>
						  <div class="
						      @if($item->status==0)
							  ico_11
						      @elseif($item->status==1)
							  ico_2
						      @elseif($item->status==2)
							  ico_5	
						      @else
							  ico_8							  
							  @endif
							  "
						      >
						    <div class="left">
							<span class="danwei">￥</span>
							<span class="money">{{$item->decrease}}</span>
							</div>
							<div class="right">
							<P><span class="ttype">免单劵</span></p>
							<P><span class="ttext">满{{$item->term}}使用</span></p>
							</div>
						  </div>
						 </li>
                         @endif							 
                        @endforeach
                        @else

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
@endsection
@section('after.js')
    <script type="text/javascript" src="{{ asset('/wap/js/laydate.js') }}"></script>
@endsection
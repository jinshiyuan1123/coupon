@extends('wap.layouts.main')
@section('content')
@include('wap.layouts.header')
    <div class="m_container">
	<div class="m_body">
            <div class="m_banner">
                <div id="slide" class="container-fluid slide">
                    <ul class="bd">
                        <li><a href="#"><img class="carousel-inner" src="{{ asset('/wap/images/m_banner1.jpg') }}"></a>
                        </li>
                        <li><a href="#"><img class="carousel-inner" src="{{ asset('/wap/images/m_banner1.jpg') }}"></a>
                        </li>
                        <li><a href="#"><img class="carousel-inner" src="{{ asset('/wap/images/m_banner1.jpg') }}"></a>
                        </li>
                        <li><a href="#"><img class="carousel-inner" src="{{ asset('/wap/images/m_banner1.jpg') }}"></a>
                        </li>
                    </ul>
                    <ul class="hd"></ul>
                </div>
            </div>	
        <div class="m_wrapper clear">
                <div class="list_shop">
				<!---	<ul>
					<li><img src="{{ asset('/wap/images/ico.png') }}" /></li>
					<li><img src="{{ asset('/wap/images/ico.png') }}" /></li>
					<li><img src="{{ asset('/wap/images/ico.png') }}" /></li>
					<li><img src="{{ asset('/wap/images/ico.png') }}" /></li>
					</ul>--->
                    <div class="htitle">积分兑换推荐</div>
                </div>
				<div class="shop_nav">
				   <span>兑换:</span>
				   <a href="{{route('wap.activity_list')}}"><span>免单</span></a>
				   <a href="{{route('wap.activity_shop')}}"><span>实物</span></a>
				   <a href="{{route('wap.activity_hb')}}"><span style="background:#06c1ae;">红包</span></a>
				</div>
           <div style="width:80%;line-height:90px;margin:0 auto;text-align:center"> 暂无数据！</div>

               <!--- <div class="list_box">
					<ul>
					@foreach($coupons_miandan as $v)
					<li>                                
					    <a href="{{route('wap.activity_hb_id',['id'=>$v->id])}}" style="color:#000">
						<div style="width:100%;height:100%;background:#D04C4C;padding:5px;text-align:center;border-radius:10px;font-size:16px;">
								<div style="font-size:16px;font-weight:700;color:#d9edf7;line-height:50px">{{$v->businessname}}</div>
                                <div><span style="color:#C7CA42;font-size:16px;font-weight:700">免单劵&nbsp;{{$v->decrease}}&nbsp;元</span></div>
                        </div>
						</a>
					</li>
                    @endforeach
					</ul>

					
                </div>--->
 <div style="width:95%;margin:0 auto">
{!! $coupons_miandan->links() !!}
</div>	             				
        </div>
        </div>
    </div>


@endsection
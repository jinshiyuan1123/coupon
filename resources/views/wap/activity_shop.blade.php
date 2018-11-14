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
				   <a href="{{route('wap.activity_shop')}}"><span style="background:#06c1ae;">实物</span></a>
				   <a href="{{route('wap.activity_hb')}}"><span>红包</span></a>
				</div>
            

                <div class="list_box">
					<ul>
					@foreach($coupons_shop as $v)
					<li>                                
					    <a href="{{route('wap.activity_shop_id',['id'=>$v->id])}}" style="color:#000">
						<div style="width:100%;height:80%;background:#f6f6f6;padding:5px;text-align:center;border-radius:10px;font-size:16px;">
								<img src="{{$v->imgurl}}" width="100%" height="100%" />
                        </div>
						<div style="width:100%;height:20%;text-align:center;">{{$v->shoptitle}}</div>
						</a>
					</li>
                    @endforeach
					</ul>

					
                </div>
 <div style="width:95%;margin:0 auto">
{!! $coupons_shop->links() !!}
</div>	             				
        </div>
        </div>
    </div>


@endsection
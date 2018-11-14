@extends('wap.layouts.main')
@section('content')
    <div class="m_container">
        <div class="m_body2">
            <div class="container-fluid gm_main">
                <div class="m_member-title clear textCenter">
                    <a class="pull-left" href="javascript:history.go(-1);">&nbsp;返回</a>
                    我的订单
                </div>
                <div class="m_userCenter-line"></div>
                <div class="wrap userInfo">
			
				<!--优惠券-->
				  <div class="coupons">
				  <div class="title">
				 <ul>
				    <li><a href="{{ route('wap.mycard') }}" >优惠券</a></li>
					<li><a href="{{ route('wap.mymiandan') }}">免单劵</a></li>	
				    <li><a href="{{ route('wap.myshop') }}"  class="on">商品订单</a></li>	
                    <li><a href="{{ route('wap.myhb') }}" >红包</a></li>					
				  </ul>
				  </div>			    
				  </div>

                </div>

                <div class="userInfo" >
                    <dl>
					@foreach($data as $v)
                        <dd>
                            
                                <div style="width:100%;height:25px;line-height:25px;font-size:16px;font-weight:700">
								<img src="{{$v->imgurl}}" width="30px" height="30px" />&nbsp;{{$v->shoptitle}}
                                </div>
                                <div style="width:100%;height:25px;line-height:25px;text-align:right;">
									<span style="color:red">
									<?php 
									$begintime=strtotime($v->begintime);
									$endtime=strtotime($v->endtime);
									if($v->status==0){
										echo "[待发货]";
									}else{
									echo "[已发货]";	
									}									
									?>
									</span>
									<span>{{$v->updated_at}}</span><br/>
                                </div>	
                                <div>{{$v->orderno}} </div>								
                        </dd>
					@endforeach	
                    </dl>
                </div>				
				
                    <table border="0" cellspacing="0" cellpadding="0" class="page">
                        {!! $data->links() !!}
                    </table>				
            </div>
	

	
        </div>
    </div>
@endsection
@section('after.js')
    <script type="text/javascript" src="{{ asset('/wap/js/laydate.js') }}"></script>
@endsection
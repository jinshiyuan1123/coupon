@extends('wap.layouts.main')
@section('content')
    @extends('wap.layouts.header')

    <div class="m_container">
        <div class="m_body">
            <div class="container-fluid gm_main">
                <div class="m_member-title1 clear textCenter">
                    <a class="pull-left" href="javascript:history.go(-1);">&nbsp;返回</a>
                    优惠券管理
					<a href="{{ route('wap.addcard') }}" class="pull-right" style="color:#00BCD4">添加优惠券</a>
                </div>
                <div class="m_userCenter-line"></div>
              <div id='ichart-render'></div>			
				
                <div class="userInfo" >
                    <dl>
					@foreach($data as $v)
                        <dd>
                            <a href="{{ route('wap.cardinfo',['id'=>$v->id]) }}" class="clear">
                                <div class="pull-left" style="width:40%;background:#D04C4C;padding:5px;text-align:center;border-radius:10px;font-size:16px;">
								<span style="font-size:16px;font-weight:700;color:#fff">{{$v->couponstitle}}</span><br/>
                                满<span style="color:#fff;font-size:16px">&nbsp;{{$v->term}}&nbsp;</span>减<span style="color:#fff;font-size:16px">&nbsp;{{$v->decrease}}&nbsp;</span>
                                </div>
                                <div class="pull-left" style="margin-left:20px">
									<span>
									<?php 
									$begintime=strtotime($v->begintime);
									$endtime=strtotime($v->endtime);
									if($v->status==0){
										echo "审核中";
									}elseif($begintime<time() && $endtime>time()){
									echo "生效中";	
									}elseif($endtime >time() ){
									echo "未生效";
									}else{
									echo "已过期";	
									}									
									?>
									</span><br/>
									<span>{{$v->updated_at}}</span>
                                </div>								
                                <i class="icon-angle-right"></i>
                            </a>
                        </dd>
					@endforeach	
                    </dl>
                </div>
            </div>
                    <table border="0" cellspacing="0" cellpadding="0" class="page">
                        {!! $data->links() !!}
                    </table>			
			
        </div>
    </div>
    <script type="text/javascript" src="{{ asset('/wap/js/laydate.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/wap/js/clipboard.min.js') }}"></script>

@endsection
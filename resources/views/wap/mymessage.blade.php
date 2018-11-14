@extends('wap.layouts.main')
@section('after.css')

    <link type="text/css" rel="stylesheet" href="{{ asset('/wap/css/main.css') }}">
@endsection
@section('content')
    <div class="m_container">
        <div class="m_body2">


            <div class="m_wrapper clear">
                <div class="m_member-title clear textCenter">
                    <a class="pull-left" href="javascript:history.go(-1);">&nbsp;返回</a>
                    @我的留言
                </div>
                <div class="m_userCenter-line"></div>
                <div class="moments_box">
					<ul>
					@foreach($data as $v)
					@if(count($v->mymessage)>0)
					<li>
					<div class="maxtext"><div style="float:left;font-size:16px;width:85%; white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">您的动态:&nbsp;<a href="{{ route('wap.mymoments') }}/{{$v->id}}">{{$v->content}}</a></div></div>
					 @foreach($v->mymessage as $t)
					 <div class="maxtext">@<span class="usernichen">{{$t->nichen}}</span>：{{$t->content}}<span class="uptime">&nbsp;{{$t->created_at}}</span></div>
					 @endforeach
					<a href="{{ route('wap.mymoments') }}/{{$v->id}}">
					<div class="tagline">				
					<span class="comment">回复</span>
					</div>
					</a>
					</li>
					@endif
                    @endforeach
				
					
					
					</ul>
                
					
                </div>
            </div>

 <div style="width:95%;margin:0 auto">
{!! $data->links() !!}
</div>	        


        </div>
    </div>

@endsection
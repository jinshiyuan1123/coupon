@extends('admin.layouts.main')
@section('content')
     <section class="content">
         <div class="panel panel-primary">
             <div class="panel-heading">
                 <h3 class="panel-title">朋友圈审核</h3>
             </div>
             <div class="panel-body">
                 @include('admin.activity.filter')
                 <table class="table table-bordered table-hover text-center">
                     <tr>
                         <th style="width: 10%">ID</th>
                         <th class="text-center">用户</th>
						 <th  style="width: 10%">分类</th>
                         <th  style="width: 20%">内容</th>
                         <th  style="width: 20%">图片</th>
                         <th  style="width: 20%">操作</th>
                     </tr>
                     @foreach($data as $item)
                         <tr>
                             <td>
                                 {{ $item->id }}
                             </td>
                             <td>
							     <a href="/admin/member?id={{ $item->uid }}">{{$item->member_name}} </a>
                             </td>
                             <td>
                                 {{$item->Momentsclass}}
                             </td>
                             <td>
                                 {{$item->content}}
                             </td>
                             <td>
							 <?php 
							    $imgurl=explode(',',$item->imgurl);
								if($item->imgurl !=''){
                                for($i=0;$i<count($imgurl);$i++){	
							?>
							<a href="<?=$imgurl[$i]?>" target="_blank" style="background-color: #337ab7;"><img src="<?=$imgurl[$i]?>" width="20px" height="20px" /></a>
								<?php }}?>
                             </td>
                             <td>
                                <a href="{{ route('activity.check', ['id' => $item->getKey(), 'status' => 1]) }}" class="btn btn-primary btn-xs" onclick="return confirm('确定通过吗？')">通过</a>
                                 <!---<a href="{{ route('activity.edit', ['id' => $item->getKey()]) }}" class="btn btn-primary btn-xs">修改</a>-->
                                 <button class="btn btn-danger btn-xs"
                                         data-url="{{route('activity.destroy', ['id' => $item->getKey()])}}"
                                         data-toggle="modal"
                                         data-target="#delete-modal"
                                 >
                                     不通过
                                 </button>
                             </td>
                         </tr>
                     @endforeach
                 </table>
                 <div class="clearfix">
                     <div class="pull-left" style="margin: 0;">
                         <p>总共 <strong style="color: red">{{ $data->total() }}</strong> 条</p>
                     </div>
                 <div class="pull-right" style="margin: 0;">
                     {!! $data->appends([ 'end_at' => $end_at])->links() !!}
                 </div>
                 </div>
             </div>
         </div>

     </section><!-- /.content -->
@endsection
@section("after.js")
     @include('admin.layouts.delete',['title'=>'操作提示','content'=>'你确定要删除这个动态吗?'])
@endsection
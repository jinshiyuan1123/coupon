@extends('admin.layouts.main')
@section('content')

     <section class="content">
         <div class="panel panel-primary">
             <div class="panel-heading">
                 <h3 class="panel-title">下线会员列表</h3>
             </div>
             <div class="panel-body">
                 @include('admin.member_offline.filter')

                 <table class="table table-bordered table-hover text-center">
                     <tr>
                         <th style="width: 5%">ID</th>
						 <th style="width: 5%">商家ID</th>
                         <th style="width: 10%">商家名称</th>
                         <th  style="width: 10%">名称</th>
                         <th  style="width: 10%">优惠条件</th>
                         <th  style="width: 10%">开始时间</th>
                         <th  style="width: 10%">截止时间</th>
                         <th  style="width: 10%">添加时间</th>
                         <th  style="width: 10%">介绍</th>
                         <th  style="width: 15%">操作</th>
                     </tr>
                     @foreach($data as $item)
                         <tr>
                             <td>
                                 {{ $item->id }}
                             </td>
                             <td>
                                <a href="/admin/member_daili?name={{$item->name}}"> {{ $item->businessid }}</a>
                             </td>							 
                             <td>
                                 <a href="/admin/member_daili?name={{$item->name}}">{{ $item->businessname }}</a>
                             </td>
                             <td>
                                 {{ $item->couponstitle }}
                             </td>
                             <td>
                                 满{{ $item->term }}减{{ $item->decrease }}
                             </td>
                             <td>
                                 {{ $item->begintime }}
                             </td>
                             <td>
                                 {{ $item->endtime }}
                             </td>						 
                             <td>
                                 {{ $item->created_at }}
                             </td>
                             <td>
							    @if($item->info)
								 {{ $item->info }}
							    @else
									无
								@endif
                             </td>
                             <td>
							  <a href="{{ route('member_offline.show', ['id' => $item->getKey()]) }}" class="btn btn-primary btn-xs" onclick="return confirm('确定通过吗？')">通过</a>
                              <a href="{{ route('member_offline.update', ['id' => $item->getKey()]) }}" class="btn btn-danger btn-xs" onclick="return confirm('确定不通过吗？')">不通过</a>
							 </td>
                         </tr>
                     @endforeach
                 </table>
                 <div class="clearfix">
                     <div class="pull-left" style="margin: 0;">
                         <p>总共 <strong style="color: red">{{ $data->total() }}</strong> 条</p>
                     </div>
                     <div class="pull-right" style="margin: 0;">
                         {!! $data->appends(['businessid' => $businessid])->links() !!}
                     </div>
                 </div>
             </div>
         </div>

     </section><!-- /.content -->
@endsection
@section("after.js")
     @include('admin.layouts.delete',['title'=>'操作提示','content'=>'你确定要删除这个用户吗?'])
@endsection
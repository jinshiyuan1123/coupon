@extends('admin.layouts.main')
@section('content')
     <section class="content">
         <div class="panel panel-primary">
             <div class="panel-heading">
                 <h3 class="panel-title">免单劵列表</h3>
             </div>
             <div class="panel-body">
                 @include('admin.fs_level.filter')
                 <table class="table table-bordered table-hover text-center">
                     <tr>
                         <th  style="width: 5%">ID</th>
                         <th  style="width: 10%">标题</th>
                         <th  style="width: 5%">商家名称</th>
                         <th  style="width: 5%">电话</th>
                         <th  style="width: 5%">地址</th>
                         <th  style="width: 15%">说明</th>
						 <th  style="width: 5%">金额</th>
						 <th  style="width: 5%">兑换积分</th>
						 <th  style="width: 10%">兑换/使用</th>
						 <th  style="width: 10%">开始时间</th>
						 <th  style="width: 10%">结束时间</th>
						 <th  style="width: 5%">状态</th>
                         <th  style="width: 10%">操作</th>
                     </tr>
                     @foreach($data as $item)
                         <tr>
                             <td>
                                 {{ $item->id }}
                             </td>
                             <td>
                                {{ $item->title }}
                             </td>
                             <td>
                                {{ $item->businessname }} 
                             </td>
                             <td>
                                {{ $item->tel }} 
                             </td>
                             <td>
                                {{ $item->address }}
                             </td>							 
                             <td>
                                {{ $item->info }}
                             </td>
                             <td>
                                {{ $item->decrease }}
                             </td>							 
                             <td>
                                {{ $item->score }}
                             </td>
                             <td>
                                 {{ $item->Couponsmiandanuser }}/{{ $item->sumuse }}
                             </td>
                             <td>
                                {{ $item->begintime }}
                             </td>
                             <td>
                                {{ $item->endtime }}
                             </td>
                             <td>
							    {{$item->statustag}}
                             </td>							 
                             <td>
                                 <a href="{{ route('fs_level.edit', ['id' => $item->getKey()]) }}" class="btn btn-primary btn-xs">修改</a>
                                <!--- <button class="btn btn-danger btn-xs"
                                         data-url="{{route('fs_level.destroy', ['id' => $item->getKey()])}}"
                                         data-toggle="modal"
                                         data-target="#delete-modal"
                                 >
                                     删除
                                 </button>--->
                             </td>
                         </tr>
                     @endforeach
                 </table>
                 <div class="clearfix">
                     <div class="pull-left" style="margin: 0;">
                         <p>总共 <strong style="color: red">{{ $data->total() }}</strong> 条</p>
                     </div>
                 <div class="pull-right" style="margin: 0;">
                     {!! $data->appends(['status' => $status, 'miandanID' =>$miandanID, 'start_at' => $start_at, 'end_at' => $end_at])->links() !!}
                 </div>
                 </div>
             </div>
         </div>

     </section><!-- /.content -->
@endsection
@section("after.js")
     @include('admin.layouts.delete',['title'=>'操作提示','content'=>'你确定要删除这个优惠劵吗?'])
@endsection
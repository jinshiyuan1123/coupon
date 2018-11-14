@extends('admin.layouts.main')
@section('content')
     <section class="content">
         <div class="panel panel-primary">
             <div class="panel-heading">
                 <h3 class="panel-title">商品列表</h3>
             </div>
             <div class="panel-body">
                 @include('admin.shop.filter')
                 <table class="table table-bordered table-hover text-center">
                     <tr>
                         <th  style="width: 5%">ID</th>
                         <th  style="width: 10%">标题</th>
                         <th  style="width: 5%">图片</th>
                         <th  style="width: 5%">兑换积分</th>
                         <th  style="width: 5%">兑换</th>
                         <th  style="width: 15%">说明</th>
						 <th  style="width: 5%">状态</th>
						 <th  style="width: 5%">添加时间</th>
                         <th  style="width: 10%">操作</th>
                     </tr>
                     @foreach($data as $item)
                         <tr>
                             <td>
                                 {{ $item->id }}
                             </td>
                             <td>
                                {{ $item->shoptitle }}
                             </td>
                             <td>
                                <a href="{{ $item->imgurl }}" target="_blank"><img src="{{ $item->imgurl }}" width="70px" height="30px;" /></a>
                             </td>
                             <td>
                                {{ $item->score }}
                             </td>
                             <td>
                                {{ $item->Couponsshopuser }} 
                             </td>
                             <td>
                                {{ $item->info }}
                             </td>
                             <td>
                                @if($item->status==0)
									<strong style="color:red">未上架</strong>
								@else
									<strong style="color:green">上架</strong>
								@endif
                             </td>
                             <td>
                                {{ $item->created_at }}
                             </td>								 
                             <td>
                                 <a href="{{ route('shop.edit', ['id' => $item->getKey()]) }}" class="btn btn-primary btn-xs">修改</a>
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
                    <tfoot>
                        <tr>
                            <td><strong style="color: red">总合计</strong></td>
                            <td></td>
                            <td></td>
							<td><strong style="color: red">{{ $total_score }}</strong></td>
							<td><strong style="color: red">{{ $total_Couponsshopuser }}</strong></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
                        </tr>
                    </tfoot>					 
                 </table>
                 <div class="clearfix">
                     <div class="pull-left" style="margin: 0;">
                         <p>总共 <strong style="color: red">{{ $data->total() }}</strong> 条</p>
                     </div>
                 <div class="pull-right" style="margin: 0;">
                     {!! $data->appends(['status' => $status, 'shopID' =>$shopID, 'start_at' => $start_at, 'end_at' => $end_at])->links() !!}
                 </div>
                 </div>
             </div>
         </div>

     </section><!-- /.content -->
@endsection
@section("after.js")
     @include('admin.layouts.delete',['title'=>'操作提示','content'=>'你确定要删除这个优惠劵吗?'])
@endsection
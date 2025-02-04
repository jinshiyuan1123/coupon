@extends('admin.layouts.main')
@section('content')

     <section class="content">
         <div class="panel panel-primary">
             <div class="panel-heading">
                 <h3 class="panel-title">商家列表</h3>
             </div>
             <div class="panel-body">
                 @include('admin.member_daili.filter')

                 <table class="table table-bordered table-hover text-center">
                     <tr>
                         <th style="width: 5%">ID</th>
                         <th class="text-center" style="width: 5%">用户名</th>
                         <th  style="width: 15%">真实姓名/注册时间</th>
						 <th  style="width: 5%">店标</th>
                         <th  style="width: 10%">名称/电话</th>
                         <th  style="width: 10%">地址</th>
						 <th  style="width: 10%">证件</th>
						 <th  style="width: 5%">余额</th>
						 <th  style="width: 10%">优惠券/使用</th>
						 <th  style="width: 5%">收款总额</th>
                         <th  style="width: 5%">状态</th>
                         <th  style="width: 10%">操作</th>
                     </tr>
                     @foreach($data as $item)
                         <tr>
                             <td>
                                 {{ $item->id }}
                             </td>
                             <td>
                                 {{ $item->name }}
                             </td>
                             <td>
                                 {{ $item->real_name }}<br>
                                 {{ $item->created_at }}
                             </td>
                             <td>
                                 <a href="{{ $item->Businessheadpic }}" target="_blank"><img src="{{ $item->Businessheadpic }}" width="30px;" height="30px"/></a>
                             </td>							 
                             <td>
                                 {{ $item->Businessname }}<br>
                                 {{ $item->Businessphone }}
                             </td>
                             <td>
							 {{ $item->Businessaddress }}
                             </td>
                             <td>
                                 <a href="{{ $item->idcard }}" target="_blank"><img src="{{ $item->idcard }}" width="20px;" height="20px"/></a>
								 <a href="{{ $item->Business }}" target="_blank"><img src="{{ $item->Business }}" width="20px;" height="20px"/></a>
                             </td>
                             <td>
                                {{ $item->money }} 
                             </td>
                             <td>
							 <a href="/admin/member_offline_recharge?businessid={{$item->id}}">{{$item->coupons}}/
							 {{$item->usecoupons}}</a>
                             </td>
                             <td>
                                {{ $item->paymoney }} 
                             </td>								 						 
                             <td>
                                 {!! \App\Models\Base::$MEMBER_STATUS_HTML[$item->status] !!}
                             </td>
                             <td>
                                 <a href="{{ route('member_daili.edit', ['id' => $item->getKey()]) }}" class="btn btn-primary btn-xs">修改</a>
                                 <!--<button class="btn btn-danger btn-xs"
                                         data-url="{{route('member_daili.destroy', ['id' => $item->getKey()])}}"
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
                     {!! $data->appends(['name' => $name])->links() !!}
                 </div>
                 </div>
             </div>
         </div>

     </section><!-- /.content -->
@endsection
@section("after.js")
     @include('admin.layouts.delete',['title'=>'操作提示','content'=>'你确定要删除这个用户吗?'])
@endsection
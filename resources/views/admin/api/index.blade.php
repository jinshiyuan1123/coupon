@extends('admin.layouts.main')
@section('content')
     <section class="content">
         <div class="panel panel-primary">
             <div class="panel-heading">
                 <h3 class="panel-title">接口列表</h3>
             </div>
             <div class="panel-body">
                 @include('admin.api.filter')
                 <h3 style="color: red" class="text-center"></h3>
               
                 <table class="table table-bordered table-hover text-center">
                     <tr>
                         <th style="width: 5%">ID</th>
                         <th>平台名称</th>
                         <th  style="width: 10%">余额</th>
                         <th  style="width: 20%">最后更新时间</th>
                         <th  style="width: 10%">排序</th>
                         <th  style="width: 20%">上线/下线</th>
                         <th  style="width: 20%">操作</th>
                     </tr>
                     @foreach($data as $item)
                         <tr>
                             <td>
                                 {{ $item->id }}
                             </td>
                             <td>
                                 {{ $item->api_name }}
                             </td>
                             <td>
                                 <span class="balance">{{ $item->api_money }}</span>
                                 @if (!in_array($item->api_name, ['BI','EG']))
                                 <a class="refresh" href="javascript:void(0)"  data-uri="{{ route('api.credit') }}?api_name={{ $item->api_name }}"></a>
                                @endif
                             </td>
                             <td>
                                 {{ $item->updated_at }}
                             </td>
                             <td>
                                 {{ $item->sort }}
                             </td>
                             <td>
                                 {!! \App\Models\Base::$ON_LINE_HTML[$item->on_line] !!}
                             </td>
                             <td>
                                 @if ($item->on_line == 0)
                                     <a href="{{ route('api.check', ['id' => $item->getKey(), 'status' => 1]) }}" class="btn btn-danger btn-xs" onclick="return confirm('确定下线吗？')">下线</a>
                                 @elseif($item->on_line == 1)
                                     <a href="{{ route('api.check', ['id' => $item->getKey(), 'status' => 0]) }}" class="btn btn-success btn-xs" onclick="return confirm('确定上线吗？')">上线</a>
                                 @endif
                                 <button type="button" class="btn btn-info btn-xs show-cate" data-uri="{{ route('api.show', ['id' => $item->getKey()]) }}">查看</button>
                                 <a href="{{ route('api.edit', ['id' => $item->getKey()]) }}" class="btn btn-primary btn-xs">修改</a>
                                 {{--<button class="btn btn-danger btn-xs"--}}
                                         {{--data-url="{{route('api.destroy', ['id' => $item->getKey()])}}"--}}
                                         {{--data-toggle="modal"--}}
                                         {{--data-target="#delete-modal"--}}
                                 {{-->--}}
                                     {{--删除--}}
                                 {{--</button>--}}
                             </td>
                         </tr>
                     @endforeach
                 </table>
                 <div class="clearfix">
                     <div class="pull-left" style="margin: 0;">
                         <p>总共 <strong style="color: red">{{ $data->total() }}</strong> 条</p>
                     </div>
                 <div class="pull-right" style="margin: 0;">
                     {!! $data->render() !!}
                 </div>
                 </div>
             </div>
         </div>

     </section><!-- /.content -->
     <script>
         $(function(){
             $('.show-cate').click(function(){
                 var url = $(this).attr('data-uri');
                 layer.open({
                     type: 2,
                     title: '信息',
                     shadeClose: false,
                     shade: 0.8,
                     area: ['90%', '90%'],
                     content: url
                 });
             })

             $('.refresh').on('click',function(){
                 var _this=$(this);
                 var pos = _this.prev('span');
//                 var money_span = _this.parent('p').next().find('span');
                 _this.css({
                     'background':'url({{ asset("/web/images/h-u-loading2.gif") }}) no-repeat center center'
                 })
                 $.ajax({
                     type : 'GET',
                     url : _this.attr('data-uri'),
                     data : '',
                     contentType : "application/json; charset=utf-8",
                     success : function(data){

                         _this.css({
                             'background':'url({{ asset("/web/images/bg-ico.png") }}) no-repeat center center',
                             'background-position': '-80px -102px'
                         })
                         if (data.Code != 0)
                         {
                             alert(data.Message);
                             return ;
                         }
                         pos.html(data.Data+'元');
                     },
                     error: function (err, status) {
                         console.log(err)
                     }
                 })
             })
         });
     </script>
@endsection
@section("after.js")
     @include('admin.layouts.delete',['title'=>'操作提示','content'=>'你确定要删除这个接口吗?'])
@endsection
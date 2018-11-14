@extends('admin.layouts.main')

@section('content')
    <!-- Main content -->
    <section class="content-header">
                    </section>
        <!-- Content Header (Page header) -->
            <div class="row">
        <div class="col-lg-4 col-xs-4">
           
      
    </div>
    <style>
        .apiList{
            font-size: 18px;
            font-weight: bold;
            padding: 0 15px;
        }
        .apiList span{
            color: red;
            font-weight: normal;
        }
        .apiList img{
            margin:0 auto 15px;
            width: 50%;
            display: block;
        }
        .content-wrapper {
            background-color: #ffffff;
        }

    </style>
	 <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>{{ count($_online_member_array) }}</h3>

                        <p>在线会员</p>
                    </div>
                    <div class="icon">
                        
                    </div>
                    <a href="/admin/member?on_line=1" class="small-box-footer">查看详情 <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
 
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3>{{$jrckbs}}</h3>

                        <p>今日提款笔数</p>
                    </div>
                    <div class="icon">
                        
                    </div>
                    <a href="/admin/drawing?status=1" class="small-box-footer">查看详情 <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>


            <!-- ./col -->
        </div>

        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>{{$jrzcrs}}</h3>

                        <p>今日注册人数</p>
                    </div>
                    <div class="icon">
                        
                    </div>
                    <a href="javascript:;" class="small-box-footer">平台总注册（{{$zcrs}}）</a>
                </div>
            </div>

            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3>{{$jrckje}}</h3>

                        <p>今日提款金额</p>
                    </div>
                    <div class="icon">
                        
                    </div>
                    <a href="javascript:;" class="small-box-footer">平台总出款（{{$ckje}}） </a>
                </div>
            </div>


            <!-- ./col -->
        </div>


                    
            </div>
            </div>
    <!-- Main content -->
   
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Main Footer -->

<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->


<!-- Bootstrap 3.3.6 -->
<script src="/admin-lte/bootstrap/js/bootstrap.min.js"></script>
<script src="/vendor/select2/select2.full.min.js"></script>
<!-- AdminLTE App -->
<script src="/node_modules/admin-lte/dist/js/app.min.js"></script>
<script src="/vendor/layer/layer.js"></script>
<script src="/vendor/laydate/laydate.js"></script>
<script src="/js/submitformsync.js"></script>
<script src="/backstage/js/form_v.js"></script>
<script src="/backstage/js/layer-date-default.js"></script>
    <script>
        $(function(){
            $('.refresh').on('click',function(){
                var _this=$(this);
                var pos = _this.prev('span');
//                 var money_span = _this.parent('p').next().find('span');
                _this.css({
                    'background':'url(/web/images/h-u-loading2.gif) no-repeat center center'
                })
                $.ajax({
                    type : 'GET',
                    url : _this.attr('data-uri'),
                    data : '',
                    contentType : "application/json; charset=utf-8",
                    success : function(data){

                        _this.css({
                            'background':'url(/web/images/bg-ico.png) no-repeat center center',
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
        })
    </script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>

            <!-- ./col -->
			   <!-- ./col -->
           
            <!-- ./col -->
        </div>
    </section>
@endsection
@section('after.js')
@endsection
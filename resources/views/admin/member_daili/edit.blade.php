@extends('admin.layouts.main')
@section('content')
    <section class="content">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">商家编辑编辑</h3>
            </div>
            <div class="panel-body">
                <form class="form-horizontal cmxform" name="registerForm" id="form" action="{{ route('member_daili.update', ['id' => $data->getKey()]) }}}" method="post">
                    {!! csrf_field() !!}
                    <input type="hidden" name="_method" value="put">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="membername" class="col-sm-2 control-label">用户名</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="name"  placeholder="用户名" value="{{ $data->name }}" readonly />
                            </div>
                        </div>
                       <div class="form-group">
                           <label for="real_name" class="col-sm-2 control-label">姓名</label>
                           <div class="col-sm-7">
                               <input type="text" class="form-control" id="real_name" name="real_name" placeholder="真实姓名"  value="{{ $data->real_name }}"/>
                            </div>
                      </div>
                       <div class="form-group">
                           <label for="Businessname" class="col-sm-2 control-label">商家名称</label>
                           <div class="col-sm-7">
                               <input type="text" class="form-control" id="Businessname" name="Businessname" placeholder="商家名称"  value="{{ $data->Businessname }}"/>
                            </div>
                      </div>
                       <div class="form-group">
                           <label for="Businessphone" class="col-sm-2 control-label">电话</label>
                           <div class="col-sm-7">
                               <input type="text" class="form-control" id="Businessphone" name="Businessphone" placeholder="电话"  value="{{ $data->Businessphone }}"/>
                            </div>
                      </div>
                       <div class="form-group">
                           <label for="Businessaddress" class="col-sm-2 control-label">地址</label>
                           <div class="col-sm-7">
                               <input type="text" class="form-control" id="Businessaddress" name="Businessaddress" placeholder="地址"  value="{{ $data->Businessaddress }}"/>
                            </div>
                      </div>
                       <div class="form-group">
                           <label for="Businesscontent" class="col-sm-2 control-label">介绍</label>
                           <div class="col-sm-7">
                               <input type="text" class="form-control" id="Businesscontent" name="Businesscontent" placeholder="介绍"  value="{{ $data->Businesscontent }}"/>
                            </div>
                      </div>
                       <div class="form-group">
                           <label for="bank_username" class="col-sm-2 control-label">开户人姓名</label>
                           <div class="col-sm-7">
                               <input type="text" class="form-control" id="bank_username" name="bank_username" placeholder="开户人姓名"  value="{{ $data->bank_username }}"/>
                            </div>
                      </div>
                       <div class="form-group">
                           <label for="bank_name" class="col-sm-2 control-label">开户行</label>
                           <div class="col-sm-7">
                               <input type="text" class="form-control" id="bank_name" name="bank_name" placeholder="开户行"  value="{{ $data->bank_name }}"/>
                            </div>
                      </div>
                       <div class="form-group">
                           <label for="bank_branch_name" class="col-sm-2 control-label">开户行网点</label>
                           <div class="col-sm-7">
                               <input type="text" class="form-control" id="bank_branch_name" name="bank_branch_name" placeholder="开户行网点"  value="{{ $data->bank_branch_name }}"/>
                            </div>
                      </div>
                       <div class="form-group">
                           <label for="bank_card" class="col-sm-2 control-label">银行卡号</label>
                           <div class="col-sm-7">
                               <input type="text" class="form-control" id="bank_card" name="bank_card" placeholder="开户行网点"  value="{{ $data->bank_card }}"/>
                            </div>
                      </div>
                       <div class="form-group">
                           <label for="bank_address" class="col-sm-2 control-label">开户地址</label>
                           <div class="col-sm-7">
                               <input type="text" class="form-control" id="bank_address" name="bank_address" placeholder="开户行网点"  value="{{ $data->bank_address }}"/>
                            </div>
                      </div>					  
                    </div><!-- /.box-body -->
                    <div class="box-footer">
                        <div class="form-group">
                            <label class="col-sm-2 control-label"></label>
                            <div class="col-sm-7">
                                <button type="button" class="btn btn-primary submit-form-sync">提交</button>
                                &nbsp;<a href="{{ route('member_daili.index') }}" class="btn btn-info">返回</a>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>

    </section><!-- /.content -->
@endsection
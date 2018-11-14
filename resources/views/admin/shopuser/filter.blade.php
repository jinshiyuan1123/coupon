<div class="container-fluid" style="margin-bottom: 10px;">
    <form action="" method="get" id="searchForm">
        <div class="row">
            <div class="col-lg-3">
                <div class="input-group">
                    <span class="input-group-addon">商品ID</span>
                    <input type="text" class="form-control" name="shopid" placeholder="商品ID" value="{{ $shopid }}">
                </div>
            </div>
            <div class="col-lg-3">
                <div class="input-group">
                    <span class="input-group-addon">会员ID</span>
                    <input type="text" class="form-control" name="uid" placeholder="会员ID" value="{{ $uid }}">
                </div>
            </div>			
            <div class="col-lg-2">
                <div class="input-group">
                    <span class="input-group-addon">发货状态</span>
                    <select name="status"  class="form-control">
                        <option value="0" @if($status == 0) selected @endif>未发货</option>
						<option value="1" @if($status == 1) selected @endif>已发货</option>
						
                    </select>
                </div>
            </div>						
        </div>
		<div class="row">
            <div class="col-lg-2">
                <div class="input-group">
                    <span class="input-group-addon">开始时间</span>
                    <input type="text" class="form-control" name="start_at" id="start_at" value="{{ $start_at }}" readonly>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="input-group">
                    <span class="input-group-addon">结束时间</span>
                    <input type="text" class="form-control" name="end_at" id="end_at" value="{{ $end_at }}" readonly>
                </div>
            </div>			
            <div class="col-lg-2 pull-right">
                <div class="input-group">
                    <button type="submit" class="btn btn-primary">搜索</button>&nbsp;&nbsp;
                </div>
            </div>		
		</div>
    </form>
</div>
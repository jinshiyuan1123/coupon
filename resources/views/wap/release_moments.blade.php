@extends('wap.layouts.main')
@section('content')
<style>
    .preview-image-box {
        position: relative;
        width: 150px;
        height: 150px;
        border: 1px solid #EAEAEA;
        background-color: #EAEAEA;
    }

    .inside-image-box {
		margin-left:1%;
        width: 32%;
        height: 100px;
		float:left;
		background-color: #efebeb;
    }
	.inside-image-box img{
		width:100%;
		height:100%;
	}
	.inside-image-box .delect{
		position: absolute;
		z-index:99;
		width:30px;
		height:30px;
		color:#000;
		margin-left:-5px;
		margin-top:-5px;
		background:url(/wap/images/close.png);
		background-size:100% 100%;
		
		
	}
    .uploaded-image {
        position: absolute;
        width: 150px;
        height:150px;
       
    }

    .loading-shadow {
        position: absolute;
        top: 0;
        left: 0;
		margin:0 auto;
        width: 150px;
        height: 150px;
        display: none;
        background-color: rgba(255, 255, 255, 1);
    }

    .loading-shadow img {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    .loading-shadow.active{
        display: block;
    }

    .js-reset-image {
		margin:0 auto;
        width: 250px;
        color: #274A91;
        text-align: center;
        margin-top: 20px;
    }

    .js-reset-image span {
        display: none;
        cursor: pointer;
    }

    .js-reset-image span.on {
        display: inline;
    }

    .loading-icon img {
        width: 150px;
    }
</style>
    <div class="m_container">
        <div class="m_body2">
            <div class="container-fluid gm_main">
                <div class="m_member-title clear textCenter">
                    <a class="pull-left" href="javascript:history.go(-1);">&nbsp;返回</a>
                    发布动态
                </div>
                <div class="m_userCenter-line"></div>					
                <div class="userInfo setCard">
                    <form action="{{ route('wap.postreleasemoments') }}" method="post" name="form1">
                        <dl class="set_card">
                            <dd>
                                <select name="momentsclass" style="width:90%;"> 
                            @foreach($MomentsClass as $c)								
								<option value="{{$c->id}}">{{$c->cname}}</option>
						    @endforeach					
								</select>         
							<dd>	
                            <dd>
								<textarea id="taContent" name="content" rows="3" maxlength="200" onchange="this.value=this.value.substring(0, 200)" onkeydown="this.value=this.value.substring(0, 200)" onkeyup="this.value=this.value.substring(0, 200)" placeholder="来说点什么吧……限200字以内"></textarea>
                            </dd>
                            <dd>
							<div id="inputimagesbox"></div>
                            </dd>								
                            <dd>
                                <input type="button" value="确定" class="submit_btn  ajax-submit-btn">
                            </dd>
                        </dl>
                    </form>
                </div>
				<div style="width:95%;margin:0 auto">
							    <!--添加图片-->
									<div style="height:auto;width:100%">
									<div id="upimages">
										
									</div>
										<div class="inside-image-box addimg">
											<img class="addimg-loading" src="{{ asset('/wap/images/addimg.png') }}" alt="">
										</div>				

									</div>
                                <!--添加图片-->	
				</div>				
			<form id="uploadForm" action="{{ route('wap.uploads') }}" method="post"">
			{{csrf_field()}}
			<input style="display: none;" name="image" type="file" class="inputFile" />
			</form>
			
            </div>
        </div>
    </div>


<script type="text/javascript">
var num=0;
$(function (e) {
    $("#uploadForm").on('submit', function(e){
        e.preventDefault();
        $.ajax({
            url: "{{ route('wap.uploads') }}",
            type: "POST",
            data:  new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            // 显示加载图片
            beforeSend: function () {
				$('.addimg-loading').attr('src', '{{ asset('/wap/images/loading.gif') }}');
            },
            success: function (data) {
                // 移除loading加载图片
				if(num>=8){	
                    $('.addimg-loading').attr('src', '{{ asset('/wap/images/addimg.png') }}');
                    $('.addimg').css("display","none");					
				}else{
				 $('.addimg-loading').attr('src', '{{ asset('/wap/images/addimg.png') }}');					
				}
                // 预览
				//$('.headpic').val('/uploads/' + data.msg);
				var div = document.getElementById("upimages");
				var imagesup='<div class="inside-image-box uuuuuu"/ id='+data.msg+'t><div class=delect id='+data.msg+'  onclick=delect(this.id)></div><img class=upimages src=/uploads/' + data.msg+'></div>';
　　　　        var parent = document.getElementById("upimages");
		        //添加 div
		　　　　var div = document.createElement("div");
		　　　　div.innerHTML = imagesup;
		        parent.appendChild(div);
				$('.inputimages').val(data.msg);
				//添加表单
				var inputimages='<input id='+data.msg+'i type=hidden name=inputimages[] style=width:200px value=/uploads/'+data.msg+'>';
　　　　        var inputimagesbox = document.getElementById("inputimagesbox");
		        //添加 div
		　　　　var divbox = document.createElement("div");
		        divbox.innerHTML = inputimages;
		        inputimagesbox.appendChild(divbox);				
				num=num+1;
				
				
            },
            error: function(){}             
        });
    });

    // 选择完要上传的文件后, 直接触发表单提交
    $('input[name=image]').on('change', function () {
        // 如果确认已经选择了一张图片, 则进行上传操作
        if ($.trim($(this).val())) {
            $("#uploadForm").trigger('submit');
        }
    });

    // 触发文件选择窗口
    $('.addimg').on('click', function () {
        $('input[name=image]').trigger('click');
    });
});
    function delect(id){
		var el = document.getElementById(id+'t');
		 el.parentNode.removeChild(el);
		 var el1 = document.getElementById(id+'i');
		 el1.parentNode.removeChild(el1);		 
		 if(num>=9){
			 $('.addimg').css("display","block");
		 }
		 num=num-1;
	}	
</script>
@endsection
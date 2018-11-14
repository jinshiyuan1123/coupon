/**
 * Created by camiez on 2018/4/18.
 */

$(function () {
    //获取信息
    $.ajax({
        type:'get',
        url:'/io/?c=package_act&a=info',
        success:function (result) {
            var obj = JSON.parse(result);
            for (var i = 0; i < obj.length; i++) {
                $('.plan-list').append(
                    '<li name="'+obj[i].id+'">'+
                    '<p class="plan-name"><span>'+obj[i].name+'</span> - ￥'+obj[i].price+'</p>'+
                    '<p class="plan-desc">'+obj[i].tips+'</p>'+
                    '<div class="num">數量 ： '+
                    '<img class="reduce" src="../images/left_arrow.png" alt=""><input type="text" value="0"><img class="add" src="../images/right_arrow.png" alt="">'+
                    '</div>'+
                    '</li>'
                );
            }
            $('.reduce').css('width','0.52rem');
            $('.add').css('width','0.52rem');
            var number = 0
            $('.plan-list').on('click','.reduce',function () {
                number = parseInt($(this).parent().find('input').val())-1;
                if(number < 0){
                    number = 0;
                }
                $(this).parent().find('input').val(number);
            });
            $('.plan-list').on('click','.add',function () {
                console.log($(this));
                number = parseInt($(this).parent().find('input').val())+1;
                $(this).parent().find('input').val(number);
            });
        }
    })
    //确认购买
    $('.confirm').on('click',function () {
        var data = [];
        var lis = document.querySelectorAll('.plan-list li');
        for (var i = 0; i < lis.length; i++) {
            if($(lis[i]).find('input').val() != 0){
                data.push({id:$(lis[i]).attr('name'),name:$(lis[i]).find('.plan-name span:first-child').text(),num:$(lis[i]).find('input').val()})
            }
        }
		
		var jsonstr = $.toJSON(data);
        $.ajax({
            type:'post',
            url:'/io/?c=package_act&a=buy',
            data: jsonstr,
			dataType: "json",
            success:function (result) {
                //var obj = JSON.parse(result);
				var obj = result;
				if(obj.success==false) return;
                $('.tradingCnter .total-calc span:first-child').html('總價 ：'+obj.price);
                $('.tradingCnter .order').html('订单号 ：'+obj.order);
                $('.tradingCnter .order').css('display','block');
            }
        })
    });
    //tab切换
    $('.machine .nav').on('click','li',function () {
        $(this).addClass('active');
        $(this).siblings().removeClass('active');
        if($(this).attr('name') == "my"){
            $('.machine-market').fadeOut(200);
            $('.mymachine').fadeIn(200);
            $.ajax({
                type:'get',
                url:'/io/?c=device_act&a=owner',
                success:function (result) {
                    var obj = JSON.parse(result);
                    if(!obj.success){
                        window.location.href = './login.html'
                    }
                },
                fail:function (err) {
                    console.log(err)
                }
            });
        }else{
            $('.mymachine').fadeOut(200);
            $('.machine-market').fadeIn(200);
        }
    });
    //上一页
    $('.tab .prepage').on('click',function () {
        history.go(-1)
    })
    //首页
    $('.tab .toindex').on('click',function () {
        window.location.href = './index.html'
    });
    $('.tab .back').on('click',function () {
        window.location.href = './infoCenter.html'
    });
})
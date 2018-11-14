/**
 * Created by camiez on 2018/4/15.
 */
$(function () {
    var totalPrice = 0;
    //矿机商城
    $.ajax({
        type:'get',
        url:'/io/?c=device_act&a=info',
        success:function (result) {
            var obj = JSON.parse(result);
            for (var i = 0; i < obj.length; i++) {
                $('.machine-market .machine-list').append(
                    '<li name='+obj[i].id+'>'+
                    '<div class="machine-img"><img src="'+obj[i].url+'" alt=""></div>'+
                    '<div class="desc">'+
                    '<p class="machine-level">'+obj[i].name+'</p>'+
                    '<p><span>壽命 ： '+obj[i].life+'小时</span><span>算力 ： '+obj[i].power+'</span></p>'+
                    '<p>價錢 ： BRC <span>'+obj[i].price+'</span><span>产能 ： '+obj[i].produce+'</span></p>'+
                    '<p>數量 ： <img class="reduce" src="../images/left_arrow.png" alt=""><input disabled class="count" type="text" value="0"><img class="add" src="../images/right_arrow.png" alt=""></p>'+
                    '</div>'+
                    '</li>'
                );
            }
            $('.reduce').css({'width':'0.52rem','vertical-align':'top'});
            $('.add').css({'width':'0.52rem','vertical-align':'top'});
            var number = 0;
            $('.machine-market .machine-list').on('click','.reduce',function () {
                number = parseInt($(this).parent().find('input').val())-1;
                if(number < 0){
                    number = 0;
                }else{
                    totalPrice-=parseInt($(this).parent().parent().find('p:nth-child(3) span').text());
                }
                $(this).parent().find('input').val(number);
                $('.machine-market .total-calc span:first-child').html('總價 ：'+totalPrice);
            });
            $('.machine-market .machine-list').on('click','.add',function () {
                totalPrice+=parseInt($(this).parent().parent().find('p:nth-child(3) span').text());
                number = parseInt($(this).parent().find('input').val())+1;
                $(this).parent().find('input').val(number);
                $('.machine-market .total-calc span:first-child').html('總價 ：'+totalPrice);
            });
        },
        fail:function (err) {
            console.log(err);
        }
    });
    //我的矿机
    $.ajax({
        type:'get',
        url:'/io/?c=device_act&a=owner',
        success:function (result) {
            var obj = JSON.parse(result);
            var totalPower = 0;
            if(obj.success){
                for (var i = 0; i < obj.info.length; i++) {
                    $('.mymachine .machine-list').append(
                        '<li>'+
                        '<div class="machine-img"><img src="'+obj.info[i].url+'" alt=""></div>'+
                        '<div class="desc">'+
                        '<p class="machine-level">'+obj.info[i].name+'</p>'+
                        '<p><span>壽命 ： '+obj.info[i].life+'小时</span><span>算力 ： '+obj.info[i].power+'</span></p>'+
                        '<p><span>礦機編號 ： '+obj.info[i].sn+'</span><span>产能 ：'+obj.info[i].produce+'</span></p>'+
                        '<p>礦機狀態 ： '+obj.info[i].status+'</p>'+
                        '</div>'+
                        '</li>'
                    );
                    totalPower+=parseFloat(obj.info[i].power);
                }
            }
            $('.mymachine .total-calc span').html(totalPower.toFixed(2));
        },
        fail:function (err) {
            console.log(err)
        }
    });
    //确认购买
    $('.confirm').on('click',function () {
        var data = [];
        var lis = document.querySelectorAll('.machine-market .machine-list li');
        for (var i = 0; i < lis.length; i++) {
            if($(lis[i]).find('input').val() != 0){
                data.push({id:$(lis[i]).attr('name'),name:$(lis[i]).find('.machine-level').text(),num:$(lis[i]).find('input').val()});
            }
        }
		var jsonstr = $.toJSON(data);
        $.ajax({
            type:'post',
            url:'/io/?c=device_act&a=buy',
            data: jsonstr,
			dataType: "json",
            success:function (result) {
                //var obj = JSON.parse(result);
				var obj = result;

				if(!obj.success){
                    $('.machine-market .total-calc span:first-child').html(obj.cause);
                    $('.machine-market .total-calc span:first-child').css('color','red');
                    setTimeout(function () {
                        // $('.machine-market .total-calc span:first-child').css('color','#67ffc0');
                        window.location.href = './account.html'
                    },2000)
                }else{
				    window.location.href = './order.html?price='+totalPrice+'&order='+obj.order+'&display='+obj.display
                }
            }
        })
    })
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
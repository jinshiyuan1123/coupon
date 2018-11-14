/**
 * Created by camiez on 2018/4/15.
 */
$(function () {
    //创建商会
    $('.creat-commerce span').on('click',function (e) {
        // window.location.href = './call.html';
        $.ajax({
            type:'post',
            url:'/io/?c=useraction&a=create_mgroup',
            data:{groupname:$(".creat-commerce input").val()},
            success:function (result) {
                var obj = JSON.parse(result);
                if(obj.success){
                    window.location.href = './call.html'
                }
                else{
					$('.tips p').html(obj.cause);
					$('.tips p').fadeIn(500);
					setTimeout(function () {
						$('.tips p').fadeOut(500);
					},2000)
                }
            }
        })
    })
    $('.creat-commerce input').on('focus',function () {
        $('.tab').css('position','relative');
        $('.earth').css('position','relative');
    })
    $('.creat-commerce input').on('blur',function () {
        $('.tab').css('position','fixed');
        $('.earth').css('position','fixed');
    })
    $('.join-to-commerce input').on('focus',function () {
        $('.tab').css('position','relative');
        $('.earth').css('position','relative');
    })
    $('.join-to-commerce input').on('blur',function () {
        $('.tab').css('position','fixed');
        $('.earth').css('position','fixed');
    })
    //加入商会
    $('.join-to-commerce span').on('click',function (e) {
        $.ajax({
            type:'post',
            url:'/io/?c=useraction&a=join_mgroup',
            data:{username:$('.join-to-commerce input').val()},
            success:function (result) {
                var obj = JSON.parse(result);
                if(obj.success){
                    window.location.href = './myCommerce.html'
                }else{
                    $('.tips p').html(obj.cause);
                    $('.tips p').fadeIn(500);
                    setTimeout(function () {
                        $('.tips p').fadeOut(500);
                    },2000)
                }
            }
        })
    })
    //上一页
    $('.tab .prepage').on('click',function () {
        history.go(-1)
    })
    //首页
    $('.tab .toindex').on('click',function () {
        window.location.href = './index.html'
    })
    $('.tab .back').on('click',function () {
        window.location.href = './infoCenter.html'
    })
})
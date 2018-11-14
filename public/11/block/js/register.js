/**
 * Created by camiez on 2018/4/17.
 */
$(function () {
    $('.register_btn').on('click',function (e) {
        if($('.password input').val() == $('.password-confirm input').val()){
            $.ajax({
                type:'get',
                url:'/io/?c=useraction&a=register',
                data:{
                    "username":$('.account input').val(),
                    "password":$('.password input').val()
                },
                success:function (result) {
                    var obj = JSON.parse(result);
                    if(obj.success){
                        window.location.href = './login.html'
                    }else{
                        $('.tips p').html(obj.cause);
                        $('.tips p').fadeIn(500);
                        setTimeout(function () {
                            $('.tips p').fadeOut(500);
                        },2000)
                    }
                }
            })
        }else{
            $('.tips p').html('两次密码输入不一致');
            $('.tips p').fadeIn(500);
            setTimeout(function () {
                $('.tips p').fadeOut(500);
            },2000)
        }
    })
})
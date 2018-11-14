/**
 * Created by camiez on 2018/4/15.
 */
$(function () {
    $('body').height($(window).height());
    // //适应iphone4和ipad
    // if(document.body.clientHeight < 500 || document.body.clientHeight > 1000){
    //     $('.login-form').css('padding','3.4rem 0.86rem 0');
    // }
    $.ajax({
        type:'get',
        url:'/io/?c=useraction&a=info',
        success:function (result) {
            var obj = JSON.parse(result);
            if(obj.success){
                window.location.href = './machine.html';
            }
        }
    })
    //记住我
    $('.remember-me span:first-child').on('click',function (e) {
        $(this).toggleClass('active');
    })
    //提交信息事件
    $('.submit').on('click',function () {
        enterSonTask();
    });
    //enter提交信息
    $('.login-form .account form').on('submit',function () {
        enterSonTask();
        return false;
    });
    //enter提交信息
    $('.login-form .password form').on('submit',function () {
        enterSonTask();
        return false;
    });
    //提交信息
    function enterSonTask() {
        var account = $('.account input').val();
        var password = $('.password input').val();
        $.ajax({
            type:'post',
            url:'/io/?c=useraction&a=login',
            data:{
                username:account,
                password:password
            },
            success:function (result) {
                console.log(result)
                if(JSON.parse(result).success){
                    sessionStorage.setItem('token',JSON.parse(result).token);
                    window.location.href = './machine.html'
                }else{
                    $('.login .tips p').fadeIn(500);
                    setTimeout(function () {
                        $('.login .tips p').fadeOut(500);
                    },2000)
                }
            },
            fail:function (err) {
                console.log(err)
            }
        })
    }
})
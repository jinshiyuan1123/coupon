/**
 * Created by camiez on 2018/4/15.
 */
$(function () {
    //请求用户信息
    $.ajax({
        type:'get',
        url:'/io/?c=useraction&a=info',
        success:function (result) {
            var obj = JSON.parse(result);
            if(obj.success){
                $('.nickname input').val(obj.info.username);
                $('.phone input').val(obj.info.phone);
                $('.name input').val(obj.info.fullname);
                $('.person-ID input').val(obj.info.idcard);
                $('.bank input').val(obj.info.bankname);
                $('.bank-number input').val(obj.info.bankcard);
                $('.alipay input').val(obj.info.alipay);
                $('.wechat input').val(obj.info.wechat);
            }else{
                window.location.href = './login.html'
            }
        },
        fail:function (err) {
            console.log(err)
        }
    });
    //得到焦点
    $('.account-form').on('focus','input',function (e) {
        $('.account>.tab').css('position','static');
    });
    //失去焦点
    $('.account-form').on('blur','input',function (e) {
        $('.account>.tab').css('position','fixed');
    })
    //资料更新
    $('.updateInfo').on('click',function () {
        var formData = new FormData();
        if(document.querySelector('.photo input').files[0]){
            formData.append('photo',document.querySelector('.photo input').files[0]);
        }
        formData.append('phone',$('.phone input').val());
        formData.append('oldpass',$('.oldpass input').val());
        formData.append('newpass',$('.newpass input').val());
        formData.append('confirmpass',$('.confirmpass input').val());
        formData.append('fullname',$('.name input').val());
        formData.append('idcard',$('.person-ID input').val());
        formData.append('bankname',$('.bank input').val());
        formData.append('bankcard',$('.bank-number input').val());
        formData.append('alipay',$('.alipay input').val());
        formData.append('wechat',$('.wechat input').val());
        console.log(formData);
        $.ajax({
            type:'post',
            url:'/io/?c=useraction&a=saveinfo',
            // data:{
            //     "phone":$('.phone input').val(),
            //     "fullname":$('.name input').val(),
            //     "idcard":$('.person-ID input').val(),
            //     "bankname":$('.bank input').val(),
            //     "bankcard":$('.bank-number input').val(),
            //     "alipay":$('.alipay input').val(),
            //     "wechat":$('.wechat input').val(),
            // },
            data:formData,
            contentType: false,
            processData: false,
            success:function (result) {
                var obj = JSON.parse(result);
                $('.updateInfo').html(obj.cause);
                setTimeout(function () {
                    $('.updateInfo').html('資料更新');
                },3000)
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
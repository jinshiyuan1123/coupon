/**
 * Created by camiez on 2018/4/15.
 */
$(function () {
    var lis = document.querySelectorAll('.navigation ul li');
    var width = $(lis[0]).width();
    for (var i = 0; i < lis.length; i++) {
        $(lis[i]).height((width-(parseFloat($('html').css('fontSize')))*0.2).toFixed(0));
    }
    //每五分钟获取一次信息
    setInterval(function () {
        getInfo();
    },300000);
    //获取金币
    function getInfo() {
        $.ajax({
            type:'get',
            url:'/io/?c=useraction&a=info',
            success:function (result) {
                var obj = JSON.parse(result);
                if(obj.success){
                    $('.coins .available .number').html(obj.available_coin);
                    $('.coins .freeze p').html('鎖定中BRC：'+obj.freeze_coin);
                    var html = '';
                    for (var i = 0; i < obj.message.length; i++) {
                        html += '<span style="margin-right: 20px;">'+obj.message[i]+'</span>'
                    }
                    $('.index .type>div>p').html(html);
                    speed();
                    //判断是否已有商会
                    $('.navigation .commerce').on('click',function (e) {
                        if(obj.mgroup){
                            window.location.href = './myCommerce.html'
                        }else{
                            window.location.href = './commerce.html'
                        }
                    })
                }else{
                    window.location.href = './login.html'
                }
            }
        });
    };
    getInfo();
    //获取p的宽度，设置速度
    function speed() {
        var width = $('.type div').width();
        if(width <= $(window).width()){
            $('.type div').width($(window).width())
            time = 4;
        }else{
            var time = width/110;
        }
        $('.index>.type>div>p').css('animation','round '+time+'s linear infinite');
    }
    //登出
    $('.history').on('click',function () {
        $.ajax({
            type:'get',
            url:'/io/?c=useraction&a=logout',
            success:function (result) {
                var obj = JSON.parse(result);
                if(obj.success){
                    window.location.href = './login.html'
                }
            }
        })
    })
    //矿机中心
    $('.tab .prepage').on('click',function () {
        window.location.href = './machine.html'
    });
    //首页
    $('.tab .toindex').on('click',function () {
        window.location.href = './index.html'
    })
    //信息中心
    $('.tab .back').on('click',function () {
        window.location.href = './infoCenter.html'
    })
})
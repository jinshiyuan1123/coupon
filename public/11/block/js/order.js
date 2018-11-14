/**
 * Created by camiez on 2018/5/3.
 */
$(function () {
    var arr = window.location.search.replace('?','').split('&');
    var price = arr[0].split('=')[1];
    var order = arr[1].split('=')[1];
    var display = decodeURIComponent(arr[2].split('=')[1]);

    $('.price span').html(price);
    $('.order-num span').html(order);
    $.ajax({
        type:'get',
        url:'/io/?c=useraction&a=info',
        success:function (result) {
            var obj = JSON.parse(result);
            if(obj.success){
                if(obj.available_coin > price){
                    $('.price').html(display);
                    $('.price').css('display','block');

                }else{
                    $('.contact').html(display);
                    $('.contact').css('display','block');
                }
            }else{
                window.location.href = './login.html'
            }
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
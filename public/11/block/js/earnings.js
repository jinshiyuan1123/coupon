/**
 * Created by camiez on 2018/4/16.
 */
$(function () {
    //获取我的收益明细
    $.ajax({
        type:"get",
        url:"/io/?c=device_act&a=money",
        success:function (result) {
            var obj = JSON.parse(result);
            if(obj.success){
                var str = '+';
                for (var i = 0; i < obj.info.length; i++) {
                    if(obj.info[i].sum_money > 0){
                        str = '+';
                    }else{
                        str = '';
                    }
                    $('.detail tbody').append(
                        '<tr>'+
                        '<td>'+obj.info[i].hours+'</td>'+
                        '<td>'+str+obj.info[i].sum_money+'幣</td>'+
                        '<td>'+obj.info[i].source+'</td>'+
                        '</tr>'
                    )
                };
                $('.earnings .total-calc>p span').html(obj.power)
            }
        },
        fail:function (err) {
            console.log(err)
        }
    });
    $('.gif').on('load',function () {
        $('.static').css('display','none');
        $('.gif').css('display','inline-block');
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
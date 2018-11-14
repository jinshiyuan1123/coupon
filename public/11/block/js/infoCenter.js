/**
 * Created by camiez on 2018/4/30.
 */
$(function () {
    //获取信息中心
    $.ajax({
        type:'get',
        url:'/io/?c=useraction&a=message',
        dataType:'json',
        success:function (result) {
            var obj = result;
            console.log(obj);
            if(obj.success){
                for (var i = 0; i < obj.info.length; i++) {
                    $('.info-list').append(
                        '<li>'+
                        '<div class="date">'+
                        '<p>'+obj.info[i].day+'</p>'+
                        '<p>'+obj.info[i].time+'</p>'+
                        '</div>'+
                        '<div class="desc">'+
                        ' <p>'+obj.info[i].content+'</p>'+
                        '</div>'+
                        '</li>'
                    )
                }
            }else{
                $('.infoCenter .nodata').css('display','block')
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
    })
    $('.tab .back').on('click',function () {
        window.location.href = './infoCenter.html'
    })
})
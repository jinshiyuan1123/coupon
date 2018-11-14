/**
 * Created by camiez on 2018/4/17.
 */
$(function () {
    //获取商会信息
    $.ajax({
        type:'get',
        url:'/io/?c=useraction&a=my_mgroup',
        success:function (result) {
            var obj = JSON.parse(result);
            if(obj.success){
                if(obj.info.state == '申請中'){
                    $('.join-to-commerce p').html('創建聯盟已申請，請聯絡客服批准');
                    $('.join-to-commerce p').css('display','block');
                }else if(obj.info.state == '拒絕'){
                    $('.join-to-commerce p').html('創建聯盟已被拒絕，請聯絡客服批准');
                    $('.join-to-commerce p').css('display','block');
                }else{
                    $('.join-to-commerce input').css('display','block');
                    $('.join-to-commerce span').css('display','block');
                }
                    $('.commerce-title').html(obj.info.groupname);
                    $('.commerce-info .ranking span').html(obj.info.rank);
                    $('.commerce-info .total-cal span').html(obj.info.power);
                    $('.commerce-info .chairman span').html(obj.info.leader);
                    $('.commerce-info .number-of-person span').html(obj.info.members);
                    for (var i = 0; i < obj.info.invite.length; i++) {
                        $('.member').append(
                            '<li>'+obj.info.invite[i].username+' : 推廣人數 :  '+obj.info.invite[i].invite+'個 </li>'
                        )
                    }

            }
        },
        fail:function () {
            
        }
    });
    //
    $('.join-to-commerce input').on('focus',function () {
        // alert('aaa');
        $('.tab').css({'position':'relative','bottom':'-3rem'});
        $('.commerce-info').css({'position':'relative','bottom':'-3rem'});
    })
    $('.join-to-commerce input').on('blur',function () {
        $('.tab').css({'position':'fixed','bottom':'0'});
        $('.commerce-info').css({'position':'fixed','bottom':'1.4rem'});
    })
    //推荐入会
    $('.join-to-commerce span').on('click',function () {
        $.ajax({
            type:'post',
            url:'/io/?c=useraction&a=invite_mgroup',
            data:{username:$('.join-to-commerce input').val()},
            success:function (result) {
                var obj = JSON.parse(result);
                if(obj.success){
                    $('.tips p').html(obj.info);
                    $('.tips p').fadeIn(500);
                    setTimeout(function () {
                        $('.tips p').fadeOut(500);
                    },2000)
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
})
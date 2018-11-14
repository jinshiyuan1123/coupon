/**
 * Created by camiez on 2018/5/3.
 */
$(function () {
    $.ajax({
        type:'get',
        url:'/io/?c=useraction&a=info',
        success:function (result) {
            var obj = JSON.parse(result);
            if(obj.success){
                setTimeout(function () {
                    window.location.href = './index.html';
                },3000)
            }else{
                setTimeout(function () {
                    window.location.href = './login.html';
                },3000)
            }
        }
    })
})
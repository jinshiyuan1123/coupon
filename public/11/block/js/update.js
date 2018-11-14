/**
 * Created by camiez on 2018/4/17.
 */
$(function () {
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
    })
})
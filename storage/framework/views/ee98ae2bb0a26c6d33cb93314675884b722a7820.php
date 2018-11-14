<?php $__env->startSection('content'); ?>
    
	<style type="text/css">
		.normal{
		  margin:10px auto;
		  background-image: url(<?php echo e($business['Businessheadpic']); ?>);
		  background-position:center center;
		  width: 100px;
		  height: 100px;
		  border-radius: 50%;
		  background-size: 100px 100px;
		  background-repeat: no-repeat;
		  background-position-y: 9%;
		}
		.inputb{
			width:100%;line-height:35px;padding:5px;font-size:16px
		}
	</style>
    <div class="m_container">
        <div class="m_body">
            <div class="container-fluid gm_main">
                <div class="m_member-title clear textCenter">
                    <a class="pull-left" href="javascript:history.go(-1);">&nbsp;返回</a>
                    优惠券使用
                </div>
                <div class="m_userCenter-line"></div>
                <div class="userInfo setCard" style="width:95%;margin:25px auto;" align="center">
				<div class="nichen"><strong><?php echo e($business['Businessname']); ?></strong></div>
				  <div class="inputb">
				  消费总额&nbsp;
				  <input id="allmoney" style="border-bottom: 1px solid #e3e3e3;width:25%;padding:10px;" type="text"  name="allmoney" style="margin-left:10px;width: 50%;border: 1px solid #e0dfdf;" value="">
				  &nbsp;元
				  </div>
                  <div class="inputb">优惠券：满<?php echo e($data['term']); ?>元减<?php echo e($data['decrease']); ?>元</div>
                  <div class="inputb">优惠后金额&nbsp;
				  <span class="money" style="border-bottom: 1px solid #e3e3e3;width:25%;padding-left:20px;padding-right:20px;">0</span>
				  &nbsp;元</div>
				  <div class="inputb">积分抵扣&nbsp;
				  <input id="score" style="border-bottom: 1px solid #e3e3e3;width:25%;padding:10px;" type="text"  name="score" style="margin-left:10px;width: 50%;border: 1px solid #e0dfdf;" value="0">
				  &nbsp;</div>
				  <div class="inputb">支付金额</div>
				  <div class="inputb"><a href="" onclick="aaa()"><div class="submit_btn" style="text-align:center">确认支付</div></a></div>
				  <div class="inputb">支付后获得积分：<span id="getscore">0</span>&nbsp;积分</div>
                </div>
            </div>
        </div>
    </div>
<script type="text/javascript"> 
function aaa(){
	alert("支付通道失败");
}
//循环执行，每隔3秒钟执行一次showalert（） 
window.setInterval(showalert, 500); 
function showalert() 
{ 
//alert("aaa"); 
  var allmoney=$('#allmoney').val();
  var money=0;
  //var score=$('#score').innerHTML;
  var score=$('#score').val();
      score=parseFloat(score);
      allmoney=parseFloat(allmoney);
	  if(allmoney>=<?php echo e($data['term']); ?>){
		  money=allmoney-<?php echo e($data['decrease']); ?>;
	  }
	  money=money-(score*<?php echo e($sys['outscorescale']); ?>);
	  getscore=money*<?php echo e($sys['inscorescale']); ?>;
	  $('.money').html(money);
	  
	  $('#getscore').html(getscore);
} 

</script> 	
    <script type="text/javascript" src="<?php echo e(asset('/wap/js/laydate.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('/wap/js/clipboard.min.js')); ?>"></script>
    <script>
        var clipboard = new Clipboard('.btn');

        clipboard.on('success', function (e) {
            console.info('Action:', e.action);
            console.info('Text:', e.text);
            console.info('Trigger:', e.trigger);

            e.clearSelection();
        });

        clipboard.on('error', function (e) {
            console.error('Action:', e.action);
            console.error('Trigger:', e.trigger);
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('wap.layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('wap.layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->startSection('content'); ?>
    

    <div class="m_container">
        <div class="m_body">
            <div class="container-fluid gm_main">
                <div class="m_member-title clear textCenter">
                    <a class="pull-left" href="javascript:history.go(-1);">&nbsp;返回</a>
                    商家中心
                </div>
                <div class="m_userCenter-line"></div>
<!--商家中心-->				
 <?php if($_member->is_daili == 1): ?>
<script src='http://www.ichartjs.com/ichart.latest.min.js'></script>	
<script type='text/javascript'>
$(function(){
      var chart = iChart.create({
            render:"ichart-render",
            width:300,
            height:400,
            background_color:"#fdfdfd",
            gradient:false,
            color_factor:0.2,
            border:{
                  color:"#3e1c3e",
                  width:1
            },
            align:"center",
            offsetx:0,
            offsety:-10,
            sub_option:{
                  border:{
                        color:"#666791",
                        width:1
                  },
                  label:{
                        fontweight:600,
                        fontsize:11,
                        color:"#4572a7",
                        sign:"square",
                        sign_size:20,
                        border:{
                              color:"#BCBCBC",
                              width:0
                        },
                        background_color:"rgba(244,244,244,0)"
                  }
            },
            shadow:true,
            shadow_color:"#666666",
            shadow_blur:5,
            showpercent:false,
            column_width:"70%",
            bar_height:"70%",
            radius:"90%",
            title:{
                  text:"优惠券收入统计",
                  color:"#3e576f",
                  fontsize:16,
                  font:"微软雅黑",
                  textAlign:"center",
                  height:25,
                  offsetx:0,
                  offsety:0
            },
            subtitle:{
                  text:"单位:元",
                  color:"#3e576f",
                  fontsize:12,
                  font:"微软雅黑",
                  textAlign:"center",
                  height:24,
                  offsetx:0,
                  offsety:0
            },
            footnote:{
                  text:"",
                  color:"#c0c0c0",
                  fontsize:12,
                  font:"微软雅黑",
                  textAlign:"right",
                  height:0,
                  offsetx:0,
                  offsety:0
            },
            legend:{
                  enable:false,
                  background_color:"#fefefe",
                  color:"#333333",
                  fontsize:12,
                  border:{
                        color:"#BCBCBC",
                        width:1
                  },
                  column:1,
                  align:"right",
                  valign:"center",
                  offsetx:0,
                  offsety:0
            },
            coordinate:{
                  width:"88%",
                  height:"80%",
                  background_color:"rgba(246,246,246,0.1)",
                  axis:{
                        color:"#666791",
                        width:["","",2,""]
                  },
                  grid_color:"#c0c0c0",
                  label:{
                        fontweight:500,
                        color:"#666666",
                        fontsize:11
                  }
            },
            label:{
                  fontweight:500,
                  color:"#666666",
                  fontsize:11
            },
            type:"column2d",
            data:[
                  {
                  name:"4月",
                  value:0,
                  color:"rgba(130,127,191,0.8)"
            },{
                  name:"5月",
                  value:0,
                  color:"rgba(130,127,191,0.8)"
            },{
                  name:"6月",
                  value:0,
                  color:"rgba(130,127,191,0.8)"
            },{
                  name:"7月",
                  value:0,
                  color:"rgba(228,190,77,0.8)"
            },{
                  name:"8月",
                  value:0,
                  color:"rgba(145,170,81,0.8)"
            },{
                  name:"9月",
                  value:0,
                  color:"rgba(161,69,69,0.8)"
            }
            ]
      });
      chart.draw();
});
</script>	
	<style type="text/css">
		.normal{
		  margin:10px auto;
		  background-image: url(<?php echo e($_member->Businessheadpic); ?>);
		  background-position:center center;
		  width: 100px;
		  height: 100px;
		  border-radius: 50%;
		  background-size: 100px 100px;
		  background-repeat: no-repeat;
		  background-position-y: 9%;
		}
		.set{
			width:50px;
			float:left;
			line-height:20px;
			margin-left:10px;
			margin-top:10px;
			padding:5px;
			text-align:center;
			background-color:#efefef;
			border: 1px solid #e0dfdf;
		}
		.outmoney{
			width:50px;
			line-height:18px;
			padding:5px;
			text-align:center;
			background-color:#efefef;
			border: 1px solid #e0dfdf;
		}		
	</style>
                <a href="<?php echo e(route('wap.set')); ?>" style="color:#afafaf"><div class="set">设置 </div>	</a>
                <a href="<?php echo e(route('wap.Businessupload')); ?>" class="c_blue"><div class="normal"></div></a>
				<div class="nichen">
                                    <?php echo e($_member->Businessname); ?>

				</div>	
				<div class="nichen" style="margin-top:10px;">
                      今日收入：<?php echo e($todaymoney); ?>

				</div>					
				<a href="<?php echo e(route('wap.draw')); ?>"><div class="nichen" style="margin-top:10px;">
                      余额：<?php echo e($_member->money); ?>

				</div>	</a>
<!--商家管理菜单-->
<div class="Business_nav">
<ul><a href="<?php echo e(route('wap.card')); ?>"><li>优惠券</li></a><a href="<?php echo e(route('wap.member_offline_recharge')); ?>"><li>账单</li></a><a href="<?php echo e(route('wap.ad')); ?>"><li>广告</li></a></ul>
</div>
<?php else: ?>
	 <div class="userInfo dy_center" style="width:95%;margin:20px auto;text-align:center"  >
                                    <?php
                                    $apply = '';
                                    if (count($_member->daili_apply) > 0)
                                        $apply = $_member->daili_apply()->orderBy('created_at', 'desc')->first();
                                    ?>
                                    <?php if($apply && $apply->status == 0): ?>
                                        <span style="color: red;">您的商家资格审批中</span>
                                    <?php elseif($apply && $apply->status == 2): ?>
                                        <span style="color: red;">申请失败</span>
                                        <a href="<?php echo e(route('wap.agent_apply')); ?>" class="submit_btn text-center">重新申请</a>
                                    <?php else: ?>
                                        <span style="color: red;">您还不是商家</span>
                                        <a href="<?php echo e(route('wap.agent_apply')); ?>" class="submit_btn text-center">立即申请</a>
                                    <?php endif; ?> 
    </div>
<?php endif; ?>
<!--商家认证-->	
<div id='ichart-render'></div>			
				

            </div>
        </div>
    </div>
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
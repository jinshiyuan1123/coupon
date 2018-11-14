<?php $__env->startSection('content'); ?>
    

    <div class="m_container">
        <div class="m_body">
            <div class="container-fluid gm_main">
                <div class="m_member-title clear textCenter">
                    <a class="pull-left" href="javascript:history.go(-1);">&nbsp;返回</a>
                    商家设置
                </div>
                <div class="m_userCenter-line"></div>
<div id='ichart-render'></div>			
				
                <div class="userInfo setCard" >
				<form action="<?php echo e(route('wap.postset')); ?>" method="post" name="form1">
                    <dl style="margin-top: 10px" class="dy_center_info">
                        <dd>
                            <div class="pull-left">
                                店主
                            </div>
                            <div class="pull-left" style="margin-left:10px;">
								 <?php echo e($_member->real_name); ?>

                            </div>
                        </dd>					
                        <dd>
                            <div class="pull-left">
                                名称
                            </div>
                            <input id="Businessname" class="pull-left" type="tel" placeholder="输入名称" name="Businessname" style="margin-left:10px;width: 50%;border: 1px solid #e0dfdf;" value=" <?php echo e($_member->Businessname); ?>">
                        </dd>						
                        <dd>
                            <div class="pull-left">
                                地址
                            </div>
								 <input id="Businessaddress" class="pull-left" type="tel" placeholder="输入地址" name="Businessaddress" style="margin-left:10px;width: 50%;border: 1px solid #e0dfdf;" value=" <?php echo e($_member->Businessaddress); ?>">
                        </dd>
                        <dd>
                            <div class="pull-left">电话</div>
							<input id="Businessphone" class="pull-left" type="tel" placeholder="输入地址" name="Businessphone" style="margin-left:10px;width: 50%;border: 1px solid #e0dfdf;" value=" <?php echo e($_member->Businessphone); ?>">
                        </dd>
                        <dd>
                            <div class="pull-left">银行账户</div>
                            <div class="pull-right">

                                    <a href="<?php echo e(route('wap.bind_bank')); ?>" class="c_blue">                                
									<?php if($_member->bank_card): ?>
                                    <?php echo e($_member->bank_card); ?>

                                    <?php else: ?>
										未设置 
									<?php endif; ?>
									</a>
                               
                            </div>
                        </dd>						
                        <dd>
                            <div class="pull-left">
                                介绍
                            </div>
                               <textarea id="Businesscontent" name="Businesscontent" rows="3" maxlength="200" onchange="this.value=this.value.substring(0, 200)" onkeydown="this.value=this.value.substring(0, 200)" onkeyup="this.value=this.value.substring(0, 200)" placeholder="简单介绍"><?php echo e($_member->Businesscontent); ?></textarea>								
                        </dd>
						<dd>
                                <input type="button" value="确定" class="submit_btn  ajax-submit-btn">
                        </dd>
                    </dl>
                   </form>
                </div>
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
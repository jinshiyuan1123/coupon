<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title><?php echo e(isset($_system_config->site_title) ? $_system_config->site_title : 'motoo'); ?></title>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta name="keywords" content="<?php echo e($_system_config->keyword); ?>">
	<meta name="keywords" content="<?php echo e($_system_config->description); ?>">
	    <link rel="alternate" media="only screen and (max-width: 640px)" href="/m">
		<meta name="mobile-agent" content="format=html5; url=/m">
		<meta http-equiv="Cache-Control" content="no-transform" />
		<link rel="shortcut icon" href="favicon.ico" />
		<link rel="stylesheet" href="<?php echo e(asset('/web/css/portal.base.min.css?v=1535436384237752')); ?>" type="text/css"/>
		<!--[if IE 6]>
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo e(asset('/web/css/ie6.css?v=1535436384237752')); ?>"/>
		<![endif]-->
		<!--[if IE 7]>
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo e(asset('/web/css/ie7.css?v=1535436384237752')); ?>"/>
		<![endif]-->
		<!--[if IE 8]>
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo e(asset('/web/css/ie8.css?v=1535436384237752')); ?>"/>
		<![endif]-->

		<script  type="text/javascript">
			$GF = [];
			GreenLine = {};
			//打点日志全局变量
			GreenLine.Log = {
			
			}
			// 老的埋点，后面统一删除HTML上的埋点
			function _smartlog(link,mod){return true;};
			// 老的浏览器兼容H5标签
			(function () {if (/MSIE [6-8]/.test(navigator.userAgent.toUpperCase())) {var tags = "header,footer,section,article,aside,details,summary,figure,figcaption,nav,menu".split(",");document.write("<style>" + tags.toString() + "{display:block}</style>");for (var i = 0; i < tags.length; document.createElement(tags[i]), i++);}})();
			// 图片加载失败,error设置默认图片也加载失败避免死循环
			window.NoFind = function(src) {
				var img = event.srcElement;
				img.src = src;
				img.onerror = null;
			};
		</script>
		<link rel="stylesheet" href="<?php echo e(asset('/web/css/index.css?v=1535436384237752')); ?>" type="text/css"/>	
	
</head>
<body>
<div id="g-wrapper" class="g-wrapper g-page-1200 landing-wrapper"> 
<div id="gh">
<?php echo $__env->make('web.layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php echo $__env->yieldContent('content'); ?>
<?php echo $__env->make('web.layouts.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</div>
</div>
<?php echo $__env->yieldContent('after.js'); ?>

</body>
</html>
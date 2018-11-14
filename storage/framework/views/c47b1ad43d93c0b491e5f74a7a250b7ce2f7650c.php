<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo e(isset($page_title) ? $page_title : "管理后台"); ?></title>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="<?php echo e(asset('/node_modules/admin-lte/bootstrap/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('/backstage/css/admin.css')); ?>">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <script src="<?php echo e(asset('/node_modules/admin-lte/plugins/jQuery/jquery-2.2.3.min.js')); ?>"></script>
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <?php echo $__env->yieldContent('after.css'); ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
        <!-- Content Header (Page header) -->
        <?php echo $__env->yieldContent('content'); ?>
</div>
<!-- ./wrapper -->
<script src="<?php echo e(asset('/vendor/laydate/laydate.js')); ?>"></script>
<script src="<?php echo e(asset('/backstage/js/layer-date-default.js')); ?>"></script>
<?php echo $__env->yieldContent('after.js'); ?>
</body>
</html>

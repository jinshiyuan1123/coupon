<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->

        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">HEADER</li>
            <!-- Optionally, you can add icons to the links -->
            <li <?php if($active_route == 'admin.index'): ?> class="active" <?php endif; ?>><a href="<?php echo e(route('admin.index')); ?>"><i class="fa fa-dashboard"></i> <span>控制台</span></a></li>
            <?php $__currentLoopData = config('admin_menu'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($item['is_hide'] == 1): ?>
                    <li class="treeview">
                        <a <?php if($item['router']): ?> href="<?php echo e(route($item['router'])); ?>" <?php else: ?> href="#" <?php endif; ?>>
                            <i class="<?php echo e($item['icon']); ?>"></i>
                            <span><?php echo e($item['name']); ?></span>
                            <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>

                        <?php if(count($item['submenus']) > 0): ?>
                            <ul class="treeview-menu">
                                <?php $__currentLoopData = $item['submenus']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if(($_user->is_super_admin || in_array($v['router'], $_user_routers))): ?>
                                    <li <?php if($active_route == $v['router']): ?> class="active" <?php endif; ?>><a <?php if($v['router']): ?> href="<?php echo e(route($v['router'])); ?>" <?php else: ?> href="javascript:;" <?php endif; ?>><i class="fa fa-circle-o"></i> <?php echo e($v['title']); ?></a></li>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        <?php endif; ?>
                    </li>
                    <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
<script>
    $(function(){
        $('.treeview').each(function(e){
            var li_a_num = $(this).find('.active').length
            if (li_a_num > 0)
                $(this).addClass('active')
        })
		$("a.api").click(function(){
			var body=$("body").height();
			var apiurl=$(this).attr("href");
			var html="<iframe src='"+apiurl+"' style='width:100%;height:"+(body-200)+"px;border:0;overflow-x:hidden;'></iframe>"
			$("section.content").html(html);
			return false;
		})
    })
</script>
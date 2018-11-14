<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->

        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">HEADER</li>
            <!-- Optionally, you can add icons to the links -->
            <li @if($active_route == 'admin.index') class="active" @endif><a href="{{ route('admin.index') }}"><i class="fa fa-dashboard"></i> <span>控制台</span></a></li>
            @foreach(config('admin_menu') as $item)
                    @if ($item['is_hide'] == 1)
                    <li class="treeview">
                        <a @if($item['router']) href="{{ route($item['router']) }}" @else href="#" @endif>
                            <i class="{{ $item['icon'] }}"></i>
                            <span>{{ $item['name'] }}</span>
                            <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>

                        @if(count($item['submenus']) > 0)
                            <ul class="treeview-menu">
                                @foreach($item['submenus'] as $v)
                                    @if (($_user->is_super_admin || in_array($v['router'], $_user_routers)))
                                    <li @if($active_route == $v['router']) class="active" @endif><a @if($v['router']) href="{{ route($v['router']) }}" @else href="javascript:;" @endif><i class="fa fa-circle-o"></i> {{ $v['title'] }}</a></li>
                                    @endif
                                @endforeach
                            </ul>
                        @endif
                    </li>
                    @endif
            @endforeach



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
<div class="m_footer">
    <div class="m_container">
        <ul class="clear">
            <li <?php if(in_array($_wap_router, ['wap.index','wap.init'])): ?> class="active" <?php endif; ?>>
                <a href="<?php echo e(route('wap.index')); ?>">
                    <p class="m_footer-link-text">首页</p>
                </a>
            </li>
            <li <?php if($_wap_router=='wap.activity_list'): ?> class="active" <?php endif; ?>>
                <a href="<?php echo e(route('wap.activity_list')); ?>">
                    <p class="m_footer-link-text">我要免单</p>
                </a>
            </li>
            <li <?php if(in_array($_wap_router, ['wap.login','wap.nav'])): ?> class="active" <?php endif; ?>>
                <?php if(Auth::guard('member')->guest()): ?>
                    <a href="<?php echo e(route('wap.login')); ?>">
                        <p class="m_footer-link-text">我的</p>
                    </a>
                <?php else: ?>
                    <a href="<?php echo e(route('wap.nav')); ?>">
                        <p class="m_footer-link-text">我的</p>
                    </a>
                <?php endif; ?>
            </li>
        </ul>
    </div>
</div>
<div class="header-mobile col-lg-11 dis-flex align-items-center">
    <div class="header-burger col-lg-4" data-header-burger>
        <button class="header-burger_icon"></button>
    </div>
    <div class="col-lg-4">
        <div class="header-top_logo">
            <a href="/">
                <img src="<?php bloginfo('template_url') ?>/dist/img/logo.png">
            </a>
        </div>
    </div>
    <div class="header-mobile_profile col-lg-4">
        <a href="/"></a>
    </div>
</div>
<div class="header-mobile-nav">
    <?php wp_nav_menu([
        'theme_location'  => 'top',
        'container'       => 'ul',
        'menu_class'      => 'header-mobile-nav_list',
    ]); ?>
    <div class="header-mobile-nav_close" data-mobile-header-close></div>
</div>
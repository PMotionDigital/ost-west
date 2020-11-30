<?php 
    global $current_user;
    $cur_user_id = get_current_user_id();
    $user_image = get_field('фотография_пользователя', 'user_'. $cur_user_id );
    $user_info = get_userdata($cur_user_id);
?>
<div class="header-mobile col-lg-11 dis-flex align-items-center">
    <div class="header-burger col-lg-4" data-header-burger>
        <button class="header-burger_icon"></button>
    </div>
    <div class="col-lg-4 dis-flex justify-content-center">
        <div class="header-top_logo">
            <a href="/">
                <img src="<?php bloginfo('template_url') ?>/dist/img/logo.png">
            </a>
        </div>
    </div>
    
    <div class="header-mobile_profile col-lg-4">
        <?php if (is_user_logged_in()) {  ?>
        <a href="/profile" title="Личный кабинет">
            <div class="user-stat_pic">
                <?php 
                    if(get_field('аватар_пользователя', 'user_'. $current_user->ID )) {
                        $profile_image = get_field('аватар_пользователя', 'user_'. $current_user->ID );
                    } else {
                        $profile_image = get_template_directory_uri().'/src/img/placeholder-ava.jpg';
                    }
                ?>
                <img src="<?php echo $profile_image; ?>" alt="<?php echo $user_info->user_login; ?>">
            </div>
        </a>
        <?php } else { ?>
        <a href="/auth/" class="nav-meta_item-user"></a>
        <?php } ?>
        
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
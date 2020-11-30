<?php /* Template Name: Страница - вход/регистрация */ get_header(); ?>
<?php if (!is_user_logged_in()) { ?>
<div class="page-default dis-flex justify-content-center">
    <div class="page-default_wrapper col-lg-11">
        <div class="section-title type-1 dis-none">
            <h1><?php the_title(); ?></h1>
        </div>
        <div class="page-default_content text-block">
            <div class="container--tabs">
                <div class="nav nav-tabs col-lg-4 col-lm-12 col-xs-12">
                    <div class="nav-tabs_item active">
                        <a href="#tab-1">Вход</a>
                    </div>
                    <div class="nav-tabs_item">
                        <a href="#tab-2">Регистрация</a>
                    </div>
                </div>
                <div class="tab-content col-lg-4 col-lm-12 col-xs-12">
                    <div id="tab-1" class="tab-pane active"> 
                        <?php get_template_part('templates/parts/modals/modal-login'); ?>
                    </div> 
                    <div id="tab-2" class="tab-pane">
                        <?php get_template_part('templates/parts/modals/modal-register'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="page-auth_bg">
        <img src="<?php bloginfo('template_url') ?>/dist/uploads/berlin_auth.jpg">
    </div>
</div>
<?php } else {
        wp_redirect( '/profile/' );
} ?>
<?php get_footer(); ?>
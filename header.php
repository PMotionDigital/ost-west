<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=yes">
        <?php wp_head(); ?>
    </head>
    <?php
    	if(wp_is_mobile()) {
    		$mobile = 'mobile';
        }
    ?>
<body <?php body_class(array($mobile)); ?>>
    <header class="main-header dis-flex flex-direction-col align-items-center">
        <div class="main-header_top header-top col-lg-11 dis-flex justify-content-between flex-wrap-wrap">
            <div class="header-top_logo col-lg-2">
                <a href="/">
                    <img src="<?php bloginfo('template_url') ?>/dist/img/logo.png">
                </a>
            </div>
            <div class="header-top_list socials-list">
                <div class="socials-list_item">
					<a href="#">
						<img src="/wp-content/themes/ostwest/dist/img/icons/youtube.svg" alt="youtube">
					</a>
				</div>
				<div class="socials-list_item">
					<a href="#">
						<img src="/wp-content/themes/ostwest/dist/img/icons/facebook.svg"  alt="facebook">
					</a>
				</div>
				<div class="socials-list_item">
					<a href="#">
						<img src="/wp-content/themes/ostwest/dist/img/icons/vk.svg" alt="vk">
					</a>
				</div>
				<div class="socials-list_item">
					<a href="#">
						<img src="/wp-content/themes/ostwest/dist/img/icons/odnoklassniki.svg" alt="odnoklassniki">
					</a>
				</div>
				<div class="socials-list_item">
					<a href="#">
						<img src="/wp-content/themes/ostwest/dist/img/icons/instagram.svg" alt="instagram">
					</a>
				</div>
            </div>
        </div>
        <div class="main-header_nav main-nav col-lg-12 dis-flex justify-content-center">
            <div class="col-lg-11 dis-flex align-items-center justify-content-between">
                <?php wp_nav_menu([
                    'theme_location'  => 'primary',
                    'container'       => 'ul',
                    'menu_class'      => 'main-nav_menu nav-menu',
                ]); ?>
                <div class="main-nav_meta nav-meta">
                    <div class="nav-meta_item-search">
                        <button data-search-button></button>
                    </div>
                    <a href="/profile/" class="nav-meta_item-user user-stat">
                        <?php 
                            get_template_part('templates/parts/header/header-user'); 
                        ?>
                    </a>
                </div>
            </div>
        </div>
    </header>

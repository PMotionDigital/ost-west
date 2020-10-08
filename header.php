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
                <a href="#">
                    <img src="<?php bloginfo('template_url') ?>/dist/img/logo.png">
                </a>
            </div>
            <div class="header-top_list socials-list">
                <div class="socials-list_item">
                    <a href="#"></a>
                </div>
                <div class="socials-list_item">
                    <a href="#"></a>
                </div>
                <div class="socials-list_item">
                    <a href="#"></a>
                </div>
                <div class="socials-list_item">
                    <a href="#"></a>
                </div>
                <div class="socials-list_item">
                    <a href="#"></a>
                </div>
            </div>
        </div>
        <div class="main-header_nav main-nav col-lg-12 dis-flex justify-content-center">
            <div class="col-lg-11 dis-flex align-items-center justify-content-between">
                <ul class="main-nav_menu nav-menu">
                    <li class="nav-menu_item">
                        <a href="#">Главная</a>
                    </li>
                    <li class="nav-menu_item">
                        <a href="#">Прямой эфир</a>
                    </li>
                    <li class="nav-menu_item">
                        <a href="/news-page">Новости</a>
                    </li>
                    <li class="nav-menu_item">
                        <a href="/templates/page-programms">Наши программы</a>
                    </li>
                </ul>
                <div class="main-nav_meta nav-meta">
                    <div class="nav-meta_item-search">
                        <button data-search-button></button>
                    </div>
                    <div class="nav-meta_item-user">
                        <button data-modal="login">Войти</button>
                    </div>
                </div>
            </div>
        </div>
    </header>

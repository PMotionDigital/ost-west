<?php

add_theme_support( 'post-thumbnails' );

register_nav_menus(array(
	'top'    => 'Top menu'
));

// settings site

if (function_exists('acf_add_options_page')) {

    $option_page = acf_add_options_page(
        array(
            'page_title' => 'Контактные данные',
            'menu_title' => 'Контактные данные',
            'menu_slug'  => 'contacts',
            'capability' => 'edit_posts',
            'redirect'   => false
        )
    );
    
}

// custom gutenberg blocks

add_action('acf/init', 'my_acf_init');
function my_acf_init() {
    
    // check function exists
    if( function_exists('acf_register_block') ) {
        
        // register a testimonial block
        acf_register_block(array(
            'name'              => 'Slider',
            'title'             => __('Slider'),
            'description'       => __('A custom slider block.'),
            'render_callback'   => 'my_acf_block_render_callback',
            'category'          => 'formatting',
            'icon'              => 'dashicons-products',
            'keywords'          => array( 'Slider', 'quote' ),
        ));
    }
}

function my_acf_block_render_callback( $block ) {
    
    // convert name ("acf/testimonial") into path friendly slug ("testimonial")
    $slug = str_replace('acf/', '', $block['name']);
    
    // include a template part from within the "template-parts/block" folder
    if( file_exists( get_theme_file_path("/template-parts/block/slider-block.php") ) ) {
        include( get_theme_file_path("/template-parts/block/slider-block.php") );
    }
}


// ajax load single product in loop

add_action('wp_ajax_load_video', 'get_single_video');
add_action('wp_ajax_nopriv_load_video', 'get_single_video');

function get_single_video(){
    get_template_part( 'templates/parts/part-post-video' );
    die();
}

// автообновление версии файлов

function enqueue_versioned_script( $handle, $src = false, $deps = array(), $in_footer = false ) {
    wp_enqueue_script( $handle, get_template_directory_uri() . $src, $deps, filemtime( get_template_directory() . $src ), $in_footer );
}

function enqueue_versioned_style( $handle, $src = false, $deps = array(), $media = 'all' ) {
    wp_enqueue_style( $handle, get_template_directory_uri() . $src, $deps = array(), filemtime( get_template_directory() . $src ), $media );
}

function themename_scripts() {
    enqueue_versioned_style( 'my-theme-style', $theme_uri.'/dist/css/style.bundle.css' );
    enqueue_versioned_script( 'my-theme-script', $theme_uri.'/dist/js/bundle.js', array( 'jquery'), true );
}
 
add_action( 'wp_enqueue_scripts', 'themename_scripts' );



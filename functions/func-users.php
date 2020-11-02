<?php

global $current_user;

// редирект, когда залогинтлись
add_action( 'admin_init', 'redirect_so_15396771' );

function redirect_so_15396771()
{   
    if ( defined( 'DOING_AJAX' ) && DOING_AJAX )  
        return;

    if ( !current_user_can('delete_users') ) {
        
        wp_redirect( site_url( '/profile/' ) );
        exit();
    }
}

// редирект, когда вышли
add_action('wp_logout','ps_redirect_after_logout');
function ps_redirect_after_logout(){
         wp_redirect( '/' );
         exit();
}

// remove dash panel

function disable_admin_bar() { 
    if ( current_user_can('subscriber') ) {
        add_filter('show_admin_bar', '__return_false'); 
    }
}      
add_action( 'after_setup_theme', 'disable_admin_bar' );

?>
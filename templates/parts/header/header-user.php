<?php 
    if (is_user_logged_in()) { 
    global $current_user;
    $cur_user_id = get_current_user_id();
    $user_image = get_field('фотография_пользователя', 'user_'. $cur_user_id );
    $user_info = get_userdata($cur_user_id);
?>
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
<div class="user-stat_name">
    <?php
        $myvalue = get_the_author_meta( 'first_name', $current_user->ID );
        $arr = explode(' ',trim($myvalue));
        
        echo $arr[0]; // will print Test  
    ?>
</div>
<?php } else { ?>
<button class="button" data-modal-btn="login">Войти</button>
<?php } ?>

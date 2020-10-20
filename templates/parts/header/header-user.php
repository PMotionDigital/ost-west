<?php 
    if (is_user_logged_in()) { 
    global $current_user;
    $cur_user_id = get_current_user_id();
    $user_image = get_field('фотография_пользователя', 'user_'. $cur_user_id );
    $user_info = get_userdata($cur_user_id);
?>
<div class="user-stat_pic">
    <img src="<?php echo get_field('аватар_пользователя', 'user_'. $current_user->ID ); ?>" alt="<?php echo $user_info->user_login; ?>">
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

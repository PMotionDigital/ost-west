<?php /* Template Name: Личный кабинет */
acf_form_head();
get_header();

global $current_user;
$cur_user_id = get_current_user_id();

if(get_field('аватар_пользователя', 'user_'. $current_user->ID )) {
    $profile_image = get_field('аватар_пользователя', 'user_'. $current_user->ID );
} else {
    $profile_image = get_template_directory_uri().'/src/img/placeholder-ava.jpg';
}

?>
<section class="user-profile page-default dis-flex justify-content-center">
    <?php if (is_user_logged_in()) { ?>
    <div class="user-profile_wrap user-info col-lg-11">
        <div class="user-info_data data-fields">
            <div class="section-title type-1">
                <h2>Профиль</h2>
                <?php if(wp_is_mobile()) { ?>
                <a href="<?php echo wp_logout_url(); ?>">Выйти</a>
                <?php } ?>
            </div>
            <form class="data-fields_form" id="data-fields_form" action="update_user_profile" method="post" enctype="multipart/form-data">
                <div class="data-fields_pic data-fields_wrap">
                    <div class="data-fields_pic-wrap">
                        <img src="<?php echo $profile_image; ?>" alt="<?php echo $user_info->user_login; ?>">
                    </div>
                    <div class="pic-wrap_text">Загрузить фото</div>
                </div>
                
                <div class="data-fields_input data-fields_wrap">
                    <input placeholder="Ваше имя и фамилия" type="text" name="first-name" value="<?php the_author_meta( 'first_name', $current_user->ID ); ?>">
                </div>

                <div class="data-fields_input data-fields_wrap">
                    <input data-user-country-select type="text">
				    <label for="country_selector" style="display:none;">Select a country here...</label>
                    <input data-user-country-input="<?php echo get_field('выбор_страны', 'user_'. $current_user->ID ); ?>" type="hidden" name="user-country" value="<?php echo get_field('выбор_страны', 'user_'. $current_user->ID ); ?>">
                </div>

                <div class="data-fields_input data-fields_wrap">
                    <input placeholder="e-mail адрес" type="text" name="user-email" value="<?php the_author_meta( 'user_email', $current_user->ID ); ?>">
                </div>
                <input type="hidden" name="user-id" data-user-id="<?php echo $current_user->ID; ?>" value="<?php echo $current_user->ID; ?>">
                <button class="button col-lg-12 disabled" type="submit">Сохранить</button>
            </form>
        </div>
        <div class="user-info_subscribe">
            <div class="section-title type-1">
                <h2>Подписка</h2>
            </div>
            <div class="tariff-list">
                <?php if(have_rows('список_тарифов', 'option')): ?>
                <?php $counter = 1; ?>
                <?php while(have_rows('список_тарифов', 'option')): the_row(); ?>  
                <?php $tariff_name = get_sub_field('наименование_тарифа'); ?>
                <div class="tariff-list_item tariff-item">
                    <div class="tariff-item_title">
                        <?php echo $tariff_name; ?>
                        <span class="sub-title">*Первый месяц бесплатно</span>
                    </div>
                    <div class="empty--div">
                        <div class="tariff-item_price">
                            <?php the_sub_field('стоимость_тарифа'); ?>€
                        </div>
                        <button data-modal-btn="pay" class="button type-1" data-choose-tariff>Выбрать тариф</button>
                    </div>
                    <div class="tariff-item_pay" style="display:none !important;">
                        <?php echo do_shortcode('[wp_paypal button="subscribe" product_name="'. $tariff_name .'" prod_type="tariff_'. $counter .'"]'); ?>
                    </div>
                </div>
                <?php $counter++; ?>
                <?php endwhile; ?>
	            <?php endif; ?>
            </div>
            <div class="section-title type-1">
                <h2>История платежей</h2>
            </div>
            <div class="payment-history">
                <?php show_user_subscribes($current_user->ID); ?>
            </div>
        </div>
        <div class="user-info_logout">
            <div class="section-title type-1 logout">
                <a href="<?php echo wp_logout_url(); ?>">ВЫЙТИ</a> 
            </div>
        </div>
    </div>
    <?php } else {
        wp_redirect( '/' );
    } ?>
</section>
<div style="display:none!important;">
<?php
    $user = wp_get_current_user();
    $role = ( array )$user->roles;
    $role = $role[0];
    $options = array(
    'post_id' => 'user_' . $current_user->ID,
    'field_groups' => array(291) ,
    'submit_value' => 'Update'
    );
    acf_form($options);       
    ?>
</div>
<?php get_template_part('templates/parts/modals/modal-pay'); ?>
<?php get_footer(); ?>
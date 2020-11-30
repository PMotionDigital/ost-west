<div class="modal_wrap" data-modal="register">
    <!-- форма регистрации -->
    <?php get_template_part('templates/parts/components/modal-social'); ?>
    <form id="pt_registration_form" action="pt_register_member" method="POST">
        <div class="form-field">
            <input placeholder="Имя пользователя" name="pt_user_login" type="text"/>
        </div>
        <div class="form-field">
            <input placeholder="e-mail" name="pt_user_email" type="email"/>
        </div>
        <div class="form-field">
            <input placeholder="Введите пароль" type="password" class="required" name="user_password" >
        </div>
        <div class="form-field form-footer">
            <input type="hidden" name="action" value="pt_register_member" />
            <button class="button" type="submit">Зарегистрироваться</button> 
        </div>
        <?php wp_nonce_field( 'ajax-login-nonce', 'register-security' ); ?>
    </form>
    <div class="modal-social">
        <?php echo do_shortcode('[miniorange_social_login]'); ?>
    </div>
</div>

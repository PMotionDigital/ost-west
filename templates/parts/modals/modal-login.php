<div class="modal_wrap" data-modal="login">
    <!-- форма логина -->
    <?php get_template_part('templates/parts/components/modal-social'); ?>
    <form id="pt_login_form" action="pt_login_member" method="post">
        <div class="form-field">
            <input autofocus placeholder="Логин" name="pt_user_login" type="text" />
        </div>
        <div class="form-field">
            <input placeholder="Пароль" name="pt_user_pass" id="pt_user_pass" type="password" />
        </div>
        <div class="form-field form-footer">
            <input type="hidden" name="action" value="pt_login_member" />
            <button class="button" type="submit">Войти</button> 
        </div>
        <?php wp_nonce_field('ajax-login-nonce', 'login-security'); ?>
    </form>
    <div class="modal-social">
        <?php echo do_shortcode('[miniorange_social_login]'); ?>
    </div>
</div>

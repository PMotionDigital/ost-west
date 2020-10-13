<div class="modal modal-login dis-flex align-items-center justify-content-center" data-modal="login">
    <div class="modal_wrap col-lg-4 col-lm-12 col-xs-12">
        <!-- форма логина -->
        <form id="pt_login_form" action="pt_login_member" method="post">
            <div class="section-title type-1">
                <h3>Войти в личный кабинет</h3>
            </div>
            <div class="form-field">
                <input placeholder="Логин" name="pt_user_login" type="text" />
            </div>
            <div class="form-field">
                <input placeholder="Пароль" name="pt_user_pass" id="pt_user_pass" type="password" />
            </div>
            <div class="form-field form-footer">
                <input type="hidden" name="action" value="pt_login_member" />
                <button class="button" type="submit">Войти</button> 
                <span class="between-word">или</span>
                <button data-modal-btn="register">зарегистрироваться</button>
            </div>
            <?php wp_nonce_field('ajax-login-nonce', 'login-security'); ?>
        </form>
    </div>
    <div class="modal_close" data-modal-close></div>
</div>
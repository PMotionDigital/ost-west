<div class="modal modal-register dis-flex align-items-center justify-content-center" data-modal="register">
    <div class="modal_wrap col-lg-4 col-lm-11 col-xs-11">
        <!-- форма регистрации -->
        <form id="pt_registration_form" action="pt_register_member" method="POST">
            <div class="section-title type-1">
                <h3>Зарегистрируйтесь в системе</h3>
            </div>
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
                <span class="between-word">или</span>
                <button data-modal-btn="login">войти</button>
            </div>
            <?php wp_nonce_field( 'ajax-login-nonce', 'register-security' ); ?>
        </form>
    </div>
    <div class="modal_close" data-modal-close></div>
</div>
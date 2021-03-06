<?php
// LOGIN
function pt_login_member() {

  		// Get variables
		$user_login		= $_POST['pt_user_login'];	
		$user_pass		= $_POST['pt_user_pass'];
		$error = array();
		$status;


		// Check CSRF token
		if( !check_ajax_referer( 'ajax-login-nonce', 'login-security', false) ){
			$error[] = __('Ваш сеанс завершился, перезагрузите страницу', 'ptheme');
			$status = 'error';
		}
	 	
	 	// Check if input variables are empty
	 	elseif( empty($user_login) || empty($user_pass) ){
			$error[] = __('Заполнител все поля', 'ptheme');
			$status = 'error';
	 	} else { // Now we can insert this account

	 		$user = wp_signon( array('user_login' => $user_login, 'user_password' => $user_pass), false );

		    if( is_wp_error($user) ){
				$error[] = $user->get_error_message();
				$status = 'error';
			} else{
				$error[] = __('Успешно! Перенаправляем в личный кабинет ..', 'ptheme');
				$status = 'ok';
				//wp_redirect( '/profile/' );
			}
		 }
		 
		// ответ в виде json

		echo json_encode(array(
			'error' => $error,
			'status' => $status
		));

	 	die();
}

add_action('wp_ajax_nopriv_pt_login_member', 'pt_login_member');

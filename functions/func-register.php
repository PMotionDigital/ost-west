<?php 

// REGISTER
function pt_register_member() {

  		// Get variables
		$user_login	= $_POST['pt_user_login'];	
		$user_email	= $_POST['pt_user_email'];
		$user_password = $_POST['user_password'];
		$user_data = array(
			'user_login' => $user_login,
			'user_email' => $user_email,
			'user_pass' => $user_password
		);

		$user_id = wp_insert_user($user_data);

		$error = array();
		
		// Check CSRF token
		if( !check_ajax_referer( 'ajax-login-nonce', 'register-security', false) ){
			$error[] = __('Session token has expired, please reload the page and try again', 'ptheme');
			die();
		}
	 	
	 	// Check if input variables are empty
	 	elseif( empty($user_login) || empty($user_email) ){
			$error[] = __('Пожалуйста, заполните все поля', 'ptheme');
			$status = 'error';
			die();
	 	}	
		
		if( is_wp_error($errors) ){

			$registration_error_messages = $errors->errors;

			$display_errors = '<div class="alert alert-danger">';
			
				foreach($registration_error_messages as $error){
					$display_errors .= '<p>'.$error[0].'</p>';
				}

			$display_errors .= '</div>';

			$error[] = $display_errors;

		} else { 
			$error[] = __( 'Вы успешно прошли регистрацию! Пожалуйста, проверьте свою почту e-mail.', 'ptheme');
			$status = 'ok';
		}
	 
		echo json_encode(array(
			'error' => $error,
			'pass' => $user_password,
			'status' => $status
		));

	 	die();
}
add_action('wp_ajax_nopriv_pt_register_member', 'pt_register_member');

?>
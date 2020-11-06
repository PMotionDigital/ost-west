import $ from "jquery";

jQuery(function($) {

    const modalLogin = $('[data-modal="login"]');
    const modalRegister = $('[data-modal="register"]');
    const noteForm = $('.note-form');
    const noteFormText = noteForm.find('.note-form_text');
    const registerForm = $('#pt_registration_form');
    const formBtn = registerForm.find('button[type="submit"]');

	registerForm.on('submit', function(e) {

        e.preventDefault();
        
        const formData = [];

        registerForm.serializeArray().forEach((el) => {
            formData[el.name] = el.value;
        });

        console.log(formData);
		$.ajax({
            type: 'POST',
            url: document.location.origin + '/wp-admin/admin-ajax.php',
            data: {
                action: 'pt_register_member',
                ...formData
            },
            beforeSend: () => {
                formBtn.addClass('loading');
            },
            success: (response) => {

                let jsonOutput = JSON.parse(response);
                let respMessage = jsonOutput.error;
                let okMessage = jsonOutput.status;

                noteFormText.html('');
                noteForm.addClass('open');

                if(okMessage == 'ok') {
                    noteFormText.html('Спасибо за регистрацию, теперь вы можете войти!');                    
                } else {
                    noteFormText.html(respMessage);
                }

                modalRegister.removeClass('open');
                modalLogin.addClass('open');

                console.log(jsonOutput);

                formBtn.removeClass('loading');
                
            }
        });


	});

});
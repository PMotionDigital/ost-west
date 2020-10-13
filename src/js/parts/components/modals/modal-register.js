import $ from "jquery";

jQuery(function($) {

    const modalLogin = $('[data-modal="login"]');
    const modalRegister = $('[data-modal="register"]');
    const noteForm = $('.note-form');
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

                noteForm.html('');
                noteForm.addClass('open');
                noteForm.html(respMessage);

                modalRegister.removeClass('open');
                modalLogin.addClass('open');

                console.log(jsonOutput);

                formBtn.removeClass('loading');
                
            }
        });


	});

});
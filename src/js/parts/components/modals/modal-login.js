import $ from "jquery";

jQuery(function($){

    const noteForm = $('.note-form');
    const noteFormText = noteForm.find('.note-form_text');
    const loginForm = $('#pt_login_form');
    const formBtn = loginForm.find('button[type="submit"]');

    const socialLoginGoogle = $('[data-modal-login="google"]');
    const socialLoginFacebook = $('[data-modal-login="facebook"]');

    const miniOrangeGoogle = $('.btn-social.btn-google')
    const miniOrangeFacebook = $('.btn-social.btn-facebook')


    // логинимся через гугл
    socialLoginGoogle.on('click', function() {
        miniOrangeGoogle.trigger('click');
    });

    socialLoginFacebook.on('click', function() {
        miniOrangeFacebook.trigger('click');
    });

    // логинимся через стандартн
	loginForm.on('submit', function(e) {

        e.preventDefault();
        
        const formData = [];

        loginForm.serializeArray().forEach((el) => {
            formData[el.name] = el.value;
        });

        console.log(formData);
		$.ajax({
            type: 'POST',
            url: document.location.origin + '/wp-admin/admin-ajax.php',
            data: {
                action: 'pt_login_member',
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
                    noteFormText.html('Успешно! Перенаправляем в личный кабинет');                    
                    setTimeout(function(){
                        window.location.href = '/profile/';
                    }, 1000);
                } else {
                    noteFormText.html(respMessage);
                }

                formBtn.removeClass('loading');                

            }
        });

	});

});

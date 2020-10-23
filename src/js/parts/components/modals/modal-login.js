import $ from "jquery";

jQuery(function($){

    const noteForm = $('.note-form');
    const noteFormText = noteForm.find('.note-form_text');
    const loginForm = $('#pt_login_form');
    const formBtn = loginForm.find('button[type="submit"]');

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

                noteFormText.html('');
                noteForm.addClass('open');

                if(respMessage.length == 0) {
                    noteFormText.html('Изменения успешно сохранены!');                    
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

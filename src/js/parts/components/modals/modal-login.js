import $ from "jquery";

jQuery(function($){

    const noteForm = $('.note-form');
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

                noteForm.html('');
                noteForm.addClass('open');
                noteForm.html(respMessage);

                console.log(jsonOutput);

                formBtn.removeClass('loading');
                
            }
        });

	});

});

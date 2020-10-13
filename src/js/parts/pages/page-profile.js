import $ from "jquery";

jQuery(function($){

	const profileForm = $('#data-fields_form');
    const profileFormBtn = profileForm.find('.button');
    const userId = $('[data-user-id]').attr('[data-user-id]');
    const headeruserName = $('.user-stat_name');

	// Post login form
	profileForm.on('submit', function(e){

        e.preventDefault();
        const formData = [];
        profileForm.serializeArray().forEach((el) => {
            formData[el.name] = el.value;
        });

        console.log(formData);
		$.ajax({
            type: 'POST',
            url: document.location.origin + '/wp-admin/admin-ajax.php',
            data: {
                action: 'update_user_profile',
                ...formData
            },
            beforeSend: () => {
                profileFormBtn.addClass('loading');
            },
            success: (response) => {
                let jsonOutput = JSON.parse(response);
                let userFirstName = jsonOutput.name;

                headeruserName.html(userFirstName);
                profileFormBtn.removeClass('loading');
                
            }
        });

	});

});
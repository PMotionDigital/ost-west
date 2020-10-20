import $ from "jquery";
import countrySelect from 'country-select-js';

jQuery(function($){

	const profileForm = $('#data-fields_form');
    const profileFormBtn = profileForm.find('.button');
    const headeruserName = $('.user-stat_name');
    const userCountrySelect = $('[data-user-country-select]');
    const userCountryInput = $('[data-user-country-input]');
    const fileBtn = profileForm.find('input[type="file"]');
  

    let currentSlug = userCountryInput.attr('data-user-country-input'); 

    // акитвируем плагин на выбор страны 

    userCountrySelect.countrySelect("selectCountry", currentSlug);

    userCountrySelect.countrySelect({
        defaultCountry: currentSlug,
        onlyCountries: ['us', 'ru', 'ge', 'en'],
        responsiveDropdown: true,
    });

    $('.country-list li').on('click', function() {  // Записываем выбор страны в произвольное поле, чтобы потом обновить
        setTimeout(function() {
            let val = userCountrySelect.countrySelect('getSelectedCountryData');
            userCountryInput.val(val.iso2);
        },50);
    });

    // заменяем стандартную кнопку файла через обработчик

    $('.pic-wrap_text').on('click', function() {
        fileBtn.trigger('click');
    });

	// Post login form
	profileForm.on('submit', function(e){

        e.preventDefault();

        let uploaded = fileBtn.prop('files')[0];
        let formData = new FormData();
        profileForm.serializeArray().forEach((el) => {
            formData.append(el.name, el.value);
        });

        formData.append('action', 'update_user_profile');
        formData.append('file', uploaded);

		$.ajax({
            type: 'POST',
            url: document.location.origin + '/wp-admin/admin-ajax.php',
            contentType: false,
            processData: false,
            data: formData,
            beforeSend: () => {
                profileFormBtn.addClass('loading');
            },
            success: (response) => {
                let jsonOutput = JSON.parse(response);
                let userFirstName = jsonOutput.name;

                console.log(jsonOutput);

                fileBtn.val('');

                headeruserName.html(userFirstName);
                profileFormBtn.removeClass('loading');
                
            }
        });

	});

});
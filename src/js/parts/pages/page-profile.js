import $ from "jquery";
import countrySelect from 'country-select-js';

jQuery(function($){

    const noteForm = $('.note-form');
    const noteFormText = noteForm.find('.note-form_text');
	const profileForm = $('#data-fields_form');
    const profileFormBtn = profileForm.find('.button');
    const profileFormInputs = profileForm.find('input');
    const headeruserName = $('.user-stat_name');
    const userCountrySelect = $('[data-user-country-select]');
    const userCountryInput = $('[data-user-country-input]');
    const fileBtn = $('.acf-basic-uploader');
    const acfSubmit = $('.acf-button');
    const tariffBtn = $('[data-modal-btn="pay"]');
    const modalPay = $('[data-modal="pay"] .modal_wrap');

    let picUploaded = false;
    let currentSlug = userCountryInput.attr('data-user-country-input'); 

    // акитвируем плагин на выбор страны 

    userCountrySelect.countrySelect("selectCountry", currentSlug);

    userCountrySelect.countrySelect({
        defaultCountry: currentSlug,
        //onlyCountries: ['us', 'ru', 'de', 'en'],
        responsiveDropdown: true,
    });

    $('.country-list li').on('click', function() {  // Записываем выбор страны в произвольное поле, чтобы потом обновить
        setTimeout(function() {
            let val = userCountrySelect.countrySelect('getSelectedCountryData');
            userCountryInput.val(val.iso2);
            profileFormBtn.removeClass('disabled');
        },50);
    });

    // убираем класс disabled с кнопки отправки формы, если мы чет меняли

    profileFormInputs.on('input', function() {
        profileFormBtn.removeClass('disabled');
    });

    fileBtn.on('change', function() {
        profileFormBtn.removeClass('disabled');
        picUploaded = true;
    });

    // заменяем стандартную кнопку файла через обработчик

    $('.pic-wrap_text').on('click', function() {
        fileBtn.trigger('click');
    });

	// Post login form
	profileForm.on('submit', function(e){

        e.preventDefault();

        let formData = new FormData();

        profileForm.serializeArray().forEach((el) => {
            formData.append(el.name, el.value);
        });

        formData.append('action', 'update_user_profile')

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
                let outputError = jsonOutput.error;

                //console.log(outputError);

                noteFormText.html('');
                noteForm.addClass('open');

                if(outputError.length == 0) {
                    noteFormText.html('Изменения успешно сохранены!');
                } else {
                    noteFormText.html(outputError);
                }

                headeruserName.html(userFirstName);
                profileFormBtn.removeClass('loading');
                profileFormBtn.addClass('disabled');

                if(picUploaded == true) {
                    acfSubmit.trigger('click');
                }
            }
        });

	});

    // вставляем pay form в модалку

    tariffBtn.on('click', function() {
        let tariffPayForm = $(this).closest('.tariff-item').find('.tariff-item_pay').html();
        modalPay.html(tariffPayForm);
    });

});
import $ from "jquery";

jQuery(function($) {

    const modalPay = $('[data-modal="pay"]');
    const modalSubmit = modalPay.find('input[name="submit"]')

    modalSubmit.attr('src', 'https://www.paypalobjects.com/webstatic/en_US/i/buttons/ppcredit-logo-large.png');

});
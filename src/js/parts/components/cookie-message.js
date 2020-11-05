jQuery(document).ready(function($) {

    const cookieMessage = $('[data-cookie-message]');
    const cookieClose = $('.cookie-message_close');

    if (localStorage.getItem('cookie-message') == 'showed') {
        
    } else if (localStorage.getItem('cookie-message') == null) {
    	setTimeout(function(){
            cookieMessage.addClass('cookie-message--show');
        }, 1500);
        localStorage.setItem('cookie-message', 'showed');
    }	

    cookieClose.click(function() {
    	cookieMessage.removeClass('cookie-message--show');
    });
});
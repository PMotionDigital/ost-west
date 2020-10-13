const noteForm = $('.note-form');
const noteFormClose = noteForm.find('.note-form_close');

noteFormClose.on('click', function() {
    noteForm.html('');
    noteForm.removeClass('open');
});
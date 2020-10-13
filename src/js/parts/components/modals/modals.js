// Общие правила логики абсолютно для всех модалок

const modal = $('.modal[data-modal]');
const modalBtn = $('[data-modal-btn]');
const modalClose = $('[data-modal-close]');

modalBtn.on('click', function(e) {

    e.preventDefault();

    let curModal = $(this).attr('data-modal-btn');
    $(`.modal`).removeClass('open');
    $(`.modal[data-modal="${curModal}"]`).addClass('open');
});

modalClose.on('click', function() {
    let curModal = $(this).closest('.modal')
    curModal.removeClass('open');
});

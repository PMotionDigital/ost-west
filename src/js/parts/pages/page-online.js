const programmItem = $('.guide_list-item');
const modalDetails = $('[data-modal="details"] .modal_wrap');

// вызываем событие на клик, чтобы засунуть контент программы в модалку

programmItem.on('click', function() {
    let itemContent = $(this).find('.item_content').html();
    modalDetails.html(itemContent);
});
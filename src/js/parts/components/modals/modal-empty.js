// универсальный скрипт, чтобы брать html контент у элемента и апендить его в модалку

const emptyBtn = $('[data-modal-btn="empty"]');
const modalEmpty = $('[data-modal="empty"] .modal_wrap');
const itemContent = $('[data-modal-content="content"]');
const itemContentParent = $('[data-modal-content="parent"'); // создаем ближайшего родителя, чтобы найти элемент с контентом

emptyBtn.on('click', function() {
    let content = $(this).closest(itemContentParent).find(itemContent).html();
    modalEmpty.html(content);

    console.log(content);
});

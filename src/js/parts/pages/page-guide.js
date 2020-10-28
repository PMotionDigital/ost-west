const daysItem = $('[data-day-name]');
const guideProgramm = $('[data-tab-name]');
const daysButton = $('.guide_days-button');
const detailsModal = $('[data-modal="details"]');
const guideList = $('.guide_list');
const guideItemCur = $('.guide_list-item--current');

const programmClickHandler = function(currentDay){
    $(guideProgramm).each(function (i, item){
        if (currentDay.attr('data-day-name') === $(item).attr('data-tab-name')){
            $('.guide_programm.guide_programm--current').removeClass('guide_programm--current');
            $(item).addClass('guide_programm--current');
        }
    });
}

daysItem.on('click', function(evt){
    evt.preventDefault();
    $('.guide_days-item.guide_days-item--current').removeClass('guide_days-item--current');
    $(this).addClass('guide_days-item--current');
    const currentDay = $(this);

    programmClickHandler(currentDay);
})

daysButton.on('click', function(evt){
    evt.preventDefault();
    let target = evt.target;

    for (let i = 0; i < daysItem.length; i++){
        let item = daysItem[i];
        if (item.classList.contains('guide_days-item--current')){
            item.classList.remove('guide_days-item--current');
            if (target.classList.contains('guide_days-button--next') ){
                i >= daysItem.length - 1 ? i = 0 : i += 1;
                daysItem[i].classList.add('guide_days-item--current');
            }
            if (target.classList.contains('guide_days-button--prev') ){ 
                i <= 0 ? i = daysItem.length - 1 : i -= 1;
                daysItem[i].classList.add('guide_days-item--current');
            }
        }
    }

    const currentDay = $('.guide_days-item.guide_days-item--current');
    programmClickHandler(currentDay);
});

$('[data-modal-btn="details"]').on('click', (e) => {
    e.preventDefault();
    const detailHtml = $(e.currentTarget).closest('.guide_list-item').find('.item_content').html();
    detailsModal.find('.modal_wrap').html(detailHtml);
});

// mobile

if($('body').hasClass('mobile') && $('body').hasClass('page-template-page-guide')) {
    let currentElTop = $('.guide_list-item--current').position().top;
    let curItemHeight = guideItemCur.outerHeight();
    guideList.scrollTop(currentElTop - curItemHeight);
}
const daysItem = $('[data-day-name]');
const guideProgramm = $('[data-tab-name]');
const daysButton = $('.guide_days-button');

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
                daysItem[i+1].classList.add('guide_days-item--current');
                i += 1;
            }
            if (target.classList.contains('guide_days-button--prev') ){
                daysItem[i-1].classList.add('guide_days-item--current');
                i -= 1;
            }
        }
    }

    const currentDay = $('.guide_days-item.guide_days-item--current');
    programmClickHandler(currentDay);
})
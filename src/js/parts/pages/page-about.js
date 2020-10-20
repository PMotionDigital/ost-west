import $ from "jquery";
import slick from 'slick-carousel';

let sliderFaces = $('[data-slider-faces]');

sliderFaces.slick({
    infinite: true,
    focusOnSelect: true,
    centerMode: true,
    variableWidth: true,
    slidesToScroll: 1,
    arrows: true
})

let slideCenter = $('[data-slider-faces] .slick-center');
const sliderList = $('.faces_list');

$(slideCenter).on('click', function(){
    console.log("click");
    if (!sliderList.hasClass('faces_list--opened')){
        sliderList.addClass('faces_list--opened');
    } else{
        sliderList.removeClass('faces_list--opened');
    }
})


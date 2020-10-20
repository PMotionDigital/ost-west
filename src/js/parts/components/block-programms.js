import $ from "jquery";
import slick from 'slick-carousel';

let sliderProgramm = $('[data-slider-programm]');

sliderProgramm.slick({
    infinite: true,
    //focusOnSelect: true,
    centerMode: true,
    slidesToShow: 3,
    //variableWidth: true,
    slidesToScroll: 1,
    arrows: true,
})
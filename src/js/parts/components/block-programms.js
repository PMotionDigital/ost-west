import $ from "jquery";
import slick from 'slick-carousel';

let sliderProgramm = $('[data-slider-programm]');

sliderProgramm.slick({
    infinite: true,
    slidesToShow: 3,
    slidesToScroll: 3,
    arrows: false
})
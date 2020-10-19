import $ from "jquery";
import slick from 'slick-carousel';

let sliderProviders = $('[data-slider-providers]');

sliderProviders.slick({
    infinite: false,
    slidesToShow:5,
    variableWidth: true,
    slidesToScroll: 1,
    arrows: true
})




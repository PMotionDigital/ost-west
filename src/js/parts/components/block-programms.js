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
    responsive: [
        {
            breakpoint: 1024,
            settings: "unslick"
        },
        {
            breakpoint: 600,
            settings: "unslick"
        },
        {
            breakpoint: 480,
            settings: "unslick"
        }
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
    ]
})
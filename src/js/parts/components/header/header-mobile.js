import $ from "jquery";

const headerMobClose = $('[data-mobile-header-close]')
const headerMob = $('.header-mobile-nav');
const headerMobBurg = $('[data-header-burger]');

headerMobBurg.on('click', function() {
    headerMob.addClass('open');
});

headerMobClose.on('click', function() {
    headerMob.removeClass('open');
});
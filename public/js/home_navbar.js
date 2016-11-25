$(function() {
    'use strict';
    
    // hide .navbar first
    $(".navbar-fixed-top").hide();

    // fade in .navbar
    $(function () {
        $(window).scroll(function () {
            // set distance user needs to scroll before we fadeIn navbar
            if ($(this).scrollTop() > 60) {
                $('.navbar-fixed-top').fadeIn();
            } else {
                $('.navbar-fixed-top').fadeOut();
            }
        });


    });
    
    // Nav-bar scroll items
    $('.nav li a').click(function () {
       $('html, body').animate({
           scrollTop: ($('#' + $(this).data('value')).offset().top)-60
       }, 1000);
    });

    // Nav-bar scroll items
    $('.scroll-down a').click(function () {
        $('html, body').animate({
            scrollTop: ($('#' + $(this).data('value')).offset().top)-60
        }, 1000);
    });
    
});


$(function() {

    'use strict';
    //change scroll bar style
    $('html').niceScroll({

        cursorcolor: '#01a4f1',
        curosorwidth: '10px',
        cursorborder: '1px solid #1abc9c',
        cursorborderradius: 0

    });

    // makes carousel responsive
    var $item = $('.full-screen');
    var $wHeight = $(window).height();
    $item.height($wHeight);
    $(window).on('resize', function (){
        $wHeight = $(window).height();
        $item.height($wHeight);
    });

});
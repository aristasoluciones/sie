jQuery(document).ready(function($) {
  "use strict";

    // Window Size
    //-------------------------------------------------------------------------------
    var h = $(window).height();
    var w = $(window).width();

    if($('#navigation-1').hasClass('navbar-transparent')){
        $(window).scroll(function () {
            if ($(this).scrollTop() > 200) { // on scroll navbar fadeIn
                $('#navigation-1').removeClass('navbar-transparent');
            } else {
                $('#navigation-1').addClass('navbar-transparent');
            }
        });
    }

    $('#intro-slider-1, #afterIntro, #intro-video-1').height(h);

    $('.gridx').masonry({
      // options
      itemSelector: '.grid-item',
      columnWidth: 296,
      percentPosition: true
    });

    if($.isFunction($.fn.YTPlayer)){
        $('#intro-video-1').YTPlayer({
            fitToBackground: true,
            videoId: 'LSmgKRx5pBo'
        });
    }



    $(window).resize(function(){

        var h = $(window).height();
        var w = $(window).width();

        $('#intro-slider-1, #afterIntro, #intro-video-1').height(h);

        
    });


});
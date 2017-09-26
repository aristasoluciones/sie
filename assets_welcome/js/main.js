"use strict";
jQuery(document).ready(function ($) {

    $(window).load(function () {
        $(".loaded").fadeOut();
        $(".preloader").delay(1000).fadeOut("slow");
    });
    /*---------------------------------------------*
     * menu
     ---------------------------------------------*/
    $( '.navbar-collapse' ).find( 'a[href*=#]:not([href=#])' ).on( 'click', function () {
        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            if (target.length) {
                $('html,body').animate({
                    scrollTop: (target.offset().top - 40)
                }, 1000);
                if ($('.navbar-toggle').css('display') != 'none') {
                    $(this).parents('.container').find(".navbar-toggle").trigger("click");
                }
                return false;
            }
        }
    });
	$('.navbar-fixed-top').addClass('menu-scroll');

    $(window).scroll(function () {
        if ($(this).scrollTop() > 200) { // on scroll navbar fadeIn
            $('#navigation-1').removeClass('navbar-transparent');
        } else {
            $('#navigation-1').addClass('navbar-transparent');
        }
    });


    $( 'ul.navbar-nav li' ).on( 'click', function ( ) {
        $(this).children('ul').stop(true, false, true).fadeToggle(300);
    });


    /*---------------------------------------------*
     * STICKY scroll
     ---------------------------------------------*/

    $(".nav").localScroll();

    /*---------------------------------------------*
     * WOW
     ---------------------------------------------*/

    var wow = new WOW({
        mobile: false // trigger animations on mobile devices (default is true)
    });
    wow.init();

// magnificPopup

    $('.portfolio-img').magnificPopup({
        type: 'image',
        gallery: {
            enabled: true
        }
    });

// Slider Pro 

    $('#example2').sliderPro({
        width: '100%',
        height: 500,
        arrows: true,
        waitForLayers: true,
        thumbnailPointer: false,
        autoplay: true,
        buttons: false,
        aspectRatio: 1.5
    });


// main-menu-scroll

    jQuery(window).scroll(function () {
        var top = jQuery(document).scrollTop();
        var height = 300;
        //alert(batas);

    });

// scroll Up


    $( '.scrollup' ).on( 'click', function () {
        $("html, body").animate({scrollTop: 0}, 1000);
        return false;
    });


    $('#mixcontent').mixItUp({
        animation: {
            effects: 'fade translateX(50%)',
            reverseOut: true,
            duration: 1000
        },
        load: {
            filter: '.cat1'
        }
    });

    $('#example3').sliderPro({
        width: '100%',
        height: 700,
        fade: true,
        arrows: false,
        buttons: true,
        fullScreen: true,
        shuffle: false,
        smallSize: 500,
        mediumSize: 1000,
        largeSize: 3000,
        thumbnailArrows: false,
        autoplay: true,
        thumbnailsPosition: 'top',
        thumbnailPointer: false,
        buttons: false,
                thumbnailWidth: 150
    });




    //End

});
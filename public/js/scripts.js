$(window).on("load", function() {
    "use strict";

    /*==============================================
                      SMOTH SCROLL
    ===============================================*/

    $.scrollIt({
        topOffset: -80
    });

    //// FIXED NAVBAR
    $(window).on("scroll", function() {
        if ($(window).scrollTop() > 50) {
            $('header').addClass('fixed animated slideDown');
            $(".scrollTop").addClass("active");
        } else {
            $('header').removeClass('fixed animated slideDown');
            $(".scrollTop").removeClass("active");
        }
    });

 
    /*==============================================
                      Custom Dropdown
    ===============================================*/

    $('.drop-menu').on('click', function () {
        $(this).attr('tabindex', 1).focus();
        $(this).toggleClass('active');
        $(this).find('.dropeddown').slideToggle(300);
    });
    $('.drop-menu').on("focusout", function () {
        $(this).removeAttr('tabindex', 1).focus();
        $(this).removeClass('active');
        $(this).find('.dropeddown').slideUp(300);
    });
    $('.drop-menu .dropeddown li').on('click', function () {
        $(this).parents('.drop-menu').find('span').text($(this).text());
        $(this).parents('.drop-menu').find('span').addClass("selected");
        $(this).parents('.drop-menu').find('input').attr('value', $(this).attr('id'));
    });


    /*==============================================
                    MOBILE RESPONSIVE MENU
    ===============================================*/


    $(".menu-btn").on("click", function(){
      $(this).toggleClass("active");
      $(".responsive-mobile-menu").toggleClass("active");
    });

    $(".responsive-mobile-menu ul ul").parent().addClass("menu-item-has-children");
    $(".responsive-mobile-menu ul li.menu-item-has-children > a").on("click", function() {
      $(this).parent().toggleClass("active").siblings().removeClass("active");
      $(this).next("ul").slideToggle();
      $(this).parent().siblings().find("ul").slideUp();
      return false;
    });

  


    /*==============================================
        SETTING POSITION ACRD TO CONTAINER
    ===============================================*/

    if ($(window).width() > 1200) {
        var offy = $(".container").offset().left;
        $(".contact_details").css({
          "left": offy
        });
        $("body.rtl .contact_details").css({
          "right": offy
        });
           
    }
    
    /*==============================================
                      DROPDOWN EFFECT
    ===============================================*/


    $('.dropdown').on('show.bs.dropdown', function(e){
      $(this).find('.dropdown-menu').first().stop(true, true).slideDown(300);
    });

    $('.dropdown').on('hide.bs.dropdown', function(e){
      $(this).find('.dropdown-menu').first().stop(true, true).slideUp(200);
    });


    /*==============================================
                    SCROLL TO TOP
    ===============================================*/


    $('.scrollTop').on("click", function(){
        $('html, body').animate({scrollTop : 0},1000);
        return false;
    });


    $(".boxed-layout").on("click",function(){
        $(".theme-layout").addClass("boxed");
    });

    $(".wide-layout").on("click",function(){
        $(".theme-layout").removeClass("boxed");
    });

    $(".side-panel-sec > h4 a").on("click",function(){
        $(this).parent().parent().toggleClass('active');
        return false;
    });

    /*==============================================
                    RTL SELECTION SCRIPT
    ===============================================*/

    $(".rtl-active").on("click", function(){
        $('body').addClass("rtl");
    });
    $(".ltr-active").on("click", function(){
        $('body').removeClass("rtl");
    });

    $(".two-layouts ul li").on("click", function(){
        $(this).addClass("active").siblings().removeClass("active");
    });

    // ============ PAGE LOADER ============= 

    $('#preloader').fadeOut();


});

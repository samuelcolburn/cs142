$(document).ready(function() {
//side panel for nav
    $(".menu-button").click(function() {
        $("nav").toggleClass("is-visible");
        $("article").toggleClass("menu-visible");
        $("header").toggleClass("menu-visible");
    });

    $(window).resize(function() {
        $("nav").removeClass("is-visible");
        $("article").removeClass("menu-visible");
        $("header").removeClass("menu-visible");
    });
//Contact window
    $(".contact-button").click(function() {
      $(".contact-info").toggleClass("contact-visible");  
    });
    
// Scrolling adjust nav position
    var secondaryHead = $('nav'),
            secondaryHeadTopPosition = secondaryHead.offset().top;
    $(window).on('scroll', function() {
        if ($(window).scrollTop() > secondaryHeadTopPosition) {
            secondaryHead.addClass("fixed-nav");
            $(".menu-button").addClass("fixed-button");
        }
        else {
            secondaryHead.removeClass('fixed-nav');
            $(".menu-button").removeClass("fixed-button");
        }
    });
});
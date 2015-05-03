$(document).ready(function() {
    var windowHeight = $(window).height();
    if ($("body").height() < windowHeight){
        $("footer").css("position", "absolute");
        $("footer").css("top", "calc(100vh - 150px)");
        $("footer").css("left", "0px");
        $("footer").css("width", "100%");
    }
    
    var types = [".all", ".cat", ".dog"];
    $(".nav-options").click(function() {
        var k = $(this).index();
        if (k == 0) {
            for (i = 1; i < types.length; i++) {
                $(types[i]).show();
            }
        }
        else {
            for (i = 1; i < types.length; i++) {
                if (i == k) {
                    $(types[i]).show();
                }
                else {
                    $(types[i]).hide();
                }
            }
        }
    });

    $('a[href*=#]:not([href=#])').click(function() {
        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '')
                || location.hostname == this.hostname) {

            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            if (target.length) {
                $('html,body').animate({
                    scrollTop: target.offset().top
                }, 500);
                return false;
            }
        }
    });
    /*
    var adoptMeOffset = $(".adopt-me").offset();
    var messageTop = adoptMeOffset.top;
    $(".message").css("top", (messageTop - 100) + "px");
    */
    $(".adopt-me").click(function(event) {
        event.stopPropagation();
        $(".message").addClass("active");
        
    });
    $(".message").click(function(event) {
        event.stopPropagation();
    });
    $(".cancel").click(function() {
        $(".message").removeClass("active");
    });
    $(".EmailButton").click(function(){
       $(".message").removeClass("active"); 
    });

    
});

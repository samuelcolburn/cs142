$(document).ready(function() {
    var windowHeight = $(window).height();
    if($("body").attr("id") != "petlist"){
       if ($("body").height() < windowHeight){
            $("footer").css("position", "absolute");
            $("footer").css("top", "calc(100vh - 150px)");
            $("footer").css("left", "0px");
            $("footer").css("width", "100%");
        } 
    }
    
    if($("body").attr("id") == 'petlist'){
        $("nav a:nth-child(2)").addClass("active-page");
        $("nav a:nth-child(1)").removeClass("active-page");
    }
    else if($("body").attr("id") == 'home') {
        $("nav a:nth-child(1)").addClass("active-page");
        $("nav a:nth-child(2)").removeClass("active-page");
    }

    if($("header section a").attr("id") == "sign-in" && $("body").attr("id") == "user"){
        window.location.href = "home.php";
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

    $(".adopt-me").click(function(event) {
        event.stopPropagation();
        $(".message").addClass("active");
        
    });
    $(".message").click(function(event) {
        event.stopPropagation();
    });
    $(".cancel").click(function() {
        $(".message").removeClass("active");
        $(".after-message").removeClass("active");
    });

});

$(document).ready(function() {
 
  $("#owl-demo").owlCarousel({
 
      navigation : false, // Show next and prev buttons
      slideSpeed : 300,
      paginationSpeed : 400,
      singleItem:false,
      items:3,
      autoPlay: true,
      autoHeight : true,
      transitionStyle:"fade",
    goToFirstSpeed : 2000,
          stopOnHover : true,
          itemsScaleUp:false

      
      
 
      // "singleItem:true" is a shortcut for:
      // items : 5, 
      // itemsDesktop : false,
      // itemsDesktopSmall : false,
      // itemsTablet: false,
      // itemsMobile : false
 
  });
 
});
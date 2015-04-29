$(document).ready(function() {
 
  $("#owl-demo").owlCarousel({
 
      navigation : true, // Show next and prev buttons
      slideSpeed : 300,
      paginationSpeed : 400,
      singleItem:false,
      itemsCustom:[[0,1],[2,1],[200,1],[400,1],[600,1]]
      
      
 
      // "singleItem:true" is a shortcut for:
      // items : 5, 
      // itemsDesktop : false,
      // itemsDesktopSmall : false,
      // itemsTablet: false,
      // itemsMobile : false
 
  });
 
});
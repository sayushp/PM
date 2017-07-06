jQuery(document).ready(function () {
    //window heght for sidebar
    windowHeight = jQuery(window).innerHeight();
    jQuery('.page-sidebar').css('height', windowHeight);
  
      $( ".datepicker" ).datepicker();
});
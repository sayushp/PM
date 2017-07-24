jQuery(document).ready(function () {
    //window heght for sidebar
    windowHeight = jQuery(window).innerHeight();
    jQuery('.page-sidebar').css('height', windowHeight);

    jQuery('.datepicker').datepicker({
        dateFormat: 'yy-mm-dd'
    });
});
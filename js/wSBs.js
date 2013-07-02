(function($){
    $('.inputselect').click(function() {
    
        var objCheckbox = $(this).find("input[type=checkbox]");
        if( objCheckbox.length >= 1 ) {
            objCheckbox.prop("checked", !objCheckbox.prop("checked"));
        }
    
        $(this).toggleClass("btn-link").toggleClass("btn-danger"); 
    
    });
    
    $('.bbcodebuttons').tooltip({
        selector: "a[data-toggle=tooltip]",
        html: true,
        container: 'body'
    })
  
    // Loading the large images only for Tablets and Desktops 
    var windowWidth = $(document).width();
    if(windowWidth > 480) {
        $('img[src*="images/gallery/thumb/"]').each(function() {
            var newSrc = $(this).attr('src');
            newSrc = newSrc.replace('images/gallery/thumb/','images/gallery/large/');
            $(this).attr('src', newSrc);
        });
    }

  
})(jQuery);
(function($){
  $('.inputselect').click(function() {
        
      var objCheckbox = $(this).find("input[type=checkbox]");
      if( objCheckbox.length >= 1 ) {
          objCheckbox.prop("checked", !objCheckbox.prop("checked"));
      }
      
     $(this).toggleClass("btn-link").toggleClass("btn-danger"); 
     console.log(
         
         $(this).find('.span1')
     
     );   
        
  });
  $('.bbcodebuttons').tooltip({
      selector: "a[data-toggle=tooltip]",
      html: true,
      container: 'body'
  });

  var leftcol = $('div#leftcol');
  var maincol = $('div#maincol');

  (function tabletspan(){ 
    if(leftcol.is(':hidden')) {
      maincol.removeClass('push3 span6').addClass('span9');
    }
    else if(leftcol.is(':visible') && !maincol.hasClass('push3') || maincol.hasClass('span9')) {
      maincol.addClass('push3 span6').removeClass('span9');
    }
  })();
  $(window).on('resize', tabletspan());
  
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

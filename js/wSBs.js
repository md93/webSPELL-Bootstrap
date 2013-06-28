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
    })
})(jQuery);
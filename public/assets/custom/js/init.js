(function($){

  $(function(){ // Handler for .ready() called.
      $('.ui.dropdown').dropdown();
      $('.ui.dropdown.editable').each(function(){
          var defaultText = false;

          if ( $(this).find(".text").hasClass("default") && $(this).find(".text").text() )
              defaultText = $(this).find(".text").text();

          var isSelectTag = false;
          if ( $(this).find("input:hidden").length < 1 || $(this).addBack().find( "select" ).length > 0 )
              isSelectTag = true;

          if ( isSelectTag == false )
          {
              $(this).dropdown({
                  forceSelection: false
              });

              $(this).find(".search").on("focus", function(event){
                  var aOpt = $(this).parent().find(".active");
                  aOpt.removeClass("active");
              });

              var originalText = $(this).find(".search").text();
              $(this).find(".search").on("blur", function(event){
                  var text = $(this).val();
                  if ( originalText != text )
                  {
                      if ( $.trim(text)=="" && defaultText != false )
                      {
                          $(this).parent().find(".text").addClass("default").removeClass("filtered").text(defaultText);
                      }
                      $(this).parent().find("input:hidden").val(text);
                      originalText = text;
                  }
              });
          }
      });
      $('.menu .browse').popup({
          inline     : true,
          hoverable  : true,
          position   : 'bottom left',
          transition : 'slide down',
          offset : -130,
          delay: {
              show: 300,
              hide: 800
          }
      });
      $(".message .close").on("click", function () {
          $(this).closest(".message").transition("fade");
      });
  }); // end of document ready
})(jQuery); // end of jQuery name space
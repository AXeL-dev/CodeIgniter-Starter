(function($){

  $(function(){ // Handler for .ready() called.
      $('.ui.dropdown').dropdown();
      $('.menu .browse')
          .popup({
              inline     : true,
              hoverable  : true,
              position   : 'bottom left',
              transition : 'slide down',
              offset : -130,
              delay: {
                  show: 300,
                  hide: 800
              }
          })
      ;
  }); // end of document ready
})(jQuery); // end of jQuery name space
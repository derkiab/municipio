$(document).ready(function(){

    $('#navarea a').click(function(e) {

      $('#navarea a.active').removeClass('active');
      
      document.getElementById("#navarea").addEventListener("click", function(event){
        event.preventDefault()
      });
      var $parent = $(this).parent();
      $parent.addClass(' active');
      
  });
// Loop through the buttons and add the active class to the current/clicked button
  
});


  
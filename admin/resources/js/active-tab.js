$(document).ready(function(){
  $('#navarea a').click(function(){
    $('a.btn-active').removeClass("active");
    $(this).addClass("active");
  });
});

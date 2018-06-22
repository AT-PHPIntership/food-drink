$(document).ready(function(){
    $(".slide").click(function(){
      var target = $(this).parent().children(".slideContent");
      $(target).slideToggle();
    });
});

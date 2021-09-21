$(document).ready(function() {
    $('button').on('click', function() {
      if($(this).hasClass('nav-button')) {
        $('nav div').addClass('show');
      } else if($(this).hasClass('exit-menu')) {
        $('nav div').removeClass('show');
      } 
      else if($(this).hasClass('to-top')) {
        $('html,body').animate({scrollTop:0}, 'slow');
      }
    });
  
    AOS.init({      
          duration: 1800,
      easing: 'ease'
    });
     
  });

  window.addEventListener("load",function(){
    document.getElementById("loader").classList.toggle("loader2")
});





 //header
$(function()
{
    $(window).on("scroll", function() {
        if($(window).scrollTop() > 850) {
            $(".navbar").addClass("active");
        } else {
           $(".navbar").removeClass("active");
        }
    });
});
 //svg
$(function(){
    $(window).on("scroll", function() {
        if($(window).scrollTop() > 850) {
            $(".cls-1").addClass("svglog");
        } else {
           $(".cls-1").removeClass("svglog");
        }
    });
});
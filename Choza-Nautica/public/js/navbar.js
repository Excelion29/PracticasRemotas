 //header
$(function()
{
    $(window).on("scroll", function() {
        if($(window).scrollTop() > 400) {
            $(".navbar").addClass("active");
        } else {
           $(".navbar").removeClass("active");
        }
    });
});
 //svg
$(function(){
    $(window).on("scroll", function() {
        if($(window).scrollTop() > 400) {
            $(".cls-1").addClass("svglog");
        } else {
           $(".cls-1").removeClass("svglog");
        }
    });
});
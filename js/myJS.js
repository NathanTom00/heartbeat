$(function () {
    $(window).scroll(function(){
        if($(".navbar-collapse").hasClass("show")==true){
            $(".navbar-toggler").click();
        }
    });
});
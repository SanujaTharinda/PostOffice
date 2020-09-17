 /*===================================================
                        ANIMATION
====================================================*/

$(function() {
    // Animate in scroll  
    new WOW().init();
    
})


/*====================================================
                        NAVIGATION
====================================================*/

// Close mobile menu on click
$(function(){
    
    $(".navbar-collapse ul li a").on("click touch", function(){
       
        $(".navbar-toggle").click();
    });
});


/*====================================================
                OWL-CAROUSEL (ABOUT page)
====================================================*/

$(function(){
    $("#team-members").owlCarousel({
        items:4,
        autoplay:true ,
        smartSpeed:600,
        loop:true
    });
});






















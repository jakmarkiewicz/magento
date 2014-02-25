// Add any JavaScript code here

// START - Sticky nav-menu when scrolling

jQuery(function() {
 
    // grab the initial top offset of the navigation 
    var sticky_navigation_offset_top = jQuery('.nav-container').offset().top;
     
    // our function that decides weather the navigation bar should have "fixed" css position or not.
    var sticky_navigation = function(){
        var scroll_top = jQuery(window).scrollTop(); // our current vertical position from the top
         
        // if we've scrolled more than the navigation, change its position to fixed to stick to top,
        // otherwise change it back to relative
        // show logo and hide 'Home' link text when scrolled, otherwise hide logo and show 'Home' link
        if (scroll_top > sticky_navigation_offset_top) { 
            jQuery('.nav-container').css({ 'position': 'fixed', 'top':0, 'left':0, 'width': '100%', 'opacity': '0.99' });
            //jQuery('.homelink').css({'background': 'url(/skin/frontend/default/perfectum/images/logo_remarkable_small.png) no-repeat', 'background-position': '0% 45%', 'width': '120px'});
            //jQuery('.homelink').children().css({'text-indent': '100%', 'white-space': 'nowrap', 'overflow': 'hidden' });
        } else {
            jQuery('.nav-container').css({ 'position': 'relative' }); 
            //jQuery('.homelink').css({ 'width': 'inherit', 'background-position': '-9999px' });
            //jQuery('.homelink').children().css({'text-indent': '0', 'white-space': 'nowrap', 'overflow': 'hidden' });
        }   
    };

    // navigation remarkable 'home' logo
    // background: url(../images/logo_remarkable_small.png) no-repeat center center;
    // background-position: left;
    // width: 120px;
    // margin-top: 10px;

    //if(jQuery(window).scrollTop() >= 500){
    //    alert("All done!");
    //}
     
    // run our function on load
    sticky_navigation();
     
    // and run it again every time you scroll
    jQuery(window).scroll(function() {
         sticky_navigation();
    });
 
});

// END - Sticky nav-menu when scrolling
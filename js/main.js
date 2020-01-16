jQuery(document).ready(function($) {
    
    // adds offset to scroll to function (adds data attr for uikit)
    //scrollOffset();
    
    $( window ).resize(function() {
        //scrollOffset();    
    });
    
    
    function scrollOffset(){
        var headerheight = $('.site-header').outerHeight();
    
        $('.header-nav li a, #menu-main-navigation li a').attr('data-uk-smooth-scroll', "{offset: "+headerheight+"}" );    
    }
    

    
});


/**
 * Font loader
 */
WebFont.load({
    google: {
        families: ['Open Sans:700,700i,400,400i', 'Roboto Slab:700']
    }    
});



/**
 * This allows for offset from anchor link.
 * For a single page site.
 */

// set timeout onDomReady
$(function() {
  // Only set the timer if you have a hash
  if(window.location.hash) {
    setTimeout(delayedFragmentTargetOffset, 100);
  }
});


// add scroll offset to fragment target (if there is one)
function delayedFragmentTargetOffset(){
    var offset = $(':target').offset(),
    headerheight = $('.site-header').outerHeight(true) -2;
    
    if(offset){
        var scrollto = offset.top - headerheight; // minus fixed header height
        $('html, body').animate({scrollTop:scrollto}, 0);
    }
}
$(document).ready(function() {

    // mobile nav behaviours
    mobileNavDisplay = $("#mobile-nav") ;
    var mobileNavContainer = $("#nav-toggle-container a") ;
    var closeNavButton = $("#mobile-nav header .close a") ;

    mobileNavContainer.on('click', function(e) {
	e.preventDefault() ;
	mobileNavDisplay.slideDown() ;
    });
    
    closeNavButton.on('click', function(e) {
	e.preventDefault() ;
	mobileNavDisplay.slideUp() ;	
    });
    
});
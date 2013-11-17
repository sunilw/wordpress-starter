$(document).ready(function() {

    // mobile nav
    var mobileNavContainer = $("#nav-toggle-container a") ;
    mobileNavContainer.on('click', function(e) {
	e.preventDefault() ;
	$("#mobile-nav").slideDown() ;
		
    });    

});

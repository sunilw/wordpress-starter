$(document).ready(function() {
    // for testing video modal plugin

    $(".cover-link").on('click', function(e) {

        event.preventDefault() ;

	// first  close any open modals
	$.modal.close() ;
	// get the number of the link that we've clicked       
	linknum =  $(this).attr("id").slice(-1) ;
	var str = "#modal-" + linknum ;	
	$(str).modal() ;	
    });

    // close modal windows
    $(".modal-close").on('click', function(e) {
        e.preventDefault() ;
        $.modal.close() ;
    });

}); // document.ready ends
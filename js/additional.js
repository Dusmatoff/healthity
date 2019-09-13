//Live search FAQ
$(document).ready(function () {
    $("#filter").keyup(function () {
        // Retrieve the input field text and reset the count to zero
        var filter = $(this).val();
        // Loop through the comment list
        $(".accordion .accordion-item .accordion-title").each(function () {
            // If the list item does not contain the text phrase fade it out
            if ($(this).text().search(new RegExp(filter, "i")) < 0) {
                $(this).fadeOut();
                // Show the list item if the phrase matches and increase the count by 1
            } else {
                $(this).show();
            }
        });
    });
});
    
//Show modals for success form
//Contact form
document.addEventListener( 'wpcf7mailsent', function( event ) {
	if ( '275' == event.detail.contactFormId ) {
		$('.popup-content').removeClass('active');
        $('.popup-wrapper, .popup-content[data-rel="6"]').addClass('active');
        $('html').addClass('overflow-hidden');
	}
}, false );
//Contact form validation
document.addEventListener( 'wpcf7submit', function( event ) {
	if ( '275' == event.detail.contactFormId ) {
		if( $("#clientName").val().length === 0 ) {
            $(".name-wrap").addClass('fail');
        }else if( $("#clientPhone").val().length === 0 ) {
            $(".phone-wrap").addClass('fail');
        }
	}
}, false );

//Subscribe form
document.addEventListener( 'wpcf7mailsent', function( event ) {
	if ( '420' == event.detail.contactFormId ) {
		$('.popup-content').removeClass('active');
        $('.popup-wrapper, .popup-content[data-rel="7"]').addClass('active');
        $('html').addClass('overflow-hidden');
	}
}, false );

//Subscribe form validation
document.addEventListener( 'wpcf7submit', function( event ) {
	if ( '420' == event.detail.contactFormId ) {
		if( $("#clientEmail").val().length === 0 ) {
            $(".email-wrap").addClass('fail');
        }
	}
}, false );

//Pre-order form
document.addEventListener( 'wpcf7mailsent', function( event ) {
	if ( '437' == event.detail.contactFormId ) {
		$('.popup-content').removeClass('active');
        $('.popup-wrapper, .popup-content[data-rel="10"]').removeClass('active');
        $('.popup-wrapper, .popup-content[data-rel="6"]').addClass('active');
        $('html').addClass('overflow-hidden');
	}
}, false );

//Pre-order form validation
document.addEventListener( 'wpcf7submit', function( event ) {
	if ( '437' == event.detail.contactFormId ) {
		if( $("#preOrderName").val().length === 0 ) {
            $(".pre-order-name").addClass('fail');
        }else if( $("#preOrderPhone").hasClass("wpcf7-not-valid") ) {
            $(".pre-order-phone").addClass('fail');
        }
	}
}, false );
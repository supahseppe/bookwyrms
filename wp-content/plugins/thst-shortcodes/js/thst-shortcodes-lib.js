jQuery(document).ready(function($) {

	$(".thst-tabs").tabs();
	
	$(".thst-toggle").each( function () {
		if($(this).attr('data-id') == 'closed') {
			$(this).accordion({ header: '.thst-toggle-title', collapsible: true, active: false, heightStyle: 'content'});
		} else {
			$(this).accordion({ header: '.thst-toggle-title', collapsible: true, heightStyle: 'content'});
		}
	});
	
	
});
$ = jQuery;
$(document).ready(function() {
	$("select.wp-crm-system-searchable").select2({
		width: 'resolve',
		ajax: {
			url: WP_CRM_Dropdown.ajax_url,
			dataType: 'json',
			delay: 250,
			data: function (params) {
				return {
					q: params.term,
					crm: $(this).attr("name"),
					action: 'wp_crm_search',
					nonce: WP_CRM_Dropdown.wpcrm_nonce,
				};
			},
			processResults: function( data ) {
				var options = [];
				if ( data ) {
						$.each( data, function( index, text ) {
						options.push( { id: text[0], text: text[1]  } );
					});
				
				}
				return {
					results: options
				};
			},
		},
		minimumInputLength: 3,
	});
});
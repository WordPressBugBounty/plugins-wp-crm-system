(function ($) {
	$(document).ready(function () {

		$('.wp-crm-email-has-filter').select2({
			placeholder: wp_crm_system_general.i18n.recipient,
		});

		/**
		 * Ajax based search
		 * 
		 * @since	3.2.5
		 */
		$('.wp-crm-email-no-filter').select2({
			ajax: {
				url: wp_crm_system_general.ajax_url,
				dataType: 'json',
				delay: 250,
				data: function (params) {
					return {
						recipient: params.term,
						nonce: wp_crm_system_general.wpcrm_nonce,
						action: 'wpcrm_get_email_recipients'
					};
				},
				processResults: function (data) {
					var options = [];
					if (data) {
						$.each(data, function (index, text) {
							options.push({ id: text[0], text: text[1] });
						});

					}
					return {
						results: options
					};
				},
				cache: true
			},
			minimumInputLength: 3,
			placeholder: wp_crm_system_general.i18n.recipient,
		});
	});
})(jQuery);
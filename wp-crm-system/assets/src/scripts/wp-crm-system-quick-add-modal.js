jQuery(document).ready(function ($) {

	/**
	 * Insert "quick add new" buttons
	 * 
	 * @since   3.2.5
	 */
	$('<a href="#" class="quick-add task-organization"><img src="' + wp_crm_system_quick_add_modal.plus_icon.path + '" width="16" title="' + wp_crm_system_quick_add_modal.plus_icon.desc.organization + '"/></a>').insertAfter('.attach-to-organization .form-field label .dashicons');
	$('<a href="#" class="quick-add task-contact"><img src="' + wp_crm_system_quick_add_modal.plus_icon.path + '" width="16" title="' + wp_crm_system_quick_add_modal.plus_icon.desc.contact + '"/></a>').insertAfter('.attach-to-contact .form-field label .dashicons');
	$('<a href="#" class="quick-add task-project"><img src="' + wp_crm_system_quick_add_modal.plus_icon.path + '" width="16" title="' + wp_crm_system_quick_add_modal.plus_icon.desc.project + '"/></a>').insertAfter('.attach-to-project .form-field label .dashicons');
	$('<a href="#" class="quick-add task-campaign"><img src="' + wp_crm_system_quick_add_modal.plus_icon.path + '" width="16" title="' + wp_crm_system_quick_add_modal.plus_icon.desc.campaign + '"/></a>').insertAfter('.attach-to-campaign .form-field label .dashicons');

	/**
	  * Trigger the modal to show
	  * 
	  * @since   3.2.5
	  */
	$(document).on('click', '.quick-add.task-organization', function (e) {
		e.preventDefault();
		$('.wcs-modal.wcs-organization').addClass('is-open');
	});
	$(document).on('click', '.quick-add.task-contact', function (e) {
		e.preventDefault();
		$('.wcs-modal.wcs-contact').addClass('is-open');
	});
	$(document).on('click', '.quick-add.task-project', function (e) {
		e.preventDefault();
		$('.wcs-modal.wcs-project').addClass('is-open');
	});
	$(document).on('click', '.quick-add.task-campaign', function (e) {
		e.preventDefault();
		$('.wcs-modal.wcs-campaign').addClass('is-open');
	});

	/**
	 * Close modal
	 * 
	 * @since   3.2.5
	 */
	$(document).on('click', '.close', function (e) {
		e.preventDefault();
		wcs_close_quick_modal();
	});

	/**
	 * Submitting the modal form should prevent default
	 * 
	 * @since   3.2.5
	 */
	$(document).on('click', '.wcs-modal-submit.organization', function (e) {
		e.preventDefault();

		/**
		 * Submit data using Ajax
		 * 
		 * @since   3.2.5
		 */
		$.ajax({
			url: wp_crm_system_quick_add_modal.ajax_url,
			type: 'post',
			dataType: "json",
			data: {
				action: 'wcs_ajax_add_post',
				nonce: wp_crm_system_quick_add_modal.nonce,
				formdata: $("#wcs-form-organization").serialize(),
			},
			success: function (response) {
				if (response.code === 200) {
					$('#wcs-modal-organization .modal-content .modal-body .message').removeClass('error').addClass('success');
					$('#wcs-modal-organization .modal-content .modal-body .message').text(response.message);

					/**
					 * Search wildcard ID for organisation input
					 * 
					 * @since	3.2.5
					 */
					wcs_assign_entry($("[id$=attach-to-organization-input]").attr('id'), response.id, response.organizations);
					setTimeout(function () {
						wcs_close_quick_modal();
					}, 2000);
				} else {
					$('#wcs-modal-organization .modal-content .modal-body .message').removeClass('success').addClass('error');
					$('#wcs-modal-organization .modal-content .modal-body .message').text(response.message);
				}
			},
			error: function (response, status, error) {
				$('#wcs-modal-organization .modal-content .modal-body .message').removeClass('success').addClass('error');
				if (response.code !== 200) {
					$('#wcs-modal-organization .modal-content .modal-body .message').text(response.message);
				}
				setTimeout(function () {
					wcs_close_quick_modal();
				}, 2000);
			},
		});
	});

	/**
	 * Submitting the modal form should prevent default
	 * 
	 * For Contact modal
	 * 
	 * @since   3.2.5
	 */
	$(document).on('click', '.wcs-modal-submit.contact', function (e) {
		e.preventDefault();

		/**
		 * Submit data using Ajax
		 * 
		 * @since   3.2.5
		 */
		$.ajax({
			url: wp_crm_system_quick_add_modal.ajax_url,
			type: 'post',
			dataType: "json",
			data: {
				action: 'wcs_ajax_add_post',
				nonce: wp_crm_system_quick_add_modal.nonce,
				formdata: $("#wcs-form-contact").serialize(),
			},
			success: function (response) {
				if (response.code === 200) {
					$('#wcs-modal-contact .modal-content .modal-body .message').removeClass('error').addClass('success');
					$('#wcs-modal-contact .modal-content .modal-body .message').text(response.message);

					/**
					 * Search wildcard ID for organisation input
					 * 
					 * @since	3.2.5
					 */
					wcs_assign_entry($("[id$=attach-to-contact-input]").attr('id'), response.id, response.contact);
					setTimeout(function () {
						wcs_close_quick_modal();
					}, 2000);
				} else {
					$('#wcs-modal-contact .modal-content .modal-body .message').removeClass('success').addClass('error');
					$('#wcs-modal-contact .modal-content .modal-body .message').text(response.message);
				}
			},
			error: function (response, status, error) {
				$('#wcs-modal-contact .modal-content .modal-body .message').removeClass('success').addClass('error');
				if (response.code !== 200) {
					$('#wcs-modal-contact .modal-content .modal-body .message').text(response.message);
				}
				setTimeout(function () {
					wcs_close_quick_modal();
				}, 2000);
			},
		});
	});

	/**
	 * Submitting the modal form should prevent default
	 * 
	 * For Project modal
	 * 
	 * @since   3.2.5
	 */
	$(document).on('click', '.wcs-modal-submit.project', function (e) {
		e.preventDefault();

		/**
		 * Submit data using Ajax
		 * 
		 * @since   3.2.5
		 */
		$.ajax({
			url: wp_crm_system_quick_add_modal.ajax_url,
			type: 'post',
			dataType: "json",
			data: {
				action: 'wcs_ajax_add_post',
				nonce: wp_crm_system_quick_add_modal.nonce,
				formdata: $("#wcs-form-project").serialize(),
				description: tinymce.get('description').getContent(),
			},
			success: function (response) {
				if (response.code === 200) {
					$('#wcs-modal-project .modal-content .modal-body .message').removeClass('error').addClass('success');
					$('#wcs-modal-project .modal-content .modal-body .message').text(response.message);

					/**
					 * Search wildcard ID for organisation input
					 * 
					 * @since	3.2.5
					 */
					wcs_assign_entry($("[id$=attach-to-project-input]").attr('id'), response.id, response.project);
					setTimeout(function () {
						wcs_close_quick_modal();
					}, 2000);
					tinymce.get('description').setContent('');

					if (response.link) {
						if ($('.day-number-wrapper-' + response.day).find("ul").length > 0) {
							$('.day-number-wrapper-' + response.day + ' ul').append(response.link);
						} else {
							$('.day-number-wrapper-' + response.day).append('<ul>' + response.link + '</ul>');
						}
					}
				} else {
					$('#wcs-modal-project .modal-content .modal-body .message').removeClass('success').addClass('error');
					$('#wcs-modal-project .modal-content .modal-body .message').text(response.message);
				}
			},
			error: function (response, status, error) {
				$('#wcs-modal-project .modal-content .modal-body .message').removeClass('success').addClass('error');
				if (response.code !== 200) {
					$('#wcs-modal-project .modal-content .modal-body .message').text(response.message);
				}
				setTimeout(function () {
					wcs_close_quick_modal();
				}, 2000);
			},
		});
	});

	/**
	 * Submitting the modal form should prevent default
	 * 
	 * For Campaign modal
	 * 
	 * @since   3.2.5
	 */
	$(document).on('click', '.wcs-modal-submit.campaign', function (e) {
		e.preventDefault();

		/**
		 * Submit data using Ajax
		 * 
		 * @since   3.2.5
		 */
		$.ajax({
			url: wp_crm_system_quick_add_modal.ajax_url,
			type: 'post',
			dataType: "json",
			data: {
				action: 'wcs_ajax_add_post',
				nonce: wp_crm_system_quick_add_modal.nonce,
				formdata: $("#wcs-form-campaign").serialize(),
				description: tinymce.get('wcs_quick_add_campaign_description').getContent(),
			},
			success: function (response) {
				if (response.code === 200) {
					$('#wcs-modal-campaign .modal-content .modal-body .message').removeClass('error').addClass('success');
					$('#wcs-modal-campaign .modal-content .modal-body .message').text(response.message);

					/**
					 * Search wildcard ID for organisation input
					 * 
					 * @since	3.2.5
					 */
					wcs_assign_entry($("[id$=attach-to-campaign-input]").attr('id'), response.id, response.campaign);
					setTimeout(function () {
						wcs_close_quick_modal();
					}, 2000);
					tinymce.get('wcs_quick_add_campaign_description').setContent('');

					if (response.link) {
						if ($('.day-number-wrapper-' + response.start_day).find("ul").length > 0) {
							$('.day-number-wrapper-' + response.start_day + ' ul').append(response.link);
						} else {
							$('.day-number-wrapper-' + response.start_day).append('<ul>' + response.link + '</ul>');
						}

						if ($('.day-number-wrapper-' + response.end_day).find("ul").length > 0) {
							$('.day-number-wrapper-' + response.end_day + ' ul').append(response.link);
						} else {
							$('.day-number-wrapper-' + response.end_day).append('<ul>' + response.link + '</ul>');
						}
					}
				} else {
					$('#wcs-modal-campaign .modal-content .modal-body .message').removeClass('success').addClass('error');
					$('#wcs-modal-campaign .modal-content .modal-body .message').text(response.message);
				}
			},
			error: function (response, status, error) {
				$('#wcs-modal-campaign .modal-content .modal-body .message').removeClass('success').addClass('error');
				if (response.code !== 200) {
					$('#wcs-modal-campaign .modal-content .modal-body .message').text(response.message);
				}
				setTimeout(function () {
					wcs_close_quick_modal();
				}, 2000);
			},
		});
	});

	/**
	 * Submitting the modal form should prevent default
	 * 
	 * For Task modal
	 * 
	 * @since   3.2.6
	 */
	$(document).on('click', '.wcs-modal-submit.task', function (e) {
		e.preventDefault();

		/**
		 * Submit data using Ajax
		 * 
		 * @since   3.2.6
		 */
		$.ajax({
			url: wp_crm_system_quick_add_modal.ajax_url,
			type: 'post',
			dataType: "json",
			data: {
				action: 'wcs_ajax_add_post',
				nonce: wp_crm_system_quick_add_modal.nonce,
				formdata: $("#wcs-form-task").serialize(),
				description: tinymce.get('wcs_quick_add_task_description').getContent(),
			},
			success: function (response) {
				if (response.code === 200) {
					$('#wcs-modal-task .modal-content .modal-body .message').removeClass('error').addClass('success');
					$('#wcs-modal-task .modal-content .modal-body .message').text(response.message);

					setTimeout(function () {
						wcs_close_quick_modal();
					}, 2000);
					tinymce.get('wcs_quick_add_task_description').setContent('');

					if (response.link) {
						if ($('.day-number-wrapper-' + response.start_day).find("ul").length > 0) {
							$('.day-number-wrapper-' + response.start_day + ' ul').append(response.link);
						} else {
							$('.day-number-wrapper-' + response.start_day).append('<ul>' + response.link + '</ul>');
						}

						if ($('.day-number-wrapper-' + response.end_day).find("ul").length > 0) {
							$('.day-number-wrapper-' + response.end_day + ' ul').append(response.link);
						} else {
							$('.day-number-wrapper-' + response.end_day).append('<ul>' + response.link + '</ul>');
						}
					}
				} else {
					$('#wcs-modal-task .modal-content .modal-body .message').removeClass('success').addClass('error');
					$('#wcs-modal-task .modal-content .modal-body .message').text(response.message);
				}
			},
			error: function (response, status, error) {
				$('#wcs-modal-task .modal-content .modal-body .message').removeClass('success').addClass('error');
				if (response.code !== 200) {
					$('#wcs-modal-task .modal-content .modal-body .message').text(response.message);
				}
				setTimeout(function () {
					wcs_close_quick_modal();
				}, 2000);
			},
		});
	});

	/**
	 * Submitting the modal form should prevent default
	 * 
	 * For Opportunity modal
	 * 
	 * @since   3.2.6
	 */
	$(document).on('click', '.wcs-modal-submit.opportunity', function (e) {
		e.preventDefault();
		var day = $(this).data('day');

		/**
		 * Submit data using Ajax
		 * 
		 * @since   3.2.6
		 */
		$.ajax({
			url: wp_crm_system_quick_add_modal.ajax_url,
			type: 'post',
			dataType: "json",
			data: {
				action: 'wcs_ajax_add_post',
				nonce: wp_crm_system_quick_add_modal.nonce,
				formdata: $("#wcs-form-opportunity").serialize(),
				description: tinymce.get('wcs_quick_add_opportunity_description').getContent(),
				day: day,
			},
			success: function (response) {
				if (response.code === 200) {
					$('#wcs-modal-opportunity .modal-content .modal-body .message').removeClass('error').addClass('success');
					$('#wcs-modal-opportunity .modal-content .modal-body .message').text(response.message);

					setTimeout(function () {
						wcs_close_quick_modal();
					}, 2000);
					tinymce.get('wcs_quick_add_opportunity_description').setContent('');

					if (response.link) {
						if ($('.day-number-wrapper-' + response.day).find("ul").length > 0) {
							$('.day-number-wrapper-' + response.day + ' ul').append(response.link);
						} else {
							$('.day-number-wrapper-' + response.day).append('<ul>' + response.link + '</ul>');
						}
					}
				} else {
					$('#wcs-modal-opportunity .modal-content .modal-body .message').removeClass('success').addClass('error');
					$('#wcs-modal-opportunity .modal-content .modal-body .message').text(response.message);
				}
			},
			error: function (response, status, error) {
				$('#wcs-modal-opportunity .modal-content .modal-body .message').removeClass('success').addClass('error');
				if (response.code !== 200) {
					$('#wcs-modal-opportunity .modal-content .modal-body .message').text(response.message);
				}
				setTimeout(function () {
					wcs_close_quick_modal();
				}, 2000);
			},
		});
	});
});

/**
 * Close modal
 * 
 * Loop on the given form, then clean them up
 * Make exemption on the submit button and hidden fields
 * 
 * @since 3.2.5
 */
function wcs_close_quick_modal() {
	jQuery('.wcs-modal *').filter(':input:not([type=submit]):not([type=hidden])').each(function () {
		jQuery(this).val('');
	});
	jQuery('.message').text('');
	jQuery('.message').removeClass('success error');
	jQuery('.wcs-modal').removeClass('is-open');
}

/**
 * Set the default value for the Chosen right after adding new entry
 * 
 * @param	select_id	Chosen ID - fetch using wildcard search
 * @param	post_id		WP post ID returned from the response
 * @param	data		A list of recent entries fetch after successful adding new one
 * 
 * @since 3.2.5
 */
function wcs_assign_entry(select_id, post_id, data) {
	jQuery('select#' + select_id).empty().trigger('chosen:updated');
	jQuery.each(data, function (index, value) {
		jQuery('select#' + select_id).append('<option value="' + value.ID + '">' + value.name + '</option>');
	});
	jQuery('select#' + select_id).val(post_id).trigger('chosen:updated');
}
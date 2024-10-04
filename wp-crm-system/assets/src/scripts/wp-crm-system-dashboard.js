jQuery(window).on("load", function(){
  jQuery('.wpcrm-dashboard').each(function() {
    // Get height of each .wpcrm-dashboard div
    var divh = jQuery(this).height();
    // if divh > 315 the default height, set height of .wpcrm-dashboard to divh
    if (divh > "315") {
      jQuery(".wpcrm-dashboard").css('height', divh +"px" );
    }
  });
  
  jQuery('.js-open-popup').each(function(){
      jQuery(this).click(function(){
        let dataContent =  jQuery(this).attr('data-content');
        let popupContainer = jQuery(`.popup-container[data-content=${dataContent}]`)
        
        popupContainer.addClass('is-active');
        jQuery('body').addClass('is-scroll-disabled');
        popupContainer.on('click', function(event){
          if( jQuery(event.target).is(this)){
            jQuery(this).removeClass('is-active')
            jQuery('body').removeClass('is-scroll-disabled');
          }
        })  
      })
  })

});

jQuery(document).ready(function ($) {
	/**
	  * Trigger the modal to show
	  * 
	  * @since   3.2.5
	  */
	 $(document).on('click', '.dashboard-quick-add', function (e) {
		e.preventDefault();
		var day = $(this).data('day');
		$('.wcs-modal.quick-add-init').addClass('is-open');
		$('.wcs-modal.quick-add-init a').attr('data-day', day);
		$('.wcs-modal.quick-add-init a').attr('data-fulldate', $(this).data('fulldate'));

		/**
		 * Bugfix
		 * 
		 * Make dates consistent with recent data
		 */
		$('.wcs-modal.wcs-project .modal-content .modal-body #close_date').val($(this).data('fulldate'));
		$('.wcs-modal.wcs-task .modal-content .modal-body #task_start_date').val($(this).data('fulldate'));
		$('.wcs-modal.wcs-task .modal-content .modal-body #due_date').val($(this).data('fulldate'));
		$('.wcs-modal.wcs-opportunity .modal-content .modal-body #oppor_date').val($(this).data('fulldate'));
		$('.wcs-modal.wcs-campaign .modal-content .modal-body #start_date').val($(this).data('fulldate'));
		$('.wcs-modal.wcs-campaign .modal-content .modal-body #end_date').val($(this).data('fulldate'));
	});

	$(document).on('click', '.quick-add.contact', function (e) {
		e.preventDefault();
		$('.wcs-modal.wcs-contact').addClass('is-open');
		$('.wcs-modal.wcs-contact .modal-content .modal-body input[type="submit"]').attr('data-day', $(this).data('day'));
		$('.wcs-modal.wcs-contact .modal-content .modal-body input[type="submit"]').attr('data-fulldate', $(this).data('fulldate'));
	});
	$(document).on('click', '.quick-add.project', function (e) {
		e.preventDefault();
		$('.wcs-modal.wcs-project').addClass('is-open');
		$('.wcs-modal.wcs-project .modal-content .modal-body input[type="submit"]').attr('data-day', $(this).data('day'));
		$('.wcs-modal.wcs-project .modal-content .modal-body input[type="submit"]').attr('data-fulldate', $(this).data('fulldate'));
	});
	$(document).on('click', '.quick-add.task', function (e) {
		e.preventDefault();
		$('.wcs-modal.wcs-task').addClass('is-open');
		$('.wcs-modal.wcs-task .modal-content .modal-body input[type="submit"]').attr('data-day', $(this).data('day'));
		$('.wcs-modal.wcs-task .modal-content .modal-body input[type="submit"]').attr('data-fulldate', $(this).data('fulldate'));
	});
	$(document).on('click', '.quick-add.opportunity', function (e) {
		e.preventDefault();
		$('.wcs-modal.wcs-opportunity').addClass('is-open');
		$('.wcs-modal.wcs-opportunity .modal-content .modal-body input[type="submit"]').attr('data-day', $(this).data('day'));
		$('.wcs-modal.wcs-opportunity .modal-content .modal-body input[type="submit"]').attr('data-fulldate', $(this).data('fulldate'));
	});
	$(document).on('click', '.quick-add.campaign', function (e) {
		e.preventDefault();
		$('.wcs-modal.wcs-campaign').addClass('is-open');
		$('.wcs-modal.wcs-campaign .modal-content .modal-body input[type="submit"]').attr('data-day', $(this).data('day'));
		$('.wcs-modal.wcs-campaign .modal-content .modal-body input[type="submit"]').attr('data-fulldate', $(this).data('fulldate'));
	});
	$(document).on('click', '.quick-add.organization', function (e) {
		e.preventDefault();
		$('.wcs-modal.wcs-organization').addClass('is-open');
		$('.wcs-modal.wcs-organization .modal-content .modal-body input[type="submit"]').attr('data-day', $(this).data('day'));
		$('.wcs-modal.wcs-organization .modal-content .modal-body input[type="submit"]').attr('data-fulldate', $(this).data('fulldate'));
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
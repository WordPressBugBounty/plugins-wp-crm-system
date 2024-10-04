<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( ! is_admin() ) {
	return;
}
if ( defined( 'DOING_AJAX' ) ) {
	return;
}

/**
 * wp_editor() won't work directly
 * Make sure to initialise
 *
 * @since   3.2.5
 *
 * Update: Use admin_footer so that the modal markup won't be visible right away
 *
 * @since   3.2.5.1
 */
add_action( 'admin_footer', 'wcs_dashboard_modal_quick_add' );
function wcs_dashboard_modal_quick_add() {
	?>
<div class="wcs-modal quick-add-init">
	<div class="modal-content">
		<div class="modal-header">
			<span class="close">&times;</span>
			<h2><?php _e( 'Add new', 'wp-crm-system' ); ?></h2>
		</div>
		<div class="modal-body">
			<p class="description">
				<?php _e( 'Select type of CRM data you would like to add.', 'wp-crm-system' ); ?>
			</p>
			<p><a href="#" class="quick-add organization"><img src="<?php echo WP_CRM_SYSTEM_URL; ?>/assets/dist/images/plus-33-256.png" width="16"></a><?php _e( 'Organization', 'wp-crm-system' ); ?></p>
			<p><a href="#" class="quick-add contact"><img src="<?php echo WP_CRM_SYSTEM_URL; ?>/assets/dist/images/plus-33-256.png" width="16"></a><?php _e( 'Contact', 'wp-crm-system' ); ?></p>
			<p><a href="#" class="quick-add opportunity"><img src="<?php echo WP_CRM_SYSTEM_URL; ?>/assets/dist/images/plus-33-256.png" width="16"></a><?php _e( 'Opportunity', 'wp-crm-system' ); ?></p>
			<p><a href="#" class="quick-add project"><img src="<?php echo WP_CRM_SYSTEM_URL; ?>/assets/dist/images/plus-33-256.png" width="16"></a><?php _e( 'Project', 'wp-crm-system' ); ?></p>
			<p><a href="#" class="quick-add task"><img src="<?php echo WP_CRM_SYSTEM_URL; ?>/assets/dist/images/plus-33-256.png" width="16"></a><?php _e( 'Task', 'wp-crm-system' ); ?></p>
			<p><a href="#" class="quick-add campaign"><img src="<?php echo WP_CRM_SYSTEM_URL; ?>/assets/dist/images/plus-33-256.png" width="16"></a><?php _e( 'Campaign', 'wp-crm-system' ); ?></p>
		</div>
	</div>
</div>

<div id="wcs-modal-organization" class="wcs-modal wcs-organization">
	<div class="modal-content">
		<div class="modal-header">
			<span class="close">&times;</span>
			<h2><?php _e( 'Add Organization', 'wp-crm-system' ); ?></h2>
		</div>
		<div class="modal-body">
			<p class="message"></p>
			<form action="" class="quick-add" id="wcs-form-organization">
			<input name="wcs-post-type" value="organization" type="hidden">
			<p class="wcs-required"><?php _e( 'Fields with (*) are required!', 'wp-crm-system' ); ?></p>
			<p>
				<label for="name"><?php _e( 'Name: ', 'wp-crm-system' ); ?><span class="wcs-required"> *</span></label>
				<input id="name" name="name" type="text">
			</p>
			<p>
				<label for="phone"><?php _e( 'Phone: ', 'wp-crm-system' ); ?></label>
				<input id="phone" name="phone" type="tel">
			</p>
			<p>
				<label for="email"><?php _e( 'Email: ', 'wp-crm-system' ); ?><span class="wcs-required"> *</span></label>
				<input id="email" name="email" type="email">
			</p>
			<p>
				<label for="website"><?php _e( 'Website: ', 'wp-crm-system' ); ?></label>
				<input id="website" name="website" type="url">
			</p>
			<p>
				<label for="address_1"><?php _e( 'Address 1: ', 'wp-crm-system' ); ?></label>
				<input id="address_1" name="address1" type="text">
			</p>
			<p>
				<label for="address_2"><?php _e( 'Address 2: ', 'wp-crm-system' ); ?></label>
				<input id="address_2" name="address2" type="text">
			</p>
			<p>
				<label for="city"><?php _e( 'City: ', 'wp-crm-system' ); ?></label>
				<input id="city" name="city" type="text">
			</p>
			<p>
				<label for="state"><?php _e( 'State/Province: ', 'wp-crm-system' ); ?></label>
				<input id="state" name="state" type="text">
			</p>
			<p>
				<label for="postal"><?php _e( 'Postal Code: ', 'wp-crm-system' ); ?></label>
				<input id="postal" name="postal" type="text">
			</p>
			<p>
				<label for="country"><?php _e( 'Country: ', 'wp-crm-system' ); ?></label>
				<input id="country" name="country" type="text">
			</p>
			<p><input type="submit" class="button button-primary wcs-modal-submit organization" value="<?php _e( 'Add', 'wp-crm-system' ); ?>"></p>
			</form>
		</div>
	</div>
</div>
<div id="wcs-modal-contact" class="wcs-modal wcs-contact">
	<div class="modal-content">
		<div class="modal-header">
			<span class="close">&times;</span>
			<h2><?php _e( 'Add Contact', 'wp-crm-system' ); ?></h2>
		</div>
		<div class="modal-body">
			<p class="message"></p>
			<form action="" class="quick-add" id="wcs-form-contact">
			<input name="wcs-post-type" value="contact" type="hidden">
			<p class="wcs-required"><?php _e( 'Fields with (*) are required!', 'wp-crm-system' ); ?></p>
			<p>
				<label for="name_prefix"><?php _e( 'Name Prefix: ', 'wp-crm-system' ); ?></label>
				<select id="name_prefix" name="name_prefix">
				<?php
				$args = array(
					''       => __( 'Select an Option', 'wp-crm-system' ),
					'mr'     => _x( 'Mr.', 'Title for male without a higher professional title.', 'wp-crm-system' ),
					'mrs'    => _x( 'Mrs.', 'Married woman or woman who has been married with no higher professional title.', 'wp-crm-system' ),
					'miss'   => _x( 'Miss', 'An unmarried woman. Also Ms.', 'wp-crm-system' ),
					'ms'     => _x( 'Ms.', 'An unmarried woman. Also Miss.', 'wp-crm-system' ),
					'dr'     => _x( 'Dr.', 'Doctor', 'wp-crm-system' ),
					'master' => _x( 'Master', 'Title used for young men.', 'wp-crm-system' ),
					'coach'  => _x( 'Coach', 'Title used for the person in charge of a sports team', 'wp-crm-system' ),
					'rev'    => _x( 'Rev.', 'Title of a priest or religious clergy - Reverend ', 'wp-crm-system' ),
					'fr'     => _x( 'Fr.', 'Title of a priest or religious clergy - Father', 'wp-crm-system' ),
					'atty'   => _x( 'Atty.', 'Attorney, or lawyer', 'wp-crm-system' ),
					'prof'   => _x( 'Prof.', 'Professor, as in a teacher at a university.', 'wp-crm-system' ),
					'hon'    => _x( 'Hon.', 'Honorable - often used for elected officials or judges.', 'wp-crm-system' ),
					'pres'   => _x( 'Pres.', 'Term given to the head of an organization or country. As in President of a University or President of the United States', 'wp-crm-system' ),
					'gov'    => _x( 'Gov.', 'Governor, as in the Governor of the State of New York.', 'wp-crm-system' ),
					'ofc'    => _x( 'Ofc.', 'Officer as in a police officer.', 'wp-crm-system' ),
					'supt'   => _x( 'Supt.', 'Superintendent', 'wp-crm-system' ),
					'rep'    => _x( 'Rep.', 'Representative - as in an elected official to the House of Representatives', 'wp-crm-system' ),
					'sen'    => _x( 'Sen.', 'An elected official - Senator.', 'wp-crm-system' ),
					'amb'    => _x( 'Amb.', 'Ambassador - a diplomatic official.', 'wp-crm-system' ),
				);
				if ( has_filter( 'wpcrmsystem_name_prefix' ) ) {
					$args = apply_filters( 'wpcrmsystem_name_prefix', $args );
				}

				/**
				 * We use output buffering to avoid "header already sent" issue
				 *
				 * @since   3.2.5
				 */
				ob_start();
				foreach ( $args as $key => $value ) {
					printf( '<option value="%s">%s</option>', sanitize_text_field( $key ), sanitize_text_field( $value ) );
				}
				ob_flush();
				?>
				</select>
			</p>
			<p>
				<label for="first_name"><?php _e( 'First Name:', 'wp-crm-system' ); ?><span class="wcs-required"> *</span></label>
				<input id="first_name" name="first_name" type="text">
			</p>
			<p>
				<label for="last_name"><?php _e( 'Last Name:', 'wp-crm-system' ); ?><span class="wcs-required"> *</span></label>
				<input id="last_name" name="last_name" type="text">
			</p>
			<p>
				<label for="email"><?php _e( 'Email:', 'wp-crm-system' ); ?><span class="wcs-required"> *</span></label>
				<input id="email" name="email" type="email">
			</p>
			<p>
				<label for="phone"><?php _e( 'Phone: ', 'wp-crm-system' ); ?></label>
				<input id="phone" name="phone" type="tel">
			</p>
			<p>
				<label for="website"><?php _e( 'Website: ', 'wp-crm-system' ); ?></label>
				<input id="website" name="website" type="url">
			</p>
			<p>
				<label for="address_1"><?php _e( 'Address 1: ', 'wp-crm-system' ); ?></label>
				<input id="address_1" name="address1" type="text">
			</p>
			<p>
				<label for="address_2"><?php _e( 'Address 2: ', 'wp-crm-system' ); ?></label>
				<input id="address_2" name="address2" type="text">
			</p>
			<p>
				<label for="city"><?php _e( 'City: ', 'wp-crm-system' ); ?></label>
				<input id="city" name="city" type="text">
			</p>
			<p>
				<label for="state"><?php _e( 'State/Province: ', 'wp-crm-system' ); ?></label>
				<input id="state" name="state" type="text">
			</p>
			<p>
				<label for="postal"><?php _e( 'Postal Code: ', 'wp-crm-system' ); ?></label>
				<input id="postal" name="postal" type="text">
			</p>
			<p>
				<label for="country"><?php _e( 'Country: ', 'wp-crm-system' ); ?></label>
				<input id="country" name="country" type="text">
			</p>
			<p><input type="submit" class="button button-primary wcs-modal-submit contact" value="<?php _e( 'Add', 'wp-crm-system' ); ?>"></p>
			</form>
		</div>
	</div>
</div>
<div id="wcs-modal-project" class="wcs-modal wcs-project">
	<div class="modal-content">
		<div class="modal-header">
			<span class="close">&times;</span>
			<h2><?php _e( 'Add Project', 'wp-crm-system' ); ?></h2>
		</div>
		<div class="modal-body">
			<p class="message"></p>
			<form action="" class="quick-add" id="wcs-form-project">
			<input name="wcs-post-type" value="project" type="hidden">
			<p class="wcs-required"><?php _e( 'Fields with (*) are required!', 'wp-crm-system' ); ?></p>
			<p>
				<label for="name"><?php _e( 'Name:', 'wp-crm-system' ); ?><span class="wcs-required"> *</span></label>
				<input id="name" name="name" type="text">
			</p>
			<p>
				<label for="value"><?php _e( 'Value:', 'wp-crm-system' ); ?><span class="wcs-required"> *</span></label>
				<input id="value" name="value" type="text">
			</p>
			<p>
				<label for="close_date"><?php _e( 'Close Date: ', 'wp-crm-system' ); ?></label>
				<input id="close_date" name="close_date" type="text" class="datepicker">
			</p>
			<p>
				<label for="status"><?php _e( 'Status: ', 'wp-crm-system' ); ?></label>
				<select id="status" name="status">
				<?php
				$args = array(
					'not-started' => _x( 'Not Started', 'Work has not yet begun.', 'wp-crm-system' ),
					'in-progress' => _x( 'In Progress', 'Work has begun but is not complete.', 'wp-crm-system' ),
					'complete'    => _x( 'Complete', 'All tasks are finished. No further work is needed.', 'wp-crm-system' ),
					'on-hold'     => _x( 'On Hold', 'Work may be in various stages of completion, but has been stopped for one reason or another.', 'wp-crm-system' ),
				);

				if ( has_filter( 'wpcrmsystem_field_status' ) ) {
					$args = apply_filters( 'wpcrmsystem_field_status', $args );
				}

				/**
				 * We use output buffering to avoid "header already sent" issue
				 *
				 * @since   3.2.5
				 */
				ob_start();
				foreach ( $args as $key => $value ) {
					printf( '<option value="%s">%s</option>', sanitize_text_field( $key ), sanitize_text_field( $value ) );
				}
				ob_flush();
				?>
				</select>
			</p>
			<p>
				<label for="progress"><?php _e( 'Progress: ', 'wp-crm-system' ); ?></label>
				<select id="progress" name="progress">
				<?php
				$args = array(
					'zero' => 0,
					5      => 5,
					10     => 10,
					15     => 15,
					20     => 20,
					25     => 25,
					30     => 30,
					35     => 35,
					40     => 40,
					45     => 45,
					50     => 50,
					55     => 55,
					60     => 60,
					65     => 65,
					70     => 70,
					75     => 75,
					80     => 80,
					85     => 85,
					90     => 90,
					95     => 95,
					100    => 100,
				);
				if ( has_filter( 'wpcrmsystem_field_progress' ) ) {
					$args = apply_filters( 'wpcrmsystem_field_progress', $args );
				}

				/**
				 * We use output buffering to avoid "header already sent" issue
				 *
				 * @since   3.2.5
				 */
				ob_start();
				foreach ( $args as $key => $value ) {
					printf( '<option value="%s">%s&#37;</option>', sanitize_text_field( $key ), sanitize_text_field( $value ) );
				}
				ob_flush();
				?>
				</select>
			</p>
			<p>
				<label for="description"><?php _e( 'Description: ', 'wp-crm-system' ); ?></label>
				<?php
				/**
				 * We use output buffering to avoid "header already sent" issue
				 *
				 * @since   3.2.5
				 */
				ob_start();
				wp_editor(
					'',
					'description',
					array(
						'media_buttons' => false,
						'quicktags'     => false,
						'editor_height' => 200,
					)
				);
				ob_flush();
				?>
			</p>
			<p><input type="submit" class="button button-primary wcs-modal-submit project" value="<?php _e( 'Add', 'wp-crm-system' ); ?>"></p>
			</form>
		</div>
	</div>
</div>
<div id="wcs-modal-campaign" class="wcs-modal wcs-campaign">
	<div class="modal-content">
		<div class="modal-header">
			<span class="close">&times;</span>
			<h2><?php _e( 'Add Campaign', 'wp-crm-system' ); ?></h2>
		</div>
		<div class="modal-body">
			<p class="message"></p>
			<form action="" class="quick-add" id="wcs-form-campaign">
			<input name="wcs-post-type" value="campaign" type="hidden">
			<p class="wcs-required"><?php _e( 'Fields with (*) are required!', 'wp-crm-system' ); ?></p>
			<p>
				<label for="name"><?php _e( 'Name:', 'wp-crm-system' ); ?><span class="wcs-required"> *</span></label>
				<input id="name" name="name" type="text">
			</p>
			<p>
				<label for="assign_to"><?php _e( 'Assign To: ', 'wp-crm-system' ); ?></label>
				<select id="assign_to" name="assign_to">
				<?php
				$users        = get_users();
				$wp_crm_users = array();
				foreach ( $users as $user ) {
					if ( $user->has_cap( get_option( 'wpcrm_system_select_user_role' ) ) ) {
						$wp_crm_users[] = $user->data->user_login;
					}
				}

				/**
				 * We use output buffering to avoid "header already sent" issue
				 *
				 * @since   3.2.5
				 */
				ob_start();
				printf( '<option value="%s">%s</option>', '', __( 'Not Assigned', 'wp-crm-system' ) );
				foreach ( $wp_crm_users as $key => $value ) {
					printf( '<option value="%s">%s</option>', sanitize_text_field( $value ), sanitize_text_field( $value ) );
				}
				ob_flush();
				?>
				</select>
			</p>
			<p>
				<label for="status"><?php _e( 'Status: ', 'wp-crm-system' ); ?></label>
				<select id="status" name="status">
				<?php
				$args = array(
					'not-started' => _x( 'Not Started', 'Work has not yet begun.', 'wp-crm-system' ),
					'in-progress' => _x( 'In Progress', 'Work has begun but is not complete.', 'wp-crm-system' ),
					'complete'    => _x( 'Complete', 'All tasks are finished. No further work is needed.', 'wp-crm-system' ),
					'on-hold'     => _x( 'On Hold', 'Work may be in various stages of completion, but has been stopped for one reason or another.', 'wp-crm-system' ),
				);

				if ( has_filter( 'wpcrmsystem_field_status' ) ) {
					$args = apply_filters( 'wpcrmsystem_field_status', $args );
				}

				/**
				 * We use output buffering to avoid "header already sent" issue
				 *
				 * @since   3.2.5
				 */
				ob_start();
				foreach ( $args as $key => $value ) {
					printf( '<option value="%s">%s</option>', sanitize_text_field( $key ), sanitize_text_field( $value ) );
				}
				ob_flush();
				?>
				</select>
			</p>
			<p>
				<label for="start_date"><?php _e( 'Start Date: ', 'wp-crm-system' ); ?></label>
				<input id="start_date" name="start_date" type="text" class="datepicker">
			</p>
			<p>
				<label for="end_date"><?php _e( 'End Date: ', 'wp-crm-system' ); ?></label>
				<input id="end_date" name="end_date" type="text" class="datepicker">
			</p>
			<p>
				<label for="projected_reach"><?php _e( 'Projected Reach: ', 'wp-crm-system' ); ?></label>
				<input id="projected_reach" name="projected_reach" type="number">
			</p>
			<p>
				<label for="total_responses"><?php _e( 'Total Responses: ', 'wp-crm-system' ); ?></label>
				<input id="total_responses" name="total_responses" type="number">
			</p>
			<p>
				<label for="budgeted_cost"><?php _e( 'Budgeted Cost:', 'wp-crm-system' ); ?><span class="wcs-required"> *</span></label>
				<input id="budgeted_cost" name="budgeted_cost" type="number">
			</p>
			<p>
				<label for="actual_cost"><?php _e( 'Actual Cost:', 'wp-crm-system' ); ?><span class="wcs-required"> *</span></label>
				<input id="actual_cost" name="actual_cost" type="number">
			</p>
			<p>
				<label for="campaign_description"><?php _e( 'Description: ', 'wp-crm-system' ); ?></label>
				<?php
				/**
				 * We use output buffering to avoid "header already sent" issue
				 *
				 * @since   3.2.5
				 */
				ob_start();
				wp_editor(
					'',
					'wcs_quick_add_campaign_description',
					array(
						'media_buttons' => false,
						'quicktags'     => false,
						'editor_height' => 200,
					)
				);
				ob_flush();
				?>
			</p>
			<p><input type="submit" class="button button-primary wcs-modal-submit campaign" value="<?php _e( 'Add', 'wp-crm-system' ); ?>"></p>
			</form>
		</div>
	</div>
</div>

<div id="wcs-modal-task" class="wcs-modal wcs-task">
	<div class="modal-content">
		<div class="modal-header">
			<span class="close">&times;</span>
			<h2><?php _e( 'Add Task', 'wp-crm-system' ); ?></h2>
		</div>
		<div class="modal-body">
			<p class="message"></p>
			<form action="" class="quick-add" id="wcs-form-task">
			<input name="wcs-post-type" value="task" type="hidden">
			<p class="wcs-required"><?php _e( 'Fields with (*) are required!', 'wp-crm-system' ); ?></p>
			<p>
				<label for="name"><?php _e( 'Name:', 'wp-crm-system' ); ?><span class="wcs-required"> *</span></label>
				<input id="name" name="name" type="text">
			</p>
			<p>
				<label for="assign_to"><?php _e( 'Assign To: ', 'wp-crm-system' ); ?></label>
				<select id="assign_to" name="task_assign_to">
				<?php
				$users        = get_users();
				$wp_crm_users = array();
				foreach ( $users as $user ) {
					if ( $user->has_cap( get_option( 'wpcrm_system_select_user_role' ) ) ) {
						$wp_crm_users[] = $user->data->user_login;
					}
				}

				/**
				 * We use output buffering to avoid "header already sent" issue
				 *
				 * @since   3.2.5
				 */
				ob_start();
				printf( '<option value="%s">%s</option>', '', __( 'Not Assigned', 'wp-crm-system' ) );
				foreach ( $wp_crm_users as $key => $value ) {
					printf( '<option value="%s">%s</option>', sanitize_text_field( $value ), sanitize_text_field( $value ) );
				}
				ob_flush();
				?>
				</select>
			</p>
			<p>
				<label for="task_start_date"><?php _e( 'Start Date: ', 'wp-crm-system' ); ?></label>
				<input id="task_start_date" name="task_start_date" type="text" class="datepicker">
			</p>
			<p>
				<label for="due_date"><?php _e( 'Due Date: ', 'wp-crm-system' ); ?></label>
				<input id="due_date" name="due_date" type="text" class="datepicker">
			</p>
			<p>
				<label for="progress"><?php _e( 'Progress: ', 'wp-crm-system' ); ?></label>
				<select id="progress" name="progress">
				<?php
				$args = array(
					'zero' => 0,
					5      => 5,
					10     => 10,
					15     => 15,
					20     => 20,
					25     => 25,
					30     => 30,
					35     => 35,
					40     => 40,
					45     => 45,
					50     => 50,
					55     => 55,
					60     => 60,
					65     => 65,
					70     => 70,
					75     => 75,
					80     => 80,
					85     => 85,
					90     => 90,
					95     => 95,
					100    => 100,
				);
				if ( has_filter( 'wpcrmsystem_field_progress' ) ) {
					$args = apply_filters( 'wpcrmsystem_field_progress', $args );
				}

				/**
				 * We use output buffering to avoid "header already sent" issue
				 *
				 * @since   3.2.5
				 */
				ob_start();
				foreach ( $args as $key => $value ) {
					printf( '<option value="%s">%s&#37;</option>', sanitize_text_field( $key ), sanitize_text_field( $value ) );
				}
				ob_flush();
				?>
				</select>
			</p>
			<p>
				<label for="priority"><?php _e( 'Priority: ', 'wp-crm-system' ); ?></label>
				<select id="priority" name="priority">
				<?php
				$args = array(
					''       => __( 'Select an option', 'wp-crm-system' ),
					'low'    => _x( 'Low', 'Not of great importance', 'wp-crm-system' ),
					'medium' => _x( 'Medium', 'Average priority', 'wp-crm-system' ),
					'high'   => _x( 'High', 'Greatest importance', 'wp-crm-system' ),
				);

				if ( has_filter( 'wpcrmsystem_field_priority' ) ) {
					$args = apply_filters( 'wpcrmsystem_field_priority', $args );
				}

				/**
				 * We use output buffering to avoid "header already sent" issue
				 *
				 * @since   3.2.5
				 */
				ob_start();
				foreach ( $args as $key => $value ) {
					printf( '<option value="%s">%s</option>', sanitize_text_field( $key ), sanitize_text_field( $value ) );
				}
				ob_flush();
				?>
				</select>
			</p>
			<p>
				<label for="status"><?php _e( 'Status: ', 'wp-crm-system' ); ?></label>
				<select id="status" name="status">
				<?php
				$args = array(
					'not-started' => _x( 'Not Started', 'Work has not yet begun.', 'wp-crm-system' ),
					'in-progress' => _x( 'In Progress', 'Work has begun but is not complete.', 'wp-crm-system' ),
					'complete'    => _x( 'Complete', 'All tasks are finished. No further work is needed.', 'wp-crm-system' ),
					'on-hold'     => _x( 'On Hold', 'Work may be in various stages of completion, but has been stopped for one reason or another.', 'wp-crm-system' ),
				);

				if ( has_filter( 'wpcrmsystem_field_status' ) ) {
					$args = apply_filters( 'wpcrmsystem_field_status', $args );
				}

				/**
				 * We use output buffering to avoid "header already sent" issue
				 *
				 * @since   3.2.5
				 */
				ob_start();
				foreach ( $args as $key => $value ) {
					printf( '<option value="%s">%s</option>', sanitize_text_field( $key ), sanitize_text_field( $value ) );
				}
				ob_flush();
				?>
				</select>
			</p>
			<p>
				<label for="description"><?php _e( 'Description: ', 'wp-crm-system' ); ?></label>
				<?php
				/**
				 * We use output buffering to avoid "header already sent" issue
				 *
				 * @since   3.2.5
				 */
				ob_start();
				wp_editor(
					'',
					'wcs_quick_add_task_description',
					array(
						'media_buttons' => false,
						'quicktags'     => false,
						'editor_height' => 200,
					)
				);
				ob_flush();
				?>
			</p>
			<p><input type="submit" class="button button-primary wcs-modal-submit task" value="<?php _e( 'Add', 'wp-crm-system' ); ?>"></p>
			</form>
		</div>
	</div>
</div>

<div  id="wcs-modal-opportunity" class="wcs-modal wcs-opportunity">
	<div class="modal-content">
		<div class="modal-header">
			<span class="close">&times;</span>
			<h2><?php _e( 'Add Opportunity', 'wp-crm-system' ); ?></h2>
		</div>
		<div class="modal-body">
			<p class="message"></p>
			<form action="" class="quick-add" id="wcs-form-opportunity">
			<input name="wcs-post-type" value="opportunity" type="hidden">
			<p class="wcs-required"><?php _e( 'Fields with (*) are required!', 'wp-crm-system' ); ?></p>
			<p>
				<label for="name"><?php _e( 'Name:', 'wp-crm-system' ); ?><span class="wcs-required"> *</span></label>
				<input id="name" name="name" type="text">
			</p>
			<p>
				<label for="assign_to"><?php _e( 'Assign To: ', 'wp-crm-system' ); ?></label>
				<select id="assign_to" name="assign_to">
				<?php
				$users        = get_users();
				$wp_crm_users = array();
				foreach ( $users as $user ) {
					if ( $user->has_cap( get_option( 'wpcrm_system_select_user_role' ) ) ) {
						$wp_crm_users[] = $user->data->user_login;
					}
				}

				/**
				 * We use output buffering to avoid "header already sent" issue
				 *
				 * @since   3.2.5
				 */
				ob_start();
				printf( '<option value="%s">%s</option>', '', __( 'Not Assigned', 'wp-crm-system' ) );
				foreach ( $wp_crm_users as $key => $value ) {
					printf( '<option value="%s">%s</option>', sanitize_text_field( $value ), sanitize_text_field( $value ) );
				}
				ob_flush();
				?>
				</select>
			</p>
			<p>
				<label for="progress"><?php _e( 'Progress: ', 'wp-crm-system' ); ?></label>
				<select id="progress" name="progress">
				<?php
				$args = array(
					'zero' => 0,
					5      => 5,
					10     => 10,
					15     => 15,
					20     => 20,
					25     => 25,
					30     => 30,
					35     => 35,
					40     => 40,
					45     => 45,
					50     => 50,
					55     => 55,
					60     => 60,
					65     => 65,
					70     => 70,
					75     => 75,
					80     => 80,
					85     => 85,
					90     => 90,
					95     => 95,
					100    => 100,
				);
				if ( has_filter( 'wpcrmsystem_field_progress' ) ) {
					$args = apply_filters( 'wpcrmsystem_field_progress', $args );
				}

				/**
				 * We use output buffering to avoid "header already sent" issue
				 *
				 * @since   3.2.5
				 */
				ob_start();
				foreach ( $args as $key => $value ) {
					printf( '<option value="%s">%s&#37;</option>', sanitize_text_field( $key ), sanitize_text_field( $value ) );
				}
				ob_flush();
				?>
				</select>
			</p>
			<p>
				<label for="oppor_date"><?php _e( 'Forecasted Close Date: ', 'wp-crm-system' ); ?><span class="wcs-required"> *</span></label>
				<input id="oppor_date" name="forecasted_close_date" type="text" class="datepicker">
			</p>
			<p>
				<label for="oppor_value"><?php _e( 'Value: ', 'wp-crm-system' ); ?><span class="wcs-required"> *</span></label>
				<input id="oppor_value" name="value" type="text" />
			</p>
			<p>
				<label for="won_lost"><?php _e( 'Won/Lost: ', 'wp-crm-system' ); ?></label>
				<select id="won_lost" name="won_lost">
				<?php
				$args = array(
					'not-set'   => __( 'Select an option', 'wp-crm-system' ),
					'won'       => __( 'Won', 'wp-crm-system' ),
					'lost'      => __( 'Lost', 'wp-crm-system' ),
					'suspended' => __( 'Suspended', 'wp-crm-system' ),
					'abandoned' => __( 'Abondoned', 'wp-crm-system' ),
				);
				if ( has_filter( 'wpcrmsystem_field_wonlost' ) ) {
					$args = apply_filters( 'wpcrmsystem_field_wonlost', $args );
				}

				/**
				 * We use output buffering to avoid "header already sent" issue
				 *
				 * @since   3.2.5
				 */
				ob_start();
				foreach ( $args as $key => $value ) {
					printf( '<option value="%s">%s</option>', sanitize_text_field( $key ), sanitize_text_field( $value ) );
				}
				ob_flush();
				?>
				</select>
			</p>
			<p>
				<label for="description"><?php _e( 'Description: ', 'wp-crm-system' ); ?></label>
				<?php
				/**
				 * We use output buffering to avoid "header already sent" issue
				 *
				 * @since   3.2.5
				 */
				ob_start();
				wp_editor(
					'',
					'wcs_quick_add_opportunity_description',
					array(
						'media_buttons' => false,
						'quicktags'     => false,
						'editor_height' => 200,
					)
				);
				ob_flush();
				?>
			</p>
			<p><input type="submit" class="button button-primary wcs-modal-submit opportunity" value="<?php _e( 'Add', 'wp-crm-system' ); ?>"></p>
			</form>
		</div>
	</div>
</div>
<?php } ?>

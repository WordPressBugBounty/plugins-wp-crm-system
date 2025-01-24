<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
function wp_crm_system_ajax_task_list() {
	if ( ! isset( $_POST['task_list_nonce'] ) || ! wp_verify_nonce( $_POST['task_list_nonce'], 'task-list-nonce' ) ) {
		die( 'Permissions check failed' );
	}

	if ( ! isset( $_POST['task_id'] ) ) {
		die( 'No task data sent' );
	}

	include WP_CRM_SYSTEM_PLUGIN_DIR . '/includes/wcs-vars.php';

	$task_id   = absint( $_POST['task_id'] );
	$task_meta = array(
		'attach-to-organization',
		'attach-to-contact',
		'attach-to-project',
		'assignment',
		'start-date',
		'due-date',
		'progress',
		'priority',
		'status',
	);
	$task_info = array();
	foreach ( $task_meta as $meta ) {
		$task_info[] = esc_html( get_post_meta( $task_id, '_wpcrm_task-' . $meta, true ) );
	}
	$title        = get_the_title( $task_id );
	$company      = '' != trim( $task_info['0'] ) ? '<a href="' . get_edit_post_link( $task_info['0'] ) . '">' . get_the_title( $task_info['0'] ) . '</a>' : '';
	$contact      = '' != trim( $task_info['1'] ) ? '<a href="' . get_edit_post_link( $task_info['1'] ) . '">' . get_the_title( $task_info['1'] ) . '</a>' : '';
	$project      = '' != trim( $task_info['2'] ) ? '<a href="' . get_edit_post_link( $task_info['2'] ) . '">' . get_the_title( $task_info['2'] ) . '</a>' : '';
	$user         = get_user_by( 'login', $task_info['3'] );
	$user_display = '';
	if ( ! empty( $user ) ) {
		$user_display = $user->display_name;
	}
	if( ! empty( $task_info['4'] ) ) {
		$startdate = date( get_option( 'wpcrm_system_php_date_format' ), $task_info['4'] ); 
	} else {
		$startdate = __( 'Not set', 'wp-crm-system' );
	}
	$duedate   = date( get_option( 'wpcrm_system_php_date_format' ), (int) $task_info['5'] );
	$priority  = wpcrm_system_display_priority( $task_info['7'] );
	$status    = wpcrm_system_display_status( $task_info['8'] );
	?>
	<table>
	<?php
	if ( '' != trim( $title ) ) {
		?>
		<tr>
			<td>
				<span class="wpcrm-system-help-tip dashicons dashicons-yes wpcrm-dashicons" title="<?php esc_html_e( 'Task Name', 'wp-crm-system' ); ?>"></span>
			</td>
			<td>
				<a href="<?php echo esc_url( get_edit_post_link( $task_id ) ); ?>"><?php echo esc_attr( trim( $title ) ); ?></a>
			</td>
		</tr>
		<?php
	}
	if ( '' != trim( $company ) ) {
		?>
		<tr>
			<td>
				<span class="wpcrm-system-help-tip dashicons dashicons-building wpcrm-dashicons" title="<?php esc_html_e( 'Company', 'wp-crm-system' ); ?>"></span>
			</td>
			<td>
				<?php echo wp_kses_post( $company ); ?>
			</td>
		</tr>
		<?php
	}
	if ( '' != trim( $contact ) ) {
		?>
		<tr>
			<td>
				<span class="wpcrm-system-help-tip dashicons dashicons-id wpcrm-dashicons" title="<?php esc_html_e( 'Contact Name', 'wp-crm-system' ); ?>"></span>
			</td>
			<td>
				<?php echo wp_kses_post( $contact ); ?>
			</td>
		</tr>
		<?php
	}
	if ( '' != trim( $project ) ) {
		?>
		<tr>
			<td>
				<span class="wpcrm-system-help-tip dashicons dashicons-clipboard wpcrm-dashicons" title="<?php esc_html_e( 'Related Project', 'wp-crm-system' ); ?>"></span>
			</td>
			<td>
				<?php echo wp_kses_post( $project ); ?>
			</td>
		</tr>
		<?php
	}
	if ( '' != trim( $user_display ) ) {
		?>
		<tr>
			<td>
				<span class="wpcrm-system-help-tip dashicons dashicons-businessman wpcrm-dashicons" title="<?php esc_html_e( 'Assigned to User', 'wp-crm-system' ); ?>"></span>
			</td>
			<td>
				<?php echo esc_attr( $user_display ); ?>
			</td>
		</tr>
		<?php
	}
	if ( '' != trim( $startdate ) ) {
		?>
		<tr>
			<td>
				<span class="wpcrm-system-help-tip dashicons dashicons-calendar-alt wpcrm-dashicons" title="<?php esc_html_e( 'Start Date', 'wp-crm-system' ); ?>"></span>
			</td>
			<td>
				<?php echo esc_attr( $startdate ); ?>
			</td>
		</tr>
		<?php
	}
	if ( '' != trim( $duedate ) ) {
		?>
		<tr>
			<td>
				<span class="wpcrm-system-help-tip dashicons dashicons-calendar-alt wpcrm-dashicons" title="<?php esc_html_e( 'Due Date', 'wp-crm-system' ); ?>"></span>
			</td>
			<td>
				<?php echo esc_attr( $duedate ); ?>
			</td>
		</tr>
		<?php
	}
	if ( '' != trim( $priority ) ) {
		?>
		<tr>
			<td>
				<span class="wpcrm-system-help-tip dashicons dashicons-warning wpcrm-dashicons" title="<?php esc_html_e( 'Priority', 'wp-crm-system' ); ?>"></span>
			</td>
			<td>
				<?php echo esc_attr( $priority ); ?>
			</td>
		</tr>
		<?php
	}
	if ( '' != trim( $status ) ) {
		?>
		<tr>
			<td>
				<span class="wpcrm-system-help-tip dashicons dashicons-admin-tools wpcrm-dashicons" title="<?php esc_html_e( 'Status', 'wp-crm-system' ); ?>"></span>
			</td>
			<td>
				<?php echo esc_attr( trim( $status ) ); ?>
			</td>
		</tr>
		<?php } ?>
	</table>
	<?php
	wp_die();
}
add_action( 'wp_ajax_task_list_response', 'wp_crm_system_ajax_task_list' );

function wpcrm_system_dashboard_task_js( $hook ) {
	wp_enqueue_script( 'wp_crm_system_dashboard_task_list', WP_CRM_SYSTEM_PLUGIN_URL . '/assets/dist/scripts/dashboard-task-list.js', array( 'jquery' ), WP_CRM_SYSTEM_VERSION, false );
	wp_localize_script(
		'wp_crm_system_dashboard_task_list',
		'task_list_vars',
		array(
			'task_list_nonce' => wp_create_nonce( 'task-list-nonce' ),
		)
	);
}
add_action( 'admin_enqueue_scripts', 'wpcrm_system_dashboard_task_js' );

function wpcrm_system_ajax_task_change_status() {
	$post_id     = isset( $_POST['post_id'] ) ? sanitize_text_field( $_POST['post_id'] ) : '';
	$task_status = isset( $_POST['task_status'] ) ? sanitize_text_field( $_POST['task_status'] ) : '';
	$meta        = 'status';

	$update_status = update_post_meta( $post_id, '_wpcrm_task-' . $meta, $task_status );

	if ( $update_status ) {
		echo 'success';
	} else {
		echo 'fail';
	}
	exit;
}
add_action( 'wp_ajax_task_change_status', 'wpcrm_system_ajax_task_change_status' );

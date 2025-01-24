<?php defined( 'ABSPATH' ) OR exit;
$active_tab = isset( $_GET[ 'tab' ] ) ? $_GET[ 'tab' ] : 'overview';
?>
<h2 class="nav-tab-wrapper">
	<a class="nav-tab <?php echo $active_tab == 'overview' ? 'nav-tab-active' : ''; ?>" href="?page=wpcrm-extensions&tab=overview"><?php esc_html_e( 'Overview', 'wp-crm-system' ) ?></a>
	<a class="nav-tab <?php echo $active_tab == 'plans' ? 'nav-tab-active' : ''; ?>" href="?page=wpcrm-extensions&tab=plans"><?php esc_html_e( 'Plans', 'wp-crm-system' ) ?></a>
</h2>
<?php
if ( !class_exists('wpCRMSystemExtensions') ) {
	class wpCRMSystemExtensions {
		public function __construct(){
			$this->plans = array(
				array(
					'title'			=>	__( 'Plus', 'wp-crm-system' ),
					'url'			=>	'https://www.wp-crm.com/downloads/zapier-connect/',
					'img'			=>	'/zapier-connect-300x145.jpg',
					'desc'			=>	__( 'Connect WP-CRM System data to over 1000 third party apps through Zapier.', 'wp-crm-system' ),
					'class'			=>	'WPCRM_ZAPIER_CONNECT',
				),
			);
			$this->extensions = array(
				array(
					'title'			=>	__( 'Zapier Connect', 'wp-crm-system' ),
					'url'			=>	'https://www.wp-crm.com/downloads/zapier-connect/',
					'img'			=>	'/zapier-connect-300x145.jpg',
					'desc'			=>	__( 'Connect WP-CRM System data to over 1000 third party apps through Zapier.', 'wp-crm-system' ),
					'class'			=>	'WPCRM_ZAPIER_CONNECT',
				),
				array(
					'title'			=>	__( 'Client Area', 'wp-crm-system' ),
					'overview'		=>	'yes',
					'contact-forms'	=>	'no',
					'import'		=>	'no',
					'notifications'	=>	'yes',
					'documents'		=>	'no',
					'url'			=>	'https://www.wp-crm.com/downloads/client-area/',
					'img'			=>	'/client-area-300x145.jpg',
					'desc'			=>	__( 'Create a portal for clients to see the status of their projects, tasks, campaigns, and invoices.', 'wp-crm-system' ),
					'class'			=>	'WPCRM_CLIENT_AREA',
				),
				array(
					'title'			=>	__( 'WooCommerce Connect', 'wp-crm-system' ),
					'overview'		=>	'yes',
					'contact-forms'	=>	'no',
					'import'		=>	'no',
					'notifications'	=>	'yes',
					'documents'		=>	'no',
					'url'			=>	'https://www.wp-crm.com/downloads/woocommerce-connect/',
					'img'			=>	'/woocommerce-connect-300x145.jpg',
					'desc'			=>	__( 'Get customer order history from contact record, and create new contacts from new customers in WooCommerce.', 'wp-crm-system' ),
					'class'			=>	'WPCRM_WOOCOMMERCE',
				),
				array(
					'title'			=>	__( 'Easy Digital Downloads Connect', 'wp-crm-system' ),
					'overview'		=>	'yes',
					'contact-forms'	=>	'no',
					'import'		=>	'no',
					'notifications'	=>	'yes',
					'documents'		=>	'no',
					'url'			=>	'https://www.wp-crm.com/downloads/easy-digital-downloads-connect/',
					'img'			=>	'/edd-connect-300x145.jpg',
					'desc'			=>	__( 'Get customer order history from contact record, and create new contacts from new customers in Easy Digital Downloads.', 'wp-crm-system' ),
					'class'			=>	'WPCRM_EDD',
				),
				array(
					'title'			=>	__( 'Less Accounting', 'wp-crm-system' ),
					'overview'		=>	'yes',
					'contact-forms'	=>	'no',
					'import'		=>	'no',
					'notifications'	=>	'yes',
					'documents'		=>	'no',
					'url'			=>	'https://www.wp-crm.com/downloads/less-accounting/',
					'img'			=>	'/less-accounting-300x145.jpg',
					'desc'			=>	__( 'Connect to Less Accounting to manage invoices, and client records.', 'wp-crm-system' ),
					'class'			=>	'WPCRM_LESS_ACCOUNTING',
				),
				array(
					'title'			=>	__( 'MailChimp Sync', 'wp-crm-system' ),
					'overview'		=>	'yes',
					'contact-forms'	=>	'no',
					'import'		=>	'no',
					'notifications'	=>	'yes',
					'documents'		=>	'no',
					'url'			=>	'https://www.wp-crm.com/downloads/mailchimp-sync/',
					'img'			=>	'/mailchimp-sync-300x145.jpg',
					'desc'			=>	__( 'Add WP-CRM System contacts to your MailChimp list.', 'wp-crm-system' ),
					'class'			=>	'WPCRM_MAILCHIMP_SYNC',
				),
				array(
					'title'			=>	__( 'Invoicing', 'wp-crm-system' ),
					'overview'		=>	'yes',
					'contact-forms'	=>	'no',
					'import'		=>	'no',
					'notifications'	=>	'no',
					'documents'		=>	'no',
					'url'			=>	'https://www.wp-crm.com/downloads/invoicing/',
					'img'			=>	'/invoicing-300x145.jpg',
					'desc'			=>	__( 'Send invoices and accept payments directly through WP-CRM System.', 'wp-crm-system' ),
					'class'			=>	'WPCRM_INVOICING',
				),
				array(
					'title'			=>	__( 'Custom Fields', 'wp-crm-system' ),
					'overview'		=>	'yes',
					'contact-forms'	=>	'no',
					'import'		=>	'yes',
					'notifications'	=>	'no',
					'documents'		=>	'no',
					'url'			=>	'https://www.wp-crm.com/downloads/custom-fields/',
					'img'			=>	'/custom-fields-300x145.jpg',
					'desc'			=>	__( 'Collect custom information for records in WP-CRM System.', 'wp-crm-system' ),
					'class'			=>	'WPCRM_CUSTOM_FIELDS',
				),
				array(
					'title'			=>	__( 'Zendesk Connect', 'wp-crm-system' ),
					'overview'		=>	'yes',
					'contact-forms'	=>	'no',
					'import'		=>	'no',
					'notifications'	=>	'yes',
					'documents'		=>	'no',
					'url'			=>	'https://www.wp-crm.com/downloads/zendesk-connect/',
					'img'			=>	'/zendesk-connect-300x145.jpg',
					'desc'			=>	__( 'Get up to date Zendesk ticket information from your WP-CRM System contacts.', 'wp-crm-system' ),
					'class'			=>	'WPCRM_ZENDESK',
				),
				array(
					'title'			=>	__( 'Dropbox Connect', 'wp-crm-system' ),
					'overview'		=>	'yes',
					'contact-forms'	=>	'no',
					'import'		=>	'no',
					'notifications'	=>	'no',
					'documents'		=>	'yes',
					'url'			=>	'https://www.wp-crm.com/downloads/dropbox-connect/',
					'img'			=>	'/dropbox-connect-300x145.jpg',
					'desc'			=>	__( 'Add documents from your Dropbox account to any record in WP-CRM System.', 'wp-crm-system' ),
					'class'			=>	'WPCRM_DROPBOX_CONNECT',
				),
				array(
					'title'			=>	__( 'Slack Notifications', 'wp-crm-system' ),
					'overview'		=>	'yes',
					'contact-forms'	=>	'no',
					'import'		=>	'no',
					'notifications'	=>	'yes',
					'documents'		=>	'no',
					'url'			=>	'https://www.wp-crm.com/downloads/slack-notifications/',
					'img'			=>	'/slack-notifications-300x145.jpg',
					'desc'			=>	__( 'Send notifications from WP-CRM System to a Slack channel.', 'wp-crm-system' ),
					'class'			=>	'WPCRM_SLACK_NOTIFICATIONS',
				),
				array(
					'title'			=>	__( 'Gravity Forms Connect', 'wp-crm-system' ),
					'overview'		=>	'yes',
					'contact-forms'	=>	'yes',
					'import'		=>	'no',
					'notifications'	=>	'no',
					'documents'		=>	'no',
					'url'			=>	'https://www.wp-crm.com/downloads/gravity-forms-connect/',
					'img'			=>	'/gravity-forms-connect-300x145.jpg',
					'desc'			=>	__( 'Automatically create new records in WP-CRM System from Gravity Form submissions.', 'wp-crm-system' ),
					'class'			=>	'WPCRM_GRAVITY_FORMS_CONNECT',
				),
				array(
					'title'			=>	__( 'Ninja Forms Connect', 'wp-crm-system' ),
					'overview'		=>	'yes',
					'contact-forms'	=>	'yes',
					'import'		=>	'no',
					'notifications'	=>	'no',
					'documents'		=>	'no',
					'url'			=>	'https://www.wp-crm.com/downloads/ninja-form-connect/',
					'img'			=>	'/ninja-forms-connect-300x145.jpg',
					'desc'			=>	__( 'Automatically create new contacts from Ninja Form submissions.', 'wp-crm-system' ),
					'class'			=>	'WPCRM_NINJA_FORMS_CONNECT',
				),
			);
		}

		function wp_crm_system_extensions_overview() {  ?>
			<div class="wrap">
				<div>
					<h2><?php esc_html_e( 'WP-CRM System Extensions', 'wp-crm-system' ); ?></h2>
					<p><?php esc_html_e( 'These extensions add features to your WP-CRM System', 'wp-crm-system' ); ?></p>
					<?php foreach( $this->extensions as $extension ) { ?>
						<div class="wpcrm-extension">
							<h3 class="wpcrm-extension-title"><?php echo esc_attr( $extension['title'] ); ?></h3>
							<a href="<?php echo esc_url( $extension['title'] ); ?>"><img width="300px" height="145px" src="<?php echo esc_url( WP_CRM_SYSTEM_PLUGIN_URL ) . '/includes/images/' . esc_attr( $extension['img'] ); ?>" alt="<?php echo esc_attr( $extension['title'] ); ?>" /></a>
							<p><?php echo wp_kses_post( $extension['desc'] ); ?></p>
							<?php if( defined( $extension['class'] ) ) { ?>
								<a href="" class="button-secondary disabled"><?php esc_html_e( 'Extension Installed', 'wp-crm-system' ); ?></a>
							<?php } else { ?>
								<a href="<?php echo esc_url( $extension['title'] ); ?>?utm_source=plugin-addons-page&utm_medium=plugin&utm_campaign=WPCRMSystemAddonsPage&utm_content=<?php echo urlencode( esc_attr( $extension['title'] ) ); ?>" class="button-secondary"><?php esc_html_e( 'Get This Extension','wp-crm-system' ); ?></a>
							<?php } ?>
						</div>
					<?php } ?>
				</div>
			</div>
		<?php }
		function wp_crm_system_plans_overview() {  ?>
			<div class="wrap">
				<div>
					<h2><?php esc_html_e( 'WP-CRM System Plans', 'wp-crm-system' ); ?></h2>
					<p><?php esc_html_e( 'Save money with these bundled plans of WP-CRM System extensions', 'wp-crm-system' ); ?></p>
					<?php foreach( $this->plans as $plan ) { ?>
						<div class="wpcrm-extension">
							<h3 class="wpcrm-extension-title"><?php echo esc_attr( $plan['title'] ); ?></h3>
							<a href="<?php echo esc_url( $plan['url'] ); ?>"><img width="300px" height="145px" src="<?php echo esc_url( WP_CRM_SYSTEM_PLUGIN_URL ) . '/includes/images/' . esc_attr( $plan['img'] ); ?>" alt="<?php echo wp_kses_post( $plan['title'] ); ?>" /></a>
							<p><?php echo wp_kses_post( $plan['desc'] ); ?></p>
								<a href="<?php echo esc_url( $plan['url'] ); ?>?utm_source=plugin-addons-page&utm_medium=plugin&utm_campaign=WPCRMSystemAddonsPage&utm_content=<?php echo urlencode( esc_attr( $plan['title'] ) ); ?>" class="button-secondary"><?php esc_html_e( 'Get This Plan','wp-crm-system' ); ?></a>
						</div>
					<?php } ?>
				</div>
			</div>
		<?php }
	} // End Class
} // End if class exists statement
// Instantiate the class
if ( class_exists('wpCRMSystemExtensions') ) {
	$extensions = new wpCRMSystemExtensions();
	switch ( $active_tab ) {
		case 'plans':
			$extensions->wp_crm_system_plans_overview();
			break;

		case 'overview':
		default:
			$extensions->wp_crm_system_extensions_overview();
			break;
	}
}

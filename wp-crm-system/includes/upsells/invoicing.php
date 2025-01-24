<?php
/* Prevent direct access to the plugin */
if ( !defined( 'ABSPATH' ) ) {
	die( "Sorry, you are not allowed to access this page directly." );
} ?>
<h2><?php esc_html_e( 'Invoicing', 'wp-crm-system' ); ?></h2>

<div class="wp-crm-one-third wp-crm-first">
	<p><strong><?php esc_html_e( 'The Invoicing add-on is included in our Professional package.', 'wp-crm-system' ); ?></strong></p>
	<p><?php esc_html_e( 'About the Invoicing add-on:', 'wp-crm-system' ); ?></p>
	<ul class="upsell-features">
		<li><?php esc_html_e( 'Easily bill clients for products and services.', 'wp-crm-system' ); ?></li>
		<li><?php esc_html_e( 'Accept payments by check or credit card via Stripe.', 'wp-crm-system' ); ?></li>
		<li><?php esc_html_e( 'Send invoices by email to your clients so they know when an invoice is avaialble.', 'wp-crm-system' ); ?></li>
	</ul>
	<p>
		<a href="https://www.wp-crm.com/downloads/invoicing/?utm_campaign=upgrade-wp-crm-system&utm_source=upgrade-invoicing-tab" class="button-primary">
			<?php esc_html_e( 'Upgrade WP-CRM System with Invoicing today!', 'wp-crm-system' ); ?>
		</a>
		<span class="dashicons dashicons-external wpcrm-dashicons"></span>
	</p>
</div>
<div class="wp-crm-two-thirds">
	<div><strong><?php esc_html_e( 'Screenshots', 'wp-crm-system' ); ?></strong> (<?php esc_html_e( 'click to enlarge', 'wp-crm-system' ); ?>)</div>
	<div class="screenshot-group">
		<a class="lightbox" href="#invoice-example">
			<img src="<?php echo esc_url( WP_CRM_SYSTEM_PLUGIN_URL ); ?>/includes/upsells/screenshots/invoice-example.png"/>
		</a>
		<div class="screenshot-text"><?php esc_html_e( 'Have customers view invoices directly from your website.', 'wp-crm-system' ); ?></div>
	</div>
	<div class="screenshot-group">
		<a class="lightbox" href="#invoice-pay-by-credit-card">
			<img src="<?php echo esc_url( WP_CRM_SYSTEM_PLUGIN_URL ); ?>/includes/upsells/screenshots/invoice-pay-by-credit-card.png"/>
		</a>
		<div class="screenshot-text"><?php esc_html_e( 'Accept credit card payments on your website through Stripe', 'wp-crm-system' ); ?></div>
	</div>
</div>

<div class="lightbox-target" id="invoice-example">
	<img src="<?php echo esc_url( WP_CRM_SYSTEM_PLUGIN_URL ); ?>/includes/upsells/screenshots/invoice-example.png"/>
	<a class="lightbox-close" href="#"></a>
</div>
<div class="lightbox-target" id="invoice-pay-by-credit-card">
	<img src="<?php echo esc_url( WP_CRM_SYSTEM_PLUGIN_URL ); ?>/includes/upsells/screenshots/invoice-pay-by-credit-card.png"/>
	<a class="lightbox-close" href="#"></a>
</div>
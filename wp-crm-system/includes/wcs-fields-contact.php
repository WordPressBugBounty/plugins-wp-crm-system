<?php
/* Prevent direct access to the plugin */
if ( !defined( 'ABSPATH' ) ) {
		die( "Sorry, you are not allowed to access this page directly." );
}
add_filter( 'wpcrm_system_fields', 'wpcrm_system_contact_fields', 10, 1 );
function wpcrm_system_contact_fields( $fields ) {
	$contactFields = array(
		array(
			'name'			=> 'contact-name-prefix',
			'title'			=> __( 'Name Prefix', 'wp-crm-system' ),
			'description'	=> '',
			'type'			=> 'selectnameprefix',
			'scope'			=> array( 'wpcrm-contact' ),
			'style'			=> 'wp-crm-first',
			'before'		=> '<div class="wp-crm-first wp-crm-one-half"><div class="wp-crm-inline">',
			'after'			=> '</div>',
			'icon'			=> 'dashicons dashicons-businessman wpcrm-dashicons',
			'capability'	=> WPCRM_USER_ACCESS
		),
		array(
			'name'			=> 'contact-first-name',
			'title'			=> __( 'First Name *', 'wp-crm-system' ),
			'description'	=> '',
			'placeholder'	=> '',
			'type'			=> 'default',
			'scope'			=> array( 'wpcrm-contact' ),
			'style'			=> '',
			'before'		=> '<div class="wp-crm-inline">',
			'after'			=> '</div>',
			'icon'			=> '',
			'capability'	=> WPCRM_USER_ACCESS
		),
		array(
			'name'			=> 'contact-last-name',
			'title'			=> __( 'Last Name *', 'wp-crm-system' ),
			'description'	=> '',
			'placeholder'	=> '',
			'type'			=> 'default',
			'scope'			=> array( 'wpcrm-contact' ),
			'style'			=> '',
			'before'		=> '<div class="wp-crm-inline">',
			'after'			=> '</div>',
			'icon'			=> '',
			'capability'	=> WPCRM_USER_ACCESS
		),
		array(
			'name'			=> 'contact-attach-to-organization',
			'title'			=> __( 'Organization', 'wp-crm-system' ),
			'description'	=> '',
			'placeholder'	=> '',
			'type'			=> 'selectorganization',
			'scope'			=> array( 'wpcrm-contact' ),
			'style'			=> '',
			'before'		=> '<div class="wp-crm-first wp-crm-inline attach-to-organization">',
			'after'			=> '</div>',
			'icon'			=> 'dashicons dashicons-building wpcrm-dashicons',
			'capability'	=> WPCRM_USER_ACCESS
		),
		array(
			'name'			=> 'contact-role',
			'title'			=> __( 'Role', 'wp-crm-system' ),
			'description'	=> '',
			'placeholder'	=> '',
			'type'			=> 'default',
			'scope'			=> array( 'wpcrm-contact' ),
			'style'			=> '',
			'before'		=> '<div class="wp-crm-inline">',
			'after'			=> '</div>',
			'icon'			=> '',
			'capability'	=> WPCRM_USER_ACCESS
		),
		array(
			'name'			=> 'contact-website',
			'title'			=> __( 'Website', 'wp-crm-system' ),
			'description'	=> '',
			'placeholder'	=> 'http://',
			'type'			=> 'url',
			'scope'			=> array( 'wpcrm-contact' ),
			'style'			=> '',
			'before'		=> '<div class="wp-crm-first wp-crm-inline">',
			'after'			=> '</div>',
			'icon'			=> 'dashicons dashicons-admin-links wpcrm-dashicons',
			'capability'    => WPCRM_USER_ACCESS
		),
		array(
			'name'			=> 'contact-phone',
			'title'			=> __( 'Phone', 'wp-crm-system' ),
			'description'	=> '',
			'placeholder'	=> '',
			'type'			=> 'phone',
			'scope'			=> array( 'wpcrm-contact' ),
			'style'			=> '',
			'before'		=> '<div class="wp-crm-first wp-crm-inline">',
			'after'			=> '</div>',
			'icon'			=> 'dashicons dashicons-phone wpcrm-dashicons',
			'capability'	=> WPCRM_USER_ACCESS
		),
		array(
			'name'			=> 'contact-mobile-phone',
			'title'			=> __( 'Mobile Phone', 'wp-crm-system' ),
			'description'	=> '',
			'placeholder'	=> '',
			'type'			=> 'phone',
			'scope'			=> array( 'wpcrm-contact' ),
			'style'			=> '',
			'before'		=> '<div class="wp-crm-inline">',
			'after'			=> '</div></div>',
			'icon'			=> 'dashicons dashicons-smartphone wpcrm-dashicons',
			'capability'	=> WPCRM_USER_ACCESS
		),
		array(
			'name'			=> 'contact-address1',
			'title'			=> __( 'Address 1', 'wp-crm-system' ),
			'description'	=> '',
			'placeholder'	=> '',
			'type'			=> 'default',
			'scope'			=> array( 'wpcrm-contact' ),
			'style' 		=> 'wp-crm-first',
			'before'		=> '<div class="wp-crm-one-half"><div class="wp-crm-inline">',
			'after'			=> '</div>',
			'icon'			=> 'dashicons dashicons-location wpcrm-dashicons',
			'capability'	=> WPCRM_USER_ACCESS
		),
		array(
			'name'			=> 'contact-address2',
			'title'			=> __( 'Address 2', 'wp-crm-system' ),
			'description'	=> '',
			'placeholder'	=> '',
			'type'			=> 'default',
			'scope'			=> array( 'wpcrm-contact' ),
			'style' 		=> '',
			'before'		=> '<div class="wp-crm-inline">',
			'after'			=> '</div>',
			'icon'			=> '',
			'capability'	=> WPCRM_USER_ACCESS
		),
		array(
			'name'			=> 'contact-city',
			'title'			=> __( 'City', 'wp-crm-system' ),
			'description'	=> '',
			'placeholder'	=> '',
			'type'			=> 'default',
			'scope'			=> array( 'wpcrm-contact' ),
			'style'			=> '',
			'before'		=> '<div class="wp-crm-first wp-crm-inline">',
			'after'			=> '</div>',
			'icon'			=> '',
			'capability'	=> WPCRM_USER_ACCESS
		),
		array(
			'name'			=> 'contact-state',
			'title'			=> __( 'State/Province', 'wp-crm-system' ),
			'description'	=> '',
			'placeholder'	=> '',
			'type'			=> 'default',
			'scope'			=> array( 'wpcrm-contact' ),
			'style'			=> '',
			'before'		=> '<div class="wp-crm-inline">',
			'after'			=> '</div>',
			'icon'			=> '',
			'capability'	=> WPCRM_USER_ACCESS
		),
		array(
			'name'			=> 'contact-postal',
			'title'			=> __( 'Postal Code', 'wp-crm-system' ),
			'description'	=> '',
			'placeholder'	=> '',
			'type'			=> 'default',
			'scope'			=> array( 'wpcrm-contact' ),
			'style'			=> '',
			'before'		=> '<div class="wp-crm-inline">',
			'after'			=> '</div>',
			'icon'			=> '',
			'capability'	=> WPCRM_USER_ACCESS
		),
		array(
			'name'			=> 'contact-country',
			'title'			=> __( 'Country', 'wp-crm-system' ),
			'description'	=> '',
			'placeholder'	=> '',
			'type'			=> 'default',
			'scope'			=> array( 'wpcrm-contact' ),
			'style'			=> 'wp-crm-first',
			'before'		=> '',
			'after'			=> '',
			'icon'			=> '',
			'capability'	=> WPCRM_USER_ACCESS
		),
		array(
			'name'			=> 'contact-email',
			'title'			=> __( 'Email *', 'wp-crm-system' ),
			'description'	=> '',
			'placeholder'	=> '',
			'type'			=> 'email',
			'scope'			=> array( 'wpcrm-contact' ),
			'style' 		=> 'wp-crm-first',
			'before'		=> '',
			'after'			=> '',
			'icon'			=> 'dashicons dashicons-email wpcrm-dashicons',
			'capability'	=> WPCRM_USER_ACCESS
		),
		array(
			'name'			=> 'contact-fax',
			'title'			=> __( 'Fax', 'wp-crm-system' ),
			'description'	=> '',
			'placeholder'	=> '',
			'type'			=> 'phone',
			'scope'			=> array( 'wpcrm-contact' ),
			'style' 		=> 'wp-crm-first',
			'before'		=> '',
			'after'			=> '</div>',
			'icon'			=> 'wpcrm-dashicons-fax',
			'capability'	=> WPCRM_USER_ACCESS
		),
		array(
			'name'			=> 'contact-additional',
			'title'			=> __( 'Additional Information', 'wp-crm-system' ),
			'description'	=> '',
			'placeholder'	=> '',
			'type'			=> 'wysiwyg',
			'scope'			=> array( 'wpcrm-contact' ),
			'style'			=> 'wp-crm-first',
			'before'		=> '',
			'after'			=> '',
			'icon'			=> '',
			'capability'	=> WPCRM_USER_ACCESS
		),
		array(
			'name'			=> 'contact-dropbox',
			'title'			=> __( 'Link Files From Dropbox', 'wp-crm-system' ),
			'description'	=> '',
			'placeholder'	=> '',
			'type'			=> 'dropbox',
			'scope'			=> array( 'wpcrm-contact' ),
			'style'			=> 'wp-crm-first',
			'before'		=> '',
			'after'			=> '',
			'icon'			=> '',
			'capability'	=> WPCRM_USER_ACCESS
		),
		array(
			'name'			=> 'contact-zendesk',
			'title'			=> __( 'Zendesk Tickets', 'wp-crm-system' ),
			'description'	=> '',
			'placeholder'	=> '',
			'type'			=> 'zendesk',
			'scope'			=> array( 'wpcrm-contact' ),
			'style'			=> 'wp-crm-first',
			'before'		=> '',
			'after'			=> '',
			'icon'			=> '',
			'capability'	=> WPCRM_USER_ACCESS
		),
	);
	$fields = array_merge( $contactFields, $fields );
	$fields = apply_filters( 'wpcrm_system_contact_fields', $fields );
	return $fields;
}

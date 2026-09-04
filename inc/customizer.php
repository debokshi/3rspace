<?php
/**
 * Customizer: editable text content for the front page, contact page, and footer.
 *
 * Every field is defined once in trs_customizer_fields() (default value, label,
 * section, control type) and consumed via trs_opt( $key ) in the templates —
 * that keeps ~50 fields manageable without repeating get_theme_mod() defaults
 * at every call site.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Single source of truth for every editable text field: key => config.
 */
function trs_customizer_fields() {
	return array(

		// Global — reused across the header, hero, pricing, CTA band, and footer.
		'apply_button_label' => array(
			'default' => __( 'Apply for a Spot', '3rspace' ),
			'label'   => __( 'Apply CTA button label', '3rspace' ),
			'section' => 'trs_sec_global',
			'type'    => 'text',
		),
		'trial_button_label' => array(
			'default' => __( 'Book a Free Trial Day', '3rspace' ),
			'label'   => __( 'Trial CTA button label', '3rspace' ),
			'section' => 'trs_sec_global',
			'type'    => 'text',
		),
		'whatsapp_number' => array(
			'default' => '15551234567',
			'label'   => __( 'WhatsApp number (country code + digits, no spaces or +)', '3rspace' ),
			'section' => 'trs_sec_global',
			'type'    => 'text',
		),
		'whatsapp_message' => array(
			'default' => __( 'Hi! I\'d like to book a free trial day.', '3rspace' ),
			'label'   => __( 'WhatsApp pre-filled message', '3rspace' ),
			'section' => 'trs_sec_global',
			'type'    => 'text',
		),
		'business_address' => array(
			'default' => __( '123 Main Street, Suite 100, Your City, ST 00000', '3rspace' ),
			'label'   => __( 'Address', '3rspace' ),
			'section' => 'trs_sec_global',
			'type'    => 'text',
		),
		'business_email' => array(
			'default'  => 'hello@3rspace.test',
			'label'    => __( 'Public email (shown on site)', '3rspace' ),
			'section'  => 'trs_sec_global',
			'type'     => 'text',
			'sanitize' => 'sanitize_email',
		),
		'notification_email' => array(
			'default'  => '',
			'label'    => __( 'Applications & messages go to (blank = Settings → General admin email)', '3rspace' ),
			'section'  => 'trs_sec_global',
			'type'     => 'text',
			'sanitize' => 'sanitize_email',
		),
		'business_phone' => array(
			'default' => '+1 (555) 555-0123',
			'label'   => __( 'Phone', '3rspace' ),
			'section' => 'trs_sec_global',
			'type'    => 'text',
		),
		'business_hours' => array(
			'default' => __( 'Staffed Mon–Fri, 8am–6pm · Members have 24/7 access', '3rspace' ),
			'label'   => __( 'Hours', '3rspace' ),
			'section' => 'trs_sec_global',
			'type'    => 'text',
		),

		// Front page — hero.
		'hero_eyebrow' => array(
			'default' => __( 'Coworking, reimagined', '3rspace' ),
			'label'   => __( 'Eyebrow', '3rspace' ),
			'section' => 'trs_sec_hero',
			'type'    => 'text',
		),
		'hero_heading' => array(
			'default' => __( 'Work, your way.', '3rspace' ),
			'label'   => __( 'Heading', '3rspace' ),
			'section' => 'trs_sec_hero',
			'type'    => 'text',
		),
		'hero_lede' => array(
			'default' => __( 'A calm, well-equipped coworking space for founders, freelancers, and remote teams who want a great desk without the overhead.', '3rspace' ),
			'label'   => __( 'Subheading', '3rspace' ),
			'section' => 'trs_sec_hero',
			'type'    => 'textarea',
		),
		'hero_secondary_button_label' => array(
			'default' => __( 'View plans', '3rspace' ),
			'label'   => __( 'Secondary button label', '3rspace' ),
			'section' => 'trs_sec_hero',
			'type'    => 'text',
		),
		'hero_stat1_number' => array( 'default' => '120+', 'label' => __( 'Stat 1 — number', '3rspace' ), 'section' => 'trs_sec_hero', 'type' => 'text' ),
		'hero_stat1_label'  => array( 'default' => __( 'Active members', '3rspace' ), 'label' => __( 'Stat 1 — label', '3rspace' ), 'section' => 'trs_sec_hero', 'type' => 'text' ),
		'hero_stat2_number' => array( 'default' => '18k', 'label' => __( 'Stat 2 — number', '3rspace' ), 'section' => 'trs_sec_hero', 'type' => 'text' ),
		'hero_stat2_label'  => array( 'default' => __( 'Sq ft of space', '3rspace' ), 'label' => __( 'Stat 2 — label', '3rspace' ), 'section' => 'trs_sec_hero', 'type' => 'text' ),
		'hero_stat3_number' => array( 'default' => '24/7', 'label' => __( 'Stat 3 — number', '3rspace' ), 'section' => 'trs_sec_hero', 'type' => 'text' ),
		'hero_stat3_label'  => array( 'default' => __( 'Keycard access', '3rspace' ), 'label' => __( 'Stat 3 — label', '3rspace' ), 'section' => 'trs_sec_hero', 'type' => 'text' ),
		'hero_photo_title' => array(
			'default' => __( 'Open studio — Available', '3rspace' ),
			'label'   => __( 'Photo overlay — title', '3rspace' ),
			'section' => 'trs_sec_hero',
			'type'    => 'text',
		),
		'hero_photo_subtitle' => array(
			'default' => __( 'Shared desks · natural light', '3rspace' ),
			'label'   => __( 'Photo overlay — subtitle', '3rspace' ),
			'section' => 'trs_sec_hero',
			'type'    => 'text',
		),

		// Front page — gallery captions.
		'gallery_caption_1' => array( 'default' => __( 'Open desks', '3rspace' ), 'label' => __( 'Photo 1 caption', '3rspace' ), 'section' => 'trs_sec_gallery', 'type' => 'text' ),
		'gallery_caption_2' => array( 'default' => __( 'Lounge corner', '3rspace' ), 'label' => __( 'Photo 2 caption', '3rspace' ), 'section' => 'trs_sec_gallery', 'type' => 'text' ),
		'gallery_caption_3' => array( 'default' => __( 'Open floor plan', '3rspace' ), 'label' => __( 'Photo 3 caption', '3rspace' ), 'section' => 'trs_sec_gallery', 'type' => 'text' ),

		// Front page — amenities.
		'amenities_eyebrow' => array( 'default' => __( 'Everything included', '3rspace' ), 'label' => __( 'Eyebrow', '3rspace' ), 'section' => 'trs_sec_amenities', 'type' => 'text' ),
		'amenities_heading' => array( 'default' => __( 'A space built for focused work', '3rspace' ), 'label' => __( 'Heading', '3rspace' ), 'section' => 'trs_sec_amenities', 'type' => 'text' ),
		'amenities_lede'    => array( 'default' => __( 'No hidden fees, no surprise upsells — just the essentials done well.', '3rspace' ), 'label' => __( 'Subheading', '3rspace' ), 'section' => 'trs_sec_amenities', 'type' => 'textarea' ),

		'feature_1_title' => array( 'default' => __( 'Gigabit Wi-Fi', '3rspace' ), 'label' => __( 'Feature 1 — title', '3rspace' ), 'section' => 'trs_sec_amenities', 'type' => 'text' ),
		'feature_1_desc'  => array( 'default' => __( 'Fast, reliable, wired-grade Wi-Fi across every floor — no dead zones.', '3rspace' ), 'label' => __( 'Feature 1 — description', '3rspace' ), 'section' => 'trs_sec_amenities', 'type' => 'textarea' ),
		'feature_2_title' => array( 'default' => __( 'Meeting Rooms', '3rspace' ), 'label' => __( 'Feature 2 — title', '3rspace' ), 'section' => 'trs_sec_amenities', 'type' => 'text' ),
		'feature_2_desc'  => array( 'default' => __( 'Bookable rooms with video conferencing, whiteboards, and natural light.', '3rspace' ), 'label' => __( 'Feature 2 — description', '3rspace' ), 'section' => 'trs_sec_amenities', 'type' => 'textarea' ),
		'feature_3_title' => array( 'default' => __( '24/7 Access', '3rspace' ), 'label' => __( 'Feature 3 — title', '3rspace' ), 'section' => 'trs_sec_amenities', 'type' => 'text' ),
		'feature_3_desc'  => array( 'default' => __( 'Keycard access whenever inspiration strikes — early mornings included.', '3rspace' ), 'label' => __( 'Feature 3 — description', '3rspace' ), 'section' => 'trs_sec_amenities', 'type' => 'textarea' ),
		'feature_4_title' => array( 'default' => __( 'Coffee & Kitchen', '3rspace' ), 'label' => __( 'Feature 4 — title', '3rspace' ), 'section' => 'trs_sec_amenities', 'type' => 'text' ),
		'feature_4_desc'  => array( 'default' => __( 'Espresso bar, sparkling water, and a full kitchen stocked daily.', '3rspace' ), 'label' => __( 'Feature 4 — description', '3rspace' ), 'section' => 'trs_sec_amenities', 'type' => 'textarea' ),
		'feature_5_title' => array( 'default' => __( 'Print & Scan', '3rspace' ), 'label' => __( 'Feature 5 — title', '3rspace' ), 'section' => 'trs_sec_amenities', 'type' => 'text' ),
		'feature_5_desc'  => array( 'default' => __( 'Fast color printing, scanning, and shipping support on every floor.', '3rspace' ), 'label' => __( 'Feature 5 — description', '3rspace' ), 'section' => 'trs_sec_amenities', 'type' => 'textarea' ),
		'feature_6_title' => array( 'default' => __( 'Community Events', '3rspace' ), 'label' => __( 'Feature 6 — title', '3rspace' ), 'section' => 'trs_sec_amenities', 'type' => 'text' ),
		'feature_6_desc'  => array( 'default' => __( 'Monthly socials, workshops, and founder dinners to grow your network.', '3rspace' ), 'label' => __( 'Feature 6 — description', '3rspace' ), 'section' => 'trs_sec_amenities', 'type' => 'textarea' ),

		// Front page — pricing.
		'pricing_eyebrow' => array( 'default' => __( 'Simple pricing', '3rspace' ), 'label' => __( 'Eyebrow', '3rspace' ), 'section' => 'trs_sec_pricing', 'type' => 'text' ),
		'pricing_heading' => array( 'default' => __( 'One plan. No surprises.', '3rspace' ), 'label' => __( 'Heading', '3rspace' ), 'section' => 'trs_sec_pricing', 'type' => 'text' ),
		'pricing_lede'    => array( 'default' => __( 'Just an open seat, priced simply.', '3rspace' ), 'label' => __( 'Subheading', '3rspace' ), 'section' => 'trs_sec_pricing', 'type' => 'textarea' ),
		'plan_name'       => array( 'default' => __( 'Open Seat', '3rspace' ), 'label' => __( 'Plan name', '3rspace' ), 'section' => 'trs_sec_pricing', 'type' => 'text' ),
		'plan_price'      => array( 'default' => '€100', 'label' => __( 'Plan price', '3rspace' ), 'section' => 'trs_sec_pricing', 'type' => 'text' ),
		'plan_period'     => array( 'default' => __( '/ month', '3rspace' ), 'label' => __( 'Plan period', '3rspace' ), 'section' => 'trs_sec_pricing', 'type' => 'text' ),
		'plan_items'      => array(
			'default' => implode( "\n", array(
				__( 'Any open seat, any day', '3rspace' ),
				__( 'High-speed Wi-Fi', '3rspace' ),
				__( '2 meeting room hours / mo', '3rspace' ),
				__( 'Coffee bar & community events', '3rspace' ),
			) ),
			'label'   => __( 'Plan features (one per line)', '3rspace' ),
			'section' => 'trs_sec_pricing',
			'type'    => 'textarea',
		),

		// Front page — CTA band.
		'cta_heading' => array( 'default' => __( 'Ready to find your desk?', '3rspace' ), 'label' => __( 'Heading', '3rspace' ), 'section' => 'trs_sec_cta', 'type' => 'text' ),
		'cta_text'    => array( 'default' => __( 'Applications are reviewed within one business day.', '3rspace' ), 'label' => __( 'Text', '3rspace' ), 'section' => 'trs_sec_cta', 'type' => 'textarea' ),

		// Contact page.
		'contact_eyebrow' => array( 'default' => __( 'Get in touch', '3rspace' ), 'label' => __( 'Eyebrow', '3rspace' ), 'section' => 'trs_sec_contact', 'type' => 'text' ),
		'contact_heading' => array( 'default' => __( 'Let’s talk about your space.', '3rspace' ), 'label' => __( 'Heading', '3rspace' ), 'section' => 'trs_sec_contact', 'type' => 'text' ),
		'contact_lede'    => array( 'default' => __( 'Questions about plans, a tour, or membership? Send a message and we’ll get back to you within one business day.', '3rspace' ), 'label' => __( 'Subheading', '3rspace' ), 'section' => 'trs_sec_contact', 'type' => 'textarea' ),
		'contact_info_heading' => array( 'default' => __( 'Visit or reach out', '3rspace' ), 'label' => __( 'Info column heading', '3rspace' ), 'section' => 'trs_sec_contact', 'type' => 'text' ),
		'contact_form_heading' => array( 'default' => __( 'Send a message', '3rspace' ), 'label' => __( 'Form heading', '3rspace' ), 'section' => 'trs_sec_contact', 'type' => 'text' ),

		// Footer.
		'footer_description' => array(
			'default' => __( 'A calm, well-equipped coworking space for founders, freelancers, and remote teams.', '3rspace' ),
			'label'   => __( 'Brand description', '3rspace' ),
			'section' => 'trs_sec_footer',
			'type'    => 'textarea',
		),
		'footer_bottom_text' => array(
			'default' => __( 'All rights reserved.', '3rspace' ),
			'label'   => __( 'Copyright line (after the site name)', '3rspace' ),
			'section' => 'trs_sec_footer',
			'type'    => 'text',
		),
	);
}

/**
 * Read an editable text field's current value (theme mod, falling back to its
 * configured default).
 */
function trs_opt( $key ) {
	static $fields = null;
	if ( null === $fields ) {
		$fields = trs_customizer_fields();
	}
	$default = isset( $fields[ $key ]['default'] ) ? $fields[ $key ]['default'] : '';
	return get_theme_mod( 'trs_' . $key, $default );
}

/**
 * Split a "plan features" textarea into a clean array of lines.
 */
function trs_opt_lines( $key ) {
	$lines = preg_split( '/\r\n|\r|\n/', trs_opt( $key ) );
	$lines = array_map( 'trim', $lines );
	return array_values( array_filter( $lines, 'strlen' ) );
}

/**
 * Where the trial-booking and contact-form submissions get emailed —
 * the Customizer notification address, falling back to the site's
 * Settings → General admin email when left blank.
 */
function trs_notification_email() {
	$configured = trs_opt( 'notification_email' );
	return '' !== $configured ? $configured : get_option( 'admin_email' );
}

/**
 * A wa.me deep link to the configured WhatsApp number, with the configured
 * (or a custom) pre-filled message.
 */
function trs_whatsapp_link( $message = null ) {
	$digits  = preg_replace( '/[^0-9]/', '', trs_opt( 'whatsapp_number' ) );
	$message = null === $message ? trs_opt( 'whatsapp_message' ) : $message;
	return 'https://wa.me/' . $digits . '?text=' . rawurlencode( $message );
}

function trs_customize_register( $wp_customize ) {
	$wp_customize->add_panel( 'trs_content', array(
		'title'       => __( '3RSpace Content', '3rspace' ),
		'description' => __( 'Text shown on the front page, contact page, and footer.', '3rspace' ),
		'priority'    => 30,
	) );

	$sections = array(
		'trs_sec_global'    => __( 'Global — Business Info', '3rspace' ),
		'trs_sec_hero'      => __( 'Front Page — Hero', '3rspace' ),
		'trs_sec_gallery'   => __( 'Front Page — Gallery Captions', '3rspace' ),
		'trs_sec_amenities' => __( 'Front Page — Amenities', '3rspace' ),
		'trs_sec_pricing'   => __( 'Front Page — Pricing', '3rspace' ),
		'trs_sec_cta'       => __( 'Front Page — CTA Band', '3rspace' ),
		'trs_sec_contact'   => __( 'Contact Page', '3rspace' ),
		'trs_sec_footer'    => __( 'Footer', '3rspace' ),
	);

	foreach ( $sections as $id => $label ) {
		$wp_customize->add_section( $id, array(
			'title' => $label,
			'panel' => 'trs_content',
		) );
	}

	foreach ( trs_customizer_fields() as $key => $field ) {
		$setting_id = 'trs_' . $key;
		$sanitize   = isset( $field['sanitize'] )
			? $field['sanitize']
			: ( 'textarea' === $field['type'] ? 'sanitize_textarea_field' : 'sanitize_text_field' );

		$wp_customize->add_setting( $setting_id, array(
			'default'           => $field['default'],
			'sanitize_callback' => $sanitize,
			'transport'         => 'refresh',
		) );

		$wp_customize->add_control( $setting_id, array(
			'label'   => $field['label'],
			'section' => $field['section'],
			'type'    => 'textarea' === $field['type'] ? 'textarea' : 'text',
		) );
	}
}
add_action( 'customize_register', 'trs_customize_register' );

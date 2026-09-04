<?php
/**
 * 3RSpace theme setup.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'TRS_VERSION', '1.0.0' );

require get_template_directory() . '/inc/customizer.php';

/**
 * Theme support & registrations.
 */
function trs_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ) );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'custom-logo', array(
		'height'      => 60,
		'width'       => 200,
		'flex-height' => true,
		'flex-width'  => true,
	) );

	register_nav_menus( array(
		'primary' => __( 'Primary Menu', '3rspace' ),
		'footer'  => __( 'Footer Menu', '3rspace' ),
	) );
}
add_action( 'after_setup_theme', 'trs_setup' );

/**
 * Styles & scripts.
 */
function trs_assets() {
	wp_enqueue_style(
		'trs-fonts',
		'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap',
		array(),
		null
	);

	wp_enqueue_style( 'trs-style', get_stylesheet_uri(), array(), TRS_VERSION );

	wp_enqueue_script( 'trs-main', get_template_directory_uri() . '/assets/js/main.js', array(), TRS_VERSION, true );

	wp_localize_script( 'trs-main', 'TRS', array(
		'ajaxUrl'      => admin_url( 'admin-ajax.php' ),
		'applyNonce'   => wp_create_nonce( 'trs_apply_submit' ),
		'trialNonce'   => wp_create_nonce( 'trs_trial_submit' ),
		'contactNonce' => wp_create_nonce( 'trs_contact_submit' ),
	) );
}
add_action( 'wp_enqueue_scripts', 'trs_assets' );

/**
 * Fallback menu when no "Primary Menu" has been assigned in
 * Appearance → Menus.
 */
function trs_fallback_menu() {
	echo '<ul class="primary-nav__menu" id="primary-menu">';
	echo '<li' . ( is_front_page() ? ' class="current-menu-item"' : '' ) . '><a href="' . esc_url( home_url( '/' ) ) . '">' . esc_html__( 'Home', '3rspace' ) . '</a></li>';

	$contact_page = get_page_by_path( 'contact' );
	$contact_url  = $contact_page ? get_permalink( $contact_page ) : home_url( '/contact/' );
	echo '<li' . ( is_page( 'contact' ) ? ' class="current-menu-item"' : '' ) . '><a href="' . esc_url( $contact_url ) . '">' . esc_html__( 'Contact', '3rspace' ) . '</a></li>';
	echo '</ul>';
}

/**
 * Fallback links when no "Footer Menu" has been assigned in Appearance → Menus.
 * Outputs bare <li> items — the footer supplies its own <ul> wrapper.
 */
function trs_footer_fallback_menu() {
	$contact_page = get_page_by_path( 'contact' );
	$contact_url  = $contact_page ? get_permalink( $contact_page ) : home_url( '/contact/' );

	echo '<li><a href="' . esc_url( home_url( '/' ) ) . '">' . esc_html__( 'Home', '3rspace' ) . '</a></li>';
	echo '<li><a href="' . esc_url( $contact_url ) . '">' . esc_html__( 'Contact', '3rspace' ) . '</a></li>';
}

/**
 * Shared field sanitizing/validation helper for the two AJAX forms below.
 */
function trs_get_posted_field( $key, $max_length = 0 ) {
	if ( ! isset( $_POST[ $key ] ) ) {
		return '';
	}
	$value = sanitize_text_field( wp_unslash( $_POST[ $key ] ) );
	if ( $max_length > 0 ) {
		$value = mb_substr( $value, 0, $max_length );
	}
	return $value;
}

/**
 * AJAX: "Apply for a Spot" modal submission.
 */
function trs_handle_apply_submit() {
	check_ajax_referer( 'trs_apply_submit', 'nonce' );

	// Honeypot — bots tend to fill every field.
	if ( ! empty( $_POST['trs_website'] ) ) {
		wp_send_json_success( array( 'message' => __( 'Thanks! We\'ll be in touch shortly.', '3rspace' ) ) );
	}

	$name  = trs_get_posted_field( 'name', 100 );
	$email = sanitize_email( wp_unslash( $_POST['email'] ?? '' ) );
	$phone = trs_get_posted_field( 'phone', 40 );
	$notes = isset( $_POST['notes'] ) ? sanitize_textarea_field( wp_unslash( $_POST['notes'] ) ) : '';

	if ( '' === $name || ! is_email( $email ) ) {
		wp_send_json_error( array( 'message' => __( 'Please enter a valid name and email address.', '3rspace' ) ), 400 );
	}

	$to      = trs_notification_email();
	$subject = sprintf( '[%s] New spot application from %s', get_bloginfo( 'name' ), $name );

	$body   = array();
	$body[] = sprintf( 'New "Apply for a Spot" submission (%s — %s%s):', trs_opt( 'plan_name' ), trs_opt( 'plan_price' ), trs_opt( 'plan_period' ) );
	$body[] = '';
	$body[] = 'Name: ' . $name;
	$body[] = 'Email: ' . $email;
	$body[] = 'Phone: ' . ( '' !== $phone ? $phone : '—' );
	$body[] = '';
	$body[] = 'Notes:';
	$body[] = ( '' !== $notes ? $notes : '—' );

	$headers = array( 'Reply-To: ' . $name . ' <' . $email . '>' );
	$sent    = wp_mail( $to, $subject, implode( "\n", $body ), $headers );

	if ( ! $sent ) {
		wp_send_json_error( array( 'message' => __( 'Something went wrong sending your application. Please try again in a moment.', '3rspace' ) ), 500 );
	}

	wp_send_json_success( array( 'message' => __( 'Thanks! Your application is in — we\'ll email you within one business day.', '3rspace' ) ) );
}
add_action( 'wp_ajax_trs_apply_submit', 'trs_handle_apply_submit' );
add_action( 'wp_ajax_nopriv_trs_apply_submit', 'trs_handle_apply_submit' );

/**
 * AJAX: "Book a Free Trial Day" modal submission.
 */
function trs_handle_trial_submit() {
	check_ajax_referer( 'trs_trial_submit', 'nonce' );

	// Honeypot — bots tend to fill every field.
	if ( ! empty( $_POST['trs_website'] ) ) {
		wp_send_json_success( array( 'message' => __( 'Thanks! We\'ll be in touch shortly.', '3rspace' ) ) );
	}

	$name  = trs_get_posted_field( 'name', 100 );
	$email = sanitize_email( wp_unslash( $_POST['email'] ?? '' ) );
	$phone = trs_get_posted_field( 'phone', 40 );
	$notes = isset( $_POST['notes'] ) ? sanitize_textarea_field( wp_unslash( $_POST['notes'] ) ) : '';

	if ( '' === $name || ! is_email( $email ) ) {
		wp_send_json_error( array( 'message' => __( 'Please enter a valid name and email address.', '3rspace' ) ), 400 );
	}

	$to      = trs_notification_email();
	$subject = sprintf( '[%s] New free trial day request from %s', get_bloginfo( 'name' ), $name );

	$body   = array();
	$body[] = 'New "Book a Free Trial Day" request:';
	$body[] = '';
	$body[] = 'Name: ' . $name;
	$body[] = 'Email: ' . $email;
	$body[] = 'Phone: ' . ( '' !== $phone ? $phone : '—' );
	$body[] = '';
	$body[] = 'Notes:';
	$body[] = ( '' !== $notes ? $notes : '—' );

	$headers = array( 'Reply-To: ' . $name . ' <' . $email . '>' );
	$sent    = wp_mail( $to, $subject, implode( "\n", $body ), $headers );

	if ( ! $sent ) {
		wp_send_json_error( array( 'message' => __( 'Something went wrong sending your request. Please try again in a moment.', '3rspace' ) ), 500 );
	}

	wp_send_json_success( array( 'message' => __( 'Thanks! Your trial day request is in — we\'ll email you to confirm a date.', '3rspace' ) ) );
}
add_action( 'wp_ajax_trs_trial_submit', 'trs_handle_trial_submit' );
add_action( 'wp_ajax_nopriv_trs_trial_submit', 'trs_handle_trial_submit' );

/**
 * AJAX: contact page form submission.
 */
function trs_handle_contact_submit() {
	check_ajax_referer( 'trs_contact_submit', 'nonce' );

	if ( ! empty( $_POST['trs_website'] ) ) {
		wp_send_json_success( array( 'message' => __( 'Thanks for reaching out — we\'ll reply soon.', '3rspace' ) ) );
	}

	$name    = trs_get_posted_field( 'name', 100 );
	$email   = sanitize_email( wp_unslash( $_POST['email'] ?? '' ) );
	$subject = trs_get_posted_field( 'subject', 150 );
	$message = isset( $_POST['message'] ) ? sanitize_textarea_field( wp_unslash( $_POST['message'] ) ) : '';

	if ( '' === $name || ! is_email( $email ) || '' === trim( $message ) ) {
		wp_send_json_error( array( 'message' => __( 'Please fill in your name, a valid email, and a message.', '3rspace' ) ), 400 );
	}

	$to           = trs_notification_email();
	$mail_subject = sprintf( '[%s] %s', get_bloginfo( 'name' ), '' !== $subject ? $subject : 'New contact form message' );

	$body   = array();
	$body[] = 'New contact form submission:';
	$body[] = '';
	$body[] = 'Name: ' . $name;
	$body[] = 'Email: ' . $email;
	$body[] = '';
	$body[] = 'Message:';
	$body[] = $message;

	$headers = array( 'Reply-To: ' . $name . ' <' . $email . '>' );
	$sent    = wp_mail( $to, $mail_subject, implode( "\n", $body ), $headers );

	if ( ! $sent ) {
		wp_send_json_error( array( 'message' => __( 'Something went wrong sending your message. Please try again in a moment.', '3rspace' ) ), 500 );
	}

	wp_send_json_success( array( 'message' => __( 'Thanks for reaching out — we\'ll reply within one business day.', '3rspace' ) ) );
}
add_action( 'wp_ajax_trs_contact_submit', 'trs_handle_contact_submit' );
add_action( 'wp_ajax_nopriv_trs_contact_submit', 'trs_handle_contact_submit' );

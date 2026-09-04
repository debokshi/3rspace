<?php
/**
 * Template Name: Contact Page
 * Also auto-selected for a page with the slug "contact" (page-contact.php).
 *
 * Copy comes from Customizer text fields — see inc/customizer.php.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

$phone_href = preg_replace( '/[^0-9+]/', '', trs_opt( 'business_phone' ) );
?>

<section class="page-header">
	<div class="container">
		<p class="eyebrow"><?php echo esc_html( trs_opt( 'contact_eyebrow' ) ); ?></p>
		<h1><?php echo esc_html( trs_opt( 'contact_heading' ) ); ?></h1>
		<p class="section-lede"><?php echo esc_html( trs_opt( 'contact_lede' ) ); ?></p>
	</div>
</section>

<section class="section" style="padding-top:0;">
	<div class="container contact-grid">
		<div class="contact-info">
			<h2><?php echo esc_html( trs_opt( 'contact_info_heading' ) ); ?></h2>

			<div class="contact-photo">
				<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/contact-space.jpg' ); ?>" alt="<?php esc_attr_e( 'A two-person quiet desk pod near the entrance, with soft natural light.', '3rspace' ); ?>" width="1900" height="2533" loading="lazy">
			</div>

			<div class="contact-info__list">
				<div class="contact-info__item">
					<span class="contact-info__icon" aria-hidden="true">
						<svg width="18" height="18" viewBox="0 0 24 24" fill="none"><path d="M12 21C12 21 19 14.6 19 9.5C19 5.4 15.9 2.5 12 2.5C8.1 2.5 5 5.4 5 9.5C5 14.6 12 21 12 21Z" stroke="currentColor" stroke-width="1.6"/><circle cx="12" cy="9.5" r="2.5" stroke="currentColor" stroke-width="1.6"/></svg>
					</span>
					<div>
						<strong><?php esc_html_e( 'Address', '3rspace' ); ?></strong>
						<span><?php echo esc_html( trs_opt( 'business_address' ) ); ?></span>
					</div>
				</div>

				<div class="contact-info__item">
					<span class="contact-info__icon" aria-hidden="true">
						<svg width="18" height="18" viewBox="0 0 24 24" fill="none"><rect x="3.5" y="5" width="17" height="14" rx="2" stroke="currentColor" stroke-width="1.6"/><path d="M4.5 6.5L12 12L19.5 6.5" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/></svg>
					</span>
					<div>
						<strong><?php esc_html_e( 'Email', '3rspace' ); ?></strong>
						<a href="<?php echo esc_url( 'mailto:' . trs_opt( 'business_email' ) ); ?>"><?php echo esc_html( trs_opt( 'business_email' ) ); ?></a>
					</div>
				</div>

				<div class="contact-info__item">
					<span class="contact-info__icon" aria-hidden="true">
						<svg width="18" height="18" viewBox="0 0 24 24" fill="none"><path d="M5 4.5H8.5L10 8.5L8 10C8.8 12 10 13.2 12 14L13.5 12L17.5 13.5V17C17.5 18.1 16.6 19 15.5 19C9.7 19 5 14.3 5 8.5C5 7.4 5 4.5 5 4.5Z" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/></svg>
					</span>
					<div>
						<strong><?php esc_html_e( 'Phone', '3rspace' ); ?></strong>
						<a href="<?php echo esc_attr( 'tel:' . $phone_href ); ?>"><?php echo esc_html( trs_opt( 'business_phone' ) ); ?></a>
					</div>
				</div>

				<div class="contact-info__item">
					<span class="contact-info__icon" aria-hidden="true">
						<svg width="18" height="18" viewBox="0 0 24 24" fill="none"><path d="M4 20L5.4 15.6C4.5 14.1 4 12.3 4 10.5C4 5.8 8.3 2 13.5 2C18.7 2 22 5.8 22 10.5C22 15.2 18.7 19 13.5 19C11.9 19 10.4 18.6 9.1 17.9L4 20Z" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/><path d="M9.5 9.8C9.5 12.5 11.5 14.5 14.2 14.5" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/></svg>
					</span>
					<div>
						<strong><?php esc_html_e( 'WhatsApp', '3rspace' ); ?></strong>
						<a href="<?php echo esc_url( trs_whatsapp_link() ); ?>" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'Message us directly', '3rspace' ); ?></a>
					</div>
				</div>

				<div class="contact-info__item">
					<span class="contact-info__icon" aria-hidden="true">
						<svg width="18" height="18" viewBox="0 0 24 24" fill="none"><circle cx="12" cy="12" r="8.5" stroke="currentColor" stroke-width="1.6"/><path d="M12 7.5V12L15 14" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/></svg>
					</span>
					<div>
						<strong><?php esc_html_e( 'Hours', '3rspace' ); ?></strong>
						<span><?php echo esc_html( trs_opt( 'business_hours' ) ); ?></span>
					</div>
				</div>
			</div>

			<div class="map-embed">
				<iframe
					src="https://www.google.com/maps?q=<?php echo rawurlencode( trs_opt( 'business_address' ) ); ?>&output=embed"
					title="<?php esc_attr_e( 'Map showing our location', '3rspace' ); ?>"
					loading="lazy"
					referrerpolicy="no-referrer-when-downgrade"
				></iframe>
			</div>
		</div>

		<div class="form-card">
			<h2><?php echo esc_html( trs_opt( 'contact_form_heading' ) ); ?></h2>

			<form id="contact-form" novalidate style="margin-top:1.5rem;">
				<div class="form-row form-row--two">
					<div>
						<label class="form-label" for="contact-name"><?php esc_html_e( 'Full name', '3rspace' ); ?> <span class="req">*</span></label>
						<input class="form-control" type="text" id="contact-name" name="name" autocomplete="name" required>
					</div>
					<div>
						<label class="form-label" for="contact-email"><?php esc_html_e( 'Email', '3rspace' ); ?> <span class="req">*</span></label>
						<input class="form-control" type="email" id="contact-email" name="email" autocomplete="email" required>
					</div>
				</div>

				<div class="form-row">
					<label class="form-label" for="contact-subject"><?php esc_html_e( 'Subject', '3rspace' ); ?></label>
					<input class="form-control" type="text" id="contact-subject" name="subject">
				</div>

				<div class="form-row">
					<label class="form-label" for="contact-message"><?php esc_html_e( 'Message', '3rspace' ); ?> <span class="req">*</span></label>
					<textarea class="form-control" id="contact-message" name="message" rows="5" required></textarea>
				</div>

				<div class="form-honeypot" aria-hidden="true">
					<label for="contact-website"><?php esc_html_e( 'Website', '3rspace' ); ?></label>
					<input type="text" id="contact-website" name="trs_website" tabindex="-1" autocomplete="off">
				</div>

				<button type="submit" class="btn btn-primary btn-block"><?php esc_html_e( 'Send message', '3rspace' ); ?></button>

				<p class="form-note" data-form-note role="status"></p>
			</form>
		</div>
	</div>
</section>

<?php get_footer(); ?>

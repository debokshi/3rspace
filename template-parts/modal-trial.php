<?php
/**
 * "Book a Free Trial Day" modal, injected once into the footer.
 * Offers two paths: fill out the form, or message us on WhatsApp directly.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<div class="modal-overlay" id="trial-modal" data-modal>
	<div class="modal" role="dialog" aria-modal="true" aria-labelledby="trial-modal-title" tabindex="-1">
		<div class="modal__head">
			<div>
				<h2 id="trial-modal-title"><?php esc_html_e( 'Book a Free Trial Day', '3rspace' ); ?></h2>
				<p><?php esc_html_e( 'Fill out the form or message us on WhatsApp — whichever is easier.', '3rspace' ); ?></p>
			</div>
			<button type="button" class="modal__close" data-modal-close aria-label="<?php esc_attr_e( 'Close', '3rspace' ); ?>">
				<svg width="16" height="16" viewBox="0 0 16 16" fill="none" aria-hidden="true"><path d="M1 1L15 15M15 1L1 15" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/></svg>
			</button>
		</div>

		<a class="btn btn-whatsapp btn-block" href="<?php echo esc_url( trs_whatsapp_link() ); ?>" target="_blank" rel="noopener noreferrer">
			<svg width="18" height="18" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M4 20L5.4 15.6C4.5 14.1 4 12.3 4 10.5C4 5.8 8.3 2 13.5 2C18.7 2 22 5.8 22 10.5C22 15.2 18.7 19 13.5 19C11.9 19 10.4 18.6 9.1 17.9L4 20Z" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/><path d="M9.5 9.8C9.5 12.5 11.5 14.5 14.2 14.5" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/></svg>
			<?php esc_html_e( 'Message us on WhatsApp', '3rspace' ); ?>
		</a>

		<div class="modal__divider"><span><?php esc_html_e( 'or fill out the form', '3rspace' ); ?></span></div>

		<form id="trial-form" novalidate>
			<div class="form-row form-row--two">
				<div>
					<label class="form-label" for="trial-name"><?php esc_html_e( 'Full name', '3rspace' ); ?> <span class="req">*</span></label>
					<input class="form-control" type="text" id="trial-name" name="name" autocomplete="name" required>
				</div>
				<div>
					<label class="form-label" for="trial-email"><?php esc_html_e( 'Email', '3rspace' ); ?> <span class="req">*</span></label>
					<input class="form-control" type="email" id="trial-email" name="email" autocomplete="email" required>
				</div>
			</div>

			<div class="form-row">
				<label class="form-label" for="trial-phone"><?php esc_html_e( 'Phone', '3rspace' ); ?></label>
				<input class="form-control" type="tel" id="trial-phone" name="phone" autocomplete="tel">
			</div>

			<div class="form-row">
				<label class="form-label" for="trial-notes"><?php esc_html_e( 'Anything we should know?', '3rspace' ); ?></label>
				<textarea class="form-control" id="trial-notes" name="notes" rows="3" placeholder="<?php esc_attr_e( 'Preferred date, team size, questions…', '3rspace' ); ?>"></textarea>
			</div>

			<div class="form-honeypot" aria-hidden="true">
				<label for="trial-website"><?php esc_html_e( 'Website', '3rspace' ); ?></label>
				<input type="text" id="trial-website" name="trs_website" tabindex="-1" autocomplete="off">
			</div>

			<button type="submit" class="btn btn-primary btn-block">
				<?php esc_html_e( 'Request my trial day', '3rspace' ); ?>
			</button>

			<p class="form-note" data-form-note role="status"></p>
		</form>

		<div class="modal__success" data-modal-success>
			<div class="modal__success-icon" aria-hidden="true">
				<svg width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M5 12.5L10 17.5L19 7.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
			</div>
			<h3><?php esc_html_e( 'Request sent!', '3rspace' ); ?></h3>
			<p data-modal-success-message><?php esc_html_e( 'We’ll be in touch shortly.', '3rspace' ); ?></p>
		</div>
	</div>
</div>

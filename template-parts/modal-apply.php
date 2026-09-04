<?php
/**
 * "Apply for a Spot" modal, injected once into the footer.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<div class="modal-overlay" id="apply-modal" data-modal>
	<div class="modal" role="dialog" aria-modal="true" aria-labelledby="apply-modal-title" tabindex="-1">
		<div class="modal__head">
			<div>
				<h2 id="apply-modal-title"><?php esc_html_e( 'Apply for a Spot', '3rspace' ); ?></h2>
				<p><?php esc_html_e( 'Tell us a bit about you and we’ll follow up with next steps and availability.', '3rspace' ); ?></p>
			</div>
			<button type="button" class="modal__close" data-modal-close aria-label="<?php esc_attr_e( 'Close', '3rspace' ); ?>">
				<svg width="16" height="16" viewBox="0 0 16 16" fill="none" aria-hidden="true"><path d="M1 1L15 15M15 1L1 15" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/></svg>
			</button>
		</div>

		<form id="apply-form" novalidate>
			<div class="form-row form-row--two">
				<div>
					<label class="form-label" for="apply-name"><?php esc_html_e( 'Full name', '3rspace' ); ?> <span class="req">*</span></label>
					<input class="form-control" type="text" id="apply-name" name="name" autocomplete="name" required>
				</div>
				<div>
					<label class="form-label" for="apply-email"><?php esc_html_e( 'Email', '3rspace' ); ?> <span class="req">*</span></label>
					<input class="form-control" type="email" id="apply-email" name="email" autocomplete="email" required>
				</div>
			</div>

			<div class="form-row">
				<label class="form-label" for="apply-phone"><?php esc_html_e( 'Phone', '3rspace' ); ?></label>
				<input class="form-control" type="tel" id="apply-phone" name="phone" autocomplete="tel">
			</div>

			<div class="form-row">
				<label class="form-label" for="apply-notes"><?php esc_html_e( 'Anything we should know?', '3rspace' ); ?></label>
				<textarea class="form-control" id="apply-notes" name="notes" rows="3" placeholder="<?php esc_attr_e( 'Team size, move-in date, questions…', '3rspace' ); ?>"></textarea>
			</div>

			<div class="form-honeypot" aria-hidden="true">
				<label for="apply-website"><?php esc_html_e( 'Website', '3rspace' ); ?></label>
				<input type="text" id="apply-website" name="trs_website" tabindex="-1" autocomplete="off">
			</div>

			<button type="submit" class="btn btn-primary btn-block">
				<?php esc_html_e( 'Submit application', '3rspace' ); ?>
			</button>

			<p class="form-note" data-form-note role="status"></p>
		</form>

		<div class="modal__success" data-modal-success>
			<div class="modal__success-icon" aria-hidden="true">
				<svg width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M5 12.5L10 17.5L19 7.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
			</div>
			<h3><?php esc_html_e( 'Application sent!', '3rspace' ); ?></h3>
			<p data-modal-success-message><?php esc_html_e( 'We’ll be in touch shortly.', '3rspace' ); ?></p>
		</div>
	</div>
</div>

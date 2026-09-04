<?php
/**
 * Footer template.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
</main>

<footer class="site-footer">
	<div class="container">
		<div class="footer-grid">
			<div class="footer-brand">
				<p class="site-title"><span class="mark" aria-hidden="true">3R</span> <?php bloginfo( 'name' ); ?></p>
				<p><?php echo esc_html( trs_opt( 'footer_description' ) ); ?></p>
			</div>

			<div class="footer-col">
				<h4><?php esc_html_e( 'Explore', '3rspace' ); ?></h4>
				<ul>
					<?php
					wp_nav_menu( array(
						'theme_location' => 'footer',
						'container'      => false,
						'items_wrap'     => '%3$s',
						'fallback_cb'    => 'trs_footer_fallback_menu',
					) );
					?>
					<li><button type="button" class="js-open-apply-modal" style="background:none;border:0;padding:0;text-align:left;color:inherit;"><?php echo esc_html( trs_opt( 'apply_button_label' ) ); ?></button></li>
					<li><button type="button" class="js-open-trial-modal" style="background:none;border:0;padding:0;text-align:left;color:inherit;"><?php echo esc_html( trs_opt( 'trial_button_label' ) ); ?></button></li>
				</ul>
			</div>

			<div class="footer-col">
				<h4><?php esc_html_e( 'Contact', '3rspace' ); ?></h4>
				<ul>
					<li><span><?php echo esc_html( trs_opt( 'business_address' ) ); ?></span></li>
					<li><a href="<?php echo esc_url( 'mailto:' . trs_opt( 'business_email' ) ); ?>"><?php echo esc_html( trs_opt( 'business_email' ) ); ?></a></li>
					<li><a href="<?php echo esc_attr( 'tel:' . preg_replace( '/[^0-9+]/', '', trs_opt( 'business_phone' ) ) ); ?>"><?php echo esc_html( trs_opt( 'business_phone' ) ); ?></a></li>
				</ul>
			</div>
		</div>

		<div class="footer-bottom">
			<span>&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?>. <?php echo esc_html( trs_opt( 'footer_bottom_text' ) ); ?></span>
			<span><?php esc_html_e( 'Made with WordPress', '3rspace' ); ?></span>
		</div>
	</div>
</footer>

<?php get_template_part( 'template-parts/modal-apply' ); ?>
<?php get_template_part( 'template-parts/modal-trial' ); ?>

<?php wp_footer(); ?>
</body>
</html>

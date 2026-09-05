<?php
/**
 * Template Name: About Page
 * Also auto-selected for a page with the slug "about" (page-about.php).
 *
 * Copy comes from Customizer text fields — see inc/customizer.php.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<section class="page-header">
	<div class="container">
		<p class="eyebrow"><?php echo esc_html( trs_opt( 'about_eyebrow' ) ); ?></p>
		<h1><?php echo esc_html( trs_opt( 'about_heading' ) ); ?></h1>
	</div>
</section>

<section class="section" style="padding-top:0;">
	<div class="container about-grid">
		<div class="about-photo">
			<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/gallery-lounge.jpg' ); ?>" alt="<?php esc_attr_e( 'Members working and gathering in the shared lounge area at 3Rspace.', '3rspace' ); ?>" width="1100" height="1467" loading="lazy">
		</div>
		<div class="about-content">
			<?php echo wp_kses_post( wpautop( esc_html( trs_opt( 'about_body' ) ) ) ); ?>
		</div>
	</div>
</section>

<?php get_footer(); ?>

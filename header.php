<?php
/**
 * Header template.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a class="screen-reader-text" href="#main-content"><?php esc_html_e( 'Skip to content', '3rspace' ); ?></a>

<header class="site-header">
	<div class="container site-header__inner">
		<p class="site-branding site-title">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
				<span class="mark" aria-hidden="true">3R</span>
				<?php bloginfo( 'name' ); ?>
			</a>
		</p>

		<nav class="primary-nav" aria-label="<?php esc_attr_e( 'Primary', '3rspace' ); ?>">
			<?php
			wp_nav_menu( array(
				'theme_location' => 'primary',
				'container'      => false,
				'menu_class'     => 'primary-nav__menu',
				'menu_id'        => 'primary-menu',
				'fallback_cb'    => 'trs_fallback_menu',
			) );
			?>
			<div class="site-header__actions">
				<button type="button" class="btn btn-outline js-open-apply-modal">
					<?php echo esc_html( trs_opt( 'apply_button_label' ) ); ?>
				</button>
				<button type="button" class="btn btn-primary js-open-trial-modal">
					<?php echo esc_html( trs_opt( 'trial_button_label' ) ); ?>
				</button>
				<button type="button" class="nav-toggle" aria-controls="primary-menu" aria-expanded="false">
					<span class="screen-reader-text"><?php esc_html_e( 'Menu', '3rspace' ); ?></span>
					<span></span><span></span><span></span>
				</button>
			</div>
		</nav>
	</div>
</header>

<main id="main-content">

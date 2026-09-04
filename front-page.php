<?php
/**
 * Front page template.
 *
 * All copy on this page comes from Customizer text fields — see
 * inc/customizer.php for defaults and trs_opt() / trs_opt_lines() for reads.
 * Only the feature icons (SVG) and photo files are fixed in code.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

$feature_icons = array(
	'<path d="M2 8.5C7 3.5 17 3.5 22 8.5" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/><path d="M5.5 12C9 8.5 15 8.5 18.5 12" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/><path d="M9 15.5C10.7 13.8 13.3 13.8 15 15.5" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/><circle cx="12" cy="19" r="1.2" fill="currentColor"/>',
	'<rect x="3" y="5" width="18" height="13" rx="2" stroke="currentColor" stroke-width="1.6"/><path d="M7 9H13" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/><path d="M7 12.5H11" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/>',
	'<circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="1.6"/><path d="M12 7V12L15.5 14" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>',
	'<path d="M4 8H16V13.5C16 16 14 18 11.5 18H8.5C6 18 4 16 4 13.5V8Z" stroke="currentColor" stroke-width="1.6"/><path d="M16 9.5H17.5C18.6 9.5 19.5 10.4 19.5 11.5C19.5 12.6 18.6 13.5 17.5 13.5H16" stroke="currentColor" stroke-width="1.6"/><path d="M7 5.5C7 5.5 7.7 4.7 7 4C6.3 3.3 7 2.5 7 2.5" stroke="currentColor" stroke-width="1.4" stroke-linecap="round"/>',
	'<rect x="5" y="9" width="14" height="7" rx="1.5" stroke="currentColor" stroke-width="1.6"/><path d="M7 9V5H17V9" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/><path d="M7 16V19H17V16" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/>',
	'<circle cx="8.5" cy="9" r="2.2" stroke="currentColor" stroke-width="1.6"/><circle cx="16" cy="9" r="2.2" stroke="currentColor" stroke-width="1.6"/><path d="M3.5 18C3.9 15.4 5.9 13.8 8.5 13.8C11.1 13.8 13.1 15.4 13.5 18" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/><path d="M12.5 14C14.6 14.1 16.4 15.6 16.8 18" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/>',
);

$features = array();
for ( $i = 1; $i <= 6; $i++ ) {
	$features[] = array(
		'title' => trs_opt( "feature_{$i}_title" ),
		'desc'  => trs_opt( "feature_{$i}_desc" ),
		'icon'  => $feature_icons[ $i - 1 ],
	);
}

$gallery = array(
	array(
		'src'     => get_template_directory_uri() . '/assets/img/gallery-desks.jpg',
		'alt'     => __( 'Open desk cluster with laptops set up, natural light, and industrial-style shelving.', '3rspace' ),
		'caption' => trs_opt( 'gallery_caption_1' ),
	),
	array(
		'src'        => get_template_directory_uri() . '/assets/img/gallery-lounge.jpg',
		'alt'        => __( 'Lounge corner with bean bag chairs beside a row of desks.', '3rspace' ),
		'caption'    => trs_opt( 'gallery_caption_2' ),
		'bias_lower' => true,
	),
	array(
		'src'        => get_template_directory_uri() . '/assets/img/gallery-quiet.jpg',
		'alt'        => __( 'A two-person desk on the open floor, with shelving and framed art on the wall behind.', '3rspace' ),
		'caption'    => trs_opt( 'gallery_caption_3' ),
		'bias_lower' => true,
	),
);
?>

<section class="hero">
	<div class="container hero__grid">
		<div class="hero__copy">
			<p class="eyebrow"><?php echo esc_html( trs_opt( 'hero_eyebrow' ) ); ?></p>
			<h1><?php echo esc_html( trs_opt( 'hero_heading' ) ); ?></h1>
			<p class="section-lede"><?php echo esc_html( trs_opt( 'hero_lede' ) ); ?></p>
			<div class="hero__actions">
				<button type="button" class="btn btn-primary js-open-apply-modal"><?php echo esc_html( trs_opt( 'apply_button_label' ) ); ?></button>
				<a class="btn btn-outline" href="#plans"><?php echo esc_html( trs_opt( 'hero_secondary_button_label' ) ); ?></a>
			</div>
			<div class="hero__stats">
				<div class="hero__stat">
					<strong><?php echo esc_html( trs_opt( 'hero_stat1_number' ) ); ?></strong>
					<span><?php echo esc_html( trs_opt( 'hero_stat1_label' ) ); ?></span>
				</div>
				<div class="hero__stat">
					<strong><?php echo esc_html( trs_opt( 'hero_stat2_number' ) ); ?></strong>
					<span><?php echo esc_html( trs_opt( 'hero_stat2_label' ) ); ?></span>
				</div>
				<div class="hero__stat">
					<strong><?php echo esc_html( trs_opt( 'hero_stat3_number' ) ); ?></strong>
					<span><?php echo esc_html( trs_opt( 'hero_stat3_label' ) ); ?></span>
				</div>
			</div>
		</div>

		<div class="hero__art">
			<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/hero-space.jpg' ); ?>" alt="<?php esc_attr_e( 'Bright, modern coworking desks with laptops set up and industrial-style shelving on the wall.', '3rspace' ); ?>" width="1700" height="2267">
			<div class="hero__art-card">
				<strong><?php echo esc_html( trs_opt( 'hero_photo_title' ) ); ?></strong>
				<span><?php echo esc_html( trs_opt( 'hero_photo_subtitle' ) ); ?></span>
			</div>
		</div>
	</div>
</section>

<section class="section" style="padding-block: var(--space-4) var(--space-6);">
	<div class="container">
		<div class="grid-3">
			<?php foreach ( $gallery as $photo ) : ?>
				<div class="gallery-card">
					<div class="gallery-card__img<?php echo ! empty( $photo['bias_lower'] ) ? ' gallery-card__img--bottom' : ''; ?>">
						<img src="<?php echo esc_url( $photo['src'] ); ?>" alt="<?php echo esc_attr( $photo['alt'] ); ?>" loading="lazy" width="1100" height="1467">
					</div>
					<p class="gallery-card__caption"><?php echo esc_html( $photo['caption'] ); ?></p>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<section class="section section--alt" id="amenities">
	<div class="container">
		<div class="section-head section-head--center">
			<p class="eyebrow"><?php echo esc_html( trs_opt( 'amenities_eyebrow' ) ); ?></p>
			<h2><?php echo esc_html( trs_opt( 'amenities_heading' ) ); ?></h2>
			<p class="section-lede" style="margin-inline:auto;"><?php echo esc_html( trs_opt( 'amenities_lede' ) ); ?></p>
		</div>

		<div class="grid-3">
			<?php foreach ( $features as $feature ) : ?>
				<div class="feature-card">
					<span class="feature-card__icon" aria-hidden="true">
						<svg width="22" height="22" viewBox="0 0 24 24" fill="none"><?php echo $feature['icon']; // phpcs:ignore -- static, theme-authored icon markup, no user input. ?></svg>
					</span>
					<h3><?php echo esc_html( $feature['title'] ); ?></h3>
					<p><?php echo esc_html( $feature['desc'] ); ?></p>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<section class="section" id="plans">
	<div class="container">
		<div class="section-head section-head--center">
			<p class="eyebrow"><?php echo esc_html( trs_opt( 'pricing_eyebrow' ) ); ?></p>
			<h2><?php echo esc_html( trs_opt( 'pricing_heading' ) ); ?></h2>
			<p class="section-lede" style="margin-inline:auto;"><?php echo esc_html( trs_opt( 'pricing_lede' ) ); ?></p>
		</div>

		<div class="plan-card plan-card--single">
			<h3><?php echo esc_html( trs_opt( 'plan_name' ) ); ?></h3>
			<p class="plan-card__price">
				<strong><?php echo esc_html( trs_opt( 'plan_price' ) ); ?></strong>
				<span><?php echo esc_html( trs_opt( 'plan_period' ) ); ?></span>
			</p>
			<ul class="plan-card__list">
				<?php foreach ( trs_opt_lines( 'plan_items' ) as $item ) : ?>
					<li>
						<svg width="16" height="16" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M5 12.5L10 17.5L19 7.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
						<?php echo esc_html( $item ); ?>
					</li>
				<?php endforeach; ?>
			</ul>
			<button type="button" class="btn btn-primary btn-block js-open-apply-modal">
				<?php echo esc_html( trs_opt( 'apply_button_label' ) ); ?>
			</button>
		</div>
	</div>
</section>

<section class="section">
	<div class="container">
		<div class="cta-band">
			<div>
				<h2><?php echo esc_html( trs_opt( 'cta_heading' ) ); ?></h2>
				<p><?php echo esc_html( trs_opt( 'cta_text' ) ); ?></p>
			</div>
			<button type="button" class="btn btn-primary js-open-apply-modal"><?php echo esc_html( trs_opt( 'apply_button_label' ) ); ?></button>
		</div>
	</div>
</section>

<?php get_footer(); ?>

<?php
/**
 * Fallback index template (required by WordPress).
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<section class="section">
	<div class="container">
		<?php if ( have_posts() ) : ?>
			<div class="grid-3">
				<?php
				while ( have_posts() ) :
					the_post();
					?>
					<article <?php post_class( 'feature-card' ); ?>>
						<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						<p><?php echo esc_html( wp_trim_words( get_the_excerpt(), 20 ) ); ?></p>
					</article>
					<?php
				endwhile;
				?>
			</div>
			<?php the_posts_pagination(); ?>
		<?php else : ?>
			<p><?php esc_html_e( 'Nothing found.', '3rspace' ); ?></p>
		<?php endif; ?>
	</div>
</section>

<?php get_footer(); ?>

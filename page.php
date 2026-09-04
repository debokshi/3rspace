<?php
/**
 * Fallback template for any page other than the front page or Contact.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<section class="page-header">
	<div class="container">
		<h1><?php the_title(); ?></h1>
	</div>
</section>

<section class="section" style="padding-top:0;">
	<div class="container">
		<div class="form-card" style="max-width:760px;">
			<?php
			while ( have_posts() ) :
				the_post();
				the_content();
			endwhile;
			?>
		</div>
	</div>
</section>

<?php get_footer(); ?>

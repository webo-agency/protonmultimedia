<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package ProtonMultimedia
 */

  get_header();

  $sections_path = 'template-parts/section';
?>
	<?php while ( have_posts() ) : the_post(); ?>
	
		<?php
			get_template_part( $sections_path, 'post-header', 
				array( 
					'title_string' => get_the_title('', false), 
					'post_date_string' => get_the_date( 'd / m / Y' ),
					'post_terms_terms' => get_terms( array(
						'taxonomy' => 'post_tag',
						'hide_empty' => true,
					)),
					'description_string' => get_the_excerpt(),
					'background_id' => get_post_thumbnail_id(),
				)
			);
		?>

		<main id="main" class="bg-white text-black">
			<div class="container">
				<?php get_template_part( 'template-parts/content', get_post_type() );	?>
			</div>
		</main>
	<?php endwhile;	?>

	<?php get_template_part( $sections_path, 'call-to-action' ); ?>

<?php

	get_footer();

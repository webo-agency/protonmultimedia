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
		<main id="main" class="desktop-wide:px-smaller-container">

			<?php
				while ( have_posts() ) :
					the_post();

					get_template_part( $sections_path, 'header', 
						array( 
							'title_string' => get_the_title('', false), 
							'description_string' => get_the_content(),
							'background_id' => get_post_thumbnail_id(),
							'align_canter_boolean' => true
						)
					);
			
					get_template_part( 'template-parts/content', get_post_type() );

				endwhile;
			?>

		</main>

	<?php get_template_part( $sections_path, 'call-to-action' ); ?>

<?php

	get_footer();

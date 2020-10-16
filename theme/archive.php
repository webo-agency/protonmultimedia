<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ProtonMultimedia
 */

	get_header();

	$sections_path = 'template-parts/section';
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<div class="container">
				<div class="desktop-wide:px-smaller-container">

					<?php if ( have_posts() ) : ?>

						<?php get_template_part( $sections_path, 'header', 
								array( 
									'title_string' => get_the_archive_title(), 
									'description_string' => get_the_archive_description(),
									'background_id' => null
								)
							);
						?>

						<?php
							/* Start the Loop */
							while ( have_posts() ) :
								the_post();

								/*
								* Include the Post-Type-specific template for the content.
								* If you want to override this in a child theme, then include a file
								* called content-___.php (where ___ is the Post Type name) and that will be used instead.
								*/
								get_template_part( 'template-parts/content', get_post_type() );

							endwhile;
						?>

						<?php
							the_posts_navigation();
						?>
				<?php
					else :

						get_template_part( 'template-parts/content', 'none' );
						
					endif;
				?>

				</div>
			</div>
		</main>
	</div>

	<?php get_template_part( $sections_path, 'call-to-action' ); ?>

<?php

	get_footer();

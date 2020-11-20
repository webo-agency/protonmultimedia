<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ProtonMultimedia
 */

	get_header();

	$sections_path = 'template-parts/section';

	$id = get_queried_object_id();

	$post = get_post($id);
?>
	<?php get_template_part( $sections_path, 'header', 
			array( 
				'title_string' => get_the_title($id), 
				'description_string' => apply_filters('the_content', $post->post_content),
				'background_id' => get_post_thumbnail_id($id)
			)
		);
	?>

	<div id="primary" class="x-page content-area">
		<main id="main" class="site-main">
			<div class="container">
				<div class="desktop-wide:px-smaller-container">
					<?php
					while ( have_posts() ) :
						the_post();

						get_template_part( 'template-parts/content', 'page' );

					endwhile;
					?>
				</div>
			</div>
		</main>
	</div>

<?php
get_footer();

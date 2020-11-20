<?php 
/* 
 * Template Name: Kontakt
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

	<div id="primary" class="x-contact content-area">
		<main id="main" class="site-main">
			<div class="container">
				<div class="desktop-wide:px-smaller-container">
					<?php echo do_shortcode('[acfe_form name="' . get_field('contact_form', $id) . '"]'); ?>
				</div>
			</div>
		</main>
	</div>

<?php
get_footer();

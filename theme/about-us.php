<?php 
/* 
 * Template Name: O nas
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
        'background_id' => get_post_thumbnail_id($id),
        'align_center_boolean' => true
			)
		);
	?>

	<main id="main">
		<div class="desktop-wide:px-smaller-container">
			<?php
				the_content();
			?>
		</div>
	</main>

  <?php get_template_part( $sections_path, 'call-to-action' ); ?>

<?php
get_footer();

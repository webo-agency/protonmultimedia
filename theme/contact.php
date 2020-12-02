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

	<header class="container">
		<div class="desktop-wide:pl-smaller-container relative">
			<h2 class="text-center">
				<?php
					$lines = explode(PHP_EOL, get_the_title($id));
					foreach ( $lines as $line) {
							echo preg_replace("/\*(.+)\*/", '<span class="text-primary">$1</span>', $line);
					}
				?>
			</h2>

			<p class="text-center">
				<?php
					apply_filters('the_content', $post->post_content)
				?>
			</p>
		</div>
	</header>

	<main id="main" class="site-main container">
		<div class="desktop-wide:pl-smaller-container relative">
			<div class="desktop-wide:px-smaller-container">
				<?php echo do_shortcode('[acfe_form name="' . get_field('contact_form', $id) . '"]'); ?>
			</div>
		</div>
	</main>

<?php
get_footer();

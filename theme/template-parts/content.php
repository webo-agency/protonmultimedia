<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ProtonMultimedia
 */

?>

<div class="desktop-wide:px-smaller-container">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php
			the_content();
		?>
	</article><!-- #post-<?php the_ID(); ?> -->
</div>
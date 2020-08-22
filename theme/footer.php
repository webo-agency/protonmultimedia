<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ProtonMultimedia
 */

	$sections_path = 'template-parts/layout';
?>

		</div>

		<?php get_template_part( $sections_path, 'footer' ); ?>
	</div>

	<?php wp_footer(); ?>
</body>
</html>

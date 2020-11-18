<?php
/**
 * The homepage template file
 *
 * @package ProtonMultimedia
 */

get_header();
$sections_path = 'template-parts/section';
?>

	<?php get_template_part( $sections_path, 'baner' ); ?>

	<?php get_template_part( $sections_path, 'offer' ); ?>

	<?php get_template_part( $sections_path, 'about-us' ); ?>

	<?php get_template_part( $sections_path, 'realizations' ); ?>

	<?php get_template_part( $sections_path, 'news', array(
		'count_posts_int' => 4
	)); ?>

	<?php get_template_part( $sections_path, 'call-to-action' ); ?>

	<!-- TEST deploy 2 -->

<?php
get_footer();

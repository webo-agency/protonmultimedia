<?php
/**
 * Service - post template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ProtonMultimedia
 */

get_header();
$sections_path = 'template-parts/section';
?>

  <?php get_template_part( $sections_path, 'header', 
    array( 
      'title_string' => get_the_title('', false), 
      'description_string' => get_the_content(),
      'background_id' => get_post_thumbnail_id()
    )
  ); ?>

	<?php get_template_part( $sections_path, 'benefit' ); ?>

	<?php get_template_part( $sections_path, 'service' ); ?>

	<?php get_template_part( $sections_path, 'news' , array('count_posts' => 2)); ?>

	<?php get_template_part( $sections_path, 'call-to-action' ); ?>

<?php
get_footer();

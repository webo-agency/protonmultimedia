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

	<?php if( have_rows('section') ): ?>
			<?php while( have_rows('section') ): the_row(); ?>
					<?php if( get_row_layout() == 'featured_right' ): ?>
						
						<?php get_template_part( $sections_path, 'featured-right',
							array(
								'title_string' => get_sub_field('title'),
								'description_string' => get_sub_field('description'),
								'highlighted_array' => get_sub_field('highlighted'),
								'side_description_string' => get_sub_field('side_description_title'),
							)
						); ?>
							
					<?php else if( get_row_layout() == 'featured_center' ):  ?>
							
							<?php get_template_part( $sections_path, 'featured-center',
								array(
									'title_string' => get_sub_field('title'),
									'description_string' => get_sub_field('description'),
									'highlighted_icon_center_id' => get_sub_field('highlighted_icon_center'),
									'background_id' => get_sub_field('background'),
									'highlighted_array' => get_sub_field('highlighted'),
									'side_description_string' => get_sub_field('side_description'),
								)
							); ?>

					<?php endif; ?>
			<?php endwhile; ?>
	<?php endif; ?>

	<?php get_template_part( $sections_path, 'realizations' ); ?>

	<?php get_template_part( $sections_path, 'news' , array('count_posts_int' => 2)); ?>

	<?php get_template_part( $sections_path, 'call-to-action' ); ?>

<?php
get_footer();

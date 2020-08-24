<?php
/**
 * The service category template file
 *
 * @package ProtonMultimedia
 */

get_header();
$sections_path = 'template-parts/section';
?>

  <?php get_template_part( $sections_path, 'header', 
    array( 
      'title_string' => single_term_title('', false), 
      'description_string' => term_description(get_queried_object()->term_id),
      'background_id' => get_field('service_category_featured_image', get_queried_object())
    )
  ); ?>

  <?php get_template_part( $sections_path, 'post-list-tiles', array(
    'section_name_string' => 'Oferta',
    'list_post_array' => get_posts( array(
        'posts_per_page' => -1,
        'orderby' => 'title',
        'post_type' => 'services',
        'post_status' => 'publish',
        'tax_query' => array(
          array(
              'taxonomy' => get_queried_object()->taxonomy,
              'field' => 'slug',
              'terms' => get_queried_object()->slug
          )
        )
      ))
  ) ); ?>

<?php
get_footer();

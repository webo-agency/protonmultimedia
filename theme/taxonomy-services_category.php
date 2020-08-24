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

  <?php 
    $posts = get_posts( array(
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
    ));

    $terms_all = [];

    foreach ($posts as $key => $post) {
      if($terms_post = get_the_terms($post, 'services_tags')){
        $terms_all = array_merge($terms_all, $terms_post);
      }
    }

    get_template_part( $sections_path, 'post-list-tiles', array(
      'section_name_string' => 'Oferta',
      'list_post_array' => $posts,
      'filters_array' => $terms_all
    )); 
  ?>

  <?php get_template_part( $sections_path, 'call-to-action' ); ?>

<?php
get_footer();

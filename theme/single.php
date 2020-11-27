<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package ProtonMultimedia
 */

  get_header();

  $sections_path = 'template-parts/section';
?>
	<?php while ( have_posts() ) : the_post(); ?>
	
	<?php               
		$post_services = get_field( 'services', get_the_ID() );
		if($post_services) {
				foreach($post_services as $post_service) {

						$service_categories = wp_get_post_terms($post_service, 'services_category', array("fields" => "all"));
						$post_taxonomies = array();
						
						if ( $service_categories ) {
								foreach($service_categories as $category) {
										$category->link = get_term_link( $category->term_id );
										array_push($post_taxonomies, $category);
								}
						}
						array_push($post_taxonomies, $service_tag);
				}
		}?>
																						
		<?php
			get_template_part( $sections_path, 'post-header', 
				array( 
					'title_string' => get_the_title('', false), 
					'post_date_string' => get_the_date( 'd / m / Y' ),
					'post_terms_terms' => $post_taxonomies,
					'description_string' => get_the_excerpt(),
					'background_id' => get_post_thumbnail_id(),
				)
			);
		?>

		<main id="main" class="bg-white text-black desktop:py-32">
			<?php get_template_part( 'template-parts/content', get_post_type() );	?>

			<div class="mb-6">
        <?php
          foreach($args['post_terms_terms'] as $term) {
            ?>
              <a class="pm-taxonomy-pill" href="<?php echo $term->link; ?>" title="<?php echo $term->name; ?>">
                  <?php echo $term->name; ?>
              </a>
            <?php
          }
        ?>
      </div>
		</main>
	<?php endwhile;	?>

	<?php get_template_part( $sections_path, 'call-to-action' ); ?>

<?php

	get_footer();

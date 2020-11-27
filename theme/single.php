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

						$service = get_post($post_service);
						$service_title = get_the_title( $service->ID );
						$service_link = get_permalink($service->ID);

						$service_tag = new stdClass;
						$service_tag->name = $service_title;
						$service_tag->link = $service_link;
						
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

			<aside class="container">
				<div class="mx-auto max-w-900px">
					<div class="mb-6">
						<?php
							foreach($post_taxonomies as $term) {
								?>
									<a class="pm-taxonomy-pill" href="<?php echo $term->link; ?>" title="<?php echo $term->name; ?>">
											<?php echo $term->name; ?>
									</a>
								<?php
							}
						?>
					</div>

					<h2 class="mt-24 mb-2 text-lg">
						<?php 
							$lines = explode(' ', 'Podziel się *wpisem!*');
							$firstWord = array_slice($lines, 0, 1);
							$restOfString = array_slice($lines, 1);
							echo '<span class="line-decorated bg-primary">'.$firstWord[0].'</span>';
							echo '<br>';
							foreach ( $restOfString as $word) {
								echo $word . ' ';
							}
						?>
				</h2>
					
					<ul class="wp-block-social-links">
						<li class="wp-social-link wp-social-link-facebook w-16 mr-8 h-full">
								<a href="http://dcadscdac" aria-label="Facebook">
									<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 60 60" fill-rule="evenodd" clip-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="2">
										<path d="M0 0h60v60H41.426V36.797h7.822l1.172-9.082h-8.994v-5.784c0-2.624.728-4.411 4.49-4.411h4.768V9.418c-.83-.11-3.676-.357-6.987-.357-6.914 0-11.646 4.219-11.646 11.97v6.684h-7.793v9.082h7.793V60H0V0z" fill="#01b9c3" fill-rule="nonzero"></path>
									</svg>
								</a>
							</li>
							<li class="wp-social-link wp-social-link-linkedin w-16 mr-8 h-full">
								<a href="http://cadcdacadc" aria-label="LinkedIn">
									<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 60 60" fill-rule="evenodd" clip-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="2">
										<path d="M60 0H0v60h60V0zM21.282 45.352h-7.306V23.37h7.306v21.982zm-3.653-24.983h-.047c-2.452 0-4.038-1.688-4.038-3.797 0-2.157 1.635-3.799 4.134-3.799 2.499 0 4.037 1.642 4.085 3.799 0 2.109-1.586 3.797-4.134 3.797zm29.999 24.983h-7.306v-11.76c0-2.955-1.058-4.971-3.701-4.971-2.019 0-3.221 1.36-3.749 2.672-.193.47-.24 1.126-.24 1.783v12.276h-7.306s.095-19.92 0-21.982h7.306v3.113c.971-1.498 2.708-3.629 6.584-3.629 4.807 0 8.412 3.142 8.412 9.893v12.605z" fill="#01b9c3" fill-rule="nonzero"></path>
									</svg>
								</a>
							</li>
							<li class="wp-social-link wp-social-link-twitter w-16 mr-8 h-full">
								<a href="http://cascascasc" aria-label="Twitter">
									<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 60 60" fill-rule="evenodd" clip-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="2">
									<path d="M0 0h60v60H0V0zm47.299 19.129a.759.759 0 00-.913-.161c-.314.142-.64.26-.973.351a6.826 6.826 0 001.157-2.226.761.761 0 00-1.172-.819 15.994 15.994 0 01-3.661 1.432 7.658 7.658 0 00-9.595-.741 7.553 7.553 0 00-3.287 6.977 18.015 18.015 0 01-12.618-6.796.787.787 0 00-.647-.284.761.761 0 00-.609.371 7.367 7.367 0 00-.84 5.717 8.149 8.149 0 001.323 2.765 4.059 4.059 0 01-.773-.494.762.762 0 00-1.241.59 7.872 7.872 0 004.054 6.757 5.665 5.665 0 01-.98-.21.762.762 0 00-.913 1.041 8.304 8.304 0 005.765 4.717 13.415 13.415 0 01-8.028 1.653.761.761 0 00-.461 1.418 22.814 22.814 0 0011.246 3.196 19.321 19.321 0 0010.674-3.264c6.031-4.003 9.789-11.189 9.266-17.618a14.204 14.204 0 003.308-3.448.762.762 0 00-.082-.924z" fill="#01b9c3" fill-rule="nonzero"></path>
									</svg>
								</a>
							</li>
						</ul>
				</div>
			</aside>
		</main>
	<?php endwhile;	?>

	<?php get_template_part( $sections_path, 'call-to-action' ); ?>

<?php

	get_footer();

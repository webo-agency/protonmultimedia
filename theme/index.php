<?php
/**
 * The main template file
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
?>
	
	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<div class="relative desktop-wide:px-smaller-container flex flex-row">
				<div class="container z-10">
					<div class="flex-auto">
						<h2 class="font-bold uppercase mb-14 mt-20 desktop:mt-40">
							<?php
								$news_title = get_field('news_title', 'option');;
								$news_lines = explode(PHP_EOL, $news_title);
								foreach ( $news_lines as $line) {
									echo preg_replace("/\*(.+)\*/", '<span class="block line-decorated bg-primary">$1</span>', $line);
								}
							?>
						</h2>
						<p class="pb-10 tablet:pb-16">
							<?php echo get_field('news_description', 'option'); ?>
						</p>
					</div>
				</div>
				<?php $news_bg = get_field('news_background', 'option'); ?>
				<img 
					src="<?php echo $news_bg['url'] ?>" 
					alt="Background"
					class="object-cover absolute left-0 top-0 right-0 bottom-0 h-full w-full pointer-events-none"
					role="presentation"
				/>
			</div>
			<div class="container">
				<section class="relative bg-dark-blue-2">
					<div>
			
						<?php
						if ( have_posts() ) :
						$list_of_posts = get_posts( array(
							'sort_order' => 'desc',
							'posts_per_page' => 10,
						));
						if( $list_of_posts ): ?>
						<ul class="w-full flex-auto flex flex-col tablet:flex-row tablet:flex-wrap">
							<?php foreach( $list_of_posts as $featured_post ): 
								$post_date = get_the_date( 'd / m / Y' ); 
								$permalink = get_permalink( $featured_post->ID );
								$title = get_the_title( $featured_post->ID );
								$excerpt = get_the_excerpt( $featured_post->ID);
								$post_image = get_the_post_thumbnail_url($featured_post->ID, array('400', '9999')); ?>
								
								<li class="phone-wide:flex-1/2 tablet:max-w-1/2 relative">
							<div class="box-gradient-overlay box-gradient-overlay--dark-blue-2 absolute top-0 bottom-0 left-0 w-full h-full -mb-1 z-10"></div>
							<img 
								class="absolute object-cover h-full w-full min-h-full min-w-full" 
								src="<?php echo $post_image; ?>" 
								alt="<?php echo esc_html( $title ); ?>" 
								title="<?php echo esc_html( $title ); ?>" 
							/>
							<article class="relative min-h-300px flex group w-full h-full z-10 p-5 desktop:py-8 desktop:px-12 desktop-wide:pr-32 full-hd:px-16 full-hd:pr-48 desktop:hover:bg-white transition duration-300">
								<div class="h-full w-full relative mt-auto">
									<div class="relative flex flex-col justify-end desktop:group-hover:justify-between z-10 h-full w-full">
										<div class="desktop:sticky desktop:top-screen desktop:group-hover:top-auto">
											<span class="text-primary text-sm tablet:text-base leading-line-height-normal block mb-1 tablet:mb-2"><?php echo $post_date; ?></span>
											<h3 class="mb-4 full-hd:mb-6 desktop:text-white desktop:group-hover:text-black"><?php echo esc_html( $title ); ?></h3>
										</div>
										<div class="desktop:invisible desktop:group-hover:visible">
											<div class="hidden desktop:block desktop:text-black mb-6">
												<?php 
												$post_services = get_field( 'services', $featured_post->ID );
												if($post_services) {
													foreach($post_services as $post_service) {
									
														$service = get_post($post_service);
														$service_title = get_the_title( $service->ID );
														$service_link = get_permalink($service->ID);

														$service_tag = new stdClass;
														$service_tag->name = $service_title;
														$service_tag->link = $service_link;

														$service_categories = wp_get_post_terms($post_service, 'services_category', array("fields" => "all"));
														$post_taxonomies = array();
														
														if ( $service_categories ) {
															foreach($service_categories as $category) {
																$category->link = get_term_link( $category->term_id );
																array_push($post_taxonomies, $category);
															}
														}
														array_push($post_taxonomies, $service_tag);

														foreach($post_taxonomies as $post_taxonomy) {
															?>
															<a class="pm-taxonomy-pill" href="<?php echo $post_taxonomy->link; ?>" title="<?php echo $post_taxonomy->name; ?>">
																<?php echo $post_taxonomy->name; ?>
															</a>
															<?php
														}
													}
												}?>
											</div>
										</div>
										<div class="flex-1 hidden desktop:block desktop:invisible desktop:group-hover:visible text-sm full-hd:text-base text-black">
											<p class="mb-6 full-hd:mb-14"><?php echo $excerpt; ?></p>
										</div>
										<a class="desktop:invisible desktop:group-hover:visible pm-button pm-button--text-primary" href="<?php echo esc_url( $permalink ); ?>">Czytaj całość</a>
									</div>
								</div>
							</article>
						</li> 
					<?php endforeach; ?>
					</ul>
					<?php endif;
					wp_reset_postdata();
					the_posts_navigation();

				else :

					get_template_part( 'template-parts/content', 'none' );

				endif;
				?>
			</div>
			</section>
			
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();

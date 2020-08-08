<?php
/**
 * The homepage template file
 *
 * @package ProtonMultimedia
 */

get_header();

?>
	<section class="pm-baner">	
		<div class="pm-swiper pm-swiper--hero-swiper">
			<div class="swiper-container pm-swiper--hero-swiper__container" data-slider-hero>
			<img class="pm-swiper--hero-swiper__lines" src="<?php echo get_template_directory_uri() . '/assets/svg/banner-lines.svg' ?>" />
				<ul class="swiper-wrapper">
				<?php
					if( have_rows('front_slider_slide') ):
						while ( have_rows('front_slider_slide') ) : the_row();
							$heading = get_sub_field('front_slide_heading');
							$content = get_sub_field('front_slide_content');
							$front_slide_button = get_sub_field('front_slide_button');
							$front_slider_image = get_sub_field('front_slider_image');
							?>	
								<li class="swiper-slide" style="background: url(<?php echo $front_slider_image['url'] ?>) center center no-repeat; background-size: cover">
									<div class="pm-container pm-container--indented pm-swiper--hero-swiper__content-container">
										<?php echo $heading; ?>
										<div class="pm-swiper--hero-swiper__content-wrapper">
											<div class="pm-swiper--hero-swiper__content" data-hero-content>
												<?php echo $content; ?>
											</div>
										</div>
											<?php
												if( $front_slide_button ): 
													$front_slide_button_url = $front_slide_button['url'];
													$front_slide_button_title = $front_slide_button['title'];
													$front_slide_button_target = $front_slide_button['target'] ? $front_slide_button['target'] : '_self';
												endif;
											?>
										<a
											class="pm-button pm-button--primary pm-button--large"
											href="<?php echo esc_url( $front_slide_button_url ); ?>"
											target="<?php echo esc_attr( $front_slide_button_target ); ?>">
											<?php echo esc_html( $front_slide_button_title ); ?>
										</a>
									</div>
								</li>
							<?php
						endwhile;
					else :
					endif;
				?>
				</ul>
				<div class="pm-container pm-container--indented">
					<div class="swiper-pagination pm-swiper--hero-swiper__swiper-pagination"></div>
				</div>
			</div>
		</div>
	</section>
<?php
get_footer();

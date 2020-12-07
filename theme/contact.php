<?php 
/* 
 * Template Name: Kontakt
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ProtonMultimedia
 */

	get_header();

	$sections_path = 'template-parts/section';

	$id = get_queried_object_id();

	$post = get_post($id); 
?>
		
	<div class="relative overflow-hidden">
  	<div class="container">

			<side-heading
				class="z-40 text-white"
				data-text="Kontakt"
			></side-heading>

			<div class="guides left-minus-px right-auto bg-dark-blue" role="presentation"></div>
 
			<div class="max-w-900px mx-auto relative flex flex-col justify-center pt-40 pb-16 z-30">

				<div class="relative">
					<h2 class="text-center uppercase">
						<?php
							$lines = explode(PHP_EOL, get_the_title($id));
							foreach ( $lines as $line) {
									echo preg_replace("/\*(.+)\*/", '<span class="block text-primary">$1</span>', $line);
							}
						?>
					</h2>

					<p class="text-base tablet-wide:text-md tablet-wide:mb-5 text-center">
						<?php the_content(); ?>
					</p>
				</div>
			</div>
			
			<img 
				class="hidden tablet-wide:block absolute top-0 bottom-auto right-0 transform -rotate-61 pointer-events-none z-30 -mt-12" 
				src="<?php echo get_template_directory_uri() . '/assets/svg/header-lines.svg' ?>" 
				width="400px"
				height="400px"
				alt="Decorations"
				role="presentation"
			/>

			<div class="guides right-minus-px left-auto bg-dark-blue" role="presentation"></div>
			
			<main id="main" class="site-main">
				<div class="desktop-wide:pl-smaller-container relative mb-32">
					<?php echo do_shortcode('[acfe_form name="' . get_field('contact_form', $id) . '"]'); ?>
				</div>
			</main>

		</div>
	</div>
<?php
get_footer();

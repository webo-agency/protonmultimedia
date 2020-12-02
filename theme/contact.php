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

			<div class="image-overlay absolute top-0 bottom-0 left-0 w-full h-full -mb-1 z-20 pointer-events-none"></div>
			
			<div class="max-w-900px mx-auto relative flex flex-col justify-center pt-40 pb-16 z-30">
				
				<span class="text-primary text-sm tablet:text-base leading-line-height-normal block mb-1 tablet:mb-2"><?php echo $args['post_date_string']; ?></span>

				<h2 class="mb-0 desktop:mb-4 full-hd:mb-6 desktop:text-white desktop:group-hover:text-black">
					<?php echo $args['title_string']; ?>
				</h2>

				<div class="w-full leading-relaxed">
					<div class="text-base tablet-wide:text-md tablet-wide:mb-5 text-center">
						<?php
							apply_filters('the_content', $post->post_content)
						?>
					</div>
				</div>

				<div class="desktop-wide:pl-smaller-container relative">
					<h2 class="text-center">
						<?php
							$lines = explode(PHP_EOL, get_the_title($id));
							foreach ( $lines as $line) {
									echo preg_replace("/\*(.+)\*/", '<span class="text-primary">$1</span>', $line);
							}
						?>
					</h2>

				</div>
			</div>
			
			<img 
					class="hidden tablet-wide:block absolute top-0 bottom-1/2 right-0 h-full transform pointer-events-none z-20" 
					src="<?php echo get_template_directory_uri() . '/assets/svg/header-lines.svg' ?>" 
					width="250px"
					height="250px"
					alt="Decorations"
					role="presentation"
			/>

			<div class="guides right-minus-px left-auto bg-dark-blue" role="presentation"></div>
			

		</div>
	</div>

	<main id="main" class="site-main container">
		<div class="desktop-wide:pl-smaller-container relative">
			<div class="desktop-wide:px-smaller-container">
				<?php echo do_shortcode('[acfe_form name="' . get_field('contact_form', $id) . '"]'); ?>
			</div>
		</div>
	</main>

<?php
get_footer();

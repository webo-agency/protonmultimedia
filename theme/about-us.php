<?php 
/* 
 * Template Name: O nas
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
				data-text="O nas"
			></side-heading>

			<div class="guides left-minus-px right-auto bg-dark-blue" role="presentation"></div>

			<div class="flex-initial flex flex-row items-center">
				<div class="hidden desktop-wide:block absolute ml-container top-auto bottom-0 left-1px mb-32 z-20 w-24">
					<?php echo file_get_contents(get_template_directory_uri() . '/assets/svg/dots-block.svg'); ?>
				</div>
			</div>

			<div class="max-w-900px mx-auto relative flex flex-col justify-center pt-56 pb-16 z-30">

				<div class="relative flex flex-col items-center">
					<h2 class="text-center uppercase">
						<?php
							$lines = explode(PHP_EOL, "Proton *Multimedia*");
							foreach ( $lines as $line) {
									echo preg_replace("/\*(.+)\*/", '<span class="block text-primary">$1</span>', $line);
							}
						?>
					</h2>

					<div class="text-base tablet-wide:text-md tablet-wide:mb-5 text-center">
						<?php the_content(); ?>
					</div>
				</div>
			</div>

			<?php
				if( $image = get_post_thumbnail_id($id)) {
					echo wp_get_attachment_image( $image, array('9999', '550'), "", array('class' => 'absolute left-0 top-0 w-full h-full object-cover z-10') );
				}
    	?>
			
			<img 
				class="hidden tablet-wide:block absolute top-0 bottom-0 right-0 pointer-events-none z-30 w-64 my-auto" 
				src="<?php echo get_template_directory_uri() . '/assets/svg/header-lines.svg' ?>" 
				width="400px"
				height="400px"
				alt="Decorations"
				role="presentation"
			/>

			<div class="guides right-minus-px left-auto bg-dark-blue" role="presentation"></div>
		</div>
	</div>
			
	<main id="main">
		<?php get_template_part( 'template-parts/layout', 'content'); ?>
	</main>

  <?php get_template_part( $sections_path, 'call-to-action' ); ?>

<?php
get_footer();

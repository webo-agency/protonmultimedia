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
		</div>
	</div>
			
	<main id="main">
		<?php if( have_rows('section') ): ?>
			<?php while( have_rows('section') ): the_row(); ?>
					<?php if( get_row_layout() == 'featured_right' ): ?>
						
						<?php get_template_part( $sections_path, 'featured-right',
							array(
								'title_string' => get_sub_field('title'),
								'description_string' => get_sub_field('description'),
								'highlighted_array' => get_sub_field('highlighted'),
								'side_description_string' => empty(get_sub_field('side_description')) ? get_sub_field('title') : get_sub_field('side_description')['title'],
							)
						); ?>
							
					<?php elseif( get_row_layout() == 'featured_center' ):  ?>
							
							<?php get_template_part( $sections_path, 'featured-center',
								array(
									'title_string' => get_sub_field('title'),
									'description_string' => get_sub_field('description'),
									'highlighted_icon_center_id' => get_sub_field('highlighted_icon_center'),
									'background_id' => get_sub_field('background'),
									'highlighted_array' => get_sub_field('highlighted'),
									'side_description_string' => empty(get_sub_field('side_description')) ? get_sub_field('title') : get_sub_field('side_description')['title'],
								)
							); ?>

					<?php endif; ?>
			<?php endwhile; ?>
		<?php endif; ?>
	</main>

  <?php get_template_part( $sections_path, 'call-to-action' ); ?>

<?php
get_footer();

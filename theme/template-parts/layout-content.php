<?php
	$sections_path = 'template-parts/section';

	$id = get_queried_object_id();

	$post = get_post($id); 
?>

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

			<?php endif; ?>
					
			<?php if( get_row_layout() == 'featured_center' ):  ?>
					
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
					
			<?php if( get_row_layout() == 'featured_center' ):  ?>
					
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

			<?php if( get_row_layout() == 'text_left' ):  ?>
					
					<?php get_template_part( $sections_path, 'text-left',
						array(
							'title_string' => 'Zorientowane *na klienta*',
							'description_string' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore aliqua Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore aliqua Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore aliqua',
							'cover_image' => wp_get_attachment_image( get_post_thumbnail_id($id), array('9999', '550'), "", array('class' => 'absolute left-0 top-0 w-full h-full object-cover z-10') )
						)
					); ?>
			<?php endif; ?>
			
			<?php if( get_row_layout() == 'gallery' ):  ?>
					
					<?php get_template_part( $sections_path, 'gallery',
						array(
							
						)
					); ?>

			<?php endif; ?>

			<?php if( get_row_layout() == 'reviews' ):  ?>		
					
					<?php get_template_part( $sections_path, 'featured-center',
						array(
							
						)
					); ?>

			<?php endif; ?>

	<?php endwhile; ?>
<?php endif; ?>
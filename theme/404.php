<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package ProtonMultimedia
 */

	get_header();

	$sections_path = 'template-parts/section';

	$id = get_queried_object_id();

	$post = get_post($id); 
?>

	<?php get_template_part( $sections_path, 'header', 
			array( 
				'title_string' => esc_html( 'Oops! That page can&rsquo;t be found.', 'protonmultimedia-theme' ), 
				'description_string' => false,
        'background_id' => false,
        'align_center_boolean' => true
			)
		);
	?>

	<div class="desktop-wide:px-smaller-container">
		<main id="main" class="site-main">

			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><?php esc_html( 'Oops! That page can&rsquo;t be found.', 'proton-theme' ); ?></h1>
				</header>

				<div class="page-content">
					<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'protonmultimedia-theme' ); ?></p>

					<?php
						get_search_form();
					?>

				</div>
			</section>

		</main>
	</div>

<?php
get_footer();

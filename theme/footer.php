<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ProtonMultimedia
 */

?>

	</div>

	<footer class="site-footer pm-footer pm-fade">
		<div class="pm-container pm-container--indented pm-footer__content">
			<div class="pm-footer__info">
				<div class="pm-footer__info-inner">
				<?php
					wp_nav_menu(
						array(
							'theme_location' => 'menu-3',
							'menu_id'        => 'footer-menu-main',
						)
					);
					
					$footer_title = get_field('footer_title', 'option');
					$footer_content = get_field('footer_content', 'option');
					$footer_phone_number = get_field('footer_phone_number', 'option');
					$footer_email_address = get_field('footer_email_address', 'option');
					$footer_copyright = get_field('footer_copyright', 'option');
				?>	
				<div class="pm-util-flex-column">
					<h3><?php echo $footer_title; ?></h3>
					<?php echo $footer_content; ?>
					<a class="pm-footer__contact-item" href="<?php echo $footer_phone_number['url']; ?>">
						<?php echo $footer_phone_number['title']; ?>
					</a>
					<a class="pm-footer__contact-item" href="<?php echo $footer_email_address['url']; ?>">
						<?php echo $footer_email_address['title']; ?>
					</a>
				</div>
				</div>
			</div>
			<div class="pm-util-flex-column pm-w-100">
				<?php
					$locations = get_nav_menu_locations();
					$menuFooterHome = wp_get_nav_menu_object($locations['menu-4']);
					$menuFooterBusiness = wp_get_nav_menu_object($locations['menu-5']);
				?> 
				<h4 class="pm-util-text-bold pm-mb-30">Usługi</h4>
				<div class="pm-footer__menus">
					<div class="pm-footer__sub-menu pm-footer__sub-menu--home-menu" data-rolldown data-rolldown-mobile-only="true" rolldown-expanded>
						<h5 class="pm-util-text-bold pm-mb-20" data-rolldown-trigger><?php echo $menuFooterHome->name; ?> <i class="fas fa-angle-down"></i></h5>
						<div data-rolldown-target>
							<?php
								wp_nav_menu(
									array(
										'theme_location' => 'menu-4',
										'menu_id'        => 'footer-home-services',
									)
								);
							?>
						</div>
					</div>

					<div class="pm-footer__sub-menu pm-footer__sub-menu--business-menu" data-rolldown data-rolldown-mobile-only="true" rolldown-expanded>
						<h5 class="pm-util-text-bold pm-mb-20" data-rolldown-trigger="mobile"><?php echo $menuFooterBusiness->name; ?> <i class="fas fa-angle-down"></i></h5>
						<div data-rolldown-target>
							<?php
								wp_nav_menu(
									array(
										'theme_location' => 'menu-5',
										'menu_id'        => 'footer-business-services',
									)
								);
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="pm-copyright">
			<div class="pm-container pm-container--indented">
				<div class="pm-copyright__inner">
					<div>
						<?php echo $footer_copyright; ?>
					</div>
					<div>
						<a id="webo" href="https://www.webo.pl" rel="noopener noreferrer nofollow" target="_blank">Realizacja - Webo
							<svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 0 17363 17363" fill-rule="evenodd" clip-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="2">
								<path d="M11837.1 15782.8l-.029.029v1575.28l-7496.83 3.004c-2395.47 0-4340.29-1944.81-4340.29-4340.29v-8680.54c0-2395.45 1944.78-4340.25 4340.29-4340.29h8680.54c2395.5.033 4340.29 1944.83 4340.29 4340.29v7493.83h-1578.28l-.001-6704.71c.001-1959.88-1591.13-3551.06-3551.14-3551.15H5129.4c-1960.02.083-3551.15 1591.27-3551.15 3551.15v7102.25c0 1959.91 1591.2 3551.13 3551.15 3551.15h6707.71z" fill="#fff"></path>
								<path d="M15782.8 17361.1h-2367.43v-3945.71l3945.71-.001v2367.43c0 871.058-707.171 1578.25-1578.28 1578.28z" fill="#fff"></path>
							</svg>
						</a>
					</div>
				</div>
			</div>
		</div>
	</footer>
</div>

<?php wp_footer(); ?>
</body>
</html>

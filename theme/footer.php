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
			<div class="pm-util-flex-column">
				<?php
					$locations = get_nav_menu_locations();
					$menuFooterHome = wp_get_nav_menu_object($locations['menu-4']);
					$menuFooterBusiness = wp_get_nav_menu_object($locations['menu-5']);
				?> 
				<h4 class="pm-util-text-semi-bold pm-mb-30">Usługi</h4>
				<div class="pm-footer__menus">
					<div class="pm-footer__sub-menu pm-footer__sub-menu--home-menu">
						<h5 class="pm-util-text-semi-bold pm-mb-20"><?php echo $menuFooterHome->name; ?></h5>
						<?php
						wp_nav_menu(
							array(
								'theme_location' => 'menu-4',
								'menu_id'        => 'footer-home-services',
							)
						);
					?>
					</div>

					<div class="pm-footer__sub-menu pm-footer__sub-menu--ervices-menu">
						<h5 class="pm-util-text-semi-bold pm-mb-20"><?php echo $menuFooterBusiness->name; ?></h5>
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
	</footer>
</div>

<?php wp_footer(); ?>
</body>
</html>

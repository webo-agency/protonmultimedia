<div class="<?php echo is_front_page() ? 'absolute' : 'fixed'; ?> pm-header top-0 left-0 right-0 bg-transparent z-50 <?php echo is_admin_bar_showing() ? 'mt-10' : 'mt-2'; ?>" data-header>
		<header id="masthead" class="container site-header">
			<div class="desktop-wide:px-smaller-container">
				<div class="site-branding site-branding--mobile">
					<?php the_custom_logo(); ?>
				</div><!-- .site-branding -->
				<button class="menu-toggle pm-menu-toggler" aria-controls="primary-menu" aria-expanded="false">
					<span class="pm-util-sr-only">Menu</span>
					<div class="pm-menu-toggler__line"></div>
					<div class="pm-menu-toggler__line"></div>
					<div class="pm-menu-toggler__line"></div>
				</button>
				<nav id="site-navigation" class="main-navigation">
					<div class="site-branding">
						<?php the_custom_logo(); ?>
					</div><!-- .site-branding -->
					<?php
						wp_nav_menu(
							array(
								'theme_location' => 'menu-2',
								'menu_id'        => 'primary-menu',
								'add_li_class' => 'font-special'
							)
						);
					?>
					<a class="pm-button pm-button--primary pm-button--small" href="#kontakt">Skontaktuj się</a>
				</nav><!-- #site-navigation -->
			</div>
		</header><!-- #masthead -->
</div>
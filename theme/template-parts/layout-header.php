<div class="fixed top-0 left-0 right-0 bg-transparent z-30 <?php echo is_admin_bar_showing() ? 'mt-10' : 'mt-0'; ?>" data-header>
		<header id="masthead" class="container site-header py-4">
			<div class="desktop-wide:px-smaller-container flex justify-between items-center">
				<div class="site-branding z-30 w-32">
					<?php the_custom_logo(); ?>
				</div>
				<button class="menu-toggle desktop:hidden z-40" data-menu aria-controls="primary-menu" aria-expanded="false">
					<div class="w-8 h-1 bg-white rounded-lg mb-1"></div>
					<div class="w-8 h-1 bg-white rounded-lg mb-1"></div>
					<div class="w-8 h-1 bg-white rounded-lg"></div>
				</button>
				<nav id="site-navigation" class="main-navigation fixed left-0 top-0 w-full h-full hidden flex-col desktop:flex-row desktop:flex items-center flex-auto z-20 desktop:relative desktop:w-auto desktop:h-auto bg-dark-blue desktop:bg-transparent">
					<?php
						wp_nav_menu(
							array(
								'menu_class' => 'flex flex-col desktop:flex-row desktop:items-center h-full pt-24 desktop:pt-0 desktop:p-0 w-full desktop:justify-end container desktop:justify-center',
								'container' => false,
								'theme_location' => 'menu-2',
								'menu_id'        => 'primary-menu',
								'add_li_class' => 'tablet:inline-block font-special mb-4 desktop:mb-0 hover:text-primary uppercase font-semibold text-base desktop:mr-6'
							)
						);
					?>
					<a class="hidden desktop:flex flex-initial whitespace-no-wrap pm-button pm-button--primary pm-button--small mb-12 desktop:mb-0" href="#kontakt">Skontaktuj się</a>
				</nav>
			</div>
		</header>
</div>
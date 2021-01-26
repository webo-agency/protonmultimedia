<on-scroll
	class="on-scroll fixed top-0 left-0 right-0 z-30 on-scroll"
	data-scroll-class="bg-dark-blue-2"
>
	<header id="masthead" class="container site-header py-4">
		<div class="desktop-wide:px-smaller-container flex justify-between items-center">
			<div class="site-branding z-30 w-32">
				<?php the_custom_logo(); ?>
			</div>
			<button class="menu-toggle block desktop:hidden px-1 py-2 z-40" data-menu aria-controls="primary-menu" aria-expanded="false">
				<div class="menu-toggle__first w-8 h-1 bg-white rounded-lg mb-1"></div>
				<div class="menu-toggle__middle w-8 h-1 bg-white rounded-lg mb-1"></div>
				<div class="menu-toggle__last w-8 h-1 bg-white rounded-lg"></div>
			</button>
			<main-navigation>
				<nav id="site-navigation" class="main-navigation overflow-scroll overscroll-contain desktop:overscroll-auto fixed left-0 top-0 w-full h-screen transition-all duration-500 invisible opacity-0 desktop:opacity-100 desktop:visible flex flex-col desktop:flex-row desktop:flex items-center flex-auto z-20 desktop:relative desktop:w-auto desktop:h-auto bg-dark-blue desktop:bg-transparent">
					<?php
						wp_nav_menu(
							array(
								'menu_class' => 'flex flex-col desktop:flex-row desktop:items-center h-full pt-24 desktop:pt-0 desktop:p-0 w-full desktop:justify-end container desktop:justify-center',
								'container' => false,
								'theme_location' => 'menu-2',
								'menu_id'        => 'primary-menu',
								'add_li_class' => 'transition-all duration-300 tablet:inline-block font-special mb-4 desktop:mb-0 uppercase font-semibold text-base desktop:mr-6',
								'link_class'   => 'hover:text-primary transition-colors duration-300'
							)
						);
					?>
				
					<?php
            $button_cta = get_field('button_link', 'option');
          ?>
					<a 
						class="hidden desktop:flex flex-initial whitespace-no-wrap pm-button pm-button--primary pm-button--small mb-12 desktop:mb-0" 
						href="<?php echo $button_cta['url'] ?>"
            target="<?php echo $button_cta['target'] ?>"
					>
						<?php echo $button_cta['title'] ?>
					</a>
				</nav>
			</main-navigation>
		</div>
	</header>
</on-scroll>

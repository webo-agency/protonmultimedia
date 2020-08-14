<section>
    <header class="container mt-24">
        <h2 class="uppercase mb-10 text-lg font-weight-bold">
            Nasze wybrane<br/>
            <span class="text-primary">realizacje</span>
        </h2>
        <p class="mb-12">
            Lorem ipsum dolor sit amet, consectetur adipiscing <br/>
            elit, sed do eiusmod tempor incididunt ut labore et <br/>
            dolore magna aliqua.
        </p>
    </header>

    <img 
        class="hidden desktop:block absolute bottom-0 left-1/2 z-50 pointer-events-none mt-5" 
        width="170px"
        height="116px"
        src="<?php echo get_template_directory_uri() . '/assets/svg/dots-footer.svg' ?>" 
        alt="Decorations"
    />  

    <?php
        $loop = new WP_Query( array(
            'post_type' => 'realizations',
            'posts_per_page' => -1
        ));
    ?>
    <?php if( $loop->have_posts() ): ?>
        <realization-slider class="swiper-container relative overflow-hidden mx-17">
            <ul class="swiper-wrapper">
                <?php while ( $loop->have_posts() ) : $loop->the_post(); $_post = get_post(); ?>
                    <li class="swiper-slide overflow-hidden">
                        <a
                            href="<?php echo get_permalink($_post); ?>"
                            class="box-overlay text-white hover:text-white"
                        >
                            <?php echo get_the_post_thumbnail( 
                                    $_post->ID, 
                                    'slider-block',
                                    array( 'class' => 'w-full h-auto' )
                                ); 
                            ?>
                            <h2 class="absolute left-0 right-0 bottom-0 font-bold uppercase text-4xl md:text-8xl p-8 first-line-decorated leading-tight">
                                <?php echo get_the_title( $_post ); ?>
                            </h2>
                        </a>
                    </li>
                <?php endwhile; ?>
            </ul>
            <div class="flex text-center">
                <div class="swiper-pagination align-left" data-swiper-pagination></div>
            </div>
        </realization-slider>
    <?php endif; ?>
</section>

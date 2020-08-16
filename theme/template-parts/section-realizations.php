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
        <realization-slider>
            <ul class="swiper-wrapper">
                <?php while ( $loop->have_posts() ) : $loop->the_post(); $_post = get_post(); ?>
                    <li class="w-1/4 swiper-slide group overflow-hidden box-gradient-overlay">
                        <a
                            href="<?php echo get_permalink($_post); ?>"
                            class="text-white hover:text-white"
                        >
                            <?php echo get_the_post_thumbnail( 
                                    $_post->ID, 
                                    'slider-block',
                                    array( 'class' => 'w-full h-auto' )
                                ); 
                            ?>
                        </a>
                        <div class="absolute left-0 right-0 bottom-0 p-8 overflow-hidden z-20">
                            <h2 class="font-bold uppercase text-4xl first-line-decorated leading-tight">
                                <a
                                    href="<?php echo get_permalink($_post); ?>"
                                    class="text-white hover:text-white"
                                >
                                    <?php echo get_the_title( $_post ); ?> 
                                </a>
                            </h2>
                            <div class="invisible h-0 opacity-0 group-hover:visible group-hover:h-auto group-hover:opacity-100">
                                <?php echo the_content(); ?> 

                                <?php if(is_array(get_field('services', $_post))): ?>
                                    <?php foreach(get_field('services', $_post) as $service): ?>
                                        <ul class="mt-4">
                                            <li>
                                                <a href="<?php echo get_permalink($service); ?>" class="mb-4 mr-4 rounded-md px-2 text-sm bg-white text-black inline-block">
                                                    <?php echo get_the_title( $service ); ?>
                                                </a>
                                            </li>
                                            <?php foreach ( (get_the_category($service)) as $category ): ?>
                                                <?php echo $category->term_id; if($category->term_id !== 1): ?>
                                                    <li class="bg-primary">
                                                        <a href="<?php echo get_category_link($category); ?>" class="mb-4 mr-4 rounded-md px-2 text-sm bg-white text-black inline-block">
                                                            <?php echo get_cat_name($category); ?>
                                                        </a>
                                                    </li>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </ul>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </li>
                <?php endwhile; ?>
            </ul>
            <div class="flex items-center justify-between">
                <div class="flex-initial px-4 py-8" data-realization-button-prev>
                    <img 
                        class="block" 
                        width="20px"
                        height="20px"
                        src="<?php echo get_template_directory_uri() . '/assets/svg/arrow.svg' ?>" 
                        alt="Left arrow"
                    />  
                </div>
                <div class="flex-1 px-4 py-8 relative h-10 flex items-center justify-center"><div class="swiper-pagination" data-realization-pagination></div></div>
                <div class="flex-initial px-4 py-8" data-realization-button-next>
                    <img 
                        class="block transform scale-x-flip scale-y-1" 
                        width="20px"
                        height="20px"
                        src="<?php echo get_template_directory_uri() . '/assets/svg/arrow.svg' ?>" 
                        alt="Right arrow"
                    />  
                </div>
            </div>
        </realization-slider>
    <?php endif; wp_reset_postdata(); ?>
</section>

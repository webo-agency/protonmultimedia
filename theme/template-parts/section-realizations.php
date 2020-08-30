<section class="relative">
    <?php if(get_field('side_headings', 'option')[2]['side_heading']): ?>
      <side-heading
        data-text="<?php echo get_field('side_headings', 'option')[2]['side_heading']; ?>"
      ></side-heading>
    <?php endif; ?>

    <header class="container desktop-wide:pl-smaller-container mt-24 relative">
        <h2 class="uppercase mb-10 text-lg font-weight-bold text-white">
            Nasze wybrane<br/>
            <span class="text-primary">realizacje</span>
        </h2>

        <p class="pb-12 text-white">
            Lorem ipsum dolor sit amet, consectetur adipiscing <br/>
            elit, sed do eiusmod tempor incididunt ut labore et <br/>
            dolore magna aliqua.
        </p>

        <img 
            class="hidden tablet:block absolute bottom-0 left-1/2 z-50 pointer-events-none mt-5 ml-40" 
            width="170px"
            height="116px"
            src="<?php echo get_template_directory_uri() . '/assets/svg/dots-footer.svg' ?>" 
            alt="Decorations"
        />  
    </header>

    <?php
        $loop = new WP_Query( array(
            'post_type' => 'realizations',
            'posts_per_page' => -1
        ));
    ?>
    <div class="container">
        <?php if( $loop->have_posts() ): ?>
            <realization-slider>
                <ul class="swiper-wrapper">
                    <?php while ( $loop->have_posts() ) : $loop->the_post(); $_post = get_post(); ?>
                        <li class="w-full tablet:w-1/2 desktop:w-1/4 swiper-slide group overflow-hidden flex flex-col justify-end box-gradient-overlay min-h-700px">
                            <?php echo get_the_post_thumbnail( 
                                    $_post->ID, 
                                    'slider-block',
                                    array( 'class' => 'absolute right-0 bottom-0 z-10 w-auto min-w-full h-full object-cover max-w-none left-1/2 transform -translate-x-1/2' )
                                ); 
                            ?>
                            <div class="relative p-8 overflow-hidden z-30">
                                <h2 class="font-bold uppercase text-4xl first-line-decorated leading-tight mb-6 text-white">
                                    <?php echo get_the_title( $_post ); ?> 
                                </h2>
                                <div class="invisible h-auto max-h-0 opacity-0 transition-all duration-300 group-hover:visible group-hover:max-h-full group-hover:opacity-100">
                                    
                                    <div class="text-base leading-tight text-white">
                                        <?php echo the_content(); ?>
                                    </div>

                                    <?php if(is_array(get_field('services', $_post))): ?>
                                        <?php foreach(get_field('services', $_post) as $service): ?>
                                            <ul class="mt-4">
                                                <li>
                                                    <a href="<?php echo get_permalink($service); ?>" class="mb-4 mr-4 rounded-md px-2 text-sm bg-white text-black inline-block hover:text-black">
                                                        <?php echo get_the_title( $service ); ?>
                                                    </a>
                                                </li>
                                                <?php foreach ( (get_the_category($service)) as $category ): ?>
                                                    <?php echo $category->term_id; if($category->term_id !== 1): ?>
                                                        <li class="bg-primary">
                                                            <a href="<?php echo get_category_link($category); ?>" class="mb-4 mr-4 rounded-md px-2 text-sm bg-white text-black inline-block hover:text-black">
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
    </div>
</section>

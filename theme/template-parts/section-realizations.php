<section class="container relative">
    <?php if(get_field('realization_side_title', 'option')): ?>
      <side-heading
        data-text="<?php echo get_field('realization_side_title', 'option'); ?>"
      ></side-heading>
    <?php endif; ?>

    <div class="guides left-1px right-auto bg-dark-purple"></div>

    <header class="desktop-wide:px-smaller-container pt-24 relative">
        <h2 class="h3 uppercase mb-20 text-white">
            <?php 
                $lines = explode(PHP_EOL, get_field('realization_title', 'option'));
                foreach ( $lines as $line) {
                    echo preg_replace("/\*(.+)\*/", '<span class="text-primary">$1</span>', $line);
                }
            ?>
        </h2>

        <p class="pb-12 text-white">
            <?php echo get_field('realization_description', 'option'); ?>
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
    <div class="">
        <?php if( $loop->have_posts() ): ?>
            <realization-slider class="z-30">
                <ul class="swiper-wrapper">
                    <?php while ( $loop->have_posts() ) : $loop->the_post(); $_post = get_post(); ?>
                        <li class="w-full tablet:w-1/2 desktop:w-1/4 swiper-slide group overflow-hidden flex flex-col justify-end box-gradient-overlay min-h-700px">
                            <?php echo get_the_post_thumbnail( 
                                    $_post->ID, 
                                    'slider-block',
                                    array( 'class' => 'absolute right-0 bottom-0 z-10 w-auto min-w-full h-full object-cover max-w-none left-1/2 transform -translate-x-1/2' )
                                ); 
                            ?>
                            <div class="relative flex-auto flex flex-col flex-end p-8 overflow-hidden z-30 justify-end group-hover:justify-start">
                                <h3 class="relative mb-6 text-white mt-24">
                                    <?php 
                                        if(get_field('title_box')){
                                            $lines = explode(PHP_EOL, get_field('title_box'));
                                        } else {
                                            $lines = explode(PHP_EOL, get_the_title( $_post ));
                                        }
                                        
                                        foreach ( $lines as $line) {
                                            echo preg_replace("/\*(.+)\*/", '<span class="line-decorated bg-dark-blue-2">$1</span>', $line);
                                        }
                                    ?>
                                </h3>
                                <div class="invisible flex-auto h-auto max-h-0 opacity-0 transition-all duration-300 group-hover:visible group-hover:max-h-full group-hover:opacity-100 flex flex-col">
                                    
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

    <div class="guides right-1px left-auto bg-dark-purple"></div>
</section>

<section class="relative bg-gray-lighter">
    <div class="container">
        <?php if(get_field('realization_side_title', 'option')): ?>
        <side-heading
            class="text-dark-font"
            data-text="<?php echo get_field('realization_side_title', 'option'); ?>"
        ></side-heading>
        <?php endif; ?>

        <div class="guides left-minus-px right-auto bg-gray-dark" role="presentation"></div>

        <header class="desktop-wide:px-smaller-container pt-24 relative">
            <h2 class="h3 uppercase mb-20 text-dark-font">
                <?php 
                    $lines = explode(PHP_EOL, get_field('realization_title', 'option'));
                    foreach ( $lines as $line) {
                        echo preg_replace("/\*(.+)\*/", '<span class="text-primary">$1</span>', $line);
                    }
                ?>
            </h2>

            <p class="pb-12 text-dark-font">
                <?php echo get_field('realization_description', 'option'); ?>
            </p>

            <img
                class="hidden tablet:block absolute bottom-0 left-1/2 z-50 pointer-events-none mt-5 ml-40" 
                width="170px"
                height="116px"
                src="<?php echo get_template_directory_uri() . '/assets/svg/dots-footer.svg' ?>" 
                alt="Decorations"
                role="presentation"
            />  
        </header>

        <div class="hidden desktop-wide:flex absolute top-0 right-0 left-auto z-20 w-40 flex-row overflow-hidden max-h-140px items-end">
            <?php echo file_get_contents(get_template_directory_uri() . '/assets/svg/dots-pattern.svg'); ?>
            <?php echo file_get_contents(get_template_directory_uri() . '/assets/svg/dots-pattern.svg'); ?>
        </div>

        <?php
            $loop = new WP_Query( array(
                'post_type' => 'realizations',
                'posts_per_page' => -1
            ));
        ?>
        <div class="pb-32">
            <?php if( $loop->have_posts() ): ?>
                <realization-alternative-slider class="z-30">
                    <ul class="swiper-wrapper">
                        <?php while ( $loop->have_posts() ) : $loop->the_post(); $_post = get_post(); ?>
                            <li class="w-full h-auto swiper-slide flex flex-row flex-wrap">
                                <div class="w-full tablet:w-1/2 overflow-hidden relative min-h-200px">
                                    <?php echo get_the_post_thumbnail( 
                                            $_post->ID, 
                                            'slider-block-alternative',
                                            array( 'class' => 'max-h-600px min-w-full object-cover' )
                                        ); 
                                    ?>
                                </div>
                                <div class="w-full tablet:w-1/2 relative flex-auto flex flex-col flex-end p-4 desktop:pl-24 desktop:pr-32 desktop:pt-12 overflow-hidden z-30 justify-start">
                                    <h3 class="relative mb-6 text-dark-font flex flex-col items-start desktop:mb-20">
                                        <?php 
                                            if(get_field('title_box')){
                                                $lines = explode(PHP_EOL, get_field('title_box'));
                                            } else {
                                                $lines = explode(PHP_EOL, get_the_title( $_post ));
                                            }
                                            
                                            foreach ( $lines as $line) {
                                                echo preg_replace("/\*(.+)\*/", '<span class="line-decorated bg-primary text-white">$1</span>', $line);
                                            }
                                        ?>
                                    </h3>
                                        
                                    <div class="text-base leading-tight text-dark-font">
                                        <?php echo the_content(); ?>
                                    </div>
                                
                                    <div class="flex items-center justify-between mb-0 mt-auto ml-0 mr-auto">
                                        <div class="flex-initial px-4 py-8" data-realization-alternative-button-prev>
                                            <img 
                                                class="block" 
                                                width="20px"
                                                height="20px"
                                                src="<?php echo get_template_directory_uri() . '/assets/svg/arrow.svg' ?>" 
                                                alt="Left arrow"
                                            />  
                                        </div>
                                        <div class="flex-1 px-4 py-8 relative h-10 flex items-center justify-center"><div class="swiper-pagination relative" data-realization-alternative-pagination></div></div>
                                        <div class="flex-initial px-4 py-8" data-realization-alternative-button-next>
                                            <img 
                                                class="block transform scale-x-flip scale-y-1" 
                                                width="20px"
                                                height="20px"
                                                src="<?php echo get_template_directory_uri() . '/assets/svg/arrow.svg' ?>" 
                                                alt="Right arrow"
                                            />  
                                        </div>
                                    </div>
                                    
                                </div>
                            </li>
                        <?php endwhile; ?>
                    </ul>
                </realization-slider>
            <?php endif; wp_reset_postdata(); ?>
        </div>

        <div class="guides right-minus-px left-auto bg-gray-dark" role="presentation"></div>
    </div>
</section>

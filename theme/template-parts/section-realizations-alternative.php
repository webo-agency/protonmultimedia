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
        </header>

        <div class="hidden desktop-wide:flex absolute top-0 right-0 left-auto z-20 flex-row overflow-hidden items-end mt-72" style="right: 78px;width: 300px;">
            <?php echo file_get_contents(get_template_directory_uri() . '/assets/svg/dots-pattern.svg'); ?>
            <?php echo file_get_contents(get_template_directory_uri() . '/assets/svg/dots-pattern.svg'); ?>
            <?php echo file_get_contents(get_template_directory_uri() . '/assets/svg/dots-pattern.svg'); ?>
            <?php echo file_get_contents(get_template_directory_uri() . '/assets/svg/dots-pattern.svg'); ?>
        </div>

        <?php
            $loop = new WP_Query( array(
                'post_type' => 'realizations',
                'posts_per_page' => -1
            ));
        ?>
        <div class="pb-16 desktop:pb-32">
            <?php if( $loop->have_posts() ): ?>
                <realization-alternative-slider class="z-30">
                    <ul class="swiper-wrapper h-auto">
                        <?php while ( $loop->have_posts() ) : $loop->the_post(); $_post = get_post(); ?>
                            <li class="w-full swiper-slide flex flex-row flex-wrap tablet:block float-left">
                                <div class="w-full desktop:w-1/2 object-bottom object-cover desktop:float-left desktop:pr-24 desktop:pb-24">
                                    <div class="overflow-hidden relative max-h-430px desktop:min-h-700px desktop:max-h-700px">
                                        <div class="relative desktop:absolute left-0 top-0 w-full h-full">
                                            <?php 
                                            $images = get_field('gallery_box');
                                            if( $images ): ?>
                                                <realization-alternative-gallery>
                                                    <ul class="swiper-wrapper">
                                                        <?php foreach( $images as $image_id ): ?>
                                                            <li class="w-full h-auto swiper-slide">
                                                                <?php echo wp_get_attachment_image( 
                                                                    $image_id, 
                                                                    array('9999', '700'), 
                                                                    "", 
                                                                    array(
                                                                        'class' => 'w-auto h-auto min-w-full desktop:min-h-full desktop:min-h-700px desktop:max-w-none'
                                                                    ) 
                                                                ); ?>
                                                            </li>
                                                        <?php endforeach; ?>
                                                    </ul>
                                                </realization-alternative-gallery>
                                            <?php else: ?>
                                                <?php
                                                    echo get_the_post_thumbnail( 
                                                        $_post->ID, 
                                                        array('9999', '700'),
                                                        array(
                                                            'class' => 'w-auto h-auto min-w-full desktop:min-h-full desktop:min-h-700px desktop:max-w-none'
                                                        )
                                                    ); 
                                                ?>
                                            <?php endif; ?>                                            
                                        </div>

                                        <div class="flex items-center justify-between mb-0 mt-auto mx-auto desktop:ml-0 desktop:mr-auto absolute bottom-0 right-0 z-10">
                                            <div class="flex-initial px-4 py-4 bg-dark-blue-2" data-realization-alternative-button-prev>
                                                <div class="block h-6 w-6 svg-arrow">
                                                    <?php echo file_get_contents(get_template_directory_uri() . '/assets/svg/arrow.svg'); ?>
                                                </div>
                                            </div>
                                            <div class="flex-initial px-4 py-4 bg-dark-blue-2" data-realization-alternative-button-next>
                                                <div class="block h-6 w-6 transform scale-x-flip scale-y-1 svg-arrow">
                                                    <?php echo file_get_contents(get_template_directory_uri() . '/assets/svg/arrow.svg'); ?>
                                                </div>            
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-full desktop:w-1/2 relative flex-auto flex flex-col flex-end p-4 desktop:pl-24 desktop:pr-32 desktop:pt-12 overflow-hidden z-30 justify-start desktop:float-left desktop:-ml-24 desktop:mr-24">
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
                                </div>

                                <div class="text-base leading-tight text-dark-font">
                                    <read-more class="relative desktop-wide:px-smaller-container" more-text="Czytaj więcej" less-text="Czytaj mniej" link-class="block pm-button pm-button--text-primary">
                                        <template v-slot:excerpt>
                                            <?php echo the_excerpt(); ?>
                                        </template>

                                        <template v-slot:content>
                                            <?php echo the_content(); ?>
                                        </template>
                                    </read-more>
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

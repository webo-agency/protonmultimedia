<baner-slider>
    <img 
        class="hidden lg:block absolute top-0 right-0 h-full z-50" 
        src="<?php echo get_template_directory_uri() . '/assets/svg/banner-lines.svg' ?>" 
        alt="Decorations"
    />
    <ul class="swiper-wrapper h-screen min-h-700px">
        <?php
            if( have_rows('front_slider') ):
                while ( have_rows('front_slider') ) : the_row();
                    ?>	
                        <li class="swiper-slide overflow-hidden">
                            <img 
                                src="<?php echo get_sub_field('front_slider_image')['url'] ?>" 
                                alt="Background"
                                class="object-cover absolute left-0 top-0 right-0 bottom-0 h-full w-full"
                            />
                            <div class="container absolute left-0 right-0 top-1/2 transform -translate-y-1/2 text-white">
                                <h2 class="font-bold uppercase text-4xl md:text-8xl mb-14">
                                    <?php the_sub_field('front_slide_heading'); ?>
                                </h2>
                                <div class="w-full sm:w1/3 md:w-1/2 leading-relaxed mb-14">
                                    <div class="lg:text-xl lg:mb-5" data-hero-content>
                                        <?php the_sub_field('front_slide_content'); ?>
                                    </div>
                                </div>
                                    <?php
                                        if( $front_slide_button = get_sub_field('front_slide_button')):
                                            $front_slide_button_url = $front_slide_button['url'];
                                            $front_slide_button_title = $front_slide_button['title'];
                                            $front_slide_button_target = $front_slide_button['target'] ? $front_slide_button['target'] : '_self';
                                    ?>
                                <a
                                    class="pm-button pm-button--primary pm-button--large"
                                    href="<?php echo esc_url( $front_slide_button_url ); ?>"
                                    target="<?php echo esc_attr( $front_slide_button_target ); ?>">
                                    <?php echo esc_html( $front_slide_button_title ); ?>
                                </a>
                                <?php
                                    endif;
                                ?>
                            </div>
                        </li>
                    <?php
                endwhile;
            else :
            endif;
        ?>
    </ul>
    <div class="pm-container">
        <div class="swiper-pagination bottom-60px align-left" data-swiper-pagination></div>
    </div>
</baner-slider>

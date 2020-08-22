<section id="baner" class="relative">
    <img 
        class="hidden tablet-wide:block absolute top-0 right-0 h-full z-50 w-auto" 
        src="<?php echo get_template_directory_uri() . '/assets/svg/banner-lines.svg' ?>" 
        width="540px"
        height="700px"
        alt="Decorations"
    />
    <baner-slider>
        <ul class="swiper-wrapper h-screen min-h-700px">
            <?php
                if( have_rows('front_slider') ):
                    while ( have_rows('front_slider') ) : the_row();
                        ?>	
                            <li class="swiper-slide overflow-hidden">
                                <div class="box-gradient-overlay box-gradient-overlay--dark-blue absolute z-20 bottom-0 left-0 w-full h-60% pointer-events-none"></div>
                                <img 
                                    src="<?php echo get_sub_field('front_slider_image')['url'] ?>" 
                                    alt="Background"
                                    class="object-cover absolute left-0 top-0 right-0 bottom-0 h-full w-full pointer-events-none"
                                />
                                <div class="container absolute left-0 right-0 top-1/2 transform -translate-y-1/2 text-white z-10">
                                    <h2 class="font-bold uppercase text-4xl tablet:text-8xl mb-14 leading-tight">
                                        <?php 
                                            $lines = explode(PHP_EOL, get_sub_field('front_slide_heading'));
                                            foreach ( $lines as $line) {
                                                echo preg_replace("/\*(.+)\*/", '<span class="line-decorated bg-primary">$1</span>', $line);
                                                echo '</br>';
                                            }
                                        ?>
                                    </h2>
                                    <div class="w-full sm:w1/3 tablet:w-1/2 leading-relaxed mb-14">
                                        <div class="font-sans text-base tablet-wide:text-md tablet-wide:mb-5" data-hero-content>
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
        <div class="container">
            <div class="swiper-pagination bottom-60px align-left" data-baner-pagination></div>
        </div>
    </baner-slider>
</section>

<section id="baner" class="relative">
    <baner-slider>
        <ul class="swiper-wrapper h-screen min-h-900px">
            <?php
                if( have_rows('front_slider') ):
                    while ( have_rows('front_slider') ) : the_row();
                        ?>	
                            <li class="swiper-slide overflow-hidden">
                                <img 
                                    src="<?php echo get_sub_field('front_slider_image')['url'] ?>" 
                                    alt="Background"
                                    class="object-cover absolute left-0 top-0 right-0 bottom-0 h-full w-full pb-40 pointer-events-none"
                                />
                                <img 
                                    class="hidden tablet-wide:block absolute top-0 right-0 h-full z-50 w-auto pointer-events-none" 
                                    src="<?php echo get_template_directory_uri() . '/assets/svg/banner-lines.svg' ?>" 
                                    width="540px"
                                    height="700px"
                                    alt="Decorations"
                                />
                                <div class="container absolute left-0 right-0 top-1/2 transform -translate-y-1/2 text-white z-10">
                                    <div class="desktop-wide:px-smaller-container">
                                        <h2 class="font-bold uppercase text-4xl tablet:text-baner mb-14 leading-tight">
                                            <?php 
                                                $lines = explode(PHP_EOL, get_sub_field('front_slide_heading'));
                                                foreach ( $lines as $line) {
                                                    echo preg_replace("/\*(.+)\*/", '<span class="line-decorated bg-primary">$1</span>', $line);
                                                }
                                            ?>
                                        </h2>
                                        <div class="w-full sm:w1/3 tablet:w-1/2 leading-relaxed mb-14">
                                            <p class="text-base tablet-wide:mb-5" data-hero-content>
                                                <?php the_sub_field('front_slide_content'); ?>
                                            </p>
                                        </div>
                                        <?php
                                            if( $front_slide_button = get_sub_field('front_slide_button')):
                                                $front_slide_button_url = $front_slide_button['url'];
                                                $front_slide_button_title = $front_slide_button['title'];
                                                $front_slide_button_target = $front_slide_button['target'] ? $front_slide_button['target'] : '_self';
                                        ?>
                                            <a
                                                class="pm-button pm-button--primary pm-button--large mb-24"
                                                href="<?php echo esc_url( $front_slide_button_url ); ?>"
                                                target="<?php echo esc_attr( $front_slide_button_target ); ?>">
                                                <?php echo esc_html( $front_slide_button_title ); ?>
                                            </a>
                                        <?php
                                            endif;
                                        ?>
                                        <div class="relative flex items-start swiper-pagination" data-baner-pagination></div>
                                    </div>
                                </div>
                            </li>
                        <?php
                    endwhile;
                else :
                endif;
            ?>
        </ul>
    </baner-slider>
</section>

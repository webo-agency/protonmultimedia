
<section class="pm-cta relative pt-10 desktop-wide:pt-20">
    <div class="pm-container relative pb-10 desktop-wide:pb-20">
        <img 
            class="hidden desktop:block absolute bottom-0 left-0 h-full z-50" 
            src="<?php echo get_template_directory_uri() . '/assets/svg/lines-right.svg' ?>" 
            alt="Decorations"
        />
        <div class="pm-container pm-container--indented">
            <div class="pm-cta__block">
                <?php
                    $cta_title = get_field('cta_title', 'option');
                    $cta_button = get_field('cta_button', 'option');
                
                ?>
                <div class="desktop:max-w-60% desktop:flex-60% full-hd:max-w-1/2 full-hd:flex-1/2 mb-10 desktop:mb-0">
                    <h3> 
                        <?php 
                            $lines = explode(PHP_EOL, $cta_title);
                            foreach ( $lines as $line) {
                                echo preg_replace("/[*]\b(.*?)\b[*]/", '<span class="text-primary">$1</span>', $line);
                                echo '</br>';
                            }
                        ?>
                    </h3>
                </div>
                <div class="desktop:max-w-60% desktop:flex-60%  full-hd:max-w-1/2 full-hd:flex-1/2">
                    <a
                        class="pm-button pm-button--primary pm-button--large"
                        href="<?php echo $cta_button['url'] ?>"
                        target="<?php echo $cta_button['target'] ?>"
                    >
                        <?php echo $cta_button['title'] ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

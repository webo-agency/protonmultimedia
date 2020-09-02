
<section class="pm-cta container relative pt-10 desktop-wide:pt-20">
    <div class="guides left-minus-px right-auto bg-dark-purple"></div>

    <div class="relative pb-10 desktop-wide:pb-20">
        <img 
            class="hidden desktop:block absolute bottom-0 left-0 h-full z-50" 
            src="<?php echo get_template_directory_uri() . '/assets/svg/lines-right.svg' ?>" 
            alt="Decorations"
        />
        <div class="container desktop:pl-72 flex flex-row flex-wrap desktop-wide:flex-no-wrap items-center">
            <?php
                $cta_title = get_field('cta_title', 'option');
                $cta_button = get_field('cta_button', 'option');
            
            ?>
            <div class="flex-initial desktop-wide:w-7/12 mb-10 desktop:mb-0 uppercase">
                <h2 class="mb-0 desktop:h2 desktop:flex desktop:flex-col text-white desktop:mb-0"> 
                    <?php 
                        $lines = explode(PHP_EOL, $cta_title);
                        foreach ( $lines as $line) {
                            echo preg_replace("/\*(.+)\*/", '<span class="text-primary">$1</span>', $line);
                        }
                    ?>
                </h2>
            </div>
            <div class="flex-initial desktop-wide:w-5/12">
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

    <div class="guides right-minus-px left-auto bg-dark-purple"></div>
</section>

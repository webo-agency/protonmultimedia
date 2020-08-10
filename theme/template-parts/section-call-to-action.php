
<section class="pm-cta relative">
    <img 
        class="hidden lg:block absolute top-0 left-0 h-full z-50" 
        src="<?php echo get_template_directory_uri() . '/assets/svg/lines-right.svg' ?>" 
        alt="Decorations"
    />
    <div class="pm-container pm-container--indented">
        <?php
            $cta_title = get_field('cta_title', 'option');
            $cta_button = get_field('cta_button', 'option');
           
        ?>
        <h3> 
            <?php 
                $lines = explode(PHP_EOL, $cta_title);
                foreach ( $lines as $line) {
                    echo '</br>';
                    echo preg_replace("/[*]\b(.*?)\b[*]/", '<span class="text-primary">$1</span>', $line);
                }
            ?>
        </h3>
        <a
            class="pm-button pm-button--primary pm-button--large"
            href="<?php echo $cta_button['url'] ?>"
            target="<?php echo $cta_button['target'] ?>"
        >
            <?php echo $cta_button['title'] ?>
        </a>
    </div>
</section>

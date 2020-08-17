

<section class="pm-news relative">
    <div class="pm-container pm-container--indented relative pt-40">
        <img    
            class="hidden desktop:block absolute top-0 right-0 z-50" 
            src="<?php echo get_template_directory_uri() . '/assets/svg/news-lines.svg' ?>" 
            alt="Decorations"
            style="max-width: 285px;"
        />

        <img    
            class="hidden desktop-wide:block absolute bottom-0 left-0 z-50" 
            src="<?php echo get_template_directory_uri() . '/assets/svg/news-dots.svg' ?>" 
            alt="Decorations"
            style="max-width: 95px;"
        />
        <h2>
            <?php
                $news_title = get_field('news_title');
                $news_lines = explode(PHP_EOL, $news_title);
                foreach ( $news_lines as $line) {
                    echo preg_replace("/\*(.+)\*/", '<span class="text-primary">$1</span>', $line);
                    echo '</br>';
                }
            ?>
        </h2>
        <p class="pb-10 tablet:pb-16"><?php echo get_field('news_description'); ?></p>
    </div>

    <div class="pm-container">
        <?php
        $post_list = get_posts( array(
            'sort_order' => 'desc',
            'numberposts' => 4,
        ) );
        if( $post_list ): ?>
            <ul class="flex flex-col tablet:flex-row tablet:flex-wrap">
            <?php foreach( $post_list as $featured_post ): 
                $post_date = get_the_date( 'd / m / Y' ); 
                $permalink = get_permalink( $featured_post->ID );
                $title = get_the_title( $featured_post->ID );
                $excerpt = get_the_excerpt( $featured_post->ID);
                $post_image = get_the_post_thumbnail_url($featured_post->ID,'medium_large');
            ?>
                
                <li class="phone-wide:flex-1/2 tablet:max-w-1/2 mb-10 tablet:mb-0 relative">
                    <img class="object-cover h-full w-full" src="<?php echo $post_image; ?>" alt="<?php echo esc_html( $title ); ?>" title="<?php echo esc_html( $title ); ?>" />
                    <article class="absolute left-0 top-0 flex pm-news-article group post-info min-h-200px full-hd:min-h-550px h-full w-full">
                        <div class="h-full w-full relative">
                            <div class="flex flex-col justify-end group-hover:justify-between z-10 absolute h-full w-full">
                                <div>
                                    <span class="text-primary text-sm tablet:text-base leading-line-height-normal block mb-1 tablet:mb-2"><?php echo $post_date; ?></span>
                                    <h3 class="text-base tablet:text-md desktop:text-lg leading-line-height-normal tablet:leading-line-height-md desktop:leading-line-height-lg mb-4 full-hd:mb-6 font-weight-bold"><?php echo esc_html( $title ); ?></h3>
                                </div>
                                <div class="desktop:max-h-0 group-hover:max-h-100%">
                                    <div class="hidden opacity-0 group-hover:opacity-100 desktop:block mb-6">
                                        <?php 
                                        
                                        $post_services = get_field( 'services', $featured_post->ID );
                                        if($post_services) {
                                            foreach($post_services as $post_service) {
                            
                                                $service = get_post($post_service);
                                                $service_title = get_the_title( $service->ID );
                                                $service_link = get_permalink($service->ID);

                                                $service_tag = new stdClass;
                                                $service_tag->name = $service_title;
                                                $service_tag->link = $service_link;

                                                $service_categories = wp_get_post_terms($post_service, 'services_category', array("fields" => "all"));
                                                $post_taxonomies = array();
                                                
                                                if ( $service_categories ) {
                                                    foreach($service_categories as $category) {
                                                        $category->link = get_term_link( $category->term_id );
                                                        array_push($post_taxonomies, $category);
                                                    }
                                                }
                                                array_push($post_taxonomies, $service_tag);

                                                foreach($post_taxonomies as $post_taxonomy) {
                                                    ?>
                                                    <a class="pm-taxonomy-pill" href="<?php echo $post_taxonomy->link; ?>" title="<?php echo $post_taxonomy->name; ?>">
                                                        <?php echo $post_taxonomy->name; ?>
                                                    </a>
                                                    <?php
                                                }
                                            }
                                        }?>
                                    </div>
                                </div>
                                <div class="desktop:max-h-0 group-hover:max-h-100% overflow-hidden opacity-0 group-hover:opacity-100 flex-1 hidden text-sm full-hd:text-base desktop:block text-black">
                                    <p class="mb-6 full-hd:mb-14"><?php echo $excerpt; ?></p>
                                </div>
                                <a class="desktop:max-h-0 group-hover:max-h-100% pm-button pm-button--text-primary desktop:opacity-0 group-hover:opacity-100" href="<?php echo esc_url( $permalink ); ?>">Czytaj całość</a>
                            </div>
                        </div>
                        <div class="hidden desktop:block pm-news-article__backlayer">
                    </article>
                </li>
            <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    <?php wp_reset_postdata(); ?>
        <div class="pm-container relative py-10">
            <img    
                class="hidden desktop:block absolute top-0 left-0 z-50" 
                src="<?php echo get_template_directory_uri() . '/assets/svg/news-dots-2.svg' ?>" 
                alt="Decorations"
                style="max-width: 168px;"
            />
            <div class="mx-auto max-w-885px">
                <a class="pm-button pm-button--outline w-full text-center" href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>" title="Zobacz kolejne wpisy">ZOBACZ KOLEJNE WPISY</a>
            </div>
        </div>
    </div>
</section>
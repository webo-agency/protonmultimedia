

<div class="pm-container">
    <?php echo get_field('news_title');
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
            
            <li class="phone-wide:flex-1/2 tablet:max-w-1/2 mb-10 tablet:mb-0">
                <article class="relative pm-news-article">
                    <img class="object-cover w-full" src="<?php echo $post_image; ?>" alt="<?php echo esc_html( $title ); ?>" title="<?php echo esc_html( $title ); ?>" />
                    <div class="absolute bottom-0 left-0 post-info">
                        <span class="text-primary text-sm tablet:text-base leading-line-height-normal block mb-4"><?php echo $post_date; ?></span>
                        <h3 class="text-base tablet:text-md desktop:text-lg leading-line-height-normal tablet:leading-line-height-md desktop:leading-line-height-lg mb-4 full-hd:mb-10 font-weight-bold"><?php echo esc_html( $title ); ?></h3>
                        <div class="pm-news-article__teaser">
                            <div class="hidden desktop:block mb-6 full-hd:mb-20">
                                <?php 
                                
                                $post_services = get_field( 'services', $featured_post->ID );
                                if($post_services) {
                                    foreach($post_services as $post_service) {
                    
                                        $service = get_post($post_service);
                                        $service_terms = wp_get_post_terms($post_service, 'services_tags', array("fields" => "all"));
                                        $service_categories = wp_get_post_terms($post_service, 'services_category', array("fields" => "all"));
                                        $term_id = false;
                                        $service_term = '';
                                        $service_category = '';
                                        $post_taxonomies = array();

                                        if ( $service_terms ) {
                                            $term_id = $service_terms[0]->term_id;
                                            $service_term = get_term($term_id);
                                        }
                                        
                                        if ( $service_categories ) {
                                            $term_id = $service_categories[0]->term_id;
                                            $service_category = get_term($term_id);
                                        }
                                        array_push($post_taxonomies, $service_category, $service_term);

                                        foreach($post_taxonomies as $post_taxonomy) {
                                            ?>
                                            <a class="rounded border-primary border-2 border-solid text-white desktop:text-black text-sm leading-line-height-sm p-2 inline-block" href="<?php echo get_term_link( $post_taxonomy ); ?>" title="<?php echo $post_taxonomy->name; ?>">
                                                <?php echo $post_taxonomy->name; ?>
                                            </a>
                                            <?php
                                        }
                                    }
                                }?>
                            </div>
                            <div class="hidden text-sm full-hd:text-base desktop:block mb-6 full-hd:mb-20 text-black">
                                <?php echo $excerpt; ?>
                            </div>
                            <a class="text-primary font-weight-bold" href="<?php echo esc_url( $permalink ); ?>">Czytaj całość -</a>
                        </div>
                    </div>
                    <div class="hidden desktop:block pm-news-article__backlayer">
                </article>
            </li>
        <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</div>
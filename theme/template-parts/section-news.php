

<div class="pm-container">
    <?php echo get_field('news_title');
    $featured_posts = get_field('news_items');
    if( $featured_posts ): ?>
        <ul class="flex flex-col tablet:flex-row">
        <?php foreach( $featured_posts as $featured_post ): 
            $post_date = get_the_date( 'd / m / Y' ); 
            $permalink = get_permalink( $featured_post->ID );
            $title = get_the_title( $featured_post->ID );
            $excerpt = get_the_excerpt( $featured_post->ID);
            $tags = get_field( 'news_tags', $featured_post->ID );
            $post_image = get_the_post_thumbnail_url($featured_post->ID,'medium_large');
        ?>
            
            <li class="phone-wide:flex-1/2 tablet:max-w-1/2 mb-10 tablet:mb-0">
                <article class="relative pm-news-article">
                    <img class="object-cover w-full" src="<?php echo $post_image; ?>" alt="<?php echo esc_html( $title ); ?>" title="<?php echo esc_html( $title ); ?>" />
                    <div class="absolute bottom-0 left-0 post-info">
                        <span class="text-primary text-sm desktop:text-base leading-line-height-normal block mb-4"><?php echo $post_date; ?></span>
                        <h3 class="text-base tablet:text-md desktop:text-lg leading-line-height-normal tablet:leading-line-height-md desktop:leading-line-height-lg mb-4 desktop:mb-10 font-weight-bold"><?php echo esc_html( $title ); ?></h3>
                        <div class="pm-news-article__teaser">
                            <div class="hidden tablet:block mb-6 desktop:mb-20">
                                <?php if($tags) {foreach( $tags as $tag ): 
                                    $term = get_term( $tag, $taxonomy );
                                    $tag_link = get_field('tag_link', $term->taxonomy.'_'.$term->term_id);
                                    ?>
                                        <a class="rounded border-primary border-2 border-solid text-white desktop:text-black text-sm leading-line-height-sm p-2 inline-block" href="<?php  echo $tag_link['url']; ?>" title="<?php echo $tag_link['title']; ?>">
                                            <?php echo $tag_link['title']; ?>
                                        </a>
                                <?php endforeach;
                                } ?>
                            </div>
                            <div class="hidden desktop:block mb-6 desktop:mb-20 text-black">
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
<!--opacity-0 -translate-y-40 invisible-->
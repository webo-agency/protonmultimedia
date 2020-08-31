<section class="container relative z-50">
    <side-heading>
      <h2><?php echo $args['section_name_string']; ?></h2>
    </side-heading>

  <?php if(count($args['filters_array'])): ?>
    <ul class="flex">
    
        <li class="mr-2">
          <a class="pm-taxonomy-pill text-white" href="#<?php echo $term->slug; ?>">Wszystkie</a>
        </li>
      <?php foreach ($args['filters_array'] as $index => $term): ?>
        <li class="mr-2">
          <a class="pm-taxonomy-pill text-white" href="#<?php echo $term->slug; ?>"><?php echo $term->name; ?></a>
        </li>
      <?php endforeach; ?>
    </ul>
  <?php endif; ?>
  
  <?php if(count($args['list_post_array'])): ?>
    <ul class="grid grid-cols-1 phone-wide:grid-cols-2 pt-12 tablet:pt-18 mb-10">
      <?php foreach ($args['list_post_array'] as $index => $post): ?>
        <li>
        <?php

          $permalink = get_permalink( $post->ID );
          $title = get_the_title( $post->ID );
          $excerpt = get_the_excerpt( $post->ID);
          $post_image = get_the_post_thumbnail_url($post->ID,'medium_large');
          ?>
          <a class="pm-category-item" href="<?php echo $permalink; ?>" title="<?php echo $title; ?>">
            <?php
              if( $image = get_field('service_list_icon')) {
              ?>
              <span class="pm-category-item__img">
                <?php
                  echo wp_get_attachment_image( $image, array('9999', '550'), "", array('class' => 'w-full h-full object-cover') );
                ?>
              </span>
              <?php
              }
            ?>
            <span class="pm-category-item__title"><?php echo $title; ?></span>
          </a>
        </li>
      <?php endforeach; ?>
    </ul>
  <?php endif; ?>
</section>

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
            <span class="pm-category-item__img">
              <svg viewBox="0 0 29 29" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="2"><g transform="translate(0 -1317.78) scale(.29059)"><path fill="none" d="M0 4534.84h99.797v99.797H0z"/><clipPath id="a"><path d="M0 4534.84h99.797v99.797H0z"/></clipPath><g clip-path="url(#a)"><path d="M27.382 4579.875l45.04-45.011 5.007 4.99-45.04 45.046 45.03 45.046-5.004 4.99-45.033-45.046h-.007l-5.007-4.99 2.426-2.41 2.588-2.615z" fill="#01b9c3"/></g></g></svg>
            </span>
            <span class="pm-category-item__title"><?php echo $title; ?></span>
          </a>
          <?php

          if( $image = get_field('service_list_icon')) {
           echo wp_get_attachment_image( $image, array('9999', '550'), "", array('class' => 'w-full h-full object-cover') );
          }
        ?>
        </li>
      <?php endforeach; ?>
    </ul>
  <?php endif; ?>
</section>

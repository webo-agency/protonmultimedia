<section class="container">
  <h2>
    <?php echo $args['section_name_string']; ?>
  </h2>

  <?php if(count($args['filters_array'])): ?>
    <ul>
      <?php foreach ($args['filters_array'] as $index => $term): ?>
        <li>
          <a href="#<?php echo $term->slug; ?>"><?php echo $term->name; ?></a>
        </li>
      <?php endforeach; ?>
    </ul>
  <?php endif; ?>
        -----
  <?php if(count($args['list_post_array'])): ?>
    <ul>
      <?php foreach ($args['list_post_array'] as $index => $post): ?>
        <li>
        <?php

          if( $image = get_field('service_list_icon')) {
           //Uncomment, working //echo wp_get_attachment_image( $image, array('9999', '550'), "", array('class' => 'w-full h-full object-cover') );
          }

          $permalink = get_permalink( $post->ID );
          echo $title = get_the_title( $post->ID );
          $excerpt = get_the_excerpt( $post->ID);
          $post_image = get_the_post_thumbnail_url($post->ID,'medium_large');
        ?>
        </li>
      <?php endforeach; ?>
    </ul>
  <?php endif; ?>
</section>

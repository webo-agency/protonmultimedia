<header class="container">
  <?php echo $args['title_string']; ?>
  <?php echo $args['description_string']; ?>
  
  <?php
    if( $image = $args['background_id']) {
      echo wp_get_attachment_image( $image, array('9999', '550'), "", array('class' => 'w-full h-full object-cover') );
    }

    if( $icon = $args['service_category_icon_id']) {
      echo wp_get_attachment_image( $icon, array('9999', '550'), "", array('class' => 'w-full h-full object-cover') );
    }  
  ?>
</header>
<section class="container">
  <?php echo $args['section_name_string']; ?>
  <?php
    var_dump($args['filters_array']);
  ?>
  <?php foreach ($args['list_post_array'] as $index => $post): ?>
    <?php setup_postdata($post); ?>
      <?php
        if(has_post_thumbnail()):
            ?><div class="featured_image_wrap"><?php
                the_post_thumbnail();
            ?></div><?php
        endif;
        the_title();
      ?>
    <?php endforeach; ?>
    <?php wp_reset_postdata(); ?>
</section>

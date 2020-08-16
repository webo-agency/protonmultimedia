<section height="638px" class="overflow-hidden">
  <?php echo file_get_contents( get_stylesheet_directory_uri() . '/assets/svg/offer.svg' ); ?>
</section>

<section>
  <?php
    $terms = get_terms( array(
      'taxonomy' => 'services_category',
      'hide_empty' => false,
    ) );
  ?>
  
  <div class="bg-dark-blue-2 mb-16">
    <div class="container flex flex-row flex-wrap py-16 px-0">
      <?php foreach($terms as $term): ?>
        <div class="w-full tablet:w-1/2 relative overflow-hidden">
          <div class="absolute inset-0 z-20 p-8 px-12">
            <h2 class="uppercase mb-10 text-lg tablet:text-xl font-weight-bold leading-tight tablet:leading-none">
              <?php echo implode('<br/><span class="line-decorated bg-dark-blue-2 leading-tight">', explode(' ', trim($term->name) . ' </span>', 2)); ?>
            </h2>

            <div >
              <?php echo term_description($term); ?>
            </div>

            <a href="<?php echo get_term_link($term->slug, 'services_category');?>" class="pm-button pm-button--primary pm-button--large">
              <?php the_field('service_category_button_title',$term); ?>
            </a>
          </div>
          <div class="absolute inset-0 z-10">
            <?php
              if( $image = get_field('service_category_icon',$term)) {
                echo wp_get_attachment_image( $image, array('9999', '550'), "", array('class' => 'w-full h-full object-cover') );
              }
            ?>
          </div>
          <div class="relative w-full h-auto box-overlay">
            <?php
              if( $image = get_field('service_category_featured_image',$term)) {
                echo wp_get_attachment_image( $image, array('9999', '550'), "", array('class' => 'w-full h-full object-cover') );
              }
            ?>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

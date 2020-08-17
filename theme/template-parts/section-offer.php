<section class="relative">
  <?php
    $terms = get_terms( array(
      'taxonomy' => 'services_category',
      'hide_empty' => false,
    ) );
  ?>
  <side-heading>
    <?php echo get_field('side_headings', 'option')[0]['side_heading']; ?>
  </side-heading>
  <div class="bg-dark-blue-2">
    <div class="pm-container">
      <div class="container flex flex-row flex-wrap py-16 px-0">
        <?php foreach($terms as $term): ?>
          <div class="w-full tablet:w-1/2 relative overflow-hidden">
            <div class="relative flex flex-col items-start min-h-550px z-20 py-20 px-12">
              <h2 class="flex-initial mb-8 uppercase text-lg tablet:text-xl font-weight-bold leading-tight tablet:leading-none">
                <?php echo implode('<br/><span class="line-decorated bg-dark-blue-2 leading-tight">', explode(' ', trim($term->name) . ' </span>', 2)); ?>
              </h2>

              <div class="flex items-center flex-1 mb-8">
                <?php echo term_description($term); ?>
              </div>

              <a class="flex-initial pm-button pm-button--primary pm-button--large" href="<?php echo get_term_link($term->slug, 'services_category');?>">
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
            <div class="absolute inset-0 w-full h-auto box-overlay">
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
  </div>
</section>

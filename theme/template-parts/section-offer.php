<section class="relative">
  <?php
    $terms = get_terms( array(
      'parent' => 0,
      'taxonomy' => 'services_category',
      'hide_empty' => false,
    ) );
  ?>

  <?php if(get_field('offer_side_title', 'option')): ?>
    <side-heading
      data-text="<?php echo get_field('offer_side_title', 'option'); ?>"
    ></side-heading>
  <?php endif; ?>

  <div class="container max-w-none flex flex-row flex-wrap pb-16">
    <?php foreach($terms as $term): ?>
      <div class="w-full desktop:w-1/2 relative overflow-hidden border border-solid border-dark-blue-2">
        <div class="relative flex flex-col items-start min-h-550px z-20 py-20 px-12">
          <h2 class="flex-initial mb-8 uppercase text-lg tablet:text-xl font-weight-bold leading-tight tablet:leading-none text-white">
            <?php echo implode('<br/><span class="line-decorated bg-dark-blue-2 leading-tight">', explode(' ', trim($term->name) . ' </span>', 2)); ?>
          </h2>

          <div class="flex items-center flex-1 mb-8 text-white">
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
        <div class="absolute inset-0 w-full h-auto box-gradient-overlay-top">
          <?php
            if( $image = get_field('service_category_featured_image',$term)) {
              echo wp_get_attachment_image( $image, array('9999', '550'), "", array('class' => 'w-full h-full object-cover') );
            }
          ?>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</section>

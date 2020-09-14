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

  <div class="guides left-minus-px right-auto bg-dark-blue"></div>

  <div class="relative container max-w-none flex flex-row flex-wrap pb-16 z-30">
    <?php foreach($terms as $index => $term): ?>
      <div class="w-full tablet:w-1/2 relative overflow-hidden <?php echo ($index%2) ? '' : 'border-r-2 border-solid border-dark-blue-2'; ?>">
        <div class="relative flex flex-col items-start h-full tablet:min-h-550px py-10 px-4 z-20 phone-wide:py-20 phone-wide:px-12">
          <h2 class="flex-initial uppercase text-white mb-8 phone-wide:mb-12 text-md phone:text-lg desktop:text-xl">
            <?php echo implode('<br/><span class="line-decorated bg-dark-blue-2 leading-tight">', explode(' ', trim($term->name) . ' </span>', 2)); ?>
          </h2>

          <div class="desktop:w-3/4 flex items-start flex-1 text-white">
            <?php echo term_description($term); ?>
          </div>

          <a class="flex-initial mt-auto mb-0 pm-button pm-button--primary pm-button--large" href="<?php echo get_term_link($term->slug, 'services_category');?>">
            <?php the_field('service_category_button_title',$term); ?>
          </a>
        </div>
        <div class="absolute inset-0 z-10 pt-48 hidden tablet:block">
          <?php
            if( $image = get_field('service_category_icon',$term)) {
              echo wp_get_attachment_image( $image, array('9999', '550'), "", array('class' => 'w-full h-full object-cover', 'role' => 'presentation') );
            }
          ?>
        </div>
        <div class="absolute inset-0 w-full h-auto box-gradient-overlay-top">
          <?php
            if( $image = get_field('service_category_featured_image',$term)) {
              echo wp_get_attachment_image( $image, array('9999', '550'), "", array('class' => 'w-full h-full object-cover', 'role' => 'presentation') );
            }
          ?>
        </div>
      </div>
    <?php endforeach; ?>
  </div>

  <div class="guides right-minus-px left-auto bg-dark-blue"></div>
</section>

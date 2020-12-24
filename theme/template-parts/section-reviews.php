<section class="relative flex flex-col bg-white text-black overflow-hidden">
  <side-heading
      class="z-20"
      data-text="<?php echo $args['side_description_string']; ?>"
  ></side-heading>

  <div class="guides left-minus-px right-auto bg-gray-light" role="presentation"></div>

  <div class="flex-initial flex flex-row items-center">
    <div class="hidden desktop-wide:block absolute ml-container top-0 bottom-0 left-1px my-auto z-20 w-24">
      <?php echo file_get_contents(get_template_directory_uri() . '/assets/svg/dots-block.svg'); ?>
    </div>
  </div>
  
  <div class="hidden desktop-wide:flex absolute top-0 right-420px left-auto z-20 w-40 flex-row overflow-hidden max-h-140px items-end">
    <?php echo file_get_contents(get_template_directory_uri() . '/assets/svg/dots-pattern.svg'); ?>
    <?php echo file_get_contents(get_template_directory_uri() . '/assets/svg/dots-pattern.svg'); ?>
  </div>

  <div class="container flex flex-col items-center pt-20 py-8 desktop:py-20 z-20">
    <div class="desktop:max-w-1/2 flex flex-col justify-center flex-wrap flex-auto text-center desktop:pr-16 desktop:mb-0">
      <h2 class="uppercase">
        <?php 
          $lines = explode(PHP_EOL, $args['title_string']);
          foreach ( $lines as $line) {
              echo preg_replace("/\*(.+)\*/", '<span class="text-primary">$1</span>', $line);
          }
        ?>
      </h2>

      <p>
        <?php echo $args['description_string']; ?>
      </p>
    </div>
  </div>

  <div class="container pb-10 desktop:pb-40 mb-2 z-20">
    <div class="relative flex flex-row">
      <?php if( is_array($args['review_array']) && !empty($args['review_array']) ): ?>
        <reviews-slider class="w-3/5 mb-4 tablet:mb-0 z-40">
          <ul class="swiper-wrapper overflow-hidden z-20">
            <?php foreach ($args['review_array'] as $key => $field): ?>
              <li class="swiper-slide w-full mb-10">
                
                <div class="w-full max-w-screen-tablet flex flex-column justify-center mb-2">
                  <?php echo wp_get_attachment_image( $field["review_image"], array('9999', '479'), "", array('class' => 'object-cover w-12 h-12 rounded-full', 'role' => 'presentation') );  ?>
                </div>
              
                <div class="w-full max-w-screen-tablet flex flex-column flex-wrap justify-center">
                  <h3 class="w-full max-w-screen-tablet mb-2 text-center">
                    <?php 
                      $lines = explode(PHP_EOL, $field['review_title']);
                      foreach ( $lines as $line) {
                          echo preg_replace("/\*(.+)\*/", '<span class="text-primary">$1</span>', $line);
                      }
                    ?>
                  </h3>

                  <p class="text-gray-2">
                    <?php echo $field['review_position']; ?>
                  </p>
                </div>

                <p class="w-full max-w-screen-tablet flex flex-row items-center text-center">
                  <?php echo $field['review_ description']; ?>
                </p>
              </li>
              
            <?php endforeach; ?>
          </ul>
          <div class="flex items-center justify-between z-30">

            <div class="flex-1 px-4 py-8 relative h-10 flex items-center justify-center"><div class="swiper-pagination" data-reviews-pagination></div></div>
            <div class="flex-initial px-4 absolute inset-0 mx-auto mt-24 mb-auto" data-reviews-button-next>
                <img 
                    class="block transform scale-x-flip scale-y-1" 
                    width="20px"
                    height="20px"
                    src="<?php echo get_template_directory_uri() . '/assets/svg/arrow.svg' ?>" 
                    alt="Right arrow"
                />  
            </div>
        </div>
        </reviews-slider>
      <?php endif; ?>
    </div>
  </div>

  <div class="guides right-minus-px left-auto bg-gray-light" role="presentation"></div>
</section>
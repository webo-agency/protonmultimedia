<header class="relative overflow-hidden">
  <div class="container">

    <side-heading
        class="z-40 text-white"
        data-text="Blog"
    ></side-heading>

    <div class="guides left-minus-px right-auto bg-dark-blue" role="presentation"></div>

    <div class="image-overlay absolute top-0 bottom-0 left-0 w-full h-full -mb-1 z-20 pointer-events-none"></div>
    
    <div class="max-w-900px mx-auto relative flex flex-col justify-center pt-40 pb-16 z-30">
      
      <span class="text-primary text-sm tablet:text-base leading-line-height-normal block mb-1 tablet:mb-2"><?php echo $args['post_date_string']; ?></span>

      <h2 class="mb-0 desktop:mb-4 full-hd:mb-6 desktop:text-white desktop:group-hover:text-black">
        <?php echo $args['title_string']; ?>
      </h2>

      <div class="mb-6">
        <?php
          foreach($args['post_terms_terms'] as $term) {
            ?>
              <a class="pm-taxonomy-pill text-white" href="<?php echo $term->link; ?>" title="<?php echo $term->name; ?>">
                  <?php echo $term->name; ?>
              </a>
            <?php
          }
        ?>
      </div>

      <div class="w-full leading-relaxed">
        <div class="text-base tablet-wide:text-md tablet-wide:mb-5">
          <?php echo str_replace(array("\r\n", "\r", "\n"), "<br />",$args['description_string']); ?>
        </div>
      </div>
    </div>

    <?php
      if( $image = $args['background_id']) {
        echo wp_get_attachment_image( $image, array('9999', '550'), "", array('class' => 'absolute left-0 top-0 w-full h-full object-cover z-10') );
      }
    ?>
    
    <img 
        class="hidden tablet-wide:block absolute top-0 bottom-1/2 right-0 h-full transform pointer-events-none z-20" 
        src="<?php echo get_template_directory_uri() . '/assets/svg/header-lines.svg' ?>" 
        width="250px"
        height="250px"
        alt="Decorations"
        role="presentation"
    />

    <div class="guides right-minus-px left-auto bg-dark-blue" role="presentation"></div>
  </div>
</header>

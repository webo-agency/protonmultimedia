<header class="relative overflow-hidden">
    <?php
      if( $image = $args['background_id']) {
        echo wp_get_attachment_image( $image, array('9999', '550'), "", array('class' => 'absolute left-0 top-0 w-full h-full object-cover') );
      }
    ?>
    <img 
        class="hidden tablet-wide:block absolute -bottom-1/2 right-0 h-full z-50 w-auto pointer-events-none" 
        src="<?php echo get_template_directory_uri() . '/assets/svg/header-lines.svg' ?>" 
        width="540px"
        height="400px"
        alt="Decorations"
    />
  <div class="container absolute left-0 right-0 top-50px tablet:top-1/2 transform tablet:-translate-y-1/2 mt-40 mb-40">
    <h2 class="font-bold uppercase text-4xl tablet:text-8xl mb-4 tablet:mb-14 leading-tight">
      <?php 
        $lines = explode(' ', $args['title_string']);
        $firstWord = array_slice($lines, 0, 1);
        $restOfString = array_slice($lines, 1);
        echo '<span class="line-decorated bg-primary">'.$firstWord[0].'</span>';
        echo '<br>';
        foreach ( $restOfString as $word) {
          echo $word . ' ';
        }
      ?>
    </h2>
    <div class="w-full leading-relaxed mb-14">
      <div class="text-base tablet-wide:text-md tablet-wide:mb-5">
        <?php echo $args['description_string']; ?>
      </div>
    </div>
  </div>
  <?php
    if( $image = $args['background_id']) {
      echo wp_get_attachment_image( $image, array('9999', '550'), "", array('class' => 'absolute left-0 top-0 w-full h-full object-cover z-10') );
    }
  ?>
  <img 
      class="hidden tablet-wide:block absolute top-0 bottom-1/2 right-0 h-full w-auto transform -rotate-61 pointer-events-none z-20" 
      src="<?php echo get_template_directory_uri() . '/assets/svg/header-lines.svg' ?>" 
      width="540px"
      height="400px"
      alt="Decorations"
  />
</header>

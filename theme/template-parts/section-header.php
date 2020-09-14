<header class="relative overflow-hidden">
  <div class="container">
    <div class="image-overlay absolute top-0 bottom-0 left-0 w-full h-full -mb-1 z-10 pointer-events-none"></div>
    <div class="desktop-wide:px-smaller-container relative max-w-5xl flex flex-col justify-center pt-40 pb-40 z-30">
      <h2 class="font-bold uppercase mb-4 tablet:mb-14 leading-tight">
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
      <div class="w-full leading-relaxed">
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
        class="hidden tablet-wide:block absolute top-0 bottom-1/2 right-0 h-full transform -rotate-61 pointer-events-none z-20 -mt-64" 
        src="<?php echo get_template_directory_uri() . '/assets/svg/header-lines.svg' ?>" 
        width="400px"
        height="400px"
        alt="Decorations"
        role="presentation"
    />
  </div>
</header>

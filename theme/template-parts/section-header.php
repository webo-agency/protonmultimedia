<header class="relative min-h-300px tablet:min-h-430px mb-12">
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
  <div class="container absolute left-0 right-0 top-50px tablet:top-1/2 transform tablet:-translate-y-1/2">
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
    <div class="w-full sm:w1/3 tablet:w-1/2 leading-relaxed mb-14">
      <div class="font-sans text-base tablet-wide:text-md tablet-wide:mb-5">
        <?php echo $args['description_string']; ?>
      </div>
    </div>
  </div>
</header>

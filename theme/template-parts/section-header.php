<header class="relative min-h-430px">
    <?php
      if( $image = $args['background_id']) {
        echo wp_get_attachment_image( $image, array('9999', '550'), "", array('class' => 'absolute left-0 top-0 tablet:relative w-full h-full object-cover') );
      }
    ?>
  <div class="container absolute left-0 right-0 top-1/2 transform -translate-y-1/2">
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

<section class="relative flex flex-col bg-gray-lighter text-black">
  <div class="guides left-minus-px right-auto bg-gray-light" role="presentation"></div>

  <div class="container">
    <div class="desktop-wide:pl-smaller-container flex flex-row flex-wrap pt-24 desktop:pt-40 pb-16 mb-2 mt-2">
      
      <div class="desktop:max-w-1/2 flex flex-col flex-wrap flex-auto desktop:pr-32 mb-12 desktop:mb-0 items-center text-center tablet:items-start tablet:text-left">
        <h2 class="uppercase desktop:text-lg">
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

      <div class="desktop:w-1/2 flex flex-row flex-wrap relative">
        <?php 
          if( $image = $args['background_id']) {
            echo wp_get_attachment_image( $image, array('9999', '550'), "", array('class' => 'absolute left-0 top-0 w-full h-full object-cover z-10') ); 
          }
        ?>
      </div>
    </div>
  </div>

  <div class="guides right-minus-px left-auto bg-gray-light" role="presentation"></div>
</section>
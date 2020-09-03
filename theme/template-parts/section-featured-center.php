<section class="relative flex flex-col bg-white text-black">
  <side-heading 
      data-text="<?php echo $args['side_description_string']; ?>"
  ></side-heading>

  <div class="guides left-minus-px right-auto bg-gray-light"></div>

  <div class="container flex flex-col items-center py-20">
    <div class="desktop:max-w-1/2 flex flex-col justify-center flex-wrap flex-auto text-center pr-16 mb-12 desktop:mb-0">
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

  <div class="flex flex-row">
    <!-- <img src="" class="absolute"/> -->
  </div>

  <div>
    <!-- next after 4 -->
  </div>

  <div class="guides right-minus-px left-auto bg-gray-light"></div>
</section>

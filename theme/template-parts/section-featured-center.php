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

  <div class="relative container flex flex-row mb-20">
    <?php if( is_array($args['highlighted_array']) && !empty($args['highlighted_array']) ): ?>
      <ul class="w-full flex flex-row flex-wrap">
        <?php $i = 0; foreach ($args['highlighted_array'] as $key => $field): $i++; if($i>4){ break; } ?>
          <li class="flex flex-row w-full desktop:w-1/2 items-center 
            <?php echo ($i % 2) ? 'text-right' : 'text-left flex-row-reverse'; ?>  
            <?php echo ($i == 1) ? 'pr-20 pb-12' : ''; ?> 
            <?php echo ($i == 2) ? 'pl-20 pb-24' : ''; ?> 
            <?php echo ($i == 3) ? 'pr-20 pb-10 pt-20' : ''; ?> 
            <?php echo ($i == 4) ? 'pl-20 pt-0 pb-8' : ''; ?>">
            <h3 class="w-full mb-0 font-normal">
              <?php 
                $lines = explode(PHP_EOL, $field['highlighted_title']);
                foreach ( $lines as $line) {
                    echo preg_replace("/\*(.+)\*/", '<span class="font-bold">$1</span>', $line);
                }
              ?>
            </h3>
            <div class="w-6 h-2 bg-primary mx-4"></div>
          </li>
        <?php endforeach; ?>
      </ul>
      <div class="container absolute inset-0 m-auto flex items-center justify-center pointer-events-none">
        <?php echo wp_get_attachment_image( 
                $args["highlighted_icon_center_id"], 
                array('9999', '374'), 
                "", 
                array('class' => 'object-cover') ); 
              ?>
      </div>
    <?php endif; ?>

  </div>

  <div>
    <!-- next after 4 -->
  </div>

  <div class="guides right-minus-px left-auto bg-gray-light"></div>
</section>

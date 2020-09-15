<section class="relative flex flex-col bg-white text-black overflow-hidden">
  <side-heading
      class="z-20"
      data-text="<?php echo $args['side_description_string']; ?>"
  ></side-heading>

  <div class="guides left-minus-px right-auto bg-gray-light" role="presentation"></div>

  <?php
      if( $image = $args['background_id']) {
        echo wp_get_attachment_image( $image, array('9999', '550'), "", array('class' => 'absolute top-0 left-0 right-0 bottom-0 min-w-full min-h-full object-cover opacity-point blend-luminosity z-10') );
      }
  ?>
  
  <div class="hidden desktop-wide:flex absolute top-0 right-420px left-auto z-20 w-40 flex-row overflow-hidden max-h-140px items-end">
    <?php echo file_get_contents(get_template_directory_uri() . '/assets/svg/dots-pattern.svg'); ?>
    <?php echo file_get_contents(get_template_directory_uri() . '/assets/svg/dots-pattern.svg'); ?>
  </div>

  <div class="container flex flex-col items-center py-20 z-20">
    <div class="desktop:max-w-1/2 flex flex-col justify-center flex-wrap flex-auto text-center pr-16 desktop:mb-0">
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

  <div class="container pb-40 mb-2 z-20">
    <div class="relative flex flex-row">
      <?php if( is_array($args['highlighted_array']) && !empty($args['highlighted_array']) ): ?>
        <ul class="w-full flex flex-row flex-wrap">
          <?php $i = 0; foreach ($args['highlighted_array'] as $key => $field): $i++; if($i>4){ break; } ?>
            <li class="flex flex-row-reverse desktop:flex-row w-full desktop:w-1/2 items-center mb-10 desktop:mb-0 justify-end
              <?php echo ($i % 2) ? 'text-right' : 'text-left desktop:flex-row-reverse'; ?>  
              <?php echo ($i == 1) ? 'desktop:pr-40 desktop:pb-12' : ''; ?> 
              <?php echo ($i == 2) ? 'desktop:pl-40 desktop:pb-24' : ''; ?> 
              <?php echo ($i == 3) ? 'desktop:pr-40 desktop:pb-10 desktop:pt-20' : ''; ?> 
              <?php echo ($i == 4) ? 'desktop:pl-40 desktop:pt-40 desktop:pb-8' : ''; ?>">
              <h3 class="desktop:w-full mb-0 font-normal">
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
        <div class="container absolute inset-0 m-auto items-center justify-center pointer-events-none hidden desktop:flex">
          <?php echo wp_get_attachment_image( 
                  $args["highlighted_icon_center_id"], 
                  array('9999', '479'), 
                  "", 
                  array('class' => 'object-cover max-w-479px w-full', 'role' => 'presentation') ); 
                ?>
        </div>
      <?php endif; ?>
    </div>
    <?php if( is_array($args['highlighted_array']) && !empty($args['highlighted_array']) ): ?>
        <ul class="container w-full flex flex-row flex-wrap justify-center">
          <?php $i = 0; foreach ($args['highlighted_array'] as $key => $field): $i++; if($i>4): ?>
            <li class="flex flex-row-reverse desktop:flex-row w-full desktop:w-1/2 items-center mb-10 desktop:mb-0 justify-end">
              <div class="w-6 h-2 bg-primary mx-4"></div>  
              <h3 class="desktop:w-full mb-0 font-normal">
                <?php 
                  $lines = explode(PHP_EOL, $field['highlighted_title']);
                  foreach ( $lines as $line) {
                      echo preg_replace("/\*(.+)\*/", '<span class="font-bold">$1</span>', $line);
                  }
                ?>
              </h3>
              
            </li>
            <?php endif; ?>
          <?php endforeach; ?>
        </ul>
      <?php endif; ?>
  </div>

  <img 
      class="hidden tablet-wide:block absolute top-auto bottom-0 left-0 right-auto h-auto max-w-340px transform scale-flip pointer-events-none z-0 -mb-32" 
      src="<?php echo get_template_directory_uri() . '/assets/svg/header-lines.svg' ?>" 
      width="400px"
      height="400px"
      alt="Decorations"
      role="presentation"
  />

  <div class="guides right-minus-px left-auto bg-gray-light" role="presentation"></div>
</section>

<section class="relative flex flex-col bg-gray-lighter text-black">

  <div class="flex-initial flex flex-row items-center">
    <img    
        class="hidden desktop-wide:block absolute ml-container top-0 bottom-0 left-0 my-auto" 
        src="<?php echo get_template_directory_uri() . '/assets/svg/about-dots.svg' ?>" 
        alt="Decorations"
        width="85px"
        height="275px"
    />
  </div>

  <side-heading 
    data-text="<?php echo $args['side_description_string']; ?>"
  ></side-heading>
   
  <div class="guides left-minus-px right-auto bg-gray-light"></div>

  <div class="container">
    <div class="desktop-wide:pl-smaller-container flex flex-row flex-wrap py-20">
      <div class="desktop:max-w-1/2 flex flex-col flex-wrap flex-auto pr-16 mb-12 desktop:mb-0">
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

      <?php if(count($args['highlighted_array'])): ?>
        <ul class="desktop:w-1/2 flex flex-row flex-wrap">
          <?php foreach ($args['highlighted_array'] as $index => $value): ?>   
            <li class="flex flex-col items-start w-full tablet:w-1/2 tablet:pr-20 mb-14">
              <?php echo wp_get_attachment_image( 
                $value["highlighted_icon"], 
                array('9999', '70'), 
                "", 
                array('class' => 'object-cover mb-4') ); 
              ?>
              
              <h3 class="font-special font-bold text-lg">
                <?php echo $value["highlighted_title"]; ?>
              </h3>
            </li>
          <?php endforeach; ?>
        </ul>
      <?php endif; ?>
      
    </div>
  </div>

  <div class="guides right-minus-px left-auto bg-gray-light"></div>
</section>
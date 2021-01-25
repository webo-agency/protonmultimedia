<section class="relative flex flex-col <?php echo $args['section_class']; ?>">
  <side-heading 
    data-text="<?php echo $args['side_description_string']; ?>"
  ></side-heading>
   
  <div class="guides left-minus-px right-auto bg-gray-light" role="presentation"></div>

  <div class="flex-initial flex flex-row items-center">
    <div class="hidden desktop-wide:block absolute ml-container top-0 bottom-0 left-1px my-auto z-20 w-24">
      <?php echo file_get_contents(get_template_directory_uri() . '/assets/svg/dots-block.svg'); ?>
    </div>
  </div>

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

      <?php if(count($args['highlighted_array'])): ?>
        <ul class="desktop:w-1/2 flex flex-row flex-wrap">
          <?php foreach ($args['highlighted_array'] as $index => $value): ?>   
            <li class="flex flex-col w-full tablet:w-1/2 tablet:pr-20 text-center items-center tablet:items-start tablet:text-left">
              <div class="mb-8 w-20 svg-fill-primary">
                <?php echo show_image( 
                    $value["highlighted_icon"], 
                    array('9999', '70'), 
                    "", 
                    array('class' => 'object-cover mb-4') ); 
                ?>
              </div>
              
              <h3 class="font-special font-bold desktop:text-md desktop-wide:text-lg mb-14">
                <?php echo $value["highlighted_title"]; ?>
              </h3>

              <div class="mb-14">
                <?php echo $value["highlighted_description"]; ?>
              </div>
            </li>
          <?php endforeach; ?>
        </ul>
      <?php endif; ?>
      
    </div>
  </div>

  <div class="guides right-minus-px left-auto bg-gray-light" role="presentation"></div>
</section>
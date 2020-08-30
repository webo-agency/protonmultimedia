<section class="relative flex flex-col bg-white text-black">

  <side-heading 
    data-title="<?php echo $args['side_description_string']; ?>"
  ></side-heading>
   
  <div class="container desktop-wide:pl-smaller-container flex flex-row flex-wrap py-20">
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
          <li class="flex flex-col items-start w-full tablet:w-1/2 tablet:pr-12 desktop:pr-0 mb-14">
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

</section>
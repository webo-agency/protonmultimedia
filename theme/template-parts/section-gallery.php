<?php
  //'title_string' => get_sub_field('title'),
  //'description_string' => get_sub_field('description'),
  //'highlighted_array' => get_sub_field('highlighted'),
?>

<section class="relative flex flex-col bg-gray-lighter text-black">
  <div class="guides left-minus-px right-auto bg-gray-light" role="presentation"></div>

  <div class="container">
    <div class="desktop-wide:pl-smaller-container flex flex-row flex-wrap pt-24 desktop:pt-40 pb-16 mb-2 mt-2">

      <?php if(count($args['gallery_array'])): ?>
        <div class="desktop:w-1/2 flex flex-row flex-wrap relative">
          <ul class="relative px-4 flex flex-row flex-wrap pt-4 tablet:pt-18 mb-10 z-20 mt-4">
            <?php foreach ($args['gallery_array'] as $image): ?>
              <li class="w-full tablet:w-1/2">
                <?php
                  echo wp_get_attachment_image( $image, array('9999', '550'), false, "", array('class' => 'w-full h-full object-cover') );
                ?>
              </li>
            <?php endforeach; ?>
          </ul>
        </div>
      <?php endif; ?>

      <div class="desktop:max-w-1/2 flex flex-col flex-wrap flex-auto desktop:pr-32 mb-12 desktop:mb-0 items-center text-center tablet:items-start tablet:text-left">
        <h2 class="uppercase desktop:text-lg">
          <?php 
            $lines = explode(PHP_EOL, $args['title_string']);
            foreach ( $lines as $line) {
                echo preg_replace("/\*(.+)\*/", '<span class="text-primary">$1</span>', $line);
            }
          ?>
        </h2>

        <div>
          <?php echo $args['description_string']; ?>
        </div>

        <?php if(count($args['highlighted_array'])): ?>
          <div class="desktop:w-1/2 flex flex-row flex-wrap relative">
            <ul class="relative px-4 flex flex-row flex-wrap pt-4 tablet:pt-18 mb-10 z-20 mt-4">
              <?php foreach ($args['highlighted_array'] as $point): ?>
                <li>
                    <?php echo $point["highlighted_title"]; ?>
                </li>
              <?php endforeach; ?>
            </ul>
          </div>
        <?php endif; ?>

      </div>
    </div>
  </div>

  <div class="guides right-minus-px left-auto bg-gray-light" role="presentation"></div>
</section>
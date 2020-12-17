<?php
/*** Function to show images whether SVG or non SVG ***/
/*** $size & $attribute both can hold array if you want ***/
function show_image( $image_id, $size = null, $attributes = null ) {
	//first lets get the file info sto understand what kind of file it is
	//as for svg file we will take different approach
	$file_info = pathinfo( wp_get_attachment_url( $image_id ) );

	//so, if the file type is SVG
	if ( $file_info['extension'] === 'svg' ) {
		return file_get_contents( wp_get_attachment_url( $image_id ) );
	} else {
		//for any other type of images i.e. JPG, PNG, GIF
		//we can just simply use the wp_get_attachment_image() stock function
		return wp_get_attachment_image( $image_id, $size, false, $attributes );
	}
}
?>
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
            <?php foreach ($args['gallery_array'] as $index => $image): ?>
              <?php var_dump($image); ?>
              <?php /*<li>
                  <?php
                    if( $image = get_field('service_list_icon')) {
                    ?>
                    <span class="pm-category-item__img h-full svg-fill-primary">
                      <?php
                        echo show_image( $image, array('9999', '550'), "", array('class' => 'w-full h-full object-cover') );
                      ?>
                    </span>
                    <?php
                    }
                  ?>
              </li>
                      <?php 
          if( $image = $args['background_id']) {
            echo wp_get_attachment_image( $image, array('9999', '550'), "", array('class' => 'absolute left-0 top-0 w-full h-full object-cover z-10') ); 
          }
        ?>
              */ ?>
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
              <?php foreach ($args['highlighted_array'] as $index => $point): ?>
                <?php var_dump($point); ?>
                <?php /*<li>
                    <?php
                      if( $image = get_field('service_list_icon')) {
                      ?>
                      <span class="pm-category-item__img h-full svg-fill-primary">
                        <?php
                          echo show_image( $image, array('9999', '550'), "", array('class' => 'w-full h-full object-cover') );
                        ?>
                      </span>
                      <?php
                      }
                    ?>
                </li>
                <?php 
                    if( $image = $args['background_id']) {
                      echo wp_get_attachment_image( $image, array('9999', '550'), "", array('class' => 'absolute left-0 top-0 w-full h-full object-cover z-10') ); 
                    }
                  ?>
                */ ?>
              <?php endforeach; ?>
            </ul>
          </div>
        <?php endif; ?>

      </div>
    </div>
  </div>

  <div class="guides right-minus-px left-auto bg-gray-light" role="presentation"></div>
</section>
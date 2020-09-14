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
reposni<section class="relative z-50">
  <div class="container">
    <side-heading>
      <h2><?php echo $args['section_name_string']; ?></h2>
    </side-heading>

    <div class="guides left-minus-px right-auto bg-dark-blue" role="presentation"></div>
  </div>

  <?php if(count($args['filters_array'])): ?>
    <tag-filter>
      <ul class="container desktop-wide:px-smaller-container flex flex-wrap">
          <li class="mr-2" data-term="all">
            <span class="pm-taxonomy-pill text-white desktop:text-base">Wszystkie</span>
          </li>
        <?php foreach ($args['filters_array'] as $index => $term): ?>
          <li class="mr-2" data-term="<?php echo $term->term_id; ?>">
            <span class="pm-taxonomy-pill text-white desktop:text-base"><?php echo $term->name; ?></span>
          </li>
        <?php endforeach; ?>
      </ul>
    <?php endif; ?>
    
    <?php if(count($args['list_post_array'])): ?>
      <ul class="relative px-4 flex flex-row flex-wrap pt-12 tablet:pt-18 mb-10 z-50">
        <?php foreach ($args['list_post_array'] as $index => $post): ?>
          <li
            class="w-full tablet:w-1/2 transition-all duration-300 order-1"
            data-terms="<?php $allterms = wp_get_post_terms( $post->ID, 'services_category'); 
                foreach($allterms as $term) {
                  echo $term->term_id.',';
                }
            ?>"
          >
          <?php
            $permalink = get_permalink( $post->ID );
            $title = get_the_title( $post->ID );
            $excerpt = get_the_excerpt( $post->ID);
            $post_image = get_the_post_thumbnail_url($post->ID,'medium_large');
            ?>
            <a class="pm-category-item" href="<?php echo $permalink; ?>" title="<?php echo $title; ?>">
              <?php
                if( $image = get_field('service_list_icon')) {
                ?>
                <span class="pm-category-item__img svg-fill-primary mr-4">
                  <?php
                    echo show_image( $image, array('9999', '550'), "", array('class' => 'w-full h-full object-cover') );
                  ?>
                </span>
                <?php
                }
              ?>
              <span class="font-special text-sm font-semibold bg-dark-blue px-4 py-4 w-full tablet:text-md desktop:px-8 desktop:text-md desktop-wide:text-lg desktop-wide:px-12"><?php echo $title; ?></span>
            </a>
          </li>
        <?php endforeach; ?>
      </ul>
    </tag-filter>
  <?php endif; ?>

  <div class="container">
    <div class="guides right-minus-px left-auto bg-dark-blue" role="presentation"></div>
  </div>
</section>

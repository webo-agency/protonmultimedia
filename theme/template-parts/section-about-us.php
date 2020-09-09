<section class="container max-w-none bg-dark-blue-2 relative filter-shadow-top overflow-hidden">
  <div class="flex flex-row">
    <div class="flex-initial flex flex-row items-center">
      <img    
          class="hidden desktop-wide:block absolute ml-container left-0 z-30"
          src="<?php echo get_template_directory_uri() . '/assets/svg/about-dots.svg' ?>" 
          alt="Decorations"
          width="85px"
          height="275px"
          role="presentation"
      />
    </div>

    <?php if(get_field('about_us_side_title', 'option')): ?>
      <side-heading
        data-text="<?php echo get_field('about_us_side_title', 'option'); ?>"
      ></side-heading>
    <?php endif; ?>
    
    <div class="guides left-minus-px right-auto bg-dark-blue" role="presentation"></div>

    <img    
        class="hidden tablet:block absolute top-0 bottom-0 full-hd:bottom-100px desktop:top-auto desktop-wide:bottom-0 right-0 z-50 origin-top-right transform desktop:max-w-340px opacity-50 desktop:opacity-100 translate-x-0/2 desktop:translate-x-0" 
        src="<?php echo get_template_directory_uri() . '/assets/svg/about-lines.svg' ?>" 
        alt="Decorations"
        role="presentation"
    />
    <div class="pm-about desktop-wide:px-smaller-container relative">
      <div class="flex flex-col tablet:flex-row flex-wrap">
        <div class="w-full desktop:w-1/2">
          <h2 class="uppercase mb-8 tablet:mb-20">
            <?php echo get_field('about_title'); ?>
          </h2>
          <h3 class="mb-8 tablet:mb-17">
            <?php echo get_field('about_lead'); ?>
          </h3>
          <p class="mb-4 tablet:mb-12">
            <?php echo get_field('about_description'); ?>
          </p>
        </div>
        <div class="w-full py-4 tablet:py-12 desktop:w-1/2 flex items-end justify-start desktop:justify-center desktop:items-center desktop-wide:items-end desktop-wide:justify-end desktop-wide:pr-80">
        <?php $about_link = get_field('about_link'); ?>
          <a
              class="pm-button pm-button--transparent uppercase text-base tablet-wide:text-md desktop:text-base"
              href="<?php echo $about_link['url'] ?>"
              target="<?php echo $about_link['target'] ?>"
              title="<?php echo $about_link['title'] ?>"
          >
              <?php echo $about_link['title'] ?>
          </a>
        </div>
      </div>
    </div>
  </div>

  <div class="guides right-minus-px left-auto bg-dark-blue" role="presentation"></div>
</section>
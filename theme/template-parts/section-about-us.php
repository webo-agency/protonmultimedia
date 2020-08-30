<section class="container max-w-none bg-dark-blue-2 relative filter-shadow-top">
  <div class="flex flex-row">
    <div class="flex-initial flex flex-row items-center">
      <img    
          class="hidden desktop-wide:block" 
          src="<?php echo get_template_directory_uri() . '/assets/svg/about-dots.svg' ?>" 
          alt="Decorations"
          width="85px"
          height="275px"
      />
    </div>

    <?php if(get_field('side_headings', 'option')[1]['side_heading']): ?>
      <side-heading
        data-text="<?php echo get_field('side_headings', 'option')[1]['side_heading']; ?>"
      ></side-heading>
    <?php endif; ?>
    
      <img    
          class="hidden tablet:block absolute top-0 desktop:bottom-100px desktop:top-auto desktop-wide:bottom-0 right-0 z-50 origin-top-right transform scale-75 desktop-wide:scale-100" 
          src="<?php echo get_template_directory_uri() . '/assets/svg/about-lines.svg' ?>" 
          alt="Decorations"
          style="max-width: 340px;"
      />
      <div class="pm-about container relative">
        <div class="flex flex-col tablet:flex-row">
          <div class="w-full desktop:w-1/2">
            <h2 class="uppercase mb-16">
              <?php echo get_field('about_title'); ?>
            </h2>
            <h4 class="text-md leading-line-height-md mb-10 desktop:text-lg desktop:leading-line-height-lg desktop:mb-14">
              <?php echo get_field('about_lead'); ?>
            </h4>
            <p>
              <?php echo get_field('about_description'); ?>
            </p>
          </div>
          <div class="w-full py-12 justify-start desktop:w-1/2 flex items-end desktop:justify-end desktop-wide:pr-80">
          <?php $about_link = get_field('about_link'); ?>
            <a
                class="pm-button pm-button--transparent uppercase"
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
</section>
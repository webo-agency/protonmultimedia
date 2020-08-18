<section class="bg-dark-blue-2 relative shadow-section-top">
  <side-heading>
    <?php echo get_field('side_headings', 'option')[1]['side_heading']; ?>
  </side-heading>
    <img    
        class="hidden tablet:block absolute top-0 desktop:bottom-100px desktop:top-auto desktop-wide:bottom-0 right-0 z-50 origin-top-right transform scale-75 desktop-wide:scale-100" 
        src="<?php echo get_template_directory_uri() . '/assets/svg/about-lines.svg' ?>" 
        alt="Decorations"
        style="max-width: 340px;"
    />
  <div class="pm-about pm-container pm-container--indented relative">
    <img    
        class="hidden desktop-wide:block absolute top-1/2 left-0 transform -translate-y-1/2 z-50" 
        src="<?php echo get_template_directory_uri() . '/assets/svg/about-dots.svg' ?>" 
        alt="Decorations"
        style="max-width: 95px;"
    />
    <div class="flex flex-col tablet:flex-row">
      <div class="flex-1/2">
        <h2><?php echo get_field('about_title'); ?></h2>
        <h4 class="pm-lead"><?php echo get_field('about_lead'); ?></h4>
        <p><?php echo get_field('about_description'); ?></p>
      </div>
      <div class="flex items-end justify-end flex-1/2 desktop-wide:pr-64">
      <?php $about_link = get_field('about_link'); ?>
        <a
            class="pm-button pm-button--transparent"
            href="<?php echo $about_link['url'] ?>"
            target="<?php echo $about_link['target'] ?>"
            title="<?php echo $about_link['title'] ?>"
        >
            <?php echo $about_link['title'] ?>
        </a>
      </div>
    </div>
  </div>
</section>
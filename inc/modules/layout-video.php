<section class="<?php echo get_section_class(); ?>">
  <div class="container">
    <div class="video-wrap">
      <?php if(get_sub_field('video_video_url')):?>
              <iframe src="<?php echo get_sub_field('video_video_url'); ?>"></iframe>
      <?php endif; ?>
    </div>
  </div>
</section>
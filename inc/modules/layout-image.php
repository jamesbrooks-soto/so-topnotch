<section class="<?php echo get_section_class(); ?>">
    <div class="container">
<?php $image = get_sub_field('image_image');
      if( !empty( $image ) ):

        if(get_sub_field('image_text')):
                the_sub_field('image_text');
        endif;

        if (get_sub_field('image_lightbox')) { ?>

            <div class="cssbox">
              <a id="lb-img-<?php echo esc_attr($image['id']); ?>" href="#lb-img-<?php echo esc_attr($image['id']); ?>">
                <img class="cssbox_thumb" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                <span class="cssbox_full">
                <?php } ?>
                  <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                  <?php if (get_sub_field('image_lightbox')) { ?>
                </span>
              </a>

              <a class="cssbox_close" href="#"></a>

            </div>
        <?php } ?>
      <?php endif; ?>
  </div>
</section>
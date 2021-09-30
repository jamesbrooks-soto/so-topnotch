<section class="<?php echo get_section_class(); ?> py-3">
  <div class="container">
    <div class="col-12">
      <?php
      $rowCount = 0;
      if( have_rows('accordion_repeater') ):
          while( have_rows('accordion_repeater') ) : the_row();
              if (!$rowCount){
                echo "<details open>";
              } else {
                echo "<details>";
              }
              echo "<summary>" . get_sub_field('accordion_repeater_title') . "</summary><div class=\"accordion-contents\">";
              the_sub_field('accordion_repeater_content');

              $repeaterMedia = get_sub_field('accordion_repeater_media');

              if ($repeaterMedia == "video") { ?>
                  <div class="video-wrap"><iframe src="<?php the_sub_field('accordion_repeater_video'); ?>"></iframe></div>
              <?php } elseif ($repeaterMedia == "image") {
                $image = get_sub_field('accordion_repeater_image');
                if( !empty( $image ) ): ?>
                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                <? endif;
              };

              echo "</div></details>";
              $rowCount++;
          endwhile;
      endif;
      ?>
    </div>
  </div>
</section>
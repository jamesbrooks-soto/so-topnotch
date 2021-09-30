<?php if (get_sub_field('latest_posts_image')) {
  $bg = get_sub_field('latest_posts_image');
  $bgUrl = $bg['url'];
  $bgCss = 'background-image: url(\'' . $bgUrl . '\');';
  $sectionStyles = 'style="' . $bgCss . '"';
} ?>
<section class="<?php echo get_section_class(); ?> pt-4 pb-5 white" <?php if($sectionStyles){ echo ' ' .  $sectionStyles; } ?>>
  <div class="container position-relative">
    <h2 class="ml-0 ml-md-5">Latest News</h2>
    <div class="swiper-container postslider mx-0 mx-md-5">
      <div class="swiper-wrapper">
        <?php

        $number = get_sub_field('latest_posts_number');
        $postType = get_sub_field('latest_posts_type');

        // The Query
        $the_query = new WP_Query( array(
                        'posts_per_page' => $number,
                         'post_type' => $postType,
                     ));

        // The Loop
        if ( $the_query->have_posts() ) {
            while ( $the_query->have_posts() ) {
                $the_query->the_post(); ?>

                <div class="swiper-slide">
                  <?php echo wp_get_attachment_image( get_post_thumbnail_id( get_the_id() ), 'full', false ); ?>
                  <h3><?php the_title(); ?></h3>
                  <?php the_excerpt(); ?>
                  <a class="button" href="<?php echo get_post_permalink(); ?>">More</a>
                </div>

                <?php
            }
        } else {
            // no posts found
        }
        /* Restore original Post Data */
        wp_reset_postdata(); ?>
      </div>
    </div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
  </div>
</section>
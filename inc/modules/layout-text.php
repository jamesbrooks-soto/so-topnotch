<?php if(get_sub_field('text_size') == 'small') {
  $textSize = "section-text-small";
} elseif (get_sub_field('text_size') == 'large') {
  $textSize = "section-text-large";
} else {
  $textSize = "";
} ?>
<section class="<?php echo get_section_class(); ?><?php if ($textSize): echo ' ' . $textSize; endif; ?>">
  <div class="container">
    <?php if(get_sub_field('text_text')):?>
            <?php the_sub_field('text_text'); ?>
    <?php endif; ?>
  </div>
</section>
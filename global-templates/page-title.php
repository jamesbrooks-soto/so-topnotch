<?php if ((get_field('enable_page_title') == 'true') { ?>
<section id="page-title" class="pb-5">
<?php
  if (get_field('enable_page_title') == 'true') { ?>

    <?php if (get_field('page_title_background')) {
      $bg = get_field('page_title_background');
      $bgUrl = $bg['url'];
      $bgCss = 'background-image: url(\'' . $bgUrl . '\');';
      $sectionStyles = 'style="' . $bgCss . '"';
    } ?>

    <section class="section-page-title">
      <img src="<?php echo $bgUrl; ?>">
      <div class="container">
        <div class="page-title-info">

          <?php if (get_field('page_title')) {
              $title = get_field('page_title');
          } else {
              $title = get_the_title();
          } ?>
          <h1><?php echo $title; ?></h1>
          <?php if (get_field('page_description')) { ?>
          <p><?php the_field('page_description'); ?></p>
          <?php } ?>
        </div>
      </div>
    </section>
    <?php } ?>

</section>
<?php
}
?>
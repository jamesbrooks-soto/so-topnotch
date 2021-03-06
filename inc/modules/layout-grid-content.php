<?php
$rows = get_sub_field('grid_content_repeater');
$rowNumb = count(get_sub_field('grid_content_repeater'));
$cellClose = '</div>';
$imageClasses = 'align-items-center cell-image';
$titleClasses = 'align-items-start cell-title';
$buttonClasses = 'align-items-start cell-title';
$textClasses = 'align-items-start flex-column cell-text';

 ?>
<section class="<?php echo get_section_class(); ?> py-3 d-none d-md-block">
  <div class="container">
    <?php if(get_sub_field('grid_content_title')):
            echo '<div class="row"><h3>' . get_sub_field('grid_content_title') . '</h3></div>';
    endif; ?>
    <div class="row">
    <?php
    $rowLoops = floor($rowNumb / 3) + 1;
    $currentLoop = 0;

    while($currentLoop < $rowLoops):

      $firstRowNumb = $currentLoop * 3;
      $secondRowNumb = $currentLoop * 3 + 1;
      $thirdRowNumb = $currentLoop * 3 + 2;

      $firstRow = '';
      $secondRow = '';
      $thirdRow = '';

      $firstRowImg = '';
      $secondRowImg = '';
      $thirdRowImg = '';

      $firstRowTitle = '';
      $secondRowTitle = '';
      $thirdRowTitle = '';

      $firstRowLink = '';
      $secondRowLink = '';
      $thirdRowLink = '';

      $firstRowText = '';
      $secondRowText = '';
      $thirdRowText = '';

      if(array_key_exists($firstRowNumb, $rows)):
        $firstRow = $rows[$firstRowNumb];
        $firstRowImg = $firstRow['grid_content_repeater_image'];
        $firstRowTitle = $firstRow['grid_content_repeater_title'];
        $firstRowLink = $firstRow['grid_content_repeater_link'];
        $firstRowText = $firstRow['grid_content_repeater_text'];
      endif;
      if(array_key_exists($secondRowNumb, $rows)):
        $secondRow = $rows[$secondRowNumb];
        $secondRowImg = $secondRow['grid_content_repeater_image'];
        $secondRowTitle = $secondRow['grid_content_repeater_title'];
        $secondRowLink = $secondRow['grid_content_repeater_link'];
        $secondRowText = $secondRow['grid_content_repeater_text'];
      endif;
      if(array_key_exists($thirdRowNumb, $rows)):
        $thirdRow = $rows[$thirdRowNumb];
        $thirdRowImg = $thirdRow['grid_content_repeater_image'];
        $thirdRowTitle = $thirdRow['grid_content_repeater_title'];
        $thirdRowLink = $thirdRow['grid_content_repeater_link'];
        $thirdRowText = $thirdRow['grid_content_repeater_text'];
      endif;

      // Checking if any images exist, if so cellWrap needs to execute all three times regardless of if the cell is populated
      if (($firstRowImg) or ($secondRowImg) or ($thirdRowImg)) :

        echo cellWrapClasses($imageClasses);
        if($firstRowImg){

          if ($firstRowLink):
          $link_url = $firstRowLink['url']; ?>
          <a href="<?php echo esc_url( $link_url ); ?>"><?php endif; ?>
          <img src="<?php echo esc_url($firstRowImg['url']); ?>" alt="<?php echo esc_attr($firstRowImg['alt']); ?>" /><?php
          if ($firstRowLink): echo '</a>'; endif;

        }
        echo $cellClose;


        echo cellWrapClasses($imageClasses);
        if($secondRowImg){

          if ($secondRowLink):
          $link_url = $secondRowLink['url']; ?>
          <a href="<?php echo esc_url( $link_url ); ?>"><?php endif; ?>
          <img src="<?php echo esc_url($secondRowImg['url']); ?>" alt="<?php echo esc_attr($secondRowImg['alt']); ?>" /><?php
          if ($secondRowLink): echo '</a>'; endif;

        }
        echo $cellClose;


        echo cellWrapClasses($imageClasses);
        if($thirdRowImg){

          if ($thirdRowLink):
          $link_url = $thirdRowLink['url']; ?>
          <a href="<?php echo esc_url( $link_url ); ?>"><?php endif; ?>
          <img src="<?php echo esc_url($thirdRowImg['url']); ?>" alt="<?php echo esc_attr($thirdRowImg['alt']); ?>" /><?php
          if ($thirdRowLink): echo '</a>'; endif;

        }
        echo $cellClose;

      endif;
      // End Images

      // Checking if any titles exist, if so cellWrap needs to execute all three times regardless of if the cell is populated
      if (($firstRowTitle) or ($secondRowTitle) or ($thirdRowTitle)) :

        echo cellWrapClasses($titleClasses);
        if($firstRowTitle){

          if ($firstRowLink):
          $link_url = $firstRowLink['url']; ?>
          <a href="<?php echo esc_url( $link_url ); ?>"><?php endif;
              echo '<h3>' . $firstRowTitle . '</h3>';
          if ($firstRowLink): echo '</a>'; endif;

        }
        echo $cellClose;


        echo cellWrapClasses($titleClasses);
        if($secondRowTitle){

          if ($secondRowLink):
            $link_url = $secondRowLink['url']; ?>
            <a href="<?php echo esc_url( $link_url ); ?>"><?php endif;
            echo '<h3>' . $secondRowTitle . '</h3>';
          if ($secondRowLink): echo '</a>'; endif;

        }
        echo $cellClose;


        echo cellWrapClasses($titleClasses);
        if($thirdRowTitle){

          if ($thirdRowLink):
            $link_url = $thirdRowLink['url']; ?>
            <a href="<?php echo esc_url( $link_url ); ?>"><?php endif;
              echo '<h3>' . $thirdRowTitle . '</h3>';
          if ($thirdRowLink): echo '</a>'; endif;

        }
        echo $cellClose;


      endif;
      // End titles

      // Checking if any text exists, if so cellWrap needs to execute all three times regardless of if the cell is populated
      if (($firstRowText) or ($secondRowText) or ($thirdRowText)) :

        echo cellWrapClasses($textClasses);
          if ($firstRowText):
              echo $firstRowText;
          endif;
        echo $cellClose;


        echo cellWrapClasses($textClasses);
          if ($secondRowText):
              echo $secondRowText;
          endif;
        echo $cellClose;


        echo cellWrapClasses($textClasses);
          if ($thirdRowText):
              echo $thirdRowText;
          endif;
        echo $cellClose;

      endif;
      // End text

      // Checking if any buttons exist, if so cellWrap needs to execute all three times regardless of if the cell is populated
      if(get_sub_field('grid_content_enable_buttons')):
        if (($firstRowLink) or ($secondRowLink) or ($thirdRowLink)) :

          echo cellWrapClasses($buttonClasses);

          if( $firstRowLink ):
              $link_url = $firstRowLink['url'];
              $link_title = $firstRowLink['title'];
              $link_target = $firstRowLink['target'] ? $firstRowLink['target'] : '_self';
              ?>

              <a class="button" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
          <?php endif;

          echo $cellClose;


          echo cellWrapClasses($buttonClasses);

          if( $secondRowLink ):
              $link_url = $secondRowLink['url'];
              $link_title = $secondRowLink['title'];
              $link_target = $secondRowLink['target'] ? $secondRowLink['target'] : '_self';
              ?>

              <a class="button" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
          <?php endif;

          echo $cellClose;


          echo cellWrapClasses($buttonClasses);

          if( $thirdRowLink ):
              $link_url = $thirdRowLink['url'];
              $link_title = $thirdRowLink['title'];
              $link_target = $thirdRowLink['target'] ? $thirdRowLink['target'] : '_self';
              ?>

              <a class="button" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
          <?php endif;

          echo $cellClose;


        endif;
      endif;
      // End buttons

      $currentLoop++;


    endwhile;

      ?>

    </div>
  </div>
</section>

<?php //mobile ?>

<section class="<?php echo get_section_class(); ?> py-3 d-block d-md-none">
  <div class="container">
    <div class="row">
    <?php

    $rowLoopsMob = floor($rowNumb / 2) + 1;
    $currentLoop = 0;

    while($currentLoop < $rowLoops):

      $firstRowNumb = $currentLoop * 2;
      $secondRowNumb = $currentLoop * 2 + 1;

      $firstRow = '';
      $secondRow = '';

      $firstRowImg = '';
      $secondRowImg = '';

      $firstRowTitle = '';
      $secondRowTitle = '';

      $firstRowLink = '';
      $secondRowLink = '';

      $firstRowText = '';
      $secondRowText = '';

      if(array_key_exists($firstRowNumb, $rows)):
        $firstRow = $rows[$firstRowNumb];
        $firstRowImg = $firstRow['grid_content_repeater_image'];
        $firstRowTitle = $firstRow['grid_content_repeater_title'];
        $firstRowLink = $firstRow['grid_content_repeater_link'];
        $firstRowText = $firstRow['grid_content_repeater_text'];
      endif;
      if(array_key_exists($secondRowNumb, $rows)):
        $secondRow = $rows[$secondRowNumb];
        $secondRowImg = $secondRow['grid_content_repeater_image'];
        $secondRowTitle = $secondRow['grid_content_repeater_title'];
        $secondRowLink = $secondRow['grid_content_repeater_link'];
        $secondRowText = $secondRow['grid_content_repeater_text'];
      endif;


      // Checking if any images exist, if so cellWrap needs to execute all twice regardless of if the cell is populated
      if (($firstRowImg) or ($secondRowImg)):

        echo cellWrapClasses($imageClasses);
        if($firstRowImg){

          if ($firstRowLink):
          $link_url = $firstRowLink['url']; ?>
          <a href="<?php echo esc_url( $link_url ); ?>"><?php endif; ?>
          <img src="<?php echo esc_url($firstRowImg['url']); ?>" alt="<?php echo esc_attr($firstRowImg['alt']); ?>" /><?php
          if ($firstRowLink): echo '</a>'; endif;

        }
        echo $cellClose;


        echo cellWrapClasses($imageClasses);
        if($secondRowImg){

          if ($secondRowLink):
          $link_url = $secondRowLink['url']; ?>
          <a href="<?php echo esc_url( $link_url ); ?>"><?php endif; ?>
          <img src="<?php echo esc_url($secondRowImg['url']); ?>" alt="<?php echo esc_attr($secondRowImg['alt']); ?>" /><?php
          if ($secondRowLink): echo '</a>'; endif;

        }
        echo $cellClose;

      endif;
      // End Images

      // Checking if any titles exist, if so cellWrap needs to execute all twice regardless of if the cell is populated
      if (($firstRowTitle) or ($secondRowTitle)) :

        echo cellWrapClasses($titleClasses);
        if($firstRowTitle){

          if ($firstRowLink):
          $link_url = $firstRowLink['url']; ?>
          <a href="<?php echo esc_url( $link_url ); ?>"><?php endif;
              echo '<h3>' . $firstRowTitle . '</h3>';
          if ($firstRowLink): echo '</a>'; endif;

        }
        echo $cellClose;


        echo cellWrapClasses($titleClasses);
        if($secondRowTitle){

          if ($secondRowLink):
            $link_url = $secondRowLink['url']; ?>
            <a href="<?php echo esc_url( $link_url ); ?>"><?php endif;
            echo '<h3>' . $secondRowTitle . '</h3>';
          if ($secondRowLink): echo '</a>'; endif;

        }
        echo $cellClose;

      endif;

      // Checking if any text  exist, if so cellWrap needs to execute all twice regardless of if the cell is populated
      if (($firstRowText) or ($secondRowText)) :

        echo cellWrapClasses($textClasses);
          if ($firstRowText):
              echo $firstRowText;
          endif;
        echo $cellClose;


        echo cellWrapClasses($textClasses);
          if ($secondRowText):
              echo $secondRowText;
          endif;
        echo $cellClose;

      endif;
      // End titles

      // Checking if any buttons exist, if so cellWrap needs to execute all twice regardless of if the cell is populated
      if(get_sub_field('grid_content_enable_buttons')):
        if (($firstRowLink) or ($secondRowLink)):

          echo cellWrapClasses($buttonClasses);

          if( $firstRowLink ):
              $link_url = $firstRowLink['url'];
              $link_title = $firstRowLink['title'];
              $link_target = $firstRowLink['target'] ? $firstRowLink['target'] : '_self';
              ?>

              <a class="button" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
          <?php endif;

          echo $cellClose;


          echo cellWrapClasses($buttonClasses);

          if( $secondRowLink ):
              $link_url = $secondRowLink['url'];
              $link_title = $secondRowLink['title'];
              $link_target = $secondRowLink['target'] ? $secondRowLink['target'] : '_self';
              ?>

              <a class="button" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
          <?php endif;

          echo $cellClose;

        endif;
      endif;
      // End buttons

      $currentLoop++;


    endwhile;

      ?>

    </div>
  </div>
</section>
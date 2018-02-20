<?php
  $title = get_sub_field('title');
  $copy = get_sub_field('copy');
?>

<div class="content-block section-<?php echo get_row_layout(); ?>">
  <div class="content-inner">

    <div class="copy">
      <?php
        if ($title) :
          printf('<h2 class="title">%s</h2>', $title);
        endif;

        if ($copy) :
          echo $copy;
        endif;
      ?>
    </div>

  </div>
</div>

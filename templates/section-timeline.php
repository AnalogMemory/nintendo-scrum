<?php
  $vertical_title = get_sub_field('vertical_title');
?>

<div class="content-block section-<?php echo get_row_layout(); ?>">
  <div class="content-inner">

  <?php
    if ($vertical_title) :
      printf(__('<h2 class="title-vertical title-vertical-right"><span>%s</span></h2>', 'ntsp'),
        $vertical_title);
    endif;
  ?>

  <?php if (have_rows('timeline')) : ?>
    <ul class="timeline">
      <?php while (have_rows('timeline')) : the_row(); ?>
        <?php
          $title = get_sub_field('title');
          $copy = get_sub_field('copy');
          $start_date = get_sub_field('start_date');
          $end_date = get_sub_field('end_date');
        ?>
        <li data-scroll="addHeight">

          <div class="dates">
            <?php
              $separator = $end_date ? '&#8239;&ndash;&#8239;' : '';
              if ($start_date) :
                printf(__('<span>%s%s</span>', 'ntsp'),
                  $start_date,
                  $separator
                );
              endif;
              if ($end_date) :
                printf(__('<span>%s</span>', 'ntsp'), $end_date);
              endif;
            ?>
          </div>

          <div class="info">
            <?php
              if ($title) :
                printf(__('<h3 class="title-timeline">%s</h3>', 'ntsp'), $title);
              endif;
              if ($copy) :
                printf(__('<p>%s</h3>', 'ntsp'), $copy);
              endif;
            ?>
          </div>

        </li>
      <?php endwhile; ?>
    </div>
  <?php endif; ?>

  </div>
</div>

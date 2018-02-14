<?php
  $title = get_sub_field('title');
?>

<section class="content-block section-<?php echo get_row_layout(); ?>">
  <div class="content-inner">

    <?php
      if ($title) :
        printf(__('<div class="copy"><h2 class="title">%s</h2></div>', 'ntsp'), $title);
      endif;
    ?>

    <?php if (have_rows('grid_items')) : ?>
      <div class="grid-items">
        <div class="row">
          <?php while (have_rows('grid_items')) : the_row(); ?>
            <?php $image = get_sub_field('image') ?>
            <div class="item">
              <a href="<?php the_sub_field('link') ?>" 
                target="_blank" 
                class="image"
                title="<?php the_sub_field('title') ?>">
                <img src="<?php echo $image['sizes']['medium']; ?>" alt="" />
              </a>
            </div>
          <?php endwhile; ?>
        </div>
      </div>
    <?php endif; ?>

  </div>
</section>

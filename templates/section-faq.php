<section class="content-block section-<?php echo get_row_layout(); ?>">
  <div class="content-inner">

    <?php if (have_rows('faqs')) : ?>
      <div class="faqs">
        <?php while (have_rows('faqs')) : the_row(); ?>
          <div class="item">
            <div class="copy">
              <h4><?php the_sub_field('question') ?></h4>
              <p><?php the_sub_field('answer') ?></p>
            </div>
          </div>
        <?php endwhile; ?>
      </div>
    <?php endif; ?>

  </div>
</section>

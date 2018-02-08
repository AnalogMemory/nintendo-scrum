<?php
/**
 * The template for displaying social icons.
 *
 */

global $images;

?>

<?php if (have_rows('social_media', 'option')) : ?>

  <div class="row center-xs">
    <ul class="social col-xs">
      <?php while (have_rows('social_media', 'option')) : the_row(); ?>
        <li>
          <a target="_blank" href="<?php the_sub_field('link'); ?>" title="<?php the_sub_field('type'); ?>">
            <?php echo $images->inlineSvg('icon-' . strtolower(get_sub_field('type')) . '.svg'); ?>
          </a>
        </li>
      <?php endwhile; ?>
    </ul>
  </div>

<?php endif; ?>

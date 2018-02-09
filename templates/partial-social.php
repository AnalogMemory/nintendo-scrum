<?php
/**
 * The template for displaying social icons.
 *
 */

global $images;

?>

<?php if (have_rows('social_media', 'option')) : ?>

  <ul class="social">

    <?php
      while (have_rows('social_media', 'option')) : the_row();

        $link = get_sub_field('link');
        $title = get_sub_field('type');
        $svgIcon = $images->inlineSvg('icon-' . strtolower(get_sub_field('type')) . '.svg');

        printf(__('<li><a href="%s" target="_blank" title="%s">%s</a></li>', 'ntsp'),
          $link, $title, $svgIcon);

      endwhile;
    ?>

  </ul>

<?php endif; ?>

<?php
  $cta_copy = get_sub_field('cta_copy');
  $cta_image = get_sub_field('cta_image');
  $image_effects = get_sub_field('image_effects');
  $image_fill = get_sub_field('image_fill');
  $show_button = get_sub_field('show_button');
  $button_link = get_sub_field('link');
?>

<div class="content-block section-<?php echo get_row_layout(); ?>">
  <div class="content-inner">

  <?php
    if ($cta_image) :
      printf('<div class="image" data-scroll><figure><img src="%s" class="%s" alt="" /></figure></div>',
        $cta_image['sizes']['medium'],
        'object-fit-' . $image_fill
      );
    endif;
  ?>

  <?php if ($cta_copy) : ?>
    <div class="copy">
      <?php
        if ($cta_copy['title']) :
          printf(__('<h2>%s</h2>', 'ntsp'), $cta_copy['title']);
        endif;

        if ($cta_copy['copy']) :
          printf(__('<p>%s</p>', 'ntsp'), $cta_copy['copy']);
        endif;

        if ($show_button) :
          printf('<a href="%s" target="%s" class="button">%s</a>',
            $button_link['url'],
            $button_link['target'],
            $button_link['title']
          );
        endif;

      ?>
      <div class="gradient-bg"></div>
    </div>
  <?php endif; ?>

  </div>
</div>

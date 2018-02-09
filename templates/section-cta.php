<?php
  $cta_copy = get_sub_field('cta_copy');
  $cta_image = get_sub_field('cta_image');
  $show_button = get_sub_field('show_button');
  $button_link = get_sub_field('link');
?>

<div class="content-block section-<?php echo get_row_layout(); ?>">

  <?php
    if ($cta_image) :
      printf(__('<figure class="image" style="background-image: url(%s);"></figure>', 'ntsp'),
        $cta_image['sizes']['medium']);
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
          printf(__('<a href="%s" target="%s">%s</a>', 'ntsp'),
            $button_link['url'],
            $button_link['target'],
            $button_link['title']);
        endif;
      ?>
    </div>
  <?php endif; ?>

</div>

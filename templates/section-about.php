<?php
  $text = get_sub_field('text');
  $image = get_sub_field('image');
  $logo = get_sub_field('logo');
  $image_effects = get_sub_field('image_effects');
  $image_fill = get_sub_field('image_fill');
  $image_position = get_sub_field('image_position');
  $show_button = get_sub_field('show_button');
  $link = get_sub_field('link');
?>

<div class="content-block section-<?php echo get_row_layout(); ?>">
  <div class="content-inner">

  <?php
    if ($image) :
      printf('<div class="image %s" data-scroll><figure><img src="%s" class="%s" alt="" /></figure></div>',
        'image-' . $image_position,
        $image['sizes']['medium'],
        'object-fit-' . $image_fill
      );
    endif;
  ?>

  <?php if ($text) : ?>
    <div class="copy <?php echo 'image-' . $image_position; ?>">
      <?php
        if ($logo) :
          printf('<figure class="about-logo"><img src="%s" alt="" /></figure>',
            $logo['sizes']['medium']
          );
        endif;

        if ($text['title']) :
          printf(__('<h2>%s</h2>', 'ntsp'), $text['title']);
        endif;

        if ($text['copy']) :
          printf(__('<p>%s</p>', 'ntsp'), $text['copy']);
        endif;

        if ($show_button) :
          printf('<a href="%s" target="%s" class="link">%s</a>',
            $link['url'],
            $link['target'],
            $link['title']
          );
        endif;
      ?>
      <div class="gradient-bg"></div>
    </div>
  <?php endif; ?>

  </div>
</div>

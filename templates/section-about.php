<?php
  $about_copy = get_sub_field('text');
  $about_image = get_sub_field('image');
  $about_logo = get_sub_field('logo');
  $show_button = get_sub_field('show_button');
  $button_link = get_sub_field('link');
?>

<div class="content-block section-<?php echo get_row_layout(); ?>">
  <div class="content-inner">

  <?php if ($about_copy) : ?>
    <div class="copy">
      <?php
        if ($about_logo) :
          printf('<figure class="about-logo"><img src="%s" alt="" /></figure>',
            $about_logo['sizes']['medium']);
        endif;

        if ($about_copy['title']) :
          printf(__('<h2>%s</h2>', 'ntsp'), $about_copy['title']);
        endif;

        if ($about_copy['copy']) :
          printf(__('<p>%s</p>', 'ntsp'), $about_copy['copy']);
        endif;

        if ($show_button) :
          printf('<a href="%s" target="%s" class="link">%s</a>',
            $button_link['url'],
            $button_link['target'],
            $button_link['title']
          );
        endif;
      ?>
      <div class="gradient-bg"></div>
    </div>
  <?php endif; ?>

  <?php
    if ($about_image) :
      printf('<div class="image" data-scroll><figure><img src="%s" class="object-fit-cover" alt="" /></figure></div>',
        $about_image['sizes']['medium']);
    endif;
  ?>

  </div>
</div>

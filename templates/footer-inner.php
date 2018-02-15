
<div class="footer-inner">

  <div class="footer-col">

    <?php
      global $images;
      $logoWide = $images->inlineSvg('logo-nst-wide.svg');

      if ($logoWide) :
        printf('<a href="%s" class="footer-logo" title="%s">%s</a>',
          esc_url(get_home_url('/')),
          esc_attr(get_bloginfo('name')),
          $logoWide
        );
      endif;
    ?>

    <?php printf(__('<p class="copyright">%s</p>', 'ntsp'),
      "© " . date('Y') . " " . get_field('copyright_text', 'option')); ?>
  </div>

  <div class="footer-col">

    <?php
      wp_nav_menu(array(
        'theme_location' => 'footer',
        'menu_id' => 'menu-footer',
        'menu_class' => 'menu menu-footer',
        'container' => '',
      ));
    ?>

  </div>

  <div class="footer-col">

    <?php get_template_part('templates/partial', 'social'); ?>

  </div>

</div>

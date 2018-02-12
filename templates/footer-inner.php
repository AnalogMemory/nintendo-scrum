
<div class="footer-inner">

  <div class="footer-col">

    <?php
      global $images;
      $logoCropped = $images->imagePath('logo-nst-cropped.png');
      if ($logoCropped) :
        printf(__('<a href="%s" class="footer-logo" title="%s"><img src="%s" alt="" /></a>', 'ntsp'),
          esc_url(get_home_url('/')),
          esc_attr(get_bloginfo('name')),
          esc_url($logoCropped));
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

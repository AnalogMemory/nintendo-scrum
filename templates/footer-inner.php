<div class="footer-inner">

  <div class="footer-col">

    <a href="#">N+T Logo</a>

    <?php printf(__('<p id="copyright">%s</p>', 'ntsp'),
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

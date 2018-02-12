<?php
/**
 * Site Header / Logo / Navigation
 *
 */

global $images;

?>

<header id="masthead" class="header" role="banner">
  <div class="header-inner">
    <figure class="logo">
      <?php
        $logo = $images->imagePath('logo-nst.png');
        if ($logo) :
          printf(__('<a href="%s" rel="home" title="%s"><img src="%s" alt="" /></a>', 'ntsp'),
            esc_url(get_home_url('/')),
            esc_attr(get_bloginfo('name')),
            esc_url($logo));
        endif;
      ?>
    </figure>

    <nav class="main-navigation" role="navigation">
      <button data-menu="primary-menu" class="ani-menu-icon ani-menu-icon--x">
        <span></span>
      </button>
      <?php
        wp_nav_menu(array(
          'theme_location' => 'primary',
          'menu_id' => 'menu-primary',
          'menu_class' => 'menu menu-primary',
          'container' => NULL,
        ));
      ?>
    </nav>
  </div>
</header>

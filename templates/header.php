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
      <a href="<?php echo esc_url( home_url('/') ); ?>" rel="home" title="<?php bloginfo('name'); ?>">
        <?php echo $images->inlineSvg('logo.svg'); ?>
      </a>
    </figure>

    <nav class="main-navigation" role="navigation">
      <button data-menu="primary-menu" class="ani-menu-icon ani-menu-icon--x">
        <span></span>
      </button>
      <div class="menu-container">
        <?php
          wp_nav_menu(array(
            'theme_location' => 'primary',
            'menu_id' => 'menu-primary',
            'menu_class' => 'menu menu-primary',
            'container' => '',
          ));
        ?>
      </div>
    </nav>
  </div>
</header>

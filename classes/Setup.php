<?php
/**
 * Required Theme Setup
 *
 */

class NST_Theme_Setup {
  public function __construct() {
    add_action('after_setup_theme', array($this, 'init'));
  }

  public function init() {
    add_theme_support('title-tag');

    // Register Menus
    register_nav_menus(
      array(
        'primary' => esc_html__('Primary', 'ntsp'),
        'footer' => esc_html__('Footer', 'ntsp')
      )
    );

    // Add Custom Post Type: Mentors
    $mentors = new PostTypes\PostType('mentor');
    $mentors->icon('dashicons-star-filled');
    $mentors->register();
  }
}

$theme_setup = new NST_Theme_Setup();

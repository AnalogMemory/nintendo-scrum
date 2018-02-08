<?php
/**
 * Class to extend the Advanced Custom Fields plugin
 *
 */

class NST_ACF {
  public function acf_options () {
    if (function_exists('acf_add_options_page')) {
      acf_add_options_page(array(
        'page_title'  => 'Site Options',
        'menu_title'  => 'Options',
        'menu_slug'   => 'site-options',
        'capability'  => 'edit_posts',
        'redirect'    => false
      ));
    }
  }
}

$acf_setup = new NST_ACF();

$acf_setup->acf_options();

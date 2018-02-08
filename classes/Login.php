<?php
/**
 * Creates Custom Login
 *
 */

class NST_Login {
  public function __construct() {
    /* Custom login styles */
    add_action('login_enqueue_scripts', array($this, 'custom_login'));

    /* Changes login logo URL to site url */
    add_filter('login_headerurl', array($this, 'login_logo_url'));

    /* Changes login logo title attribute to site name  */
    add_filter('login_headertitle', array($this, 'login_logo_url_title'));
  }

  public function custom_login() {
    $loginLogoUrl = '';
    $loginLogoRatio = '';
    $loginCss = "
      #login h1 a {
        display: block;
        width: 100%;
        background-image: none;
        background-position: center;
        background-repeat: no-repeat;
        background-size: contain;
        text-align: center;
        overflow: hidden;
        line-height: 1;
        position: relative;
        text-indent: 101%;
        white-space: nowrap;
        margin-top: 1rem;
        height: 0;
        padding: 0 0 $loginLogoRatio%;
        background-image: url('$loginLogoUrl');
      }
    ";
    wp_add_inline_style('custom_login_css', $loginCss);
  }

  public function login_logo_url() {
      return home_url();
  }

  public function login_logo_url_title() {
      return get_bloginfo('name');
  }
}

$custom_login = new NST_Login();

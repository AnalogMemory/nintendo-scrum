<?php
/**
 * Enqueues scripts & styles for Wordpress
 *
 */

class NST_Enqueue_Scripts_Styles {
  public function __construct() {
    add_action('wp_enqueue_scripts', array($this, 'theme_scripts_styles'));
    add_action('admin_init', array($this, 'theme_editor_styles'));
  }

  public function theme_scripts_styles() {
    // Stylesheet
    $styleModifiedAt = filemtime(get_template_directory_uri() . '/public/styles/main.css');
    wp_enqueue_style('styles', get_template_directory_uri() . '/public/styles/main.css', null, $styleModifiedAt, 'all');

    // Javascript
    $jsModifiedAt = filemtime(get_template_directory_uri() . '/public/scripts/main.js');
    wp_deregister_script('jquery');
    wp_register_script('application', get_template_directory_uri() . '/public/scripts/main.js', null, $jsModifiedAt, true);
    wp_localize_script('application', 'ajax_params', array('ajax_url' => admin_url('admin-ajax.php'),
                                                           'nonce' => wp_create_nonce('form_submission')));
    wp_enqueue_script('application');
  }

  public function theme_editor_styles() {
    add_editor_style(get_template_directory_uri() . '/public/styles/editor.css');
  }
}

$enqueueScriptsStyles = new NST_Enqueue_Scripts_Styles();

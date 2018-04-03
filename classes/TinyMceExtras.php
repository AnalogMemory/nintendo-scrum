<?php
/**
 * Adds extra format options for TinyMCE editor
 *
 */

class NST_TinyMCEExtras {
  public function __construct() {
    // Adds Extra TinyMCE Formats
    add_filter('mce_buttons_2', array($this, 'nst_extra_mce_buttons'));
    add_filter('tiny_mce_before_init', array($this, 'nst_extra_mce_before_init'));
  }

  function nst_extra_mce_buttons($buttons) {
    array_push($buttons, 'styleselect');
    return $buttons;
  }

  function nst_extra_mce_before_init($settings) {
    $style_formats = array(
      array(
        'title' => 'Text - No Break',
        'inline' => 'span',
        'classes' => 'nobreak'
      )
    );

    $style_settings = json_decode($settings['style_formats'], true);

    foreach ($style_formats as $s) {
      array_push($style_settings, $s);
    }
    $settings['style_formats'] = json_encode($style_settings);

    return $settings;
  }
}

$NST_TinyMCEExtras = new NST_TinyMCEExtras();


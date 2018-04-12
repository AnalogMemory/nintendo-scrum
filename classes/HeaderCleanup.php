<?php
/**
 * Cleanup header output
 *
 */

class NST_Header_Cleanup {
  public function __construct() {
    $this->cleanup();

    // Remove All Yoast HTML Comments
    add_action('wp_head', array($this, 'remove_yoast_comments'), ~PHP_INT_MAX);
  }

  public function cleanup() {
    // Removes WordPress Generator Meta Tag
    remove_action('wp_head', 'wp_generator');

    // Removes EditURI/RSD (Really Simple Discovery) link.
    remove_action('wp_head', 'rsd_link');

    // Removes wlwmanifest (Windows Live Writer) link.
    remove_action('wp_head', 'wlwmanifest_link');

    // Removes shortlink.
    remove_action('wp_head', 'wp_shortlink_wp_head');

    //removes comment feed links
    remove_action('wp_head', 'feed_links_extra', 3);

    // Removes Emoji Scripts/styles
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('admin_print_styles', 'print_emoji_styles');

    // Turn off oEmbed auto discovery.
    // Don't filter oEmbed results.
    remove_filter('oembed_dataparse', 'wp_filter_oembed_result', 10);
    remove_action('wp_head', 'wp_oembed_add_discovery_links');
    remove_action('wp_head', 'wp_oembed_add_host_js');
  }

  public function remove_yoast_comments() {
    ob_start(function($o) {
      return preg_replace('/^\n?<!--.*?[Y]oast.*?-->\n?$/mi', '', $o);
    });
  }
}

$head_cleanup = new NST_Header_Cleanup();

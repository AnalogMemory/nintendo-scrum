<?php
/**
 * Sets admin options
 *
 */

class NST_Admin_Customized {
  public function __construct() {
    /* Remove Items from Admin Bar */
    add_action('wp_before_admin_bar_render', array($this, 'remove_admin_bar_items'));

    /* Disables Dashboard Widgets */
    add_action('wp_dashboard_setup', array($this, 'remove_dashboard_widgets'));

    // Allow Editors to see Appearance
    add_action('admin_head', array($this, 'hide_items_for_editors'));

    /* Hide unneeded admin menu items */
    add_action('admin_menu', array($this, 'hide_admin_menu_items'));

    /* Changes Admin Footer Text */
    add_filter('admin_footer_text', array($this, 'admin_footer_text'));

    /* Allow SVG files to be uploaded in media library */
    add_filter('upload_mimes', array($this, 'svg_mime_types'));

    /* Admin favicon for login/admin */
    add_action('login_head', array($this, 'add_admin_favicon'));
    add_action('admin_head', array($this, 'add_admin_favicon'));

    // Removes Admin Bar for All
    add_filter('show_admin_bar', '__return_false');

    /* Yoast SEO Plugin Related Fixes  */
    add_filter('wpseo_metabox_prio', array($this, 'wpseo_priority'));
    add_action('wp_dashboard_setup', array($this, 'remove_wpseo_dashboard_overview'));
  }

  public function admin_footer_text() {
    echo '';
  }

  public function remove_dashboard_widgets() {
    global $wp_meta_boxes;
    // Remove Welcome Panel
    remove_action('welcome_panel', 'wp_welcome_panel');
    // Hide Default Widgets (except 'At A Glance')
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_activity']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_drafts']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);
    // Yoast SEO
    unset($wp_meta_boxes['dashboard']['normal']['core']['wpseo-dashboard-overview']);
  }

  // Disables SEO Box from Dashboard
  public function remove_wpseo_dashboard_overview() {
    remove_meta_box('wpseo-dashboard-overview', 'dashboard', 'side');
  }

  public function remove_admin_bar_items() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('wp-logo');
    $wp_admin_bar->remove_menu('comments');
    $wp_admin_bar->remove_menu('wpseo-menu');
  }

  public function hide_admin_menu_items() {
    // Remove comments
    remove_menu_page('edit-comments.php');
  }

  public function hide_items_for_editors() {
    // Allow Editors to see Appearance
    $editor_role = get_role('editor');
    $editor_role->add_cap('edit_theme_options');

    // If editors can see Appearance
    // Hide Theme page
    remove_submenu_page('themes.php', 'themes.php');
    // Hide Widgets page
    remove_submenu_page('themes.php', 'widgets.php');
    // Hide Customizer page
    global $submenu;
    unset($submenu['themes.php'][6]);
  }

  public function svg_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    $mimes['svgz'] = 'image/svg+xml';
    return $mimes;
  }

  public function add_admin_favicon() {
    $favicon_path = '/public/images/favicon.png';
    if (file_exists(get_template_directory($favicon_path))) {
      echo '<link rel="shortcut icon" href="' . get_template_directory_uri() . $favicon_path . '" />';
    }
  }

  // Puts Yoast SEO Metabox at the bottom of page
  public function wpseo_priority() {
    return 'low';
  }
}

$admin_customized = new NST_Admin_Customized();

<?php
/**
 * Theme functions
 *
 */

/**
 * Custom PostsTypes Class
 */
require get_template_directory() . '/classes/PostTypes.php';

/**
 * WordPress Setup
 */
require get_template_directory() . '/classes/Setup.php';

/**
 * Admin Customizations
 */
require get_template_directory() . '/classes/AdminCustomized.php';

/**
 * Enqueue scripts and styles
 */
require get_template_directory() . '/classes/EnqueueScriptsStyles.php';

/**
 * Cleanup header output
 */
require get_template_directory() . '/classes/HeaderCleanup.php';

/**
 * Extends Advanced Custom Fields plugin
 */
require get_template_directory() . '/classes/ACF.php';

/**
 * Image Paths
 */
require get_template_directory() . '/classes/Images.php';

/**
 * Custom Login Screen
 */
require get_template_directory() . '/classes/Login.php';

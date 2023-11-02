<?php

/**
 * JobScout functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package JobScout
 */

$jobscout_theme_data = wp_get_theme();
if (!defined('JOBSCOUT_THEME_VERSION')) define('JOBSCOUT_THEME_VERSION', $jobscout_theme_data->get('Version'));
if (!defined('JOBSCOUT_THEME_NAME')) define('JOBSCOUT_THEME_NAME', $jobscout_theme_data->get('Name'));

/**
 * Implement Local Font Method functions.
 */
require get_template_directory() . '/inc/class-webfont-loader.php';

/**
 * Custom Functions.
 */
require get_template_directory() . '/inc/custom-functions.php';

/**
 * Standalone Functions.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Template Functions.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Custom functions for selective refresh.
 */
require get_template_directory() . '/inc/partials.php';

if (jobscout_is_rara_theme_companion_activated()) :
	/**
	 * Modify filter hooks of RTC plugin.
	 */
	require get_template_directory() . '/inc/rtc-filters.php';
endif;

/**
 * Custom Controls
 */
require get_template_directory() . '/inc/custom-controls/custom-control.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer/customizer.php';

/**
 * Widgets
 */
require get_template_directory() . '/inc/widgets.php';

/**
 * Metabox
 */
require get_template_directory() . '/inc/metabox.php';

/**
 * Getting Started
 */
require get_template_directory() . '/inc/getting-started/getting-started.php';

/**
 * Plugin Recommendation
 */
require get_template_directory() . '/inc/tgmpa/recommended-plugins.php';

/**
 * Add theme compatibility function for woocommerce if active
 */
if (jobscout_is_woocommerce_activated()) {
	require get_template_directory() . '/inc/woocommerce-functions.php';
}

/**
 * Modify filter hooks of WP Job Manager plugin.
 */
if (jobscout_is_wp_job_manager_activated()) :
	require get_template_directory() . '/inc/wp-job-manager-filters.php';
endif;

// Function to enqueue Bootstrap CSS
function enqueue_bootstrap_css()
{
	wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css', array(), '5.2.3', 'all');
}
add_action('wp_enqueue_scripts', 'enqueue_bootstrap_css');

// Function to enqueue Bootstrap JavaScript
function enqueue_bootstrap_js()
{
	wp_enqueue_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js', array('jquery'), '5.2.3', true);
}
add_action('wp_enqueue_scripts', 'enqueue_bootstrap_js');

// Function to enqueue Font Awesome CSS
function enqueue_font_awesome_css()
{
	wp_enqueue_style('font-awesome-css', 'https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css', array(), '6.2.1', 'all');
}
add_action('wp_enqueue_scripts', 'enqueue_font_awesome_css');

// Function to enqueue Font Awesome CSS
function enqueue_custom_style()
{
	wp_enqueue_style('custom-style', get_template_directory_uri() . '/css/style.css', array(), '1.0', 'all');
	wp_enqueue_style('custom-style-topic-1', get_template_directory_uri() . '/css/style-topic-1.css', array(), '1.0', 'all');
	wp_enqueue_style('custom-style-topic-2', get_template_directory_uri() . '/css/style-topic-2.css', array(), '1.0', 'all');
	wp_enqueue_style('custom-style-topic-3', get_template_directory_uri() . '/css/style-topic-3.css', array(), '1.0', 'all');
	wp_enqueue_style('custom-style-topic-4', get_template_directory_uri() . '/css/style-topic-4.css', array(), '1.0', 'all');
	wp_enqueue_style('custom-style-topic-5', get_template_directory_uri() . '/css/style-topic-5.css', array(), '1.0', 'all');
}
add_action('wp_enqueue_scripts', 'enqueue_custom_style');

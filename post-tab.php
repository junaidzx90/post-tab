<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://www.fiverr.com/junaidzx90
 * @since             1.0.0
 * @package           Post_Tab
 *
 * @wordpress-plugin
 * Plugin Name:       Post tab
 * Plugin URI:        https://www.fiverr.com/
 * Description:		  Use this shortcode [post_tab urls=" "], All the URLs should need to pass in the "URLs" parameter with the comma for a separate URL.
 * Version:           1.0.0
 * Author:            Md Junayed
 * Author URI:        https://www.fiverr.com/junaidzx90
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       post-tab
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'POST_TAB_VERSION', '1.0.1' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-post-tab-activator.php
 */
function activate_post_tab() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-post-tab-activator.php';
	Post_Tab_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-post-tab-deactivator.php
 */
function deactivate_post_tab() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-post-tab-deactivator.php';
	Post_Tab_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_post_tab' );
register_deactivation_hook( __FILE__, 'deactivate_post_tab' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-post-tab.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_post_tab() {

	$plugin = new Post_Tab();
	$plugin->run();

}
run_post_tab();

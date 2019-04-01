<?php
/**
 * Plugin Name: AgriLife Genesis Links
 * Plugin URI: https://github.com/AgriLife/AgriLife-Genesis-Links-Plugin
 * Description: Required links in the header and footer for AgriLife websites
 * Version: 1.2.5
 * Author: Zach Watkins
 * Author URI: https://github.com/ZachWatkins
 * Author Email: zachary.watkins@ag.tamu.edu
 * License: GPL2+
**/

// If this file is called directly, abort.
defined( 'ABSPATH' ) or die( 'access denied' );

define( 'AGL_DIRNAME', 'agrilife-genesis-links' );
define( 'AGL_DIR_PATH', plugin_dir_path( __FILE__ ) );
define( 'AGL_DIR_URL', plugin_dir_url( __FILE__ ) );
define( 'AGL_DIR_FILE', __FILE__ );
define( 'AGL_THEME_NAME', strtolower( str_replace( ' ', '', wp_get_theme()->get('Name') ) ) );

// Load the plugin assets
add_action( 'genesis_init', function(){

	require_once AGL_DIR_PATH . 'includes/Settings.php';
	$agl_settings = new AGL_Settings( AGL_DIR_PATH );

	require_once AGL_DIR_PATH . 'includes/RequiredDOM.php';
	$arl_DOM = new RequiredDOM;

});

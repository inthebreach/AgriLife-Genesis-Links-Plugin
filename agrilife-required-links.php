<?php
/**
 * Plugin Name: AgriLife Required Links
 * Plugin URI: https://github.com/AgriLife/agrilife-required-links
 * Description: Required links in the header and footer for AgriLife websites
 * Version: 1.0
 * Author: Zach Watkins
 * Author URI: https://github.com/ZachWatkins
 * Author Email: zachary.watkins@ag.tamu.edu
 * License: GPL2+
**/

// If this file is called directly, abort.
defined( 'ABSPATH' ) or die( 'access denied' );

define( 'ARL_DIRNAME', 'agrilife-required-links' );
define( 'ARL_DIR_PATH', plugin_dir_path( __FILE__ ) );
define( 'ARL_DIR_URL', plugin_dir_url( __FILE__ ) );
define( 'ARL_DIR_FILE', __FILE__ );

// Load the plugin assets
require_once plugin_dir_path( __FILE__ ) . 'includes/RequiredDOM.php';
$arl_DOM = new RequiredDOM;

?>
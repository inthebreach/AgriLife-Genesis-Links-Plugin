<?php
/**
 * Plugin Name: AgriLife Genesis Links
 * Plugin URI: https://github.com/AgriLife/AgriLife-Genesis-Links-Plugin
 * Description: Required links in the header and footer for AgriLife websites
 * Version: 1.0
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

class AGL_Settings {

	private $plugin_path;

	private $wpsf = null;

	public function __construct(){

		// Save the plugin path
		$this->plugin_path = plugin_dir_path( __FILE__ );

		// Include and create a new WordPressSettingsFramework
		require_once( $this->plugin_path . 'vendor/wp-settings-framework.php' );
		$this->wpsf = new WordPressSettingsFramework( $this->plugin_path . 'settings/req-links.php', 'agl_req_links' );

		// Add admin menu
		add_action( 'admin_menu', array( $this, 'add_settings_page' ), 20 );

	}

	public function add_settings_page(){

		$this->wpsf->add_settings_page( array(
			'parent_slug' => 'options-general.php',
			'page_slug' => 'agrilife-links',
			'page_title'  => __( 'AgriLife Links', 'agl' ),
			'menu_title'  => __( 'AgriLife Links', 'agl' ),
			'capability'  => 'install_plugins',
		) );

	}

}

$agl_settings = new AGL_Settings();

// Load the plugin assets
require_once AGL_DIR_PATH . 'includes/RequiredDOM.php';
$arl_DOM = new RequiredDOM;

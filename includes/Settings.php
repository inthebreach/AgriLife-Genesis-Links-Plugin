<?php

class AGL_Settings {

	private $plugin_path;

	private $wpsf = null;

	public function __construct($plugin_path){

		// Save the plugin path
		$this->plugin_path = $plugin_path;

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

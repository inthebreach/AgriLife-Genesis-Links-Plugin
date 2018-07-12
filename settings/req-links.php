<?php

add_filter( 'wpsf_register_settings_agl_req_links', 'wpsf_agl_settings' );

function wpsf_agl_settings( $wpsf_settings ){

	$wpsf_settings[] = array(
		'section_id' => 'general',
		'section_title' => 'Enable or Disable Required Content Sections',
		'section_description' => '',
		'section_order' => 10,
		'fields' => array(
			array(
				'id' => 'agencies',
				'title' => 'Agency Links',
				'desc' => '',
				'type' => 'select',
				'default' => 'header',
				'choices' => array(
					'none' => 'None',
					'header' => 'Header',
					'pre_footer' => 'Before Footer'
				)
			),
			array(
				'id' => 'university_links',
				'title' => 'University Links',
				'desc' => '',
				'type' => 'select',
				'default' => 'footer',
				'choices' => array(
					'none' => 'None',
					'footer' => 'Footer'
				)
			),
		),
	);

	return $wpsf_settings;

}

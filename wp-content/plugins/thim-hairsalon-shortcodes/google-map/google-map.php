<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Include template
 */
include_once "tpl/default.php";


/**
 * Mapping shortcodes
 */
function thim_vc_map_google_map() {
	// Mapping shortcode Google Map
	vc_map(
		array(
			'name'                    => esc_html__( 'Thim Google Map', 'hairsalon' ),
			'base'                    => 'thim-google-map',
			'category'                => esc_html__( 'Thim Shortcodes', 'hairsalon' ),
			'description'             => esc_html__( 'Display Google map.', 'hairsalon' ),
			'controls'                => 'full',
			'show_settings_on_create' => true,
			'params'                  => array(
				// Map center
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__( 'Map center', 'hairsalon' ),
					'param_name'  => 'map_center',
					'admin_label' => true,
					'value'       => esc_html__( 'Boston, United States', 'hairsalon' ),
					'description' => esc_html__( 'The name of a place, town, city, or even a country. Can be an exact address too.', 'hairsalon' ),

				),
				// API
				array(
					'type'        => 'textfield',
					'admin_label' => true,
					'heading'     => esc_html__( 'Google Map API Key', 'hairsalon' ),
					'param_name'  => 'api_key',
					'description' => sprintf( 'Enter your Google Map API Key. <a href="%1$s" target="_blank" >Get an API Key</a>', esc_url( 'https://developers.google.com/maps/documentation/javascript/get-api-key#get-an-api-key' ) )
				),
				// Map height
				array(
					'type'        => 'number',
					'admin_label' => true,
					'heading'     => esc_html__( 'Height', 'hairsalon' ),
					'param_name'  => 'height',
					'min'         => 0,
					'value'       => 480,
					'suffix'      => 'px',
					'description' => esc_html__( 'Height of the map.', 'hairsalon' ),
				),

				// Zoom options
				array(
					'type'        => 'number',
					'admin_label' => true,
					'heading'     => esc_html__( 'Zoom level', 'hairsalon' ),
					'param_name'  => 'zoom',
					'min'         => 0,
					'max'         => 21,
					'value'       => 12,
					'description' => esc_html__( 'A value from 0 (the world) to 21 (street level).', 'hairsalon' ),
				),

				// Show marker
				array(
					'type'        => 'checkbox',
					'heading'     => esc_html__( 'Marker', 'hairsalon' ),
					'param_name'  => 'marker_at_center',
					'description' => esc_html__( 'Show marker at map center.', 'hairsalon' ),
				),

				// Get marker
				array(
					'type'        => 'attach_image',
					'heading'     => esc_html__( 'Choose marker icon', 'hairsalon' ),
					'param_name'  => 'marker_icon',
					'admin_label' => true,
					'value'       => '',
					'description' => esc_html__( 'Replaces the default map marker with your own image.', 'hairsalon' ),
					'dependency'  => array( 'element' => 'marker_at_center', 'value' => array( 'true' ) )
				),

				// Other options
				array(
					'type'        => 'checkbox',
					'heading'     => esc_html__( 'Scroll to zoom', 'hairsalon' ),
					'param_name'  => 'scroll_zoom',
					'description' => esc_html__( 'Allow scrolling over the map to zoom in or out.', 'hairsalon' ),
				),

				// Other options
				array(
					'type'        => 'checkbox',
					'heading'     => esc_html__( 'Draggable', 'hairsalon' ),
					'param_name'  => 'draggable',
					'description' => esc_html__( 'Allow dragging the map to move it around.', 'hairsalon' ),
				),

				// Cover image
				array(
					'type'        => 'checkbox',
					'heading'     => esc_html__( 'Use Cover', 'hairsalon' ),
					'param_name'  => 'map_cover',
					'description' => esc_html__( 'Show image cover before load google map. (optimzie speed load page)', 'hairsalon' ),
					'value'       => false,
				),

				// Get Cover image
				array(
					'type'        => 'attach_image',
					'heading'     => esc_html__( 'Choose cover image', 'hairsalon' ),
					'param_name'  => 'map_cover_image',
					'admin_label' => true,
					'value'       => '',
					'dependency'  => array( 'element' => 'map_cover', 'value' => array( 'true' ) )
				),

				// Style
				array(
					'type'        => 'dropdown',
					'admin_label' => true,
					'heading'     => esc_html__( 'Map Style', 'hairsalon' ),
					'param_name'  => 'map_style',
					'value'       => array(
						__( 'Default', 'hairsalon' )                 => 'default',
						__( 'Ultra Light with Labels', 'hairsalon' ) => 'light',
					),
				),

				// Extra class
				array(
					'type'        => 'textfield',
					'admin_label' => true,
					'heading'     => esc_html__( 'Extra class', 'hairsalon' ),
					'param_name'  => 'el_class',
					'value'       => '',
					'description' => esc_html__( 'Add extra class name that will be applied to the icon box, and you can use this class for your customizations.', 'hairsalon' ),
				),

			)
		)
	);

}

add_action( 'vc_before_init', 'thim_vc_map_google_map' );

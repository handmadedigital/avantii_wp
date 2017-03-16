<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 * Mapping shortcode
 */
vc_map( array(
	'name'        => esc_attr__( 'Thim Video', 'hairsalon' ),
	'base'        => 'thim-video',
	'category'    => esc_attr__( 'Thim Shortcodes', 'hairsalon' ),
	'description' => esc_attr__( 'Display Video', 'hairsalon' ),
	'params'      => array(
		//Title
		array(
			'type'        => 'textfield',
			'admin_label' => true,
			'heading'     => esc_attr__( 'Title', 'hairsalon' ),
			'param_name'  => 'title',
			'value'       => '',
		),

		// Description
		array(
			'type'        => 'textfield',
			'admin_label' => true,
			'heading'     => esc_attr__( 'Description', 'hairsalon' ),
			'param_name'  => 'description',
			'value'       => '',
		),

		// Cover image
		array(
			'type'        => 'attach_image',
			'admin_label' => true,
			'heading'     => esc_attr__( 'Select cover image', 'hairsalon' ),
			'param_name'  => 'self_poster',
			'value'       => '',
		),

		// Video
		array(
			'type'        => 'textfield',
			'admin_label' => true,
			'heading'     => esc_attr__( 'Video URL', 'hairsalon' ),
			'param_name'  => 'external_video',
			'value'       => '',
			"description" => esc_attr__( "You can to copy a link from Youtube, Vimeo to display it on your site.", 'hairsalon' )
		),

		//Animation
		array(
			"type"        => "dropdown",
			"heading"     => esc_attr__( "Animation", 'hairsalon' ),
			"param_name"  => "css_animation",
			"admin_label" => true,
			"value"       => array(
				esc_attr__( "No", 'hairsalon' )                 => '',
				esc_attr__( "Top to bottom", 'hairsalon' )      => "top-to-bottom",
				esc_attr__( "Bottom to top", 'hairsalon' )      => "bottom-to-top",
				esc_attr__( "Left to right", 'hairsalon' )      => "left-to-right",
				esc_attr__( "Right to left", 'hairsalon' )      => "right-to-left",
				esc_attr__( "Appear from center", 'hairsalon' ) => "appear"
			),
			"description" => esc_attr__( "Select type of animation if you want this element to be animated when it enters into the browsers viewport. Note: Works only in modern browsers.", 'hairsalon' )
		),

		// Extra class
		array(
			'type'        => 'textfield',
			'admin_label' => true,
			'heading'     => esc_attr__( 'Extra class', 'hairsalon' ),
			'param_name'  => 'el_class',
			'value'       => '',
			'description' => esc_attr__( 'Add extra class name that will be applied to the icon box, and you can use this class for your customizations.', 'hairsalon' ),
		),
	)
) );


/**
 * Template
 */
require_once 'tpl/default.php';
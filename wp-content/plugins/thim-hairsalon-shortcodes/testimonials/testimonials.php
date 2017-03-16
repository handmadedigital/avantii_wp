<?php
/**
 * Created by PhpStorm.
 * User: khoapq
 * Date: 8/10/2016
 * Time: 8:59 AM
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Mapping shortcode Testimonials
 */
vc_map( array(
	'name'        => esc_html__( 'Thim Testimonials', 'hairsalon' ),
	'base'        => 'thim-testimonials',
	'category'    => esc_html__( 'Thim Shortcodes', 'hairsalon' ),
	'description' => esc_html__( 'Display testimonials.', 'hairsalon' ),
	'params'      => array(
		// Title
		array(
			'type'        => 'textfield',
			'admin_label' => true,
			'heading'     => esc_html__( 'Block Title', 'hairsalon' ),
			'param_name'  => 'title',
			'description' => esc_html__( 'Write the title for the block.', 'hairsalon' )
		),

//		// Color
//		array(
//			'type'        => 'colorpicker',
//			'admin_label' => true,
//			'heading'     => esc_html__( 'Text Color ', 'hairsalon' ),
//			'param_name'  => 'color',
//			'value'       => '#ffffff',
//			'description' => esc_html__( 'Select the text color.', 'hairsalon' ),
//		),

		// Number post
		array(
			'type'        => 'number',
			'admin_label' => true,
			'heading'     => esc_html__( 'Number posts', 'hairsalon' ),
			'param_name'  => 'number_post',
			'min'         => 1,
			'value'       => 5,
			'description' => esc_html__( 'Number posts display.', 'hairsalon' ),
		),


		// Visible post
		array(
			'type'        => 'number',
			'admin_label' => true,
			'heading'     => esc_html__( 'Item Visible', 'hairsalon' ),
			'param_name'  => 'item_visible',
			'min'         => 1,
			'value'       => 3,
		),

		// Mousewheel Scroll
		array(
			"type"        => "dropdown",
			"heading"     => esc_html__( "Mousewheel Scroll", "hairsalon" ),
			"param_name"  => "mousewheel",
			"admin_label" => true,
			"value"       => array(
				esc_html__( "No", "hairsalon" )  => false,
				esc_html__( "Yes", "hairsalon" ) => true,
			),
		),


		// Background image
		array(
			'type'        => 'attach_image',
			'heading'     => esc_html__( 'Background Image', 'hairsalon' ),
			'param_name'  => 'background_image',
			'admin_label' => true,
			'value'       => '',
		),

		// Animation
		array(
			"type"        => "dropdown",
			"heading"     => esc_html__( "Animation", "hairsalon" ),
			"param_name"  => "css_animation",
			"admin_label" => true,
			"value"       => array(
				esc_html__( "No", "hairsalon" )                 => '',
				esc_html__( "Top to bottom", "hairsalon" )      => "top-to-bottom",
				esc_html__( "Bottom to top", "hairsalon" )      => "bottom-to-top",
				esc_html__( "Left to right", "hairsalon" )      => "left-to-right",
				esc_html__( "Right to left", "hairsalon" )      => "right-to-left",
				esc_html__( "Appear from center", "hairsalon" ) => "appear"
			),
			"description" => esc_html__( "Select type of animation if you want this element to be animated when it enters into the browsers viewport. Note: Works only in modern browsers.", "hairsalon" )
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
) );


/**
 * Template
 */
include_once 'tpl/default.php';
<?php
/**
 * Created by PhpStorm.
 * User: khoapq
 * Date: 8/9/2016
 * Time: 9:34 AM
 */


// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 * Mapping shortcode
 */
vc_map( array(
	'name'        => esc_attr__( 'Thim Textbox', 'hairsalon' ),
	'base'        => 'thim-textbox',
	'category'    => esc_attr__( 'Thim Shortcodes', 'hairsalon' ),
	'description' => esc_attr__( 'Display textbox', 'hairsalon' ),
	'params'      => array(
		//Title
		array(
			'type'        => 'textfield',
			'admin_label' => true,
			'heading'     => esc_attr__( 'Title', 'hairsalon' ),
			'param_name'  => 'title',
			'value'       => '',
		),

		// Content
		array(
			'type'        => 'textarea_html',
			'admin_label' => true,
			'heading'     => esc_attr__( 'Content', 'hairsalon' ),
			'param_name'  => 'content',
			'value'       => '',
		),

		// Background color
		array(
			'type'        => 'colorpicker',
			'heading'     => esc_html__( 'Shortcode Background color', 'hairsalon' ),
			'param_name'  => 'bg_color',
//			'value'       => esc_html__( '', 'hairsalon' ),
			'description' => esc_html__( 'Select a background color', 'hairsalon' ),
		),

		//Use custom or default icon color?
		array(
			'type'        => 'dropdown',
			'admin_label' => true,
			'heading'     => esc_html__( 'Use custom or default icon color?', 'hairsalon' ),
			'param_name'  => 'icon_sc_color',
			'value'       => array(
				esc_html__( 'Gray', 'hairsalon' ) => '',
				esc_html__( 'White', 'hairsalon' )  => 'white',
			),
			
			'description' => esc_html__( 'Allows you can select icon color for heading.', 'hairsalon' )
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
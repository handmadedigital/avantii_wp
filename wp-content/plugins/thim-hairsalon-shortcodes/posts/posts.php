<?php
/**
 * Created by PhpStorm.
 * User: khoapq
 * Date: 8/11/2016
 * Time: 8:37 AM
 */


// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 * Mapping shortcode
 */
vc_map( array(
	'name'        => esc_attr__( 'Thim Posts', 'hairsalon' ),
	'base'        => 'thim-posts',
	'category'    => esc_attr__( 'Thim Shortcodes', 'hairsalon' ),
	'description' => esc_attr__( 'Display posts', 'hairsalon' ),
	'params'      => array(
		// Posts number
		array(
			"type"        => "number",
			"heading"     => esc_attr__( "Number posts", 'hairsalon' ),
			"param_name"  => "post_limit",
			"admin_label" => true,
			'value'       => 3,
			'description' => esc_attr__( 'Number posts to display.', 'hairsalon' ),
		),
		// Columns
		array(
			"type"        => "number",
			"heading"     => esc_attr__( "Columns", 'hairsalon' ),
			"param_name"  => "post_column",
			"admin_label" => true,
			'value'       => 3,
			'description' => esc_attr__( 'Number columns', 'hairsalon' ),
		),
		// Display button?
		array(
			'type'        => 'checkbox',
			'admin_label' => true,
			'heading'     => esc_html__( 'Hide button Read more?', 'hairsalon' ),
			'param_name'  => 'post_button',
//			'value'       => array( esc_html__( '', 'hairsalon' ) => 'yes' ),
			'description' => esc_html__( 'Tick it to hide the icon after description.', 'hairsalon' ),
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
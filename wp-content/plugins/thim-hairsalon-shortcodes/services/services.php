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
	'name'        => esc_attr__( 'Thim Services', 'hairsalon' ),
	'base'        => 'thim-services',
	'category'    => esc_attr__( 'Thim Shortcodes', 'hairsalon' ),
	'description' => esc_attr__( 'Display list of services.', 'hairsalon' ),
	'params'      => array(
		//Title
		array(
			'type'        => 'textfield',
			'admin_label' => true,
			'heading'     => esc_attr__( 'Service Title', 'hairsalon' ),
			'param_name'  => 'title',
			'value'       => '',
			'description' => esc_attr__( 'Write the title for the heading.', 'hairsalon' )
		),

		// items
		array(
			'type'       => 'param_group',
			'value'      => '',
			'param_name' => 'items',
			'params'     => array(
				array(
					'type'       => 'textfield',
					'value'      => '',
					'heading'    => esc_attr__( 'Service name', 'hairsalon' ),
					'param_name' => 'name',
				),
				array(
					'type'       => 'textfield',
					'value'      => '',
					'heading'    => esc_attr__( 'Price', 'hairsalon' ),
					'param_name' => 'price',
				),
			)
		),

		array(
			"type"        => "dropdown",
			"heading"     => esc_attr__( "Background Image", 'hairsalon' ),
			"param_name"  => "background_image",
			"admin_label" => true,
			"value"       => array(
				esc_attr__( "Use 1 image", 'hairsalon' )  => 1,
				esc_attr__( "Use 2 images", 'hairsalon' ) => 2,
			),
		),

		// background 1
		array(
			'type'        => 'attach_image',
			'heading'     => esc_html__( 'Background 1', 'hairsalon' ),
			'param_name'  => 'background_image_1',
			'admin_label' => true,
			'value'       => '',
			'dependency'  => array( 'element' => 'background_image', 'value' => array( '1', '2' ) )
		),

		// background 2
		array(
			'type'        => 'attach_image',
			'heading'     => esc_html__( 'Background 2', 'hairsalon' ),
			'param_name'  => 'background_image_2',
			'admin_label' => true,
			'value'       => '',
			'dependency'  => array( 'element' => 'background_image', 'value' => array( '2' ) )
		),

		// Box style
		array(
			"type"        => "dropdown",
			"heading"     => esc_attr__( "Box Style", 'hairsalon' ),
			"param_name"  => "box_style",
			"admin_label" => true,
			"value"       => array(
				esc_attr__( "Default", 'hairsalon' )  => '',
				esc_attr__( "Flex box", 'hairsalon' ) => "flexbox",
			),
		),

		// Box style
		array(
			"type"        => "number",
			"heading"     => esc_attr__( "Border size", 'hairsalon' ),
			"param_name"  => "border_size",
			"admin_label" => true,
			'value'       => 0,
			'description' => esc_attr__( 'Border size of box content.', 'hairsalon' ),
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
<?php
/**
 * Heading shortcode
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Mapping shortcode Heading
vc_map( array(
	'name'        => esc_html__( 'Thim Heading', 'hairsalon' ),
	'base'        => 'thim-heading',
	'category'    => esc_html__( 'Thim Shortcodes', 'hairsalon' ),
	'description' => esc_html__( 'Display heading.', 'hairsalon' ),
	'params'      => array(
		//Heading Primary
		array(
			'type'        => 'textfield',
			'admin_label' => true,
			'heading'     => esc_html__( 'Heading Primary', 'hairsalon' ),
			'param_name'  => 'heading_primary',
			'description' => esc_html__( 'Write the title for the heading.', 'hairsalon' )
		),
		//Use custom or default title?
		array(
			'type'        => 'dropdown',
			'admin_label' => true,
			'heading'     => esc_html__( 'Use custom or default heading primary?', 'hairsalon' ),
			'param_name'  => 'title_custom',
			'value'       => array(
				esc_html__( 'Default', 'hairsalon' ) => '',
				esc_html__( 'Custom', 'hairsalon' )  => 'custom',
			),
			'description' => esc_html__( 'If you select default you will use default title which customized in typography.', 'hairsalon' )
		),
		//Heading
		array(
			'type'        => 'dropdown',
			'admin_label' => true,
			'heading'     => esc_html__( 'Heading tag', 'hairsalon' ),
			'param_name'  => 'heading_tag',
			'value'       => array(
				'h2' => 'h2',
				'h3' => 'h3',
				'h4' => 'h4',
				'h5' => 'h5',
				'h6' => 'h6',
			),
			'description' => esc_html__( 'Choose heading element.', 'hairsalon' ),
			'dependency'  => array(
				'element' => 'title_custom',
				'value'   => 'custom',
			),
		),
		//Title color
		array(
			'type'        => 'colorpicker',
			'admin_label' => true,
			'heading'     => esc_html__( 'Heading primary color ', 'hairsalon' ),
			'param_name'  => 'title_color',
			'value'       => '#333333',
			'description' => esc_html__( 'Select the heading primary color.', 'hairsalon' ),
			'dependency'  => array(
				'element' => 'title_custom',
				'value'   => 'custom',
			),
		),
		//Title size
		array(
			'type'        => 'number',
			'admin_label' => true,
			'heading'     => esc_html__( 'Heading size ', 'hairsalon' ),
			'param_name'  => 'title_size',
			'min'         => 0,
			'value'       => '',
			'suffix'      => 'px',
			'description' => esc_html__( 'Select the heading size.', 'hairsalon' ),
			'dependency'  => array(
				'element' => 'title_custom',
				'value'   => 'custom',
			),
		),
		//Title weight
		array(
			'type'        => 'dropdown',
			'admin_label' => true,
			'heading'     => esc_html__( 'Heading primary weight ', 'hairsalon' ),
			'param_name'  => 'title_weight',
			'value'       => array(
				esc_html__( 'Choose the title font weight', 'hairsalon' ) => '',
				esc_html__( 'Normal', 'hairsalon' )                       => 'normal',
				esc_html__( 'Bold', 'hairsalon' )                         => 'bold',
				esc_html__( 'Bolder', 'hairsalon' )                       => 'bolder',
				esc_html__( 'Lighter', 'hairsalon' )                      => 'lighter',
			),
			'description' => esc_html__( 'Select the heading primary weight.', 'hairsalon' ),
			'dependency'  => array(
				'element' => 'title_custom',
				'value'   => 'custom',
			),
		),
		//Title style
		array(
			'type'        => 'dropdown',
			'admin_label' => true,
			'heading'     => esc_html__( 'Heading primary style ', 'hairsalon' ),
			'param_name'  => 'title_style',
			'value'       => array(
				esc_html__( 'Choose the title font style', 'hairsalon' ) => '',
				esc_html__( 'Italic', 'hairsalon' )                      => 'italic',
				esc_html__( 'Oblique', 'hairsalon' )                     => 'oblique',
				esc_html__( 'Initial', 'hairsalon' )                     => 'initial',
				esc_html__( 'Inherit', 'hairsalon' )                     => 'inherit',
			),
			'description' => esc_html__( 'Select the heading primary style.', 'hairsalon' ),
			'dependency'  => array(
				'element' => 'title_custom',
				'value'   => 'custom',
			),
		),
		//Heading Seccondary
		array(
			'type'        => 'textfield',
			'admin_label' => true,
			'heading'     => esc_html__( 'Heading Secondary', 'hairsalon' ),
			'param_name'  => 'heading_secondary',
			'description' => esc_html__( 'Write the title for the heading secondary.', 'hairsalon' )
		),
		//Heading secondary color
		array(
			'type'        => 'colorpicker',
			'admin_label' => true,
			'heading'     => esc_html__( 'Heading secondary color ', 'hairsalon' ),
			'param_name'  => 'hd_secondary_color',
			'value'       => '#db8d83',
			'description' => esc_html__( 'Select the heading secondary color.', 'hairsalon' ),
		),
		//Display the icon?
		array(
			'type'        => 'checkbox',
			'admin_label' => true,
			'heading'     => esc_html__( 'Hide the icon?', 'hairsalon' ),
			'param_name'  => 'display',
//			'value'       => array( esc_html__( '', 'hairsalon' ) => 'yes' ),
			'description' => esc_html__( 'Tick it to hide the icon between title and description.', 'hairsalon' ),
		),

		//Use custom or default icon color?
		array(
			'type'        => 'dropdown',
			'admin_label' => true,
			'heading'     => esc_html__( 'Use custom or default icon color?', 'hairsalon' ),
			'param_name'  => 'icon_color',
			'value'       => array(
				esc_html__( 'Gray', 'hairsalon' ) => '',
				esc_html__( 'White', 'hairsalon' )  => 'white',
			),
			'dependency'  => array(
				'element'            => 'display',
				'value_not_equal_to' => 'yes',
			),
			'description' => esc_html__( 'Allows you can select icon color for heading.', 'hairsalon' )
		),
		// Description
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Description', 'hairsalon' ),
			'param_name'  => 'description',
			'description' => esc_html__( 'Provide the description for this icon box.', 'hairsalon' )
		),
		//Use custom or default description ?
		array(
			'type'        => 'dropdown',
			'admin_label' => true,
			'heading'     => esc_html__( 'Use custom or default description?', 'hairsalon' ),
			'param_name'  => 'description_custom',
			'value'       => array(
				esc_html__( 'Default', 'hairsalon' ) => '',
				esc_html__( 'Custom', 'hairsalon' )  => 'custom',
			),
			'description' => esc_html__( 'If you select default you will use default description which customized in typography.', 'hairsalon' )
		),

		//Description color
		array(
			'type'        => 'colorpicker',
			'admin_label' => true,
			'heading'     => esc_html__( 'Description color ', 'hairsalon' ),
			'param_name'  => 'description_color',
			'value'       => '#777777',
			'description' => esc_html__( 'Select the description color.', 'hairsalon' ),
			'dependency'  => array(
				'element' => 'description_custom',
				'value'   => 'custom',
			),
		),
		//Description size
		array(
			'type'        => 'number',
			'admin_label' => true,
			'heading'     => esc_html__( 'Description size ', 'hairsalon' ),
			'param_name'  => 'description_size',
			'min'         => 0,
			'value'       => '',
			'suffix'      => 'px',
			'description' => esc_html__( 'Select the description size.', 'hairsalon' ),
			'dependency'  => array(
				'element' => 'description_custom',
				'value'   => 'custom',
			),
		),
		//Alignment
		array(
			'type'        => 'dropdown',
			'admin_label' => true,
			'heading'     => esc_html__( 'Description alignment', 'hairsalon' ),
			'param_name'  => 'description_align',
			'value'       => array(
				'Choose the description alignment'         => '',
				esc_html__( 'Description at left', 'hairsalon' )   => 'left',
				esc_html__( 'Description at center', 'hairsalon' ) => 'center',
				esc_html__( 'Description at right', 'hairsalon' )  => 'right',
			),
		),
		//Description weight
		array(
			'type'        => 'dropdown',
			'admin_label' => true,
			'heading'     => esc_html__( 'Description weight ', 'hairsalon' ),
			'param_name'  => 'Description_weight',
			'value'       => array(
				esc_html__( 'Choose the description font weight', 'hairsalon' ) => '',
				esc_html__( 'Normal', 'hairsalon' )                             => 'normal',
				esc_html__( 'Bold', 'hairsalon' )                               => 'bold',
				esc_html__( 'Bolder', 'hairsalon' )                             => 'bolder',
				esc_html__( 'Lighter', 'hairsalon' )                            => 'lighter',
			),
			'description' => esc_html__( 'Select the description weight.', 'hairsalon' ),
			'dependency'  => array(
				'element' => 'description_custom',
				'value'   => 'custom',
			),
		),
		//Description padding
		array(
			'type'        => 'textfield',
			'admin_label' => true,
			'heading'     => esc_html__( 'Description padding ', 'hairsalon' ),
			'param_name'  => 'description_padding',
			'description' => esc_html__( 'Select the description padding.', 'hairsalon' ),
			'dependency'  => array(
				'element' => 'description_custom',
				'value'   => 'custom',
			),
		),
		//Description style
		array(
			'type'        => 'dropdown',
			'admin_label' => true,
			'heading'     => esc_html__( 'Description style ', 'hairsalon' ),
			'param_name'  => 'description_style',
			'value'       => array(
				esc_html__( 'Choose the description font style', 'hairsalon' ) => '',
				esc_html__( 'Italic', 'hairsalon' )                            => 'italic',
				esc_html__( 'Oblique', 'hairsalon' )                           => 'oblique',
				esc_html__( 'Initial', 'hairsalon' )                           => 'initial',
				esc_html__( 'Inherit', 'hairsalon' )                           => 'inherit',
			),
			'description' => esc_html__( 'Select the description style.', 'hairsalon' ),
			'dependency'  => array(
				'element' => 'description_custom',
				'value'   => 'custom',
			),
		),

		// If select display button, you can change your button link
		array(
			'type'        => 'textfield',
			'admin_label' => true,
			'heading'     => esc_html__( 'Button text link', 'hairsalon' ),
			'param_name'  => 'button_text_link',
			'description' => esc_html__( 'Write text link for the button.', 'hairsalon' )
		),

		// If select display button, you can change your button text
		array(
			'type'        => 'textfield',
			'admin_label' => true,
			'heading'     => esc_html__( 'Button text', 'hairsalon' ),
			'param_name'  => 'button_text',
			'description' => esc_html__( 'Write text for the button.', 'hairsalon' )
		),

		//Alignment
		array(
			'type'        => 'dropdown',
			'admin_label' => true,
			'heading'     => esc_html__( 'Shortcode alignment', 'hairsalon' ),
			'param_name'  => 'alignment',
			'value'       => array(
				'Choose the text alignment'         => '',
				esc_html__( 'Shortcode at left', 'hairsalon' )   => 'left',
				esc_html__( 'Shortcode at center', 'hairsalon' ) => 'center',
				esc_html__( 'Shortcode at right', 'hairsalon' )  => 'right',
			),
		),
		//Animation
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
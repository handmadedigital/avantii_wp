<?php
/**
 * Heading shortcode
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * include template
 */
include_once 'tpl/default.php';

vc_map(
	array(
		'name'        => esc_html__( 'Thim Counter Box', 'hairsalon' ),
		'base'        => 'thim-counter-box',
		'class'       => '',
		'category'    => esc_html__( 'Thim Shortcodes', 'hairsalon' ),
		'description' => esc_html__( 'Display counter box.', 'hairsalon' ),
		'params'      => array(

			// params group
			array(
				'type'       => 'param_group',
				'value'      => '',
				'param_name' => 'counter_list',
				// Note params is mapped inside param-group:
				'params'     => array(
					// Number
					array(
						'type'        => 'number',
						'admin_label' => true,
						'value'       => 10,
						'min'         => 0,
						'heading'     => esc_html__( 'Number', 'hairsalon' ),
						'param_name'  => 'number',
						'description' => esc_html__( 'Enter number in box to count.', 'hairsalon' ),
					),
					// Label
					array(
						'type'        => 'textfield',
						'heading'     => esc_html__( 'Label', 'hairsalon' ),
						'admin_label' => true,
						'param_name'  => 'label',
						'value'       => '',
						'description' => esc_html__( 'Label counter box.', 'hairsalon' ),
					),
				)
			),
			// Style
			//Use custom or default title?
			array(
				'type'        => 'dropdown',
				'admin_label' => true,
				'heading'     => esc_html__( 'Use custom or default style?', 'hairsalon' ),
				'param_name'  => 'style_custom',
				'value'       => array(
					esc_html__( 'Default', 'hairsalon' ) => '',
					esc_html__( 'Custom', 'hairsalon' )  => 'custom',
				),
				'description' => esc_html__( 'If you select default you will use default style which same as demo.', 'hairsalon' )
			),
			array(
				'type'        => 'number',
				'admin_label' => true,
				'heading'     => esc_html__( 'Font size of number ', 'hairsalon' ),
				'param_name'  => 'number_fontsize',
				'min'         => 0,
				'value'       => '100',
				'suffix'      => 'px',
				'description' => esc_html__( 'Select font size of number.', 'hairsalon' ),
				'dependency'  => array(
					'element' => 'style_custom',
					'value'   => 'custom',
				),
			),
			array(
				'type'        => 'number',
				'admin_label' => true,
				'heading'     => esc_html__( 'Width of number ', 'hairsalon' ),
				'param_name'  => 'number_width',
				'min'         => 0,
				'value'       => '100',
				'suffix'      => 'px',
				'description' => esc_html__( 'Select width of number.', 'hairsalon' ),
				'dependency'  => array(
					'element' => 'style_custom',
					'value'   => 'custom',
				),
			),
			// Min height
			array(
				'type'        => 'number',
				'admin_label' => true,
				'heading'     => esc_html__( 'Height of number ', 'hairsalon' ),
				'param_name'  => 'number_height',
				'min'         => 0,
				'value'       => '75',
				'suffix'      => 'px',
				'description' => esc_html__( 'Select height of number.', 'hairsalon' ),
				'dependency'  => array(
					'element' => 'style_custom',
					'value'   => 'custom',
				),
			),
			// Number color
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Number color', 'hairsalon' ),
				'param_name'  => 'number_color',
//				'value'       => esc_html__( '', 'hairsalon' ),
				'description' => esc_html__( 'Select the number color', 'hairsalon' ),
				'dependency'  => array(
					'element' => 'style_custom',
					'value'   => 'custom',
				),
			),
			//Label color
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Label color', 'hairsalon' ),
				'param_name'  => 'label_color',
//				'value'       => esc_html__( '', 'hairsalon' ),
				'description' => esc_html__( 'Select the label color', 'hairsalon' ),
				'dependency'  => array(
					'element' => 'style_custom',
					'value'   => 'custom',
				),
			),
			// Border color
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Border color', 'hairsalon' ),
				'param_name'  => 'border_color',
//				'value'       => esc_html__( '', 'hairsalon' ),
				'description' => esc_html__( 'Select the border color', 'hairsalon' ),
				'dependency'  => array(
					'element' => 'style_custom',
					'value'   => 'custom',
				),
			),
		)
	)
);
<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * include template
 */
include_once 'tpl/default.php';


/**
 * Map shortcode
 */
vc_map( array(
	'name'        => esc_html__( 'Thim Our Team', 'hairsalon' ),
	'base'        => 'thim-our-team',
	'category'    => esc_html__( 'Thim Shortcodes', 'hairsalon' ),
	'description' => esc_html__( 'Display our team.', 'hairsalon' ),
	'params'      => array(
		//Number of staffs
		array(
			'type'        => 'number',
			'admin_label' => true,
			'heading'     => esc_html__( 'Number', 'hairsalon' ),
			'param_name'  => 'limit_post',
			'min'         => 1,
			'max'         => 20,
			'value'       => '',
			'description' => esc_html__( 'The number of staffs to show.', 'hairsalon' )
		),
		//Number of column to show
		array(
			'type'        => 'number',
			'admin_label' => true,
			'heading'     => esc_html__( 'Columns', 'hairsalon' ),
			'param_name'  => 'column',
			'min'         => 2,
			'max'         => 4,
			'value'       => 4,
			'description' => esc_html__( 'The number of columns per row to show.', 'hairsalon' )
		),
		// Select category
		array(
			'type'        => 'dropdown',
			'admin_label' => true,
			'heading'     => esc_html__( 'Select category', 'hairsalon' ),
			'param_name'  => 'cat_id',
			'value'       => thim_get_team_categories()
		),
		//Animation
		array(
			'type'        => 'dropdown',
			'heading'     => esc_html__( 'Animation', 'hairsalon' ),
			'param_name'  => 'css_animation',
			'admin_label' => true,
			'value'       => array(
				esc_html__( 'No', 'hairsalon' )                 => '',
				esc_html__( 'Top to bottom', 'hairsalon' )      => 'top-to-bottom',
				esc_html__( 'Bottom to top', 'hairsalon' )      => 'bottom-to-top',
				esc_html__( 'Left to right', 'hairsalon' )      => 'left-to-right',
				esc_html__( 'Right to left', 'hairsalon' )      => 'right-to-left',
				esc_html__( 'Appear from center', 'hairsalon' ) => 'appear'
			),
			'description' => esc_html__( 'Select type of animation if you want this element to be animated when it enters into the browsers viewport. Note: Works only in modern browsers.', 'hairsalon' )
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
<?php
/**
 * Section Header Sticky Menu
 * 
 * @package Hair_Salon
 */

thim_customizer()->add_section(
	array(
		'id'             => 'header_sticky_menu',
		'title'          => esc_html__( 'Sticky Menu', 'hairsalon' ),
		'panel'			 => 'header',
		'priority'       => 50,
	)
);

// Enable or Disable
thim_customizer()->add_field(
	array(
		'id'          => 'show_sticky_menu',
		'type'        => 'switch',
		'label'       => esc_html__( 'Sticky On Scroll', 'hairsalon' ),
		'tooltip'     => esc_html__( 'Allows you to show or hide header sticky menu on your site . ', 'hairsalon' ),
		'section'     => 'header_sticky_menu',
		'default'     => false,
		'priority'    => 10,
		'choices'     => array(
			true  	  => esc_html__( 'On', 'hairsalon' ),
			false	  => esc_html__( 'Off', 'hairsalon' ),
		),
	)
);

// Select Style
thim_customizer()->add_field(
	array(
		'id'          => 'sticky_menu_style',
		'type'        => 'select',
		'label'       => esc_html__( 'Select style', 'hairsalon' ),
		'tooltip'     => esc_html__( 'Allows you to select sticky menu style for your header . ', 'hairsalon' ),
		'section'     => 'header_sticky_menu',
		'default'     => 'custom',
		'priority'    => 10,
		'multiple'    => 0,
		'choices'     => array(
			'same' 	  => esc_html__( 'The same with main menu', 'hairsalon' ),
			'custom'  => esc_html__( 'Custom', 'hairsalon' )
		),
	)
);

// Background Header
thim_customizer()->add_field(
	array(
		'id'          => 'sticky_menu_background_color',
		'type'        => 'color',
		'label'       => esc_html__( 'Background Color', 'hairsalon' ),
		'tooltip'     => esc_html__( 'Choose a background color for sticky menu on the header.', 'hairsalon' ),
		'section'     => 'header_sticky_menu',
		'default'     => '#ffffff',
		'priority'    => 16,
		'alpha'       => true,
		'transport' => 'postMessage',
		'js_vars'   => array(
			array(
				'choice'   => 'color',
				'element'  => 'body header#masthead.site-header.custom-sticky.affix',
				'property' => 'background-color',
			)
		),
		'active_callback' => array(
			array(
				'setting'  => 'sticky_menu_style',
				'operator' => '===',
				'value'    => 'custom',
			),
		),
	)
);

// Text Color
thim_customizer()->add_field(
	array(
		'id'          => 'sticky_menu_text_color',
		'type'        => 'color',
		'label'       => esc_html__( 'Text Color', 'hairsalon' ),
		'tooltip'     => esc_html__( 'Choose a text color for sticky menu on the header.', 'hairsalon' ),
		'section'     => 'header_sticky_menu',
		'default'     => '#333333',
		'priority'    => 18,
		'alpha'       => true,
		'transport' => 'postMessage',
		'js_vars'   => array(
			array(
				'choice'   => 'color',
				'element'  => 'body header#masthead.site-header.affix.custom-sticky #primary-menu >li >a,
                               header#masthead.site-header.affix.custom-sticky #primary-menu >li >span',
				'property' => 'color',
			)
		),
		'active_callback' => array(
			array(
				'setting'  => 'sticky_menu_style',
				'operator' => '===',
				'value'    => 'custom',
			),
		),
	)
);

// Text Hover Color
thim_customizer()->add_field(
	array(
		'id'          => 'sticky_menu_text_color_hover',
		'type'        => 'color',
		'label'       => esc_html__( 'Text Hover Color', 'hairsalon' ),
		'tooltip'     => esc_html__( 'Choose a link color when users hover over text link on sticky menu on the header.', 'hairsalon' ),
		'section'     => 'header_sticky_menu',
		'default'     => '#946a94',
		'priority'    => 19,
		'alpha'       => true,
		'transport' => 'postMessage',
		'js_vars'   => array(
			array(
				'choice'   => 'color',
				'element'  => 'body header#masthead.site-header.affix.custom-sticky #primary-menu >li >a:hover,
                               body header#masthead.site-header.affix.custom-sticky #primary-menu >li >span:hover',
				'property' => 'color',
			)
		),
		'active_callback' => array(
			array(
				'setting'  => 'sticky_menu_style',
				'operator' => '===',
				'value'    => 'custom',
			),
		),
	)
);
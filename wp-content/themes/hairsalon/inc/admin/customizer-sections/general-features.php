<?php
/**
 * Section Advance features
 *
 * @package Hair_Salon
 */

thim_customizer()->add_section(
	array(
		'id'       => 'advanced',
		'panel'    => 'general',
		'priority' => 90,
		'title'    => esc_html__( 'Extra Features', 'hairsalon' ),
	)
);

// Feature: RTL
thim_customizer()->add_field(
	array(
		'type'     => 'switch',
		'id'       => 'feature_rtl_support',
		'label'    => esc_html__( 'RTL Support', 'hairsalon' ),
		'section'  => 'advanced',
		'default'  => false,
		'priority' => 10,
		'choices'  => array(
			true  => esc_html__( 'On', 'hairsalon' ),
			false => esc_html__( 'Off', 'hairsalon' ),
		),
	)
);

// Feature: Smoothscroll
thim_customizer()->add_field(
	array(
		'type'     => 'switch',
		'id'       => 'feature_smoothscroll',
		'label'    => esc_html__( 'Smooth Scrolling', 'hairsalon' ),
		'tooltip'  => esc_html__( 'Turn on to enable smooth scrolling.', 'hairsalon' ),
		'section'  => 'advanced',
		'default'  => true,
		'priority' => 20,
		'choices'  => array(
			true  => esc_html__( 'On', 'hairsalon' ),
			false => esc_html__( 'Off', 'hairsalon' ),
		),
		'transport' => 'postMessage',
		'js_vars'   => array()
	)
);

// Feature: Open Graph Meta
thim_customizer()->add_field(
	array(
		'type'     => 'switch',
		'id'       => 'feature_open_graph_meta',
		'label'    => esc_html__( 'Open Graph Meta Tags', 'hairsalon' ),
		'tooltip'  => esc_html__( 'Turn on to enable open graph meta tags which is mainly used when sharing pages on social networking sites like Facebook.', 'hairsalon' ),
		'section'  => 'advanced',
		'default'  => false,
		'priority' => 30,
		'choices'  => array(
			true  => esc_html__( 'On', 'hairsalon' ),
			false => esc_html__( 'Off', 'hairsalon' ),
		),
		'transport' => 'postMessage',
		'js_vars'   => array()
	)
);

// Feature: Back To Top
thim_customizer()->add_field(
	array(
		'type'     => 'switch',
		'id'       => 'feature_backtotop',
		'label'    => esc_html__( 'Back To Top', 'hairsalon' ),
		'tooltip'  => esc_html__( 'Turn on to enable the Back To Top script which adds the scrolling to top functionality.', 'hairsalon' ),
		'section'  => 'advanced',
		'default'  => true,
		'priority' => 40,
		'choices'  => array(
			true  => esc_html__( 'On', 'hairsalon' ),
			false => esc_html__( 'Off', 'hairsalon' ),
		),
	)
);

// Feature: Toolbar Color For Android
thim_customizer()->add_field(
	array(
		'type'     => 'switch',
		'id'       => 'feature_google_theme',
		'label'    => esc_html__( 'Google Theme', 'hairsalon' ),
		'tooltip'  => esc_html__( 'Turn on to set the toolbar color in Chrome for Android.', 'hairsalon' ),
		'section'  => 'advanced',
		'default'  => false,
		'priority' => 50,
		'choices'  => array(
			true  => esc_html__( 'On', 'hairsalon' ),
			false => esc_html__( 'Off', 'hairsalon' ),
		),
	)
);

// Feature: Google Theme Color
thim_customizer()->add_field(
	array(
		'type'            => 'color',
		'id'              => 'feature_google_theme_color',
		'label'           => esc_html__( 'Google Theme Color', 'hairsalon' ),
		'section'         => 'advanced',
		'default'         => '#333333',
		'priority'        => 60,
		'alpha'           => true,
		'active_callback' => array(
			array(
				'setting'  => 'feature_google_theme',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

// Feature: Preload
thim_customizer()->add_field( array(
	'type'     => 'radio-image',
	'id'       => 'theme_feature_preloading',
	'section'  => 'advanced',
	'label'    => esc_html__( 'Preloading', 'hairsalon' ),
	'default'  => 'wave',
	'priority' => 70,
	'choices'  => array(
		'off'             => THIM_URI . 'assets/images/preloading/off.jpg',
		'chasing-dots'    => THIM_URI . 'assets/images/preloading/chasing-dots.gif',
		'circle'          => THIM_URI . 'assets/images/preloading/circle.gif',
		'cube-grid'       => THIM_URI . 'assets/images/preloading/cube-grid.gif',
		'double-bounce'   => THIM_URI . 'assets/images/preloading/double-bounce.gif',
		'fading-circle'   => THIM_URI . 'assets/images/preloading/fading-circle.gif',
		'folding-cube'    => THIM_URI . 'assets/images/preloading/folding-cube.gif',
		'rotating-plane'  => THIM_URI . 'assets/images/preloading/rotating-plane.gif',
		'spinner-pulse'   => THIM_URI . 'assets/images/preloading/spinner-pulse.gif',
		'three-bounce'    => THIM_URI . 'assets/images/preloading/three-bounce.gif',
		'wandering-cubes' => THIM_URI . 'assets/images/preloading/wandering-cubes.gif',
		'wave'            => THIM_URI . 'assets/images/preloading/wave.gif',
		'custom-image'    => THIM_URI . 'assets/images/preloading/custom-image.jpg',
	),
) );

// Feature: Preload Image Upload
thim_customizer()->add_field( array(
	'type'            => 'kirki-image',
	'id'              => 'theme_feature_preloading_custom_image',
	'label'           => esc_html__( 'Preloading Custom Image', 'hairsalon' ),
	'section'         => 'advanced',
	'priority'        => 80,
	'active_callback' => array(
		array(
			'setting'  => 'theme_feature_preloading',
			'operator' => '===',
			'value'    => 'custom-image',
		),
	),
) );

// Feature: Preload Colors
thim_customizer()->add_field( array(
	'type'            => 'multicolor',
	'id'              => 'theme_feature_preloading_style',
	'label'           => esc_html__( 'Preloading Style', 'hairsalon' ),
	'section'         => 'advanced',
	'priority'        => 90,
	'choices'         => array(
		'background' => esc_html__( 'Background color', 'hairsalon' ),
		'color'      => esc_html__( 'Icon color', 'hairsalon' ),
	),
	'default'         => array(
		'background' => '#ffffff',
		'color'      => '#946a94',
	),
	'active_callback' => array(
		array(
			'setting'  => 'theme_feature_preloading',
			'operator' => '!=',
			'value'    => 'off',
		),
	),
) );
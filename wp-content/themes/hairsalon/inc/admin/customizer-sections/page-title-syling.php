<?php
/**
 * Section Page Title
 *
 * @package Hair_Salon
 */

thim_customizer()->add_section(
	array(
		'id'       => 'page_title_styling',
		'panel'    => 'page_title_bar',
		'title'    => esc_html__( 'Title', 'hairsalon' ),
		'priority' => 12,
	)
);

// Align Page Title
thim_customizer()->add_field(
	array(
		'id'        => 'font_page_title',
		'type'      => 'typography',
		'label'     => esc_html__( 'Fonts Title', 'hairsalon' ),
		'tooltip'   => esc_html__( 'Allows you to select font properties for page title. ', 'hairsalon' ),
		'section'   => 'page_title_styling',
		'priority'  => 15,
		'default'   => array(
			'font-size'  => '30px',
			'color'      => '#ffffff',
		),
		'transport' => 'postMessage',
		'js_vars'   => array(
			array(
				'choice'   => 'font-size',
				'element'  => '.page-title .main-top .content h1,
                                .page-title .main-top .content h2',
				'property' => 'font-size',
			),
			array(
				'choice'   => 'color',
				'element'  => '.page-title .main-top .content h1,
                                .page-title .main-top .content h2',
				'property' => 'color',
			),
		)
	)
);




<?php
/**
 * Section Custom CSS
 * 
 * @package Hair_Salon
 */

thim_customizer()->add_section(
	array(
		'id'       => 'custom_css',
		'panel'    => 'general',
		'title'    => esc_html__( 'Custom CSS', 'hairsalon' ),
		'priority' => 100,
	)
);

thim_customizer()->add_field( array(
	'type'     => 'code',
	'id'       => 'custom_css_field',
	'description'    => esc_html__( 'Just want to do some quick CSS changes? Enter theme here, they will be applied to the theme.', 'hairsalon' ),
	'section'  => 'custom_css',
	'default'  => '.test-class{ color: red; }',
	'priority' => 10,
	'choices'  => array(
		'language' => 'css',
		'theme'    => 'monokai',
		'height'   => 250,
	),
	'transport' => 'postMessage',
	'js_vars'   => array()
) );
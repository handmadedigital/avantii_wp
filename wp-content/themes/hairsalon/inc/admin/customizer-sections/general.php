<?php
/**
 * Panel General
 * 
 * @package Hair_Salon
 */

thim_customizer()->add_panel(
	array(
		'id'       => 'general',
		'priority' => 10,
		'title'    => esc_html__( 'General', 'hairsalon' ),
	)
);
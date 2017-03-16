<?php
/**
 * Panel Header
 * 
 * @package Hair_Salon
 */


thim_customizer()->add_panel(
	array(
		'id'       => 'header',
		'priority' => 20,
		'title'    => esc_html__( 'Header', 'hairsalon' ),
	)
);
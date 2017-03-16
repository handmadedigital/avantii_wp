<?php
/**
 * Panel Footer
 * 
 * @package Hair_Salon
 */

thim_customizer()->add_panel(
	array(
		'id'       => 'footer',
		'priority' => 60,
		'title'    => esc_html__( 'Footer', 'hairsalon' ),
	)
);

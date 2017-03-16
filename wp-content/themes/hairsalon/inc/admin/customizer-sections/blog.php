<?php
/**
 * Panel Blog
 * 
 * @package Hair_Salon
 */

thim_customizer()->add_panel(
    array(
        'id'       => 'blog',
        'priority' => 42,
        'title'    => esc_html__( 'Blog', 'hairsalon' ),
    )
);
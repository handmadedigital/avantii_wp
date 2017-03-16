<?php
/**
 * Panel Page Title Bar
 * 
 * @package Hair_Salon
 */

thim_customizer()->add_panel(
    array(
        'id'       => 'page_title_bar',
        'title'    => esc_html__( 'Page Title', 'hairsalon' ),
        'priority' => 30,
    )
);

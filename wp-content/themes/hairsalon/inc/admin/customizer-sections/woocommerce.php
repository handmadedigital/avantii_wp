<?php
/**
 * Panel Woocommerce
 *
 * @package Hair_Salon
 */

thim_customizer()->add_panel(
    array(
        'id'       => 'woocommerce',
        'title'    => esc_html__( 'WooCommerce', 'hairsalon' ),
        'priority' => 65,
    )
);
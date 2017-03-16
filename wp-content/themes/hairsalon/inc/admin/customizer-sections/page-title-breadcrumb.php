<?php
/**
 * Section Breadcrumb
 *
 * @package Hair_Salon
 */

thim_customizer()->add_section(
    array(
        'id'       => 'breadcrumb',
        'panel'    => 'page_title_bar',
        'title'    => esc_html__( 'Breadcrumbs', 'hairsalon' ),
        'priority' => 20,
    )
);

// Enable or Disable Breadcrumb
thim_customizer()->add_field(
    array(
        'id'          => 'disable_breadcrumb',
        'type'        => 'switch',
        'label'       => esc_html__( 'Hide Breadcrumb', 'hairsalon' ),
        'tooltip'     => esc_html__( 'Allows you to HIDE breadcrumb on page title bar. ', 'hairsalon' ),
        'section'     => 'breadcrumb',
        'default'     => false,
        'priority'    => 10,
        'choices'     => array(
            true  	  => esc_html__( 'On', 'hairsalon' ),
            false	  => esc_html__( 'Off', 'hairsalon' ),
        ),
    )
);

// Enter Icon To Show In Breadcrumb
$link_icon = 'http://fontawesome.io/icons/';

thim_customizer()->add_field(
    array(
        'id'          => 'breadcrumb_icon',
        'type'        => 'text',
        'label'       => esc_html__( 'Breadcrumb Icon', 'hairsalon' ),
        'description' => sprintf( 'Enter any one character from the keyboard or <a href="%1$s" target="_blank" >FontAwesome</a> icon name. For example: 	&lt;i class="fa fa-angle-right"&gt; &lt;&#47i&gt; ,...', esc_url( $link_icon )),
        'section'     => 'breadcrumb',
        'default' => '',
        'priority'    => 20,
    )
);

thim_customizer()->add_field(
    array(
        'id'        => 'page_title_breadcrumb',
        'type'      => 'typography',
        'label'     => esc_html__( 'Breadcrumb Fonts', 'hairsalon' ),
        'tooltip'   => esc_html__( 'Allows you to select font properties for breadcrumb. ', 'hairsalon' ),
        'section'   => 'breadcrumb',
        'priority'  => 30,
        'default'   => array(
            'font-size'      => '14px',
            'color'          => '#ffffff',
        ),
        'transport' => 'postMessage',
        'js_vars'   => array(
            array(
                'choice'   => 'font-size',
                'element'  => '.page-title .main-top #breadcrumbs li a,
                               .page-title .main-top #breadcrumbs li span,
                               .page-title .main-top #breadcrumbs li i,
                               .page-title .main-top nav.woocommerce-breadcrumb span,
                               .page-title .main-top nav.woocommerce-breadcrumb a,
                               .page-title .main-top nav.woocommerce-breadcrumb i',
                'property' => 'font-size',
            ),
            array(
                'choice'   => 'color',
                'element'  => '.page-title .main-top #breadcrumbs li a,
                               .page-title .main-top #breadcrumbs li span,
                               .page-title .main-top #breadcrumbs li i,
                               .page-title .main-top nav.woocommerce-breadcrumb span,
                               .page-title .main-top nav.woocommerce-breadcrumb a,
                               .page-title .main-top nav.woocommerce-breadcrumb i',
                'property' => 'color',
            ),
        ),
    )
);


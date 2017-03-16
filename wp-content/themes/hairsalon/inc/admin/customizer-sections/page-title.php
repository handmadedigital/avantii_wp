<?php
/**
 * Section Page Title
 * 
 * @package Hair_Salon
 */

thim_customizer()->add_section(
    array(
        'id'       => 'page_title_setting',
        'panel'    => 'page_title_bar',
        'title'    => esc_html__( 'Settings', 'hairsalon' ),
        'priority' => 10,
    )
);

// Enable or Disable Page Title
thim_customizer()->add_field(
    array(
        'id'          => 'enable_page_title',
        'type'        => 'switch',
        'label'       => esc_html__( 'Show Page Title', 'hairsalon' ),
        'tooltip'     => esc_html__( 'Allows you to enable or disable page title on heading top. ', 'hairsalon' ),
        'section'     => 'page_title_setting',
        'default'     => true,
        'priority'    => 10,
        'choices'     => array(
            true  	  => esc_html__( 'On', 'hairsalon' ),
            false	  => esc_html__( 'Off', 'hairsalon' ),
        ),
    )
);

// Enable or Disable Page Title Contents
thim_customizer()->add_field(
    array(
        'id'          => 'disable_page_title_content',
        'type'        => 'switch',
        'label'       => esc_html__( 'Hide Page Title Contents', 'hairsalon' ),
        'tooltip'     => esc_html__( 'Allows you to HIDE page title content on page title bar. ', 'hairsalon' ),
        'section'     => 'page_title_setting',
        'default'     => false,
        'priority'    => 15,
        'choices'     => array(
            true  	  => esc_html__( 'On', 'hairsalon' ),
            false	  => esc_html__( 'Off', 'hairsalon' ),
        ),
    )
);

// Upload Background Image
thim_customizer()->add_field(
    array(
        'id'       => 'page_title_background_image',
        'type'     => 'image',
        'label'    => esc_html__( 'Upload Background Image', 'hairsalon' ),
        'tooltip'  => esc_html__( 'Upload an image for the background image of the page title.', 'hairsalon' ),
        'section'  => 'page_title_setting',
        'priority' => 30,
        'js_vars'  => array(
            array(
                'element'  => '.main-top',
                'function' => 'css',
                'property' => 'background-image',
            ),
        ),
        'default'  => THIM_URI . 'assets/images/hairsalon-page-title.jpg',
    )
);

// Page Title Background Color
thim_customizer()->add_field(
    array(
        'id'        => 'page_title_background_color',
        'type'      => 'color',
        'label'     => esc_html__( 'Background Color', 'hairsalon' ),
        'tooltip'   => esc_html__( 'If you do not use background image, then can use background color for page title on heading top. ', 'hairsalon' ),
        'section'   => 'page_title_setting',
        'default'   => 'rgba(219,141,131,0.9)',
        'priority'  => 35,
        'alpha'     => true,
        'transport' => 'postMessage',
        'js_vars'   => array(
            array(
                'choice'   => 'color',
                'element'  => '.page-title .main-top .overlay-top-header',
                'property' => 'background',
            )
        )
    )
);

// Height Page Title
thim_customizer()->add_field(
    array(
        'id'        => 'page_title_height',
        'type'      => 'dimension',
        'label'     => esc_html__( 'Height', 'hairsalon' ),
        'tooltip'   => esc_html__( 'Assign a value for page title height. Example: 100px, 30em, 48%, 90vh etc..', 'hairsalon' ),
        'section'   => 'page_title_setting',
        'default'   => '340px',
        'priority'  => 40,
        'choices'   => array(
            'min'  => 100,
            'max'  => 500,
            'step' => 10,
        ),
        'transport' => 'postMessage',
        'js_vars'   => array(
            array(
                'choice'   => 'height',
                'element'  => '.page-title .main-top',
                'property' => 'height',
            )
        )
    )
);



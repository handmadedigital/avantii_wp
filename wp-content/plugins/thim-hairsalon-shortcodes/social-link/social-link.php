<?php
/**
 * Social link shortcode
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * include template
 */
include_once 'tpl/default.php';


/**
 * Map shortcode
 */
vc_map( array(
    "name"     => esc_html__( "Thim Social Link", "hairsalon" ),
    "base"     => "thim_social_link",
    "class"    => "",
    "icon"     => "icon-wpb-icon_social_link",
    'description' => esc_html__( 'Display social link.', 'hairsalon' ),
    "category" => esc_html__( 'Thim Shortcodes', 'hairsalon' ),
    "params"   => array(
        // Style
        array(
            "type"        => "dropdown",
            "heading"     => esc_html__( "Style", "hairsalon" ),
            "param_name"  => "style",
            "admin_label" => true,
            "value"       => array(
                esc_html__( "Style 01", "hairsalon" ) => "style-01",
                esc_html__( "Style 02", "hairsalon" ) => "style-02",
                esc_html__( "Style 03", "hairsalon" ) => "style-03"
            ),
        ),
        //Alignment
        array(
            'type'        => 'dropdown',
            'admin_label' => true,
            'heading'     => esc_html__( 'Icon Alignment', 'hairsalon' ),
            'param_name'  => 'alignment',
            'value'       => array(
                'Choose the icons alignment'         => '',
                esc_html__( 'Icons at left', 'hairsalon' )   => 'left',
                esc_html__( 'Icons at center', 'hairsalon' ) => 'center',
                esc_html__( 'Icons at right', 'hairsalon' )  => 'right',
            ),
        ),
        array(
            "type"       => "textfield",
            "heading"    => esc_html__( "Link Facebook", "hairsalon" ),
            "param_name" => "link_face",
            "value"      => '#',
        ),
        array(
            "type"       => "textfield",
            "heading"    => esc_html__( "Link Twitter", "hairsalon" ),
            "param_name" => "link_twitter",
            "value"      => '#',
        ),
        array(
            "type"       => "textfield",
            "heading"    => esc_html__( "Link Skype", "hairsalon" ),
            "param_name" => "link_skype",
            "value"      => '#',
        ),
        array(
            "type"       => "textfield",
            "heading"    => esc_html__( "Link Pinterest", "hairsalon" ),
            "param_name" => "link_pinterest",
        ),
        array(
            "type"       => "textfield",
            "heading"    => esc_html__( "Link Google", "hairsalon" ),
            "param_name" => "link_google",
        ),
        array(
            "type"       => "textfield",
            "heading"    => esc_html__( "Link Dribble", "hairsalon" ),
            "param_name" => "link_dribble",
        ),
        array(
            "type"       => "textfield",
            "heading"    => esc_html__( "Link Linkedin", "hairsalon" ),
            "param_name" => "link_linkedin",
        ),
        array(
            "type"       => "textfield",
            "heading"    => esc_html__( "Link Digg", "hairsalon" ),
            "param_name" => "link_digg",
        ),
        array(
            "type"       => "textfield",
            "heading"    => esc_html__( "Link Youtube", "hairsalon" ),
            "param_name" => "link_youtube",
        ),
        array(
            "type"       => "textfield",
            "heading"    => esc_html__( "Link Instagram", "hairsalon" ),
            "param_name" => "link_instagram",
        ),
    )
) );
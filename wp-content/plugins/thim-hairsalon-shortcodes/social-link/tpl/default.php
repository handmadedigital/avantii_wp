<?php

/**
 * Shortcode Heading
 *
 * @param $atts
 * @param $content
 *
 * @return string
 */

function thim_shortcode_social_link( $atts, $content = null ) {
	$social_link = shortcode_atts( array(
		'style'          => 'style-01',
		'alignment'      => '',
		'link_face'      => '#',
		'link_twitter'   => '#',
		'link_skype'     => '#',
		'link_google'    => '',
		'link_dribble'   => '',
		'link_linkedin'  => '',
		'link_pinterest' => '',
		'link_digg'      => '',
		'link_youtube'   => '',
		'link_instagram' => '',
	), $atts );

	$alignment = '';
	if ( $social_link['alignment'] ) {
		$alignment = 'style = text-align:' . $social_link['alignment'] . '; ';
	}

	$style          = ' ' . esc_attr( $social_link['style'] );
	$link_face      = $social_link['link_face'];
	$link_twitter   = $social_link['link_twitter'];
	$link_skype     = $social_link['link_skype'];
	$link_pinterest = $social_link['link_pinterest'];
	$link_google    = $social_link['link_google'];
	$link_dribble   = $social_link['link_dribble'];
	$link_linkedin  = $social_link['link_linkedin'];
	$link_digg      = $social_link['link_digg'];
	$link_youtube   = $social_link['link_youtube'];
	$link_instagram = $social_link['link_instagram'];

	$html = '<ul class="thim-sc-social-link' . esc_attr( $style ) . '" ' . ent2ncr( $alignment ) . '>';
	if ( $link_face != '' ) {
		$html .= '<li><a class="face" href="' . esc_url( $link_face ) . '" title="' . esc_html__( 'Facebooks', 'hairsalon' ) . '"><i class="fa fa-facebook"></i></a></li>';
	}
	if ( $link_twitter != '' ) {
		$html .= '<li><a class="twitter" href="' . esc_url( $link_twitter ) . '"  title="' . esc_html__( 'Twitter', 'hairsalon' ) . '"><i class="fa fa-twitter"></i></a></li>';
	}
	if ( $link_skype != '' ) {
		$html .= '<li><a class="skype" href="' . esc_url( $link_skype ) . '"  title="' . esc_html__( 'Skype', 'hairsalon' ) . '"><i class="fa fa-skype"></i></a></li>';
	}
	if ( $link_pinterest != '' ) {
		$html .= '<li><a class="pinterest" href="' . esc_url( $link_pinterest ) . '"  title="' . esc_html__( 'Pinterest', 'hairsalon' ) . '"><i class="fa fa-pinterest"></i></a></li>';
	}
	if ( $link_google != '' ) {
		$html .= '<li><a class="google" href="' . esc_url( $link_google ) . '"  title="' . esc_html__( 'Google', 'hairsalon' ) . '"><i class="fa fa-google-plus"></i></a></li>';
	}
	if ( $link_dribble != '' ) {
		$html .= '<li><a class="dribble" href="' . esc_url( $link_dribble ) . '"  title="' . esc_html__( 'Dribble', 'hairsalon' ) . '"><i class="fa fa-dribbble"></i></a></li>';
	}
	if ( $link_linkedin != '' ) {
		$html .= '<li><a class="linkedin" href="' . esc_url( $link_linkedin ) . '"  title="' . esc_html__( 'Linkedin', 'hairsalon' ) . '"><i class="fa fa-linkedin"></i></a></li>';
	}
	if ( $link_digg != '' ) {
		$html .= '<li><a class="digg" href="' . esc_url( $link_digg ) . '"  title="' . esc_html__( 'Digg', 'hairsalon' ) . '"><i class="fa fa-digg"></i></a></li>';
	}
	if ( $link_youtube != '' ) {
		$html .= '<li><a class="youtube" href="' . esc_url( $link_youtube ) . '"  title="' . esc_html__( 'Youtube', 'hairsalon' ) . '"><i class="fa fa-youtube"></i></a></li>';
	}
	if ( $link_instagram != '' ) {
		$html .= '<li><a class="instagram" href="' . esc_url( $link_instagram ) . '"  title="' . esc_html__( 'Instagram', 'hairsalon' ) . '"><i class="fa fa-instagram"></i></a></li>';
	}
	$html .= '</ul>';

	return $html;
}

add_shortcode( 'thim_social_link', 'thim_shortcode_social_link' );
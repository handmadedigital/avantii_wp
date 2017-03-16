<?php
/**
 * Created by PhpStorm.
 * User: khoapq
 * Date: 8/9/2016
 * Time: 9:36 AM
 */


/**
 * Shortcode Textbox
 *
 * @param $atts
 *
 * @return string
 */
function thim_shortcode_textbox( $atts, $content = '' ) {
	$param = shortcode_atts( array(
		'title'         => '',
		'content'       => '',
		'bg_color'      => '',
		'icon_sc_color' => '',
		'css_animation' => '',
		'el_class'      => '',
	), $atts );

	$css_animation = thim_getCSSAnimation( $param['css_animation'] );
	$bg_color = $text_color = '';
	if ( $param['bg_color'] ) {
		$bg_color = 'style = background-color:' . $param['bg_color'] . '; ';
	}
	
	$html = '';

	$html .= '<div class="thim-sc-textbox ' . $param['icon_sc_color'] . ' ' . esc_attr($css_animation) . ' ' . esc_attr( $param['el_class'] ) . ' " '. ent2ncr($bg_color) .'>';
	$html .= '<div class="box-inner">';
	$html .= do_shortcode( '[thim-heading icon_color="' . $param['icon_sc_color'] . '" alignment="center" heading_primary="' . $param['title'] . '"]' );
	$html .= '<div class="content"><p>' . $content . '</p></div>';
	$html .= '</div>';
	$html .= '</div>';


	return $html;
}

add_shortcode( 'thim-textbox', 'thim_shortcode_textbox' );
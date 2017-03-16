<?php
/**
 * Created by PhpStorm.
 * User: khoapq
 * Date: 8/9/2016
 * Time: 9:36 AM
 */


/**
 * Shortcode Services
 *
 * @param $atts
 *
 * @return string
 */
function thim_shortcode_services( $atts ) {
	$param = shortcode_atts( array(
		'title'              => '',
		'items'              => '',
		'background_image'   => 1,
		'background_image_1' => '',
		'background_image_2' => '',
		'box_style'          => '',
		'border_size'        => 0,
		'css_animation'      => '',
		'el_class'           => '',
	), $atts );

	$param['el_class'] .= ' ' . $param['box_style'];
	$sc_css = $box_css = '';

	$col                = 'col-md-' . ( 12 / intval( $param['background_image'] ) );
	$background_image_1 = wp_get_attachment_image_src( $param['background_image_1'], 'full' );
	$background_image_2 = wp_get_attachment_image_src( $param['background_image_2'], 'full' );

	if ( $background_image_1 ) {
		$sc_css .= 'height: ' . $background_image_1[2] . 'px;';
	}

	$box_css .= 'border-width: ' . $param['border_size'] . 'px;';

	$css_animation = thim_getCSSAnimation( $param['css_animation'] );

	$items = vc_param_group_parse_atts( $param['items'] );

	$html = '';

	$sc_style  = 'style="' . $sc_css . '"';
	$box_style = 'style="' . $box_css . '"';
	if ( $items ) {
		$html .= '<div class="thim-sc-services ' . $css_animation . ' ' . esc_attr( $param['el_class'] ) . ' " ' . $sc_style . '>';
		$html .= '<div class="row background">';
		if ( $background_image_1 ) {
			$html .= '<div class="' . $col . '"><div style="background-image: url(' . $background_image_1[0] . ')"></div></div>';
		}
		if ( $background_image_2 && $param['background_image'] === '2' ) {
			$html .= '<div class="' . $col . '"><div style="background-image: url(' . $background_image_2[0] . ')"></div></div>';
		}
		$html .= '</div>';
		$html .= '<div class="box-content" ' . $box_style . '>';
		$html .= '<h3>' . $param['title'] . '</h3>';
		$html .= '<ul class="list-group">';
		foreach ( $items as $item ) {
			$html .= '<li class="list-group-item">';
			$html .= '<span class="name">' . trim( $item['name'] ) . '</span>';
			$html .= '<span class="price badge">' . trim( $item['price'] ) . '</span>';
			$html .= '</li>';
		}
		$html .= '</ul>';
		$html .= '</div>';
		$html .= '</div>';
	}

	return $html;
}

add_shortcode( 'thim-services', 'thim_shortcode_services' );
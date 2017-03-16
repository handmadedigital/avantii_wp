<?php

function thim_shortcode_google_map( $atts ) {

	$google_map = shortcode_atts( array(
		'title'            => esc_html__( 'Our Address', 'hairsalon' ),
		'map_center'       => '',
		'api_key'          => 'AIzaSyAVv2tyh3rLYN0bQlLPyUWkPgGohVUyixE',
		'height'           => '',
		'zoom'             => '',
		'scroll_zoom'      => '',
		'draggable'        => '',
		'map_style'        => '',
		'marker_at_center' => '',
		'marker_icon'      => '',
		'map_cover'        => false,
		'map_cover_image'  => '',
		'animation'        => '',
		'el_class'         => '',
	), $atts );

	// Get settings
	$id     = 'ob-map-canvas-' . md5( $google_map['map_center'] ) . '';
	$height = $google_map['height'] . 'px';
	$data   = 'data-address="' . $google_map['map_center'] . '" ';
	$data .= 'data-zoom="' . $google_map['zoom'] . '" ';
	$data .= 'data-scroll-zoom="' . $google_map['scroll_zoom'] . '" ';
	$data .= 'data-draggable="' . $google_map['draggable'] . '" ';
	$data .= 'data-marker-at-center="' . $google_map['marker_at_center'] . '" ';
	$data .= 'data-style="' . $google_map['map_style'] . '" ';
	$data .= 'data-api_key="' . $google_map['api_key'] . '" ';

	$icon_attachment = wp_get_attachment_image_src( $google_map['marker_icon'] );
	$icon            = $icon_attachment ? $icon_attachment[0] : '';

	$data .= 'data-marker-icon="' . $icon . '" ';

	$cover_attachment = wp_get_attachment_image_src( $google_map['map_cover_image'], 'full' );
	$cover            = $cover_attachment ? $cover_attachment[0] : '';

	$class = 'ob-google-map-canvas';

	$html = '<div class="thim-sc-googlemap" style="height: ' . $height . ';" data-cover="' . $google_map['map_cover'] . '">';
	if ( $google_map['map_cover'] ) {
		$html .= '<div class="map-cover" style="height: ' . $height . '; background-image: url(' . $cover . ');"></div>';
	}
	$html .= '<div class="' . $class . ' ' . esc_attr( $google_map['el_class'] ) . '" style="height: ' . $height . ';" id="' . $id . '" ' . $data . ' ></div>';
	$html .= '</div>';

	return $html;
}

add_shortcode( 'thim-google-map', 'thim_shortcode_google_map' );
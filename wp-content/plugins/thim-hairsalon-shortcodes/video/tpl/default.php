<?php

/**
 * Shortcode Textbox
 *
 * @param $atts
 *
 * @return string
 */
function thim_shortcode_video( $atts, $content = '' ) {
	$video = shortcode_atts( array(
		'title'          => '',
		'description'    => '',
		'self_poster'    => '',
		'external_video' => '',
		'css_animation'  => '',
		'el_class'       => '',
	), $atts );

	$css_animation       = thim_getCSSAnimation( $video['css_animation'] );
	$background_image_id = $video['self_poster'];
	$html                = '';

	$html .= '<div class="thim-sc-video ' . esc_attr( $css_animation ) . ' ' . esc_attr( $video['el_class'] ) . ' ">';
	$html .= '<div class="image">';
	if ( $background_image_id ) {
		$src         = wp_get_attachment_image_src( $background_image_id, 'full' );
		$images_size = @getimagesize( $src['0'] );
		$img_src     = $src['0'];

		$html .= '<div class="media">';
		$html .= '<img src="' . esc_url( $img_src ) . '" alt="' . get_the_title( $background_image_id ) . '" />';
		$html .= '</div>';
	}
	$html .= '</div>';

	$html .= '<div class="video-content">';

	if ( ! empty( $video['title'] ) ) {
		$html .= '<h3>' . esc_attr( $video['title']) . '</h3>';
	}

	if ( ! empty( $video['description'] ) ) {
		$html .= '<p class="watch">' . esc_attr( $video['description']) . '</p>';
	}

	$video_url = $video['external_video'];
	$html .= '<a href="' . esc_attr( $video_url ) . '" class="toggle-video"></a>';

	$html .= '</div>';

	$html .= '</div>';

	return $html;
}

add_shortcode( 'thim-video', 'thim_shortcode_video' );
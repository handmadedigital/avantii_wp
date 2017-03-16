<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Shortcode Counter Box
 *
 * @param $atts
 *
 * @return string
 */
function thim_shortcode_counter_box( $atts ) {
	$counter_box = shortcode_atts( array(
		'counter_list'    => '',
		'number'          => '',
		'label'           => '',
		'style_custom'    => '',
		'number_color'    => '',
		'number_fontsize' => '',
		'number_width'    => '',
		'number_height'   => '',
		'label_color'     => '',
		'border_color'    => '',
		'el_class'        => '',
	), $atts );

	$html         = $style_number = '';
	$number_color = $label_color = $border_color = $counter_list = '';
	$counter_list = vc_param_group_parse_atts( $atts['counter_list'] );

	if ( $counter_box['number_color'] ) {
		$style_number .= 'color:' . $counter_box['number_color'] . '; ';
	}
	if ( $counter_box['number_fontsize'] ) {
		$style_number .= $counter_box['number_fontsize'] ? 'font-size:' . $counter_box['number_fontsize'] . 'px;' : 'font-size: 100px; ';
	}
	if ( $counter_box['number_width'] ) {
		$style_number .= $counter_box['number_width'] ? ' width: ' . $counter_box['number_width'] . 'px;' : 'width: 100px;';
	}
	if ( $counter_box['number_height'] ) {
		$style_number .= $counter_box['number_height'] ? ' min-height: ' . $counter_box['number_height'] . 'px;' : 'min-height: 75px;';
	}
	if ( $counter_box['label_color'] ) {
		$label_color = 'style = color:' . $counter_box['label_color'] . '; ';
	}
	if ( $counter_box['border_color'] ) {
		$border_color = 'style = border-color:' . $counter_box['border_color'] . '; ';
	}

	$html .= '<div class="thim-sc-counter-box">';
	$html .= '<div class="wrapper-counter-box" ' . ent2ncr( $border_color ) . ' >';
	foreach ( $counter_list as $key => $value ) {
		$html .=
			'<div class="counter-box-item" ' . ent2ncr( $border_color ) . '>
	<div class="number" style="' . esc_attr( $style_number ) . '"><span class="counter-up" data-number="' . $value['number'] . '">0</span></div>
	<div class="text" ' . ent2ncr( $label_color ) . '>
	' . esc_attr( $value['label'] ) . '</div>
</div>';
	}
	$html .= '</div>';
	$html .= '</div>';

	return $html;
}

add_shortcode( 'thim-counter-box', 'thim_shortcode_counter_box' );
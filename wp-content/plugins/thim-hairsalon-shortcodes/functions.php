<?php
/**
 * @param $css_animation
 *
 * @return string
 */

function thim_getCSSAnimation( $css_animation ) {
	$output = '';
	if ( $css_animation != '' ) {
		wp_enqueue_script( 'waypoints' );
		$output = ' wpb_animate_when_almost_visible wpb_' . $css_animation;
	}

	return $output;
}
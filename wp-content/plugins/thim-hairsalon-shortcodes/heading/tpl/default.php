<?php
/**
 * Shortcode Heading
 *
 * @param $atts
 *
 * @return string
 */
function thim_shortcode_heading( $atts ) {
	$heading = shortcode_atts( array(
		'heading_primary'     => '',
		'heading_tag'         => 'h3',
		'title_color'         => '',
		'title_size'          => '',
		'title_weight'        => '',
		'title_style'         => '',
		'title_custom'        => '',
		'heading_secondary'   => '',
		'hd_secondary_color'  => '',
		'description'         => '',
		'description_color'   => '',
		'description_size'    => '',
		'description_align'   => '',
		'description_weight'  => '',
		'description_style'   => '',
		'description_padding' => '',
		'description_custom'  => '',
		'icon_color'          => '',
		'display'             => '',
		'button_text_link'    => '',
		'button_text'         => '',
		'css_animation'       => '',
		'el_class'            => '',
		'alignment'           => '',
	), $atts );

	$hd_secondary  = '';
	$css_animation = thim_getCSSAnimation( $heading['css_animation'] );
	$icon_class    = ' ' . esc_attr( $heading['icon_color'] );


	$alignment = '';
	if ( $heading['alignment'] ) {
		$alignment = 'style = text-align:' . $heading['alignment'] . '; ';
	}

//  primary inline style
	$title_css = '';
	if ( $heading['title_color'] ) {
		$title_css .= 'color:' . $heading['title_color'] . '; ';
	}
	if ( $heading['title_size'] ) {
		$title_css .= 'font-size:' . $heading['title_size'] . 'px' . '; ';
	}
	if ( $heading['title_weight'] ) {
		$title_css .= 'font-weight:' . $heading['title_weight'] . '; ';
	}
	if ( $heading['title_style'] ) {
		$title_css .= 'font-style:' . $heading['title_style'] . '; ';
	}
	if ( $title_css ) {
		$title_css = ' style="' . $title_css . '"';
	}

// Heading secondary inline style
	if ( $heading['hd_secondary_color'] ) {
		$hd_secondary = 'color:' . $heading['hd_secondary_color'] . '; ';
	}

// Icon class style
	if ( $heading['display'] == 'yes' ) {
		$icon_wrap = 'no-icon';
	} else {
		$icon_wrap = '';
	}

//Description inline style
	$des_css = '';
	if ( $heading['description_color'] ) {
		$des_css .= 'color:' . $heading['description_color'] . '; ';
	}
	if ( $heading['description_size'] ) {
		$des_css .= 'font-size:' . $heading['description_size'] . 'px' . '; ';
	}
	if ( $heading['description_align'] ) {
		$des_css .= 'text-align:' . $heading['description_align'] . '; ';
	}
	if ( $heading['description_weight'] ) {
		$des_css .= 'font-weight:' . $heading['description_weight'] . '; ';
	}
	if ( $heading['description_style'] ) {
		$des_css .= 'font-style:' . $heading['description_style'] . '; ';
	}
	if ( $heading['description_padding'] ) {
		$des_css .= 'padding:' . $heading['description_padding'] . '; ';
	}
	if ( $des_css ) {
		$des_css = ' style="' . $des_css . '"';
	}

	$descripton = '';
	if ( $heading['description'] ) {
		$descripton .= '<div class="heading-des" ' . ent2ncr( $des_css ) . '>' . esc_attr( $heading['description'] ) . '</div>';
	}

	$button = '';
	if ( $heading['button_text'] <> '' && $heading['button_text_link'] <> '' ) {
		$button .= '<div class="heading-button"><a href="' . esc_url( $heading['button_text_link'] ) . '">' . esc_attr( $heading['button_text'] ) . '</a></div>';
	}

	$html = '<div class="thim-sc-heading ' . ent2ncr( $css_animation ) . ' ' . esc_attr( $heading['el_class'] ) . '" ' . $alignment . '>
	<div class="sc-heading article_heading ' . esc_attr( $icon_class ) . esc_attr( $icon_wrap ) . ' ">
	<' . $heading['heading_tag'] . ' ' . ent2ncr( $title_css ) . ' class="heading_primary">
	' . $heading['heading_primary'] . '
					<span class="heading_secondary" style="font-size:' . esc_attr( $heading['title_size'] ) . 'px' . '; ' . esc_attr( $hd_secondary ) . '">
						' . $heading['heading_secondary'] . '
					</span>
</' . $heading['heading_tag'] . '>
</div>

' . $descripton . ' 
' . $button . '

</div>';

	return $html;
}

add_shortcode( 'thim-heading', 'thim_shortcode_heading' );
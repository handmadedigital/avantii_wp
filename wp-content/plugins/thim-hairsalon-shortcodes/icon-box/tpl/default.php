<?php

/**
 * Shortcode Icon Box
 *
 * @param $atts
 *
 * @return string
 */


function thim_shortcode_icon_box( $atts ) {

	$icon_box = shortcode_atts( array(
		'title'              => esc_attr__( 'This is an icon box.', 'hairsalon' ),
		'heading_tag'        => 'h3',
		'title_color'        => '',
		'title_size'         => '',
		'title_weight'       => '',
		'title_style'        => '',
		'title_custom'       => '',
		'description'        => '',
		'description_color'  => '',
		'description_size'   => '',
		'description_weight' => '',
		'description_style'  => '',
		'description_custom' => '',
		'icon_type'          => '',
		'icon_fontawesome'   => 'fa fa-heart',
		'icon_openiconic'    => 'vc-oi vc-oi-dial',
		'icon_typicons'      => 'typcn typcn-adjust-brightness',
		'icon_entypo'        => 'entypo-icon entypo-icon-note',
		'icon_linecons'      => 'vc_li vc_li-heart',
		'icon_size'          => '40',
		'icon_width'         => '40',
		'icon_layout'        => 'left',
		'icon_color'         => '',
		'icon_image'         => '',
		'image_size'         => '',
		'alignment'          => '',
		'el_class'           => '',
		'css_animation'      => '',

	), $atts );

	$css_animation = thim_getCSSAnimation( $icon_box['css_animation'] );

	//Title inline style
	$title_css = '';
	if ( $icon_box['title_color'] ) {
		$title_css .= 'color:' . $icon_box['title_color'] . '; ';
	}
	if ( $icon_box['title_size'] ) {
		$title_css .= 'font-size:' . $icon_box['title_size'] . 'px' . '; ';
	}
	if ( $icon_box['title_weight'] ) {
		$title_css .= 'font-weight:' . $icon_box['title_weight'] . '; ';
	}
	if ( $icon_box['title_style'] ) {
		$title_css .= 'font-style:' . $icon_box['title_style'] . '; ';
	}
	if ( $title_css ) {
		$title_css = ' style="' . $title_css . '"';
	}

	//Description inline style
	$des_css = '';
	if ( $icon_box['description_color'] ) {
		$des_css .= 'color:' . $icon_box['description_color'] . '; ';
	}
	if ( $icon_box['description_size'] ) {
		$des_css .= 'font-size:' . $icon_box['description_size'] . 'px' . '; ';
	}
	if ( $icon_box['description_weight'] ) {
		$des_css .= 'font-weight:' . $icon_box['description_weight'] . '; ';
	}
	if ( $icon_box['description_style'] ) {
		$des_css .= 'font-style:' . $icon_box['description_style'] . '; ';
	}
	if ( $des_css ) {
		$des_css = ' style="' . $des_css . '"';
	}

	// Image
	$image_size = 'thumbnail';
	if ( $icon_box['image_size'] ) {
		if ( in_array( $icon_box['image_size'], array( 'medium', 'large', 'full' ) ) ) {
			$image_size = $icon_box['image_size'];
		}

		preg_match_all( '/\d+/', $icon_box['image_size'], $size_matches );
		if ( $size_matches[0] ) {
			if ( isset ( $size_matches[0][0] ) && isset ( $size_matches[0][1] ) ) {
				$image_size = array( $size_matches[0][0], $size_matches[0][1] );
			} else {
				$image_size = array( 100, 100 );
			}
		}
	}

	$image_html = wp_get_attachment_image( $icon_box['icon_image'], $image_size );

	//Icon inline style
	$icon_css = '';
	if ( $icon_box['icon_color'] ) {
		$icon_css .= 'color:' . $icon_box['icon_color'] . '; ';
	}
	if ( $icon_box['icon_size'] ) {
		$icon_css .= 'font-size:' . $icon_box['icon_size'] . 'px; ';
	}
	if ( $icon_css ) {
		$icon_css = ' style="' . $icon_css . '"';
	}

	//Icon font type
	$icon_font = '';
	if ( in_array( $icon_box['icon_type'], array( 'fontawesome', 'openiconic', 'typicons', 'entypo', 'linecons' ) ) ) {
		$icon_font = 'class = "vc_icon_element-icon ' . $icon_box[ 'icon_' . $icon_box['icon_type'] . '' ] . ' " ' . $icon_css;
		wp_enqueue_style( 'vc_' . $icon_box['icon_type'] . '' );
	}

	$icon_alignment = '';
	if ( $icon_box['alignment'] ) {
		$icon_alignment = 'style = "text-align: ' . $icon_box['alignment'] . ';"';
	}
	$icon_html =
		'<div class="vc_icon_element vc_icon_element-outer" ' . $icon_alignment . '>
			<div class="vc_icon_element-inner">
				<i ' . $icon_font . '></i>
			</div>
		</div>';

	$icon = '';
	if ( $icon_box['icon_type'] == 'image' ) {
		$icon .= $image_html;
	} else {
		$icon .= $icon_html;
	}
	// style icon width
	$icon_style = $boxes_icon_style = '';
	$icon_style .= ( $icon_box['icon_width'] != '' ) ? 'width: ' . $icon_box['icon_width'] . 'px;height: ' . $icon_box['icon_width'] . 'px;' : '';
	if ( $icon_style ) {
		$boxes_icon_style = 'style="' . $icon_style . '"';
	}

	$html        = '';
	$content_css = '';
	// style width content
	$content_css .= ( $icon_box['icon_width'] != '' && $icon_box['icon_width'] ) ? 'width: calc( 100% - ' . $icon_box['icon_width'] . 'px - 20px);' : '';

	if ( $icon_box['alignment'] ) {
		$content_css .= 'text-align:' . $icon_box['alignment'] . '; ';
	}
	if ( $content_css ) {
		$content_css = ' style="' . $content_css . '"';
	}

	$html .=
		'<div class="thim-sc-icon-box ' . $css_animation . ' ' . esc_attr( $icon_box['el_class'] ) . '" >
				<div class="smicon-box ' . $icon_box['icon_layout'] . '">
					<div class="icon" ' . $boxes_icon_style . ' >' . $icon . '</div>
					<div class="content" ' . $content_css . '>
						<' . $icon_box['heading_tag'] . ' class="title" ' . $title_css . '>' . esc_attr( $icon_box['title'] ) . '</' . $icon_box['heading_tag'] . '>
						<div class="des" ' . $des_css . '>' . esc_attr( $icon_box['description'] ) . '</div>
					</div>
				</div>
			</div>';

	return $html;
}

add_shortcode( 'thim-icon-box', 'thim_shortcode_icon_box' );
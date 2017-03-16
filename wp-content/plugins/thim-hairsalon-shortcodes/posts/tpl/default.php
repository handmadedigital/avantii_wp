<?php
/**
 * Created by PhpStorm.
 * User: khoapq
 * Date: 8/11/2016
 * Time: 8:38 AM
 */

/**
 * Shortcode Posts
 *
 * @param $atts
 *
 * @return string
 */
add_shortcode( 'thim-posts', 'thim_shortcode_posts' );
function thim_shortcode_posts( $atts ) {
	$param_post = shortcode_atts( array(
		'post_limit'    => 3,
		'post_column'   => 3,
		'display'       => '',
		'css_animation' => '',
		'post_button'   => '',
		'el_class'      => '',
	), $atts );

	$button = $html = '';

	$css_animation = thim_getCSSAnimation( $param_post['css_animation'] );
	$class         = 'col-sm-6 col-md-' . ( 12 / $param_post['post_column'] );
	if ( $param_post['post_button'] == true ) {
		$button = ' hide';
	}

	$posts_args = array(
		'posts_per_page' => $param_post['post_limit'],
	);

	$posts = new WP_Query( $posts_args );

	$html .= '<div class="thim-sc-posts site-content ' . $css_animation . ' ' . esc_attr( $param_post['el_class'] ) . ' ">';
	$html .= '<div class="blog-content">';
	if ( $posts->have_posts() ) {
		while ( $posts->have_posts() ) :
			$posts->the_post();
			$html .= '<article id="post-' . get_the_ID() . '" class="' . $class . '">';
			$html .= '<div class="content-inner">';

			$html .= '<div class="entry-top">';

			$src     = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );
			$img_src = thim_aq_resize( $src[0], 375, 370, true );
			if ( ! $img_src ) {
				$img_src = $src[0];
			}
			if ( $img_src ) {
				$html .= '<div class="thumbnail"><a href="' . esc_url( get_permalink( get_the_ID() ) ) . '">';
				$html .= '<img src="' . esc_attr( $img_src ) . '" alt="' . get_the_title() . '" title="' . get_the_title() . '"/>';
				$html .= '</a></div>';
			}
			$html .= ' </div > ';

			$html .= '<div class="entry-content"> ';

			$html .= '<header class="entry-header" > ';
			$html .= '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark"> ' . get_the_title() . '</a></h3>';
			$html .= '</header >';

			$html .= '<div class="entry-meta">';
			$html .= thim_get_entry_meta_author();
			$html .= thim_get_entry_meta_date();
			$html .= '</div>';

			$html .= '<div class="entry-summary" > ';
			$html .= get_the_excerpt();
			$html .= '</div >';

			$html .= '<div class="readmore' . esc_attr( $button ) . '" > ';
			$html .= '<a href = "' . esc_url( get_permalink() ) . '" > ' . esc_html__( 'Read More', 'hairsalon' ) . ' </a > ';
			$html .= '</div >';

			$html .= '</div > ';

			$html .= '</div > ';
			$html .= '</article > ';
		endwhile;
	}
	$html .= '</div>';
	$html .= '</div>';
	wp_reset_postdata();

	return $html;
}


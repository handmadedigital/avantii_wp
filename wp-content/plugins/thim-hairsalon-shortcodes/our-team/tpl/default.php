<?php

/**
 * Shortcode Our Team
 *
 * @param $atts
 *
 * @param $content
 *
 * @return string
 */

// Get list category
function thim_get_team_categories() {
	global $wpdb;
	$query = $wpdb->get_results( $wpdb->prepare(
		"
				  SELECT      t1.term_id, t2.name
				  FROM        $wpdb->term_taxonomy AS t1
				  INNER JOIN $wpdb->terms AS t2 ON t1.term_id = t2.term_id
				  WHERE t1.taxonomy = %s
				  AND t1.count > %d
				  ",
		'our_team_category', 0
	) );

	$cats                                     = array();
	$cats[ esc_html__( 'All', 'hairsalon' ) ] = 'all';
	if ( ! empty( $query ) ) {
		foreach ( $query as $value ) {
			$cats[ $value->name ] = $value->term_id;
		}
	}

	return $cats;
}

function thim_shortcode_our_team( $atts, $content = null ) {
	$our_team = shortcode_atts( array(
		'limit_post'    => '',
		'column'        => '',
		'cat_id'        => '',
		'css_animation' => '',
		'el_class'      => '',
	), $atts );

	$el_class      = ' ' . esc_attr( $our_team['el_class'] );
	$css_animation = thim_getCSSAnimation( $our_team['css_animation'] );
	if ( $our_team['column'] <> '' ) {
		$columns = 12 / $our_team['column'];
	} else {
		$columns = 3;
	}

	$args_team = array(
		'posts_per_page' => $our_team['limit_post'],
		'post_type'      => 'our_team'
	);

	if ( $our_team['cat_id'] && $our_team['cat_id'] != 'all' ) {
		$args_team['tax_query'] = array(
			array(
				'taxonomy' => 'our_team_category',
				'field'    => 'term_id',
				'terms'    => $our_team['cat_id']
			),
		);

	}

	$our_team = new WP_Query( $args_team );

	$html = '';
	if ( $our_team->have_posts() ) {
		$html .= '<div class="thim-sc-our-team ' . $css_animation . $el_class . '"><ul class="list-our-team row">';
		while ( $our_team->have_posts() ): $our_team->the_post();
			$regency       = get_post_meta( get_the_ID(), 'regency', true );
			$link_face     = get_post_meta( get_the_ID(), 'face_url', true );
			$link_twitter  = get_post_meta( get_the_ID(), 'twitter_url', true );
			$skype_url     = get_post_meta( get_the_ID(), 'skype_url', true );
			$rss_url       = get_post_meta( get_the_ID(), 'rss_url', true );
			$dribbble_url  = get_post_meta( get_the_ID(), 'dribbble_url', true );
			$linkedin_url  = get_post_meta( get_the_ID(), 'linkedin_url', true );
			$instagram_url = get_post_meta( get_the_ID(), 'instagram_url', true );
			$image_id      = get_post_thumbnail_id();
			$image_url     = wp_get_attachment_image( $image_id, 'our_team', false, array( 'alt'   => esc_attr( get_the_title() ),
			                                                                               'title' => esc_attr( get_the_title() )
			) );

			$html .= '<li class="col-sm-' . $columns . '"><div class="content-list-our-team">';
			$html .= '<div class="our-team-image">' . $image_url . '</div>';
			$html .= '<div class="content-team"><div class="our-team-info">';
			$html .= '<h4 class="name">' . get_the_title() . '</h4>';

			if ( $regency <> '' ) {
				$html .= '<div class="regency">' . $regency . '</div>';
			}
			$html .= '</div>';
			$html .= '<ul class="social-team">';
			if ( $link_face <> '' ) {
				$html .= '<li><a class="facebook" target="_blank" href="' . $link_face . '"><i class="fa fa-facebook"></i></a></li>';
			}
			if ( $link_twitter <> '' ) {
				$html .= '<li><a class="twitter" target="_blank" href="' . $link_twitter . '"><i class="fa fa-twitter"></i></a></li>';
			}
			if ( $skype_url <> '' ) {
				$html .= '<li><a class="skype" target="_blank" href="' . $skype_url . '"><i class="fa fa-skype"></i></a></li>';
			}
			if ( $linkedin_url <> '' ) {
				$html .= '<li><a class="linkedin" target="_blank" href="' . $linkedin_url . '"><i class="fa fa-linkedin"></i></a></li>';
			}
			if ( $rss_url <> '' ) {
				$html .= '<li><a class="rss" target="_blank" href="' . $rss_url . '"><i class="fa fa-rss"></i></a></li>';
			}
			if ( $dribbble_url <> '' ) {
				$html .= '<li><a class="dribble" target="_blank" href="' . $dribbble_url . '"><i class="fa fa-dribbble"></i></a></li>';
			}
			if ( $instagram_url <> '' ) {
				$html .= '<li><a class="instagram" target="_blank" href="' . $instagram_url . '"><i class="fa fa-instagram"></i></a></li>';
			}
			$html .= '</ul></div>';
			$html .= '</div></li>';
		endwhile;
		$html .= '</ul></div>';
	}
	wp_reset_postdata();

	return $html;
}

add_shortcode( 'thim-our-team', 'thim_shortcode_our_team' );
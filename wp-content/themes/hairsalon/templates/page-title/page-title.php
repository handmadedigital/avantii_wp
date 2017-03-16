<?php
/**
 * Page Title Bar
 *
 */

global $wp_query, $post;
$GLOBALS['post']      = @$wp_query->post;
$thim_options         = get_theme_mods();
$thim_heading_top_src = $custom_title = $subtitle = $text_color = $sub_color = $bg_color = $front_title = '';
$hide_breadcrumb      = $hide_title = 0;

$cat_obj = $wp_query->get_queried_object();
if ( isset( $cat_obj->term_id ) ) {
	$cat_ID = $cat_obj->term_id;
} else {
	$cat_ID = "";
}

if ( isset( $thim_options['disable_page_title_content'] ) ) {
	$hide_title = get_theme_mod( 'disable_page_title_content' );
}

if ( isset( $thim_options['disable_breadcrumb'] ) ) {
	$hide_breadcrumb = get_theme_mod( 'disable_breadcrumb' );
}

if ( ( isset( $thim_options['page_title_background_image'] ) && get_theme_mod( 'page_title_background_image' ) <> '' ) ) {
	$thim_heading_top_img = get_theme_mod( 'page_title_background_image' );
	$thim_heading_top_src = $thim_heading_top_img; // For the default value

	if ( is_numeric( $thim_heading_top_img ) ) {
		$thim_heading_top_attachment = wp_get_attachment_image_src( $thim_heading_top_img, 'full' );
		$thim_heading_top_src        = $thim_heading_top_attachment[0];
	}
}

// Get style from metabox
if ( is_page() || is_single() ) {
	$postid               = get_the_ID();
	$using_custom_heading = get_post_meta( $postid, 'thim_enable_custom_title', true );

	if ( $using_custom_heading ) {
		$array_title = get_post_meta( $postid, 'thim_group_custom_title', false );
		$array_bg    = get_post_meta( $postid, 'thim_group_custom_background', false );

		if ( isset( $array_title[0] ) ) {
			if ( isset( $array_title[0]['thim_hide_title'] ) ) {
				$hide_title = $array_title[0]['thim_hide_title'];
			}
			if ( isset( $array_title[0]['thim_hide_breadcrumbs'] ) ) {
				$hide_breadcrumb = $array_title[0]['thim_hide_breadcrumbs'];
			}
			if ( isset( $array_title[0]['thim_custom_title'] ) ) {
				$custom_title = $array_title[0]['thim_custom_title'];
			}
			if ( isset( $array_title[0]['thim_custom_subtitle'] ) ) {
				$subtitle = $array_title[0]['thim_custom_subtitle'];
			}
			if ( isset( $array_title[0]['thim_color_title'] ) ) {
				$text_color_1 = $array_title[0]['thim_color_title'];
				if ( $text_color_1 <> '' ) {
					$text_color = $text_color_1;
				}
			}
			if ( isset( $array_title[0]['thim_color_subtitle'] ) ) {
				$sub_color_1 = $array_title[0]['thim_color_subtitle'];
				if ( $sub_color_1 <> '' ) {
					$sub_color = $sub_color_1;
				}
			}
		}
		if ( isset( $array_bg[0] ) ) {
			$bg_color_1 = $array_bg[0]['thim_heading_background'];
			if ( $bg_color_1 <> '' ) {
				$bg_color = $bg_color_1;
			}
			if ( isset( $array_bg[0]['thim_heading_image'] ) ) {
				$thim_heading_top_img = $array_bg[0]['thim_heading_image'];
				$thim_heading_top_src = $thim_heading_top_img[0];

				if ( is_numeric( $thim_heading_top_img[0] ) ) {
					$thim_heading_top_attachment = wp_get_attachment_image_src( $thim_heading_top_img[0], 'full' );
					$thim_heading_top_src        = $thim_heading_top_attachment[0];
				}
			}
		}
	}
}
$hide_title      = ( $hide_title == '1' ) ? '1' : $hide_title;
$hide_breadcrumb = ( $hide_breadcrumb == '1' ) ? '1' : $hide_breadcrumb;


// style css
$c_css_style = '';
$c_css_style .= ( $bg_color != '' ) ? 'background-color: ' . $bg_color . ';' : '';
$c_css_style .= ( $thim_heading_top_src != '' ) ? 'background-image:url(' . $thim_heading_top_src . ');' : '';

$c_css_style .= ( $text_color != '' ) ? 'color: ' . $text_color . ';' : '';
$c_css_sub_color = ( $sub_color != '' ) ? 'style="color:' . $sub_color . '"' : '';

$c_css = ( $c_css_style != '' ) ? 'style="' . $c_css_style . '"' : '';

$class_icon_default = '';
if ( ( get_theme_mod( 'breadcrumb_icon' ) == '' ) || ( ! isset( $thim_options['breadcrumb_icon'] ) ) ) {
	$class_icon_default = 'icon-default';
}
?>


<div class="page-title">
	<?php if ( get_theme_mod( 'enable_page_title', true ) ) : ?>
		<div class="main-top" <?php echo ent2ncr( $c_css ); ?> data-stellar-background-ratio="0.5">
			<span class="overlay-top-header"></span>
			<?php if ( $hide_title != '1' ) : ?>
				<div class="container content">
					<div class="row">
						<div class="col-md-6 alignleft">
							<?php
							if ( is_single() ) {
								$typography = 'h2';
							} else {
								$typography = 'h1';
							}

							if ( ( get_post_type() == "product" ) ) {
								echo '<' . $typography . '>';
								woocommerce_page_title();
								echo '</' . $typography . '>';
							} elseif ( ( is_category() || is_archive() || is_search() || is_404() ) ) {
								echo '<' . $typography . '>';
								echo thim_archive_title();
								echo '</' . $typography . '>';

							} elseif ( is_page() || is_single() ) {
								if ( is_single() ) {
									if ( get_post_type() == "post" ) {
										if ( $custom_title ) {
											$single_title = $custom_title;
										} else {
											$category     = get_the_category();
											$category_id  = get_cat_ID( $category[0]->cat_name );
											$single_title = get_category_parents( $category_id, false, " " );
										}
										echo '<' . $typography . '>' . $single_title;
										echo '</' . $typography . '>';
									}

									if ( get_post_type() == "our_team" ) {
										echo '<' . $typography . '>' . esc_html__( 'Our Team', 'hairsalon' );
										echo '</' . $typography . '>';
									}
									if ( get_post_type() == "testimonials" ) {
										echo '<' . $typography . '>' . esc_html__( 'Testimonials', 'hairsalon' );
										echo '</' . $typography . '>';
									}
								} else {
									echo '<' . $typography . '>';
									echo ( $custom_title != '' ) ? $custom_title : get_the_title( get_the_ID() );
									echo '</' . $typography . '>';
								}
							} elseif ( is_front_page() || is_home() ) {
								$front_title = '';
								if ( get_option( 'page_for_posts', true ) ) {
									$front_title = get_the_title( get_option( 'page_for_posts', true ) );
								}
								echo '<h1>';
								echo esc_attr( $front_title );
								echo '</h1>';
							}
							?>
						</div><!-- .alignleft -->

						<div class="col-md-6 alignright <?php echo esc_attr( $class_icon_default ); ?>">
							<?php if ( $hide_breadcrumb != '1' ) :
								if ( ! is_front_page() || ! is_home() ) {
									if ( get_post_type() == 'product' ) {
										woocommerce_breadcrumb();
									} else {
										thim_breadcrumbs();
									}
								}
							endif; ?>
						</div><!-- .alignright -->
					</div><!-- .row -->
				</div><!-- .container -->
			<?php endif; ?>
		</div><!-- .main-top -->
	<?php endif; ?>
</div><!-- .page-title -->
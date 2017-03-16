<?php

function thim_get_all_plugins_require( $plugins ) {
	return array(
		array(
			'name'     => 'Visual Composer',
			'slug'     => 'js_composer',
			'source'   => THIM_DIR . 'inc/plugins/js_composer.zip',
			'required' => true,
			'version'  => '4.12',
			'icon'     => THIM_URI . 'assets/images/plugins/js_composer.png',
		),
		array(
			'name'     => 'Thim Our Team',
			'slug'     => 'thim-our-team',
			'source'   => THIM_DIR . 'inc/plugins/thim-our-team.zip',
			'required' => false,
			'version'  => '1.3.1',
		),
		array(
			'name'     => 'Thim Testimonials',
			'slug'     => 'thim-testimonials',
			'source'   => THIM_DIR . 'inc/plugins/thim-testimonials.zip',
			'required' => false,
			'version'  => '1.3.1',
		),
		array(
			'name'     => 'Revolution Slider',
			'slug'     => 'revslider',
			'source'   => THIM_DIR . '/inc/plugins/revslider.zip',
			'version'  => '5.2.5.4',
			'required' => false,
			'icon'     => THIM_URI . 'assets/images/plugins/revslider.png',
		),
		array(
			'name'     => 'Thim Hairsalon Shortcodes',
			'slug'     => 'thim-hairsalon-shortcodes',
			'source'   => THIM_DIR . 'inc/plugins/thim-hairsalon-shortcodes.zip',
			'required' => true,
			'version'  => '0.1.0',
		),
		array(
			'name' => 'MailChimp',
			'slug' => 'mailchimp-for-wp',
		),
		array(
			'name' => 'Contact Form 7',
			'slug' => 'contact-form-7',
		),
		array(
			'name' => 'WooCommerce',
			'slug' => 'woocommerce',
		),
		array(
			'name' => 'Instagram Feed',
			'slug' => 'instagram-feed',
		),
		array(
			'name' => 'Widget Logic',
			'slug' => 'widget-logic',
		),
		array(
			'slug' => 'yith-woocommerce-wishlist',
			'name' => 'YITH WooCommerce Wishlist',
			'icon' => 'https://ps.w.org/yith-woocommerce-wishlist/assets/icon-128x128.jpg',
		)
	);
}

add_action( 'thim_core_get_all_plugins_require', 'thim_get_all_plugins_require' );
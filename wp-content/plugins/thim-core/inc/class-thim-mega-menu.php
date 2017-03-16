<?php

/**
 * Created by PhpStorm.
 * User: khoapq
 * Date: 8/24/2016
 * Time: 10:02 AM
 */


/**
 * Class Thim_Mega_Menu
 *
 * @package Thim_Core
 * @since   0.3.1
 */
class Thim_Mega_Menu {

	/**
	 * @var null
	 *
	 * @since 0.3.1
	 */
	protected static $_instance = null;

	/**
	 * Return unique instance of Thim_Mega_Menu.
	 *
	 * @since 0.3.1
	 */
	static function instance() {
		if ( ! self::$_instance ) {
			self::$_instance = new self();
		}

		return self::$_instance;
	}

	/**
	 * Thim_Mega_Menu constructor.
	 *
	 * @since 0.3.1
	 */
	public function __construct() {

		// Compatibility with Max Mega Menu
		if ( class_exists( 'Mega_Menu' ) ) {
			return;
		}

		$this->init();
	}

	/**
	 * Include Mega Menu
	 *
	 * @since 0.3.1
	 */
	private function init() {
		include_once THIM_CORE_INC_PATH . '/includes/megamenu/megamenu.php';
	}

	/**
	 * Determines if Mega Menu has been enabled for a given menu location.
	 *
	 * @since 0.3.1
	 *
	 * @param mixed $location - theme location identifier
	 *
	 * @return bool
	 */
	public static function menu_is_enabled( $location = false ) {

		if ( ! $location ) {
			return true; // the plugin is enabled
		}

		if ( ! has_nav_menu( $location ) ) {
			return false;
		}

		// if a location has been passed, check to see if MMM has been enabled for the location
		$settings = get_option( 'megamenu_settings' );

		return is_array( $settings ) && isset( $settings[ $location ]['enabled'] ) && $settings[ $location ]['enabled'] == true;
	}
}
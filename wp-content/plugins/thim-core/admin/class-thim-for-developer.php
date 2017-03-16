<?php

/**
 * Class Thim_For_Developer.
 *
 * @since 0.4.0
 */
class Thim_For_Developer {

	/**
	 * @var null
	 *
	 * @since 0.5.0
	 */
	protected static $_instance = null;

	/**
	 * @var string
	 *
	 * @since 0.5.0
	 */
	public static $page_key = 'developer';

	/**
	 * @var string
	 *
	 * @since 0.5.0
	 */
	private static $action_ajax = 'thim-developer';

	/**
	 * Get url ajax.
	 *
	 * @since 0.5.0
	 */
	public static function get_url_ajax() {
		return admin_url( 'admin-ajax.php?action=' . self::$action_ajax );
	}

	/**
	 * @param $package
	 *
	 * @return string
	 */
	public static function get_url_download( $package ) {
		$url_ajax         = self::get_url_ajax();
		$url_ajax_package = add_query_arg( 'package', $package, $url_ajax );

		return $url_ajax_package;
	}

	/**
	 * Return unique instance of Thim_For_Developer.
	 *
	 * @since 0.5.0
	 */
	static function instance() {
		if ( ! self::$_instance ) {
			self::$_instance = new self();
		}

		return self::$_instance;
	}

	/**
	 * Thim_For_Developer constructor.
	 *
	 * @since 0.5.0
	 */
	public function __construct() {
		$this->init_hooks();
	}

	/**
	 * Init hooks.
	 *
	 * @since 0.5.0
	 */
	private function init_hooks() {
		add_action( 'wp_ajax_' . self::$action_ajax, array( $this, 'handle_ajax' ) );
	}

	/**
	 * Handle ajax
	 *
	 * @since 0.5.0
	 */
	public function handle_ajax() {
		$package = isset( $_REQUEST['package'] ) ? $_REQUEST['package'] : false;

		if ( ! $package ) {
			return;
		}

		if ( $package === 'settings' ) {
			Thim_Export_Service::settings();
		}

		if ( $package === 'theme_options' ) {
			Thim_Export_Service::theme_options();
		}
	}
}
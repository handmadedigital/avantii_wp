<?php

/**
 * Class Thim_Importer.
 *
 * @package   Thim_Core
 * @since     0.1.0
 */
class Thim_Importer {
	/**
	 * @since 0.2.0
	 *
	 * @var null
	 */
	protected static $_instance = null;

	/**
	 * Page key.
	 *
	 * @since 0.3.0
	 *
	 * @var string
	 */
	public static $page_key = 'importer';

	public static $key_option_demo_installed = 'thim_importer_demo_installed';

	/**
	 * Return unique instance of Thim_Importer.
	 *
	 * @since 0.2.0
	 */
	static function instance() {
		if ( ! self::$_instance ) {
			self::$_instance = new self();
		}

		return self::$_instance;
	}

	/**
	 * Get key demo installed.
	 *
	 * @since 0.6.0
	 *
	 * @return bool|string
	 */
	public static function get_key_demo_installed() {
		$option = get_option( self::$key_option_demo_installed );

		if ( empty( $option ) ) {
			return false;
		}

		return $option;
	}

	/**
	 * Update key demo installed.
	 *
	 * @since 0.8.1
	 *
	 * @param string|bool $demo
	 *
	 * @return bool
	 */
	public static function update_key_demo_installed( $demo = '' ) {
		return update_option( self::$key_option_demo_installed, $demo );
	}

	/**
	 * Add notice.
	 *
	 * @since 0.3.0
	 *
	 * @param string $content
	 * @param string $type
	 */
	public static function add_notification( $content = '', $type = 'success' ) {
		Thim_Dashboard::add_notification( array(
			'content' => $content,
			'type'    => $type,
			'page'    => self::$page_key,
		) );
	}

	/**
	 * Get packages import.
	 *
	 * @since 0.3.0
	 *
	 * @return array
	 */
	public static function get_import_packages() {
		return array(
			'theme_options' => array(
				'title'       => esc_attr__( 'Theme Options', 'thim-core' ),
				'description' => esc_attr__( 'This will import theme options and will rewrite all current settings.', 'thim-core' ),
			),
			'main_content'  => array(
				'title'       => esc_attr__( 'Main Content', 'thim-core' ),
				'description' => esc_attr__( 'This will import posts, pages, comments, menus, custom fields, terms and custom posts.', 'thim-core' ),
			),
			'media'         => array(
				'title'       => esc_attr__( 'Media File', 'thim-core' ),
				'description' => esc_attr__( 'This will download media files.', 'thim-core' ),
				'required'    => 'main_content'
			),
			'widgets'       => array(
				'title'       => esc_attr__( 'Widgets', 'thim-core' ),
				'description' => esc_attr__( 'This will import widgets.', 'thim-core' ),
			),
			'revslider'     => array(
				'title'           => esc_attr__( 'Slider Revolution', 'thim-core' ),
				'description'     => esc_attr__( 'This will import Slider Revolution.', 'thim-core' ),
				'plugin_required' => 'revslider',
			),
		);
	}

	/**
	 * Get demo data.
	 *
	 * @since 0.2.0
	 *
	 * @return array
	 */
	public static function get_demo_data() {

		$THEME_URI  = get_template_directory_uri();
		$THEME_PATH = get_template_directory();

		$file_demo_data = $THEME_PATH . '/inc/data/demos.php';
		if ( ! file_exists( $file_demo_data ) ) {
			return array();
		}

		$demo_data = include $file_demo_data;

		if ( ! is_array( $demo_data ) ) {
			return array();
		}

		foreach ( $demo_data as $key => $demo ) {
			$demo_data[ $key ]['screenshot'] = $THEME_URI . '/inc/data/demos/' . $key . '/screenshot.jpg';
			$demo_data[ $key ]['dir']        = $THEME_PATH . '/inc/data/demos/' . $key;

			$plugins_require = isset( $demo_data[ $key ]['plugins_required'] ) ? $demo_data[ $key ]['plugins_required'] : false;
			if ( ! $plugins_require ) {
				continue;
			}

			if ( ! is_array( $plugins_require ) ) {
				continue;
			}

			$plugins_required_ = array();

			$plugins_require_all = Thim_Plugins_Manager::get_slug_plugins_require_all();
			$plugins_require     = array_merge( $plugins_require_all, $plugins_require );
			$plugins_require     = array_unique( $plugins_require );

			foreach ( $plugins_require as $slug ) {
				$plugin_args = Thim_Plugins_Manager::get_plugin_by_slug( $slug );

				if ( ! $plugin_args ) {
					continue;
				}

				$plugin = new Thim_Plugin();
				$plugin->set_args( $plugin_args );

				if ( $plugin->get_status() === 'active' ) {
					continue;
				}

				array_push( $plugins_required_, $plugin->toArray() );
			}

			$demo_data[ $key ]['plugins_required'] = $plugins_required_;
		}

		return $demo_data;
	}

	/**
	 * Get least suggested values.
	 *
	 * @since 0.3.0
	 *
	 * @return array
	 */
	public static function get_least_suggested_values() {
		return array(
			'memory_limit'       => '64M',
			'max_execution_time' => 30
		);
	}

	/**
	 * Get current value configs.
	 *
	 * @since 0.3.0
	 *
	 * @return array
	 */
	public static function get_current_value() {
		return array(
			'memory_limit'       => ini_get( 'memory_limit' ),
			'max_execution_time' => ini_get( 'max_execution_time' )
		);
	}

	/**
	 * Get config qualified.
	 *
	 * @since 0.3.0
	 *
	 * @return array
	 */
	public static function get_qualified() {
		$least   = self::get_least_suggested_values();
		$current = self::get_current_value();

		$memory_qualified         = false;
		$execution_time_qualified = false;

		if ( intval( $current['memory_limit'] ) >= intval( $least['memory_limit'] ) ) {
			$memory_qualified = true;
		}

		if ( intval( $current['max_execution_time'] ) >= intval( $least['max_execution_time'] ) ) {
			$execution_time_qualified = true;
		}

		return array(
			'memory_limit'       => $memory_qualified,
			'max_execution_time' => $execution_time_qualified,
		);
	}

	/**
	 * Check system is qualified.
	 *
	 * @since 0.3.1
	 *
	 * @return bool
	 */
	public static function is_qualified() {
		$qualified = self::get_qualified();
		if ( count( $qualified ) === 0 ) {
			return true;
		}

		foreach ( $qualified as $key => $value ) {
			if ( ! $value ) {
				return false;
			}
		}

		return true;
	}


	/**
	 * Thim_Importer constructor.
	 *
	 * @since 0.2.0
	 */
	private function __construct() {
		$this->init();
		$this->init_hooks();
	}

	/**
	 * Init.
	 *
	 * @since 0.3.0
	 */
	private function init() {
		$this->notice_requirements();
	}

	/**
	 * Init hooks.
	 *
	 * @since 0.3.0
	 */
	private function init_hooks() {
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
		add_action( 'after_thim_dashboard_wrapper', array( $this, 'add_modal_import' ) );
		add_action( 'after_thim_dashboard_wrapper', array( $this, 'add_modal_uninstall_demo' ) );
		add_action( 'wp_ajax_thim_importer', array( $this, 'handle_ajax' ) );
		add_action( 'wp_ajax_thim_importer_uninstall', array( $this, 'handle_ajax_uninstall' ) );
	}

	/**
	 * Enqueue scripts.
	 *
	 * @param $page_now
	 */
	public function enqueue_scripts( $page_now ) {
		if ( strpos( $page_now, Thim_Dashboard::$prefix_slug . self::$page_key ) === false ) {
			return;
		}

		wp_enqueue_script( 'thim-module-importer', THIM_CORE_ADMIN_URI . '/assets/js/importer/thim-importer.js', array( 'jquery' ) );
		wp_enqueue_script( 'thim-main-importer', THIM_CORE_ADMIN_URI . '/assets/js/importer/main.js', array( 'thim-module-importer' ) );

		$this->localize_script();
	}

	/**
	 * Add modal importer.
	 *
	 * @since 0.3.0
	 */
	public function add_modal_import() {
		$current_page = Thim_Dashboard::get_current_page_key();
		if ( $current_page !== self::$page_key ) {
			return;
		}

		Thim_Dashboard::get_template( 'partials/importer-modal.php' );
	}

	/**
	 * Add modal uninstall demo.
	 *
	 * @since 0.8.1
	 */
	public function add_modal_uninstall_demo() {
		$current_page = Thim_Dashboard::get_current_page_key();
		if ( $current_page !== self::$page_key ) {
			return;
		}

		Thim_Dashboard::get_template( 'partials/importer-uninstall-modal.php' );
	}

	/**
	 * Handle ajax import demo.
	 *
	 * @since 0.3.1
	 */
	public function handle_ajax() {
		$importer_ajax = new Thim_Importer_AJAX();
		$importer_ajax->handle_ajax();
	}

	/**
	 * Handle ajax uninstall demo.
	 *
	 * @since 0.6.0
	 */
	public function handle_ajax_uninstall() {
		$importer_ajax = new Thim_Importer_AJAX();
		$importer_ajax->handle_ajax_uninstall();
	}

	/**
	 * Localize script.
	 *
	 * @since 0.3.0
	 */
	private function localize_script() {
		$demos = self::get_demo_data();

		wp_localize_script( 'thim-module-importer', 'thim_importer_data', array(
			'admin_ajax_action'    => admin_url( 'admin-ajax.php?action=thim_importer' ),
			'admin_ajax_uninstall' => admin_url( 'admin-ajax.php?action=thim_importer_uninstall' ),
			'demos'                => $demos,
			'details_error'        => array(
				'title' => __( 'The importer failed!', 'thim-core' ),
				'code'  => array(
					'request' => '#001_REQUEST_ERROR',
					'server'  => '#002_SERVER_ERROR',
				)
			),
			'uninstall_successful' => __( 'Uninstall demo content successfully :]', 'thim-core' ),
			'uninstall_failed'     => __( 'Uninstall demo content failed. Please try again :]', 'thim-core' ),
			'confirm_close'        => __( 'Do you really want to close?', 'thim-core' ),
			'something_went_wrong' => __( 'Some thing went wrong. Please try again :]', 'thim-core' ),
		) );
	}


	/**
	 * Notice if the system does not satisfy requirements.
	 *
	 * @since 0.3.0
	 */
	private function notice_requirements() {
		$least     = self::get_least_suggested_values();
		$qualified = self::get_qualified();

		if ( ! $qualified['memory_limit'] ) {
			$notice = sprintf( __( '<strong>Important:</strong> The Importer requires <code>memory_limit</code> of your system >= %1$sMB. Please follow <a href="%2$s" target="_blank">these guidelines</a> to improve it.', 'thim-core' ), $least['memory_limit'], '//thimpress.com/?p=52957' );

			self::add_notification( $notice, 'warning' );
		}

		if ( ! $qualified['max_execution_time'] ) {
			$notice = sprintf( __( '<strong>Important:</strong> The Importer requires <code>max_execution_time</code> of your system >= %1$ss. Please follow <a href="%2$s" target="_blank">these guidelines</a> to improve it.', 'thim-core' ), $least['max_execution_time'], '//thimpress.com/?p=52956' );

			self::add_notification( $notice, 'warning' );
		}
	}
}
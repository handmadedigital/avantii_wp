<?php
/**
 * Class Thim_Core
 *
 * @package   Thim_Core
 * @since     0.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class Thim_Core {
	/**
	 * @var null
	 *
	 * @since 0.1.0
	 */
	protected static $_instance = null;

	/**
	 * Return unique instance of Thim_Core.
	 *
	 * @since 0.1.0
	 */
	static function instance() {
		if ( ! self::$_instance ) {
			self::$_instance = new self();
		}

		return self::$_instance;
	}

	/**
	 * Thim_Core constructor.
	 *
	 * @since 0.1.0
	 */
	public function __construct() {
		$this->init();

		$this->run();
	}

	/**
	 * Init functions.
	 *
	 * @since 0.1.0
	 */
	private function init() {
		spl_autoload_register( array( $this, 'autoload' ) );

		$this->includes();
	}

	/**
	 * Run.
	 *
	 * @since 0.5.0
	 */
	private function run() {
		Thim_Core_Customizer::instance();
		Thim_Mega_Menu::instance();
	}

	/**
	 * Autoload classes.
	 *
	 * @since 0.5.0
	 *
	 * @param $class
	 */
	public function autoload( $class ) {
		$class = strtolower( $class );

		$file_name = 'class-' . str_replace( '_', '-', $class ) . '.php';

		/**
		 * Helper classes.
		 */
		if ( strpos( $class, 'helper' ) !== false ) {
			$file_name = 'helpers/' . $file_name;
		}

		$file = THIM_CORE_INC_PATH . DIRECTORY_SEPARATOR . $file_name;
		if ( is_readable( $file ) ) {
			require_once $file;
		}
	}

	/**
	 * Include functions.
	 *
	 * @since 0.1.0
	 */
	private function functions() {
		$this->_require( 'functions.php' );
	}

	/**
	 * Include libraries and functions.
	 *
	 * @since 0.1.0
	 */
	private function includes() {
		$this->libraries();
		$this->functions();
	}

	/**
	 * Include libraries.
	 *
	 * @since 0.1.0
	 */
	private function libraries() {
		$this->resizer();
	}

	/**
	 * Include Aqua Resizer.
	 *
	 * @since 0.1.0
	 */
	private function resizer() {
		$this->_require( 'includes/aq-resizer/aq_resizer.php' );
	}

	/**
	 * Require file.
	 *
	 * @since 0.5.0
	 *
	 * @param $file
	 */
	private function _require( $file ) {
		$path = THIM_CORE_INC_PATH . DIRECTORY_SEPARATOR . $file;
		if ( ! file_exists( $path ) ) {
			return;
		}

		require_once $path;
	}
}

Thim_Core::instance();
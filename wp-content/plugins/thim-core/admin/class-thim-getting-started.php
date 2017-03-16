<?php

/**
 * Class Thim_Getting_Started
 *
 * @since 0.8.3
 */
class Thim_Getting_Started {
	public static $page_key = 'get-started';

	/**
	 * @var null
	 *
	 * @since 0.8.3
	 */
	protected static $_instance = null;

	/**
	 * Return unique instance of Thim_Getting_Started.
	 *
	 * @since 0.8.3
	 */
	static function instance() {
		if ( ! self::$_instance ) {
			self::$_instance = new self();
		}

		return self::$_instance;
	}

	/**
	 * Get steps.
	 *
	 * @since 0.8.3
	 *
	 * @return array
	 */
	public static function get_steps() {
		$steps = array();

		$steps[] = array(
			'key'   => 'welcome',
			'title' => 'Welcome to ThimPress',
		);

		$steps[] = array(
			'key'   => 'quick-setup',
			'title' => 'Quick setup',
		);

		$steps[] = array(
			'key'   => 'install-plugins',
			'title' => 'Install plugins required',
		);

		$steps[] = array(
			'key'   => 'import-demo',
			'title' => 'Import demo content',
		);

		$steps[] = array(
			'key'   => 'customizer',
			'title' => 'Go to customizer',
		);

		return $steps;
	}

	/**
	 * Thim_Getting_Started constructor.
	 *
	 * @since 0.8.3
	 */
	private function __construct() {
		$this->init_hooks();
	}

	/**
	 * Initialize hooks.
	 *
	 * @since 0.8.3
	 */
	private function init_hooks() {
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
		add_action( 'thim_getting_started_main_content', array( $this, 'render_step_templates' ) );
		add_action( 'wp_ajax_thim-get-started', array( $this, 'handle_ajax' ) );
	}

	/**
	 * Enqueue scripts.
	 *
	 * @param $page_now
	 *
	 * @since 0.8.3
	 */
	public function enqueue_scripts( $page_now ) {
		if ( strpos( $page_now, Thim_Dashboard::$prefix_slug . self::$page_key ) === false ) {
			return;
		}

		wp_enqueue_script( 'thim-getting-started', THIM_CORE_ADMIN_URI . '/assets/js/getting-started.js', array( 'jquery' ) );

		$this->localize_script();
	}

	/**
	 * Localize script.
	 *
	 * @since 0.8.3
	 */
	private function localize_script() {
		wp_localize_script( 'thim-getting-started', 'thim_gs', array(
			'url_ajax' => admin_url( 'admin-ajax.php?action=thim-get-started&step=' ),
		) );
	}

	/**
	 * Handle ajax.
	 *
	 * @since 0.8.3
	 */
	public function handle_ajax() {
		$step = ! empty( $_REQUEST['step'] ) ? $_REQUEST['step'] : false;

		switch ( $step ) {
			case 'quick-setup':
				$this->handle_quick_setup();
				break;

			case 'abc':
				break;

			default:
				break;
		}

		wp_die();
	}

	/**
	 * Handle quick setup.
	 *
	 * @since 0.8.3
	 */
	private function handle_quick_setup() {
		$blog_name = isset( $_POST['blogname'] ) ? $_POST['blogname'] : false;
		if ( $blog_name !== false ) {
			update_option( 'blogname', $blog_name );
		}

		$blog_description = isset( $_POST['blogdescription'] ) ? $_POST['blogdescription'] : false;
		if ( $blog_description !== false ) {
			update_option( 'blogdescription', $blog_description );
		}

		wp_send_json_success( 'Saving successful!' );
	}

	/**
	 * Render step templates.
	 *
	 * @since 0.8.3
	 */
	public function render_step_templates() {
		$steps = self::get_steps();

		foreach ( $steps as $index => $step ) {
			$key               = strtolower( $step['key'] );
			$key               = str_replace( '-', '_', $key );
			$callback_function = 'content_step_' . $key;
			$arr               = array( $this, $callback_function );

			if ( ! is_callable( $arr ) ) {
				continue;
			}

			call_user_func( $arr, $index );
		}
	}

	/**
	 * Get step template by slug.
	 *
	 * @since 0.8.3
	 *
	 * @param $slug
	 * @param array $args
	 *
	 * @return bool
	 */
	public function render_step_template( $slug, $args = array() ) {
		$dir_path = THIM_CORE_ADMIN_PATH . '/views/dashboard/gs-steps/';

		$path = $dir_path . $slug . '.php';
		if ( ! file_exists( $path ) ) {
			return false;
		}

		ob_start();
		include $path;
		$html = ob_get_clean();

		include $dir_path . 'master.php';

		return true;
	}

	/**
	 * Step welcome.
	 *
	 * @since 0.8.3
	 */
	public function content_step_welcome() {
		$x = $this->render_step_template( 'welcome' );
	}

	/**
	 * Step welcome.
	 *
	 * @since 0.8.3
	 */
	public function content_step_quick_setup() {
		$this->render_step_template( 'quick-setup' );
	}

	/**
	 * Step welcome.
	 *
	 * @since 0.8.3
	 */
	public function content_step_install_plugins() {
		$this->render_step_template( 'install-plugins' );
	}

	/**
	 * Step welcome.
	 *
	 * @since 0.8.3
	 */
	public function content_step_import_demo() {
		$demo_data     = Thim_Importer::get_demo_data();
		$least_value   = Thim_Importer::get_least_suggested_values();
		$current_value = Thim_Importer::get_current_value();
		$qualified     = Thim_Importer::get_qualified();

		$this->render_step_template( 'import-demo', array(
			'$demo_data'     => $demo_data,
			'$least_value'   => $least_value,
			'$current_value' => $current_value,
			'$qualified'     => $qualified,
		) );
	}

	/**
	 * Step welcome.
	 *
	 * @since 0.8.3
	 */
	public function content_step_customizer() {
		$this->render_step_template( 'customizer' );
	}
}
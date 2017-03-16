<?php

/**
 * Class Thim_Dashboard.
 *
 * @package   Thim_Core
 * @since     0.1.0
 */
class Thim_Dashboard {
	/**
	 * @since 0.2.0
	 *
	 * @var null
	 */
	protected static $_instance = null;

	/**
	 * Do not edit value.
	 *
	 * @since 0.2.0
	 *
	 * @var string
	 */
	private static $main_slug = 'dashboard';

	/**
	 * @var string
	 *
	 * @since 0.2.0
	 */
	public static $prefix_slug = 'thim-';

	/**
	 * List sub pages.
	 *
	 * @since 0.2.0
	 * @var array
	 */
	private static $sub_pages = array();

	/**
	 * Return unique instance of Thim_Core_Admin.
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
	 * Get link page by slug.
	 *
	 * @since 0.5.0
	 *
	 * @param $slug
	 *
	 * @return string
	 */
	public static function get_link_page_by_slug( $slug ) {
		if ( ! Thim_Core_Admin::is_my_theme() ) {
			return admin_url();
		}

		return admin_url( 'admin.php?page=' . self::$prefix_slug . $slug );
	}

	/**
	 * Get link main dashboard.
	 *
	 * @since 0.2.0
	 *
	 * @param array $args
	 *
	 * @return string
	 */
	public static function get_link_main_dashboard( $args = null ) {
		$url = self::get_link_page_by_slug( self::$main_slug );

		if ( is_array( $args ) ) {
			$url = add_query_arg( $args, $url );
		}

		return $url;
	}

	/**
	 * Get key (slug) current page.
	 *
	 * @since 0.3.0
	 */
	public static function get_current_page_key() {
		$current_page = isset( $_GET['page'] ) ? $_GET['page'] : '';

		$prefix_slug = Thim_Dashboard::$prefix_slug;

		$pages = self::get_sub_pages();
		foreach ( $pages as $key => $page ) {
			if ( $prefix_slug . $key === $current_page ) {
				return $key;
			}
		}

		return false;
	}

	/**
	 * Check current request is for a page of Thim Core Dashboard interface.
	 *
	 * @since 0.3.0
	 *
	 * @return bool True if inside Thim Core Dashboard interface, false otherwise.
	 */
	public static function is_dashboard() {
		$current_page = self::get_current_page_key();

		return (bool) ( $current_page );
	}

	/**
	 * Get list sub pages.
	 *
	 * @since 0.2.0
	 *
	 * @return array
	 */
	public static function get_sub_pages() {
		return self::$sub_pages;
	}

	/**
	 * Add notifications.
	 *
	 * @since 0.3.0
	 *
	 * @param array $args
	 */
	public static function add_notification( $args = array() ) {
		global $thim_dashboard;
		$current_page = $thim_dashboard['current_page'];

		$default = array(
			'content' => '',
			'type'    => 'success',
			'page'    => $current_page,
		);
		$args    = wp_parse_args( $args, $default );

		$page = $args['page'];
		if ( $page !== $current_page ) {
			return;
		}

		$type    = $args['type'];
		$content = $args['content'];
		add_action( 'thim_dashboard_notifications', function () use ( $type, $content ) {

			?>
			<div class="tc-notice tc-<?php echo esc_attr( $type ); ?>">
				<div class="content"><?php echo $content; ?></div>
			</div>
			<?php
		} );
	}

	/**
	 * Get page template.
	 *
	 * @since 0.5.0
	 *
	 * @param $template
	 * @param array $args
	 *
	 * @return bool
	 */
	public static function get_template( $template, $args = array() ) {
		$dir_path = THIM_CORE_ADMIN_PATH . '/views/dashboard/';

		$file = $dir_path . $template;
		if ( ! file_exists( $file ) ) {
			return false;
		}

		include $file;

		return true;
	}

	/**
	 * Thim_Dashboard constructor.
	 *
	 * @since 0.2.0
	 */
	public function __construct() {
		$this->init();
		$this->init_hooks();
	}

	/**
	 * Init.
	 *
	 * @since 0.2.0
	 */
	private function init() {
		$this->set_values_global();
		$this->set_sub_pages();
		$this->run();
	}

	/**
	 * Run.
	 *
	 * @since 0.3.0
	 */
	private function run() {
		Thim_Importer::instance();
		Thim_Product_Registration::instance();
		Thim_Plugins_Manager::instance();
		Thim_Getting_Started::instance();

		if ( TP::is_debug() ) {
			Thim_For_Developer::instance();
		}
	}

	/**
	 * Set values global.
	 *
	 * @sin 0.3.0
	 */
	private function set_values_global() {
		global $thim_dashboard;

		$thim_dashboard = array(
			'is_active'    => Thim_Product_Registration::is_active(),
			'current_page' => Thim_Dashboard::get_current_page_key(),
		);

		Thim_Theme_Manager::set_metadata();
	}

	/**
	 * Set list sub pages.
	 *
	 * @since 0.2.0
	 */
	private function set_sub_pages() {
		$arr_sub_pages = array();

		$arr_sub_pages[ self::$main_slug ] = array(
			'title' => __( 'Dashboard', 'thim-core' ),
		);

//		$arr_sub_pages['get-started'] = array(
//			'title' => __( 'Getting Started', 'thim-core' ),
//		);

		$arr_sub_pages['importer'] = array(
			'title' => __( 'Import Demo', 'thim-core' ),
		);

		$arr_sub_pages['plugins'] = array(
			'title' => __( 'Plugins', 'thim-core' ),
		);

		$arr_sub_pages['system-status'] = array(
			'title' => __( 'System Status', 'thim-core' ),
		);

		if ( TP::is_debug() ) {
			$arr_sub_pages['developer'] = array(
				'title' => __( 'For Developer', 'thim-core' )
			);
		}

		self::$sub_pages = $arr_sub_pages;
	}

	/**
	 * Get page template.
	 *
	 * @since 0.2.0
	 *
	 * @param        $page
	 * @param  mixed $args
	 *
	 * @return bool
	 */
	private function get_page_template( $page, $args = array() ) {
		$dir_path = THIM_CORE_ADMIN_PATH . '/views/dashboard/';

		$page = str_replace( '_', '-', $page );
		$path = $dir_path . $page . '.php';
		if ( ! file_exists( $path ) ) {
			return false;
		}

		ob_start();
		include $path;
		$html = ob_get_clean();

		$sub_pages = self::get_sub_pages();
		include $dir_path . 'master.php';

		return true;
	}

	/**
	 * Init hooks.
	 *
	 * @since 0.2.0
	 */
	private function init_hooks() {
		add_action( 'admin_menu', array( $this, 'add_menu_page' ) );
		add_action( 'admin_menu', array( $this, 'add_sub_menu_pages' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
		add_action( 'thim_dashboard_notifications', array( $this, 'add_notification_requirements' ) );

		add_filter( 'admin_body_class', array( $this, 'admin_body_class' ) );
		add_action( 'admin_bar_menu', array( $this, 'add_menu_admin_bar' ), 50 );
		add_filter( 'admin_footer_text', array( $this, 'admin_footer_text' ) );
	}

	/**
	 * Add notification requirements.
	 *
	 * @since 0.8.3
	 */
	public function add_notification_requirements() {
		$version_require = '5.3';

		if ( version_compare( phpversion(), $version_require, '>=' ) ) {
			return;
		}

		?>
		<div class="tc-notice tc-error">
			<div class="content">
				<?php printf( __( '<strong>Important:</strong> We found out your system is using PHP version %1$s. Please consider upgrading to version %2$s or higher.', 'thim-core' ), phpversion(), $version_require ); ?>
			</div>
		</div>
		<?php
		exit();
	}

	/**
	 * Filter admin footer text.
	 *
	 * @since 0.8.2
	 *
	 * @param $html
	 *
	 * @return string
	 */
	public function admin_footer_text( $html ) {
		if ( ! self::is_dashboard() ) {
			return $html;
		}

		$text = sprintf( __( 'Thank you for creating with <a href="%s" target="_blank">ThimPress</a>.', 'thim-core' ), __( 'http://thimpress.com' ) );

		return $html = '<span id="footer-thankyou">' . $text . '</span>';
	}

	/**
	 * Add admin bar menu.
	 *
	 * @since 0.5.0
	 *
	 * @param $wp_admin_bar
	 */
	public function add_menu_admin_bar( $wp_admin_bar ) {
		if ( is_admin() ) {
			return;
		}

		global $thim_dashboard;
		$theme_data = $thim_dashboard['theme_data'];
		$theme_name = $theme_data['name'];

		$menu_title = ! empty( $theme_name ) ? $theme_name : __( 'ThimPress Dashboard', 'thim-core' );

		$args = array(
			'id'    => 'thim_core',
			'title' => $menu_title,
			'href'  => self::get_link_main_dashboard()
		);
		$wp_admin_bar->add_node( $args );

		$pages = self::get_sub_pages();
		foreach ( $pages as $key => $page ) {
			$args = array(
				'id'     => self::$prefix_slug . $key,
				'title'  => $page['title'],
				'href'   => self::get_link_page_by_slug( $key ),
				'parent' => 'thim_core'
			);
			$wp_admin_bar->add_node( $args );
		}


	}

	/**
	 * Enqueue scripts.
	 *
	 * @param string $page_now
	 *
	 * @since 0.2.0
	 */
	public function enqueue_scripts( $page_now ) {
		if ( ! self::is_dashboard() ) {
			return;
		}

		wp_enqueue_style( 'thim-dashboard', THIM_CORE_ADMIN_URI . '/assets/css/dashboard.css', array(), THIM_CORE_VERSION );


	}

	/**
	 * Add class to body class in admin.
	 *
	 * @since 0.3.0
	 *
	 * @param $body_classes
	 *
	 * @return string
	 */
	public function admin_body_class( $body_classes ) {
		if ( ! self::is_dashboard() ) {
			return $body_classes;
		}

		$current_page_key = self::get_current_page_key();
		$prefix           = self::$prefix_slug;
		$current_page     = $prefix . $current_page_key;
		$main_page        = $prefix . self::$main_slug;

		$body_classes .= $main_page . ' ' . $current_page . '-wrapper';

		return $body_classes;
	}

	/**
	 * Add menu page (Main page).
	 *
	 * @since 0.2.0
	 */
	public function add_menu_page() {
		global $thim_dashboard;
		$theme_data = $thim_dashboard['theme_data'];
		$theme_name = $theme_data['name'];

		$menu_title = ! empty( $theme_name ) ? $theme_name : __( 'ThimPress Dashboard', 'thim-core' );

		add_menu_page( $menu_title, $menu_title, 'manage_options', self::$prefix_slug . self::$main_slug, array(
			$this,
			'template_dashboard'
		), THIM_CORE_ADMIN_URI . '/assets/images/logo.svg', 2 );

	}

	/**
	 * Add sub menu pages.
	 *
	 * @since 0.2.0
	 */
	public function add_sub_menu_pages() {
		$sub_pages = $this->get_sub_pages();
		$prefix    = Thim_Dashboard::$prefix_slug;

		foreach ( $sub_pages as $key => $page ) {
			$default = array(
				'title'    => '',
				'template' => '',
			);
			$page    = wp_parse_args( $page, $default );

			$slug  = $prefix . $key;
			$title = $page['title'];

			$callback_func = $page['template'];
			if ( empty( $callback_func ) ) {
				$temp          = str_replace( '-', '_', $key );
				$callback_func = array( $this, 'template_' . $temp );
			}

			if ( ! is_callable( $callback_func ) ) {
				continue;
			}

			add_submenu_page( self::$prefix_slug . self::$main_slug, $title, $title, 'manage_options', $slug, $callback_func );
		}

	}

	/**
	 * Template Thim Dashboard.
	 *
	 * @since 0.2.0
	 */
	public function template_dashboard() {
		$this->get_page_template( 'dashboard' );
	}

	/**
	 * Template product registration.
	 *
	 * @since 0.2.0
	 */
	public function template_get_started() {
		$this->get_page_template( 'get-started' );
	}

	/**
	 * Template importer.
	 *
	 * @since 0.2.0
	 */
	public function template_importer() {
		$demo_data     = Thim_Importer::get_demo_data();
		$least_value   = Thim_Importer::get_least_suggested_values();
		$current_value = Thim_Importer::get_current_value();
		$qualified     = Thim_Importer::get_qualified();

		$this->get_page_template( 'importer', array(
			'$demo_data'     => $demo_data,
			'$least_value'   => $least_value,
			'$current_value' => $current_value,
			'$qualified'     => $qualified,
		) );
	}

	/**
	 * Template plugins.
	 *
	 * @since 0.2.0
	 */
	public function template_plugins() {
		$this->get_page_template( 'plugins' );
	}

	/**
	 * Template update.
	 *
	 * @since 0.2.0
	 */
	public function template_update() {
		$this->get_page_template( 'update' );
	}

	/**
	 * Template system status.
	 *
	 * @since 0.2.0
	 */
	public function template_system_status() {
		$this->get_page_template( 'system-status' );
	}

	/**
	 * Template page for developer.
	 *
	 * @since 0.5.0
	 */
	public function template_developer() {
		$this->get_page_template( 'developer' );
	}
}
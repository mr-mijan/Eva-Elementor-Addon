<?php
/**
 * Plugin Name: Eva Elementor Addon
 * Description: Custom Elementor extension which includes Content Box widgets.
 * Plugin URI:  #
 * Version:     1.0.0
 * Author:      Flexitheme
 * Author URI:  #
 * Text Domain: eva
 * Domain Path: /languages
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

/**
 *
 * The main class that initiates and runs the plugin.
 *
 * @since 1.0.0
 */
final class Eva_Elementor_Widget_Extension
{

	/**
	 * Plugin Version
	 *
	 * @since 1.0.0
	 *
	 * @var string The plugin version.
	 */
	const VERSION = '1.0.0';

	/**
	 * Minimum Elementor Version
	 *
	 * @since 1.0.0
	 *
	 * @var string Minimum Elementor version required to run the plugin.
	 */
	const MINIMUM_ELEMENTOR_VERSION = '3.0.0';

	/**
	 * Minimum PHP Version
	 *
	 * @since 1.0.0
	 *
	 * @var string Minimum PHP version required to run the plugin.
	 */
	const MINIMUM_PHP_VERSION = '7.0';

	/**
	 * Instance
	 *
	 * @since 1.0.0
	 *
	 * @access private
	 * @static
	 *
	 * @var Eva_Elementor_Widget_Extension The single instance of the class.
	 */
	private static $_instance = null;

	/**
	 * Instance
	 *
	 * Ensures only one instance of the class is loaded or can be loaded.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 * @static
	 *
	 * @return Eva_Elementor_Widget_Extension An instance of the class.
	 */
	public static function instance()
	{

		if (is_null(self::$_instance)) {
			self::$_instance = new self();
		}
		return self::$_instance;

	}

	/**
	 * Constructor
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function __construct()
	{

		add_action('init', [$this, 'i18n']);
		add_action('plugins_loaded', [$this, 'init']);

	}

	/**
	 * Load Textdomain
	 *
	 * Load plugin localization files.
	 *
	 * Fired by `init` action hook.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function i18n()
	{

		load_plugin_textdomain('eva', FALSE, basename(dirname(__FILE__)) . '/languages/');

	}

	/**
	 * Initialize the plugin
	 *
	 * Load the plugin only after Elementor (and other plugins) are loaded.
	 * Checks for basic plugin requirements, if one check fail don't continue,
	 * if all check have passed load the files required to run the plugin.
	 *
	 * Fired by `plugins_loaded` action hook.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function init()
	{

		// Check if Elementor installed and activated
		if (!did_action('elementor/loaded')) {
			add_action('admin_notices', [$this, 'admin_notice_missing_main_plugin']);
			return;
		}

		// Check for required Elementor version
		if (!version_compare(ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=')) {
			add_action('admin_notices', [$this, 'admin_notice_minimum_elementor_version']);
			return;
		}

		// Check for required PHP version
		if (version_compare(PHP_VERSION, self::MINIMUM_PHP_VERSION, '<')) {
			add_action('admin_notices', [$this, 'admin_notice_minimum_php_version']);
			return;
		}

		add_action('elementor/frontend/after_enqueue_styles', [$this, 'widget_styles']);

		//add_action('elementor/frontend/after_enqueue_scripts', [$this, 'widget_scripts']);


		// Add Plugin actions
		add_action('elementor/widgets/widgets_registered', [$this, 'init_widgets']);
		add_action('elementor/controls/controls_registered', [$this, 'init_controls']);

		// Category Init
		add_action('elementor/init', [$this, 'eva_category']);

	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have Elementor installed or activated.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function admin_notice_missing_main_plugin()
	{

		if (isset($_GET['activate']))
			unset($_GET['activate']);

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor */
			esc_html__('"%1$s" requires "%2$s" to be installed and activated.', 'eva'),
			'<strong>' . esc_html__('Elementor Widget Extension', 'eva') . '</strong>',
			'<strong>' . esc_html__('Elementor', 'eva') . '</strong>'
		);

		printf('<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message);

	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have a minimum required Elementor version.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function admin_notice_minimum_elementor_version()
	{

		if (isset($_GET['activate']))
			unset($_GET['activate']);

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */
			esc_html__('"%1$s" requires "%2$s" version %3$s or greater.', 'eva'),
			'<strong>' . esc_html__('Eva Elementor Widget Extension', 'eva') . '</strong>',
			'<strong>' . esc_html__('Elementor', 'eva') . '</strong>',
			self::MINIMUM_ELEMENTOR_VERSION
		);

		printf('<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message);

	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have a minimum required PHP version.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function admin_notice_minimum_php_version()
	{

		if (isset($_GET['activate']))
			unset($_GET['activate']);

		$message = sprintf(
			/* translators: 1: Plugin name 2: PHP 3: Required PHP version */
			esc_html__('"%1$s" requires "%2$s" version %3$s or greater.', 'eva'),
			'<strong>' . esc_html__('Eva Elementor Widget Extension', 'eva') . '</strong>',
			'<strong>' . esc_html__('PHP', 'eva') . '</strong>',
			self::MINIMUM_PHP_VERSION
		);

		printf('<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message);

	}

	/**
	 * Init Widgets
	 *
	 * Include widgets files and register them
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function init_widgets()
	{

		require_once(__DIR__ . '/widgets/inc/content_box_01.php');
		require_once(__DIR__ . '/widgets/inc/content_box_02.php');
		require_once(__DIR__ . '/widgets/inc/content_box_03.php');
		require_once(__DIR__ . '/widgets/inc/content_box_04.php');
		require_once(__DIR__ . '/widgets/inc/content_box_05.php');
		require_once(__DIR__ . '/widgets/inc/content_box_06.php');
		require_once(__DIR__ . '/widgets/inc/content_box_07.php');
		require_once(__DIR__ . '/widgets/inc/content_box_08.php');
		require_once(__DIR__ . '/widgets/inc/content_box_09.php');


		require_once(__DIR__ . '/widgets/inc/content_box_19.php');
		require_once(__DIR__ . '/widgets/inc/content_box_20.php');

		\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \Eva_Content_Box_01());
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \Eva_Content_Box_02());
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \Eva_Content_Box_03());
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \Eva_Content_Box_04());
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \Eva_Content_Box_05());
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \Eva_Content_Box_06());
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \Eva_Content_Box_07());
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \Eva_Content_Box_08());
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \Eva_Content_Box_09());


		\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \Eva_Content_Box_19());
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \Eva_Content_Box_20());

	}

	/**
	 * Init Controls
	 *
	 * Include controls files and register them
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function init_controls()
	{

		/*
		 * Todo: this block needs to be commented out when the custom control is ready
		 *
		 */

		// Include Control files
		// require_once( __DIR__ . '/controls/test-control.php' );

		// //Register control
		// \Elementor\Plugin::$instance->controls_manager->register_control( 'control-type-', new \Test_Control() );


	}

	// Custom CSS
	public function widget_styles()
	{
		wp_register_style('bootstrap-grid', plugins_url('assets/css/bootstrap-grid.min.css', __FILE__));
		wp_register_style('contentbox', plugins_url('assets/css/contentbox.css', __FILE__));
		wp_register_style('elegant-font', plugins_url('assets/css/elegant-font.css', __FILE__));
		wp_register_style('general', plugins_url('assets/css/general.css', __FILE__));
		// wp_register_style( 'elementor-default-style', plugins_url( 'assets/css/default.css', __FILE__ ) );
		// wp_register_style( 'elementor-css-style', plugins_url( 'assets/css/mocassin-r.min.css', __FILE__ ) );

		wp_enqueue_style('bootstrap-grid');
		wp_enqueue_style('contentbox');
		wp_enqueue_style('elegant-font');
		wp_enqueue_style('general');
	}

	// // Custom JS
	// public function widget_scripts()
	// {
	// 	wp_register_script('bootstrap-js', plugins_url('assets/js/bootstrap.min.js', __FILE__));
	// 	// wp_register_script('astro-carousel', plugins_url('assets/js/astro-carousel.min.js', __FILE__));
	// 	// wp_enqueue_script('bootstrap-js');
	// 	wp_enqueue_script('astro-carousel');
	// }

	// Custom Category
	public function eva_category()
	{

		\Elementor\Plugin::$instance->elements_manager->add_category(
			'eva-contentbox-addon',
			[
				'title' => __('Eva Elementor Widgets', 'eva'),
				'icon' => 'fa fa-plug', //default icon
			],
			2 // position
		);

	}


}

Eva_Elementor_Widget_Extension::instance();

<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;
if ( ! class_exists( 'Gn_Horizontal_Timeline' ) ) :

	/**
	 * Main Gn_Horizontal_Timeline Class.
	 *
	 * @package		GNHORIZONT
	 * @subpackage	Classes/Gn_Horizontal_Timeline
	 * @since		1.0.0
	 * @author		George Nicolaou
	 */
	final class Gn_Horizontal_Timeline {

		/**
		 * The real instance
		 *
		 * @access	private
		 * @since	1.0.0
		 * @var		object|Gn_Horizontal_Timeline
		 */
		private static $instance;

		/**
		 * GNHORIZONT helpers object.
		 *
		 * @access	public
		 * @since	1.0.0
		 * @var		object|Gn_Horizontal_Timeline_Helpers
		 */
		public $helpers;

		/**
		 * GNHORIZONT settings object.
		 *
		 * @access	public
		 * @since	1.0.0
		 * @var		object|Gn_Horizontal_Timeline_Settings
		 */
		public $settings;

		/**
		 * Throw error on object clone.
		 *
		 * Cloning instances of the class is forbidden.
		 *
		 * @access	public
		 * @since	1.0.0
		 * @return	void
		 */
		public function __clone() {
			_doing_it_wrong( __FUNCTION__, __( 'You are not allowed to clone this class.', 'gn-horizontal-timeline' ), '1.0.0' );
		}

		/**
		 * Disable unserializing of the class.
		 *
		 * @access	public
		 * @since	1.0.0
		 * @return	void
		 */
		public function __wakeup() {
			_doing_it_wrong( __FUNCTION__, __( 'You are not allowed to unserialize this class.', 'gn-horizontal-timeline' ), '1.0.0' );
		}

		/**
		 * Main Gn_Horizontal_Timeline Instance.
		 *
		 * Insures that only one instance of Gn_Horizontal_Timeline exists in memory at any one
		 * time. Also prevents needing to define globals all over the place.
		 *
		 * @access		public
		 * @since		1.0.0
		 * @static
		 * @return		object|Gn_Horizontal_Timeline	The one true Gn_Horizontal_Timeline
		 */
		public static function instance() {
			if ( ! isset( self::$instance ) && ! ( self::$instance instanceof Gn_Horizontal_Timeline ) ) {
				self::$instance					= new Gn_Horizontal_Timeline;
				self::$instance->base_hooks();
				self::$instance->includes();
				self::$instance->helpers		= new Gn_Horizontal_Timeline_Helpers();
				self::$instance->settings		= new Gn_Horizontal_Timeline_Settings();

				//Fire the plugin logic
				new Gn_Horizontal_Timeline_Run();

				/**
				 * Fire a custom action to allow dependencies
				 * after the successful plugin setup
				 */
				do_action( 'GNHORIZONT/plugin_loaded' );
			}

			return self::$instance;
		}

		/**
		 * Include required files.
		 *
		 * @access  private
		 * @since   1.0.0
		 * @return  void
		 */
		private function includes() {
			require_once GNHORIZONT_PLUGIN_DIR . 'core/includes/classes/class-gn-horizontal-timeline-helpers.php';
			require_once GNHORIZONT_PLUGIN_DIR . 'core/includes/classes/class-gn-horizontal-timeline-settings.php';

			require_once GNHORIZONT_PLUGIN_DIR . 'core/includes/classes/class-gn-horizontal-timeline-run.php';
		}

		/**
		 * Add base hooks for the core functionality
		 *
		 * @access  private
		 * @since   1.0.0
		 * @return  void
		 */
		private function base_hooks() {
			add_action( 'plugins_loaded', array( self::$instance, 'load_textdomain' ) );
		}

		/**
		 * Loads the plugin language files.
		 *
		 * @access  public
		 * @since   1.0.0
		 * @return  void
		 */
		public function load_textdomain() {
			load_plugin_textdomain( 'gn-horizontal-timeline', FALSE, dirname( plugin_basename( GNHORIZONT_PLUGIN_FILE ) ) . '/languages/' );
		}

	}

endif; // End if class_exists check.
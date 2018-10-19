<?php 
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

if ( !class_exists( 'Wbc_Plugin_Admin_Init' ) ) {
	class Wbc_Plugin_Admin_Init {

		/**
		 * Instance of this class.
		 *
		 * @since    1.0.0
		 *
		 * @var      object
		 */
		protected static $instance = null;

		private $product = '4087140';

		private $api     = 'http://support.webcreations907.com/wp-admin/admin-ajax.php';


		/**
		 * Fire it up
		 *
		 * @since  1.0.0
		 */
		public function __construct() {

		}


		public function init() {
			if(is_admin()){
				$this->admin_init_process();
			}
		}


		private function is_options_page(){
			global $pagenow;
			if(is_admin() && isset($pagenow) && $pagenow == 'admin.php' && isset($_GET['page']) && $_GET['page'] == '_options'){
				true;
			}
			return false;
		}

		public function admin_init_process(){
			/*
			if(false === $this->is_registered()){
				add_filter('wbc_nodemos_provided_message', array($this,'importer_message'));
				add_filter('wbc_importer_description', array($this,'importer_message'),100);
				add_filter('wbc_importer_demo_process', array($this,'importer_run'));
				add_filter('redux/wbc907_data/field/wbc_importer_files', array($this,'importer_demos'),999);
				add_action('wbc_importer_after_message', array($this,'importer_inner_message'));
			}else{
				add_filter('wbc_importer_demo_process', array($this,'importer_running'),100);
			}
			*/
			add_filter('wbc_importer_demo_process', array($this,'importer_running'),100);
		}

		public function importer_inner_message( $message ){
			$html = '';
			$html .= '<div class="wbc-demo-importer-message">';
			$html .= '<div class="icon-area">';
			$html .= '<i class="fa fa-lock"></i>';
			$html .= '</div>';
			$html .= '<h2>'.esc_html('Locked Feature','ninezeroseven').'</h2>';
			$html .= '<p>'.esc_html('You must activate your license to import demos.','ninezeroseven').'</p>';
			$html .= '<a class="button button-primary" href="'.esc_url( admin_url( 'admin.php?page=ninezeroseven-registration' ) ).'">'.esc_html('Activate License Now','ninezeroseven').'</a>';
			$html .= '</div>';
			echo $html;
		}

		public function importer_message( $message ){
			return '';
		}

		public function importer_running( $run ){
			return true;
		}

		public function importer_run( $run ){
			return false;
		}

		public function importer_demos( $demos ){
			return array();
		}


		public function is_registered_action( $demos ){
			return $this->is_registered();
		}

		protected function is_registered(){
			if(false === get_option('wbc907_theme_registered')){
				return false;
			}else{
				if ( false === get_transient( 'wbc907_theme_token' ) && false !== get_option('wbc907_theme_token') || false === get_transient( 'wbc907_theme_plugin_token' ) ) {
					$api_url = add_query_arg(array(
							'action'   => 'wbc_validate_token',
							'token'    => get_option('wbc907_theme_token'),
							'site_url' => rawurlencode(get_option( 'siteurl'))

						), $this->api );

					$check_update = @wp_remote_get($api_url,array( 'user-agent' => 'ninezeroseven-theme', 'timeout' => 300));
					
					if ( !is_wp_error( $check_update ) && is_array( $check_update ) && !empty( $check_update['body'] ) ) {
						$validate = (array) json_decode( $check_update['body'], true );

						if(array_key_exists('result', $validate ) && $validate['result'] == 'success'){
							set_transient( 'wbc907_theme_token', get_option('wbc907_theme_token'), 10 * DAY_IN_SECONDS );
							set_transient( 'wbc907_theme_plugin_token', get_option('wbc907_theme_token'), 10 * DAY_IN_SECONDS );
							return true;
						}elseif(array_key_exists('result', $validate ) && $validate['result'] == 'error' && array_key_exists('message', $validate ) && $validate['message'] == 'Token Not Valid'){
							delete_option('wbc907_theme_registered');
							delete_option('wbc907_theme_token');
							delete_transient('wbc907_theme_token');
						}
					}
				}elseif ( false !== get_transient( 'wbc907_theme_token' ) && false !== get_option('wbc907_theme_token') ) {
					return true;
				}
			}

			return false;
		}


		/**
		 * Return an instance of this class.
		 *
		 * @since     1.0.0
		 *
		 * @return    object    A single instance of this class.
		 */
		public static function get_instance() {

			// If the single instance hasn't been set, set it now.
			if ( null == self::$instance ) {
				self::$instance = new self;
			}

			return self::$instance;
		}

	}

	Wbc_Plugin_Admin_Init::get_instance()->init();
}
?>
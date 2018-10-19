<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/************************************************************************
* Redux Extension Loader
*************************************************************************/

if ( !function_exists( 'wbc907_custom_extension_loader' ) ) {
	function wbc907_custom_extension_loader( $ReduxFramework ) {
		$path = dirname( __FILE__ ) . '/extend/';
		$folders = scandir( $path, 1 );
		foreach ( $folders as $folder ) {
			if ( $folder === '.' or $folder === '..' or !is_dir( $path . $folder ) ) {
				continue;
			}
			$extension_class = 'ReduxFramework_Extension_' . $folder;
			if ( !class_exists( $extension_class ) ) {
				// In case you wanted override your override, hah.
				$class_file = $path . $folder . '/extension_' . $folder . '.php';
				$class_file = apply_filters( 'redux/extension/'.$ReduxFramework->args['opt_name'].'/'.$folder, $class_file );
				if ( $class_file ) {
					require_once $class_file;
					$extension = new $extension_class( $ReduxFramework );
				}
			}
		}
	}

	add_action( "redux/extensions/wbc907_data/before", 'wbc907_custom_extension_loader', 0 );
}

/************************************************************************
* Load color spacing
*************************************************************************/
if ( !function_exists( 'wbc907_override_spacing_field' ) ) {
	function wbc907_override_spacing_field( $field ) {
		return dirname(__FILE__).'/fields/spacing/field_spacing.php';
	}

	add_filter( "redux/wbc907_data/field/class/spacing", "wbc907_override_spacing_field" );
}

/************************************************************************
* Load color alpha Field
*************************************************************************/
if ( !function_exists( 'wbc907_color_add_alpha_field' ) ) {
	function wbc907_color_add_alpha_field($field) {
		return dirname(__FILE__).'/fields/color_alpha/field_color_alpha.php';
	}

	add_filter( "redux/wbc907_data/field/class/color_alpha", "wbc907_color_add_alpha_field" );
}

/************************************************************************
* Load color typography
*************************************************************************/
if ( !function_exists( 'wbc907_override_typography_field' ) ) {
	function wbc907_override_typography_field($field) {
		return dirname(__FILE__).'/fields/typography/field_typography.php';
	}

	add_filter( "redux/wbc907_data/field/class/typography", "wbc907_override_typography_field" );
}

//Customtize Redux CSS
if(!function_exists('wbc907_redux_custom_css_style')){
	
	function wbc907_redux_custom_css_style(){
		if(!is_admin()) return;
		wp_enqueue_style(
                    'wbc907-redux-admin-css',
                    trailingslashit( plugin_dir_url( __FILE__ )).'css/redux-custom-styles.css',
                    array(),
                    '1.0',
                    'all'
                );

		wp_enqueue_script(
                    'wbc907-redux-admin-js',
                    trailingslashit( plugin_dir_url( __FILE__ )).'js/redux-custom-script.js',
                    array( 'jquery' ),
                    '1.0',
                    true
                );
	}
	add_action( "redux/page/wbc907_data/enqueue", 'wbc907_redux_custom_css_style');
}

/************************************************************************
* Redux Options Panel
*************************************************************************/
if ( !class_exists( 'ReduxFramework' ) && file_exists( dirname( __FILE__ ) . '/ReduxCore/framework.php' ) ) {
	require_once dirname( __FILE__ ) . '/ReduxCore/framework.php';
}

/************************************************************************
* Remove Redux About Page
*************************************************************************/
if(!function_exists('wbc907_remove_redux_menu')){
	function wbc907_remove_redux_menu() {
		global $submenu;
	    remove_submenu_page('tools.php','redux-about');
	    if ( current_user_can( 'edit_theme_options' ) && array_key_exists('ninezeroseven', $submenu) ) {
			$submenu['ninezeroseven'][] = array(esc_attr__( 'Demo Importer', 'ninezeroseven' ), 'manage_options',admin_url( 'admin.php?page=_options&tab=wbc-demo-importer&linked=true' ));
		}
	}
	add_action( 'admin_menu', 'wbc907_remove_redux_menu',12 );
}

/************************************************************************
* WBC Importer Extension
*************************************************************************/

if(!function_exists('wbc_theme_importer_description')){
	function wbc_theme_importer_description( $description ){

		return '<b>'.$description.'</b>';

	}

	add_filter('wbc_importer_description','wbc_theme_importer_description');
}



if ( !function_exists( 'wbc_after_content_import' ) ) {
	function wbc_after_content_import( $demo_active_import , $demo_directory_path ) {

		reset( $demo_active_import );

		$current_key = key( $demo_active_import );

		//Import Sliders
		if ( class_exists( 'RevSlider' ) ) {
			$wbc_sliders_array = array(
				'creative'       => 'Creative.zip',
				'photography'    => 'photography-demo-slider.zip',
				'photography-v2' => 'photography-v2-demo.zip',
				'resume'         => 'resume-demo-slider.zip',
				'cloud-hosting'  => 'hosting-demo-slider.zip',
			);

			if ( isset( $demo_active_import[$current_key]['directory'] ) && !empty( $demo_active_import[$current_key]['directory'] ) && array_key_exists( $demo_active_import[$current_key]['directory'], $wbc_sliders_array ) ) {
				$wbc_slider_import = $wbc_sliders_array[$demo_active_import[$current_key]['directory']];

				if ( file_exists( $demo_directory_path.$wbc_slider_import ) ) {
					$slider = new RevSlider();
					$slider->importSliderFromPost( true, true, $demo_directory_path.$wbc_slider_import );
				}
			}
		}

		//Set Menus
		$wbc_menu_array = array(
			'adventure'            => 'Adventure Demo Menu',
			'gym'                  => 'Gym Demo Main Menu',
			'construction'         => 'Construction Demo Main Menu',
			'drone'                => 'Drone Demo Main Menu',
			'creative'             => 'Creative Demo Main Menu',
			'creative-v2'          => 'Creative V2 Demo Main Menu',
			'single-property'      => 'Single Property Demo Main Menu',
			'barber'               => 'Barber Demo Main Menu',
			'freelancer'           => 'Freelancer Demo Main Menu',
			'photography'          => 'Photography Main Demo Menu',
			'photography-v2'       => 'Photography V2 Menu',
			'designer'             => 'Designer Main Demo Menu',
			'app'                  => 'Mobile App Demo Menu',
			'tattoo'               => 'Tattoo Demo Menu',
			'medical'              => 'Medical Demo Menu',
			'lawyer'               => 'Lawyer Demo Menu',
			'cupcake'              => 'CupCake Demo Menu',
			'taxi'                 => 'Taxi Demo Menu',
			'freelancer-portfolio' => 'Freelancer Portfolio Demo Menu',
			'resume'               => 'Resume Demo Menu',
			'cloud-hosting'        => 'Hosting Demo Menu',
			'yoga'                 => 'Yoga Demo Menu',
			'watch-shop'           => 'Watches Demo Menu',
		);

		if ( isset( $demo_active_import[$current_key]['directory'] ) && !empty( $demo_active_import[$current_key]['directory'] ) && array_key_exists( $demo_active_import[$current_key]['directory'], $wbc_menu_array ) ) {
			$top_menu = get_term_by( 'name', $wbc_menu_array[$demo_active_import[$current_key]['directory']] , 'nav_menu' );
			if ( isset( $top_menu->term_id ) ) {
				set_theme_mod( 'nav_menu_locations', array(
						'wbc907-primary' => $top_menu->term_id,
						'wbc907-footer'  => $top_menu->term_id
					)
				);
			}
		}

		//Set Home Page
		$wbc_home_pages = array(
			'adventure'            => 'Homepage Adventure',
			'gym'                  => 'Homepage Gym',
			'construction'         => 'Homepage Construction',
			'drone'                => 'Homepage Drone',
			'creative'             => 'Homepage Creative',
			'creative-v2'          => 'Homepage Creative v2',
			'single-property'      => 'Homepage Single Property',
			'barber'               => 'Homepage Barber',
			'freelancer'           => 'Homepage Freelancer',
			'photography'          => 'Homepage Photography',
			'photography-v2'       => 'Homepage Photography v2',
			'designer'             => 'Homepage Designer',
			'app'                  => 'Homepage APP',
			'tattoo'               => 'Homepage Tattoo',
			'medical'              => 'Homepage Medical',
			'lawyer'               => 'Homepage Lawyer',
			'cupcake'              => 'Homepage Cupcake',
			'taxi'                 => 'Homepage Taxi',
			'freelancer-portfolio' => 'Homepage Freelancer Portfolio',
			'resume'               => 'Homepage Resume',
			'cloud-hosting'        => 'Homepage Cloud Hosting',
			'yoga'                 => 'Homepage Yoga',
			'watch-shop'           => 'Homepage Watch Shop',
		);
		if ( isset( $demo_active_import[$current_key]['directory'] ) && !empty( $demo_active_import[$current_key]['directory'] ) && array_key_exists( $demo_active_import[$current_key]['directory'], $wbc_home_pages ) ) {
			$page = get_page_by_title( $wbc_home_pages[$demo_active_import[$current_key]['directory']] );
			if ( isset( $page->ID ) ) {
				update_option( 'page_on_front', $page->ID );
				update_option( 'show_on_front', 'page' );
			}
		}


		//SET SHOP PAGES/SETTINGs
		//Set Home Page
		
		$wbc_shop_pages = array(
			'watch-shop' => array('shop'      => 'Shop',
								  'cart'      => 'Cart',
								  'checkout'  => 'Checkout',
								  'myaccount' => 'My Account',
								),
		);

		if ( isset( $demo_active_import[$current_key]['directory'] ) && !empty( $demo_active_import[$current_key]['directory'] ) && array_key_exists( $demo_active_import[$current_key]['directory'], $wbc_shop_pages ) ) {
			$shop_settings = $wbc_shop_pages[$demo_active_import[$current_key]['directory']];
			if(is_array($shop_settings)){
				foreach ($shop_settings as $option => $shop_page) {
					if(get_option( 'woocommerce_'.$option.'_page_id' ) == false){
						$o_page = get_page_by_title($shop_page);
						if ( isset( $o_page->ID ) ) {
							update_option( 'woocommerce_'.$option.'_page_id', $o_page->ID);
						}
					}
				}
			}
		}

	}
	add_action( 'wbc_importer_after_content_import', 'wbc_after_content_import', 10, 2 );
}

if ( !function_exists( 'wbc_filter_title' ) ) {
	function wbc_filter_title( $title ) {
		return trim( ucfirst( str_replace( "-", " ", $title ) ) );
	}
	add_filter( 'wbc_importer_directory_title', 'wbc_filter_title', 10 );
}


/**
 * WP_IMPORTER Filter
 *
 * Filter ran only when import demo content, replaces URL's set by VC
 * when using buttons, links, etc.
 *
 */
if ( !function_exists( 'wbc_url_post_update' ) ) {
	function wbc_url_post_update( $import_data, $wp_import_post ) {

		if ( isset( $import_data['post_type'] ) && $import_data['post_type'] == 'page' && isset( $import_data['post_content'] ) && !empty( $import_data['post_content'] ) ) {

			$encode_url = urlencode( trailingslashit( home_url() ) );
			$replace_array = array(
				'http%3A%2F%2Fthemes.webcreations907.com%2Fninezeroseven%2Fdemo7%2F' => $encode_url,
				'http%3A%2F%2Fthemes.webcreations907.com%2Fninezeroseven%2Fdemo8%2F' => $encode_url
			);

			$import_data['post_content'] = strtr( $import_data['post_content'] , $replace_array );
		}

		return $import_data;
	}

	add_filter( 'wp_import_post_data_processed', 'wbc_url_post_update', 10, 2 );
}
?>
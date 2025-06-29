<?php
/*
Plugin Name:		SpiceBox
Description: 		Enhances SpiceThemes with extra functionality.
Version: 			2.4.2
Requires at least: 	3.3
Requires PHP:		5.2
Tested up to:       6.8
Author: 			Spicethemes
Author URI: 		https://spicethemes.com
License:            GPLv2 or later
License URI:        http://www.gnu.org/licenses/gpl-2.0.html
Text Domain: 		spicebox
Domain Path:        /languages
*/
define( 'SPICEB_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'SPICEB_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

// Assuming WC_PLUGIN_VERSION is defined somewhere in your plugin
if ( ! defined( 'SPICEBOX_PLUGIN_VERSION' ) ) {
    define( 'SPICEBOX_PLUGIN_VERSION', '2.4.1' );
}

function spiceb_activate() {
	$theme = wp_get_theme(); // gets the current theme
	if ( 'SpicePress' == $theme->name || 'SpicePress Dark' == $theme->name || 'Rockers' == $theme->name || 'Content' == $theme->name  || 'Certify' == $theme->name || 'Stacy' == $theme->name || 'SpicePress Child Theme' == $theme->name || 'SpicePress Child' == $theme->name){

		//Alpha Color Control
		require_once('inc/controls/customizer-alpha-color-picker/class-spicepress-customize-alpha-color-control.php');
        require_once('inc/controls/customizer-image-radio-button/image_radio_button.php');
		require_once('inc/spicepress/features/feature-slider-section.php');
		require_once('inc/spicepress/features/feature-service-section.php');
		require_once('inc/spicepress/features/feature-portfolio-section.php');
		require_once('inc/spicepress/features/feature-testimonial-section.php');
		require_once('inc/spicepress/sections/spicepress-slider-section.php');
		require_once('inc/spicepress/sections/spicepress-features-section.php');
		require_once('inc/spicepress/sections/spicepress-portfolio-section.php');
		require_once('inc/spicepress/sections/spicepress-testimonail-section.php');
		require_once('inc/spicepress/customizer.php');
	}

	if ( 'HoneyPress' == $theme->name || 'HoneyPress Child' == $theme->name || 'Radix Multipurpose' == $theme->name || 'HoneyWaves' == $theme->name || 'Bizhunt' == $theme->name || 'Tromas' == $theme->name || 'HoneyBee' == $theme->name || 'Honeypress Dark' == $theme->name ){
		require_once('inc/honeypress/features/feature-slider-section.php');
		require_once('inc/honeypress/features/feature-service-section.php');
		require_once('inc/honeypress/features/feature-testimonial-section.php');
		require_once('inc/honeypress/sections/honeypress-slider-section.php');
		require_once('inc/honeypress/sections/honeypress-service-section.php');
		require_once('inc/honeypress/sections/honeypress-testimonail-section.php');
		require_once('inc/honeypress/customizer.php');
	}
	if ( 'CloudPress' == $theme->name || 'CloudPress Child' == $theme->name || 'CloudPress Dark' == $theme->name  || 'CloudPress Agency' == $theme->name || 'CloudPress Business' == $theme->name){
		require_once('inc/cloudpress/features/feature-slider-section.php');
		require_once('inc/cloudpress/features/feature-cta-section.php');
		require_once('inc/cloudpress/features/feature-service-section.php');
		require_once('inc/cloudpress/features/feature-funfact-section.php');
		require_once('inc/cloudpress/features/feature-team-section.php');
		require_once('inc/cloudpress/sections/cloudpress-slider-section.php');
		require_once('inc/cloudpress/sections/cloudpress-cta-section.php');
		require_once('inc/cloudpress/sections/cloudpress-service-section.php');
		require_once('inc/cloudpress/sections/cloudpress-funfact-section.php');
		require_once('inc/cloudpress/sections/cloudpress-team-section.php');
		require_once('inc/cloudpress/customizer.php');
	}

	if ( 'CloudPress Dark' == $theme->name || 'CloudPress Agency' == $theme->name || 'CloudPress Business' == $theme->name){
	require_once('inc/controls/customizer-alpha-color-picker/class-spicepress-customize-alpha-color-control.php');
    require_once('inc/cloudpress/features/feature-testimonial-section.php');
    require_once('inc/cloudpress/sections/cloudpress-testimonail-section.php');
	}

	if ( 'Chilly' == $theme->name || 'SpiceBlue' == $theme->name){
    	require_once('inc/controls/customizer-alpha-color-picker/class-spicepress-customize-alpha-color-control.php');
		require_once('inc/spicepress/features/feature-service-section.php');
		require_once('inc/spicepress/features/feature-portfolio-section.php');
		require_once('inc/spicepress/features/feature-testimonial-section.php');
		require_once('inc/spicepress/sections/spicepress-features-section.php');
		require_once('inc/spicepress/sections/spicepress-portfolio-section.php');
		require_once('inc/spicepress/sections/spicepress-testimonail-section.php');
		require_once('inc/spicepress/customizer.php');
	}

    if ( 'Innofit' == $theme->name || 'Innofit Child' == $theme->name){


		include_once( ABSPATH . 'wp-admin/includes/plugin.php' );


		if ( ! is_plugin_active( 'innofit-plus/innofit-plus.php' ) ):


			if ( ! function_exists( 'spiceb_innofit_customize_register' ) ) :
				function spiceb_innofit_customize_register($wp_customize){


					if(!empty(get_theme_mod('innofit_testimonial_content')))
					{
					$sections_customizer_data = array('slider','services','about','testimonial','team','news','callout','contact','subscriber','wooproduct');
					}
					else
					{
					$sections_customizer_data = array('slider','services','about','team','news','callout','contact','subscriber','wooproduct');
					}

					if(!empty(get_theme_mod('home_call_out_title')))
					{
					$sections_customizer_data = array('slider','services','about','testimonial','team','news','callout','contact','subscriber','wooproduct');
					}
					else
					{
					$sections_customizer_data = array('slider','services','about','team','news','contact','subscriber','wooproduct');
					}


					if(!empty(get_theme_mod('innofit_subscribe_title')))
					{
					$sections_customizer_data = array('slider','services','about','testimonial','team','news','callout','contact','subscriber','wooproduct');
					}
					else
					{
					$sections_customizer_data = array('slider','services','about','team','news','contact','wooproduct');
					}





				$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';

				if (!empty($sections_customizer_data))
				{
					foreach($sections_customizer_data as $section_customizer_data)
					{
						require_once('inc/innofit/customizer/'.$section_customizer_data.'-section.php');
					}
				}
				$wp_customize->remove_control('header_textcolor');

			}
			add_action( 'customize_register', 'spiceb_innofit_customize_register' );
			endif;


			    $sections_data = array('slider','services','about','testimonial','team','news','callout','contact','subscriber','wooproduct');

				if (!empty($sections_data))
				{
					foreach($sections_data as $section_data)
					{
						require_once('inc/innofit/sections/innofit-'.$section_data.'-section.php');
					}
				}

			require_once('inc/innofit/customizer/customizer-render-callbacks.php');
			require_once('inc/innofit/customizer.php');


		endif;

	}

	if ( 'BusiCare' == $theme->name || 'BusiCare Child' == $theme->name || 'BusiCare Dark' == $theme->name){
		
		include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
		
		if ( ! is_plugin_active( 'busicare-plus/busicare-plus.php' ) ):

			require_once('inc/controls/customizer-alpha-color-picker/class-spicepress-customize-alpha-color-control.php');
	        require_once('inc/controls/customizer-repeater/functions.php');
	        require ('inc/controls/customizer-text-radio/customizer-text-radio.php');

			if ( ! function_exists( 'spiceb_busicare_customize_register' ) ) :
				function spiceb_busicare_customize_register($wp_customize){
					
					$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
					$sections_customizer_data = array('slider','services','news','testimonial','team');	
															
					if (!empty($sections_customizer_data))
					{ 
						foreach($sections_customizer_data as $section_customizer_data)
						{ 
							require_once('inc/busicare/customizer/'.$section_customizer_data.'-section.php');
						}	
					}
					$wp_customize->remove_control('header_textcolor');
					
				}
				add_action( 'customize_register', 'spiceb_busicare_customize_register' );
			endif;
				
			if ( 'BusiCare' == $theme->name || 'BusiCare Child' == $theme->name)
			{
				$sections_data = array('slider','services','news','testimonial','team');
			}	
			else
			{
				$sections_data = array('slider','services','news-dark','testimonial','team');
			}
				
			if (!empty($sections_data)){ 

				foreach($sections_data as $section_data){ 
					require_once('inc/busicare/sections/busicare-'.$section_data.'-section.php');
				}	
			}
				
			require_once('inc/busicare/customizer.php');
		
		endif;
	}

	//Spice Software
	if ( 'Spice Software' == $theme->name ||  'Spice Software Dark' == $theme->name || 'Spice Software Child' == $theme->name){
		
		include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
		require_once('inc/controls/customizer-alpha-color-picker/class-spicepress-customize-alpha-color-control.php');
		if ( ! is_plugin_active( 'spice-software-plus/spice-software-plus.php' ) ):

			require_once('inc/controls/customizer-alpha-color-picker/class-spicepress-customize-alpha-color-control.php');
	        require_once('inc/controls/customizer-repeater/functions.php');
	        require ('inc/controls/customizer-text-radio/customizer-text-radio.php');

			if ( ! function_exists( 'spiceb_spice_software_customize_register' ) ) :
				function spiceb_spice_software_customize_register($wp_customize){
					
					$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
					$sections_customizer_data = array('slider','services','news','testimonial','team');	
															
						
					
					if (!empty($sections_customizer_data))
					{ 
						foreach($sections_customizer_data as $section_customizer_data)
						{ 
							require_once('inc/spice-software/customizer/'.$section_customizer_data.'-section.php');
						}	
					}
					$wp_customize->remove_control('header_textcolor');
					
				}
				add_action( 'customize_register', 'spiceb_spice_software_customize_register' );
			endif;
				
			$sections_data = array('slider','services','news','testimonial','team');
				
			if (!empty($sections_data)){ 

				foreach($sections_data as $section_data){ 
					require_once('inc/spice-software/sections/spice-software-'.$section_data.'-section.php');
				}	
			}
				
			require_once('inc/spice-software/customizer.php');
		
		endif;
	}


	//Spiko
	if ( 'Spiko' == $theme->name || 'Spiko Child' == $theme->name ||  'Spiko Dark' == $theme->name){
		
		include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
		
		if ( ! is_plugin_active( 'spiko-plus/spiko-plus.php' ) ):

			require_once('inc/controls/customizer-alpha-color-picker/class-spicepress-customize-alpha-color-control.php');
	        require_once('inc/controls/customizer-repeater/functions.php');
	        require ('inc/controls/customizer-text-radio/customizer-text-radio.php');

			if ( ! function_exists( 'spiceb_spiko_customize_register' ) ) :
				function spiceb_spiko_customize_register($wp_customize){
					
					$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
					$sections_customizer_data = array('slider','services','testimonial','team','news');	
															
						
					
					if (!empty($sections_customizer_data))
					{ 
						foreach($sections_customizer_data as $section_customizer_data)
						{ 
							require_once('inc/spiko/customizer/'.$section_customizer_data.'-section.php');
						}	
					}
					$wp_customize->remove_control('header_textcolor');
					
				}
				add_action( 'customize_register', 'spiceb_spiko_customize_register' );
			endif;
				
			$sections_data = array('slider','services','testimonial','team','news');
				
			if (!empty($sections_data)){ 

				foreach($sections_data as $section_data){ 
					require_once('inc/spiko/sections/spiko-'.$section_data.'-section.php');
				}	
			}
				
			require_once('inc/spiko/customizer.php');
		
		endif;
	}

//WPKites
	if ( 'WPKites' == $theme->name || 'WPKites Child' == $theme->name ||  'WPKites Dark' == $theme->name){
		
		include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
		
		if ( ! is_plugin_active( 'wpkites-plus/wpkites-plus.php' ) ):

			require_once('inc/controls/customizer-alpha-color-picker/class-spicepress-customize-alpha-color-control.php');
	        require_once('inc/controls/customizer-repeater/functions.php');
	        require ('inc/controls/customizer-text-radio/customizer-text-radio.php');

			if ( ! function_exists( 'spiceb_wpkites_customize_register' ) ) :
				function spiceb_wpkites_customize_register($wp_customize){
					
					$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
					$sections_customizer_data = array('slider','services','team','news','testimonial');	
															
						
					
					if (!empty($sections_customizer_data))
					{ 
						foreach($sections_customizer_data as $section_customizer_data)
						{ 
							require_once('inc/wpkites/customizer/'.$section_customizer_data.'-section.php');
						}	
					}
					$wp_customize->remove_control('header_textcolor');
					
				}
				add_action( 'customize_register', 'spiceb_wpkites_customize_register' );
			endif;
				
			$sections_data = array('slider','services','team','news','testimonial');
				
			if (!empty($sections_data)){ 

				foreach($sections_data as $section_data){ 
					require_once('inc/wpkites/sections/wpkites-'.$section_data.'-section.php');
				}	
			}
				
			require_once('inc/wpkites/customizer.php');
		
		endif;


		add_action( 'admin_menu', 'wpkites_starter_sites_menu',999 );
		if(!function_exists('wpkites_starter_sites_menu')) {
		    function wpkites_starter_sites_menu() {
		           
                add_submenu_page(
                    'wpkites-panel',
                    esc_html__( 'Starer Sites', 'spicebox' ),
                    esc_html__( 'Starer Sites', 'spicebox' ),
                    'manage_options',
                    'starter-sites',
                    function() { require_once SPICEB_PLUGIN_DIR.'inc/wpkites/starter-sites/view.php'; },             
                    2
                );

                add_submenu_page(
                    'wpkites-panel',
                    esc_html__( 'Extensions', 'spicebox' ),
                    esc_html__( 'Extensions', 'spicebox' ),
                    'manage_options',
                    'extensions',
                    function() { require_once SPICEB_PLUGIN_DIR.'inc/wpkites/extensions/view.php'; },             
                    2
                );

		    }

		}
	}

//WPHester
	if ( 'WPHester' == $theme->name || 'WPHester Child' == $theme->name ||  'WPHester Dark' == $theme->name){
		
		include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
		
		if ( ! is_plugin_active( 'wphester-plus/wphester-plus.php' ) ):

			require_once('inc/controls/customizer-alpha-color-picker/class-spicepress-customize-alpha-color-control.php');
	        require_once('inc/controls/customizer-repeater/functions.php');
	        require ('inc/controls/customizer-text-radio/customizer-text-radio.php');

			if ( ! function_exists( 'spiceb_wphester_customize_register' ) ) :
				function spiceb_wphester_customize_register($wp_customize){
					
					$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
					$sections_customizer_data = array('slider','services','testimonial','team','news');	
															
						
					
					if (!empty($sections_customizer_data))
					{ 
						foreach($sections_customizer_data as $section_customizer_data)
						{ 
							require_once('inc/wphester/customizer/'.$section_customizer_data.'-section.php');
						}	
					}
					$wp_customize->remove_control('header_textcolor');
					
				}
				add_action( 'customize_register', 'spiceb_wphester_customize_register' );
			endif;
				
			$sections_data = array('slider','services','testimonial','team','news');
				
			if (!empty($sections_data)){ 

				foreach($sections_data as $section_data){ 
					require_once('inc/wphester/sections/wphester-'.$section_data.'-section.php');
				}	
			}
				
			require_once('inc/wphester/customizer.php');
		
		endif;
	}
}
add_action( 'init', 'spiceb_activate' );


$theme = wp_get_theme();
if ( 'SpicePress' == $theme->name || 'SpicePress Dark' == $theme->name || 'Rockers' == $theme->name || 'Content' == $theme->name || 'Certify' == $theme->name || 'Stacy' == $theme->name || 'SpicePress Child Theme' == $theme->name || 'Chilly' == $theme->name || 'SpiceBlue' == $theme->name || 'SpicePress Child' == $theme->name){


register_activation_hook( __FILE__, 'spiceb_install_function');
function spiceb_install_function()
{
$item_details_page = get_option('item_details_page');
    if(!$item_details_page){
	require_once('inc/spicepress/default-pages/upload-media.php');
	require_once('inc/spicepress/default-pages/about-page.php');
	require_once('inc/spicepress/default-pages/home-page.php');
	require_once('inc/spicepress/default-pages/blog-page.php');
	require_once('inc/spicepress/default-pages/contact-page.php');
	require_once('inc/spicepress/default-pages/portfolio-page.php');
	require_once('inc/spicepress/default-widgets/default-widget.php');
	update_option( 'item_details_page', 'Done' );
    }
}

}


//Honeypress
if ( 'HoneyPress' == $theme->name || 'HoneyPress Child' == $theme->name || 'Radix Multipurpose' == $theme->name || 'HoneyWaves' == $theme->name || 'Bizhunt' == $theme->name || 'Tromas' == $theme->name || 'HoneyBee' == $theme->name  || 'Honeypress Dark' == $theme->name ){
register_activation_hook( __FILE__, 'spiceb_install_function');
function spiceb_install_function()
{
$item_details_page = get_option('item_details_page');
    if(!$item_details_page){
	require_once('inc/honeypress/default-pages/upload-media.php');
	require_once('inc/honeypress/default-pages/home-page.php');
	require_once('inc/honeypress/default-pages/blog-page.php');
	require_once('inc/honeypress/default-widgets/default-widget.php');
	update_option( 'item_details_page', 'Done' );
    }
}
}

//CloudPress
if ( 'CloudPress' == $theme->name || 'CloudPress Child' == $theme->name || 'CloudPress Dark' == $theme->name  || 'CloudPress Agency' == $theme->name || 'CloudPress Business' == $theme->name){
register_activation_hook( __FILE__, 'spiceb_cloudpress_install_function');
function spiceb_cloudpress_install_function()
{
$item_details_page = get_option('item_details_page');
    if(!$item_details_page){
	require_once('inc/cloudpress/default-pages/upload-media.php');
	require_once('inc/cloudpress/default-pages/home-page.php');
	require_once('inc/cloudpress/default-pages/blog-page.php');
	require_once('inc/cloudpress/default-widgets/default-widget.php');
	update_option( 'item_details_page', 'Done' );
    }
}
}

//Innofit
if ( 'Innofit' == $theme->name || 'Innofit Child' == $theme->name){

register_activation_hook( __FILE__, 'spiceb_install_function');
function spiceb_install_function()
{
$item_details_page = get_option('item_details_page');
    if(!$item_details_page){
	require_once('inc/innofit/default-pages/upload-media.php');
	require_once('inc/innofit/default-pages/home-page.php');
	require_once('inc/innofit/default-widgets/default-widget.php');
	require_once('inc/innofit/default-pages/home-custom-menu.php');
	update_option( 'item_details_page', 'Done' );
    }
}

}

//Metabox Seeting For Chilly Theme
if ( 'Chilly' == $theme->name )
{
require_once('inc/chilly/post-meta.php');
}

//BusiCare
if ( 'BusiCare' == $theme->name || 'BusiCare Child' == $theme->name || 'BusiCare Dark' == $theme->name){		
	register_activation_hook( __FILE__, 'spiceb_busicare_install_function');
	function spiceb_busicare_install_function(){	
		$item_details_page = get_option('item_details_page'); 
	    if(!$item_details_page){
			require_once('inc/busicare/default-pages/upload-media.php');
			require_once('inc/busicare/default-pages/home-page.php');
			require_once('inc/busicare/default-pages/blog-page.php');
			require_once('inc/busicare/default-widgets/default-widget.php');
			update_option( 'item_details_page', 'Done' );
	    }
	}
}

// Spice Software
if ( 'Spice Software' == $theme->name ||  'Spice Software Dark' == $theme->name ||  'Spice Software Child' == $theme->name){	
	register_activation_hook( __FILE__, 'spiceb_spice_software_install_function');
	function spiceb_spice_software_install_function(){	
		$item_details_page = get_option('item_details_page'); 
	    if(!$item_details_page){
			require_once('inc/spice-software/default-pages/upload-media.php');
			require_once('inc/spice-software/default-pages/home-page.php');
			require_once('inc/spice-software/default-pages/blog-page.php');
			require_once('inc/spice-software/default-widgets/default-widget.php');
			update_option( 'item_details_page', 'Done' );
	    }
	}
}

// Spiko
if ( 'Spiko' == $theme->name || 'Spiko Child' == $theme->name  ||  'Spiko Dark' == $theme->name){
	register_activation_hook( __FILE__, 'spiceb_spiko_install_function');
	function spiceb_spiko_install_function(){	
		$item_details_page = get_option('item_details_page'); 
	    if(!$item_details_page){
			require_once('inc/spiko/default-pages/upload-media.php');
			require_once('inc/spiko/default-pages/home-page.php');
			require_once('inc/spiko/default-pages/blog-page.php');
			update_option( 'item_details_page', 'Done' );
	    }
	}
}

// WPKites
if ( 'WPKites' == $theme->name || 'WPKites Child' == $theme->name  ||  'WPKites Dark' == $theme->name){
	register_activation_hook( __FILE__, 'spiceb_wpkites_install_function');
	function spiceb_wpkites_install_function(){	
		$item_details_page = get_option('item_details_page'); 
	    if(!$item_details_page){
			require_once('inc/wpkites/default-pages/upload-media.php');
			require_once('inc/wpkites/default-pages/home-page.php');
			require_once('inc/wpkites/default-pages/blog-page.php');
			update_option( 'item_details_page', 'Done' );
	    }
	}
}

// WPHester
if ( 'WPHester' == $theme->name || 'WPHester Child' == $theme->name  ||  'WPHester Dark' == $theme->name){
	register_activation_hook( __FILE__, 'spiceb_kites_install_function');
	function spiceb_kites_install_function(){	
		$item_details_page = get_option('item_details_page'); 
	    if(!$item_details_page){
			require_once('inc/wphester/default-pages/upload-media.php');
			require_once('inc/wphester/default-pages/home-page.php');
			require_once('inc/wphester/default-pages/blog-page.php');
			update_option( 'item_details_page', 'Done' );
	    }
	}
}
//Sanatize for spicepress
//radio box sanitization function
function spiceb_sanitize_radio( $input, $setting ){
            //input must be a slug: lowercase alphanumeric characters, dashes and underscores are allowed only
            $input = sanitize_key($input);
            //get the list of possible radio box options 
            $choices = $setting->manager->get_control( $setting->id )->choices;               
            //return input if valid or return default option
            return ( array_key_exists( $input, $choices ) ? $input : $setting->default );                   
}
//Select sanitization callback
  function spiceb_select_text_sanitization( $input, $setting ){
          
            //input must be a slug: lowercase alphanumeric characters, dashes and underscores are allowed only
            $input = sanitize_key($input);
  
            //get the list of possible select options 
            $choices = $setting->manager->get_control( $setting->id )->choices;
                              
            //return input if valid or return default option
            return ( array_key_exists( $input, $choices ) ? $input : $setting->default );                
              
        }
//Sanatize checkbox
function spiceb_sanitize_checkbox( $checked ) {
	// Boolean check.
	return ( ( isset( $checked ) && true == $checked ) ? true : false );
}
//Sanatize text
function spiceb_spicepress_home_page_sanitize_text( $input ) {
		return wp_kses_post( force_balance_tags( $input ) );
}

//Sanatize for honeypress theme
function spiceb_honeypress_home_page_sanitize_text( $input ) {
		return wp_kses_post( force_balance_tags( $input ) );
}
//Sanatize for CloudPress theme
function spiceb_cloudpress_home_page_sanitize_text( $input ) {
		return wp_kses_post( force_balance_tags( $input ) );
}
//Sanatize for Busicare theme
function spiceb_busicare_home_page_sanitize_text($input){
			return wp_kses_post( force_balance_tags( $input ) );
}
function spiceb_busicare_sanitize_checkbox($checked) {
    // Boolean check.
    return ( ( isset($checked) && true == $checked ) ? true : false );
}
//Sanatize for Spice Software theme
function spiceb_spice_software_home_page_sanitize_text($input){
			return wp_kses_post( force_balance_tags( $input ) );
}
function spiceb_spice_software_sanitize_checkbox($checked) {
    // Boolean check.
    return ( ( isset($checked) && true == $checked ) ? true : false );
}
//Sanatize for Spiko theme
function spiceb_spiko_home_page_sanitize_text($input){
			return wp_kses_post( force_balance_tags( $input ) );
}
function spiceb_spiko_sanitize_checkbox($checked) {
    // Boolean check.
    return ( ( isset($checked) && true == $checked ) ? true : false );
}
//Sanatize for wpkites theme
function spiceb_wpkites_home_page_sanitize_text($input){
			return wp_kses_post( force_balance_tags( $input ) );
}
function spiceb_wpkites_sanitize_checkbox($checked) {
    // Boolean check.
    return ( ( isset($checked) && true == $checked ) ? true : false );
}
//Sanatize for hester theme
function spiceb_wphester_home_page_sanitize_text($input){
			return wp_kses_post( force_balance_tags( $input ) );
}
function spiceb_wphester_sanitize_checkbox($checked) {
    // Boolean check.
    return ( ( isset($checked) && true == $checked ) ? true : false );
}
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if ( ! is_plugin_active( 'innofit-plus/innofit-plus.php' ) ):
	function spiceb_innofit_home_page_sanitize_text( $input ) {
		return wp_kses_post( force_balance_tags( $input ) );
	}
endif;

add_action( 'init', 'spiceb_load_textdomain' );
/**
 * Load plugin textdomain.
 */
function spiceb_load_textdomain() {
  load_plugin_textdomain( 'spicebox', false, plugin_dir_url(__FILE__). 'languages' );
}

function spiceb_save_image_to_media_library($image_url, $image_name = 'image') {
    // Get the upload directory
    $upload_dir = wp_upload_dir();
    
    // Get the file name and path
    $filename = basename($image_url);
    $file_path = trailingslashit($upload_dir['path']) . $filename;
    
    // Check if the image exists in the upload directory (if it's already uploaded)
    if (file_exists($file_path)) {
        // Check if this file is already in the Media Library
        $attachment_id = attachment_url_to_postid($upload_dir['url'] . '/' . $filename);
        if ($attachment_id) {
            return $attachment_id; // Return existing attachment ID if found
        }
    }

    // Fetch the image data if it's not found
    $response = wp_remote_get($image_url);
    if (is_wp_error($response)) {
        return new WP_Error('download_error', 'Failed to fetch the image.');
    }

    $image_data = wp_remote_retrieve_body($response);
    if (empty($image_data)) {
        return new WP_Error('invalid_image_data', 'The image data is empty.');
    }

    // Save the image data to the upload directory
    global $wp_filesystem;
    if (!function_exists('WP_Filesystem')) {
        require_once ABSPATH . 'wp-admin/includes/file.php';
    }
    WP_Filesystem();

    // Save the image using WP_Filesystem
    if (!$wp_filesystem->put_contents($file_path, $image_data, FS_CHMOD_FILE)) {
        return new WP_Error('file_write_error', 'Failed to write the image file.');
    }

    // Prepare the file array for insertion
    $filetype = wp_check_filetype($filename, null);
    $attachment_data = array(
        'post_mime_type' => $filetype['type'],
        'post_title'     => sanitize_file_name($image_name),
        'post_content'   => '',
        'post_status'    => 'inherit',
    );

    // Insert the attachment into the WordPress Media Library
    $attachment_id = wp_insert_attachment($attachment_data, $file_path);

    if (is_wp_error($attachment_id)) {
        return $attachment_id; // Return error if something went wrong
    }

    // Generate and save the attachment metadata
    require_once ABSPATH . 'wp-admin/includes/image.php';
    $attachment_metadata = wp_generate_attachment_metadata($attachment_id, $file_path);
    wp_update_attachment_metadata($attachment_id, $attachment_metadata);

    return $attachment_id; // Return the attachment ID
}
<?php

/*
Plugin Name: Surbma - Infusionsoft Shortcode
Plugin URI: http://surbma.com/wordpress-plugins/
Description: A simple shortcode to include Infusionsoft forms into WordPress.

Version: 1.2.2

Author: Surbma
Author URI: http://surbma.com/

License: GPLv2

Text Domain: surbma-infusionsoft-shortcode
Domain Path: /languages/
*/

// Localization
function surbma_infusionsoft_shortcode_init() {
	load_plugin_textdomain( 'surbma-infusionsoft-shortcode', false, dirname( plugin_basename( __FILE__ ) . '/languages/' ) );
}
add_action( 'init', 'surbma_infusionsoft_shortcode_init' );

function surbma_infusionsoft_shortcode_shortcode( $atts ) {
	extract( shortcode_atts( array(
		"account" => '',
		"id" => ''
	), $atts ) );
	return '<script type="text/javascript" src="https://'.$account.'.infusionsoft.com/app/form/iframe/'.$id.'"></script>';
}
add_shortcode( 'infusionsoft-form', 'surbma_infusionsoft_shortcode_shortcode' );


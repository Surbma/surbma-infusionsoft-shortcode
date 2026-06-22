<?php

/*
Plugin Name: Surbma | Infusionsoft Shortcode
Plugin URI: https://surbma.com/wordpress-plugins/
Description: A simple shortcode to include Infusionsoft forms into WordPress.

Version: 2.0.1

Author: Surbma
Author URI: https://surbma.com/

License: GPLv2

Text Domain: surbma-infusionsoft-shortcode
Domain Path: /languages/
*/

// Prevent direct access to the plugin
if ( !defined( 'ABSPATH' ) ) {
	die( 'Good try! :)' );
}

// Localization
function surbma_infusionsoft_shortcode_init() {
	load_plugin_textdomain( 'surbma-infusionsoft-shortcode', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
}
add_action( 'plugins_loaded', 'surbma_infusionsoft_shortcode_init' );

function surbma_infusionsoft_shortcode_shortcode( $atts ) {
	$atts = shortcode_atts(
		array(
			'account' => '',
			'id'      => '',
		),
		$atts,
		'infusionsoft-form'
	);

	$account = $atts['account'];
	$id      = $atts['id'];

	if ( '' === $account || '' === $id ) {
		return '';
	}

	if ( ! preg_match( '/^[a-zA-Z0-9-]+$/', $account ) || ! preg_match( '/^[a-zA-Z0-9-]+$/', $id ) ) {
		return '';
	}

	$url = sprintf(
		'https://%s.infusionsoft.com/app/form/iframe/%s',
		$account,
		$id
	);

	return '<script type="text/javascript" src="' . esc_url( $url ) . '"></script>';
}
add_shortcode( 'infusionsoft-form', 'surbma_infusionsoft_shortcode_shortcode' );

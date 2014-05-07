<?php

/*
Plugin Name: Surbma - Infusionsoft Integration
Plugin URI: http://surbma.com/
Description: Integrate Infusionsoft with WordPress
Version: 1.1.2
Author: Surbma
Author URI: http://surbma.com/
License: GPL2
*/

function surbma_add_infusionsoft_form( $atts ) {
	extract( shortcode_atts( array(
		"account" => '',
		"id" => ''
	), $atts ) );
	return '<script type="text/javascript" src="https://'.$account.'.infusionsoft.com/app/form/iframe/'.$id.'"></script>';
}
add_shortcode( 'infusionsoft-form', 'surbma_add_infusionsoft_form' );


<?php
/*
Plugin Name: Draft List
Plugin URI: https://wordpress.org/plugins/simple-draft-list/
Description: Displays a list of draft posts
Version: 2.2.5
Author: David Artiss
Author URI: http://www.artiss.co.uk
Text Domain: simple-draft-list
*/

/**
* Draft List
*
* Display a list of draft posts
*
* @package	Artiss-Draft-List
* @since	2.0
*/

define( 'artiss_draft_list_version', '2.2.5' );

/**
* Plugin initialisation
*
* Loads the plugin's translated strings
*
* @since	2.1
*/

function adl_plugin_init() {

	$language_dir = plugin_basename( dirname( __FILE__ ) ) . '/languages/';

	load_plugin_textdomain( 'simple-draft-list', false, $language_dir );

}

add_action( 'init', 'adl_plugin_init' );

/**
* Code includes
*
* Includes for all the plugin functions
*
* @since	2.0
*/

$functions_dir = WP_PLUGIN_DIR . '/simple-draft-list/includes/';

include_once( $functions_dir . 'adl-generate-widget.php' );				    // Set-up widget

if ( is_admin() ) {

	include_once( $functions_dir . 'adl-admin-config.php' );				// Administration config

	include_once( $functions_dir . 'adl-meta-box.php' );					// Add meta box to editor

} else {

	include_once( $functions_dir . 'adl-shared-functions.php' );			// Get the default options

	include_once( $functions_dir . 'adl-generate-code.php' );				// Code to output draft list

	include_once( $functions_dir . 'adl-deprecated.php' );					// Deprecated function

}
?>
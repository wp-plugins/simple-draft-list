<?php
/*
Plugin Name: Artiss Draft List
Plugin URI: http://www.artiss.co.uk/draft-list
Description: Displays a list of draft posts
Version: 2.0.2
Author: David Artiss
Author URI: http://www.artiss.co.uk
*/

/**
* Artiss Draft List
*
* Display a list of draft posts
*
* @package	Artiss-Draft-List
* @since	2.0
*/

define( 'artiss_draft_list_version', '2.0.2' );

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
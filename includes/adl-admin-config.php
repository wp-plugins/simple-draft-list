<?php
/**
* Admin Menu Functions
*
* Various functions relating to the various administration screens
*
* @package	Artiss-Draft-List
*/

/**
* Add meta to plugin details
*
* Add options to plugin meta line
*
* @since	2.0
*
* @param	string  $links	Current links
* @param	string  $file	File in use
* @return   string			Links, now with settings added
*/

function adl_set_plugin_meta( $links, $file ) {

	if ( strpos( $file, 'simple-draft-list.php' ) !== false ) {
		$links = array_merge( $links, array( '<a href="http://www.artiss.co.uk/forum">' . __( 'Support', 'artiss-draft-list' ) . '</a>' ) );
		$links = array_merge( $links, array( '<a href="http://www.artiss.co.uk/donate">' . __( 'Donate', 'artiss-draft-list' ) . '</a>' ) );
	}

	return $links;
}
add_filter( 'plugin_row_meta', 'adl_set_plugin_meta', 10, 2 );
?>
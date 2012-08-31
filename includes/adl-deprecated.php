<?php
/**
* Deprecated Functions
*
* Functions that are now deprecated but retained here for backwards
* compatibility
*
* @package	Artiss-Draft-List
*/

/**
* Output List of Drafts
*
* Function to output draft list
*
* @since	1.0
*
* @uses 	adl_get_parameters 		Extract parameters
* @uses	 adl_convert_to_template Convert existing parameters to a template
* @uses	 adl_generate_code	   Generate draft list code
*
* @param	string  $parameters	 Parameters
*/

function simple_draft_list( $parameters ) {
	$limit = adl_get_parameters( $parameters, 'limit' );
	$type = adl_get_parameters( $parameters, 'type' );
	$order = adl_get_parameters( $parameters, 'order' );
	$scheduled = adl_get_parameters( $parameters, 'scheduled' );
	$icon = adl_get_parameters( $parameters, 'icon' );
	$folder = adl_get_parameters( $parameters, 'folder' );
	$author = adl_get_parameters( $parameters, 'author' );
	$template = adl_convert_to_template( $icon, $author);

	echo adl_generate_code( $limit, $type, $order, $scheduled, $folder, '', '', '', '', $template );

	return;
}
?>
<?php
/**
* Widgets
*
* Create and display widgets
*
* @package	Artiss-Draft-List
* @since    2.0
*/

global $wp_version;
if ( ( float ) $wp_version >= 2.8 ) {

	class DraftListWidget extends WP_Widget {

		/**
		* Widget Constructor
		*
		* Call WP_Widget class to define widget
		*
		* @since	2.0
		*
		* @uses		WP_Widget				Standard WP_Widget class
		*/

		function DraftListWidget() {
			parent::WP_Widget(	'draft_list_widget',
								__( 'Draft List', 'simple-draft-list' ),
								array( 'description' => __( 'Display a list of draft posts and/or pages.', 'simple-draft-list' ), 'class' => 'my-widget-class' )
								);
		}

		/**
		* Display widget
		*
		* Display the widget
		*
		* @since	2.0
		*
		* @uses		adl_generate_code       	Generate the required code
		*
		* @param	string		$args			Arguments
		* @param	string		$instance		Instance
		*/

		function widget( $args, $instance ) {
			extract( $args, EXTR_SKIP );

			// Output the header
			echo $before_widget;

			// Extract title for heading
			$title = $instance[ 'title' ];

			// Output title, if one exists
			if ( !empty( $title ) ) { echo $before_title . $title . $after_title; }

			// Generate the video and output it
			echo adl_generate_code (    $instance[ 'limit' ],
										$instance[ 'type' ],
										$instance[ 'order' ],
										$instance[ 'scheduled' ],
										$instance[ 'folder' ],
										$instance[ 'date' ],
										$instance[ 'created' ],
										$instance[ 'modified' ],
										$instance[ 'cache' ],
										$instance[ 'template' ] );

			// Output the trailer
			echo $after_widget;
		}

		/**
		* Widget update/save function
		*
		* Update and save widget
		*
		* @since	2.0
		*
		* @param	string		$new_instance		New instance
		* @param	string		$old_instance		Old instance
		* @return	string							Instance
		*/

		function update( $new_instance, $old_instance ) {

			$instance = $old_instance;
			$instance[ 'title' ] = strip_tags( $new_instance[ 'title' ] );
			$instance[ 'limit' ] = $new_instance[ 'limit' ];
			$instance[ 'type' ] = $new_instance[ 'type' ];
			$instance[ 'order' ] = $new_instance[ 'order' ];
			$instance[ 'scheduled' ] = $new_instance[ 'scheduled' ];
			$instance[ 'folder' ] = $new_instance[ 'folder' ];
			$instance[ 'cache' ] = $new_instance[ 'cache' ];
			$instance[ 'date' ] = $new_instance[ 'date' ];
			$instance[ 'created' ] = $new_instance[ 'created' ];
			$instance[ 'modified' ] = $new_instance[ 'modified' ];
			$instance[ 'template' ] = $new_instance[ 'template' ];

			return $instance;
		}

		/**
		* Widget Admin control form
		*
		* Define admin file
		*
		* @since	2.0
		*
		* @param	string		$instance		Instance
		*/

		function form( $instance ) {
			include ( WP_PLUGIN_DIR . '/simple-draft-list/includes/adl-widget-options.php' );
		}
	}

	/**
	* Register Widget
	*
	* Register widget when loading the WP core
	*
	* @since	2.0
	*/

	function adl_register_widgets() {
		register_widget( 'DraftListWidget' );
	}
	add_action( 'widgets_init', 'adl_register_widgets' );
}
?>
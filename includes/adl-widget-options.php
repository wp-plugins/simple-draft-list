<?php

// Set default options

$default = array( 'title' => __( 'Coming Soon', 'simple-draft-list' ), 'limit' => '0', 'type' => '', 'order' => '', 'scheduled' => '', 'folder' => '', 'cache' => '0.5', 'date' => 'F j, Y, g:i a', 'created' => '', 'modified' => '', 'template' => '%ol%%draft% %icon%' );
$instance = wp_parse_args( ( array ) $instance, $default );

// Title field

$field_id = $this -> get_field_id( 'title' );
$field_name = $this -> get_field_name( 'title' );
echo "\r\n" . '<p><label for="' . $field_id . '">' . __( 'Widget Title', 'simple-draft-list' ) . ': </label><input type="text" class="widefat" id="' . $field_id . '" name="' . $field_name . '" value="' . attribute_escape( $instance[ 'title' ] ).'" /></p>';

// Template field

$field_id = $this -> get_field_id( 'template' );
$field_name = $this -> get_field_name( 'template' );
echo "\r\n" . '<p><label for="' . $field_id . '">' . __( 'Template', 'simple-draft-list' ) . ': </label><input type="text" class="widefat" id="' . $field_id . '" name="' . $field_name . '" value="' . attribute_escape( $instance[ 'template' ] ) . '" /></p>';

// Limit field

$field_id = $this -> get_field_id( 'limit' );
$field_name = $this -> get_field_name( 'limit' );
echo "\r\n" . '<p><label for="' . $field_id . '">' . __( 'Maximum number of drafts (0=unlimited)', 'simple-draft-list' ) . ': </label><input type="text" size="2" maxlength="2" class="widefat" id="' . $field_id . '" name="' . $field_name . '" value="' . attribute_escape( $instance[ 'limit' ] ) . '" /></p>';

// Draft types field

$field_id = $this -> get_field_id( 'type' );
$field_name = $this -> get_field_name( 'type' );
echo "\r\n" . '<p><label for="' . $field_id . '">' . __( 'Draft Type', 'simple-draft-list' ) . ': </label><select name="' . $field_name . '" class="widefat" id="' . $field_id . '"><option value=""';
if ( attribute_escape( $instance[ 'type' ] ) == '' ) { echo " selected='selected'"; }
echo '>' . __( 'Posts & Pages', 'simple-draft-list' ) . '</option><option value="page"';
if ( attribute_escape( $instance[ 'type' ] ) == 'page' ) { echo " selected='selected'"; }
echo '>' . __( 'Pages', 'simple-draft-list' ) . '</option><option value="post"';
if ( attribute_escape( $instance[ 'type' ] ) == 'post' ) { echo " selected='selected'"; }
echo '>' . __( 'Posts', 'simple-draft-list' ) . '</option></select></p>';

// Order field

$field_id = $this -> get_field_id( 'order' );
$field_name = $this -> get_field_name( 'order' );
echo "\r\n" . '<p><label for="' . $field_id . '">' . __( 'Order', 'simple-draft-list' ) . ': </label><select name="' . $field_name . '" class="widefat" id="' . $field_id . '"><option value=""';
if ( attribute_escape( $instance[ 'order' ] ) == '' ) { echo " selected='selected'"; }
echo '>' . __( 'Descending Modified Date', 'simple-draft-list' ) . '</option><option value="ma"';
if ( attribute_escape( $instance[ 'order' ] ) == 'ma' ) { echo " selected='selected'"; }
echo '>' . __( 'Ascending Modified Date', 'simple-draft-list' ) . '</option><option value="cd"';
if ( attribute_escape( $instance[ 'order' ] ) == 'cd' ) { echo " selected='selected'"; }
echo '>' . __( 'Descending Created Date', 'simple-draft-list' ) . '</option><option value="ca"';
if ( attribute_escape( $instance[ 'order' ] ) == 'ca' ) { echo " selected='selected'"; }
echo '>' . __( 'Ascending Created Date', 'simple-draft-list' ) . '</option><option value="td"';
if ( attribute_escape( $instance[ 'order' ] ) == 'td' ) { echo " selected='selected'"; }
echo '>' . __( 'Descending Title', 'simple-draft-list' ) . '</option><option value="ta"';
if ( attribute_escape( $instance[ 'order' ] ) == 'ta' ) { echo " selected='selected'"; }
echo '>' . __( 'Ascending Title', 'simple-draft-list' ) . '</option></select></p>';

// Scheduled field

$field_id = $this -> get_field_id( 'scheduled' );
$field_name = $this -> get_field_name( 'scheduled' );
echo "\r\n" . '<p><label for="' . $field_id . '">' . __( 'Hide Scheduled Posts', 'simple-draft-list' ) . ': </label><input type="checkbox" name="' . $field_name . '" id="' . $field_id . '" value="no"';
if ( attribute_escape( $instance[ 'scheduled' ] ) == 'no' ) { echo " checked='checked'"; }
echo '/></p>';

// Folder field

$field_id = $this -> get_field_id( 'folder' );
$field_name = $this -> get_field_name( 'folder' );
echo "\r\n" . '<p><label for="' . $field_id . '">' . __( 'Icon Folder', 'simple-draft-list' ) . ': </label><input type="text" class="widefat" id="' . $field_id . '" name="' . $field_name . '" value="' . attribute_escape( $instance[ 'folder' ] ) . '" /></p>';

// Date format field

$field_id = $this -> get_field_id( 'date' );
$field_name = $this -> get_field_name( 'date' );
echo "\r\n" . '<p><label for="' . $field_id . '">' . __( 'Date Output Format', 'simple-draft-list' ) . ': </label><input type="text" class="widefat" id="' . $field_id . '" name="' . $field_name . '" value="' . attribute_escape( $instance[ 'date' ] ) . '" /></p>';

// Created field

$field_id = $this -> get_field_id( 'created' );
$field_name = $this -> get_field_name( 'created' );
echo "\r\n" . '<p><label for="' . $field_id . '">' . __( 'Must have been created in the last', 'simple-draft-list' ) . '*: </label><input type="text" class="widefat" id="' . $field_id . '" name="' . $field_name . '" value="' . attribute_escape( $instance[ 'created' ] ) . '" /></p>';

// Modified field

$field_id = $this -> get_field_id( 'modified' );
$field_name = $this -> get_field_name( 'modified' );
echo "\r\n" . '<p><label for="' . $field_id . '">' . __( 'Must have been modified in the last', 'simple-draft-list' ) . '*: </label><input type="text" class="widefat" id="' . $field_id . '" name="' . $field_name . '" value="' . attribute_escape( $instance[ 'modified' ] ) . '" /></p>';

echo '<p>* ' . __( 'leave blank to show posts across all time periods', 'simple-draft-list' ) . '</p>';

// Cache field

$field_id = $this -> get_field_id( 'cache' );
$field_name = $this -> get_field_name( 'cache' );
echo "\r\n" . '<p><label for="' . $field_id . '">' . __( 'Cache', 'simple-draft-list' ) . ': </label><input type="text" size="5" maxlength="5" id="' . $field_id . '" name="' . $field_name . '" value="' . attribute_escape( $instance[ 'cache' ] ) . '" /> hours</p>';
?>
<?php
/*
Plugin Name: Simple Draft List
Plugin URI: http://www.artiss.co.uk/simple-draft-list
Description: Displays a list of draft posts
Version: 1.4
Author: David Artiss
Author URI: http://www.artiss.co.uk
*/
function simple_draft_list($parameters) {
    global $wpdb;
    // Define list limit
    $list_limit=get_draft_parameters($parameters,"limit");
    if (($list_limit!="")&&($list_limit!=0)) {$limit=" LIMIT ".$list_limit;}
    // Define order of the results
    $list_order=strtolower(get_draft_parameters($parameters,"order"));
    $order="post_modified ASC";
    if ($list_order=="ta") {$order="post_title ASC";}
    if ($list_order=="td") {$order="post_title DESC";}
    if ($list_order=="dd") {$order="post_modified DESC";}
    // Define the type of list required
    $list_type=strtolower(get_draft_parameters($parameters,"type"));
    if (($list_type=="post")or($list_type=="page")) {
        $type=" AND post_type = '".$list_type."'";
    } else {
        $type=" AND (post_type = 'post' OR post_type = 'page')";
    }
    if (strtolower(get_draft_parameters($parameters,"scheduled"))!="no") {$status=" OR post_status = 'future'";}
    // Define icon details - positioning and folder
    $icon=strtolower(get_draft_parameters($parameters,"icon"));
    if ($icon=="") {$icon="left";}
    $icon_folder=get_draft_parameters($parameters,"folder");
    if ($icon_folder=="") {
        $icon_folder=WP_PLUGIN_URL."/simple-draft-list/";
    } else {
        $icon_folder=get_bloginfo('template_url')."/".$icon_folder."/";
    }
    // Extract drafts from database based on parameters
    $drafts = $wpdb->get_results("SELECT post_title, post_status FROM $wpdb->posts WHERE (post_status = 'draft'".$status.") AND post_title NOT LIKE '!%'".$type." ORDER BY ".$order.$limit);
    // Loop through and output results
    if ($drafts) {
        foreach ($drafts as $draft_data) {
            $draft_title=$draft_data->post_title;
            $post_status=$draft_data->post_status;
            if ($list_limit!=1) {echo '<li>';}
            if (($post_status=='future')&&($icon=="left")) {echo '<img src="'.$icon_folder.'scheduled.png" alt="Scheduled" title="Scheduled">&nbsp;';}
            if ($draft_title!='') {echo $draft_title;} else {echo '(no title)';}
            if (($post_status=='future')&&($icon=="right")) {echo '&nbsp;<img src="'.$icon_folder.'scheduled.png" alt="Scheduled" title="Scheduled">';}
            if ($list_limit!=1) {echo '</li>';}
            echo "\n";
        }
    }
}
// Function to extract parameters from an input string (1.0)
function get_draft_parameters($input,$para) {
    $start=strpos(strtolower($input),$para."=");
    $content="";
    if ($start!==false) {
        $start=$start+strlen($para)+1;
        $end=strpos(strtolower($input),"&",$start);
        if ($end!==false) {$end=$end-1;} else {$end=strlen($input);}
        $content=substr($input,$start,$end-$start+1);
    }
    return $content;
}
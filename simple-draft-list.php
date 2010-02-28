<?php
/*
Plugin Name: Simple Draft List
Plugin URI: http://www.artiss.co.uk/simple-draft-list
Description: Displays a list of draft posts
Version: 1.0
Author: David Artiss
Author URI: http://www.artiss.co.uk
*/
function simple_draft_list($parameters) {
    global $wpdb;
    // Extract and validate parameters
    $list_limit=get_draft_parameters($parameters,"limit");
    if (($list_limit=="")or($list_limit<1)) {$list_limit=5;}
    $list_order=strtolower(get_draft_parameters($parameters,"order"));
    $order="post_date ASC";
    if ($list_order=="ta") {$order="post_title ASC";}
    if ($list_order=="td") {$order="post_title DESC";}
    if ($list_order=="dd") {$order="post_date DESC";}
    $list_type=strtolower(get_draft_parameters($parameters,"type"));
    if (($list_type=="post")or($list_type=="page")) {$type=" AND post_type = '".$list_type."'";}
    if (($list_limit!="")&&($list_limit!=0)) {$limit=" LIMIT ".$list_limit;}
    // Extract drafts from database based on parameters
    $drafts = $wpdb->get_results("SELECT post_title, post_date FROM $wpdb->posts WHERE post_status = 'draft' AND post_title NOT LIKE '!%'".$type." ORDER BY ".$order.$limit);
    // Loop through and output results
    if ($drafts) {      
        foreach ($drafts as $draft_data) {
            $draft_title=$draft_data->post_title;         
            if ($list_limit!=1) {echo "<li>";}
            if ($draft_title!='') {echo $draft_title;} else {echo "(no title)";}
            if ($list_limit!=1) {echo "</li>";}
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
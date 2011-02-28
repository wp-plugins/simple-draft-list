<?php
/*
Plugin Name: Simple Draft List
Plugin URI: http://www.artiss.co.uk/simple-draft-list
Description: Displays a list of draft posts
Version: 1.6
Author: David Artiss
Author URI: http://www.artiss.co.uk
*/
define('simple_draft_list_version','1.6');
add_shortcode('drafts','simple_draft_list_sc');

// Draft list shortcode
function simple_draft_list_sc($paras="",$content="") {
    extract(shortcode_atts(array('limit'=>'','type'=>'','order'=>'','scheduled'=>'','icon'=>'','folder'=>'','author'=>''),$paras));
    return generate_draft_list_code($limit,$type,$order,$scheduled,$icon,$folder,$author,'sc');
}

function simple_draft_list($parameters) {
    $limit=get_draft_parameters($parameters,"limit");
    $type=get_draft_parameters($parameters,"type");
    $order=get_draft_parameters($parameters,"order");
    $scheduled=get_draft_parameters($parameters,"scheduled");
    $icon=get_draft_parameters($parameters,"icon");
    $folder=get_draft_parameters($parameters,"folder");
    $author_get=get_draft_parameters($parameters,"author");
    echo generate_draft_list_code($limit,$type,$order,$scheduled,$icon,$folder,$author_get,'fun');
}

function generate_draft_list_code($list_limit,$list_type,$list_order,$scheduled,$icon,$folder,$author_get,$source) {
    
    global $wpdb;
    $code="<!-- Simple Draft List v".simple_draft_list_version." | http://www.artiss.co.uk/simple-draft-list -->\n";
    if (($source=="sc")&&($list_limit!=1)) {$code.="<ul>\n";}

    // Convert appropriate parameters to lower case
    $list_type=strtolower($list_type);
    $list_order=strtolower($list_order);
    $scheduled=strtolower($scheduled);
    $icon=strtolower($icon);
    $author_get=strtolower($author_get);

    // Set up parameter defaults
    if ($author_get=="") {$author_get="no";}
    if ($icon=="") {$icon="left";}
    if ($scheduled=="") {$scheduled="yes";}

    // Define list limit
    if (($list_limit!="")&&($list_limit!=0)) {$limit=" LIMIT ".$list_limit;}

    // Define order of the results
    $order="post_modified ASC";
    if ($list_order=="ta") {$order="post_title ASC";}
    if ($list_order=="td") {$order="post_title DESC";}
    if ($list_order=="dd") {$order="post_modified DESC";}

    // Define the type of list required
    if (($list_type=="post")or($list_type=="page")) {
        $type=" AND post_type = '".$list_type."'";
    } else {
        $type=" AND (post_type = 'post' OR post_type = 'page')";
    }
    if ($scheduled!="no") {$status=" OR post_status = 'future'";}

    // Define icon folder
    if ($icon_folder=="") {
        $icon_folder=WP_PLUGIN_URL."/simple-draft-list/";
    } else {
        $icon_folder=get_bloginfo('template_url')."/".$icon_folder."/";
    }

    // Extract drafts from database based on parameters
    $drafts = $wpdb->get_results("SELECT A.id, post_type, post_title, post_status, display_name FROM $wpdb->posts A, $wpdb->users B WHERE B.ID = A.post_author AND (post_status = 'draft'".$status.") AND post_title NOT LIKE '!%'".$type." ORDER BY ".$order.$limit);

    // Loop through and output results
    if ($drafts) {
        foreach ($drafts as $draft_data) {

            // Extract fields from MySQL results
            $post_id=$draft_data->id;
            $post_type=$draft_data->post_type;
            $draft_title=$draft_data->post_title;
            $post_status=$draft_data->post_status;
            $author=$draft_data->display_name;

            // Build code
            if ($list_limit!=1) {$code.='<li>';}
            if (($post_status=='future')&&($icon=="left")) {$code.='<img src="'.$icon_folder.'scheduled.png" alt="Scheduled" title="Scheduled">&nbsp;';}
            if (((current_user_can('edit_posts'))&&($post_type=="post"))or((current_user_can('edit_pages'))&&($post_type=="page"))) {
                $code.="<a href=\"".home_url()."/wp-admin/post.php?post=".$post_id."&action=edit\">";
            }
            if ($draft_title!='') {$code.=$draft_title;} else {$code.='(no title)';}
            if (((current_user_can('edit_posts'))&&($post_type=="post"))or((current_user_can('edit_pages'))&&($post_type=="page"))) {$code.="</a>";}
            if (($post_status=='future')&&($icon=="right")) {$code.='&nbsp;<img src="'.$icon_folder.'scheduled.png" alt="Scheduled" title="Scheduled">';}
            if ($author_get!="no") {$code.="&nbsp;(".$author.")";}
            if ($list_limit!=1) {$code.='</li>';}
            $code.="\n";
        }
    }
    if (($source=="sc")&&($list_limit!=1)) {$code.="<ul>\n";}
    $code.="<!-- End of Simple Draft List -->\n";
    return $code;
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
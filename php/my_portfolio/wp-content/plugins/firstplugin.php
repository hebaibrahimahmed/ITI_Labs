<?php
/*
Plugin Name:capitalize the text
Description: plugin for testing
Author: heba  

*/ 
add_action("the_title","custom_title_case");
function custom_title_case($title) {
    $title = strtoupper($title);
    return $title;
}


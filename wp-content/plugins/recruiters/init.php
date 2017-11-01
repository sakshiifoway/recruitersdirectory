<?php
/*
Plugin Name: Recruiters
*/

//menu items
add_action('admin_menu','recruiters_modifymenu');
function recruiters_modifymenu() {
	
	//this is the main item for the menu
	add_menu_page('Recruiters Management', //page title
	'Recruiters Management', //menu title
	'manage_options', //capabilities
	'manage_recruiters', //menu slug
	'manage_recruiters' //function
	);
	
	//this is a submenu
	add_submenu_page('manage_recruiters', //parent slug
	'Add / Update Recruiters', //page title
	'Add New', //menu title
	'manage_options', //capability
	'add_update_recruiters', //menu slug
	'add_update_recruiters'); //function
}

define('RECRUITERDIR', plugin_dir_path(__FILE__));

require_once(RECRUITERDIR . 'manage_recruiters.php');
require_once(RECRUITERDIR . 'add_update_recruiters.php');
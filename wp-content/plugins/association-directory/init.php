<?php
/*
Plugin Name: Association Directory
*/

//menu items
add_action('admin_menu','association_modifymenu');
function association_modifymenu() {
	
	//this is the main item for the menu
	add_menu_page('Asssociation Management', //page title
	'Asssociation Management', //menu title
	'manage_options', //capabilities
	'manage_associations', //menu slug
	'manage_associations' //function
	);
	
	//this is a submenu
	add_submenu_page('manage_associations', //parent slug
	'Add / Update Asssociation', //page title
	'Add New', //menu title
	'manage_options', //capability
	'add_update_association', //menu slug
	'add_update_association'); //function
}

define('ASSDIR', plugin_dir_path(__FILE__));

require_once(ASSDIR . 'manage_associations.php');
require_once(ASSDIR . 'add_update_association.php');
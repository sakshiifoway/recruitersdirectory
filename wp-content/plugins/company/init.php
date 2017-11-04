<?php
/*
Plugin Name: Company
*/

//menu items
add_action('admin_menu','company_modifymenu');
function company_modifymenu() {
	
	//this is the main item for the menu
	add_menu_page('Company Management', //page title
	'Company Management', //menu title
	'manage_options', //capabilities
	'manage_company', //menu slug
	'manage_company' //function
	);
}

define('COMPANYDIR', plugin_dir_path(__FILE__));

require_once(COMPANYDIR . 'manage_company.php');
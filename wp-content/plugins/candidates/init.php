<?php
/*
Plugin Name: Candidates
Description:
Version: 1
Author: sinetiks.com
Author URI: http://sinetiks.com
*/

//menu items
add_action('admin_menu','candidates_modifymenu');
function candidates_modifymenu() {
	
	//this is the main item for the menu
	add_menu_page('candidates', //page title
	'Candidates', //menu title
	'manage_options', //capabilities
	'candidates', //menu slug
	'candidates_list' //function
	); 
	
	
	/*//this is a submenu
	add_submenu_page('candidates', //parent slug
	'Add Sale Product', //page title
	'Add New', //menu title
	'manage_options', //capability
	'dealer_sale_create', //menu slug
	'dealer_sale_create'); //function
	*/
}

/*wp_enqueue_script('jquery');
wp_enqueue_script('jquery-ui-core');
wp_enqueue_script('jquery-ui-datepicker');
wp_enqueue_style('jquery-ui-css', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.2/themes/smoothness/jquery-ui.css');

*/
define('DealerSaleRoot', plugin_dir_path(__FILE__));
/*if($_REQUEST['page']=="candidates-profile"){ require_once(DealerSaleRoot . 'candidates-profile.php'); } else if($_REQUEST['page']=="recruiter-profile"){ require_once(DealerSaleRoot . 'recruiter-profile.php'); } else{ require_once(DealerSaleRoot . 'candidates-list.php');}*/


require_once(DealerSaleRoot . 'candidates_index.php');

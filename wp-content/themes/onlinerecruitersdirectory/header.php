<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */
session_start();
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php wp_head(); ?>
<script type="text/JavaScript" src="<?php echo get_template_directory_uri(); ?>/validate.js"></script>

<meta charset="utf-8">
<meta name="HandheldFriendly" content="true"/>
<meta name="MobileOptimized" content="320"/>
<meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE" />
<title>Welcome to Headhunters, Executive Search Firms | Online Recruiters Directory</title>
<!------ Globle css --------------->
<link href="<?php echo get_template_directory_uri(); ?>/css/globle.css" rel="stylesheet" type="text/css">
<!------ Checkbox css --------------->
<link href="<?php echo get_template_directory_uri(); ?>/css/checkbox.css" rel="stylesheet" type="text/css">
<!------ Map css --------------->
<link href="<?php echo get_template_directory_uri(); ?>/css/map.css" rel="stylesheet" type="text/css">
<!------ Responsive css --------------->
<link href="<?php echo get_template_directory_uri(); ?>/css/responsive.css" rel="stylesheet" type="text/css">
<!------ Font Awesome css --------------->
<link href="<?php echo get_template_directory_uri(); ?>/css/font-awesome.css" rel="stylesheet" type="text/css">

<!--[if lt IE 9]>
		<script src="js/html5.js"></script>
<![endif]-->

<!------ Banner Script --------------->
<script type="text/javascript" language="javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery-1-8-2.js"></script>



</head>

<body <?php body_class(); ?>>
<div id="sitemain">
<!--- Header Start --->
<header>
	<div class="container">
	<div class="logo"><a href="index.html"><img src="images/logo.png" alt="Logo"></a></div>
      <div class="head-topright">
        	<div class="head-toplink">
            	<ul>
                	<li><a href="#">Dial now (646) 663-1946</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Contact</a></li>
                    <li>
                    	<div class="top-social">
                        	<div class="share-icon">
                            	<a href="#"><img src="images/share-icon.png"/></a>
                                <div class="other-social">
                                	<a href="#"><img src="images/share-gplue-icon.png"/></a>
                                    <a href="#"><img src="images/share-twitter-icon.png"/></a>
                                    <a href="#"><img src="images/share-linkdin-icon.png"/></a>
                                </div>
                          </div>
                        </div>
                    </li>
                </ul>
            </div>
            <br class="clear">
            <div class="employers-section">
            	<label>employers-section</label>
                <div class="employers-button">
                	<div>
                    	<a href="#"><img src="images/state-icon.png"/>state<span class="drop-arrow"><img src="images/down-arrow-employe.png"/></span></a>
                        <div class="employers-box">                        	
                        	<div class="employers-list">
                                <h4><img src="images/hiring-manager-checkicon.png"/>Hiring Manager - Search for a Recruiting firm <span>by state</span></h4>
                                <ul>
                                  <li><a href="#">Alabama</a></li>
                                  <li><a href="#">Alaska</a></li>
                                  <li><a href="#" class="act">Arizona</a></li>
                                  <li><a href="#">Arkansas</a></li>
                                  <li><a href="#">California</a></li>
                                  <li><a href="#">Colorado</a></li>
                                  <li><a href="#">CONETICut</a></li>
                                  <li><a href="#">Delaware</a></li>
                                  <li><a href="#">District of</a></li>
                                  <li><a href="#">Columbia</a></li>
                                </ul>
                                <ul>
                                  <li><a href="#">Florida</a></li>
                                  <li><a href="#">Georgia</a></li>
                                  <li><a href="#">Hawaii</a></li>
                                  <li><a href="#">Idaho</a></li>
                                  <li><a href="#">Illinois</a></li>
                                  <li><a href="#">Indiana</a></li>
                                  <li><a href="#">Iowa</a></li>
                                  <li><a href="#">Kansas</a></li>
                                  <li><a href="#">Kentucky</a></li>
                                  <li><a href="#">Louisiana</a></li>
                                </ul>
                                <ul>
                                  <li><a href="#">Maine</a></li>
                                  <li><a href="#">Maryland</a></li>
                                  <li><a href="#">Massachusetts</a></li>
                                  <li><a href="#">Michigan</a></li>
                                  <li><a href="#">Minnesota</a></li>
                                  <li><a href="#">Mississippi</a></li>
                                  <li><a href="#">Missouri</a></li>
                                  <li><a href="#">Montana</a></li>
                                  <li><a href="#">Nebraska</a></li>
                                  <li><a href="#">Nevada</a></li>
                                </ul>
                                <ul>
                                  <li><a href="#">New Hampshire</a></li>
                                  <li><a href="#">New Jersey</a></li>
                                  <li><a href="#">New Mexico</a></li>
                                  <li><a href="#">New York</a></li>
                                  <li><a href="#">North Carolina</a></li>
                                  <li><a href="#">North Dakota</a></li>
                                  <li><a href="#">South Carolina</a></li>
                                  <li><a href="#">South Dakota</a></li>
                                  <li><a href="#">Tennessee</a></li>
                                  <li><a href="#">Texas</a></li>
                                </ul>
                                <ul>
                                  <li><a href="#">Utah</a></li>
                                  <li><a href="#">Vermont</a></li>
                                  <li><a href="#">Ohio</a></li>
                                  <li><a href="#">Oklahoma</a></li>
                                  <li><a href="#">Oregon</a></li>
                                  <li><a href="#">Pennsylvania</a></li>
                                  <li><a href="#">Puerto Rico</a></li>
                                  <li><a href="#">Rhode Island</a></li>
                                  <li><a href="#">Virginia</a></li>
                                  <li><a href="#">Washington</a></li>
                                </ul>
                                <ul>
                                  <li><a href="#">West Virginia</a></li>
                                  <li><a href="#">Wisconsin</a></li>
                                  <li><a href="#">Wyoming</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                  	<div>
                  	<a href="#"><img src="images/sector-icon.png"/>Sector<span class="drop-arrow"><img src="images/down-arrow-employe.png"/></span></a>
                    <div class="employers-box">                    	
                    	<div class="employers-list">
                       	  <h4><img src="images/hiring-manager-checkicon.png"/>Hiring Manager - Search for a Recruiting firm <span>by Sector</span></h4>
                            <ul>
                              <li><a href="#">Alabama</a></li>
                              <li><a href="#">Alaska</a></li>
                              <li><a href="#" class="act">Arizona</a></li>
                              <li><a href="#">Arkansas</a></li>
                              <li><a href="#">California</a></li>
                              <li><a href="#">Colorado</a></li>
                              <li><a href="#">CONETICut</a></li>
                              <li><a href="#">Delaware</a></li>
                              <li><a href="#">District of</a></li>
                              <li><a href="#">Columbia</a></li>
                            </ul>
                            <ul>
                              <li><a href="#">Florida</a></li>
                              <li><a href="#">Georgia</a></li>
                              <li><a href="#">Hawaii</a></li>
                              <li><a href="#">Idaho</a></li>
                              <li><a href="#">Illinois</a></li>
                              <li><a href="#">Indiana</a></li>
                              <li><a href="#">Iowa</a></li>
                              <li><a href="#">Kansas</a></li>
                              <li><a href="#">Kentucky</a></li>
                              <li><a href="#">Louisiana</a></li>
                            </ul>
                            <ul>
                              <li><a href="#">Maine</a></li>
                              <li><a href="#">Maryland</a></li>
                              <li><a href="#">Massachusetts</a></li>
                              <li><a href="#">Michigan</a></li>
                              <li><a href="#">Minnesota</a></li>
                              <li><a href="#">Mississippi</a></li>
                              <li><a href="#">Missouri</a></li>
                              <li><a href="#">Montana</a></li>
                              <li><a href="#">Nebraska</a></li>
                              <li><a href="#">Nevada</a></li>
                            </ul>
                            <ul>
                              <li><a href="#">New Hampshire</a></li>
                              <li><a href="#">New Jersey</a></li>
                              <li><a href="#">New Mexico</a></li>
                              <li><a href="#">New York</a></li>
                              <li><a href="#">North Carolina</a></li>
                              <li><a href="#">North Dakota</a></li>
                              <li><a href="#">South Carolina</a></li>
                              <li><a href="#">South Dakota</a></li>
                              <li><a href="#">Tennessee</a></li>
                              <li><a href="#">Texas</a></li>
                            </ul>
                            <ul>
                              <li><a href="#">Utah</a></li>
                              <li><a href="#">Vermont</a></li>
                              <li><a href="#">Ohio</a></li>
                              <li><a href="#">Oklahoma</a></li>
                              <li><a href="#">Oregon</a></li>
                              <li><a href="#">Pennsylvania</a></li>
                              <li><a href="#">Puerto Rico</a></li>
                              <li><a href="#">Rhode Island</a></li>
                              <li><a href="#">Virginia</a></li>
                              <li><a href="#">Washington</a></li>
                            </ul>
                            <ul>
                              <li><a href="#">West Virginia</a></li>
                              <li><a href="#">Wisconsin</a></li>
                              <li><a href="#">Wyoming</a></li>
                            </ul>
                        </div>
                    </div>	
                  </div>
                </div>
            </div>
            <!---- Navigation Start ---->
            <div class="menu-main">
                <a class="toggleMenu" href="#"><span></span><span></span><span></span></a>
                <ul class="nav">
                        <li><a href="#" class="blue">Hiring manager</a></li>
                        <li><a href="#" class="orange">Job seeker</a></li>
                        <li><a href="#">Search for recruiting firm</a></li>
                        <li><a href="#">Tools</a></li>
                        <li><a href="#">Articles</a></li>               
                    </ul>                        
            </div>
            <!---- Navigation End ---->
        </div>
    </div>
</header>
<!--- Header End --->


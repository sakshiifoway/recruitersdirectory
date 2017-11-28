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


<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
  ga('create', 'UA-2202602-1', 'auto');
  ga('require', 'displayfeatures');
  ga('send', 'pageview');
</script>
</head>

<body <?php body_class(); ?>>
<div id="sitemain">
<!--- Header Start --->
<header>
	<div class="container">
	<div class="logo"><a href="<?php bloginfo( 'home' ); ?>/"><img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="Logo"></a></div>
      
    </div>
</header>
<!--- Header End --->


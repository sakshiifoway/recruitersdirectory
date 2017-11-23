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
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/source/jquery.fancybox.js?v=2.1.5"></script>
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/source/jquery.fancybox.css?v=2.1.5" media="screen" />


<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
  ga('create', 'UA-2202602-1', 'auto');
  ga('require', 'displayfeatures');
  ga('send', 'pageview');
  
  
  $(document).ready(function() {
	  $("#various1").fancybox({
			'titlePosition'		: 'inside',
			'transitionIn'		: 'none',
			'transitionOut'		: 'none'
		});
  });
</script>
</head>

<body <?php body_class(); ?>>
<div id="sitemain">
<!--- Header Start --->
<header>
	<div class="container">
	<div class="logo"><a href="<?php bloginfo( 'home' ); ?>/"><img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="Logo"></a></div>
      <div class="head-topright">
        	<div class="head-toplink">
            	<ul>
                	<li><a href="#">Dial now (646) 663-1946</a></li>
                    <li><a href="<?php bloginfo( 'home' ); ?>/about/">About</a></li>
                    <li><a href="<?php bloginfo( 'home' ); ?>/contactus/">Contact</a></li>
                    <li>
                    	<div class="top-social">
                        	<div class="share-icon">
                            	<a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/share-icon.png"/></a>
                                <div class="other-social">
                                <?php echo do_shortcode('[wp_social_sharing social_options="twitter,googleplus,linkedin" twitter_username="arjun077" linkedin_text="<img src ='.get_template_directory_uri().'/images/share-linkdin-icon.png>" googleplus_text="<img src ='.get_template_directory_uri().'/images/share-gplue-icon.png>" twitter_text="<img src ='.get_template_directory_uri().'/images/share-twitter-icon.png>" icon_order="t,g,l" show_icons="0" before_button_text="" text_position="" social_image="t"]'); ?>
                                	<!--<a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/share-gplue-icon.png"/></a>
                                    <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/share-twitter-icon.png"/></a>
                                    <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/share-linkdin-icon.png"/></a>-->
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
                    	<a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/state-icon.png"/>state<span class="drop-arrow"><img src="<?php echo get_template_directory_uri(); ?>/images/down-arrow-employe.png"/></span></a>
                        <div class="employers-box">                        	
                        	<div class="employers-list">
                                <h4><img src="<?php echo get_template_directory_uri(); ?>/images/hiring-manager-checkicon.png"/>Hiring Manager - Search for a Recruiting firm <span>by state</span></h4>
                                <ul>
                                 
                                 <?php 
									$Top_states = $wpdb->get_results("SELECT * from state order by name ASC");
									$SI=1;
									foreach ($Top_states as $topst) {  ?> 
                                    	<li><a href="<?php bloginfo( 'home' ); ?>/hiring_manager/?sid=<?php echo $topst->id; ?>&location=<?php echo $topst->state_alias; ?>"><?php echo $topst->name; ?></a></li>
                                    <? $SI++; //if($SI%10==0){echo "</ul><ul>";}
									} ?>
                                   </ul>
                            </div>
                        </div>
                    </div>
                  	<div>
                  	<a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/sector-icon.png"/>Sector<span class="drop-arrow"><img src="<?php echo get_template_directory_uri(); ?>/images/down-arrow-employe.png"/></span></a>
                    <div class="employers-box">                    	
                    	<div class="employers-list">
                       	  <h4><img src="<?php echo get_template_directory_uri(); ?>/images/hiring-manager-checkicon.png"/>Hiring Manager - Search for a Recruiting firm <span>by Sector</span></h4>

							<ul>
                                 
                                 <?php 
									$Top_Sector = $wpdb->get_results("SELECT * from category order by categoryname ASC");
									$SS=1;
									foreach ($Top_Sector as $topsec) {  ?> 
                                    	<li><a href="<?php bloginfo( 'home' ); ?>/hiring_manager/?action=d&cid=<?php echo $topsec->categoryid; ?>&sector=<?php echo $topsec->category_slug; ?>"><?php echo $topsec->categoryname; ?></a></li>
                                    <? $SS++; //if($SS%15==0){echo "</ul><ul>";}
									} ?>
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
                        <li><a href="<?php bloginfo( 'home' ); ?>/hiring_manager/" class="blue">Hiring manager</a></li>
                        <li><a href="<?php bloginfo( 'home' ); ?>/job_seeker/" class="orange">Job seeker</a></li>
                        <li><a href="<?php bloginfo( 'home' ); ?>/search-for-recruiting-firm/">Search for recruiting firm</a></li>
                        <li><a href="<?php bloginfo( 'home' ); ?>/tools/">Tools</a></li>
                        <li><a href="<?php bloginfo( 'home' ); ?>/articles/">Articles</a></li>               
                    </ul>                        
            </div>
            <!---- Navigation End ---->
        </div>
    </div>
</header>
<!--- Header End --->


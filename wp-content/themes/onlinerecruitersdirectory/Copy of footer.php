<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.2
 */

?>

<section class="ord-service-main">
	<div class="container">
    	<div class="coman-inner">
    		<div class="ord-service">
        	<h4>The Online Recruiters Directory is the place to find executive recruiters,<br>executive search firms, headhunters, staffing firms and other recruiting services.</h4>
            <div class="hand-icon"><img src="<?php echo get_template_directory_uri(); ?>/images/hand-icon.png"/></div>
        </div>
        </div>
    </div>
</section>

<footer>
	<div class="container">
    	<div class="coman-inner">
    		<div class="footer-section">
        	<div class="col-sm-1 fl">
            	<h2>Home</h2>
                <ul>
                	<li><a href="<?php bloginfo( 'home' ); ?>/about/">About</a></li>
                    <li><a href="<?php bloginfo( 'home' ); ?>/contactus/">Contact</a></li>
                    <li><a href="<?php bloginfo( 'home' ); ?>/add_directory/">Add my firm</a></li>
                    <li><a href="<?php bloginfo( 'home' ); ?>/terms/">Terms of use</a></li>
                    <li><a href="<?php bloginfo( 'home' ); ?>/report_abuse/">Report Abuse</a></li>
                </ul>
            </div>
            <div class="col-sm-1 fl">
            	<h2>Hiring Manager</h2>
                <ul>
                	<li><a href="<?php bloginfo( 'home' ); ?>/hiring_manager/">Look for a recruiter / Head Hunter</a></li>
                    <li><a href="<?php bloginfo( 'home' ); ?>/post_request_for_recruiter/">Post a request for an Executive Recruiter</a></li>
                    <li><a href="<?php bloginfo( 'home' ); ?>/tips_effectiveness_resume/">Tips for Effectiveness Resume Screening</a></li>
                    <li><a href="<?php bloginfo( 'home' ); ?>/recruiting_firms_china/">Recruiting firms - China</a></li>
                </ul>
            </div>
            <div class="col-sm-1 fl">
            	<h2>Job seeker</h2>
                <ul>
                	<li><a href="<?php bloginfo( 'home' ); ?>/job_seeker/">Look for a Head Hunter / Recruiters</a></li>
                    <li><a href="<?php bloginfo( 'home' ); ?>/executive_job_seekers/">Executive $100k Job Seekers</a></li>
                    <li><a href="<?php bloginfo( 'home' ); ?>/our_recommendations/">Job Boards & Recruiting services</a></li>
                    <li><a href="<?php bloginfo( 'home' ); ?>/revelation_in_job_search/">Revolution in job search</a></li>
                    <li><a href="<?php bloginfo( 'home' ); ?>/open-jobs-recruiters-database/">Open Jobs - Recruiters Database</a></li>
                    <li><a href="<?php bloginfo( 'home' ); ?>/free_review/">Free review of your resume</a></li>
                </ul>
            </div>
            <div class="col-sm-1 fl">
            	<h2>Info</h2>
                <ul>
                	<li><a href="<?php bloginfo( 'home' ); ?>/articles/">Articles</a></li>
                    <li><a href="<?php bloginfo( 'home' ); ?>/associate/">Association Directory</a></li>
                    <li><a href="<?php bloginfo( 'home' ); ?>/post_request_for_recruiter/">Executive Recruiters</a></li>
                    <li><a href="<?php bloginfo( 'home' ); ?>/service-providers/">Service providers</a></li>
                    <li><a href="<?php bloginfo( 'home' ); ?>/job_seeker/">Job of mine</a></li>
                </ul>
            </div>
            <div class="col-sm-1 fr">
            	<h2>Go social</h2>
                <ul>
                	<li><a href="<?php bloginfo( 'home' ); ?>/request_widget/">Get a widget</a></li>
                    <li><a href="#">subscribe to our magazine</a></li>
                </ul>
                <div class="share-social">
                	<div class="share-button">
                    	<a href="#">Share</a>
                        <div class="share-icon">
                        	<ul>
                            	<li><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/share-gplue-icon.png"/></a></li>
                                <li><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/share-twitter-icon.png"/></a></li>
                                <li><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/share-linkdin-icon.png"/></a></li>
                            </ul><?php echo do_shortcode('[wp_social_sharing social_options="twitter,googleplus,linkedin" twitter_username="arjun077" linkedin_text="<img src ='.get_template_directory_uri().'/images/share-linkdin-icon.png>" googleplus_text="<img src ='.get_template_directory_uri().'/images/share-gplue-icon.png>" twitter_text="<img src ='.get_template_directory_uri().'/images/share-twitter-icon.png>" icon_order="t,g,l" show_icons="0" before_button_text="" text_position="" social_image="t"]'); ?>
                        </div>
                    </div>
                    <div><a class="follow-button" href="#">Follow</a></div>
                </div>
            </div>
        </div>
        </div>
    	<div class="copyright">&copy; Copyright 2018 online Recruiters Directory. All rights reserved. <span>Designed by <img src="<?php echo get_template_directory_uri(); ?>/images/opsilon-logo.png"/></span></div>
    </div>
</footer>
</div>
<?php wp_footer(); ?>
<!---- Menu Script ---->
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/script.js"></script>
</body>
</html>
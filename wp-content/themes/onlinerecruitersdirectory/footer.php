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
                	<li>Look for a recruiter / Head Hunter</li>
                    <li><strong>Post a request for an Executive Recruiter</strong></li>
                    <li>Tips for Effectiveness Resume Screening</li>
                    <li>Recruiting firms - China</li>
                </ul>
            </div>
            <div class="col-sm-1 fl">
            	<h2>Job seeker</h2>
                <ul>
                	<li><a href="#">Look for a Head Hunter / Recruiters</a></li>
                    <li><a href="#">Executive $100k Job Seekers</a></li>
                    <li><a href="#">Job Boards & Recruiting services</a></li>
                    <li><a href="#">Revolution in job search</a></li>
                    <li><a href="#">Open Jobs - Recruiters Database</a></li>
                    <li><a href="#">Free review of your resume</a></li>
                </ul>
            </div>
            <div class="col-sm-1 fl">
            	<h2>Info</h2>
                <ul>
                	<li><a href="<?php bloginfo( 'home' ); ?>/articles/">Articles</a></li>
                    <li><a href="<?php bloginfo( 'home' ); ?>/associate/">Association Directory</a></li>
                    <li><a href="<?php bloginfo( 'home' ); ?>/post_request_for_recruiter/">Executive Recruiters</a></li>
                    <li><a href="#">Service providers</a></li>
                    <li><a href="#">Job of mine</a></li>
                </ul>
            </div>
            <div class="col-sm-1 fr">
            	<h2>Go social</h2>
                <ul>
                	<li><a href="#">Get a widget</a></li>
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
                            </ul>
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

</body>
</html>

<?php
/**
 * Template Name: Search for recruiting firm
*/
get_header();
while ( have_posts() ) : the_post(); ?>


<!--- Inner Start --->
<section class="inner_page">
	<div class="container">
    	<ul class="breadcrum">
            <li><a href="<?php bloginfo( 'home' ); ?>/">Home </a>&rarr;</li>
            <li><?php the_title(); ?></li>
        </ul>
    	<h1><?php the_title(); ?></h1>
        <div class="inner_page_content">
			<?php the_content(); ?>
            <div class="widget-main">
                <div class="widget-box-button">
                    <div class="need-help-right">
                        <div class="hiring-manager-button"><a href="<?php echo bloginfo('home');?>/hiring_manager/">Are you a Hiring Manager?<span>Click here</span><span>search for firms in this sector</span></a></div>
                    </div>            
                    <div class="need-help-right">
                        <div class="hiring-manager-button"><a href="<?php echo bloginfo('home');?>/job_seeker/">Are you a Job Seeker?<span>Click here</span><span>search for firms in this sector</span></a></div>
                    </div>
                </div>
            </div>
  		</div>
    </div>
</section>
<!--- Inner End --->

<?php endwhile;
get_footer();
<?php
/**
 * The front page template file
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 * Learn more: https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); 
// echo get_the_ID();
$flds = get_fields(get_the_ID());
$bannerImg = $flds['home_banner_image'];
$bannerTxt = $flds['home_banner_text'];


$flds2 = get_fields(286);
//print_r($flds2); 

?>
<!--- Banner Start --->
<div class="main-banner">
	<img src="<?php echo $bannerImg;?>"/>
    <div class="banner-caption">
    	<div class="container">
        	<div class="caption-inner">
            	<?php echo $bannerTxt;?>
            </div>
        </div>
        <div class="search-part">
        	<div class="container">
            	<div class="caption-inner">
            		<div class="search-title">Search for a Recruiting firm</div>
                    <div class="search-form">
                    	<ul>
                        	<li>
                            	<div class="select-fildset">
                            		<select name="">
                                	<option>SECTOR</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                                </div>
                            </li>
                            <li>
                            	<div class="select-fildset">
                            		<select name="">
                                	<option>SECTOR</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                                </div>
                            </li>
                            <li>
                            	<div class="checkbox-part">
                                	<div class="hiring-manager-check">
                                    	<div class="control-group">    
                                            <label class="control control--checkbox"><img src="<?php echo get_template_directory_uri(); ?>/images/hiring-manager-checkicon.png"/>I’M A HIRING MANAGER
                                              <input type="checkbox" checked="checked"/>
                                              <div class="control__indicator"></div>
                                            </label>    
                                        </div>
                                    </div>
                                    <div class="job-seeker-check">
                                    	<div class="control-group">    
                                            <label class="control control--checkbox"><img src="<?php echo get_template_directory_uri(); ?>/images/job-seeker-checkicon.png"/>I’M A JOB SEEKER
                                              <input type="checkbox" checked="checked"/>
                                              <div class="control__indicator"></div>
                                            </label>    
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li><button value="Go">Go<img src="<?php echo get_template_directory_uri(); ?>/images/go-arrow.png"/></button></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--- Banner End --->

<!--- Section Start --->
<section class="testimonial-main">
	<div class="container">
    	<div class="testimonial-inner">
        	<ul>
            	<li><a class="database" href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/right-arrow.png"/><?php echo $flds2['wtu_line_1'];?></a></li>
                <li><?php echo $flds2['wtu_line_3'];?></li>
                <li><?php echo $flds2['wtu_line_4'];?></li>
                <li><?php echo $flds2['wtu_line_5'];?></li>
                <li><a class="assisted" href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/right-arrow.png"/><?php echo $flds2['wtu_line_2'];?></a></li>
            </ul>
        </div>
    </div>
</section>

<section>
	<div class="container">
    	<div class="coman-inner">
    		<div class="other-logo"><ul>
            <?php $args = array( 'post_type' => 'partnerlogo', 'posts_per_page' => 40,'orderby'   => 'menu_order','order' => 'DESC' );
				$loop = new WP_Query( $args );
				while ( $loop->have_posts() ) : $loop->the_post();				
				?>        	
            	<li><img src="<?php echo get_the_post_thumbnail_url($post->ID);?>" /></li>                         
			<?php endwhile; ?> </ul>
        </div>
        </div>
    </div>
</section>

<section>
	<div class="container">
    	<div class="articles-main">
            <ul>
                <li>
                	<div  class="recruiters">
                    	
                        <?php 
						$recent_posts = wp_get_recent_posts(array(
							'cat' => 98, // Number of recent posts thumbnails to display
							'post_status' => 'publish' // Show only the published posts
						)); ?>
                        
                        <h3><?php echo $recent_posts[0]['post_title'];?> </h3>
                        <p><?php echo get_excerpt_by_id($recent_posts[0]['ID'],10); //echo get_excerpt($recent_posts[0]['ID']); ?><?php //echo get_the_excerpt($recent_posts[0]['ID']);?></p>
                        <div class="name-btn">
                       <!-- <div class="name">By Elaine Boylan </div>-->
                        <a href="<?php echo get_permalink($recent_posts[0]['ID']);?>" class="button">Read more</a>
                        </div>
                    </div>
                 </li>
                <li>
                	<div class="h-manager">
                    	<h3 class="title"><span class="icon"></span>I'M A HIRING MANAGER</h3>
                        <ul>
                        	<li><a href="<?php bloginfo( 'home' ); ?>/post_request_for_recruiter/">Post a request for a Recruiter <span></span></a></li>
                            <li><a href="<?php bloginfo( 'home' ); ?>/tips_effectiveness_resume/">Effectiveness Resume Screening <span></span></a></li>
                            <li><a href="<?php bloginfo( 'home' ); ?>/your_service/">At your service -<br> recommandation on the best firms for you <span></span></a></li>
                        </ul>
                    </div>
                </li>
                <li>
                	<div class="job-seaker">
                    	<h3 class="title"><span class="icon"></span>I'M A HIRING MANAGER</h3>
                        <ul>
                        	<li><a href="<?php bloginfo( 'home' ); ?>/executive_job_seekers/">Executive $100K job seekers<span></span></a></li>
                            <li><a href="<?php bloginfo( 'home' ); ?>/free_review/">Free review of your resume<span></span></a></li>
                            <li><a href="<?php bloginfo( 'home' ); ?>/our_recommendations/">Job Boards & Recruiting services<span></span></a></li>
                        </ul>
                    </div>
                </li>
                <li>
                	<div  class="recruiters">
                    	<h3><?php echo $recent_posts[1]['post_title'];?> </h3>
                        <p><?php echo get_excerpt_by_id($recent_posts[1]['ID'],15);?></p>
                        <div class="name-btn">
                       <!-- <div class="name">By Elaine Boylan </div>-->
                        <a href="<?php echo get_permalink($recent_posts[1]['ID']);?>" class="button">Read more</a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</section>
<?php // print_r($recent_posts); ?>
<section class="map-main">
	<div class="container">
    	<div class="col-sm-1 fl">
        	<div class="map-main-part">
            	<h2>Select a state</h2>
                <h5>where you’d like to find<br>an executive recruiters/head hunters search firm</h5>
            	<div class="map_main">
                	<ul>
                    	<li class="washington">
                        	<div class="map-tooltip">
                                <div class="tooltip-inner">
                                    <div class="pop_title">
                                        <strong>Washington</strong>
                                        <p>Search for recuiting agency. executive recuiters or headhunters</p>
                                    </div>
                                    <button class="btn_hir"><img src="<?php echo get_template_directory_uri(); ?>/images/hiring-manager-checkicon.png" alt="">Hiring manager</button><button class="btn_job fr"><img src="<?php echo get_template_directory_uri(); ?>/images/job-seeker-checkicon.png" alt="">Job seeker</button>
                                </div>
                            </div>
                        </li>
                        <li class="oregon">
                        	<div class="map-tooltip">
                                <div class="tooltip-inner">
                                    <div class="pop_title">
                                        <strong>Oregon</strong>
                                        <p>Search for recuiting agency. executive recuiters or headhunters</p>
                                    </div>
                                    <button class="btn_hir"><img src="<?php echo get_template_directory_uri(); ?>/images/hiring-manager-checkicon.png" alt="">Hiring manager</button><button class="btn_job fr"><img src="<?php echo get_template_directory_uri(); ?>/images/job-seeker-checkicon.png" alt="">Job seeker</button>
                                </div>
                            </div>
                        </li>
                        <li class="ldaho">
                        	<div class="map-tooltip">
                                <div class="tooltip-inner">
                                    <div class="pop_title">
                                        <strong>Idaho</strong>
                                        <p>Search for recuiting agency. executive recuiters or headhunters</p>
                                    </div>
                                    <button class="btn_hir"><img src="<?php echo get_template_directory_uri(); ?>/images/hiring-manager-checkicon.png" alt="">Hiring manager</button><button class="btn_job fr"><img src="<?php echo get_template_directory_uri(); ?>/images/job-seeker-checkicon.png" alt="">Job seeker</button>
                                </div>
                            </div>
                        </li>
                        <li class="montana">
                        	<div class="map-tooltip">
                                <div class="tooltip-inner">
                                    <div class="pop_title">
                                        <strong>Montana</strong>
                                        <p>Search for recuiting agency. executive recuiters or headhunters</p>
                                    </div>
                                    <button class="btn_hir"><img src="<?php echo get_template_directory_uri(); ?>/images/hiring-manager-checkicon.png" alt="">Hiring manager</button><button class="btn_job fr"><img src="<?php echo get_template_directory_uri(); ?>/images/job-seeker-checkicon.png" alt="">Job seeker</button>
                                </div>
                            </div>
                        </li>
                        <li class="california">
                        	<div class="map-tooltip">
                                <div class="tooltip-inner">
                                    <div class="pop_title">
                                        <strong>California</strong>
                                        <p>Search for recuiting agency. executive recuiters or headhunters</p>
                                    </div>
                                    <button class="btn_hir"><img src="<?php echo get_template_directory_uri(); ?>/images/hiring-manager-checkicon.png" alt="">Hiring manager</button><button class="btn_job fr"><img src="<?php echo get_template_directory_uri(); ?>/images/job-seeker-checkicon.png" alt="">Job seeker</button>
                                </div>
                            </div>
                        </li>
                        <li class="nevada">
                        	<div class="map-tooltip">
                                <div class="tooltip-inner">
                                    <div class="pop_title">
                                        <strong>Nevada</strong>
                                        <p>Search for recuiting agency. executive recuiters or headhunters</p>
                                    </div>
                                    <button class="btn_hir"><img src="<?php echo get_template_directory_uri(); ?>/images/hiring-manager-checkicon.png" alt="">Hiring manager</button><button class="btn_job fr"><img src="<?php echo get_template_directory_uri(); ?>/images/job-seeker-checkicon.png" alt="">Job seeker</button>
                                </div>
                            </div>
                        </li>
                        <li class="wyoming">
                        	<div class="map-tooltip">
                                <div class="tooltip-inner">
                                    <div class="pop_title">
                                        <strong>Wyoming</strong>
                                        <p>Search for recuiting agency. executive recuiters or headhunters</p>
                                    </div>
                                    <button class="btn_hir"><img src="<?php echo get_template_directory_uri(); ?>/images/hiring-manager-checkicon.png" alt="">Hiring manager</button><button class="btn_job fr"><img src="<?php echo get_template_directory_uri(); ?>/images/job-seeker-checkicon.png" alt="">Job seeker</button>
                                </div>
                            </div>
                        </li>
                        <li class="utah">
                        	<div class="map-tooltip">
                                <div class="tooltip-inner">
                                    <div class="pop_title">
                                        <strong>Utah</strong>
                                        <p>Search for recuiting agency. executive recuiters or headhunters</p>
                                    </div>
                                    <button class="btn_hir"><img src="<?php echo get_template_directory_uri(); ?>/images/hiring-manager-checkicon.png" alt="">Hiring manager</button><button class="btn_job fr"><img src="<?php echo get_template_directory_uri(); ?>/images/job-seeker-checkicon.png" alt="">Job seeker</button>
                                </div>
                            </div>
                        </li>
                        <li class="arizona">
                        	<div class="map-tooltip">
                                <div class="tooltip-inner">
                                    <div class="pop_title">
                                        <strong>Arizona</strong>
                                        <p>Search for recuiting agency. executive recuiters or headhunters</p>
                                    </div>
                                    <button class="btn_hir"><img src="<?php echo get_template_directory_uri(); ?>/images/hiring-manager-checkicon.png" alt="">Hiring manager</button><button class="btn_job fr"><img src="<?php echo get_template_directory_uri(); ?>/images/job-seeker-checkicon.png" alt="">Job seeker</button>
                                </div>
                            </div>
                        </li>
                        <li class="colorado">
                        	<div class="map-tooltip">
                                <div class="tooltip-inner">
                                    <div class="pop_title">
                                        <strong>Colorado</strong>
                                        <p>Search for recuiting agency. executive recuiters or headhunters</p>
                                    </div>
                                    <button class="btn_hir"><img src="<?php echo get_template_directory_uri(); ?>/images/hiring-manager-checkicon.png" alt="">Hiring manager</button><button class="btn_job fr"><img src="<?php echo get_template_directory_uri(); ?>/images/job-seeker-checkicon.png" alt="">Job seeker</button>
                                </div>
                            </div>
                        </li>
                        <li class="new_mexico">
                        	<div class="map-tooltip">
                                <div class="tooltip-inner">
                                    <div class="pop_title">
                                        <strong>New mexico</strong>
                                        <p>Search for recuiting agency. executive recuiters or headhunters</p>
                                    </div>
                                    <button class="btn_hir"><img src="<?php echo get_template_directory_uri(); ?>/images/hiring-manager-checkicon.png" alt="">Hiring manager</button><button class="btn_job fr"><img src="<?php echo get_template_directory_uri(); ?>/images/job-seeker-checkicon.png" alt="">Job seeker</button>
                                </div>
                            </div>
                        </li>
                        <li class="texas">
                        	<div class="map-tooltip">
                                <div class="tooltip-inner">
                                    <div class="pop_title">
                                        <strong>Texas</strong>
                                        <p>Search for recuiting agency. executive recuiters or headhunters</p>
                                    </div>
                                    <button class="btn_hir"><img src="<?php echo get_template_directory_uri(); ?>/images/hiring-manager-checkicon.png" alt="">Hiring manager</button><button class="btn_job fr"><img src="<?php echo get_template_directory_uri(); ?>/images/job-seeker-checkicon.png" alt="">Job seeker</button>
                                </div>
                            </div>
                        </li>
                        <li class="alaska">
                        	<div class="map-tooltip">
                                <div class="tooltip-inner">
                                    <div class="pop_title">
                                        <strong>Alaska</strong>
                                        <p>Search for recuiting agency. executive recuiters or headhunters</p>
                                    </div>
                                    <button class="btn_hir"><img src="<?php echo get_template_directory_uri(); ?>/images/hiring-manager-checkicon.png" alt="">Hiring manager</button><button class="btn_job fr"><img src="<?php echo get_template_directory_uri(); ?>/images/job-seeker-checkicon.png" alt="">Job seeker</button>
                                </div>
                            </div>
                        </li>
                        <li class="hawaii">
                        	<div class="map-tooltip">
                                <div class="tooltip-inner">
                                    <div class="pop_title">
                                        <strong>Hawaii</strong>
                                        <p>Search for recuiting agency. executive recuiters or headhunters</p>
                                    </div>
                                    <button class="btn_hir"><img src="<?php echo get_template_directory_uri(); ?>/images/hiring-manager-checkicon.png" alt="">Hiring manager</button><button class="btn_job fr"><img src="<?php echo get_template_directory_uri(); ?>/images/job-seeker-checkicon.png" alt="">Job seeker</button>
                                </div>
                            </div>
                        </li>
                        <li class="north_dakota">
                        	<div class="map-tooltip">
                                <div class="tooltip-inner">
                                    <div class="pop_title">
                                        <strong>North Dakota</strong>
                                        <p>Search for recuiting agency. executive recuiters or headhunters</p>
                                    </div>
                                    <button class="btn_hir"><img src="<?php echo get_template_directory_uri(); ?>/images/hiring-manager-checkicon.png" alt="">Hiring manager</button><button class="btn_job fr"><img src="<?php echo get_template_directory_uri(); ?>/images/job-seeker-checkicon.png" alt="">Job seeker</button>
                                </div>
                            </div>
                        </li>
                        <li class="south_dakota">
                        	<div class="map-tooltip">
                                <div class="tooltip-inner">
                                    <div class="pop_title">
                                        <strong>South Dakota</strong>
                                        <p>Search for recuiting agency. executive recuiters or headhunters</p>
                                    </div>
                                    <button class="btn_hir"><img src="<?php echo get_template_directory_uri(); ?>/images/hiring-manager-checkicon.png" alt="">Hiring manager</button><button class="btn_job fr"><img src="<?php echo get_template_directory_uri(); ?>/images/job-seeker-checkicon.png" alt="">Job seeker</button>
                                </div>
                            </div>
                        </li>
                        <li class="nebraska">
                        	<div class="map-tooltip">
                                <div class="tooltip-inner">
                                    <div class="pop_title">
                                        <strong>Nebraska</strong>
                                        <p>Search for recuiting agency. executive recuiters or headhunters</p>
                                    </div>
                                    <button class="btn_hir"><img src="<?php echo get_template_directory_uri(); ?>/images/hiring-manager-checkicon.png" alt="">Hiring manager</button><button class="btn_job fr"><img src="<?php echo get_template_directory_uri(); ?>/images/job-seeker-checkicon.png" alt="">Job seeker</button>
                                </div>
                            </div>
                        </li>
                        <li class="kansas">
                        	<div class="map-tooltip">
                                <div class="tooltip-inner">
                                    <div class="pop_title">
                                        <strong>Kansas</strong>
                                        <p>Search for recuiting agency. executive recuiters or headhunters</p>
                                    </div>
                                    <button class="btn_hir"><img src="<?php echo get_template_directory_uri(); ?>/images/hiring-manager-checkicon.png" alt="">Hiring manager</button><button class="btn_job fr"><img src="<?php echo get_template_directory_uri(); ?>/images/job-seeker-checkicon.png" alt="">Job seeker</button>
                                </div>
                            </div>
                        </li>
                        <li class="oklahoma">
                        	<div class="map-tooltip">
                                <div class="tooltip-inner">
                                    <div class="pop_title">
                                        <strong>Oklahoma</strong>
                                        <p>Search for recuiting agency. executive recuiters or headhunters</p>
                                    </div>
                                    <button class="btn_hir"><img src="<?php echo get_template_directory_uri(); ?>/images/hiring-manager-checkicon.png" alt="">Hiring manager</button><button class="btn_job fr"><img src="<?php echo get_template_directory_uri(); ?>/images/job-seeker-checkicon.png" alt="">Job seeker</button>
                                </div>
                            </div>
                        </li>
                        <li class="minnesota">
                        	<div class="map-tooltip">
                                <div class="tooltip-inner">
                                    <div class="pop_title">
                                        <strong>Minnesota</strong>
                                        <p>Search for recuiting agency. executive recuiters or headhunters</p>
                                    </div>
                                    <button class="btn_hir"><img src="<?php echo get_template_directory_uri(); ?>/images/hiring-manager-checkicon.png" alt="">Hiring manager</button><button class="btn_job fr"><img src="<?php echo get_template_directory_uri(); ?>/images/job-seeker-checkicon.png" alt="">Job seeker</button>
                                </div>
                            </div>
                        </li>
                        <li class="lowa">
                        	<div class="map-tooltip">
                                <div class="tooltip-inner">
                                    <div class="pop_title">
                                        <strong>Lowa</strong>
                                        <p>Search for recuiting agency. executive recuiters or headhunters</p>
                                    </div>
                                    <button class="btn_hir"><img src="<?php echo get_template_directory_uri(); ?>/images/hiring-manager-checkicon.png" alt="">Hiring manager</button><button class="btn_job fr"><img src="<?php echo get_template_directory_uri(); ?>/images/job-seeker-checkicon.png" alt="">Job seeker</button>
                                </div>
                            </div>
                        </li>
                        <li class="missouri">
                        	<div class="map-tooltip">
                                <div class="tooltip-inner">
                                    <div class="pop_title">
                                        <strong>Missouri</strong>
                                        <p>Search for recuiting agency. executive recuiters or headhunters</p>
                                    </div>
                                    <button class="btn_hir"><img src="<?php echo get_template_directory_uri(); ?>/images/hiring-manager-checkicon.png" alt="">Hiring manager</button><button class="btn_job fr"><img src="<?php echo get_template_directory_uri(); ?>/images/job-seeker-checkicon.png" alt="">Job seeker</button>
                                </div>
                            </div>
                        </li>
                        <li class="arkansas">
                        	<div class="map-tooltip">
                                <div class="tooltip-inner">
                                    <div class="pop_title">
                                        <strong>Arkansas</strong>
                                        <p>Search for recuiting agency. executive recuiters or headhunters</p>
                                    </div>
                                    <button class="btn_hir"><img src="<?php echo get_template_directory_uri(); ?>/images/hiring-manager-checkicon.png" alt="">Hiring manager</button><button class="btn_job fr"><img src="<?php echo get_template_directory_uri(); ?>/images/job-seeker-checkicon.png" alt="">Job seeker</button>
                                </div>
                            </div>
                        </li>
                        <li class="louisiana">
                        	<div class="map-tooltip">
                                <div class="tooltip-inner">
                                    <div class="pop_title">
                                        <strong>Louisiana</strong>
                                        <p>Search for recuiting agency. executive recuiters or headhunters</p>
                                    </div>
                                    <button class="btn_hir"><img src="<?php echo get_template_directory_uri(); ?>/images/hiring-manager-checkicon.png" alt="">Hiring manager</button><button class="btn_job fr"><img src="<?php echo get_template_directory_uri(); ?>/images/job-seeker-checkicon.png" alt="">Job seeker</button>
                                </div>
                            </div>
                        </li>
                        <li class="wisconsin">
                        	<div class="map-tooltip">
                                <div class="tooltip-inner">
                                    <div class="pop_title">
                                        <strong>Wisconsin</strong>
                                        <p>Search for recuiting agency. executive recuiters or headhunters</p>
                                    </div>
                                    <button class="btn_hir"><img src="<?php echo get_template_directory_uri(); ?>/images/hiring-manager-checkicon.png" alt="">Hiring manager</button><button class="btn_job fr"><img src="<?php echo get_template_directory_uri(); ?>/images/job-seeker-checkicon.png" alt="">Job seeker</button>
                                </div>
                            </div>
                        </li>
                        <li class="illinois">
                        	<div class="map-tooltip">
                                <div class="tooltip-inner">
                                    <div class="pop_title">
                                        <strong>Illinois</strong>
                                        <p>Search for recuiting agency. executive recuiters or headhunters</p>
                                    </div>
                                    <button class="btn_hir"><img src="<?php echo get_template_directory_uri(); ?>/images/hiring-manager-checkicon.png" alt="">Hiring manager</button><button class="btn_job fr"><img src="<?php echo get_template_directory_uri(); ?>/images/job-seeker-checkicon.png" alt="">Job seeker</button>
                                </div>
                            </div>
                        </li>
                        <li class="michigan">
                        	<div class="map-tooltip">
                                <div class="tooltip-inner">
                                    <div class="pop_title">
                                        <strong>Michigan</strong>
                                        <p>Search for recuiting agency. executive recuiters or headhunters</p>
                                    </div>
                                    <button class="btn_hir"><img src="<?php echo get_template_directory_uri(); ?>/images/hiring-manager-checkicon.png" alt="">Hiring manager</button><button class="btn_job fr"><img src="<?php echo get_template_directory_uri(); ?>/images/job-seeker-checkicon.png" alt="">Job seeker</button>
                                </div>
                            </div>
                        </li>
                        <li class="indiana">
                        	<div class="map-tooltip">
                                <div class="tooltip-inner">
                                    <div class="pop_title">
                                        <strong>Indiana</strong>
                                        <p>Search for recuiting agency. executive recuiters or headhunters</p>
                                    </div>
                                    <button class="btn_hir"><img src="<?php echo get_template_directory_uri(); ?>/images/hiring-manager-checkicon.png" alt="">Hiring manager</button><button class="btn_job fr"><img src="<?php echo get_template_directory_uri(); ?>/images/job-seeker-checkicon.png" alt="">Job seeker</button>
                                </div>
                            </div>
                        </li>
                        <li class="ohio">
                        	<div class="map-tooltip">
                                <div class="tooltip-inner">
                                    <div class="pop_title">
                                        <strong>Ohio</strong>
                                        <p>Search for recuiting agency. executive recuiters or headhunters</p>
                                    </div>
                                    <button class="btn_hir"><img src="<?php echo get_template_directory_uri(); ?>/images/hiring-manager-checkicon.png" alt="">Hiring manager</button><button class="btn_job fr"><img src="<?php echo get_template_directory_uri(); ?>/images/job-seeker-checkicon.png" alt="">Job seeker</button>
                                </div>
                            </div>
                        </li>
                        <li class="kentucky">
                        	<div class="map-tooltip">
                                <div class="tooltip-inner">
                                    <div class="pop_title">
                                        <strong>Kentucky</strong>
                                        <p>Search for recuiting agency. executive recuiters or headhunters</p>
                                    </div>
                                    <button class="btn_hir"><img src="<?php echo get_template_directory_uri(); ?>/images/hiring-manager-checkicon.png" alt="">Hiring manager</button><button class="btn_job fr"><img src="<?php echo get_template_directory_uri(); ?>/images/job-seeker-checkicon.png" alt="">Job seeker</button>
                                </div>
                            </div>
                        </li>
                        <li class="tennessee">
                        	<div class="map-tooltip">
                                <div class="tooltip-inner">
                                    <div class="pop_title">
                                        <strong>Tennessee</strong>
                                        <p>Search for recuiting agency. executive recuiters or headhunters</p>
                                    </div>
                                    <button class="btn_hir"><img src="<?php echo get_template_directory_uri(); ?>/images/hiring-manager-checkicon.png" alt="">Hiring manager</button><button class="btn_job fr"><img src="<?php echo get_template_directory_uri(); ?>/images/job-seeker-checkicon.png" alt="">Job seeker</button>
                                </div>
                            </div>
                        </li>
                        <li class="mississippi">
                        	<div class="map-tooltip">
                                <div class="tooltip-inner">
                                    <div class="pop_title">
                                        <strong>Mississippi</strong>
                                        <p>Search for recuiting agency. executive recuiters or headhunters</p>
                                    </div>
                                    <button class="btn_hir"><img src="<?php echo get_template_directory_uri(); ?>/images/hiring-manager-checkicon.png" alt="">Hiring manager</button><button class="btn_job fr"><img src="<?php echo get_template_directory_uri(); ?>/images/job-seeker-checkicon.png" alt="">Job seeker</button>
                                </div>
                            </div>
                        </li>
                        <li class="alabama">
                        	<div class="map-tooltip">
                                <div class="tooltip-inner">
                                    <div class="pop_title">
                                        <strong>Alabama</strong>
                                        <p>Search for recuiting agency. executive recuiters or headhunters</p>
                                    </div>
                                    <button class="btn_hir"><img src="<?php echo get_template_directory_uri(); ?>/images/hiring-manager-checkicon.png" alt="">Hiring manager</button><button class="btn_job fr"><img src="<?php echo get_template_directory_uri(); ?>/images/job-seeker-checkicon.png" alt="">Job seeker</button>
                                </div>
                            </div>
                        </li>
                        <li class="georgia">
                        	<div class="map-tooltip">
                                <div class="tooltip-inner">
                                    <div class="pop_title">
                                        <strong>Georgia</strong>
                                        <p>Search for recuiting agency. executive recuiters or headhunters</p>
                                    </div>
                                    <button class="btn_hir"><img src="<?php echo get_template_directory_uri(); ?>/images/hiring-manager-checkicon.png" alt="">Hiring manager</button><button class="btn_job fr"><img src="<?php echo get_template_directory_uri(); ?>/images/job-seeker-checkicon.png" alt="">Job seeker</button>
                                </div>
                            </div>
                        </li>
                        <li class="florida">
                        	<div class="map-tooltip">
                                <div class="tooltip-inner">
                                    <div class="pop_title">
                                        <strong>Florida</strong>
                                        <p>Search for recuiting agency. executive recuiters or headhunters</p>
                                    </div>
                                    <button class="btn_hir"><img src="<?php echo get_template_directory_uri(); ?>/images/hiring-manager-checkicon.png" alt="">Hiring manager</button><button class="btn_job fr"><img src="<?php echo get_template_directory_uri(); ?>/images/job-seeker-checkicon.png" alt="">Job seeker</button>
                                </div>
                            </div>
                        </li>
                        <li class="newyork">
                        	<div class="map-tooltip">
                                <div class="tooltip-inner">
                                    <div class="pop_title">
                                        <strong>New York</strong>
                                        <p>Search for recuiting agency. executive recuiters or headhunters</p>
                                    </div>
                                    <button class="btn_hir"><img src="<?php echo get_template_directory_uri(); ?>/images/hiring-manager-checkicon.png" alt="">Hiring manager</button><button class="btn_job fr"><img src="<?php echo get_template_directory_uri(); ?>/images/job-seeker-checkicon.png" alt="">Job seeker</button>
                                </div>
                            </div>
                        </li>
                        <li class="pennsylvania">
                        	<div class="map-tooltip">
                                <div class="tooltip-inner">
                                    <div class="pop_title">
                                        <strong>pennsylvania</strong>
                                        <p>Search for recuiting agency. executive recuiters or headhunters</p>
                                    </div>
                                    <button class="btn_hir"><img src="<?php echo get_template_directory_uri(); ?>/images/hiring-manager-checkicon.png" alt="">Hiring manager</button><button class="btn_job fr"><img src="<?php echo get_template_directory_uri(); ?>/images/job-seeker-checkicon.png" alt="">Job seeker</button>
                                </div>
                            </div>
                        </li>
                        <li class="vt">
                        	<div class="map-tooltip">
                                <div class="tooltip-inner">
                                    <div class="pop_title">
                                        <strong>VT</strong>
                                        <p>Search for recuiting agency. executive recuiters or headhunters</p>
                                    </div>
                                    <button class="btn_hir"><img src="<?php echo get_template_directory_uri(); ?>/images/hiring-manager-checkicon.png" alt="">Hiring manager</button><button class="btn_job fr"><img src="<?php echo get_template_directory_uri(); ?>/images/job-seeker-checkicon.png" alt="">Job seeker</button>
                                </div>
                            </div>
                        </li>
                        <li class="nh">
                        	<div class="map-tooltip">
                                <div class="tooltip-inner">
                                    <div class="pop_title">
                                        <strong>NH</strong>
                                        <p>Search for recuiting agency. executive recuiters or headhunters</p>
                                    </div>
                                    <button class="btn_hir"><img src="<?php echo get_template_directory_uri(); ?>/images/hiring-manager-checkicon.png" alt="">Hiring manager</button><button class="btn_job fr"><img src="<?php echo get_template_directory_uri(); ?>/images/job-seeker-checkicon.png" alt="">Job seeker</button>
                                </div>
                            </div>
                        </li>
                        <li class="maine">
                        	<div class="map-tooltip">
                                <div class="tooltip-inner">
                                    <div class="pop_title">
                                        <strong>Maine</strong>
                                        <p>Search for recuiting agency. executive recuiters or headhunters</p>
                                    </div>
                                    <button class="btn_hir"><img src="<?php echo get_template_directory_uri(); ?>/images/hiring-manager-checkicon.png" alt="">Hiring manager</button><button class="btn_job fr"><img src="<?php echo get_template_directory_uri(); ?>/images/job-seeker-checkicon.png" alt="">Job seeker</button>
                                </div>
                            </div>
                        </li>
                        <li class="ma">
                        	<div class="map-tooltip">
                                <div class="tooltip-inner">
                                    <div class="pop_title">
                                        <strong>MA</strong>
                                        <p>Search for recuiting agency. executive recuiters or headhunters</p>
                                    </div>
                                    <button class="btn_hir"><img src="<?php echo get_template_directory_uri(); ?>/images/hiring-manager-checkicon.png" alt="">Hiring manager</button><button class="btn_job fr"><img src="<?php echo get_template_directory_uri(); ?>/images/job-seeker-checkicon.png" alt="">Job seeker</button>
                                </div>
                            </div>
                        </li>
                        <li class="ct">
                        	<div class="map-tooltip">
                                <div class="tooltip-inner">
                                    <div class="pop_title">
                                        <strong>CT</strong>
                                        <p>Search for recuiting agency. executive recuiters or headhunters</p>
                                    </div>
                                    <button class="btn_hir"><img src="<?php echo get_template_directory_uri(); ?>/images/hiring-manager-checkicon.png" alt="">Hiring manager</button><button class="btn_job fr"><img src="<?php echo get_template_directory_uri(); ?>/images/job-seeker-checkicon.png" alt="">Job seeker</button>
                                </div>
                            </div>
                        </li>
                        <li class="ri">
                        	<div class="map-tooltip">
                                <div class="tooltip-inner">
                                    <div class="pop_title">
                                        <strong>RI</strong>
                                        <p>Search for recuiting agency. executive recuiters or headhunters</p>
                                    </div>
                                    <button class="btn_hir"><img src="<?php echo get_template_directory_uri(); ?>/images/hiring-manager-checkicon.png" alt="">Hiring manager</button><button class="btn_job fr"><img src="<?php echo get_template_directory_uri(); ?>/images/job-seeker-checkicon.png" alt="">Job seeker</button>
                                </div>
                            </div>
                        </li>
                        <li class="nj">
                        	<div class="map-tooltip">
                                <div class="tooltip-inner">
                                    <div class="pop_title">
                                        <strong>NJ</strong>
                                        <p>Search for recuiting agency. executive recuiters or headhunters</p>
                                    </div>
                                    <button class="btn_hir"><img src="<?php echo get_template_directory_uri(); ?>/images/hiring-manager-checkicon.png" alt="">Hiring manager</button><button class="btn_job fr"><img src="<?php echo get_template_directory_uri(); ?>/images/job-seeker-checkicon.png" alt="">Job seeker</button>
                                </div>
                            </div>
                        </li>
                        <li class="west_virginia">
                        	<div class="map-tooltip">
                                <div class="tooltip-inner">
                                    <div class="pop_title">
                                        <strong>West Virginia</strong>
                                        <p>Search for recuiting agency. executive recuiters or headhunters</p>
                                    </div>
                                    <button class="btn_hir"><img src="<?php echo get_template_directory_uri(); ?>/images/hiring-manager-checkicon.png" alt="">Hiring manager</button><button class="btn_job fr"><img src="<?php echo get_template_directory_uri(); ?>/images/job-seeker-checkicon.png" alt="">Job seeker</button>
                                </div>
                            </div>
                        </li>
                        <li class="virginia">
                        	<div class="map-tooltip">
                                <div class="tooltip-inner">
                                    <div class="pop_title">
                                        <strong>Virginia</strong>
                                        <p>Search for recuiting agency. executive recuiters or headhunters</p>
                                    </div>
                                    <button class="btn_hir"><img src="<?php echo get_template_directory_uri(); ?>/images/hiring-manager-checkicon.png" alt="">Hiring manager</button><button class="btn_job fr"><img src="<?php echo get_template_directory_uri(); ?>/images/job-seeker-checkicon.png" alt="">Job seeker</button>
                                </div>
                            </div>
                        </li>
                        <li class="md">
                        	<div class="map-tooltip">
                                <div class="tooltip-inner">
                                    <div class="pop_title">
                                        <strong>MD</strong>
                                        <p>Search for recuiting agency. executive recuiters or headhunters</p>
                                    </div>
                                    <button class="btn_hir"><img src="<?php echo get_template_directory_uri(); ?>/images/hiring-manager-checkicon.png" alt="">Hiring manager</button><button class="btn_job fr"><img src="<?php echo get_template_directory_uri(); ?>/images/job-seeker-checkicon.png" alt="">Job seeker</button>
                                </div>
                            </div>
                        </li>
                        <li class="de">
                        	<div class="map-tooltip">
                                <div class="tooltip-inner">
                                    <div class="pop_title">
                                        <strong>DE</strong>
                                        <p>Search for recuiting agency. executive recuiters or headhunters</p>
                                    </div>
                                    <button class="btn_hir"><img src="<?php echo get_template_directory_uri(); ?>/images/hiring-manager-checkicon.png" alt="">Hiring manager</button><button class="btn_job fr"><img src="<?php echo get_template_directory_uri(); ?>/images/job-seeker-checkicon.png" alt="">Job seeker</button>
                                </div>
                            </div>
                        </li>
                        <li class="north_carolina">
                        	<div class="map-tooltip">
                                <div class="tooltip-inner">
                                    <div class="pop_title">
                                        <strong>North_Carolina</strong>
                                        <p>Search for recuiting agency. executive recuiters or headhunters</p>
                                    </div>
                                    <button class="btn_hir"><img src="<?php echo get_template_directory_uri(); ?>/images/hiring-manager-checkicon.png" alt="">Hiring manager</button><button class="btn_job fr"><img src="<?php echo get_template_directory_uri(); ?>/images/job-seeker-checkicon.png" alt="">Job seeker</button>
                                </div>
                            </div>
                        </li>
                        <li class="south_carolina">
                        	<div class="map-tooltip">
                                <div class="tooltip-inner">
                                    <div class="pop_title">
                                        <strong>South_Carolina</strong>
                                        <p>Search for recuiting agency. executive recuiters or headhunters</p>
                                    </div>
                                    <button class="btn_hir"><img src="<?php echo get_template_directory_uri(); ?>/images/hiring-manager-checkicon.png" alt="">Hiring manager</button><button class="btn_job fr"><img src="<?php echo get_template_directory_uri(); ?>/images/job-seeker-checkicon.png" alt="">Job seeker</button>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-sm-2 fr">
        	<div class="find-sector-part">
            	<h5>Find a Headhunter or a Recruiter by Sector</h5>
                <div class="find-sector">                	
                	<select name="">
                    	<option>TYPE SECTOR FOR QUICK SEARCH</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                </div>
                <div class="find-character-part">
                	<div class="alfabet-character">
                    	<ul>
                        	<li class="active"><a href="#">A</a></li>
                            <li><a href="#">b</a></li>
                            <li><a href="#">c</a></li>
                            <li><a href="#">d</a></li>
                            <li><a href="#">e</a></li>
                            <li><a href="#">f</a></li>
                            <li><a href="#">g</a></li>
                            <li><a href="#">h</a></li>
                            <li><a href="#">i</a></li>
                            <li><a href="#">j</a></li>
                            <li><a href="#">k</a></li>
                            <li><a href="#">l</a></li>
                            <li><a href="#">m</a></li>
                            <li><a href="#">n</a></li>
                            <li><a href="#">o</a></li>
                            <li><a href="#">p</a></li>
                            <li><a href="#">q</a></li>
                            <li><a href="#">r</a></li>
                            <li><a href="#">s</a></li>
                            <li><a href="#">t</a></li>
                            <li><a href="#">u</a></li>
                            <li><a href="#">v</a></li>
                            <li><a href="#">w</a></li>
                            <li><a href="#">x</a></li>
                            <li><a href="#">y</a></li>
                            <li><a href="#">z</a></li>
                        </ul>
                    </div>
                    <div class="sector-list">
                    	<ul>
                        	<li><a href="#">Accounting</a></li>
                            <li><a href="#">Actuaries</a></li>
                            <li><a href="#">Administrative</a></li>
                            <li>
                            	<a href="#" class="active">Advertising</a>
                                <div class="tooltip-main">
                                	<div class="tooltip-inner">
                                    	<div class="pop_title">
                                        	<strong>Advertising</strong>
                                            <p>Search for recruiting agency, executive recruiters or headhunters
                                            </p>
                                        </div>
                                        <button class="btn_hir"><img src="<?php echo get_template_directory_uri(); ?>/images/hiring-manager-checkicon.png" alt="">Hiring manager</button><button class="btn_job fr"><img src="<?php echo get_template_directory_uri(); ?>/images/job-seeker-checkicon.png" alt="">Job seeker</button>
                                    </div>
                                </div>
                            </li>
                            <li><a href="#">Aerospace</a></li>
                            <li><a href="#">Agriculture</a></li>
                            <li><a href="#">Apparel</a></li>
                            <li><a href="#">Architects</a></li>
                            <li><a href="#">Assets Management</a></li>
                            <li><a href="#">Automotive</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $flds3 = get_fields(227);
$flds4 = get_fields(208);
//print_r($flds3);?>
<section class="hiri-manager-main">
    <div class="mngr_left">
        <img src="<?php echo $flds3['home_section_image'];?>" alt="">
        <div class="mngr_left_cont">
            <span><?php echo $flds3['home_section_title'];?></span>
            <p><?php echo $flds3['home_section_content'];?></p>
            <a class="rd_more" href="<?php echo get_the_permalink(208);?>">Read More</a>
            
        </div>
    </div>
    <div class="mngr_mid">
        <div class="tp_title">
            <h2>Hiring manager</h2>
            <p>Professional recruiter recommendations based on your needs - at no charge to you!</p> 
        </div>
          <div class="frm_line">Get started by filling out the contact form below. We’ll follow up with you the same business day.</div>	
        <div class="mngr_form">
        <div class="fr_fild">
            <input type="input" class="input_fld" name="" placeholder="NAME*" >
        </div>
        <div class="fr_fild">
            <input type="input" class="input_fld" name="" placeholder="PHONE*" >
        </div>
        <div class="fr_fild">
            <input type="input" class="input_fld" name="" placeholder="EMAIL*" >
        </div>
        <div class="fr_fild">
            <textarea name="" placeholder="YOUR MESSAGE"></textarea>
        </div><br clear="all">
        <center><input name="" class="btn_cont" value="Contact Now" type="submit"></center>
        </div>
    </div>
    <div class="mngr_left mngr_bdr">
        	<img src="<?php echo $flds4['home_section_image'];?>" alt="">
        	<div class="mngr_left_cont">
            <span><?php echo $flds4['home_section_title'];?></span>
            <p><?php echo $flds4['home_section_content'];?></p>
            <a class="rd_more" href="<?php echo get_the_permalink(208);?>">Read More</a>
            
        </div>
		</div>
</section>
<!--- Section End --->
<?php get_footer();
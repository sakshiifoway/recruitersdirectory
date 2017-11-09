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

get_header(); ?>
<!--- Banner Start --->
<div class="main-banner">
	<img src="images/main-banner.jpg"/>
    <div class="banner-caption">
    	<div class="container">
        	<div class="caption-inner">
            	<h6>Searching for Recruiters and Headhunters?</h6>
                <h4>Find the most suitable<br>search firm for your needs</h4>
                <h1>IN A SNAP</h1>
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
                                            <label class="control control--checkbox"><img src="images/hiring-manager-checkicon.png"/>I’M A HIRING MANAGER
                                              <input type="checkbox" checked="checked"/>
                                              <div class="control__indicator"></div>
                                            </label>    
                                        </div>
                                    </div>
                                    <div class="job-seeker-check">
                                    	<div class="control-group">    
                                            <label class="control control--checkbox"><img src="images/job-seeker-checkicon.png"/>I’M A JOB SEEKER
                                              <input type="checkbox" checked="checked"/>
                                              <div class="control__indicator"></div>
                                            </label>    
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li><button value="Go">Go<img src="images/go-arrow.png"/></button></li>
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
            	<li><a class="database" href="#"><img src="images/right-arrow.png"/>Database of over 10,000 recruitment firms</a></li>
                <li>“If a candidate is out there,<br>they will find him... ”<span class="client-name">Stuart Miller</span></li>
                <li>“Simply put - <br>their methodology works... ”<span class="client-name">Robert Harris</span></li>
                <li>“It's always <br>a perfect match... ”<span class="client-name">Amanda Wilson</span></li>
                <li><a class="assisted" href="#"><img src="images/right-arrow.png"/>Assisted over 15,000 HiRing managers</a></li>
            </ul>
        </div>
    </div>
</section>

<section>
	<div class="container">
    	<div class="coman-inner">
    		<div class="other-logo">
        	<ul>
            	<li><img src="images/logo-1.png"/></li>
                <li><img src="images/logo-2.png"/></li>
                <li><img src="images/logo-3.png"/></li>
                <li><img src="images/logo-4.png"/></li>
                <li><img src="images/logo-9.png"/></li>
                <li><img src="images/logo-5.png"/></li>
                <li><img src="images/logo-6.png"/></li>
                <li><img src="images/logo-7.png"/></li>
                <li><img src="images/logo-8.png"/></li>
            </ul>
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
                    	<h3>Recruiters - New Mexico:<br> Albuquerque Reigns Supreme! </h3>
                        <p>Albuquerque's unbeatable combination of breathtaking beauty, history, culture and economic incentive has made...</p>
                        <div class="name-btn">
                        <div class="name">By Elaine Boylan </div>
                        <a href="#" class="button">Read more</a>
                        </div>
                    </div>
                 </li>
                <li>
                	<div class="h-manager">
                    	<h3 class="title"><span class="icon"></span>I’M A HIRING MANAGER</h3>
                        <ul>
                        	<li><a href="#">Post a request for a Recruiter <span></span></a></li>
                            <li><a href="#">Effectiveness Resume Screening <span></span></a></li>
                            <li><a href="#">At your service -<br> recommandation on the best firms for you <span></span></a></li>
                        </ul>
                    </div>
                </li>
                <li>
                	<div class="job-seaker">
                    	<h3 class="title"><span class="icon"></span>I’M A HIRING MANAGER</h3>
                        <ul>
                        	<li><a href="#">Executive $100K job seekers<span></span></a></li>
                            <li><a href="#">Free review of your resume<span></span></a></li>
                            <li><a href="#">Job Boards & Recruiting services<span></span></a></li>
                        </ul>
                    </div>
                </li>
                <li>
                	<div  class="recruiters">
                    	<h3>Recruiters - Arizona:<br> Tucson’s Time has Come! </h3>
                        <p>Once upon a time in Arizona, creating economic opportunity was a challenge for recruiters - but not anymore...</p>
                        <div class="name-btn">
                        <div class="name">By Elaine Boylan</div>
                        <a href="#" class="button">Read more</a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</section>

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
                                    <button class="btn_hir"><img src="images/hiring-manager-checkicon.png" alt="">Hiring manager</button><button class="btn_job fr"><img src="images/job-seeker-checkicon.png" alt="">Job seeker</button>
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
                                    <button class="btn_hir"><img src="images/hiring-manager-checkicon.png" alt="">Hiring manager</button><button class="btn_job fr"><img src="images/job-seeker-checkicon.png" alt="">Job seeker</button>
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
                                    <button class="btn_hir"><img src="images/hiring-manager-checkicon.png" alt="">Hiring manager</button><button class="btn_job fr"><img src="images/job-seeker-checkicon.png" alt="">Job seeker</button>
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
                                    <button class="btn_hir"><img src="images/hiring-manager-checkicon.png" alt="">Hiring manager</button><button class="btn_job fr"><img src="images/job-seeker-checkicon.png" alt="">Job seeker</button>
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
                                    <button class="btn_hir"><img src="images/hiring-manager-checkicon.png" alt="">Hiring manager</button><button class="btn_job fr"><img src="images/job-seeker-checkicon.png" alt="">Job seeker</button>
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
                                    <button class="btn_hir"><img src="images/hiring-manager-checkicon.png" alt="">Hiring manager</button><button class="btn_job fr"><img src="images/job-seeker-checkicon.png" alt="">Job seeker</button>
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
                                    <button class="btn_hir"><img src="images/hiring-manager-checkicon.png" alt="">Hiring manager</button><button class="btn_job fr"><img src="images/job-seeker-checkicon.png" alt="">Job seeker</button>
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
                                    <button class="btn_hir"><img src="images/hiring-manager-checkicon.png" alt="">Hiring manager</button><button class="btn_job fr"><img src="images/job-seeker-checkicon.png" alt="">Job seeker</button>
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
                                    <button class="btn_hir"><img src="images/hiring-manager-checkicon.png" alt="">Hiring manager</button><button class="btn_job fr"><img src="images/job-seeker-checkicon.png" alt="">Job seeker</button>
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
                                    <button class="btn_hir"><img src="images/hiring-manager-checkicon.png" alt="">Hiring manager</button><button class="btn_job fr"><img src="images/job-seeker-checkicon.png" alt="">Job seeker</button>
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
                                    <button class="btn_hir"><img src="images/hiring-manager-checkicon.png" alt="">Hiring manager</button><button class="btn_job fr"><img src="images/job-seeker-checkicon.png" alt="">Job seeker</button>
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
                                    <button class="btn_hir"><img src="images/hiring-manager-checkicon.png" alt="">Hiring manager</button><button class="btn_job fr"><img src="images/job-seeker-checkicon.png" alt="">Job seeker</button>
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
                                    <button class="btn_hir"><img src="images/hiring-manager-checkicon.png" alt="">Hiring manager</button><button class="btn_job fr"><img src="images/job-seeker-checkicon.png" alt="">Job seeker</button>
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
                                    <button class="btn_hir"><img src="images/hiring-manager-checkicon.png" alt="">Hiring manager</button><button class="btn_job fr"><img src="images/job-seeker-checkicon.png" alt="">Job seeker</button>
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
                                    <button class="btn_hir"><img src="images/hiring-manager-checkicon.png" alt="">Hiring manager</button><button class="btn_job fr"><img src="images/job-seeker-checkicon.png" alt="">Job seeker</button>
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
                                    <button class="btn_hir"><img src="images/hiring-manager-checkicon.png" alt="">Hiring manager</button><button class="btn_job fr"><img src="images/job-seeker-checkicon.png" alt="">Job seeker</button>
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
                                    <button class="btn_hir"><img src="images/hiring-manager-checkicon.png" alt="">Hiring manager</button><button class="btn_job fr"><img src="images/job-seeker-checkicon.png" alt="">Job seeker</button>
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
                                    <button class="btn_hir"><img src="images/hiring-manager-checkicon.png" alt="">Hiring manager</button><button class="btn_job fr"><img src="images/job-seeker-checkicon.png" alt="">Job seeker</button>
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
                                    <button class="btn_hir"><img src="images/hiring-manager-checkicon.png" alt="">Hiring manager</button><button class="btn_job fr"><img src="images/job-seeker-checkicon.png" alt="">Job seeker</button>
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
                                    <button class="btn_hir"><img src="images/hiring-manager-checkicon.png" alt="">Hiring manager</button><button class="btn_job fr"><img src="images/job-seeker-checkicon.png" alt="">Job seeker</button>
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
                                    <button class="btn_hir"><img src="images/hiring-manager-checkicon.png" alt="">Hiring manager</button><button class="btn_job fr"><img src="images/job-seeker-checkicon.png" alt="">Job seeker</button>
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
                                    <button class="btn_hir"><img src="images/hiring-manager-checkicon.png" alt="">Hiring manager</button><button class="btn_job fr"><img src="images/job-seeker-checkicon.png" alt="">Job seeker</button>
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
                                    <button class="btn_hir"><img src="images/hiring-manager-checkicon.png" alt="">Hiring manager</button><button class="btn_job fr"><img src="images/job-seeker-checkicon.png" alt="">Job seeker</button>
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
                                    <button class="btn_hir"><img src="images/hiring-manager-checkicon.png" alt="">Hiring manager</button><button class="btn_job fr"><img src="images/job-seeker-checkicon.png" alt="">Job seeker</button>
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
                                    <button class="btn_hir"><img src="images/hiring-manager-checkicon.png" alt="">Hiring manager</button><button class="btn_job fr"><img src="images/job-seeker-checkicon.png" alt="">Job seeker</button>
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
                                    <button class="btn_hir"><img src="images/hiring-manager-checkicon.png" alt="">Hiring manager</button><button class="btn_job fr"><img src="images/job-seeker-checkicon.png" alt="">Job seeker</button>
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
                                    <button class="btn_hir"><img src="images/hiring-manager-checkicon.png" alt="">Hiring manager</button><button class="btn_job fr"><img src="images/job-seeker-checkicon.png" alt="">Job seeker</button>
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
                                    <button class="btn_hir"><img src="images/hiring-manager-checkicon.png" alt="">Hiring manager</button><button class="btn_job fr"><img src="images/job-seeker-checkicon.png" alt="">Job seeker</button>
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
                                    <button class="btn_hir"><img src="images/hiring-manager-checkicon.png" alt="">Hiring manager</button><button class="btn_job fr"><img src="images/job-seeker-checkicon.png" alt="">Job seeker</button>
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
                                    <button class="btn_hir"><img src="images/hiring-manager-checkicon.png" alt="">Hiring manager</button><button class="btn_job fr"><img src="images/job-seeker-checkicon.png" alt="">Job seeker</button>
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
                                    <button class="btn_hir"><img src="images/hiring-manager-checkicon.png" alt="">Hiring manager</button><button class="btn_job fr"><img src="images/job-seeker-checkicon.png" alt="">Job seeker</button>
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
                                    <button class="btn_hir"><img src="images/hiring-manager-checkicon.png" alt="">Hiring manager</button><button class="btn_job fr"><img src="images/job-seeker-checkicon.png" alt="">Job seeker</button>
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
                                    <button class="btn_hir"><img src="images/hiring-manager-checkicon.png" alt="">Hiring manager</button><button class="btn_job fr"><img src="images/job-seeker-checkicon.png" alt="">Job seeker</button>
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
                                    <button class="btn_hir"><img src="images/hiring-manager-checkicon.png" alt="">Hiring manager</button><button class="btn_job fr"><img src="images/job-seeker-checkicon.png" alt="">Job seeker</button>
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
                                    <button class="btn_hir"><img src="images/hiring-manager-checkicon.png" alt="">Hiring manager</button><button class="btn_job fr"><img src="images/job-seeker-checkicon.png" alt="">Job seeker</button>
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
                                    <button class="btn_hir"><img src="images/hiring-manager-checkicon.png" alt="">Hiring manager</button><button class="btn_job fr"><img src="images/job-seeker-checkicon.png" alt="">Job seeker</button>
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
                                    <button class="btn_hir"><img src="images/hiring-manager-checkicon.png" alt="">Hiring manager</button><button class="btn_job fr"><img src="images/job-seeker-checkicon.png" alt="">Job seeker</button>
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
                                    <button class="btn_hir"><img src="images/hiring-manager-checkicon.png" alt="">Hiring manager</button><button class="btn_job fr"><img src="images/job-seeker-checkicon.png" alt="">Job seeker</button>
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
                                    <button class="btn_hir"><img src="images/hiring-manager-checkicon.png" alt="">Hiring manager</button><button class="btn_job fr"><img src="images/job-seeker-checkicon.png" alt="">Job seeker</button>
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
                                    <button class="btn_hir"><img src="images/hiring-manager-checkicon.png" alt="">Hiring manager</button><button class="btn_job fr"><img src="images/job-seeker-checkicon.png" alt="">Job seeker</button>
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
                                    <button class="btn_hir"><img src="images/hiring-manager-checkicon.png" alt="">Hiring manager</button><button class="btn_job fr"><img src="images/job-seeker-checkicon.png" alt="">Job seeker</button>
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
                                    <button class="btn_hir"><img src="images/hiring-manager-checkicon.png" alt="">Hiring manager</button><button class="btn_job fr"><img src="images/job-seeker-checkicon.png" alt="">Job seeker</button>
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
                                    <button class="btn_hir"><img src="images/hiring-manager-checkicon.png" alt="">Hiring manager</button><button class="btn_job fr"><img src="images/job-seeker-checkicon.png" alt="">Job seeker</button>
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
                                    <button class="btn_hir"><img src="images/hiring-manager-checkicon.png" alt="">Hiring manager</button><button class="btn_job fr"><img src="images/job-seeker-checkicon.png" alt="">Job seeker</button>
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
                                    <button class="btn_hir"><img src="images/hiring-manager-checkicon.png" alt="">Hiring manager</button><button class="btn_job fr"><img src="images/job-seeker-checkicon.png" alt="">Job seeker</button>
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
                                    <button class="btn_hir"><img src="images/hiring-manager-checkicon.png" alt="">Hiring manager</button><button class="btn_job fr"><img src="images/job-seeker-checkicon.png" alt="">Job seeker</button>
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
                                    <button class="btn_hir"><img src="images/hiring-manager-checkicon.png" alt="">Hiring manager</button><button class="btn_job fr"><img src="images/job-seeker-checkicon.png" alt="">Job seeker</button>
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
                                    <button class="btn_hir"><img src="images/hiring-manager-checkicon.png" alt="">Hiring manager</button><button class="btn_job fr"><img src="images/job-seeker-checkicon.png" alt="">Job seeker</button>
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
                                    <button class="btn_hir"><img src="images/hiring-manager-checkicon.png" alt="">Hiring manager</button><button class="btn_job fr"><img src="images/job-seeker-checkicon.png" alt="">Job seeker</button>
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
                                    <button class="btn_hir"><img src="images/hiring-manager-checkicon.png" alt="">Hiring manager</button><button class="btn_job fr"><img src="images/job-seeker-checkicon.png" alt="">Job seeker</button>
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
                                        <button class="btn_hir"><img src="images/hiring-manager-checkicon.png" alt="">Hiring manager</button><button class="btn_job fr"><img src="images/job-seeker-checkicon.png" alt="">Job seeker</button>
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

<section class="hiri-manager-main">
    <div class="mngr_left">
        <img src="images/thumb1.jpg" alt="">
        <div class="mngr_left_cont">
            <span>Tip for Effective<br>Resume Screening</span>
            <p>There’s a famous saying that you can’t make a second first impression and this certainly applies whn...</p>
            <a class="rd_more" href="#">Read More</a>
            
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
        	<img src="images/thumb2.jpg" alt="">
            <div class="mngr_left_cont">
            	<span>Tip for Effective<br>Resume Screening</span>
                <p>There’s a famous saying that you can’t make a second first impression and this certainly applies whn...</p>
                <a class="rd_more" href="#">Read More</a>
                
            </div>
		</div>
</section>


<section class="ord-service-main">
	<div class="container">
    	<div class="coman-inner">
    		<div class="ord-service">
        	<h4>The Online Recruiters Directory is the place to find executive recruiters,<br>executive search firms, headhunters, staffing firms and other recruiting services.</h4>
            <div class="hand-icon"><img src="images/hand-icon.png"/></div>
        </div>
        </div>
    </div>
</section>



<!--- Section End --->
<?php get_footer();
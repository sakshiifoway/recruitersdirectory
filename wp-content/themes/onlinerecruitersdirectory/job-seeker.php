<?php
/**
 * Template Name: Job Seeker
*/
//print_r($_REQUEST);
get_header(); 
$srchlocation = $_REQUEST['location'];
$sector = $_REQUEST['sector'];

$sid = $_REQUEST['sid'];
$cid = $_REQUEST['cid'];
	
global $wpdb;
if($_REQUEST['hid1'] == "1"){
	
	if(count($_REQUEST['state'])==0 && count($_REQUEST['category'])==0){
		echo "<script>window.location='".home_url()."/job_seeker#Error'</script>"; $_SESSION['SESSION_MSG'] = "not-selected"; exit;	
	}


	if(count($_REQUEST['category'])>0){$category = implode(',',$_REQUEST['category']);}
	if(count($_REQUEST['state'])>0){$state = implode(',',$_REQUEST['state']);}
	$_SESSION['STID'] = $_REQUEST['state'];
	$_SESSION['CATID'] = $_REQUEST['category'];

	echo "<script>window.location='".home_url()."/searchresult/'</script>";
	//wp_redirect("".$SITE_URL."/"."hiring_sendresume/?location=".$_REQUEST['location']."&sector=".$_REQUEST['sector']."");
	exit;
} 
?>
<link href="<?php echo get_template_directory_uri(); ?>/css/jquery.mCustomScrollbar.css" rel="stylesheet" type="text/css">
<script>window.jQuery || document.write('<script src="js/minified/jquery-1.11.0.min.js"><\/script>')</script>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.mCustomScrollbar.concat.min.js"></script>

<!-- #primary -->
<!--- Inner Start --->
<section class="inner_page">
	<div class="container">
    <ul class="breadcrum">
    	<li><a href="<?php echo bloginfo('home');?>/">Home </a>&rarr;</li>
        <li>Job Seekers</li>
    </ul>
    	<h1>Job Seekers</h1>
    	<h4>Find Recruiters & Search Firms</h4>	 
    	<div class="find-firms-list">
        	<ul>
            	<li><a href="<?php echo bloginfo('home');?>/executive_job_seekers/">Executive $100k Job Seekers</a><i class="fa fa-long-arrow-right"></i></li>
                <li><a href="<?php echo bloginfo('home');?>/free_review/">Free review of your resume</a><i class="fa fa-long-arrow-right"></i></li>
                <li><a href="<?php echo bloginfo('home');?>/our_recommendations/">Job Boards & Recruiting Services</a></li>
            </ul>
        </div>
    </div>
</section>
<!--- Inner End --->

<section class="jobstep">
	<div class="container">
    	<div class="job-seeker-step">
    		<h3>Start your free<span>search now</span></h3>
            <div class="job-step-center">
            	<ul>
                	<li>
                    	<div class="step-no active">1</div>
                        <div class="step-name">Search</div>
                    </li>
                    <li>
                    	<div class="step-no">2</div>
                        <div class="step-name">Contact</div>
                    </li>
                    <li>
                    	<div class="step-no">3</div>
                        <div class="step-name">Get Names</div>
                    </li>
                </ul>
            </div>
            <div class="need-help-right">
            	<div class="hiring-manager-button"><a href="<?php echo bloginfo('home');?>/hiring_manager/">Are you a Hiring Manager?<span>Click here</span><span>search for firms in this sector</span></a></div>
                <div class="need-help"><a href="<?php echo bloginfo('home');?>/contactus/">job seeker, Need help<i class="fa fa-question-circle"></i></a></div>
            </div>
        </div>
    </div>
</section>

<section>
	<div class="container">
    <?php if($_SESSION['SESSION_MSG'] == "not-selected"){?>
			<h4 style="color:red;text-align:center;font-weight:normal;" id="Error">Select an Industry and State to search firms.</h4>
	<? $_SESSION['SESSION_MSG'] = "";
    } ?>

    	<div class="search-center">
        <form name="frmsearch" method="post" action="">
        	<div class="search-full">
            	<div class="col-sm-1 fl">
                	<h5>Select Industry</h5>
                    <div class="select-list">
                    	<div id="examples">			
                            <!-- content -->
                            <div class="mCustomScrollbar content" data-mcs-theme="inset-2-dark">
                                <ul>
                                <?php
								$categories = $wpdb->get_results("SELECT * from category order by categoryname ASC");
								foreach ($categories as $categories_new) {  ?>
                                	<li>
                                    	<div class="checkbox-list">
                                        	<div class="control-group">    
                                            	<label class="control control--checkbox"><?php echo $categories_new->categoryname; ?>
                                              <input type="checkbox" name="category[]" id="category"  <?php if($cid == $categories_new->categoryid){echo "checked='checked'";}?>  value="<?php echo $categories_new->categoryid;?>"/>
                                              <div class="control__indicator"></div>
                                            </label>    
                                        </div>
                                        </div>
                                    </li>
                                    <? } ?>
                                </ul>
                            </div>		
                        </div>
                    </div>
                </div><div class="col-sm-1 fr">
                	<h5>Select State</h5>
                    <div class="select-list">
                    	<div id="examples">			
                            <!-- content -->
                            <div class="mCustomScrollbar content" data-mcs-theme="inset-2-dark">
                                <ul>
                                    <?php 													
									$states = $wpdb->get_results("SELECT * from state order by name ASC");
									foreach ($states as $states_new) { 
									?><li>
                                    	<div class="checkbox-list">
                                        	<div class="control-group">    
                                            	<label class="control control--checkbox"><?php echo $states_new->name; ?>
                                              <input type="checkbox" name="state[]" id="state" <?php if($sid == $states_new->id){echo "checked='checked'";}?> value="<?php echo $states_new->id;?>" />
                                              <div class="control__indicator"></div>
                                            </label>    
                                        </div>
                                        </div>
                                    </li>
                                    <? } ?>                                   
                                </ul>
                            </div>		
                        </div>
                    </div>
                </div>
                
            </div>            
        </div>
        
        <div class="chang-step-part">
        	<div class="next-step"><input type="submit" name="submit" id="submit" value="Next" ><i class="fa fa-long-arrow-right"></i><br>Find recruiters</div>
        </div>
        
            <input type="hidden" name="hid1" id="hid1" value="1" />
          
      </form>

    </div>
</section>

<!--- Section End --->
<?php get_footer();




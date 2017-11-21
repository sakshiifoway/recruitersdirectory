<?php
/**
 * Template Name: Hiring Manager
*/

get_header(); 

$srchlocation = $_REQUEST['location'];
$sector = $_REQUEST['sector'];

$sid = $_REQUEST['sid'];
$cid = $_REQUEST['cid'];

global $wpdb;
if($_REQUEST['hid1'] == "1"){
	
	if(count($_REQUEST['state'])==0 && count($_REQUEST['category'])==0){
		echo "<script>window.location='".home_url()."/hiring_manager#Error'</script>"; $_SESSION['SESSION_MSG'] = "not-selected"; exit;
		
	}


	$qryadd = "";
	
	if(count($_REQUEST['category'])>0){$category = implode(',',$_REQUEST['category']);}
	if(count($_REQUEST['state'])>0){$state = implode(',',$_REQUEST['state']);}
	$_SESSION['STID'] = $_REQUEST['state'];
	$_SESSION['CATID'] = $_REQUEST['category'];
	
	//$sql = "select * from recruiter where aprove='YES' and (state like '5' or state like '%,5' or state like '5,%' or state like '%,5,%' ) and (category like '8' or category like '%,8' or category like '8,%' or category like '%,8,%' ) order by rank";<br />
	if(count($_REQUEST['state'])>0){
		$state_qry.= " and (";
		foreach($_REQUEST['state'] as $st){
			$state_qry.=" FIND_IN_SET('".$st."', state) OR";		
		} 
		$state_qry =substr($state_qry,0,-2);
		$state_qry.= " ) ";
	}
	
	if(count($_REQUEST['category'])>0){
		$cat_qry.= " and (";
		foreach($_REQUEST['category'] as $cat){
			$cat_qry.=" FIND_IN_SET('".$cat."', category) OR";		
		} 
		$cat_qry =substr($cat_qry,0,-2);
		$cat_qry.= " ) ";
	}
	
	$sql = "SELECT * FROM recruiter 
	WHERE aprove='YES' $state_qry $cat_qry";
	$squery.=" order by rank";
    $_SESSION["RECURITERQUERY"]=$sql.$squery;
	
	$wpdb->get_results($sql);
	$_SESSION["RECURITERQUERY"];
	//echo  $_SESSION["RECURITERQUERY"];exit;
	echo "<script>window.location='".home_url()."/hiring_sendresume/'</script>";
	//wp_redirect("".$SITE_URL."/"."hiring_sendresume/?location=".$_REQUEST['location']."&sector=".$_REQUEST['sector']."");
	exit;
}
?>

<!-- #primary -->

<link href="<?php echo get_template_directory_uri(); ?>/css/jquery.mCustomScrollbar.css" rel="stylesheet" type="text/css">
<script>window.jQuery || document.write('<script src="js/minified/jquery-1.11.0.min.js"><\/script>')</script>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.mCustomScrollbar.concat.min.js"></script>

<!-- #primary -->
<!--- Inner Start --->
<?php while ( have_posts() ) : the_post(); ?>
	<section class="inner_page">
	<div class="container">
    <ul class="breadcrum">
    	<li><a href="<?php echo bloginfo('home');?>/">Home </a>&rarr;</li>
        <li>Hiring Managers</li>
    </ul>
    	<h1><?php the_title();?></h1>    	
    </div>
    <div class="container"><div class="inner_page_content HiringManager_UL"><p><?php the_content();?></p></div></div>
</section>
<?php endwhile;?>
<!--- Inner End --->

<section class="inner_page" style="padding:0;">
<?php if($_SESSION['SESSION_MSG'] == "not-selected"){?>
<h5 style="color:red; text-align:center">Select Location and Sector to move further.</h5>
<? $_SESSION['SESSION_MSG'] = "";
} ?>
	
	<div class="container">
<h1><center>Start Free Search Now</center></h1>
</div></section>
<section>

	<div class="container">
      	<div class="search-center" id="Error">
        <form name="frmsearch" method="post" action="">
        	<div class="search-full">
              <?php if($_SESSION['SESSION_MSG'] == "not-selected"){?>
                        <h4 style="color:red;text-align:center;font-weight:normal;" id="Error">Select an Industry and State to search firms.</h4>
                <? $_SESSION['SESSION_MSG'] = "";
                } ?>
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

<?php get_footer();




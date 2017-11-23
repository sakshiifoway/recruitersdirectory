<?php
/**
 * Template Name: Job Seeker Serarch Result
*/
get_header(); 

$_SESSION['RECRUITER_ID'] = "";
global $wpdb;
$qryadd = "";

	if(count($_SESSION['CATID'])>0){$category = implode(',',$_SESSION['CATID']);}
	if(count($_SESSION['STID'])>0){$state = implode(',',$_SESSION['STID']);}
	
	$stateId = $_SESSION['STID'];
	$catId = $_SESSION['CATID'];
	
	//$sql = "select * from recruiter where aprove='YES' and (state like '5' or state like '%,5' or state like '5,%' or state like '%,5,%' ) and (category like '8' or category like '%,8' or category like '8,%' or category like '%,8,%' ) order by rank";<br />
	if(count($stateId)>0){
		$state_qry.= " and (";
		foreach($stateId as $st){
			$state_qry.=" FIND_IN_SET('".$st."', state) OR";		
		} 
		$state_qry =substr($state_qry,0,-2);
		$state_qry.= " ) ";
	}

	
	if(count($catId)>0){
		$cat_qry.= " and (";
		foreach($catId as $cat){
			$cat_qry.=" FIND_IN_SET('".$cat."', category) OR";		
		} 
		$cat_qry =substr($cat_qry,0,-2);
		$cat_qry.= " ) ";
	}
	
	$sql = "SELECT * FROM recruiter 
	WHERE aprove='YES' $state_qry $cat_qry";
	$squery.=" order by rank";
    //$_SESSION["RECURITERQUERY"]=$sql.$squery;	
	$ressql = $wpdb->get_results($sql);
	
	
if($_REQUEST['hid1'] == "1")
{
	$_SESSION['RECRUITER_ID'] = $_REQUEST['recruit'];
	echo "<script>window.location='".home_url()."/sendresume/'</script>";
	exit;
}
?>


<!-- #primary -->
<?php if($_SESSION['SESSION_MSG'] == "not-selected"){?>

<h5 style="color:red;">Select Location and Sector to move further.</h5>
<? $_SESSION['SESSION_MSG'] = "";
} ?>
<!--<link href="<?php echo get_template_directory_uri();?>/css/jquery.mCustomScrollbar.css" rel="stylesheet" type="text/css">
<script>window.jQuery || document.write('<script src="<?php echo get_template_directory_uri();?>/js/minified/jquery-1.11.0.min.js"><\/script>')</script>
<script src="<?php echo get_template_directory_uri();?>/js/jquery.mCustomScrollbar.concat.min.js"></script>
-->
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
                    	<div class="step-no">1</div>
                        <div class="step-name">Search</div>
                    </li>
                    <li>
                    	<div class="step-no active">2</div>
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
 <form name="searchresult" id="searchresult" method="post" action="">
	<div class="container">
    	<div class="search-center">
        	<div class="search-full">
            	<h6>Select Recruiter to send an email to.</h6>
                  <?php if(count($ressql)>0){ ?>
                <div class="recruiter-box">                                	
                	<table>
						<thead>
                    	<tr>
                            <th>Recruiter</th>
                            <th>State</th>
                            <th>Country</th>
                    	</tr>
                    </thead>                                	                    
                	</table>
                    <div class="recuiter-scrollbar">
                    	<div id="examples">			
                            <!-- content -->
                            <div class="mCustomScrollbar content" data-mcs-theme="inset-2-dark">
                        		<table>
                            		<tbody>
                                    	<?php //print_r($ressql); 										
											$i=1;
											foreach($ressql as $rs){
										?>
                                        <tr>
                                            <td width="50%"  <?php if(count($ressql) == $i){ echo "style='border-bottom:0px;'";}?>><input type="checkbox" name="recruit[]" id="recruit" value="<?php echo $rs->rid;?>" /><a href="#" onclick="GetCompanyProfile(<?php echo $rs->rid;?>);"><?php echo $rs->firmname;?></a></td>
                                            <td width="25%" <?php if(count($ressql) == $i){ echo "style='border-bottom:0px;'";}?>><?php echo GetRecruiterState($_SESSION['STID'],$rs->state,$rs->rid);?></td>
                                            <td width="25%" <?php if(count($ressql) == $i){ echo "style='border-bottom:0px;'";}?>><?php echo GetOneValue("country","id",$rs->country,"name");?></td>
                                        </tr>
										<?php $i++;} ?>
                                    </tbody>                    
                        		</table>
                        	</div>
                        </div>
                    </div>
                </div>
                <? } ?>
            </div>            
        </div>
        <?php echo $cname;?>
 		<input type="hidden" name="hid1" id="hid1" value="1" />   	
        <div class="chang-step-part">
        	<?php /*?><div class="prev-step"><i class="fa  fa-long-arrow-left"></i><a href="<?php echo bloginfo('home');?>/job_seeker/">Back</a></div><?php */?>
            <div class="prev-step"><i class="fa  fa-long-arrow-left"></i><input type="button" name="back_btn" id="back_btn" onclick="window.location='<?php echo bloginfo('home');?>/job_seeker/'" value="Back"></div>
        	<div class="next-step"><input type="submit" name="submit" id="submit" value="Next" onclick="return chk();" /><i class="fa fa-long-arrow-right pad-0"></i></div>
        </div>
    </div>
 </form>
 <form name="companyProf_frm" id="companyProf_frm" method="post" action="<?php echo bloginfo('home');?>/company_profile.php">
 	<input type="hidden" name="CompanyId" id="CompanyId" />
 </form>
</section>

<!--- Section End --->

<script language="JavaScript">
function GetCompanyProfile(cid){
	$("#CompanyId").val(cid);
	document.companyProf_frm.submit();
}
function chk()
{
	var count;
	var temp;
	var flag;
	count=document.searchresult.elements.length;
	flag="N";	
	for(i=0;i<count;i++)
	{
		if(document.searchresult.elements[i].type=="checkbox")
		{
			if(document.searchresult.elements[i].checked)
			{
				flag="Y";
			}
		}
	}
	if(flag!="Y")
	{
		alert("Select Checkbox for Send Resume Option.");
		return false;
	}
	else
	{
		var doc=document.getElementById('searchresult');
		overlay();
		doc.submit();
		return true;
	}
}
</script>
<?php get_footer();




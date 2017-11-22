<?php
include "../../../wp-load.php";

$cval = $_REQUEST['cval'];

$Sector_listquery = $wpdb->get_results("SELECT * from category where categoryname LIKE '$cval%' order by categoryname ASC"); 
$cnt_Sector = $wpdb->num_rows;
$output = "";
if($cnt_Sector>0)
{
	foreach ($Sector_listquery as $Sector_listquery_new) {
		$hm_url = home_url()."/hiring_manager/?cid=".$Sector_listquery_new->categoryid."&sector=".trim(stripslashes($Sector_listquery_new->category_slug));
		$js_url = home_url()."/job_seeker/?cid=".$Sector_listquery_new->categoryid."&sector=".trim(stripslashes($Sector_listquery_new->category_slug));
		$output .= '<li><a>'.trim(stripslashes($Sector_listquery_new->categoryname)).'</a>
                	<div class="tooltip-main">
                  		<div class="tooltip-inner">
                    		<div class="pop_title">
                            	<strong>'.trim(stripslashes($Sector_listquery_new->categoryname)).'</strong>
                      			<p>Search for recruiting agency, executive recruiters or headhunters </p>
                    		</div>
                            <a class="btn_hir" href="'.$hm_url.'"><img src="'.get_template_directory_uri().'/images/hiring-manager-checkicon.png" alt="">Hiring manager</a>
                  			<a class="btn_job fr" href="'.$js_url.'"><img src="'.get_template_directory_uri().'/images/job-seeker-checkicon.png" alt="">Job seeker</a>
                  		</div>
                	</div>
                </li>';
	}
}
else
{
	$output = "<li><a>No sector found.</a></li>";
}
echo $output;
?>
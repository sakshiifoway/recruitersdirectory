<?php
/**
 * Template Name: Company Profile
*/
get_header();

$companyID = $_REQUEST['CompanyId'];
$com_det = $wpdb->get_results("SELECT * from recruiter where rid = $companyID");
//print_r($com_det);

//CompanyId
?>
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
    <div class="widget-main">
      <?php include "button-section.php"; ?>
    </div>    
    <div class="widget-center">
      <div class="get-widget-box">
        <h5 class="company_name">Company Name : <?php echo $com_det[0]->firmname;?></h5>
        <ul class="Comp_prof_detail">
          <li><span>Address :</span> <div><?php echo GetRecruiterAddress($com_det[0]->add1,$com_det[0]->add2,$com_det[0]->city,$com_det[0]->state,$com_det[0]->country,$com_det[0]->zip);?></div></li>
          <?php if($com_det[0]->state){?><li><span>States :</span> <div><?php echo GetRecruiterStates($com_det[0]->state);?></div></li><?  } ?>
          <?php if($com_det[0]->phone){?><li><span>Phone :</span> <?php echo $com_det[0]->phone;?></li><?  } ?>         
          <?php if($com_det[0]->contact){?><li><span>Contact Name :</span> <?php echo $com_det[0]->contact;?></li><? } ?>
          <?php if($com_det[0]->website){?><li><span>Website :</span> <?php echo $com_det[0]->website;?></li><? } ?>
          <li>
          <form method="post" action="<?php echo bloginfo('home');?>/sendresume.php" name="comPfoFm" id="comPfoFm">
          	<input type="submit" value="Contact Company" style="float:left; text-align:center" />
            <input type="hidden" name="RECRUITER_ID" id="RECRUITER_ID" value="<?php echo $_REQUEST['CompanyId'];?>" />
            <input type="hidden" name="FromCompanyProfile" id="FromCompanyProfile" value="YES" />
          </form>
          </li>
        </ul>
        <?php if($com_det[0]->logo != ""  && file_exists(get_template_directory().'/recruiterlogo/'.$com_det[0]->logo)){ ?> 
        <ul class="Comp_prof_img">
        	<img src="<?php echo get_template_directory_uri(); ?>/recruiterlogo/<?php echo $com_det[0]->logo;?>" style="max-width:280px;" />
        </ul>
        <? } ?>
        <?php if($com_det[0]->category){?>
        <div class="companyprofile_category">
          <h2><span>Categories</span></h2>
          <?php echo GetRecruiterCategories($com_det[0]->category);?>
        </div>
        <? } ?>
        
        <?php if($com_det[0]->biography){?>
        <div class="companyprofile_category">
          <h2><span>Biography</span></h2>
          <?php echo stripslashes(nl2br($com_det[0]->biography));?>
        </div>
        <? } ?>
        <div class="chang-step-part" id="ComapnyProfile_backbtn">
          <?php /*?><div class="prev-step"><i class="fa  fa-long-arrow-left"></i><a href="<?php echo bloginfo('home');?>/job_seeker/">Back</a></div><?php */?>
          <div class="prev-step"><i class="fa  fa-long-arrow-left"></i>
            <input type="button" name="back_btn" id="back_btn"  onclick="history.back();" value="Back">
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script language="JavaScript">
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





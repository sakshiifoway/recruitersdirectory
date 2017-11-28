<?php
/**
 * Template Name: Tips for Effective Resume Screening
*/
get_header();
while ( have_posts() ) : the_post();

if($_REQUEST['subscribe1'] == 1)
{
	//print_r($_REQUEST);exit;
	
	$sname = $_POST['sname'];
	$semail = $_POST['semail'];

	$query = "select email from recruiter where `email`='".$semail."'";
	$result = $wpdb->get_results($query);

	if(count($result)>0){
		$msg="duplicate";
	}else{
		$ins = "insert into recruiter set 
				`select_payment_plan`='FREE',
				`new_old`='NEW',
				`email`='".$semail."', `contact`='".$sname."',
				`aprove`='NO'";
		$wpdb->get_results($ins);
		
		$to = get_option('admin_email');
		$from = $semail;
		$subject = "Request from Resume-Effectiveness Screening.";
		
		$mailcontent = "";
		$mailcontent.="<html xmlns='http://www.w3.org/1999/xhtml'>
		<head>
		<table width='100%' cellpadding='0' cellspacing='0' border='0' align='center'>";
		$mailcontent.="<tr><td colspan='2'>&nbsp;</td></tr>";
		$logo = get_template_directory_uri()."/images/mail-logo.jpg"; 
		$mailcontent.="<tr><td valign='top'><a href='".home_url()."/'><img src='".$logo."' width='200'></a></td></tr><tr><td>&nbsp;</td></tr>";
		$mailcontent.="<tr><td valign='top' colspan='2'>Hello Admin,</td></tr><tr><td colspan='2'>&nbsp;</td></tr>";
		$mailcontent.="<tr><td valign='top' colspan='2'>There is a request from Resume-Effectiveness Screening, details of request are stated below:</td></tr>";
		$mailcontent.="<tr><td colspan='2'>&nbsp;</td></tr>";
		$mailcontent.="<tr><td valign='top' width='15%'><strong>Name</strong> : </td><td valign='top' width='85%'>".$sname."</td></tr>";
		$mailcontent.="<tr><td valign='top'><strong>Office email</strong> : </td><td valign='top'><a href='mailto:".$semail."'>".$semail."</a></td></tr>";				
		$mailcontent.="<tr><td colspan='2'>&nbsp;</td></tr>";
		$mailcontent.="<tr><td colspan='2'>Before this recruiter go in the live site, admin need to approve first from admin.</td></tr>";
		$mailcontent.="<tr><td colspan='2'>&nbsp;</td></tr>";
		$mailcontent.="<tr><td valign='top' colspan='2'>Thanks,<br/>";
		$mailcontent.="</td></tr></table>
		</head>
		</html>
		";
		SendHTMLMail($to,$subject,$mailcontent,$from);
		$msg = "success";
	}
}
?>


<!--- Inner Start --->
<section class="inner_page">
	<div class="container">
    	<ul class="breadcrum">
            <li><a href="<?php bloginfo( 'home' ); ?>/">Home </a>&rarr;</li>
            <li><?php the_title(); ?></li>
        </ul>
    	<h1><?php the_title(); ?></h1>
    </div>
</section>
<!--- Inner End --->

<!----------form section start---------->
<section class="jobstep">
<div class="container">
    <div class="job-seeker-step">
        <div class="professional-left">
            <h4>At no charge to You</h4>
            <h6>Professional recruiter recommendations based on your needs</h6>
        </div>
        <div class="professional-form">
        	
		   
            <form method="post" name="subscriber" id="subscriber">
            	<ul>
                
                <li>
                    <input id="sname" name="sname" type="text" placeholder="* Name" value="<?php echo $_REQUEST['sname']; ?>" />
                    <!---->
                </li>
                <li>
                    <input id="semail" name="semail" type="text" placeholder="* Email" />
                    <!--<span class="frm_error" id="semail_error"></span>-->
                </li>
                <span class="frm_error" id="both_error"></span>
                <?php if($msg == "success") { echo "<span class='frm_error' style='text-align:center;margin-bottom:15px; float:left;color:#C6FFC6 !important;'>Thank You For Your Request. We Will Contact You Soon.</span>"; } ?>
                 <?php if($msg == "duplicate") { echo "<span class='frm_error' style='text-align:center;margin-bottom:15px; float:left;'>Email Address Already in Use.</span>"; } ?>
                <li class="full-width">
                    <input type="hidden" name="subscribe1" value="1" />
                    <input name="submit" type="submit" value="Contact Now" onclick="return chksubscribe();" />
                </li>
                </ul>
            </form>
        </div>
    </div>
</div>
</section>
<!-----------form section end----------->

<section class="inner_page">
	<div class="container">
        <div class="inner_page_content">
			<?php the_content(); ?>
        </div>
	</div>
</section>
<?php endwhile;
get_footer();
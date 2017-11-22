<?php
/**
 * Template Name: Add My Firm
*/
get_header();

include("captcha/cf.captcha.php");

if($_REQUEST['hidval'] == 1)
{
	//print_r($_REQUEST);exit;
	$contact_name = $_REQUEST['contact_name'];
	$address = $_REQUEST['address'];
	$phone = $_REQUEST['phone'];
	$city = $_REQUEST['city'];
	$website = $_REQUEST['website'];
	$state = $_REQUEST['state'];
	$email = $_REQUEST['email'];
	$zip = $_REQUEST['zip'];	
	$capcha_code = $_REQUEST["capcha_code"];
	
	if(check_captcha($capcha_code))
	{
		$sname = GetOneValue("state","id",$state,"name");
		
		$to = get_option('admin_email');
		$from = $email;
		$subject = "Request for recruiter";
		
		$mailcontent = "";
		$mailcontent.="<html xmlns='http://www.w3.org/1999/xhtml'>
		<head>
		<table width='100%' cellpadding='0' cellspacing='0' border='0' align='center'>";
		$mailcontent.="<tr><td colspan='2'>&nbsp;</td></tr>";
		$logo = get_template_directory_uri()."/images/mail-logo.jpg"; 
		$mailcontent.="<tr><td valign='top'><a href='".home_url()."/'><img src='".$logo."' width='200'></a></td></tr><tr><td>&nbsp;</td></tr>";
		$mailcontent.="<tr><td valign='top' colspan='2'>Hello Admin,</td></tr><tr><td colspan='2'>&nbsp;</td></tr>";
		$mailcontent.="<tr><td valign='top' colspan='2'>There is a request for recruiter, details of request are stated below:</td></tr>";
		$mailcontent.="<tr><td colspan='2'>&nbsp;</td></tr>";
		$mailcontent.="<tr><td valign='top' width='15%'><strong>Contact Name</strong> : </td><td valign='top' width='85%'>".$contact_name."</td></tr>";
		$mailcontent.="<tr><td valign='top'><strong>Address</strong> : </td><td valign='top'>".$address."</td></tr>";
		$mailcontent.="<tr><td valign='top'><strong>City</strong> : </td><td valign='top'>".$city."</td></tr>";
		$mailcontent.="<tr><td valign='top'><strong>State</strong> : </td><td valign='top'>".$sname."</td></tr>";
		$mailcontent.="<tr><td valign='top'><strong>Zip</strong> : </td><td valign='top'>".$zip."</td></tr>";
		$mailcontent.="<tr><td valign='top'><strong>Phone</strong> : </td><td valign='top'>".$phone."</td></tr>";
		$mailcontent.="<tr><td valign='top'><strong>Website</strong> : </td><td valign='top'>".$website."</td></tr>";
		$mailcontent.="<tr><td valign='top'><strong>Office email</strong> : </td><td valign='top'>".$email."</td></tr>";				
		$mailcontent.="<tr><td colspan='2'>&nbsp;</td></tr>";
		$mailcontent.="<tr><td valign='top' colspan='2'>Thanks,<br/>";
		$mailcontent.="</td></tr></table>
		</head>
		</html>
		";

		//echo $mailcontent;exit;
		SendHTMLMail($to,$subject,$mailcontent,$from);		
		$msg = "success";
	}
	else
	{
		$msg = "invalid";
	}
}

while ( have_posts() ) : the_post(); ?>

<!--- Inner Start --->
<section class="inner_page">
	<div class="container">
        <ul class="breadcrum">
            <li><a href="<?php bloginfo( 'home' ); ?>/">Home </a>&rarr;</li>
            <li><?php the_title(); ?></li>
        </ul>
    	<h1><?php the_title(); ?></h1>
        <div class="txt-center"><?php the_content(); ?></div>
        <div class="contact-center">     
            <div class="contact-form">
                <h6>Add your information</h6>
                <?php if($msg == "success") { echo "<div class='SuccessMsgCls'>Thank you for your request. We Will Contact You Soon.</div>"; } ?>
                <?php if($msg == "invalid") { echo "<div class='ErrorMsgCls'>Your entered code is incorrect.</div>"; } ?>
                <form name="firm_frm" id="firm_frm" method="post">
	            	<input type="hidden" name="hidval" id="hidval" value="1">
                    <ul>
                        <li>
                        	<input type="text" name="contact_name" id="contact_name" placeholder="*Contact Person" value="<?php echo $_REQUEST['contact_name']; ?>">
                            <span class="frm_error" id="contact_name_error"></span>
                        </li>
                        <li>
                        	<input type="text" name="address" id="address" placeholder="*Address" value="<?php echo $_REQUEST['address']; ?>">
                            <span class="frm_error" id="address_error"></span>
                        </li>
                        <li>
                        	<input type="text" name="phone" id="phone" placeholder="*Phone" value="<?php echo $_REQUEST['phone']; ?>">
                            <span class="frm_error" id="phone_error"></span>
                        </li>
                        <li>
                        	<input type="text" name="city" id="city" placeholder="*City" value="<?php echo $_REQUEST['city']; ?>">
                            <span class="frm_error" id="city_error"></span>
                        </li>
                        <li><input type="text" name="website" id="website" placeholder="Website" value="<?php echo $_REQUEST['website']; ?>"></li>
                        <li>
                        	<select name="state" id="state">
                                <option value="">State</option>
                                <?php
									$st_query = "SELECT * from state order by name";
									$st_rows = $wpdb->get_results($st_query);
									if(count($st_rows)>0) {
										$i=1;
										foreach ($st_rows as $st_row) {
                                ?>
                                    <option value="<?php echo $st_row->id;?>" <?php if($st_row->id == $_REQUEST['state']) { echo "selected"; }?>><?php echo $st_row->name;?></option>
                                <?php } } ?>
                            </select>
                        </li>
                        <li>
                        	<input type="text" name="email" id="email" placeholder="*Office Email" value="<?php echo $_REQUEST['email']; ?>">
                            <span class="frm_error" id="email_error"></span>
                        </li>
                        <li>
                        	<input type="text" name="zip" id="zip" placeholder="*Zip" value="<?php echo $_REQUEST['zip']; ?>">
                            <span class="frm_error" id="zip_error"></span>
                        </li>
                        <li>
                            <input name="capcha_code" id="capcha_code" placeholder="*Security Code" type="text" style="width:60%;">
                        	<div class="captcha_img">
                                <img style="opacity: 1;" width="84" height="28" id="captcha_img" src="<?php echo get_template_directory_uri(); ?>/captcha/cf.captcha.php?img=<?=time();?>"  />
                                <a style="padding-left:5px" href="#" onclick="document.getElementById('captcha_img').src = '<?php echo get_template_directory_uri(); ?>/captcha/cf.captcha.php?img=' + Math.random(); return false;">
                                    <img src="<?php echo get_template_directory_uri(); ?>/images/refresh.jpg" />
                                </a>
                            </div>
                            <span class="frm_error" id="capcha_code_error"></span>
                        </li>
                        <li class="full-width"><input type="submit" name="firm_submit" id="firm_submit" value="Submit" onclick="return checkFrm();"></li>
                    </ul>
				</form>
            </div>
		</div>
    </div>
</section>
<!--- Inner End --->

<?php endwhile; 
get_footer();
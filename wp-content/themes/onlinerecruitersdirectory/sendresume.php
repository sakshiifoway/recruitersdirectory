<?php
/**
 * Template Name: Job Seeker Send Resume
*/
get_header(); 
//echo get_template_directory();
//print_r($_SESSION);
/*echo $_SESSION["RECURITERQUERY"];
echo "<br>";echo "<br>";
$stateId = $_SESSION['STID'];
echo "<br>";echo "<br>";
$catId = $_SESSION['CATID'];
echo "<br>";
*/

if($_REQUEST['FromCompanyProfile'] == "YES"){
	$_SESSION['RECRUITER_ID'][] = $_REQUEST['RECRUITER_ID'];
}

//print_r($_SESSION);

if($_REQUEST['hidn'] == "1")
{
	$name = $_REQUEST['fullname'];
	$phone = $_REQUEST['phone'];
	$email = $_REQUEST['email'];
	$message = $_REQUEST['message'];
		
	$attachment_name=$_FILES['attachment']['name'];
	
	if($attachment_name != "")
	{
		$attfile= rand()."_".$attachment_name;
	//	copy($attachment,$path);
		copy($_FILES["attachment"]["tmp_name"],"wp-content/themes/onlinerecruitersdirectory/candidatefile/".$attfile);
	}
	
	$que="select * from candidate where name='".$name."' and email='".$email."'";
	$res = $wpdb->get_results($sql);
	if(count($res)>0)
	{ 
		
	}
	else
	{
		$to=$email;
		$from="info@onlinerecruitersdirectors.com";				
		$subject="Thankyou for Visiting Online Recruiters Directory";
		$mailcontent1.="<br>Dear $name,<br>";
	
		$mailcontent1.="<br>Thank you for using our FREE Recruiters Directory to submit your resume!<br>";
		$mailcontent1.="We wish you every success in your future career as you explore exciting new employment opportunities.<br>";
		$mailcontent1.="Right now your resume is being forwarded to the Recruiters and Search Firms of your choice so as to increase your chances of success.<br>";
	
		$mailcontent1.="<br>Again, thank you for choosing us as your job search partner, and should you have any questions, please feel free to <a href='http://www.onlinerecruitersdirectory.com/contactus.php' style='text-decoration:underline;'><strong>contact us</strong></a> and we will be happy to be of service.<br>";
	
	
		$mailcontent1.="<br>Sincerely,<br>";
		$mailcontent1.="<br>Job Seekers Dpt.<br>";
		$mailcontent1.="Online Recruiters Directory<br>";
		$mailcontent1.="<a href='http://www.onlinerecruitersdirectory.com'>www.onlinerecruitersdirectory.com</a><br>";
		$mailcontent1.="<br><img width='270' height='45' alt='Online Recruiters Directory' src='http://onlinerecruitersdirectory.com/images/logo.jpg'><br>";
		$mailcontent1.="<br>p.s.<br>";
		$mailcontent1.="If you haven't already signed-up to TopJobHunting's FREE series of excellent <a href='http://www.onlinerecruitersdirectory.com/newsletter.php' style='text-decoration:underline;'><strong>Job searching Tips & Tools,</strong></a> we again recommend you do so. You can get some valuable insider information about job seeking...";
	
		//echo "===========".$mailcontent1; echo "<br>";echo "<br>";
	//	SendHTMLMail1($to,$subject,$mailcontent1,$from);
	}
	if(count($_SESSION['RECRUITER_ID'])>0)
	{
		//echo "asdAS";
		foreach($_SESSION['RECRUITER_ID'] as $ri)
		{
				//echo "<br>";
				$addsql="insert into candidate set rid = $ri, rdate=sysdate(),name='$name',phone='$phone',email='$email',message='$message',attfile='$attfile'";				
				$result = $wpdb->get_results($addsql);
				//cho "<br>";
				///// Send Mail
				$rsql=$wpdb->get_results("select * from recruiter where rid='".$ri."'"); 
				//$rres=mysql_fetch_object($rsql);
				$remail=$rsql[0]->email;
				
				if($rsql[0]->resumeopt=="Y")
				{					 	
					//$msg=stripslashes(ereg_replace("\n","<br>",$message));
				
					$patterns = array();
					$patterns[0] = '/\n/';
					$replacements = array();
					$replacements[0] = '<br>';
					$msg=preg_replace($patterns, $replacements, $message);
					
					$to=$remail;
					$from=$email;				
					$subject="I found you in the Online Recruiters Directory";
					$mailcontent="
					<TABLE cellSpacing=2 cellPadding=2 width=100% border=0>
					<TR> 
					<TD vAlign=top noWrap class=f-b colspan=2>Below is a message from a job seeker who found your firm in the Online Recruiters Directory.</TD>
					</TR>
					<TR> 
					<TD width=\"22%\" align=right vAlign=top noWrap class=f-b>Name:&nbsp;</TD>
					<TD width=\"78%\" nowrap class=f-d><b> 
					   $name
					  </b></TD>
					</TR>
					<TR> 
					<TD width=\"22%\" align=right vAlign=top noWrap class=f-b>E-mail:</TD>
					<TD width=\"78%\" nowrap class=f-d> 
					   $email
					  </TD>
					</TR>
						  <TR> 
					<TD width=\"22%\" align=right vAlign=top noWrap class=f-b>Phone:</TD>
					<TD width=\"78%\" nowrap class=f-d> 
					  $phone
					  </TD>
					</TR>
							  
					<TR> 
					<TD width=\"22%\" align=right vAlign=top noWrap class=f-b >Message:</TD>
					<TD width=\"78%\" class=f-d valign=\"top\"> 
						$message
					  </TD>
					</TR>
					
					</table>";
				
					if($attfile)
					{	
						$mailcontent.="<br> Click on the link to view the candidate's resume: <br>";
						$mailcontent.="<a href='".get_template_directory_uri."/candidatefile/$attfile'  target='_blank'>http://www.onlinerecruitersdirectory.com/candidatefile/$attfile</a>";
					}
						$mailcontent.="<br><br>Thank you for using the Online Recruiters Directory.<br>";
						$mailcontent.="If you do not want to get resumes from job seekers anymore, e-mail us to: remove@onlinerecruitersdirectory.com";
						//echo $mailcontent;echo "<br>";echo "<br>";
					
						SendHTMLMail1($to,$subject,$mailcontent,$from);
						
						//SendHTMLMail1("ashish@sakshiinfosys.com",$subject,$mailcontent1,$from);
					}
			}	
	}
	else
	{
		//echo "<br>";echo "<br>";
		$addsql="insert into candidate set rid = $ri, rdate=sysdate(),name='$name',phone='$phone',email='$email',message='$comment',attfile='$attfile'";				
		$result = $wpdb->get_results($addsql); //echo "<br>";
	}
	//exit;
	header("Location:thank-you-job-seeker-recommendations.php?Type=$type&Toemail=$email&CanName=$name2");	
}
else
{	
	for($i=0;$i<=$_REQUEST['checkno'];$i++)
	{
		$rid=$_REQUEST['rid'];
		if($_REQUEST['check'.$i]=="Yes")
		{
			$mrid=$mrid.",".$rid[$i];
			
			if(!$tot)
				$tot=1;
			else
				$tot=$tot+1;
		}
	}
	
	if(substr($mrid,0,1)==",")
			$mrid=substr($mrid,1,strlen($mrid));
}

?>


<!-- #primary -->
<?php if($_SESSION['SESSION_MSG'] == "not-selected"){?>

<h5 style="color:red;">Select Location and Sector to move further.</h5>
<? $_SESSION['SESSION_MSG'] = "";
} ?>

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
	<div class="container">
     <form name="sendresume" id="sendresume" method="post" enctype="multipart/form-data">
    	<div class="search-center">
        	<div class="search-full">
            	<h6>Add your information and comments Contact with Wireless</h6>
            	<div class="step3-infor-contanct">
                	<ul>
                    	<li><input placeholder="* Name" id="fullname" name="fullname" type="text" /></li>
                        <li><input type="text" placeholder="Phone" id="phone" name="phone"></li>
                        <li><input type="text" placeholder="Email" id="email" name="email"></li>
                        <li>
                        	<label>Attach CV</label>
                        	<div class="file-upload"><input type="file" name="attachment" id="attachment" title="Attach CV"></div>
                        </li>
                        <li class="full-width"><textarea name="message" id="message" placeholder="* Comments" class="comment_box"></textarea></li>
                    </ul>
                      <input type="submit" name="submit" id="submit" value="Submit" onClick="return chk_SendResume();" class="sendResumeBtn">  
                </div>
                
            </div>   
                  
        </div>
       
        <div class="chang-step-part">
        	<div class="prev-step"><i class="fa  fa-long-arrow-left"></i><input name="" type="button" value="Back" onclick="window.location='<?php echo bloginfo('home');?>/searchresult/'"></div>
        	<div class="next-step"></div>
        </div>
         <input type="hidden" name="hidn" value="1">			
        </form>
    </div>
</section>



<?php get_footer();




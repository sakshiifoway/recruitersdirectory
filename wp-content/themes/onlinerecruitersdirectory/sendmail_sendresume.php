<?php //step-2 (hm)
include "../../../wp-load.php";
session_start();
//print_r($_SESSION);
 $query=$_SESSION["RECURITERQUERY"];
 
 //echo $query;
 //echo '==>'.$STID=$_SESSION['STID'];
 //echo '==>'.$CATID=$_SESSION['CATID'];
 $ses_result = $wpdb->get_results($query);
 
//echo $query;
$totalrows=0;
$totalrows= count($ses_result);

if($_POST['sendmail']==1)
{
	//print_r($_SESSION);

	$CandidateName=$_POST['first_name'];
	$email=$_POST['Email'];
	$phone=$_POST['Phone'];
	$company=$_POST['Company'];
	$comment=$_POST['Comment'];
	
	if($totalrows>0)
	{	
		if(count($_SESSION['STID'])>0){			
			foreach($_SESSION['STID'] as $stat){
				$stateName.=GetOneValue("state","id",$stat,"name").", ";
			}
		}
		$stateName = substr($stateName,0,-2);
		
		if(count($_SESSION['CATID'])>0){			
			foreach($_SESSION['CATID'] as $stat){
				$catName.=GetOneValue("category","categoryid",$stat,"categoryname").", ";
			}
		}
		$catName = substr($catName,0,-2);
		
		//sysdate $res->rid
	foreach($ses_result as $res){
		//echo "<br><br>Query</br>";
		$addsql="insert into company set rid = $res->rid, rdate = sysdate(), company_name = '".$company."', name = '".$CandidateName."'
		,phone = '".$phone."', email = '".$email."', message = '".$comment."'";
		$result=$wpdb->query($addsql);
		//echo "<br>";
		///// Sen Mail ///
		}

		
	
		 $to="info@onlinerecruitersdirectory.com";
		 //$to="ajay@sakshiinfosys.com";
		 //$bcc="Mystina@webrecruitersdirectory.com";
		 //$bcc="info@webrecruitersdirectory.com";
	
	
		//$from=$Toemail;
		$from=$email;
		$subject="Request has been submitted by Hiring Manager.";
		$content="Dear Admin, <br>Please find Hiring Manager Details below including desired States and Sectors<br><br>
		<B>Name: </B>".$CandidateName."<BR>";
		$content.="<B>Email :</B><a href='mailto:".$email."'>".$email."</a><BR>";
		$content.="<B>Company :</B>".$company."<BR>";
		$content.="<B>Phone Number :</B>".$phone."<BR>";		
		$content.="<B>State :</B>".$stateName."<BR>";
		$content.="<B>Category :</B>".$catName."<BR>";
		//echo $content;
		
		$mail_patterns = array();
		$mail_patterns[0] = '/\n/';
		$mail_replacements = array();
		$mail_replacements[0] = '<BR>';
	   $content.="<B>Comment :</B>".stripslashes(preg_replace($mail_patterns, $mail_replacements, $comment))."<BR>";
	//   SendHTMLMailBCC($to,$subject,$content,$from);
	    // SendHTMLMail1($to,$subject,$content,$from);
	   $_SESSION["RECURITERQUERY"] = $_SESSION['CATID'] = $_SESSION['STID'] = "";
		
	}
}
if($_POST['sendmail']==2)
{
	
	$CandidateName=$_POST['first_name'];
	$email=$_POST['Email'];
	$phone=$_POST['Phone'];
	$company=$_POST['Company'];
	$comment=$_POST['Comment'];
	$to="info@onlinerecruitersdirectory.com";
	//$to="ajay@sakshiinfosys.com";
	//$to="ashishjoshi44@gmail.com";
	$from=$email;
	$subject="Request for recruiter";
	$mailcontent="<font face=\"Verdana, Arial, Helvetica, sans-serif\" size=\"2\">";
	$mailcontent.="Dear Admin,<br><Br>There is a request for recruiter, details of request are stated below:<br><Br>";
	$mailcontent.="Company Name: ".$company."<br>";
	$mailcontent.="Contact Name: ".$CandidateName."<br>";
	$mailcontent.="Phone: ".$phone."<br>";
	$mailcontent.="Email: ".$email."<br>";
	//$mailcontent.="Request: ".ereg_replace("\n","<br>",$request)."<br>";
	
	$patterns = array();
	$patterns[0] = '/\n/';
	$replacements = array();
	$replacements[0] = '<br>';
	$mailcontent.="Request: ".preg_replace($patterns, $replacements, $comment)."<br>";
	$mailcontent.="</font>";	
	//SendHTMLMail1($to,$subject,$mailcontent,$from);	
	SendHTMLMailBCC($to,$subject,$mailcontent,$from);		
	//  SendHTMLMail1($to,$subject,$content,$from);
	
	
}

?>
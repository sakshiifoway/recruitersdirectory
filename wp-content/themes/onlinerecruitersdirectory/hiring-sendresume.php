<?php
/**
 * Template Name: Hiring Send Resume
*/

get_header(); 

//print_r($_SESSION);
$query=$_SESSION["RECURITERQUERY"];
$ses_result = $wpdb->get_results($sql);
$totalrows=0;
$totalrows = count($ses_result);
//echo "COUNT ===> ".$totalrows."</br>";


while ( have_posts() ) : the_post();
	
?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
<!-- #primary -->
	<section class="inner_page" style="padding-bottom:10px;">
	<div class="container">
    <ul class="breadcrum">
    	<li><a href="<?php echo bloginfo('home');?>/">Home </a>&rarr;</li>
        <li>Hiring Managers</li>
    </ul>
    	<h1><?php //the_title();?>Hiring Manager Services</h1>    	
    </div>
    <div class="container"><div class="inner_page_content HiringManager_UL"><p><?php the_content();?></p></div></div>
</section>
<!--- Inner End --->



<section>
	<div class="container">
      <form name="sendresume"  id="sendresume" action="https://www.salesforce.com/asdservlet/servlet.WebToLead?encoding=UTF-8" method="post">
        <input type=hidden name="oid" value="00D700000008MxZ">
        <input type=hidden name="retURL" value="http://www.onlinerecruitersdirectory.com/thank-you-hiring-recommendations.php">
        <!-- Ord Visitor ID:  -->
        <input type="hidden" id="00N70000003XXvr" maxlength="50" name="00N70000003XXvr" size="20" value="1234"/>
        <!-- Ord Source  -->
        <input type="hidden" id="ORD_Source__c" maxlength="50" name="ORD_Source__c" size="20" value="<?php if($_REQUEST['utm_source']!=''){ echo $_REQUEST['utm_source']; }  ?>" />
        <!-- Ord Medium:  -->
        <input type="hidden" id="00N70000003XXvw" maxlength="50" name="00N70000003XXvw" size="20" value="<?php if($_REQUEST['utm_medium']!= ''){ echo $_REQUEST['utm_medium'];  }  ?>"/>
        <!-- Ord Term:  -->
        <input  type="hidden" id="00N70000003XXw6" maxlength="50" name="00N70000003XXw6" size="20" value="<?php if($_REQUEST['utm_term']!=''){  echo $_REQUEST['utm_term']; }  ?>" />
        <!-- Ord Content:  -->
        <input type="hidden"  id="00N70000003XXwB" name="00N70000003XXwB" wrap="soft" value="Dummy Content">
        <!-- Ord Campaign: -->
        <input type="hidden" id="00N70000003XXw1" maxlength="80" name="00N70000003XXw1" size="20" value="<?php if($_REQUEST['utm_campaign']!= ''){  echo $_REQUEST['utm_campaign'];  } ?>" />
        <!-- Ord count of sessions:-->
        <input type="hidden" id="00N70000003XXwG" maxlength="5" name="00N70000003XXwG" size="20" value="222"  />
        <!-- Ord count of pageviews:  -->
        <input type="hidden" id="00N70000003XXwL" maxlength="25" name="00N70000003XXwL" size="20" value="333" />
        <!-- Ord count of pageviews:  <input type="hidden" id="ORD_Source__c" maxlength="25" name="ORD_Source__c" size="20" value="ORD-SOURCE" /> -->
    	<div class="search-center">
        	<div class="search-full">
            	<!--<h6>Add your information and comments Contact with Wireless</h6>-->
            	<div class="step3-infor-contanct">
                	<ul>
                    	<li><input placeholder="* Name"  id="first_name" name="first_name" type="text" /> <input type="hidden" name="last_name" id="last_name" value="LNAME" /></li>
                        <li><input type="text" placeholder="Phone" id="phone" name="phone"></li>
                        <li><input type="text" placeholder="* Email" id="email" name="email"></li>
                        <li><input type="text" placeholder="Company" id="company" name="company"></li>                       
                        <li class="full-width"><textarea id="00N70000003XZif" name="00N70000003XZif" placeholder="* Comments" class="comment_box"></textarea></li>
                    </ul>
                </div>
            </div>            
        </div>
        <div class="chang-step-part">
        	<div class="prev-step"><i class="fa  fa-long-arrow-left"></i><input name="" type="button" value="Back" onClick="window.location='<?php bloginfo('home'); ?>/hiring_manager/'"></div>
        	<div class="next-step"><input type="submit" name="submit" id="submit" value="Next" onClick="return checkForm();"><i class="fa fa-long-arrow-right pad-0"></i></div>
        </div>
         <input type="hidden" name="hidn" value="1">			
        </form>
    </div>
</section>


<?php endwhile; ?>
<script type="text/javascript">
/*if(source!= undefined && source != '')
document.getElementById("ORD_Source__c").value = source;

if(medium!= undefined &&  medium!='')
document.getElementById("00N70000003XXvw").value = medium;

if(term!= undefined && term!='')
document.getElementById("00N70000003XXw6").value = term;

if(campaign!= undefined && campaign!='')
document.getElementById("00N70000003XXw1").value = campaign;*/

function checkForm()
{
	//alert('asd');
	var err="";
//	var errflg = true;
	
	var firstname= document.getElementById("first_name").value;
	var email= document.getElementById("email").value;
	var phone= document.getElementById("phone").value;
	var company= document.getElementById("company").value;
	var comment=document.getElementById("00N70000003XZif").value;
		
	if(firstname == "")
	{
		err+="Please Enter Name.\n";
	//	errflg = false;
	}
	if(email=="")
	{
		err+="Please Enter Email.\n";
		//errflg = false;
	}	
	if(email!="" && (email.indexOf('@',0) == -1 || email.indexOf('.',0) == -1))
	{
	   err+="Email address seems incorrect (check @ and .'s)";
	   errflg = false;
	}else{}
	if(company=="")
	{
		err+="Please Add Comments.\n";
		errflg = false;
	}
	//alert(err);
	if(err != ""){
		alert(err);
		return false;
	}
	else
	{
		//alert('<?php echo get_template_directory_uri();?>');		
		$.ajax({
		url: "<?php echo get_template_directory_uri();?>/sendmail_sendresume.php",
		cache: false,
		type: "POST",
		data: {first_name :firstname,Email:email,Phone:phone,Company:company,Comment:comment,sendmail:1},
		dataType: "html",
		success: function(html){
		//alert(html);
		//	document.sendresume.Submit1.value="1";
		//overlay();
	//	document.sendresume.submit();
		//return true;
	// $("#results").append(html);
	
		document.sendresume.Submit1.value="1";
		$('#sendresume').submit();
		overlay();
		
  }
});
return false;
}
	
}
function ajaxfun()
{
	return 1;
}

function aSubmit(){
 var form = document.forms[0];
  if (form.onsubmit) {
    var result = form.onsubmit.call(form);
  }
  if (result !== false) {
    form.submit();
  }
}
</script>
<?php get_footer();








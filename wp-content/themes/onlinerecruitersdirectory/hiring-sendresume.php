<?php
/**
 * Template Name: Hiring Send Resume
*/

get_header(); 

print_r($_SESSION);
$query=$_SESSION["RECURITERQUERY"];
$ses_result = $wpdb->get_results($sql);
$totalrows=0;
$totalrows = count($ses_result);
//echo "COUNT ===> ".$totalrows."</br>";


while ( have_posts() ) : the_post();
	
?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
<!-- #primary -->

<div class="center">
  <div class="pattern_bg">
    <div class="center">
      <h1>
        <?php the_title(); ?>
      </h1>
      <!--   <form name="sendresume" action="https://www.salesforce.com/servlet/servlet.WebToLead?encoding=UTF-8" method="post" onsubmit="return chk();"> -->
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
        
        <div class="sepret_inr">
          <div class="step_one">
            <div class="step_form">
              <div class="form_title" style="font-size:24px;">
                <?php the_content();?>
                </span></div>
              <div class="from_prt">
                <div class="form_fl">
                  <div class="form_full">
                    <input type="text" value="" placeholder="Name" id="first_name" name="first_name" class="ipt_step">
                    <input type="hidden" name="last_name" id="last_name" value="LNAME" />
                  </div>
                </div>
                <div class="form_fl">
                  <div class="form_full">
                    <input type="text" value="" placeholder="Phone" id="phone" name="phone" class="ipt_step">
                  </div>
                </div>
                <div class="form_fl" style="margin:0;">
                  <div class="form_full">
                    <input type="text" value="" placeholder="Company" id="company" name="company" class="ipt_step">
                  </div>
                </div>
                <div class="form_fl">
                  <div class="form_full">
                    <input type="text" value="" placeholder="Email" id="email" name="email" class="ipt_step">
                  </div>
                </div>
                <div class="msg_boxstep">
                  <textarea  id="00N70000003XZif" name="00N70000003XZif" rows="3" type="text" style="height:30px;" wrap="soft" placeholder="Comments" class="comment_box"></textarea>
                </div>
              </div>
            </div>
          </div>
          <!--<div class="back"><a href="hiring_manager.php">Back</a></div>-->
          
          <input type="hidden" name="Submit1" value="1">
          <input type="hidden" name="type" value="Company" />
          <div class="step_nextprt">
            <div class="next"> 
              <!--  <input type="submit" name="submit" value="I want a Free Consultation"/> -->
              <input type="submit" name="SUBMIT" id="btn_submit"  style="text-align:center" onclick="return checkForm();" value="Continue"/>
              <Br>
              <!-- <a href="javascript:;" onclick="aSubmit();">I want a Free Consultation</a> --> 
              
            </div>
            <!-- <a href="#" class="start_search">Start new search</a> --> 
            
          </div>
        </div>
      </form>
      <div class="why-trust">
        <h2>Why use our services?</h2>
        <div class="box">
          <div class="points">Database of over 10,000 recruitment firms</div>
          <div class="points">Assisted over 15,000 HR managers</div>
          <div class="partners"> <img src="images/partner_1.jpg" alt=""/><img src="images/partner_2.jpg" alt=""/><img src="images/partner_3.jpg" alt=""/><img src="images/partner_4.jpg" alt=""/><img src="images/partner_5.jpg" alt=""/><img src="images/partner_6.jpg" alt=""/><img src="images/partner_7.jpg" alt=""/><img src="images/partner_8.jpg" alt=""/> </div>
        </div>
      </div>
      <div class="chat-call2"><a href="javascript:$zopim.livechat.window.show()"><img src="images/online_chat.png" alt=""/></a> 
        <!-- <a href="#"><img src="images/click-to-call.png" alt=""/></a> --> <a href="#"><img src="images/dia-now2.png" alt=""/></a></div>
    </div>
  </div>
</div>
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
	/*if(email.indexOf('@',0) == -1 || email.indexOf('.',0) == -1)
	{
	   err+="Email address seems incorrect (check @ and .'s)";
	   errflg = false;
	}else{}*/
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








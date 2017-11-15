<?php
/**
 * Template Name: Post a request for a recruiter
*/
get_header(); while ( have_posts() ) : the_post();  ?>


<!--- Inner Start --->
<section class="inner_page" style="padding-bottom:0px;">
	<div class="container">
        <ul class="breadcrum">
            <li><a href="<?php bloginfo( 'home' ); ?>/">Home </a>&rarr;</li>
            <li><?php the_title(); ?></li>
        </ul>
    	<h1><?php the_title(); ?></h1>
        
    </div>
   <div class="container"><div class="inner_page_content HiringManager_UL"><p><?php the_content();?></p></div></div>
</section>

<section>

	<div class="container">
    
       <form name="form1" id="form1" action="https://www.salesforce.com/asdservlet/servlet.WebToLead?encoding=UTF-8" method="post" >
                
       <input type="hidden" name="last_name" id="last_name" value="LNAME" />
                 <input type=hidden name="oid" value="00D700000008MxZ">
		<input type=hidden name="retURL" value="http://www.onlinerecruitersdirectory.com/thank-you-hiring-recommendations.php">
       <!-- Ord Visitor ID:  --> <input type="hidden" id="00N70000003XXvr" maxlength="50" name="00N70000003XXvr" size="20" value="1234"/>
		<!-- Ord Source  --> <input type="hidden" id="ORD_Source__c" maxlength="50" name="ORD_Source__c" size="20" value="<?php if($_REQUEST['utm_source']!=''){ echo $_REQUEST['utm_source']; }?>" />
		<!-- Ord Medium:  --> <input type="hidden" id="00N70000003XXvw" maxlength="50" name="00N70000003XXvw" size="20" value="<?php if($_REQUEST['utm_medium']!= ''){ echo $_REQUEST['utm_medium']; }  ?>"/>
		<!-- Ord Term:  --> <input  type="hidden" id="00N70000003XXw6" maxlength="50" name="00N70000003XXw6" size="20" value="<?php if($_REQUEST['utm_term']!= ''){ echo $_REQUEST['utm_term']; } ?>" />
		<!-- Ord Content:  --> <input type="hidden"  id="00N70000003XXwB" name="00N70000003XXwB" wrap="soft" value="Dummy Content">
		<!-- Ord Campaign: --> <input type="hidden" id="00N70000003XXw1" maxlength="80" name="00N70000003XXw1" size="20" value="<?php if($_REQUEST['utm_campaign']!=''){ echo $_REQUEST['utm_campaign'];  }?>" />
		<!-- Ord count of sessions:--> <input type="hidden" id="00N70000003XXwG" maxlength="5" name="00N70000003XXwG" size="20" value="222"  />
		<!-- Ord count of pageviews:  --> <input type="hidden" id="00N70000003XXwL" maxlength="25" name="00N70000003XXwL" size="20" value="333" />
        <!-- Ord count of pageviews:  <input type="hidden" id="ORD_Source__c" maxlength="25" name="ORD_Source__c" size="20" value="ORD-SOURCE" /> -->
        
    	<div class="search-center">
        	<div class="search-full">
            	<!--<h6>Add your information and comments Contact with Wireless</h6>-->
            	<div class="step3-infor-contanct">
                	<ul>
                    	
                       <li><input type="text" placeholder="* Company" id="company" name="company"></li>  
                        <li><input type="text" placeholder="Phone" id="phone" name="phone"></li>
                       <li><input placeholder="* Name"  id="first_name" name="first_name" type="text" /> <input type="hidden" name="last_name" id="last_name" value="LNAME" /></li>
                        <li><input type="text" placeholder="* Email" id="email" name="email"></li>
                                             
                        <li class="full-width"><textarea name="00N70000003XZif" id="00N70000003XZif"placeholder="* Comments" class="comment_box"></textarea></li>
                    </ul>
                </div>
            </div>            
        </div>
        <div class="chang-step-part">
        	<div class="next-step">
            <input type="submit" name="submit" id="submit" value="Send" onClick="return checkForm();"><i class="fa fa-long-arrow-right pad-0"></i></div>
        </div>
         <input type="hidden" name="hidn" value="1">			
        </form>
    </div>
</section>
<?php endwhile;?>
<script>
function checkForm()
{
	//alert('asd');
	var err="";
//	var errflg = true;
	
	var firstname= document.getElementById("first_name").value;
	var email= document.getElementById("email").value;
	var company= document.getElementById("company").value;
	var comment=document.getElementById("00N70000003XZif").value;
	//alert(firstname);	
	if(company=="")
	{
		err+="Please Enter Company Name.\n";
		//errflg = false;
	}	
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
	if(comment=="")
	{
		err+="Please Enter Comments.\n";
		//errflg = false;
	}	
	if(err == ""){return true;}else{alert(err);return false;}
}
</script>
<!--- Inner End --->

<?php get_footer();
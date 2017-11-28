<?php
/**
 * The front page template file
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 * Learn more: https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */
//print_r($_REQUEST); //exit;
get_header(); 
// echo get_the_ID();
$flds = get_fields(get_the_ID());
$bannerImg = $flds['home_banner_image'];
$bannerTxt = $flds['home_banner_text'];


$flds2 = get_fields(286);
//print_r($flds2); 

if($_REQUEST['hdn_conatct'] == "1")
{
	//$to="info@onlinerecruitersdirectors.com";
	$to = "priyanka@sakshiinfosys.com";
	$from=$_REQUEST['email'];
	$name = trim($_REQUEST['hcontact_name']);
	$email = trim($_REQUEST['email']);
	$phone = trim($_REQUEST['phone']);
	$complain_details = trim($_REQUEST['complain_details']);
	
	$subject="Hiring Manager ";
	
	$content="Hello Admin,<br /><br />
	You have received Details for Hiring Manager.
	<table>";
	 if(trim($complain_details)!="" && trim($complain_details)!="Company"){
	$content.="<tr><td>Company :</td><td>".stripslashes($complain_details)."</td></tr>";}
	 if(trim($phone)!="" && trim($phone)!="Phone"){
	$content.="<tr><td>Phone :</td><td>".stripslashes($phone)."</td></tr>";}
	$content.="<tr><td>Name :</td><td>".stripslashes($name)."</td></tr>";
	$content.="<tr><td>Email :</td><td>".stripslashes($email)."</td></tr>";
	$content.="<tr><td>Comments :</td><td>".stripslashes(nl2br($complain_details))."</td></tr>";
	$content.="</table>";
	//echo $content;
	//exit;
	SendHTMLMail($to,$subject,$content,$from);
	$contact_msg = "success";
	
//	header("Location:message.php?4");
}
$urlbasename=basename($_SERVER['PHP_SELF']);
 
/*	$latest_article=mysql_query("SELECT ar.title,ar.id,ac.parentid FROM article as ar,article_category as ac where ar.catid=ac.id order by id desc limit 0,2");
	while($query_latest_article=mysql_fetch_object($latest_article))
	{
		$latest_article_array[]=$query_latest_article;		
	}*/
		
?>
<!--- Banner Start --->
<?php if($_REQUEST["opt"]=="success")
{
	echo "<a class='fancybox' href='thankyou.html'></a>"; ?>
<script type="text/javascript">
$(document).ready(function() {	
	$.fancybox.open({
		'width' : '90%',
		'height' : '95%',
		'maxWidth' : '90%',
		'maxHeight' : '95%',
		'autoScale' : true,
		'transitionIn' : 'none',
		'transitionOut' : 'none',
		'type' : 'iframe', 
		'href' : '<?php echo bloginfo('home'); ?>/newsletter-subscribed-successfully.php'
	});

});
history.pushState('', document.title, '<?php echo bloginfo('home'); ?>');
</script>
<style type="text/css">
.fancybox-custom .fancybox-skin {
	box-shadow: 0 0 50px #222;
}
</style>
<?php }?>
<div class="main-banner">
<img src="<?php echo $bannerImg;?>"/>
<div class="banner-caption">
<div class="container">
  <div class="caption-inner"> <?php echo $bannerTxt;?> </div>
</div>
<div class="search-part">
<div class="container">
<div class="caption-inner">
<div class="search-title">Search for a Recruiting firm</div>
<div class="search-form">
<form name="Header_srch" id="Header_srch" method="post" action="">
<ul>
  <li>
    <div class="select-fildset">
      <select name="sid" id="sid">
        <option value="">STATE</option>
        <?php $hdr_states = $wpdb->get_results("SELECT * from state order by name ASC");				
				foreach ($hdr_states as $hdr_st) {  ?>
        <option value="<?php echo $hdr_st->id;?>"><?php echo trim(stripslashes($hdr_st->name)); ?></option>
        <?php } ?>
      </select>
    </div>
  </li>
  <li>
    <div class="select-fildset">
      <select name="cid" id="cid">
        <option value="">SECTOR</option>
        <?php $hdr_cat = $wpdb->get_results("SELECT * from category order by categoryname ASC");				
				foreach ($hdr_cat as $hdr_ct) {  ?>
        <option value="<?php echo $hdr_ct->categoryid;?>"><?php echo trim(stripslashes($hdr_ct->categoryname)); ?></option>
        <?php } ?>
      </select>
    </div>
  </li>
  <li>
    <div class="checkbox-part">
      <div class="hiring-manager-check">
        <div class="control-group">
          <label class="control control--checkbox">
          <img src="<?php echo get_template_directory_uri(); ?>/images/hiring-manager-checkicon.png"/>I'M A HIRING MANAGER
          <input type="radio" name="hdr_srch_type" id="hdr_srch_type" value="Manager" checked="checked" onClick="valAdd('hiring_manager');"/>
          <div class="control__indicator"></div>
          </label>
        </div>
      </div>
      <div class="job-seeker-check">
        <div class="control-group">
          <label class="control control--checkbox">
          <img src="<?php echo get_template_directory_uri(); ?>/images/job-seeker-checkicon.png"/>I'M A JOB SEEKER
          <input type="radio" name="hdr_srch_type" id="hdr_srch_type" value="job-seeker" onClick="valAdd('job_seeker');"/>
          <div class="control__indicator"></div>
          </label>
        </div>
      </div>
    </div>
  </li>
  <li>
    <input type="hidden" name="valaddvalue" id="valaddvalue" value="hiring_manager" />
    <button value="Go" id="HeaderGo" >Go<img src="<?php echo get_template_directory_uri(); ?>/images/go-arrow.png"/></button>
  </li>
</ul>
</button>
</div>
</div>
</div>
</div>
</div>
</div>
<!--- Banner End ---> 

<!--- Section Start --->
<section class="testimonial-main">
  <div class="container">
    <div class="testimonial-inner">
      <ul>
        <li><a class="database" href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/right-arrow.png"/><?php echo strip_tags($flds2['wtu_line_1'],'<span>');?></a></li>
        <li><?php echo strip_tags($flds2['wtu_line_3'],'<span>');?></li>
        <li><?php echo strip_tags($flds2['wtu_line_4'],'<span>');?></li>
        <li><?php echo strip_tags($flds2['wtu_line_5'],'<span>');?></li>
        <li><a class="assisted" href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/right-arrow.png"/><?php echo $flds2['wtu_line_2'];?></a></li>
      </ul>
    </div>
  </div>
</section>
<section>
  <div class="container">
    <div class="coman-inner">
      <div class="other-logo">
        <ul>
          <?php $args = array( 'post_type' => 'partnerlogo', 'posts_per_page' => 40,'orderby'   => 'menu_order','order' => 'DESC' );
				$loop = new WP_Query( $args );
				while ( $loop->have_posts() ) : $loop->the_post();				
				?>
          <li><img src="<?php echo get_the_post_thumbnail_url($post->ID);?>" /></li>
          <?php endwhile; ?>
        </ul>
      </div>
    </div>
  </div>
</section>
<section>
  <div class="container">
    <div class="articles-main">
      <ul>
        <li>
          <div  class="recruiters">
            <?php 
						$recent_posts = wp_get_recent_posts(array(
							'cat' => 98, // Number of recent posts thumbnails to display
							'post_status' => 'publish' // Show only the published posts
						)); ?>
            <h3><?php echo get_title_by_id($recent_posts[0]['ID'],5);//echo $recent_posts[0]['post_title'];?> </h3>
            <p><?php echo get_excerpt_by_id($recent_posts[0]['ID'],10); //echo get_excerpt($recent_posts[0]['ID']); ?>
              <?php //echo get_the_excerpt($recent_posts[0]['ID']);?>
            </p>
            <div class="name-btn"> 
              <!-- <div class="name">By Elaine Boylan </div>--> 
              <a href="<?php echo get_permalink($recent_posts[0]['ID']);?>" class="button">Read more</a> </div>
          </div>
        </li>
        <li>
          <div class="h-manager">
            <h3 class="title"><span class="icon"></span>I'M A HIRING MANAGER</h3>
            <ul>
              <li><a href="<?php bloginfo( 'home' ); ?>/post_request_for_recruiter/">Post a request for a Recruiter <span></span></a></li>
              <li><a href="<?php bloginfo( 'home' ); ?>/tips_effectiveness_resume/">Effectiveness Resume Screening <span></span></a></li>
              <li><a href="<?php bloginfo( 'home' ); ?>/your_service/">At your service -<br>
                recommandation on the best firms for you <span></span></a></li>
            </ul>
          </div>
        </li>
        <li>
          <div class="job-seaker">
            <h3 class="title"><span class="icon"></span>I'M A HIRING MANAGER</h3>
            <ul>
              <li><a href="<?php bloginfo( 'home' ); ?>/executive_job_seekers/">Executive $100K job seekers<span></span></a></li>
              <li><a href="<?php bloginfo( 'home' ); ?>/free_review/">Free review of your resume<span></span></a></li>
              <li><a href="<?php bloginfo( 'home' ); ?>/our_recommendations/">Job Boards & Recruiting services<span></span></a></li>
            </ul>
          </div>
        </li>
        <li>
          <div  class="recruiters">
            <h3><?php echo get_title_by_id($recent_posts[1]['ID'],5); //echo $recent_posts[1]['post_title'];?> </h3>
            <p><?php echo get_excerpt_by_id($recent_posts[1]['ID'],15);?></p>
            <div class="name-btn"> 
              <!-- <div class="name">By Elaine Boylan </div>--> 
              <a href="<?php echo get_permalink($recent_posts[1]['ID']);?>" class="button">Read more</a> </div>
          </div>
        </li>
      </ul>
    </div>
  </div>
</section>
<?php // print_r($recent_posts); ?>
<section class="map-main">
  <div class="container">
    <div class="col-sm-1 fl">
      <div class="map-main-part">
        <h2>Select a state</h2>
        <h5>where you’d like to find<br>
          an executive recruiters/head hunters search firm</h5>
        <div class="map_main">
          <ul>
            <?php 
                            $state_query = $wpdb->get_results("SELECT * from state where map_slug != '' order by name ASC");
                            foreach ($state_query as $state_query_new) {
                        ?>
            <li class="<?php echo trim(stripslashes($state_query_new->map_slug)); ?>" onClick="return show_maptooltip('<?php echo trim(stripslashes($state_query_new->map_slug)); ?>');">
              <div class="map-tooltip" id="map_tooltipID_<?php echo trim(stripslashes($state_query_new->map_slug)); ?>" style="display:none">
                <div class="tooltip-inner">
                  <div class="pop_title"> <strong><?php echo trim(stripslashes($state_query_new->name)); ?></strong>
                    <p>Search for recuiting agency. executive recuiters or headhunters</p>
                  </div>
                  <?php /*?><a class="btn_hir" href="<?php echo home_url(); ?>/hiring_manager/?sid=<?php echo $state_query_new->id; ?>&location=<?php echo $state_query_new->state_alias; ?>">Hiring manager1</a>
                                  	<a class="btn_hir" href="<?php echo home_url(); ?>/job_seeker/?sid=<?php echo $state_query_new->id; ?>&location=<?php echo $state_query_new->state_alias; ?>">Job seeker1</a><?php */?>
                  <a class="btn_hir" href="<?php echo home_url(); ?>/hiring_manager/?sid=<?php echo $state_query_new->id; ?>&location=<?php echo trim(stripslashes($state_query_new->state_alias)); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/hiring-manager-checkicon.png" alt="">Hiring manager</a> <a class="btn_job fr" href="<?php echo home_url(); ?>/job_seeker/?sid=<?php echo $state_query_new->id; ?>&location=<?php echo trim(stripslashes($state_query_new->state_alias)); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/job-seeker-checkicon.png" alt="">Job seeker</a> </div>
              </div>
            </li>
            <?php } ?>
          </ul>
        </div>
      </div>
    </div>
    <div class="col-sm-2 fr">
      <div class="find-sector-part">
        <h5>Find a Headhunter or a Recruiter by Sector</h5>
        <div class="find-sector">
          <?php $Sector_query = $wpdb->get_results("SELECT * from category order by categoryname ASC"); ?>
          <select name="sector_dropdown" id="sector_dropdown" onChange="return redirectToJobSeeker(this.value);">
            <option value="">SELECT SECTOR</option>
            <?php if(count($Sector_query)>0) {
                                foreach ($Sector_query as $Sector_query_new) { ?>
            <option value="<?php echo home_url(); ?>/job_seeker/?cid=<?php echo $Sector_query_new->categoryid; ?>&sector=<?php echo trim(stripslashes($Sector_query_new->category_slug)); ?>"><?php echo trim(stripslashes($Sector_query_new->categoryname)); ?></option>
            <?php } } ?>
          </select>
        </div>
        <div class="find-character-part">
          <div class="alfabet-character">
            <ul>
              <?php $alphabet_array = array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z');
                                foreach($alphabet_array as $alphabet_array_new)
                                {
                                    if($alphabet_array_new == 'a') { $alpha_selcls = "active"; } else { $alpha_selcls = ""; }
                            ?>
              <li class="alphabet_li <?php echo $alpha_selcls; ?>" id="alfabet-character-li-<?php echo $alphabet_array_new; ?>"><a onClick="return display_sectors('<?php echo $alphabet_array_new; ?>','<?php echo get_template_directory_uri(); ?>');"><?php echo $alphabet_array_new; ?></a></li>
              <?php } ?>
            </ul>
          </div>
          <div class="sector-list">
            <ul id="sector_data">
              <?php $cval = 'a'; //echo "SELECT * from category where categoryname LIKE '$cval%' order by categoryname ASC";
                            $Sector_listquery = $wpdb->get_results("SELECT * from category where categoryname LIKE '$cval%' order by categoryname ASC"); ?>
              <?php if(count($Sector_listquery)>0) {
                                    foreach ($Sector_listquery as $Sector_listquery_new) { ?>
              <li><a><?php echo trim(stripslashes($Sector_listquery_new->categoryname)); ?></a>
                <div class="tooltip-main">
                  <div class="tooltip-inner">
                    <div class="pop_title"> <strong><?php echo trim(stripslashes($Sector_listquery_new->categoryname)); ?></strong>
                      <p>Search for recruiting agency, executive recruiters or headhunters </p>
                    </div>
                    <a class="btn_hir" onClick="window.location='<?php echo home_url(); ?>/hiring_manager/?cid=<?php echo $Sector_listquery_new->categoryid; ?>&sector=<?php echo trim(stripslashes($Sector_listquery_new->category_slug)); ?>'"><img src="<?php echo get_template_directory_uri(); ?>/images/hiring-manager-checkicon.png" alt="">Hiring manager</a> <a class="btn_job fr" onClick="window.location='<?php echo home_url(); ?>/job_seeker/?cid=<?php echo $Sector_listquery_new->categoryid; ?>&sector=<?php echo trim(stripslashes($Sector_listquery_new->category_slug)); ?>'"><img src="<?php echo get_template_directory_uri(); ?>/images/job-seeker-checkicon.png" alt="">Job seeker</a> </div>
                </div>
              </li>
              <?php } } ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php $flds3 = get_fields(227);
$flds4 = get_fields(208); ?>
<section class="hiri-manager-main">
<div class="mngr_left"> <img src="<?php echo $flds3['home_section_image'];?>" alt="">
  <div class="mngr_left_cont"> <span><?php echo $flds3['home_section_title'];?></span>
    <p><?php echo $flds3['home_section_content'];?></p>
    <a class="rd_more" href="<?php echo get_the_permalink(227);?>">Read More</a> </div>
</div>
<div class="mngr_mid">
<div class="tp_title">
  <h2>Hiring manager</h2>
  <p>Professional recruiter recommendations based on your needs - at no charge to you!</p>
</div>
<div class="frm_line">Get started by filling out the contact form below. We’ll follow up with you the same business day.</div>
<div class="mngr_form">
<form name="homeContactFrm" id="homeContactFrm" method="post">
  <div class="fr_fild">
    <input type="text" class="input_fld" name="hcontact_name" id="hcontact_name" placeholder="NAME*" >
  </div>
  <div class="fr_fild">
    <input type="text" class="input_fld" name="phone" id="phone" placeholder="PHONE" >
  </div>
  <div class="fr_fild">
    <input type="text" class="input_fld" name="email" id="email" placeholder="EMAIL*" >
  </div>
  <div class="fr_fild">
    <textarea name="complain_details" id="complain_details" placeholder="YOUR MESSAGE*"></textarea>
  </div>
  <br clear="all">
  <center>
    <input type="hidden" name="hdn_conatct" id="hdn_conatct" value="1" />
    <input name="submit_contact" class="btn_cont" value="Contact Now" type="submit" onClick="return CheckHomeContact();" />
  </center>
</form>
</div>
</div>
<?php  // $base = dirname(__FILE__); include($base."/constantcontact/addOrUpdateContactIndex.php");?>
<div class="mngr_left mngr_bdr"> <img src="<?php echo $flds4['home_section_image'];?>" alt="">
  <div class="mngr_left_cont"> <span><?php echo $flds4['home_section_title'];?></span>
    <p><?php echo $flds4['home_section_content'];?></p>
    <a class="rd_more" href="<?php echo get_the_permalink(208);?>">Read More</a> </div>
</div>
</section>
<!--- Section End ---> 

<script>
function valAdd(val){
	$("#valaddvalue").val(val);
}

$('#HeaderGo').click(function(){
	var valnew = $("#valaddvalue").val();
	if(valnew == "Manager"){ 
	   $('#Header_srch').attr('action', '<?php echo bloginfo('home');?>/'+valnew+'.php');		   
	}else{
		$('#Header_srch').attr('action', '<?php echo bloginfo('home');?>/'+valnew+'.php');		   
	}
});

function show_maptooltip(id)
{
	$("#map_tooltipID_"+id).show();
}

function ClickOutsideCheck(e)
{
	var el = e.target;
	var popup = $('.map-tooltip:visible')[0];
	if(popup==undefined) return true;
	
	while (true){
		if (el == popup ) {
		  	return true;
		} else if (el == document) {
		  	$('.map-tooltip:visible').attr('style','display:none');
		  	return false;
		} else {
		  	el = $(el).parent()[0];
		}
	}
};

$(document).bind('mousedown.popup', ClickOutsideCheck);
$(document).bind('mouseover', ClickOutsideCheck);

function redirectToJobSeeker(val)
{
	window.location=val;
}

function display_sectors(cval,path)
{
	$.ajax({
		type: "POST",
		url: path+"/ajax_sector_list.php",
		data: "cval="+cval,
		dataType: '',
		async: true,
		success:function(data){
			$(".alphabet_li").removeClass('active');
			$("#alfabet-character-li-"+cval).addClass('active');
			$("#sector_data").html(data);
		}
	});	
}
</script>
<?php get_footer();

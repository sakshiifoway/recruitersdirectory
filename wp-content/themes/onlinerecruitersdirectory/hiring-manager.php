<?php
/**
 * Template Name: Hiring Manager
*/

get_header(); 
$srchlocation = $_REQUEST['location'];
$sector = $_REQUEST['sector'];

$sid = $_REQUEST['sid'];
$cid = $_REQUEST['cid'];

global $wpdb;
if($_REQUEST['hid1'] == "1"){
	
	if(count($_REQUEST['state'])==0 && count($_REQUEST['category'])==0){
		echo "<script>window.location='".home_url()."/hiring_manager/'</script>"; $_SESSION['SESSION_MSG'] = "not-selected"; exit;
		
	}


	$qryadd = "";
	
	if(count($_REQUEST['category'])>0){$category = implode(',',$_REQUEST['category']);}
	if(count($_REQUEST['state'])>0){$state = implode(',',$_REQUEST['state']);}
	$_SESSION['STID'] = $_REQUEST['state'];
	$_SESSION['CATID'] = $_REQUEST['category'];
	
	//$sql = "select * from recruiter where aprove='YES' and (state like '5' or state like '%,5' or state like '5,%' or state like '%,5,%' ) and (category like '8' or category like '%,8' or category like '8,%' or category like '%,8,%' ) order by rank";<br />
	if(count($_REQUEST['state'])>0){
		$state_qry.= " and (";
		foreach($_REQUEST['state'] as $st){
			$state_qry.=" FIND_IN_SET('".$st."', state) OR";		
		} 
		$state_qry =substr($state_qry,0,-2);
		$state_qry.= " ) ";
	}
	
	if(count($_REQUEST['category'])>0){
		$cat_qry.= " and (";
		foreach($_REQUEST['category'] as $cat){
			$cat_qry.=" FIND_IN_SET('".$cat."', category) OR";		
		} 
		$cat_qry =substr($cat_qry,0,-2);
		$cat_qry.= " ) ";
	}
	
	$sql = "SELECT * FROM recruiter 
	WHERE aprove='YES' $state_qry $cat_qry";
	$squery.=" order by rank";
    $_SESSION["RECURITERQUERY"]=$sql.$squery;
	
	$wpdb->get_results($sql);
	echo $_SESSION["RECURITERQUERY"];
	//echo  $_SESSION["RECURITERQUERY"];exit;
	echo "<script>window.location='".home_url()."/hiring_sendresume/'</script>";
	//wp_redirect("".$SITE_URL."/"."hiring_sendresume/?location=".$_REQUEST['location']."&sector=".$_REQUEST['sector']."");
	exit;
}
?>

<!-- #primary -->
<?php if($_SESSION['SESSION_MSG'] == "not-selected"){?>

<h5 style="color:red;">Select Location and Sector to move further.</h5>
<? $_SESSION['SESSION_MSG'] = "";
} ?>
<div class="center">
  <form name="frmsearch" method="post" action="">
    <div class="select_list">
      <ul>
        <li>
          <div class="select_list_div">
            <ul>
              <?php														
				$categories = $wpdb->get_results("SELECT * from category order by categoryname ASC");
				
				foreach ($categories as $categories_new) { 
				//print_r($categories_new);
				?>
              <li>
                <input type="checkbox" name="category[]" id="category"  <?php if($cid == $categories_new->categoryid){echo "checked='checked'";}?>  value="<?php echo $categories_new->categoryid;?>" />
                &nbsp;&nbsp;<?php echo $categories_new->categoryname; ?></li>
              <?php
				}
			?>
            </ul>
            <ul>
              <?php														
				$states = $wpdb->get_results("SELECT * from state order by name ASC");
				
				foreach ($states as $states_new) { 
				//print_r($categories_new);
				?>
              <li>
                <input type="checkbox" name="state[]" id="state" <?php if($sid == $states_new->id){echo "checked='checked'";}?> value="<?php echo $states_new->id;?>" />
                &nbsp;&nbsp;<?php echo $states_new->name; ?></li>
              <?php
				}
			?>
            </ul>
          </div>
          <div class="select_text"><?php echo $cname;?></div>
        </li>
      </ul>
    </div>
    <input type="text" name="hid1" id="hid1" value="1" />
    <input type="submit" name="submit" id="submit" value="Find Recruitment Firms" />
  </form>
</div>
<?php get_footer();




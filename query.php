<?php

$con=mysql_connect("localhost","root","");
//$con=mysql_connect("localhost","sakshiin_amliteu","3sP{nLrtBpZ)");

//$con=mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }


mysql_select_db("onlinerecruitersdirectory");
//mysql_select_db("sakshiin_amlite");

//455*375       243-195
function validUrl($text) {
  $text = strtolower($text);
  $code_entities_match = array(' ', '--', '&quot;', '!', '@', '#', '$', '%', '^', '&', '*', '(', ')', '_', '+', '{', '}', '|', ':', '"', '<', '>', '?', '[', ']', '\\', ';', "'", ',', '.', '/', '*', '+', '~', '`', '=', '®');
  $code_entities_replace = array('-', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '-');
  $text = str_replace($code_entities_match, $code_entities_replace, $text);
  return $text;
 }
 	
	
	
function GetOneValue($tablenm,$fval,$nextval,$getval)
 {
  global $oASimple;
  $selst1 = "select * from ".$tablenm." where ".$fval." = '".$nextval."'";
  $rsql =  mysql_query($selst1)or die(mysql_error());
  $rows = mysql_fetch_array($rsql);
  $stnm = stripslashes($rows[$getval]);
  return str_replace("\xc2\xa0",' ',$stnm);
 }
 
 
 
echo "EXIT PAGE"; exit;	
 
 
 

$sel = "select * from article";
$exesel = mysql_query($sel)or die(mysql_error());
while($res=mysql_fetch_array($exesel))
{
	foreach ($res as $key => $val) {
		$$key = addslashes(trim($val)); 
	}
	$slug = validUrl($title);
	
	echo $insposts = "insert into wp_posts set 
	post_author = '1',
	post_date = '".$res['update_date']."',
	post_date_gmt =  '".$res['update_date']."',
	post_content = '".$article_details."',
	post_title = '".$title."',
	post_status = 'publish',
	post_name = '".$slug."',
	guid = '',
	post_type = 'post',
	comment_status = 'open',
	ping_status = 'post',
	post_mime_type = ''";
	$exe_posts = mysql_query($insposts)or die(mysql_error());
	$postid = mysql_insert_id();	
	
	echo "<br>";
	echo $inspostmeta9 = "insert into wp_term_relationships set 
	object_id = '".$postid."',
	term_taxonomy_id = '".$catid."'";
	$exe_postmeta9 = mysql_query($inspostmeta9)or die(mysql_error());
	echo "<br>";
	echo "<br>";	
}


exit;


$sel = "select * from category";
$exesel = mysql_query($sel)or die(mysql_error());
while($res=mysql_fetch_array($exesel))
{
	foreach ($res as $key => $val) {
		$$key = addslashes(trim($val)); 
	}
	
	$name = addslashes($res['categoryname']);
	$slug = validUrl($name);
		
	echo $insterm = "insert into wp_terms set 
	name = '".$name."',
	slug = '".$slug."',
	term_group = '0'";
	$exesela = mysql_query($insterm)or die(mysql_error());
	$termid = mysql_insert_id();	
	echo "<br>";
	echo $insterm = "insert into wp_term_taxonomy set 
	term_id = '".$termid."',
	taxonomy = 'category',
	description = '',parent = '0', count = '0'";
	$exeselb= mysql_query($insterm)or die(mysql_error());
	echo "<br>";echo "<br>";
}
exit;



echo $selq = "select * from amlite_postmeta where meta_key = 'wpcf-description' ";
$exeq = mysql_query($selq)or die(mysql_error());

while($res=mysql_fetch_array($exeq))
{
	$content= stripslashes($res['meta_value']);
	echo "<br>";
	echo $res['meta_value'];
	echo "<br><br>";
	
	$inspostmeta7 = "update amlite_postmeta set 
	meta_value = '".mysql_real_escape_string($content)."' where meta_id = '".$res['meta_id']."'";
	$exe_postmeta7 = mysql_query($inspostmeta7)or die(mysql_error());
	
}

$i=1;
while($res=mysql_fetch_array($exesel))
{
	foreach ($res as $key => $val) {
		$$key = addslashes(trim($val)); 
	}
	
	$typeid;
	$collectionid;
	$postdate = $date;
	$slug = validUrl($name);
	
	echo $itemid;echo "<br>";
	
	if($name != ""){
		$selcnt = "select * from amlite_posts where post_name = '".$slug."' and post_status = 'publish'";
		$execnt = mysql_query($selcnt)or die(mysql_error());
		$cntName = mysql_num_rows($execnt);
		if($cntName>=1){
			$slug = $slug."-".$itemid;
		}
		
		$imgguid = "http://com81/amlite/wp-content/uploads/2017/08/".$imagepath;
		$attachImg = "2017/08/".$imagepath;
		//$imageName = $name.
		echo "<br><b>Number == ".$i."</b><br>";echo "<br>";
		echo $insposts = "insert into amlite_posts set 
		post_author = '1',
		post_date = '".$postdate."',
		post_date_gmt = '".$postdate."',
		post_content = '',
		post_title = '".$name."',
		post_status = 'publish',
		post_name = '".$slug."',
		guid = '',
		post_type = 'product',
		post_mime_type = ''";
		$exe_posts = mysql_query($insposts)or die(mysql_error());
		$postid = mysql_insert_id();	
		
		$inspostsIMg = "insert into amlite_posts set 
		post_author = '1',
		post_date = '".$postdate."',
		post_date_gmt = '".$postdate."',
		post_content = '',
		post_title = '".$slug."',
		post_status = 'inherit',
		post_name = '".$slug."',
		guid = '".$imgguid."',
		post_type = 'attachment',
		post_mime_type = 'image/jpeg',
		post_parent= '".$postid."'";	
		$exe_postsImg = mysql_query($inspostsIMg)or die(mysql_error());
		$post_img_id = mysql_insert_id();	
		
		
		$inspostmeta = "insert into amlite_postmeta set 
		post_id = '".$postid."',
		meta_key = '_thumbnail_id',
		meta_value = '".$post_img_id."'";
		$exe_postmeta = mysql_query($inspostmeta)or die(mysql_error());
		
		$inspostmeta1 = "insert into amlite_postmeta set 
		post_id = '".$postid."',
		meta_key = 'wpcf-description',
		meta_value = '".addslashes($description)."'";
		$exe_postmeta1 = mysql_query($inspostmeta1)or die(mysql_error());
		
		$inspostmeta2 = "insert into amlite_postmeta set 
		post_id = '".$postid."',
		meta_key = 'wpcf-style',
		meta_value = '".$style."'";
		$exe_postmeta2 = mysql_query($inspostmeta2)or die(mysql_error());
		
		$inspostmeta3 = "insert into amlite_postmeta set 
		post_id = '".$postid."',
		meta_key = 'wpcf-finish',
		meta_value = '".$finish."'";
		$exe_postmeta3 = mysql_query($inspostmeta3)or die(mysql_error());
		
		$inspostmeta4 = "insert into amlite_postmeta set 
		post_id = '".$postid."',
		meta_key = 'wpcf-diameter',
		meta_value = '".$diameter."'";
		$exe_postmeta4 = mysql_query($inspostmeta4)or die(mysql_error());
		
		$inspostmeta5 = "insert into amlite_postmeta set 
		post_id = '".$postid."',
		meta_key = 'wpcf-height',
		meta_value = '".$height."'";
		$exe_postmeta5 = mysql_query($inspostmeta5)or die(mysql_error());
		
		$inspostmeta6 = "insert into amlite_postmeta set 
		post_id = '".$postid."',
		meta_key = 'wpcf-bulb',
		meta_value = '".$bulb."'";
		$exe_postmeta6 = mysql_query($inspostmeta6)or die(mysql_error());
		
		$inspostmeta7 = "insert into amlite_postmeta set 
		post_id = '".$post_img_id."',
		meta_key = '_wp_attached_file',
		meta_value = '".$attachImg."'";
		$exe_postmeta7 = mysql_query($inspostmeta7)or die(mysql_error());
		
		$inspostmeta8 = "insert into amlite_term_relationships set 
		object_id = '".$postid."',
		term_taxonomy_id = '".$wp_type_id."'";
		$exe_postmeta8 = mysql_query($inspostmeta8)or die(mysql_error());
		
		$inspostmeta9 = "insert into amlite_term_relationships set 
		object_id = '".$postid."',
		term_taxonomy_id = '".$wp_collection_id."'";
		$exe_postmeta9 = mysql_query($inspostmeta9)or die(mysql_error());
	}
	
	
	/*$typename = addslashes(GetOneValue("tbl_types","id",$typeid,"name"));
	$collectionname = addslashes(GetOneValue("tbl_collections","id",$collectionid,"category"));
	
	$wp_type_id = GetOneValue("amlite_terms","name",$typename,"term_id");
	$wp_collection_id = GetOneValue("amlite_terms","name",$collectionname,"term_id");
	
    $insterm = "update tbl_collection_items set wp_type_id = '".$wp_type_id."', wp_collection_id = '".$wp_collection_id."' where itemid = '".$itemid."' ";
	$exeselb= mysql_query($insterm)or die(mysql_error());*/
	
	
$i++;	
}

	
exit;
// Collection and Types category entries


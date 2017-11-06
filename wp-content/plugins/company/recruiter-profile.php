<?php    
	$id = $_REQUEST['rid'];
	
	$cid = $_REQUEST['cid'];
	if($cid != '')
	{
		$backurl = "admin.php?page=manage_company&flag=view_company&id=".$cid;
	}
	else
	{
		$backurl = "admin.php?page=manage_company";
	}
	
	if($id){$page_flag = "Edit";}else{$page_flag = "Add";} 
    
	 global $wpdb;
	 
	$sel_candidate = "SELECT * from recruiter where rid  = '".$id."'";
	$row_candidate = $wpdb->get_results($sel_candidate);	
	// echo $product_id;
	foreach ($row_candidate[0] as $key => $val) {
	   $$key = addslashes(trim($val)); 
	}
	
	$countryname=GetOneValue("country","id",$country,"name");
	$state_arr=explode(',',$state);
	$category_arr=explode(',',$category);
	$type_arr=explode(',',$type);
	//print_r($row_candidate);
	//echo $state;
	$tempDirPath = get_template_directory();
	$tempDirUri = get_template_directory_uri();
	
?>
<link type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/company/style-admin.css" rel="stylesheet" />
<script type='text/javascript' src='<?php echo WP_PLUGIN_URL; ?>/company/validation.js'></script>
<div class="wrap">
<div style="width:100%; float:left;">  
	<div style="width:80%; float:left;"><h1 class="wp-heading-inline">Recruiter Profile - <span style="color:rgb(0,115,170);"><?php echo $firmname;?></span></h1></div>
    <div style="width:15%; float:left;"><?php if($logo != "" && file_exists($tempDirPath."/recruiterlogo/".$logo)) { ?> 
        <img src="<?php echo $tempDirUri;?>/recruiterlogo/<?php echo $logo?>" style="max-height:45px;">
    <?php } ?></div>
</div>
 
  <div style="height:20px; width:100%;">&nbsp;</div>
  <?php if (isset($_REQUEST['message'])): ?>
  <div class="updated"  style="width:100%; float:left;">
    <p>Successfully <?php echo $_REQUEST['message']; ?></p>
  </div>
  <?php endif; ?>
  <form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>" enctype="multipart/form-data" name="DealerSaleFrm">
    <table class='widefat NewTable' style="width:100%; color:#000;">     
      <tr>
        <td><table width="100%" class='' style="border:0; color:#000;">
            
           <tr> 
          <td colspan="4"> 
            <TABLE cellSpacing="2" cellPadding="2" width="100%" border="0" style=" color:#000;" class="NewTable">
            	<tr>
                	<td colspan="2" align="right" style="margin:0; padding:0;">
                    	<input type='button' name="back" value='Back' class='button button-primary button-large' style="margin-top:-10px;margin-bottom:-10px;" onclick="window.location='<?php echo $backurl; ?>'">
                    </td>
                </tr>
              <TR> 
                <TD width="16%"  align="right" vAlign="top" style="margin:0; padding:0;"><strong>Firm Name:&nbsp;&nbsp;&nbsp;</strong></TD>
                <TD width="58%" style="margin:0; padding:0;" >
                 <strong>&nbsp;&nbsp;<?php echo $firmname;?></strong></TD>
              </TR>
			  <TR> 
                <TD width="16%"  align="right" vAlign="top" >Key Words:&nbsp;</TD>
                <TD width="58%" >
                  <?php echo $keyword;?>
                  &nbsp;</TD>
              </TR>
			 
              <TR> 
                <TD align="right" valign="top">Address:&nbsp;</TD>
                <TD  colspan="2"> 
                  <?php echo $add1." ".$add2;?>
                  <br>
                  <?php echo $city;?> - <?php echo $zip;?></TD>
              </TR>
              
              <TR> 
              <?php foreach($state_arr as $st){
					$statename.= GetOneValue("state","id",$st,"name").", ";
				}?>
                <TD  align=right valign="top">States:&nbsp;</TD>
                <TD  colspan="2"><?php echo substr($statename,0,-2);?></TD>
              </TR>
			  <TR> 
                <TD width="16%"  align="right" vAlign="top"  >Phone:&nbsp;</TD>
                <TD  colspan="2"> 
                  <?php echo $phone?>
                  &nbsp;</TD>
              </TR>
			  <TR> 
                <TD width="16%"  align="right" vAlign="top">E-mail:&nbsp;</TD>
                <TD  colspan="2"> 
                  <?php echo $email?>
                  &nbsp;</TD>
              </TR>
			  
			  <TR> 
                <TD width="16%"  align="right" vAlign="top">Category:&nbsp;</TD>
                <TD  colspan="2"> 
                  <?php foreach($category_arr as $cat){
					$catname.= GetOneValue("category","categoryid",$cat,"categoryname").", ";}
					echo substr($catname,0,-2);?></TD>
              </TR>
			 <TR> 
                <TD width="16%"  align="right" vAlign="top">Type:&nbsp;</TD>
                <TD  colspan="2"> 
                   <?php foreach($type_arr as $typ){
					$typename.= GetOneValue("type","typeid",$typ,"typename").", ";}
					echo substr($typename,0,-2);?></TD>
              </TR>
			  <TR> 
				<TD width="16%"  align="right" vAlign="top">Contact Name:&nbsp;</TD>
				<TD  colspan="2"> 
				  <?php echo stripslashes($contact);?>
				  &nbsp;</TD>
			  </TR>
			  
			  <TR> 
				<TD width="16%"  align="right" vAlign="top" >Biography:&nbsp;</TD>
				<TD  valign="top" colspan="2"> 
				  <?php //$biog=ereg_replace("\n","<br>",$biography);
					
					 $patterns = array();
					 $patterns[0] = '/\n/';
					 $replacements = array();
					 $replacements[0] = '<br>';
					 $biog=preg_replace($patterns, $replacements, $biography);
					
					echo stripslashes($biog);
				  ?>
				  &nbsp;</TD>
			  </TR>
			  
			  <TR> 
				<TD width="16%"  align="right" vAlign="top" >Get Resume option:&nbsp;</TD>
				<TD  valign="top" colspan="2"> 
				  <?php if($resumeopt=="Y")
						echo "Yes";
					else
						echo "No";
				  ?>
				  &nbsp;</TD>
			  </TR>
			  
			  <?php if($client1 == "" && $client2 == "" && $client3 == "" && $client4 == "" && $client5 == "" && $client6 == "" && $client7 == "" && $client8 == "" && $client9 == "" && $client10 == "") {}else{ if($client1) {?>
			  <tr>
				<td colspan="2" height="30" style="background-color:rgb(228,240,252); height:25px; line-height:25px; text-align:left;font-size:15px;">
					<strong>Client List</strong></td>
			  </tr>
			  <TR> 
				<TD width="16%"  align="right" vAlign="top" >Client - 1:&nbsp;</TD>
				<TD  valign="top" colspan="2"> 
				  <?php echo $client1; ?>
				  &nbsp;</TD>
			  </TR>
			  <?php } ?>
			  <?php if($client2) {?>
			  <TR> 
				<TD width="16%"  align="right" vAlign="top" >Client - 2:&nbsp;</TD>
				<TD  valign="top" colspan="2"> 
				  <?php echo $client2; ?>
				  &nbsp;</TD>
			  </TR>
			  <?php } ?>
			  <?php if($client3) {?> 
			  <TR> 
				<TD width="16%"  align="right" vAlign="top" >Client - 3:&nbsp;</TD>
				<TD  valign="top" colspan="2"> 
				  <?php echo $client3; ?>
				  &nbsp;</TD>
			  </TR>
			  <?php } ?>
			  <?php if($client4) {?>
			  <TR> 
				<TD width="16%"  align="right" vAlign="top" >Client - 4:&nbsp;</TD>
				<TD  valign="top" colspan="2"> 
				  <?php echo $client4; ?>
				  &nbsp;</TD>
			  </TR>
			  <?php } ?>
			  <?php if($client5) {?>
			  <TR> 
				<TD width="16%"  align="right" vAlign="top" >Client - 5:&nbsp;</TD>
				<TD  valign="top" colspan="2"> 
				  <?php echo $client5; ?>
				  &nbsp;</TD>
			  </TR>
			  <?php } ?>
			  <?php if($client6) {?>
			  <TR> 
				<TD width="16%"  align="right" vAlign="top" >Client - 6:&nbsp;</TD>
				<TD  valign="top" colspan="2"> 
				  <?php echo $client6; ?>
				  &nbsp;</TD>
			  </TR>
			  <?php } ?>
			  <?php if($client7) {?>
			  <TR> 
				<TD width="16%"  align="right" vAlign="top" >Client - 7:&nbsp;</TD>
				<TD  valign="top" colspan="2"> 
				  <?php echo $client7; ?>
				  &nbsp;</TD>
			  </TR>
			  <?php } ?>
			  <?php if($client8) {?>
			  <TR> 
				<TD width="16%"  align="right" vAlign="top" >Client - 8:&nbsp;</TD>
				<TD  valign="top" colspan="2"> 
				  <?php echo $client8; ?>
				  &nbsp;</TD>
			  </TR>
			  <?php } ?>
			  <?php if($client9) {?>
			  <TR> 
				<TD width="16%"  align="right" vAlign="top" >Client - 9:&nbsp;</TD>
				<TD  valign="top" colspan="2"> 
				  <?php echo $client9; ?>
				  &nbsp;</TD>
			  </TR>
			  <?php } ?>
			  <?php if($client10) {?>
			  <TR> 
				<TD width="16%"  align="right" vAlign="top" >Client - 10:&nbsp;</TD>
				<TD  valign="top" colspan="2"> 
				  <?php echo $client10; ?>
				  &nbsp;</TD>
			  </TR>
			  <?php } ?>
			  
              
              <? } ?>
			  <?php 
			  if($member1 == "" && $member2 == "" && $member3 == "" && $member4 == "") {}else{
			  if($member1) {?>
			  <TR>
			  	<td colspan="2" height="30" style="background-color:rgb(228,240,252); height:25px; line-height:25px; text-align:left; font-size:15px;">
					<strong>Management Team</strong>
				</TD>
			  </TR>
			  <TR> 
				<TD width="16%"  align="right" vAlign="top" >Member - 1:&nbsp;</TD>
				<TD  valign="top" colspan="2"> 
				  <?php echo $member1; ?>
				  &nbsp;</TD>
			  </TR>
			  <TR> 
				<TD width="16%"  align="right" vAlign="top" >Biogryphy:&nbsp;</TD>
				<TD  valign="top" colspan="2"> 
				  <?php //$membio1=ereg_replace("\n","<br>",$membio1);
					
					 $bio1_patterns = array();
					 $bio1_patterns[0] = '/\n/';
					 $bio1_replacements = array();
					 $bio1_replacements[0] = '<br>';
					 $membio1=preg_replace($bio1_patterns, $bio1_replacements, $membio1);
					
					echo stripslashes($membio1);
				  ?>
				  &nbsp;</TD>
			  </TR>
			  <?php } ?>
			  <?php if($member2) {?>
			  <TR> 
				<TD width="16%"  align="right" vAlign="top" >Member - 2:&nbsp;</TD>
				<TD  valign="top" colspan="2"> 
				  <?php echo $member2; ?>
				  &nbsp;</TD>
			  </TR>
			  <TR> 
				<TD width="16%"  align="right" vAlign="top" >Biogryphy:&nbsp;</TD>
				<TD  valign="top" colspan="2"> 
				  <?php //$membio2=ereg_replace("\n","<br>",$membio2);
					
					 $bio2_patterns = array();
					 $bio2_patterns[0] = '/\n/';
					 $bio2_replacements = array();
					 $bio2_replacements[0] = '<br>';
					 $membio2=preg_replace($bio2_patterns, $bio2_replacements, $membio2);
					
					echo stripslashes($membio2);
				  ?>
				  &nbsp;</TD>
			  </TR>
			  <?php } ?>
			  <?php if($member3) {?>
			  <TR> 
				<TD width="16%"  align="right" vAlign="top" >Member - 3:&nbsp;</TD>
				<TD  valign="top" colspan="2"> 
				  <?php echo $member3; ?>
				  &nbsp;</TD>
			  </TR>
			  <TR> 
				<TD width="16%"  align="right" vAlign="top" >Biogryphy:&nbsp;</TD>
				<TD  valign="top" colspan="2"> 
				  <?php //$membio3=ereg_replace("\n","<br>",$membio3);
					
					 $bio3_patterns = array();
					 $bio3_patterns[0] = '/\n/';
					 $bio3_replacements = array();
					 $bio3_replacements[0] = '<br>';
					 $membio3=preg_replace($bio3_patterns, $bio3_replacements, $membio3);
					
					echo stripslashes($membio3);
				  ?>
				  &nbsp;</TD>
			  </TR>
			  <?php } ?>
			  <?php if($member4) {?>
			  <TR> 
				<TD width="16%"  align="right" vAlign="top" >Member - 4:&nbsp;</TD>
				<TD  valign="top" colspan="2"> 
				  <?php echo $member4; ?>
				  &nbsp;</TD>
			  </TR>
			  <TR> 
				<TD width="16%"  align="right" vAlign="top" >Biogryphy:&nbsp;</TD>
				<TD  valign="top" colspan="2"> 
				  <?php //$membio4=ereg_replace("\n","<br>",$membio4);
					
					 $bio4_patterns = array();
					 $bio4_patterns[0] = '/\n/';
					 $bio4_replacements = array();
					 $bio4_replacements[0] = '<br>';
					 $membio4=preg_replace($bio4_patterns, $bio4_replacements, $membio4);
					
					echo stripslashes($membio4);
				  ?>
				  &nbsp;</TD>
			  </TR>
			  <?php } } ?>
              
			 </table>
          </td>
        </tr>
            <tr>
              <td colspan="2" align="center"><input type='button' name="back" value='Back' class='button button-primary button-large' onclick="window.location='<?php echo $backurl; ?>'"></td>
            </tr>
          </table></td>
      </tr>
    </table>
  </form>
</div>
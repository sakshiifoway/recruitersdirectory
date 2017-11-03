<?php
function add_update_recruiters()
{
	global $wpdb;
	
    $table_name =  'recruiter';
    $rid = $_GET["id"];

	include "function_img.php";

	if (isset($_POST['submit'])) {
		
		//print_r($_REQUEST);exit;
		foreach ($_POST as $key => $val)
		{
			if($key == "state" || $key == "type" || $key == "category") {}
			else
			{
				$$key = addslashes(trim($val)); 
			}
		}
		if($rid != '')
			$qry = " and rid != '".$rid."'";
			
		$check_email = $wpdb->get_results("SELECT * from $table_name where email = '".$email."' $qry");
		$check_email_cnt = $wpdb->num_rows;
		
		if($check_email_cnt > 0)
		{
			$email = "";
			$email_msg="Email is already registered";
		}
		else
		{
			if($resumeopt=="Y")
				$resumeopt="Y";
			else
				$resumeopt="N";
			
			if($_REQUEST['state'] != "")
				$statelist = implode(",",$_REQUEST['state']);
			else
				$statelist = "";
			if($_REQUEST['category'] != "")
				$categorylist = implode(",",$_REQUEST['category']);
			else
				$categorylist = "";
			if($_REQUEST['type'] != "")
				$typelist = implode(",",$_REQUEST['type']);
			else
				$typelist = "";
			
			if($_FILES["logo"]["name"]	 != ''){
				$image_path = rand().trim($_FILES["logo"]["name"]); 
				$image_path = imageReplace($image_path);
				copy($_FILES["logo"]["tmp_name"],"../wp-content/themes/".THEMESLUG."/recruiterlogo/".$image_path);
				new imageresize("../wp-content/themes/".THEMESLUG."/recruiterlogo/".$image_path,"../wp-content/themes/".THEMESLUG."/recruiterlogo/thumb_".$image_path,300,230);
				if(file_exists("../wp-content/themes/".THEMESLUG."/recruiterlogo/".$_REQUEST['imgHidn']) && $rid>0 ){
					unlink("../wp-content/themes/".THEMESLUG."/recruiterlogo/".$_REQUEST['imgHidn']);
					unlink("../wp-content/themes/".THEMESLUG."/recruiterlogo/thumb_".$_REQUEST['imgHidn']);
				}			
				$img = " , logo = '".$image_path."'";
			  }
			//  echo $img;exit;
			if ($_POST['rid']>0) {
				$update = "UPDATE $table_name set
								firmname = '".$firmname."',
								keyword = '".$keyword."',
								category = '".$categorylist."',
								type = '".$typelist."',
								add1 = '".$add1."',
								add2 = '".$add2."',
								city = '".$city."',
								state = '".$statelist."',
								country = '".$country."',
								zip = '".$zip."',
								phone = '".$phone."',
								email = '".$email."',
								contact = '".$contact."',
								estdate = '".$estdate."',
								biography = '".$biography."',
								resumeopt = '".$resumeopt."',
								client1 = '".$client1."',
								client2 = '".$client2."',
								client3 = '".$client3."',
								client4 = '".$client4."',
								client5 = '".$client5."',
								client6 = '".$client6."',
								client7 = '".$client7."',
								client8 = '".$client8."',
								client9 = '".$client9."',
								client10 = '".$client10."',
								member1 = '".$member1."',
								membio1 = '".$membio1."',
								member2 = '".$member2."',
								membio2 = '".$membio2."',
								member3 = '".$member3."',
								membio3 = '".$membio3."',
								member4 = '".$member4."',
								membio4 = '".$membio4."'
								$img
							WHERE rid = '".$rid."'";
				$wpdb->query($update);
				$message = "Recruiter Detail updated successfully.";
			}
			else {
				$insert = "INSERT INTO $table_name set
								firmname = '".$firmname."',
								keyword = '".$keyword."',
								category = '".$categorylist."',
								type = '".$typelist."',
								add1 = '".$add1."',
								add2 = '".$add2."',
								city = '".$city."',
								state = '".$statelist."',
								country = '".$country."',
								zip = '".$zip."',
								phone = '".$phone."',
								email = '".$email."',
								contact = '".$contact."',
								estdate = '".$estdate."',
								biography = '".$biography."',
								rdate = '".date('Y-m-d')."',
								aprove = '".$aprove."',
								status = 'Y',
								resumeopt = '".$resumeopt."',
								client1 = '".$client1."',
								client2 = '".$client2."',
								client3 = '".$client3."',
								client4 = '".$client4."',
								client5 = '".$client5."',
								client6 = '".$client6."',
								client7 = '".$client7."',
								client8 = '".$client8."',
								client9 = '".$client9."',
								client10 = '".$client10."',
								member1 = '".$member1."',
								membio1 = '".$membio1."',
								member2 = '".$member2."',
								membio2 = '".$membio2."',
								member3 = '".$member3."',
								membio3 = '".$membio3."',
								member4 = '".$member4."',
								membio4 = '".$membio4."'
								$img";
				//echo $insert;//exit;
				$wpdb->query($insert);
				$message ="inserted";
				//exit;
				
				$query_mail = "SELECT * from mail_content where id = 1";
				$rows_mail = $wpdb->get_results($query_mail);
				$mailagr=$rows_mail[0]->content1;
								
				$mail_patterns = array();
				$mail_patterns[0] = '/\n/';
				$mail_replacements = array();
				$mail_replacements[0] = '<BR>';
				$mailagree=preg_replace($mail_patterns, $mail_replacements, $mailagr);
				
				$to=$email;
				$from=get_option('admin_email');
				$subject="OnlineRecruitersDirectory Agreement!";
				
				$mailcontent="				
					<table border=\"0\" align=\"center\" cellspacing=\"0\" cellpadding=\"0\" >
						<tr>
						  <td width=\"5%\">&nbsp;</td>
						  <td height=30 align=\"left\" colspan=\"2\">
							<font face=\"Verdana, Arial, Helvetica, sans-serif\" size=\"3\" color=\"#000099\"><b>Agreement :</b></font>
						  </td>
						  <td width=\"5%\">&nbsp;</td>
						</tr>
						<tr>
						  <td width=\"5%\">&nbsp;</td>
						  <td height=30 align=\"left\" colspan=\"2\">
								<font face=\"Verdana, Arial, Helvetica, sans-serif\" size=\"2\">
								$mailagree
								</font>
						  </td>
						  <td width=\"5%\">&nbsp;</td>
						</tr>
					</table>
				";
				
			//	SendHTMLMail1($to,$subject,$mailcontent,$from);
								
			//echo $mailcontent;exit;
				echo "<script>window.location.href='admin.php?page=manage_recruiters&msg=$message'</script>";
			}
		}
	}
	
	if($rid)
	{
        $recruiters = $wpdb->get_results("SELECT * from $table_name where rid='".$rid."'");
		foreach ($recruiters[0] as $key => $val) {
			$$key = stripslashes(trim($val)); 
		}
		
		if($state != 169)
			$state = explode(",",$state);
		else
			$state = $state;
		$category = explode(",",$category);
		$type = explode(",",$type);
	}
    ?>
    <link type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/recruiters/style-admin.css" rel="stylesheet" />
    <script type='text/javascript' src='<?php echo WP_PLUGIN_URL; ?>/recruiters/validation.js'></script>
    <div class="wrap">
        <h1 class="wp-heading-inline">
			<?php if($rid=="") { ?>Add<?php } else { ?>Edit<?php } ?> Recruiter
        	<a class="page-title-action" href="<?php echo admin_url('admin.php?page=manage_recruiters'); ?>">Go To Listing Page</a>
        </h1>
        <?php if (isset($message)): ?><div class="updated"><p><?php echo $message; ?></p></div><?php endif; ?>
        <?php if (isset($email_msg)): ?><div class="error"><p><?php echo $email_msg; ?></p></div><?php endif; ?>
        <form method="post" id="recruiter_register" enctype="multipart/form-data">
        	<input type="hidden" id="rid" name="rid" value="<?php echo $rid; ?>" />
            <table class='wp-list-table widefat fixed'>
            	<tr>
                    <td class="ss-th-width">(*) Marked fields are mandatory.</td>
                </tr>
                <tr>
                	<td>
                    	<table width="100%" class='wp-list-table widefat fixed AddTable' style="border:0">
                            <tr>
                                <td class="ss-th-width">Firm Name <span class="red">*</span></td>
                                <td><input type="text" name="firmname" id="firmname" value="<?php echo $firmname; ?>"  /></td>
                            </tr>
                            <tr>
                                <td class="ss-th-width">Key Words <span class="red">*</span></td>
                                <td><textarea name="keyword" id="keyword" rows="5"><?php echo $keyword; ?></textarea></td>
                            </tr>
                            <tr>
                                <td class="ss-th-width">Contact Name <span class="red">*</span></td>
                                <td><input type="text" name="contact" id="contact" value="<?php echo $contact; ?>" class="ss-field-width" /></td>
                            </tr>
                            <tr>
                                <td class="ss-th-width">Address 1 <span class="red">*</span></td>
                                <td><input type="text" name="add1" id="add1" value="<?php echo $add1; ?>"  /></td>
                            </tr>
                            <tr>
                                <td class="ss-th-width">Address 2</td>
                                <td><input type="text" name="add2" id="add2" value="<?php echo $add2; ?>"  /></td>
                            </tr>
                            <tr>
                                <td class="ss-th-width">Country <span class="red">*</span></td>
                                <td>
                                	<select name="country" id="country" onchange="return getState(this.value,'<?php echo plugin_dir_url( __FILE__ ); ?>');">
                                    	<option value="">Select</option>
                                        <?php
                                            $countries = $wpdb->get_results("SELECT * from country order by name ASC");
                                            foreach ($countries as $countries_new) { 
                                            if($country == $countries_new->id) { $country_sel = "selected"; }
                                            else { $country_sel = ""; }
                                        ?>
                                        <option value="<?php echo $countries_new->id; ?>" <?php echo $country_sel; ?>><?php echo $countries_new->name; ?></option>
                                        <?php } ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="ss-th-width">State <span class="red">*</span></td>
                                <td>
                                	<select name="state[]" id="state" multiple size="5">
                                        <option value="">Select</option>
                                        <?php
											if($country != "")
											{
												$states = $wpdb->get_results("SELECT * from state where cid='$country' order by name ASC");
												if($country != 170)
												{
											?>
													<option value="169" <?php if($state == 169) { echo "selected"; } ?>>Other</option>
											<?php
												}
												else
												{
													if(count($states)>0) {
														foreach ($states as $states_new) { 
														?>
														<option value="<?php echo $states_new->id; ?>" <?php if(is_array($state)){if(in_array($states_new->id,$state))echo "selected";} ?>><?php echo $states_new->name; ?></option>
											<?php } } ?>
										<?php } } ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="ss-th-width">City <span class="red">*</span></td>
                                <td><input type="text" name="city" id="city" value="<?php echo $city; ?>"  /></td>
                            </tr>                            
                            <tr>
                                <td class="ss-th-width">Zip <span class="red">*</span></td>
                                <td><input type="text" name="zip" id="zip" value="<?php echo $zip; ?>"  /></td>
                            </tr>
                            <tr>
                                <td class="ss-th-width">Phone No <span class="red">*</span></td>
                                <td><input type="text" name="phone" id="phone" value="<?php echo $phone; ?>"  /></td>
                            </tr>
                            <tr>
                                <td class="ss-th-width">E-mail <span class="red">*</span></td>
                                <td><input type="text" name="email" id="email" value="<?php echo $email; ?>" onChange="return checkDuplicate('<?php echo $table_name; ?>','email',this.value,'<?php echo $rid; ?>','<?php echo plugin_dir_url( __FILE__ ); ?>');" /></td>
                            </tr>
                            <tr>
                                <td class="ss-th-width">Logo</td>
                                <td>
                                	<input type="file" name="logo" id="logo" style="width:100%; float:left;" />
                                    <?php if($logo != '' && file_exists("../wp-content/themes/".THEMESLUG."/recruiterlogo/".$logo)){?>
                                    <a href="<?php echo get_template_directory_uri();?>/recruiterlogo/<?php echo $logo; ?>" target="_blank"><img src="<?php echo get_template_directory_uri();?>/recruiterlogo/<?php echo $logo; ?>" style="max-width:100px; float:left;" /></a>
                                    <input type="hidden" name="imgHidn" id="imgHidn" value="<?php echo $logo ?>" />
                                    <? } ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="ss-th-width">Category <span class="red">*</span></td>
                                <td>
                                    <select name="category[]" id="category" multiple size="5">
                                        <?php
                                            $categories = $wpdb->get_results("SELECT * from category order by categoryname ASC");
                                            foreach ($categories as $categories_new) { 
                                        ?>
                                        <option value="<?php echo $categories_new->categoryid; ?>" <?php if(is_array($category)){if(in_array($categories_new->categoryid,$category))echo "selected";} ?>><?php echo $categories_new->categoryname; ?></option>
                                        <?php } ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="ss-th-width">Type <span class="red">*</span></td>
                                <td>
                                    <select name="type[]" id="type" multiple size="5">
                                        <?php
                                            $types = $wpdb->get_results("SELECT * from type order by typename ASC");
                                            foreach ($types as $types_new) { 
                                        ?>
                                        <option value="<?php echo $types_new->typeid; ?>" <?php if(is_array($type)){if(in_array($types_new->typeid,$type))echo "selected";} ?>><?php echo $types_new->typename; ?></option>
                                        <?php } ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="ss-th-width">Established(Year) <span class="red">*</span></td>
                                <td><input type="text" name="estdate" id="estdate" value="<?php echo $estdate; ?>" maxlength="4" minlength="4" onkeypress="return isNumberKey(event);" /></td>
                            </tr>
                            <tr>
                                <td class="ss-th-width">Biography</td>
                                <td><textarea name="biography" id="biography" rows="5"><?php echo $biography; ?></textarea></td>
                            </tr>
                            <tr>
                                <td class="ss-th-width">Candidate Resume Option</td>
                                <td><input type="checkbox" name="resumeopt" id="resumeopt" value="Y" <?php if($rid == "" || $resumeopt == "Y") { ?>checked="checked"<?php } ?> /></td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td class="TDHeading">CLIENT LIST</td>
                </tr>
                <tr>
                	<td>
                    	<table width="100%" class='wp-list-table widefat fixed AddTable' style="border:0">
                            <tr>
                                <td class="ss-th-width">Client - 1</td>
                                <td><input type="text" name="client1" id="client1" value="<?php echo $client1; ?>"  /></td>
                            </tr>
                            <tr>
                                <td class="ss-th-width">Client - 2</td>
                                <td><input type="text" name="client2" id="client2" value="<?php echo $client2; ?>"  /></td>
                            </tr>
                            <tr>
                                <td class="ss-th-width">Client - 3</td>
                                <td><input type="text" name="client3" id="client3" value="<?php echo $client3; ?>"  /></td>
                            </tr>
                            <tr>
                                <td class="ss-th-width">Client - 4</td>
                                <td><input type="text" name="client4" id="client4" value="<?php echo $client4; ?>"  /></td>
                            </tr>
                            <tr>
                                <td class="ss-th-width">Client - 5</td>
                                <td><input type="text" name="client5" id="client5" value="<?php echo $client5; ?>"  /></td>
                            </tr>
                            <tr>
                                <td class="ss-th-width">Client - 6</td>
                                <td><input type="text" name="client6" id="client6" value="<?php echo $client6; ?>"  /></td>
                            </tr>
                            <tr>
                                <td class="ss-th-width">Client - 7</td>
                                <td><input type="text" name="client7" id="client7" value="<?php echo $client7; ?>"  /></td>
                            </tr>
                            <tr>
                                <td class="ss-th-width">Client - 8</td>
                                <td><input type="text" name="client8" id="client8" value="<?php echo $client8; ?>"  /></td>
                            </tr>
                            <tr>
                                <td class="ss-th-width">Client - 9</td>
                                <td><input type="text" name="client9" id="client9" value="<?php echo $client9; ?>"  /></td>
                            </tr>
                            <tr>
                                <td class="ss-th-width">Client - 10</td>
                                <td><input type="text" name="client10" id="client10" value="<?php echo $client10; ?>"  /></td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td class="TDHeading">MANAGEMENT TEAM</td>
                </tr>
                <tr>
                	<td>
                    	<table width="100%" class='wp-list-table widefat AddTable' style="border:0">
                            <tr>
                            	<td colspan="2">
                                	<table width="80%" border="0" cellpadding="2" cellspacing="2" >
                                    	<tr>
                                            <td class="mt-td-width">Member - 1</td>
                                            <td class="mt-td-width-2"><input type="text" name="member1" id="member1" value="<?php echo $member1; ?>"  /></td>
                                            <td class="mt-td-width">Biography</td>
                                            <td class="mt-td-width-2"><textarea name="membio1" id="membio1" rows="5"><?php echo $membio1; ?></textarea></td>
                                        </tr>
                                        <tr>
                                            <td class="mt-td-width">Member - 2</td>
                                            <td class="mt-td-width-2"><input type="text" name="member2" id="member2" value="<?php echo $member2; ?>"  /></td>
                                            <td class="mt-td-width">Biography</td>
                                            <td class="mt-td-width-2"><textarea name="membio2" id="membio2" rows="5"><?php echo $membio2; ?></textarea></td>
                                        </tr>
                                        <tr>
                                            <td class="mt-td-width">Member - 3</td>
                                            <td class="mt-td-width-2"><input type="text" name="member3" id="member3" value="<?php echo $member3; ?>"  /></td>
                                            <td class="mt-td-width">Biography</td>
                                            <td class="mt-td-width-2"><textarea name="membio3" id="membio3" rows="5"><?php echo $membio3; ?></textarea></td>
                                        </tr>
                                        <tr>
                                            <td class="mt-td-width">Member - 4</td>
                                            <td class="mt-td-width-2"><input type="text" name="member4" id="member4" value="<?php echo $member4; ?>"  /></td>
                                            <td class="mt-td-width">Biography</td>
                                            <td class="mt-td-width-2"><textarea name="membio4" id="membio4" rows="5"><?php echo $membio4; ?></textarea></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td align="right"><input type='submit' name="submit" value='Save' class='button-primary' onclick="return checkRecruiter();" ></td>
                </tr>
            </table>
        </form>
    </div>
<?php } ?>
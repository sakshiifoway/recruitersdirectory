<?php
include "../../../wp-load.php";

$id = $_REQUEST['id'];
$flag = $_REQUEST['flag'];

if($flag == "ApproveRecruiter")
{
	$Approve = GetOneValue("recruiter","rid",$id,"aprove");
	
	if($Approve=="YES")
		$changeVal="NO";
	else
		$changeVal="YES";

	$update = "update recruiter set aprove = '".$changeVal."' where rid = '".$id."'";	
	$wpdb->query($update);
	
	
	$query = "SELECT * from mail_content where id = 1";
	$rows = $wpdb->get_results($query);
	$msg=$rows[0]->content1;
		
	$patterns = array();
	$patterns[0] = '/\n/';
	$replacements = array();
	$replacements[0] = '<br>';
	$msg1=preg_replace($patterns, $replacements, $msg);
	
	$remail = GetOneValue("recruiter","rid",$id,"email");
	
	$to=$remail;
	$from = get_option("admin_email");
	$subject="confirmation of registration";
	$mailcontent="$msg1";
	 
	//SendHTMLMail1($to,$subject,$mailcontent,$from);
 
	echo $changeVal;
}

if($flag == "chkDuplicate")
{
	$tblnm = $_REQUEST['tblnm'];
	$fldname = $_REQUEST['fldname'];
	$fldval = $_REQUEST['fldval'];

	$qry = "";
	
	if($id != '')
		$qry = " and rid != '".$id."'";
	//echo "SELECT * from $tblnm where $fldname = '".$fldval."' $qry";
	$check_email = $wpdb->get_results("SELECT * from $tblnm where $fldname = '".$fldval."' $qry");
	$check_email_cnt = $wpdb->num_rows;
	
	if($check_email_cnt>0)
	{
		$error = 'Email is already registered.';
	}
	else
		$error = "";
	
	echo $error;
}

if($flag == "getState")
{	
	$output = "";
	$output .= '<option value="">Select</option>';
	$states = $wpdb->get_results("SELECT * from state where cid='".$id."' order by name ASC");
	if($id != 170)
	{
		$output .= '<option value="169">Other</option>';
	}
	else
	{
		if(count($states)>0)
		{
			foreach ($states as $states_new)
			{
				$output .= '<option value="'.$states_new->id.'">'.$states_new->name.'</option>';
			}
		}
	}
	echo $output;
}

if($flag == "paging")
{
	$page_num = $_REQUEST['page_num'];
	$QueryString = stripslashes($_REQUEST['QueryString']);
	
	$perPage = 20;
	
	$listing_details1 = $wpdb->get_results($QueryString);
	$get_total_rows = count($listing_details1);
	
	if($get_total_rows == 0)
		$perPage = 0;
	if($perPage == "All")
		$perPage = $get_total_rows;
	
	$listing_details = $QueryString;
	
	$start = ($page_num-1)*$perPage;
	if($start < 0) $start = 0;
	
	$query =  $listing_details . " limit " . $start . "," . $perPage; 
	$faq = $wpdb->get_results($query);
	
	$perpageresult = $perPage;
	
	$output = '';
	
	if($get_total_rows>0)
	{
		foreach($faq as $row){
			$rid = $row->rid;
			$firmname = stripslashes($row->firmname);
			$email = stripslashes($row->email);
			$country = $row->country;
			$countrynm = stripslashes(GetOneValue("country","id",$row->country,"name"));
			$aprove = $row->aprove;
			
			$edit_url = admin_url('admin.php?page=add_update_recruiters&id=' . $rid);
			$delete_url = admin_url('admin.php?page=manage_recruiters&did=' . $rid);
			if($aprove == 'YES'){$cheked = "checked='checked'";}
			else { $cheked = ""; }
			$outputTable .= '
			<tr>
				<td class="manage-column ss-list-width" align="center">
					<input type="hidden" name="aprovehid'.$rid.'" id="aprovehid'.$rid.'" value="'.$aprove.'" />
                    <input type="checkbox" name="aprove'.$rid.'" id="aprove'.$rid.'" '.$cheked.' onchange="return ApproveRecruiter(\''.$rid.'\',\''.$aprove.'\',\''.plugin_dir_url( __FILE__ ).'\');">
				</td>
				<td class="manage-column ss-list-width">'.$firmname.'</td>
				<td class="manage-column ss-list-width">'.$email.'</td>
				<td class="manage-column ss-list-width">'.$countrynm.'</td>
				<td>
					<a href="'.$edit_url.'"><img src="'.get_template_directory_uri().'/assets/images/edit.png" alt="Edit"></a>
                    <a onclick="deleteRecruiter(\''.$delete_url.'\');" style="cursor:pointer;"><img src="'.get_template_directory_uri().'/assets/images/delete.png" alt="Delete"></a>
				</td>
         	</tr>
			';
		}
	}
	/*else
	{
		$output .= '<tr><td colspan="6">No result found.</tr>';
	}*/
	
	/**************************************************** COMMON PAGINATION CODE STARTS HERE *********************************************************/
	$pages  = ceil($get_total_rows/$perPage);
	
	if($get_total_rows == 0)
		$start_show = 0;
	else
		$start_show = ($perPage*($page_num-1))+1;
	if($page_num == $pages)
		$end_show = $get_total_rows;
	else
		$end_show = $perPage*$page_num;
		
	if($get_total_rows>0)
	{
		$output .= '<div class="thumb-pagination">
						<div class="show-entries">
							<label>Showing '.$start_show.' to '.$end_show.' of '.$get_total_rows.' entries</label>
						</div>';
	}
	if($get_total_rows>$perPage)
	{
		$output .= '<div class="CRM_pagination">
					<ul>';
		if($pages>1)
		{
			$prevlink = $page_num-1;
			$nextlink = $page_num+1;
			if($page_num == 1)
				$output .= '<li class="previous"><a>Previous</a></li>';
			else
				$output .= '<li class="previous"><a class="paging_cls" onclick="getresult('.$prevlink.')" href="#listing">Previous</a></li>';
			for($i=1;$i<=$pages;$i++)
			{
				$lastcnt = $pages-6;
			//	if($page_num==5 && $i==5){$dotval =  "<li>...</li>";}else{$dotval="";}
				if($pages == 10)
				{
					$output .= '<li><a class="paging_cls" onclick="getresult('.$i.')" id="'.$i.'" href="#listing">'.$i.'</a></li>';
				}
				else
				{
					if($i<10 && $page_num<9)
					{
						$output .= '<li id="Li'.$i.'"><a class="paging_cls" onclick="getresult('.$i.')" id="'.$i.'" >'.$i.'</a></li>';
						if($i==9)
						{
							$output .= '<li>...</li><li id="Li'.$i.'"><a class="paging_cls" onclick="getresult('.$pages.')" id="'.$i.'" >'.$pages.'</a></li>';
							break;
						}
					}
					else if($page_num>=9 && $page_num<=$lastcnt)
					{
						if($i==1)
							$output .= '<li id="Li'.$i.'"><a class="paging_cls" onclick="getresult('.$i.')" id="'.$i.'" >'.$i.'</a></li><li>...</li>';
						
						$back_page = $page_num-5;
						$next_page = $page_num+5;
						//if($i==$back_page || $i == $next_page || $i == $page_num)
						if($i>=$back_page && $i<=$next_page)
						{
							$output .= '<li id="Li'.$i.'"><a class="paging_cls" onclick="getresult('.$i.')" id="'.$i.'" >'.$i.'</a></li>'; 
						}
						
						if($i==$pages)
							$output .= '<li>...</li><li id="Li'.$i.'"><a class="paging_cls" onclick="getresult('.$i.')" id="'.$i.'" >'.$i.'</a></li>';
					}
					else
					{
						if($i==1)
							$output .= '<li id="Li1"><a class="paging_cls" onclick="getresult(1)" id="1" >1</a></li><li>...</li>';
							
						if($page_num > $lastcnt && $i>$lastcnt)
						{
							$output .= '<li id="Li'.$i.'"><a class="paging_cls" onclick="getresult('.$i.')" id="'.$i.'" >'.$i.'</a></li>';
						}
						if($i==$lastcnt)	
						{
							$back_page = $page_num-1;
							$next_page = $page_num+1;
							if($i==$back_page || $i == $next_page || $i == $page_num)
							{
								$output .= '<li id="Li'.$i.'"><a class="paging_cls" onclick="getresult('.$i.')" id="'.$i.'" >'.$i.'</a></li>'; 
							}
						}
					}	
				}
			}
			if($page_num == $pages)
				$output .= '<li class="next"><a>Next</a></li>';
			else
				$output .= '<li class="next"><a class="paging_cls" onclick="getresult('.$nextlink.')" href="#listing">Next</a></li>';
		}
		$output .= '</ul>
					</div>';
	}
	$output .= '</div>';
	
	echo  $outputTable."@@@###@@@".$output;
}

?>
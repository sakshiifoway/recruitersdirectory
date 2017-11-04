<?php
include "../../../wp-load.php";

$id = $_REQUEST['id'];
$flag = $_REQUEST['flag'];

if($flag == "ApproveCompany")
{
	$company = $wpdb->get_results("SELECT * from company where compid='".$id."'");
	$name = $company[0]->name;
	$phone = $company[0]->phone;
	$cemail = $company[0]->email;	
	$message = $company[0]->message;
	$Approve = $company[0]->aprove;
	$rid = $company[0]->rid;
	
	if($Approve=="YES")
		$changeVal="NO";
	else
		$changeVal="YES";

	$update = "update company set aprove = '".$changeVal."' where compid = '".$id."'";	
	$wpdb->query($update);
	
	echo $changeVal;
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
	$outputTable = '';
	
	if($get_total_rows>0)
	{
		foreach($faq as $row){
			$compid = $row->compid;
			$rid = $row->rid;
			$recruiter_name = stripslashes(GetOneValue('recruiter','rid',$rid,'firmname'));
			$company_name = stripslashes($row->company_name);
			$name = stripslashes($row->name);
			$email = stripslashes($row->email);
			$phone = stripslashes($row->phone);
			$aprove = stripslashes($row->aprove);
			
			if ($aprove == "YES") $chkd = "checked";
			else $chkd = "";
			
			$view_url = admin_url('admin.php?page=manage_company&flag=view_company&id='.$compid);
			
			$outputTable .= '
			<tr>
				<td class="manage-column ss-list-width" style="text-align:center;">
					<input type="hidden" id="aprovehid'.$compid.'" value="'.$aprove.'" />
                   	<input type="checkbox" id="approvechk'.$compid.'" '.$chkd.' onchange="return ApproveCompany(\''.$compid.'\',\''.$aprove.'\',\''.plugin_dir_url( __FILE__ ).'\');">
				</td>
				<td class="manage-column ss-list-width"><a href="'.$view_url.'">'.$company_name.'<a/></td>
				<td class="manage-column ss-list-width">'.$name.'</td>
				<td class="manage-column ss-list-width">'.$email.'</td>
				<td class="manage-column ss-list-width">'.$phone.'</td>
				<td class="manage-column ss-list-width">'.$recruiter_name.'</td>
         	</tr>
			';
		}
	}
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
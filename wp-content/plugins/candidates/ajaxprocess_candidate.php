<?php
include "../../../wp-load.php";


	$page_num = $_REQUEST['page_num'];
	$QueryString = stripslashes($_REQUEST['QueryString']);
	
	$perPage = 10;
	
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
			$outputTable .= '
			 <tr>
     		  <td class="manage-column ss-list-width"><input type="checkbox" name="delete_can[]" value="'.$row->id.'" id="delete_can" /></td>
			  <td class="manage-column ss-list-width"><a href="'.admin_url('admin.php?page=candidates&flag=candidate-profile&id=' . $row->id).'">'.$row->name.'</a></td>
			  <td class="manage-column ss-list-width">'.$row->email.'</td>
			  <td class="manage-column ss-list-width">'.GetOneValue("recruiter","rid",$row->rid,"firmname").'</td>
			  <td><a href="#">Recruiter Profile</a></td>
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
				$output .= '<li class="previous"><a class="paging_cls" onclick="getresult('.$prevlink.')" >Previous</a></li>';
			for($i=1;$i<=$pages;$i++)
			{
				$lastcnt = $pages-6;
			//	if($page_num==5 && $i==5){$dotval =  "<li>...</li>";}else{$dotval="";}
				if($pages == 10)
				{
					$output .= '<li><a class="paging_cls" onclick="getresult('.$i.')" id="'.$i.'" >'.$i.'</a></li>';
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
				$output .= '<li class="next"><a class="paging_cls" onclick="getresult('.$nextlink.')">Next</a></li>';
		}
		$output .= '</ul>
					</div>';
	}
	$output .= '</div>';
	
	echo  $outputTable."@@@###@@@".$output;

?>
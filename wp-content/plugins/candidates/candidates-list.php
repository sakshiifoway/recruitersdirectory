<?php
global $wpdb;
$table_name = 'candidate';

if(count($_REQUEST['delete_can'])>0){
	foreach($_REQUEST['delete_can'] as $val){
		$delete = "delete from candidate where id = '".$val."'";		
		$wpdb->query($delete);
	}
	$message = "deleted";
	echo "<script>window.location.href='admin.php?page=candidates&message=$message'</script>";
}
	
if($_REQUEST['hid_srch']==1)
{
	//print_r($_REQUEST);
	$qryadd = "";
	foreach ($_REQUEST as $key => $val) {
	   $$key = addslashes(trim($val)); 
	}
	
	if($candidate_name != ""){
		$qryadd.= " and name LIKE '%".$candidate_name."%'";
	}if($recruiter_name != ""){
		$qryadd.= " and rid = '".$recruiter_name."'";
	}
//	echo "in";
}

$selList = "SELECT * from candidate where id > 0 $qryadd order by id DESC";
$row_Listtype = $wpdb->get_results($selList);	

//echo $selList;
?>

<link type="text/css" href="<?php echo plugin_dir_url( __FILE__ ); ?>/style-admin.css" rel="stylesheet" />
<div class="wrap">
  <div style="width:100%; float:left">
    <h1 class="wp-heading-inline">Candidates</h1>
    <!--<a href="<?php echo admin_url('admin.php?page=dealer_sale_create'); ?>" class="page-title-action">Add New</a>-->
    <div style="height:20px; width:100%;">&nbsp;</div>
  </div>
  <div style="width:100%; float:left; border-bottom:1px solid #ccc; margin-bottom:15px; background-color:none; padding-bottom:10px;">
  	<form name="candidate_frm" id="candidate_frm" method="post" action="">  	
    	<input type="candidate_name" name="candidate_name" id="candidate_name" placeholder="Candidate Name" value="<?php echo $_REQUEST['candidate_name'];?>" style="border:1px solid #ddd; width:250px; height:28px; line-height:28px;"/>
        <select name="recruiter_name" id="recruiter_name" style="margin-bottom:7px;">
        	<option value="">Select Recruiter</option>
            <?php 
			$sel_rec_can = "select *,r.rid as rec_id from recruiter r,candidate c where r.rid = c.rid and firmname != '' ";
			$row_rec_can = $wpdb->get_results($sel_rec_can);
			foreach($row_rec_can as $cn){
			?>
            	<option value="<?php echo $cn->rid;?>" <?php if($_REQUEST['recruiter_name'] ==  $cn->rid){echo "selected = 'selected'";}?>><?php echo $cn->firmname;?></option>
            <?
			}
			?>
        </select>
        <input type="hidden" value="1" name="hid_srch" id="hid_srch" />
        <input type='submit' name="back" value='Search' class='button button-primary button-large'> <input type='button' name="back" value='View All' class='button button-primary button-large' onclick="window.location='<?php echo admin_url('admin.php?page=candidates'); ?>'">
    </form>
    
  </div>
  <?php
       
		if(count($row_Listtype)>0){
        ?>
  <?php if (isset($_REQUEST['message'])): ?>
  <div class="updated" style="width:100%; float:left;">
    <p>Successfully <?php echo $_REQUEST['message']; ?></p>
  </div>
  <?php endif; ?>
 
  <form name="listing" method="post" action="">
    <input type='submit' name="delete_selected" value='Delete Selected' class='button button-primary button-large' style='margin-bottom:10px;' onclick="return confirm('Are you sure you want to delete all selected records.');">
     <input type="hidden" name="tblnm" id="tblnm" value="<?php echo $table_name; ?>" />
    <input type="hidden" name="QueryString" id="QueryString" value="<?php echo $selList;?>" />
  <table class='wp-list-table widefat fixed striped posts ListinTable' style="width:100%;">
    <tr>
      <th class="manage-column ss-list-width" width="5%">Delete</th>
      <th class="manage-column ss-list-width" width="30%">Candidate Name</th>
      <th class="manage-column ss-list-width" width="20%">E-mail</th>
      <th class="manage-column ss-list-width" width="45%">Recruiter Name</th>
      <th width="10%">Options</th>
    </tr>
   
    <tbody  id="tableData">
   			
    </tbody>
  
  </table>
    </form>
  <?  } else{?>
  <div class="error">No Dealer Sale offer found.</div>
  <? } ?>
  <div id="CRM_pagination" class="subcls"></div>
</div>
<script>

getresult(1);
	
function getresult(val)
{jQuery("#tableData").html('<tr><td colspan="5"><div style="width:100%; float:left; color:red; font-size:18px;text-align:center;">Loading Data... Please wait...</div></td></tr>');
	//alert("<?php echo plugin_dir_url( __FILE__ ); ?>ajaxprocess_candidate.php");
	jQuery.ajax({
		type: "POST",
		url: "<?php echo plugin_dir_url( __FILE__ ); ?>ajaxprocess_candidate.php",
		data: "flag=paging&page_num="+val+"&tblnm="+jQuery("#tblnm").val()+"&QueryString="+jQuery("#QueryString").val(),			
		dataType: '',
		async: true,
		success:function(data){
			//alert(data);
			
			var newdata = data.split("@@@###@@@");
			jQuery("#tableData").html(newdata[0]);
			jQuery("#CRM_pagination").html(newdata[1]);
			jQuery(".subcls #Li"+val).addClass("active");
		}
	});	
}
</script>
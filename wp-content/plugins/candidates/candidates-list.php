<?php
global $wpdb;
$table_name = 'candidate';

$selList = "SELECT * from candidate where id > 0 $qryadd order by id DESC";
$row_Listtype = $wpdb->get_results($selList);	

//echo $selList;
?>
<link type="text/css" href="<?php echo plugin_dir_url( __FILE__ ); ?>/style-admin.css" rel="stylesheet" />
<div class="wrap">
  <div style="width:100%; float:left">
    <h1 class="wp-heading-inline">Candidates</h1>   
    <div style="height:20px; width:100%;">&nbsp;</div>
  </div>
  <?php
       if(count($row_Listtype)>0){
   ?>
  <form name="listing" method="post" action="">   
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
	
	jQuery.ajax({
		type: "POST",
		url: "<?php echo plugin_dir_url( __FILE__ ); ?>ajaxprocess_candidate.php",
		data: "flag=paging&page_num="+val+"&tblnm="+jQuery("#tblnm").val()+"&QueryString="+jQuery("#QueryString").val(),			
		dataType: '',
		async: true,
		success:function(data){
			var newdata = data.split("@@@###@@@");
			jQuery("#tableData").html(newdata[0]);
			jQuery("#CRM_pagination").html(newdata[1]);
			jQuery(".subcls #Li"+val).addClass("active");
		}
	});	
}
</script>
<?php
function manage_recruiters() {
	
	global $wpdb;
	$table_name = 'recruiter';
	
	$query = "SELECT * from $table_name where rid>0";	
	
	$query .= " order by recruiter.rdate desc,firmname";
	
	$rows = $wpdb->get_results($query);
    ?>
    <link type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/recruiters/style-admin.css" rel="stylesheet" />
    <script type='text/javascript' src='<?php echo WP_PLUGIN_URL; ?>/recruiters/validation.js'></script>
    <div class="wrap">
        <h1 class="wp-heading-inline">Manage Recruiters
        	<a class="page-title-action" href="<?php echo admin_url('admin.php?page=add_update_recruiters'); ?>">Add New</a>
        </h1>
        <?php if ($_REQUEST['msg'] != ""): ?><div class="updated"><p>Recruiter <?php echo $_REQUEST['msg']; ?> successfully.</p></div><?php endif; ?>
        
        
        <?php if(count($rows)>0) { ?>
        <table class='wp-list-table widefat fixed striped posts'>
        	<thead>
                <tr>
                    <th width="10%" class="manage-column ss-list-width" align="center" style="text-align:center">Approval</th>
                    <th width="25%" class="manage-column ss-list-width">Recruiter Name</th>
                    <th width="25%" class="manage-column ss-list-width">E-mail</th>
                    <th width="20%" class="manage-column ss-list-width">Country</th>
                    <th width="10%" class="manage-column ss-list-width">Options</th>
                </tr>
            </thead>
            <tbody id="tableData">
            <?php /*$i=1; foreach ($rows as $row) {
				$rid = $row->rid;
				$firmname = stripslashes($row->firmname);
				$email = stripslashes($row->email);
				$country = $row->country;
				$countrynm = stripslashes(GetOneValue("country","id",$row->country,"name"));
				$aprove = $row->aprove;
			?>
                <tr>
                	<td class="manage-column ss-list-width">
                    	<input type="hidden" name="aprovehid<?php echo $rid;?>" id="aprovehid<?php echo $rid;?>" value="<?php echo $aprove;?>" />
                    	<input type="checkbox" name="aprove<?php echo $rid;?>" id="aprove<?php echo $rid;?>" <?php if($aprove == 'YES'){echo "checked='checked'";}?> onchange="return ApproveRecruiter('<?php echo $rid;?>','<?php echo $aprove;?>','<?php echo plugin_dir_url( __FILE__ ); ?>');">
                    </td>
                    <td class="manage-column ss-list-width"><?php echo $firmname; ?></td>
                    <td class="manage-column ss-list-width"><?php echo $email; ?></td>
                    <td class="manage-column ss-list-width"><?php echo $countrynm; ?></td>
                    <td>
                    	<a href="<?php echo admin_url('admin.php?page=add_update_recruiters&id=' . $rid); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/edit.png" alt="Edit"></a>
                        <a onclick="deleteRecruiter('<?php echo admin_url('admin.php?page=manage_recruiters&did=' . $rid); ?>');" style="cursor:pointer;"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/delete.png" alt="Delete"></a>
                    </td>
                </tr>
            <?php $i++; }*/ ?>
          	</tbody>
        </table>
        <?php } else { ?>
        	<div class="norecord">No Record Found.</div>
        <?php } ?>
        <div id="CRM_pagination" class="subcls"></div>
    </div>
    <input type="hidden" name="tblnm" id="tblnm" value="<?php echo $table_name; ?>" />
    <input type="hidden" name="QueryString" id="QueryString" value="<?php echo $query;?>" />

<script>

getresult(1);
	
function getresult(val)
{
	jQuery("#tableData").html('<tr><td colspan="5"><div style="width:100%; float:left; color:red; font-size:18px;text-align:center;">Loading Data... Please wait...</div></td></tr>');
	jQuery.ajax({
		type: "POST",
		url: "<?php echo plugin_dir_url( __FILE__ ); ?>ajaxprocess_recruiter.php",
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
<?php } ?>
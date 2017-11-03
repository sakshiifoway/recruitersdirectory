<?php
function manage_associations() {
	
	global $wpdb;
	$table_name = 'association_directory';
	
	$query = "SELECT * from $table_name";
	$rows = $wpdb->get_results($query);
	
	if ($_REQUEST['did']!='')
	{
		$wpdb->query("DELETE FROM $table_name where id='".$_REQUEST['did']."'");
		echo "<script>window.location.href='admin.php?page=manage_associations&msg=deleted'</script>";
	}
    ?>
    <link type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/association-directory/style-admin.css" rel="stylesheet" />
    <script type='text/javascript' src='<?php echo WP_PLUGIN_URL; ?>/association-directory/validation.js'></script>
    <div class="wrap">
        <h1 class="wp-heading-inline">Manage Associations
        	<a class="page-title-action" href="<?php echo admin_url('admin.php?page=add_update_association'); ?>">Add New</a>
        </h1>
        <?php if ($_REQUEST['msg'] != ""): ?><div class="updated"><p>Association <?php echo $_REQUEST['msg']; ?> successfully.</p></div><?php endif; ?>
        
        <?php if(count($rows)>0) { ?>
        <table class='wp-list-table widefat fixed striped posts'>
        	<thead>
                <tr>
                    <th width="40%" class="manage-column ss-list-width">Association</th>
                    <th width="20%" class="manage-column ss-list-width">Specialty</th>
                    <th width="15%" class="manage-column ss-list-width">Location</th>
                    <th width="10%" class="manage-column ss-list-width">Options</th>
                </tr>
            </thead>
            <tbody id="tableData">
            <?php $i=1; foreach ($rows as $row) {
				$id = $row->id;
				$association = stripslashes($row->association);
				$specialty = stripslashes($row->specialty);
				$location = $row->location;
			?>
                <tr>
                    <td class="manage-column ss-list-width"><?php echo $association; ?></td>
                    <td class="manage-column ss-list-width"><?php echo $specialty; ?></td>
                    <td class="manage-column ss-list-width"><?php echo $location; ?></td>
                    <td>
                    	<a href="<?php echo admin_url('admin.php?page=add_update_association&id=' . $id); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/edit.png" alt="Edit"></a>
                        <a onclick="deleteAssociation('<?php echo admin_url('admin.php?page=manage_associations&did=' . $id); ?>');" style="cursor:pointer;"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/delete.png" alt="Delete"></a>
                    </td>
                </tr>
            <?php $i++; } ?>
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
	jQuery("#tableData").html('<tr><td colspan="4"><div style="width:100%; float:left; color:red; font-size:18px;text-align:center;">Loading Data... Please wait...</div></td></tr>');
	jQuery.ajax({
		type: "POST",
		url: "<?php echo plugin_dir_url( __FILE__ ); ?>ajaxprocess_association.php",
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
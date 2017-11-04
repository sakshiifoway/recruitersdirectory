<?php
function manage_company() {
	
	global $wpdb;
	
	if($_REQUEST['flag'] == 'view_company')
	{
		include "view_company.php";
	}
	else
	{
		$table_name = 'company';
		
		$query = "SELECT * from $table_name where compid > 0";
		$rows = $wpdb->get_results($query);
		?>
		<link type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/company/style-admin.css" rel="stylesheet" />
		<script type='text/javascript' src='<?php echo WP_PLUGIN_URL; ?>/company/validation.js'></script>
		<div class="wrap">
			<h1 class="wp-heading-inline">Manage Company</h1>
			<?php if ($_REQUEST['msg'] != ""): ?><div class="updated"><p>Company <?php echo $_REQUEST['msg']; ?> successfully.</p></div><?php endif; ?>
			<?php if(count($rows)>0) { ?>
            <form id="mng_company" name="mng_company" method="post">
                <table class='wp-list-table widefat fixed striped posts'>
                    <thead>
                        <tr>
                            <th width="7%" class="manage-column ss-list-width" style="text-align:center;">Approve</th>
                            <th width="15%" class="manage-column ss-list-width">Company Name</th>
                            <th width="15%" class="manage-column ss-list-width">Name</th>
                            <th width="20%" class="manage-column ss-list-width">Email</th>
                            <th width="15%" class="manage-column ss-list-width">Phone</th>
                            <th width="15%" class="manage-column ss-list-width">Recruiter Name</th>
                        </tr>
                    </thead>
                    <tbody id="tableData">
                    </tbody>
                </table>
            </form>
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
			url: "<?php echo plugin_dir_url( __FILE__ ); ?>ajaxprocess_company.php",
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
<?php } } ?>
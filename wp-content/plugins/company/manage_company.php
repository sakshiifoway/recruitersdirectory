<?php
function manage_company() {
	
	global $wpdb;
	
	if($_REQUEST['flag'] == 'view_company')
	{
		include "view_company.php";
	}
	else if($_REQUEST['flag'] == 'recruiter-profile')
	{
		include "recruiter-profile.php";
	}
	else
	{
		$table_name = 'company';
		
		if(isset($_REQUEST['deleteselected']))
		{
			if(count($_REQUEST['deletechk'])>0)
			{
				foreach($_REQUEST['deletechk'] as $delcid)
				{
					$delqry = "DELETE FROM $table_name where compid='".$delcid."'";
					//$wpdb->query($delqry);
				}
			}
			$message = "deleted";
			echo "<script>window.location.href='admin.php?page=manage_company&msg=deleted'</script>";
		}
		
		if($_REQUEST['hid_srch']==1)
		{
			//print_r($_REQUEST);
			$qryadd = "";
			
			$srch_company = $_REQUEST['srch_company'];
			$srch_recruiter = $_REQUEST['srch_recruiter'];
			if($srch_company != ""){
				$qryadd.= " and company_name LIKE '%".$srch_company."%'";
			}if($srch_recruiter != ""){
				$qryadd.= " and rid = '".$srch_recruiter."'";
			}
		}

		$query = "SELECT * from $table_name where compid > 0 $qryadd";
		$rows = $wpdb->get_results($query);
		?>
		<link type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/company/style-admin.css" rel="stylesheet" />
		<script type='text/javascript' src='<?php echo WP_PLUGIN_URL; ?>/company/validation.js'></script>
		<div class="wrap">
			<h1 class="wp-heading-inline">Manage Company</h1>
            <div style="width:100%; float:left; border-bottom:1px solid #ccc; margin-bottom:15px; background-color:none; padding-bottom:10px;">
                <form name="company_frm" id="company_frm" method="post" action="">  	
                    <input type="text" name="srch_company" id="srch_company" placeholder="Company Name" value="<?php echo $_REQUEST['srch_company'];?>" style="border:1px solid #ddd; width:250px; height:28px; line-height:28px;"/>
                    <?php
						$sel_rec_can = "select *,r.rid as rec_id from recruiter r, company c where r.rid = c.rid and r.firmname != '' group by r.rid";
                        $row_rec_can = $wpdb->get_results($sel_rec_can);
					?>
                    <select name="srch_recruiter" id="srch_recruiter" style="margin-bottom:7px; width:250px;">
                        <option value="">Select Recruiter</option>
                        <?php 
						if(count($row_rec_can)>0)
						{
							foreach($row_rec_can as $cn){
							?>
								<option value="<?php echo $cn->rec_id;?>" <?php if($_REQUEST['srch_recruiter'] ==  $cn->rec_id){echo "selected = 'selected'";}?>><?php echo $cn->firmname;?></option>
							<?php
							}
						}
                        ?>
                    </select>
                    <input type="hidden" value="1" name="hid_srch" id="hid_srch" />
                    <input type='submit' name="back" value='Search' class='button button-primary button-large'> <input type='button' name="back" value='View All' class='button button-primary button-large' onclick="window.location='<?php echo admin_url('admin.php?page=manage_company'); ?>'">
                </form>
			</div>
            
			<?php if ($_REQUEST['msg'] != ""): ?><div class="updated"><p>Company <?php echo $_REQUEST['msg']; ?> successfully.</p></div><?php endif; ?>
			<?php if(count($rows)>0) { ?>
            <form id="mng_company" name="mng_company" method="post">
            	<input type="submit" class="button button-primary button-large" name="deleteselected" id="deleteselected" onclick="return deleteFunction();" value="Delete Selected" style='margin-bottom:10px; float:right;' />
                <table class='wp-list-table widefat fixed striped posts'>
                    <thead>
                        <tr>
                            <th width="7%" class="manage-column ss-list-width" style="text-align:center;">Approve</th>
                            <th width="18%" class="manage-column ss-list-width">Company Name</th>
                            <th width="16%" class="manage-column ss-list-width">Name</th>
                            <th width="20%" class="manage-column ss-list-width">Email</th>
                            <th width="14%" class="manage-column ss-list-width">Phone</th>
                            <th width="16%" class="manage-column ss-list-width">Recruiter Name</th>
                            <th width="8%" class="manage-column ss-list-width" style="text-align:center;">Delete
                            	<input type="checkbox" name="deleteall" id="deleteall" value="checkbox">
                            </th>
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
	jQuery(document).ready(function () {
		jQuery("#deleteall").click(function () {
			jQuery(".deletechk").prop('checked', jQuery(this).prop('checked'));
		});
		
		/*jQuery(".deletechk").change(function(){
			alert(1);
			if (!jQuery(this).prop("checked")){
				jQuery("#deleteall").prop("checked",false);
			}
		});*/
	});
	
	function deleteFunction()
	{
		if(jQuery("input[name='deletechk[]']").is(":checked"))
		{
			if(confirm('Are you sure you want to delete all selected records?')) {
				return true;
			}
			else {
				return false;
			}
		}
		else
		{
			alert('Please select atleast one checkbox.');
			return false;
		}		
	}
		
	function getresult(val)
	{
		jQuery("#deleteall").prop("checked",false);
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
<?php
function add_update_association()
{
	global $wpdb;
	
    $table_name =  'association_directory';
    $id = $_GET["id"];

	if (isset($_POST['submit'])) {
		
		//print_r($_REQUEST);exit;
		foreach ($_POST as $key => $val)
		{
			$$key = addslashes(trim($val)); 
		}
		if ($_POST['id']>0) {
			$update = "UPDATE $table_name set
							association = '".$association."',
							specialty = '".$specialty."',
							location = '".$location."',
							link_url = '".$link_url."'
						WHERE id = '".$id."'";
			$wpdb->query($update);
			$message = "Association Detail updated successfully.";
		}
		else {
			// insert into table
			$insert = "INSERT INTO $table_name set
							association = '".$association."',
							specialty = '".$specialty."',
							location = '".$location."',
							link_url = '".$link_url."'";
			//echo $insert;//exit;
			$wpdb->query($insert);
			$message ="inserted";
			
			echo "<script>window.location.href='admin.php?page=manage_associations&msg=$message'</script>";
		}
	}
	
	if($id)
	{
        $associations = $wpdb->get_results("SELECT * from $table_name where id='".$id."'");
		foreach ($associations[0] as $key => $val) {
			$$key = stripslashes(trim($val)); 
		}
	}
    ?>
    <link type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/association-directory/style-admin.css" rel="stylesheet" />
    <script type='text/javascript' src='<?php echo WP_PLUGIN_URL; ?>/association-directory/validation.js'></script>
    <div class="wrap">
        <h1 class="wp-heading-inline">
			<?php if($id=="") { ?>Add<?php } else { ?>Edit<?php } ?> Association
        	<a class="page-title-action" href="<?php echo admin_url('admin.php?page=manage_associations'); ?>">Go To Listing Page</a>
        </h1>
        <?php if (isset($message)): ?><div class="updated"><p><?php echo $message; ?></p></div><?php endif; ?>
        <form method="post" id="association_register" enctype="multipart/form-data">
        	<input type="hidden" id="id" name="id" value="<?php echo $id; ?>" />
            <table class='wp-list-table widefat fixed'>
            	<tr>
                    <td class="ss-th-width">(*) Marked fields are mandatory.</td>
                </tr>
                <tr>
                	<td>
                    	<table width="100%" class='wp-list-table widefat fixed AddTable' style="border:0">
                            <tr>
                                <td class="ss-th-width">Association <span class="red">*</span></td>
                                <td><input type="text" name="association" id="association" value="<?php echo $association; ?>" /></td>
                            </tr>
                            <tr>
                                <td class="ss-th-width">Specialty <span class="red">*</span></td>
                                <td><input type="text" name="specialty" id="specialty" value="<?php echo $specialty; ?>" /></td>
                            </tr>
                            <tr>
                                <td class="ss-th-width">Location <span class="red">*</span></td>
                                <td><input type="text" name="location" id="location" value="<?php echo $location; ?>" /></td>
                            </tr>
                            <tr>
                                <td class="ss-th-width">Link <span class="red">*</span></td>
                                <td><input type="text" name="link_url" id="link_url" value="<?php echo $link_url; ?>" /></td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td align="right"><input type='submit' name="submit" value='Save' class='button-primary' onclick="return checkAssociation();" ></td>
                </tr>
            </table>
        </form>
    </div>
<?php } ?>
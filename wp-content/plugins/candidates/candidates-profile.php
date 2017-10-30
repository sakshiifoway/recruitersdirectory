<?php    
	$id = $_REQUEST['id'];
	if($id){$page_flag = "Edit";}else{$page_flag = "Add";} 
    
	 global $wpdb;
	 
	$sel_candidate = "SELECT * from candidate where id  = '".$id."'";
	$row_candidate = $wpdb->get_results($sel_candidate);	
	// echo $product_id;
?>
<link type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/dealer-sales/style-admin.css" rel="stylesheet" />
<script type='text/javascript' src='<?php echo WP_PLUGIN_URL; ?>/dealer-sales/validation.js'></script>
<div class="wrap">
  <h1 class="wp-heading-inline"><?php echo $page_flag;?> Candidate Profile</h1>
 
  <div style="height:20px; width:100%;">&nbsp;</div>
  <?php if (isset($_REQUEST['message'])): ?>
  <div class="updated"  style="width:100%; float:left;">
    <p>Successfully <?php echo $_REQUEST['message']; ?></p>
  </div>
  <?php endif; ?>
  <form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>" enctype="multipart/form-data" name="DealerSaleFrm">
    <table class='wp-list-table widefat fixed AddTable' style="width:100%;">
     
      <tr>
        <td><table width="100%" class='wp-list-table widefat fixed AddTable' style="border:0">
            
           
            <tr>
              <td width="13%" class="ss-th-width heading">Name</td>
              <td width="87%"><?php echo $row_candidate[0]->name;?></td>
            </tr>
            <tr>
              <td class="ss-th-width heading" valign="top">Email</td>
              <td><?php echo $row_candidate[0]->email;?></td>
            </tr>
            <tr>
              <td class="ss-th-width heading">Phone</td>
              <td><?php echo $row_candidate[0]->phone;?></td>
            </tr>
           <tr>
              <td class="ss-th-width heading">Message</td>
              <td><?php echo $row_candidate[0]->message;?></td>
            </tr>
           
            <tr>
              <td colspan="2">&nbsp;</td>
            </tr>
            <tr>
              <td colspan="2" align="center"><input type='button' name="back" value='Back' class='button button-primary button-large' onclick="history.back();"></td>
            </tr>
          </table></td>
      </tr>
    </table>
  </form>
</div>
<script type="text/javascript">
		jQuery(document).ready(function(){
			jQuery('#date').datepicker({
				dateFormat: 'yy-mm-dd'
			});
		});
	</script>

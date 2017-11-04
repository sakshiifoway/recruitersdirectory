<?php
$table_name =  'company';
$id = $_GET["id"];

if($id)
{
	$company = $wpdb->get_results("SELECT * from $table_name where compid='".$id."'");
	foreach ($company[0] as $key => $val) {
		$$key = stripslashes(trim($val)); 
	}
	$recruiter_name = stripslashes(GetOneValue('recruiter','rid',$rid,'firmname'));
}
?>
<link type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/company/style-admin.css" rel="stylesheet" />
<div class="wrap">
	<h1 class="wp-heading-inline">
		View Company
		<a class="page-title-action" href="<?php echo admin_url('admin.php?page=manage_company'); ?>">Go To Listing Page</a>
	</h1>
	<table class='wp-list-table widefat fixed'>
		<tr>
			<td>
				<table width="100%" class='wp-list-table widefat fixed AddTable' style="border:0">
					<tr>
						<td class="ss-th-width">Company Name</td>
						<td><?php echo $company_name; ?></td>
					</tr>
					<tr>
						<td class="ss-th-width">Name</td>
						<td><?php echo $name; ?></td>
					</tr>
					<tr>
						<td class="ss-th-width">Email</td>
						<td><?php echo $email; ?></td>
					</tr>
					<tr>
						<td class="ss-th-width">Phone</td>
						<td><?php echo $phone; ?></td>
					</tr>
					<tr>
						<td class="ss-th-width">Mesage</td>
						<td><?php echo $message; ?></td>
					</tr>
					<tr>
						<td class="ss-th-width">Recruiter Name</td>
						<td><?php echo $recruiter_name; ?></td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
</div>
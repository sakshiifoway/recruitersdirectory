<?php
/**
 * Template Name: Association Directory
*/
get_header(); ?>

<?php
echo "<b>";
the_title();
echo "</b><br>";

$query = "SELECT * from association_directory";
$rows = $wpdb->get_results($query);
if(count($rows)>0) {
	$i=1;
	foreach ($rows as $row) {
		$id = $row->id;
		$association = stripslashes($row->association);
		$specialty = stripslashes($row->specialty);
		$location = $row->location;
		$link_url = $row->link_url;
		
		echo "<p>".$i.") <a href='".$link_url."' target='_blank'>".$association."</a> --> ".$specialty." --> ".$location."</p>";
		$i++;
	}
}
?>
<?php get_footer();
<?php
/**
 * Template Name: Association Directory
*/
get_header(); ?>


<!--- Inner Start --->
<section class="inner_page">
	<div class="container">
        <ul class="breadcrum">
            <li><a href="<?php bloginfo( 'home' ); ?>/">Home </a>&rarr;</li>
            <li><?php the_title(); ?></li>
        </ul>
    	<h1><?php the_title(); ?></h1>
        <div class="directory-table">
            <table>
                <thead>
                    <tr>
                        <th>Association</th>
                        <th>Specialty</th>
                        <th>Location</th>
                    </tr>
                </thead>
                <tbody>
                	<?php
						$query = "SELECT * from association_directory";
						$rows = $wpdb->get_results($query);
						if(count($rows)>0) {
							$i=1;
							foreach ($rows as $row) {
								$id = $row->id;
								$association = stripslashes($row->association);
								$specialty = stripslashes($row->specialty);
								$location = stripslashes($row->location);
								$link_url = $row->link_url;
					?>
                    <tr>
                        <td><a href="<?php echo $link_url; ?>" target="_blank"><?php echo $association; ?></a></td>
                        <td><?php echo $specialty; ?></td>
                        <td><?php echo $location; ?></td>
                    </tr>
                    <?php $i++; } }	else { ?>
                    <tr><td colspan="3">No Data Found</td></tr>
					<?php }	?>
                </tbody>
        	</table>
        </div>
    </div>
</section>
<!--- Inner End --->

<?php get_footer();
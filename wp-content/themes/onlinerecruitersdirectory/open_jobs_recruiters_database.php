<?php
/**
 * Template Name: Open Jobs Recruiters Database
*/
get_header(); ?>

<!--- Inner Start --->
<section class="inner_page">
	<div class="container">
        <ul class="breadcrum">
            <li><a href="<?php bloginfo( 'home' ); ?>/">Home </a>&rarr;</li>
            <li><?php the_title(); ?></li>
        </ul>
        <?php
			$state_query = "SELECT * from state WHERE name NOT IN ('Guam','Northern Mariana Islands','Other','Palau','Virgin Island') order by name";
			$state_rows = $wpdb->get_results($state_query);
			$state_cnt = count($state_rows);
			$i=0;
			if($state_cnt>0) {
				$state_cnt_half = ceil($state_cnt/4);
		?>
        <h1>Recruiting Firm by State</h1>
    	<div class="job-center">
            <div class="job-state-list">
                <ul>
                	<?php
						foreach ($state_rows as $state_row) {
							$sid = $state_row->id;
							$sname = stripslashes($state_row->name);
							$s_slug = stripslashes($state_row->state_slug);
					?>
                    <li><a href="<?php echo home_url(); ?>/job_seeker/?sid=<?php echo $sid; ?>&location=<?php echo $s_slug; ?>"><i class="fa fa-long-arrow-right"></i><?php echo $sname; ?></a></li>
                    <?php
                    		$i++;
							if($i == $state_cnt_half)
							{
								echo '</ul><ul>';
								$i=0;
							}							
						}
					?>
                </ul>
	        </div>
    	</div>
        <?php } ?>
        <div class="blankdiv"><br /></div>
        <?php
			$occupation_query = "select * from category order by categoryname";
			$occupation_rows = $wpdb->get_results($occupation_query);
			$occupation_cnt = count($occupation_rows);
			$j=0;
			if($occupation_cnt>0) {
				$occupation_cnt_half = ceil($occupation_cnt/4);
		?>
        <h1>Recruiting Firm by Sector</h1>
    	<div class="job-center">
            <div class="job-state-list">
                <ul>
                	<?php
						foreach ($occupation_rows as $occupation_row) {
							$cid = $occupation_row->categoryid;
							$occupation_name = stripslashes($occupation_row->categoryname);
							$occupation_slug = stripslashes($occupation_row->category_slug);	
					?>
                    <li><a href="<?php echo home_url(); ?>/job_seeker/?cid=<?php echo $cid; ?>&sector=<?php echo $occupation_slug; ?>"><i class="fa fa-long-arrow-right"></i><?php echo $occupation_name; ?></a></li>
                    <?php
							$j++;
							if($j == $occupation_cnt_half)
							{
								echo '</ul><ul>';
								$j=0;
							}
						}
					?>
                </ul>
	        </div>
    	</div>
        <?php } ?>
    </div>
</section>
<!--- Inner End --->
<?php get_footer();
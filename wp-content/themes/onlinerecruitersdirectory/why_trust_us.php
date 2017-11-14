Why Trust Us?

<p><?php echo get_field('wtu_line_1', 286); ?></p>
<p><?php echo get_field('wtu_line_2', 286); ?></p>
<p><?php echo get_field('wtu_line_3', 286); ?></p>
<p><?php echo get_field('wtu_line_4', 286); ?></p>
<p><?php echo get_field('wtu_line_5', 286); ?></p>

<p>&nbsp;</p>
<?php
	$args = array( 'post_type' => 'partnerlogo', 'order' => 'asc');
	$loop = new WP_Query( $args );
	while ( $loop->have_posts() ) : $loop->the_post();
	
		if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
		?>
			<img src="<?php the_post_thumbnail_url(); ?>" />
		<?php
		}
	
	endwhile;
?>
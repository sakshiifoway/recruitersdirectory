<?php
/**
 * Template Name: Articles
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
    	<div class="job-center">
    	   <div class="articles-section">
           	<div class="col-sm-1 fl">
            	<div class="articles-hiring">
                	<h6>Hiring Manager</h6>
                    <ul>
                    	<?php
							$args = array('child_of' => 96, 'hide_empty'=>0);
							$categories = get_categories( $args );
							foreach($categories as $category) { 
								$hmcat_cnt = $category->count;
						?>
                    	<li><a href="<?php echo get_category_link( $category->term_id ); ?>"><?php echo $category->name." (".$hmcat_cnt.")"; ?></a></li>
                        <?php } ?>
                    </ul>
                </div>                
            </div>
            <div class="col-sm-1 fr">
            	<div class="articles-job-seeker">
                	<h6>Job Seeker</h6>
                    <ul>
                    	<?php
							$args = array('child_of' => 97, 'hide_empty'=>0);
							$categories = get_categories( $args );
							foreach($categories as $category) {
								$jscat_cnt = $category->count;
						?>
                    	<li>
                        	<?php if($jscat_cnt>0){ ?><a href="<?php echo get_category_link( $category->term_id ); ?>"><?php echo $category->name." (".$jscat_cnt.")"; ?></a><?php } else { ?>
                            <?php echo $category->name." (".$jscat_cnt.")"; ?><?php } ?>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
           </div>
    	</div> 
    </div>
</section>
<!--- Inner End --->

<?php get_footer();
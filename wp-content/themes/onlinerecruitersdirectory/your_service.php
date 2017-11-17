<?php
/**
 * Template Name: At your service
*/
get_header();
while ( have_posts() ) : the_post(); ?>

<!--- Inner Start --->
<section class="inner_page">
	<div class="container">
        <ul class="breadcrum">
            <li><a href="<?php bloginfo( 'home' ); ?>/">Home </a>&rarr;</li>
            <li><?php the_title(); ?></li>
        </ul>
        <div class="inner_page_content"><?php the_content(); ?></div>
    </div>
</section>
<!--- Inner End --->

<?php endwhile; 
get_footer();
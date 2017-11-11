<?php
/**
 * Template Name: Contact Us
*/
get_header();
while ( have_posts() ) : the_post();
?>

<!--- Inner Start --->
<section class="inner_page">
	<div class="container">
    <ul class="breadcrum">
    	<li><a href="<?php bloginfo( 'home' ); ?>/">Home </a>&rarr;</li>
        <li><?php the_title(); ?></li>
    </ul>
    <h1><?php the_title(); ?></h1>
     <div class="contact-center">
     	<div class="contact-form">
            <?php the_content(); ?>
        </div>
     </div>   
    </div>
</section>
<!--- Inner End --->

<?php
endwhile; 
get_footer();
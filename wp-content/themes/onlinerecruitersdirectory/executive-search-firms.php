<?php
/**
 * Template Name: Executive Search Firms
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
		<?php
            $args = array(
                'post_type' => 'question-answer',
                'posts_per_page' => -1,
                'order' => 'asc'
            );
            $obituary_query = new WP_Query($args);
            
            while ($obituary_query->have_posts()) : $obituary_query->the_post();
		?>
        <div class="executive_question">Q : <?php the_title(); ?></div>
        <div class="executive_answer"><?php the_content(); ?></div>
        <?php endwhile; ?>
    </div>
</section>
<!--- Inner End --->

<?php get_footer();
<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<!--- Inner Start --->
<section class="inner_page">
	<div class="container">
    	<?php while ( have_posts() ) : the_post(); ?>
        <?php //the_content();
			$my_postid = get_the_ID();
			$content_post = get_post($my_postid);
			$cat_details = get_the_category($my_postid);
			$single_title = trim(stripslashes($content_post->post_title));
			$single_content = trim(stripslashes($content_post->post_content));
			$single_content = apply_filters('the_content', $single_content);
			$single_content = str_replace(']]>', ']]>', $single_content);
		?>
        <ul class="breadcrum">
            <li><a href="<?php bloginfo( 'home' ); ?>/">Home </a>&rarr;</li>
            <li><a href="<?php bloginfo( 'home' ); ?>/articles/">Articles </a>&rarr;</li>
	        <li><a href="<?php echo get_category_link( $cat_details[0]->cat_ID ); ?>"><?php echo $cat_details[0]->name; ?></a>&rarr;</li>
            <li><?php echo $single_title; ?></li>
        </ul>
    	<h1><?php echo $single_title; ?></h1>
    	<?php echo $single_content; ?>
        <?php endwhile; ?>
    </div>
</section>
<!--- Inner End --->

<?php /*?><div class="wrap">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
			// Start the Loop 
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/post/content', get_post_format() );

				// If comments are open or we have at least one comment, load up the comment template.
				//if ( comments_open() || get_comments_number() ) :
//					comments_template();
//				endif;
//
//				the_post_navigation( array(
//					'prev_text' => '<span class="screen-reader-text">' . __( 'Previous Post', 'twentyseventeen' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Previous', 'twentyseventeen' ) . '</span> <span class="nav-title"><span class="nav-title-icon-wrapper">' . twentyseventeen_get_svg( array( 'icon' => 'arrow-left' ) ) . '</span>%title</span>',
//					'next_text' => '<span class="screen-reader-text">' . __( 'Next Post', 'twentyseventeen' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Next', 'twentyseventeen' ) . '</span> <span class="nav-title">%title<span class="nav-title-icon-wrapper">' . twentyseventeen_get_svg( array( 'icon' => 'arrow-right' ) ) . '</span></span>',
//				) );

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->
	<?php //get_sidebar(); ?>
</div><!-- .wrap --><?php */?>

<?php get_footer();
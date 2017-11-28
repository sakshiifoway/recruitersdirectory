<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
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
    <ul class="breadcrum">
    	<li><a href="<?php bloginfo( 'home' ); ?>/">Home </a>&rarr;</li>
        <li><a href="<?php bloginfo( 'home' ); ?>/articles/">Articles </a>&rarr;</li>
        <li><?php echo single_cat_title( '', false ); ?></li>
    </ul>
    <h1><?php echo single_cat_title( '', false ); ?></h1>
    <div class="directory-table archive-list">
    	<?php if ( have_posts() ) : ?>
    	<table>
            <tbody>
            	<?php while ( have_posts() ) : the_post(); ?>
                <tr>
                  <td><?php the_title( '<i class="fa fa-long-arrow-right"></i><a href="' . esc_url( get_permalink() ) . '">', '</a>' ); ?></td>
                </tr>
                <?php endwhile; ?>     
            </tbody>
		</table>
        <?php endif; ?>
    </div>
    </div>
</section>
<!--- Inner End --->


<?php /*?><div class="wrap">

	<?php if ( have_posts() ) : ?>
		<header class="page-header">
			<?php
				//the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="taxonomy-description">', '</div>' );
			?>
		</header><!-- .page-header -->
	<?php endif; ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		if ( have_posts() ) : ?>
			<?php
			// Start the Loop 
			while ( have_posts() ) : the_post();

				//
//				 * Include the Post-Format-specific template for the content.
//				 * If you want to override this in a child theme, then include a file
//				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
//				 
				get_template_part( 'template-parts/post/content', get_post_format() );

			endwhile;

			//the_posts_pagination( array(
//				'prev_text' => twentyseventeen_get_svg( array( 'icon' => 'arrow-left' ) ) . '<span class="screen-reader-text">' . __( 'Previous page', 'twentyseventeen' ) . '</span>',
//				'next_text' => '<span class="screen-reader-text">' . __( 'Next page', 'twentyseventeen' ) . '</span>' . twentyseventeen_get_svg( array( 'icon' => 'arrow-right' ) ),
//				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentyseventeen' ) . ' </span>',
//			) );

		else :

			get_template_part( 'template-parts/post/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->
	<?php //get_sidebar(); ?>
</div><!-- .wrap --><?php */?>


<?php get_footer();

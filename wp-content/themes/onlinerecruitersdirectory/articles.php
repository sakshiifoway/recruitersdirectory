<?php
/**
 * Template Name: Articles
*/

get_header();
?>

<?php
echo "<b>Hiring Manager</b>";
$args = array('child_of' => 96, 'hide_empty'=>0);
$categories = get_categories( $args );
foreach($categories as $category) { 
    echo '<p><a href="' . get_category_link( $category->term_id ) . '" title="' . sprintf( __( "View all posts in %s" ), $category->name ) . '" ' . '>' . $category->name.' ('.$category->count.') </a> </p> ';
}

echo "<br><br>";

echo "<b>Job Seeker</b>";
$args = array('child_of' => 97, 'hide_empty'=>0);
$categories = get_categories( $args );
foreach($categories as $category) { 
    echo '<p><a href="' . get_category_link( $category->term_id ) . '" title="' . sprintf( __( "View all posts in %s" ), $category->name ) . '" ' . '>' . $category->name.' ('.$category->count.') </a> </p> ';
}
?>

<?php get_footer();
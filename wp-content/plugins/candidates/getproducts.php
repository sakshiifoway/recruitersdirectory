<?php
include "../../../wp-load.php";
global $wpdb;

$type_id = $_REQUEST['type_id'];
$collection_id = $_REQUEST['collection_id'];
$response = '<option value="">Select Product</option>';
 $args = array(
        'post_type' => 'product',
        'tax_query' => array(
            'relation' => 'AND',
            array(
                'taxonomy' => 'types',
                'field' => 'term_id',
                'terms' => array( $type_id )
            ),
            array(
                'taxonomy' => 'collection',
                'field' => 'term_id',
                'terms' => array($collection_id),
                'operator' => 'IN'
            )
        )
    );
	//print_r($args);
	$the_query = new WP_Query( $args );
	while ( $the_query->have_posts() ) : $the_query->the_post();
    //content
	$response.= "<option value='".$post->ID."'>".get_the_title($post->ID)."</option>";
	//echo "<br>";
	endwhile;
	

	
echo $response;
?>
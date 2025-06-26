<?php
//post status and options
$post = array(
	  'comment_status' => 'closed',
	  'ping_status' =>  'closed' ,
	  'post_author' => 1,
	  'post_date' => gmdate('Y-m-d H:i:s'),
	  'post_name' => 'Home',
	  'post_status' => 'publish' ,
	  'post_title' => 'Home',
	  'post_type' => 'page',
);  

//insert page and save the id
$newvalue = wp_insert_post( $post, false );
if ( $newvalue && ! is_wp_error( $newvalue ) ){
	update_post_meta( $newvalue, '_wp_page_template', 'template-business.php' );
	
	// Use a static front page
	$args = array(
		'post_type' => 'page',
		'title' => 'Home',
		'post_status' => 'publish',
		'posts_per_page' => 1,
	);
	$home_query = new WP_Query( $args );
	
	if ( $home_query->have_posts() ) {
		$home_query->the_post();
		update_option( 'show_on_front', 'page' );
		update_option( 'page_on_front', get_the_ID() );
		wp_reset_postdata(); // Reset post data after query
	}
}
?>
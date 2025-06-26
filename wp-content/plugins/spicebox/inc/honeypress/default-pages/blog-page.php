<?php
$post = array(
	  'comment_status' => 'closed',
	  'ping_status' =>  'closed' ,
	  'post_author' => 1,
	  'post_date' => gmdate('Y-m-d H:i:s'),
	  'post_name' => 'Blog',
	  'post_status' => 'publish' ,
	  'post_title' => 'Blog',
	  'post_type' => 'page',
); 

// Insert page and save the ID
$newvalue = wp_insert_post( $post, false );
if ( $newvalue && ! is_wp_error( $newvalue ) ) {
	update_post_meta( $newvalue, '_wp_page_template', 'page.php' );
	
	// Use WP_Query instead of get_page_by_title() to retrieve the page
	$args = array(
		'post_type' => 'page',
		'title' => 'Blog',
		'posts_per_page' => 1,
	);
	$query = new WP_Query( $args );
	
	if ( $query->have_posts() ) {
		$query->the_post();
		$page_id = get_the_ID();
		wp_reset_postdata();
		
		// Set the static front page
		update_option( 'show_on_front', 'page' );
		update_option( 'page_for_posts', $page_id );
	}
}
?>
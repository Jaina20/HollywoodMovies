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

// Insert the page and save the ID
$newvalue = wp_insert_post($post, false);
if ($newvalue && !is_wp_error($newvalue)) {
    update_post_meta($newvalue, '_wp_page_template', 'page.php');

    // Use WP_Query to get the page instead of get_page_by_title()
    $args = array(
        'post_type' => 'page',
        'title'     => 'Blog',
        'post_status' => 'publish',
        'posts_per_page' => 1,
    );
    $query = new WP_Query($args);

    // Check if the page exists
    if ($query->have_posts()) {
        $query->the_post();
        $page = get_post(); // Get the current post object
        
        // Set the static front page
        update_option('show_on_front', 'page');
        update_option('page_for_posts', $page->ID);

        // Reset post data after WP_Query
        wp_reset_postdata();
    }
}
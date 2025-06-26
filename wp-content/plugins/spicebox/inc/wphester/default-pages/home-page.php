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

// Insert page and save the ID
$newvalue = wp_insert_post($post, false);
if ($newvalue && !is_wp_error($newvalue)) {
    update_post_meta($newvalue, '_wp_page_template', 'template-business.php');
    
    // Use a static front page
    $page_query = new WP_Query(array(
        'post_type' => 'page',
        'title' => 'Home',
        'posts_per_page' => 1,
    ));

    if ($page_query->have_posts()) {
        $page_query->the_post();
        $page_id = get_the_ID();

        // Update options to set the front page
        update_option('show_on_front', 'page');
        update_option('page_on_front', $page_id);
    }

    // Reset post data after WP_Query
    wp_reset_postdata();
}
?>
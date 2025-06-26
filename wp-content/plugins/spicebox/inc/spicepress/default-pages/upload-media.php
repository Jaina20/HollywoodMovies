<?php
$file = 'https://spicethemes.com/theme-logo/spicepress/portfolio';
$ImagePath = 'https://spicethemes.com/theme-logo/spicepress/portfolio';
if (wp_get_theme()->name == 'SpicePress Dark'){
	$images = array($ImagePath.'/gallery1.jpg', $ImagePath.'/gallery2.jpg',	$ImagePath.'/gallery3.jpg',	$ImagePath.'/gallery4.jpg',	$ImagePath.'/gallery5.jpg',	$ImagePath.'/gallery6.jpg',	$ImagePath.'/gallery7.jpg',	$ImagePath.'/gallery8.jpg',	$ImagePath.'/gallery9.jpg',	$ImagePath.'/gallery10.jpg', $ImagePath.'/gallery11.jpg', $ImagePath.'/gallery12.jpg', $ImagePath. '/spicepress-dark.png'
	);
}
else{
	$images = array( $ImagePath.'/gallery1.jpg', $ImagePath.'/gallery2.jpg', $ImagePath.'/gallery3.jpg', $ImagePath.'/gallery4.jpg', $ImagePath.'/gallery5.jpg', $ImagePath.'/gallery6.jpg', $ImagePath.'/gallery7.jpg', $ImagePath.'/gallery8.jpg', $ImagePath.'/gallery9.jpg', $ImagePath.'/gallery10.jpg', $ImagePath.'/gallery11.jpg', $ImagePath.'/gallery12.jpg',	$ImagePath. '/logo.png'
	);
}

foreach($images as $name) {
	$filename = basename($name);
	$response = wp_remote_get($name);
    if (is_wp_error($response)) {
        continue; // Skip to the next image if there's an error
    }
    $image_data = wp_remote_retrieve_body($response);
    if (!empty($image_data)) {
		$upload_file = wp_upload_bits($filename, null, $image_data);
		if (!$upload_file['error']) {
			$wp_filetype = wp_check_filetype($filename, null );
			$attachment = array(
				'post_mime_type' => $wp_filetype['type'],
				'post_parent' => $parent_post_id,
				'post_title' => preg_replace('/\.[^.]+$/', '', $filename),
				'post_excerpt' => 'Portfolio caption',
				'post_status' => 'inherit'
			);
			$ImageId[] = $attachment_id = wp_insert_attachment( $attachment, $upload_file['file'], $parent_post_id );
			
			if (!is_wp_error($attachment_id)) {
				require_once(ABSPATH . "wp-admin" . '/includes/image.php');
				$attachment_data = wp_generate_attachment_metadata( $attachment_id, $upload_file['file'] );
				wp_update_attachment_metadata( $attachment_id,  $attachment_data );
			}
		}
	}
}
update_option( 'portfolio_media_id', $ImageId );
?>
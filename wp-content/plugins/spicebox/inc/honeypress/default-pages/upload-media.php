<?php

$ImagePath = 'https://spicethemes.com/theme-logo/honeypress';
$theme = wp_get_theme();
if ($theme->name == 'HoneyWaves') {
    $images = array(
        $ImagePath . '/honeywaves-logo.png',
    );
} elseif ($theme->name == 'Radix Multipurpose') {
    $images = array(
        $ImagePath . '/radix-multipurpose-logo.png',
    );
} elseif ($theme->name == 'Bizhunt') {
    $images = array(
        $ImagePath . '/bizhunt-logo.png',
    );
} elseif ($theme->name == 'Tromas') {
    $images = array(
        $ImagePath . '/tromas-logo.png',
    );
} elseif ($theme->name == 'HoneyBee') {
    $images = array(
        $ImagePath . '/honeybee-logo.png',
    );
} elseif ($theme->name == 'Honeypress Dark') {
    $images = array(
        $ImagePath . '/honeypress-dark.png',
    );
} else {
    $images = array(
        $ImagePath . '/logo.png',
    );
}

foreach ($images as $name) {
    $filename = basename($name);
    $response = wp_remote_get($name);
    if (is_wp_error($response)) {
        continue; // Skip to the next image if there's an error
    }
    $image_data = wp_remote_retrieve_body($response);
    if (!empty($image_data)) {
        $upload_file = wp_upload_bits($filename, null, $image_data);
        if (!$upload_file['error']) {
            $wp_filetype = wp_check_filetype($filename, null);
            $attachment = array(
                'post_mime_type' => $wp_filetype['type'],
                'post_parent' => $parent_post_id,
                'post_title' => preg_replace('/\.[^.]+$/', '', $filename),
                'post_status' => 'inherit'
            );
            $ImageId[] = $attachment_id = wp_insert_attachment($attachment, $upload_file['file'], $parent_post_id);

            if (!is_wp_error($attachment_id)) {
                require_once(ABSPATH . 'wp-admin/includes/image.php');
                $attachment_data = wp_generate_attachment_metadata($attachment_id, $upload_file['file']);
                wp_update_attachment_metadata($attachment_id, $attachment_data);
            }
        }
    }
}
update_option('innofit_media_id', $ImageId);
$MediaId = get_option('innofit_media_id');
set_theme_mod('custom_logo', $MediaId[0]);
set_theme_mod('header_textcolor', "blank");
?>
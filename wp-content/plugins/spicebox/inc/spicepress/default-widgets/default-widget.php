<?php
$activate = array(
        'sidebar-1' => array(
            'search-1',
            'recent-posts-1',
            'archives-1',
        ),
        'footer_widget_area_left' => array(
            'text-1',
        ),
        'footer_widget_area_right' => array(
            'recent-posts-2',
        ),
        'footer_widget_area_center' => array(
            'categories-2'
        ),
        'wdl_contact_page_sidebar' => array(
            'search-2',
            'archives-2',
        ),
    );

    $logo_attachment_id = spiceb_save_image_to_media_library(SPICEB_PLUGIN_URL.'inc/spicepress/images/logo-footer.png');
    $attributes = array(
       'alt'   => esc_attr__('Logo', 'spicebox'),
       'class' => 'img-responsive',
    );

    // Prepare the widget text with the logo.
    $widget_text_content = '<p>' . wp_get_attachment_image(esc_attr($logo_attachment_id), 'full', false, $attributes) . '<br>Aenean Donec sed odio dui. Donec sed odio dui. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Curabitur blandit tempus porttitor ligula nibhes, molestie id vivers dapibus iaculis.</p>
        <div class="media widget-address"><div class="addr-icon"><i class="fa-solid fa-location-dot"></i></div><div class="media-body"><address>SpicePress Theme<br><abbr>Chestnut Road, California (USA)</abbr></address></div></div>';

    /* the default titles will appear */
    update_option('widget_text', array(
        1 => array('title' => '',
        'text'=> $widget_text_content
    ), 
        ));
        
    update_option('widget_recent-posts', array(
        1 => array('title' => 'Recent Posts'), 
        2 => array('title' => 'Recent Posts')));

    update_option('widget_categories', array(
        1 => array('title' => 'Categories'), 
        2 => array('title' => 'Categories')));

    update_option('widget_archives', array(
        1 => array('title' => 'Archives'), 
        2 => array('title' => 'Archives')));
        
    update_option('widget_search', array(
        1 => array('title' => 'Search'), 
        2 => array('title' => 'Search')));

    update_option('sidebars_widgets',  $activate);
	
	$MediaId = get_option('portfolio_media_id');
	set_theme_mod( 'custom_logo', $MediaId[12] );
?>
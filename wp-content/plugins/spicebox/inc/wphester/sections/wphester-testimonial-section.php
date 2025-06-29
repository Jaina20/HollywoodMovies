<?php 
/* Call the action for team section */
add_action('spiceb_wphester_testimonial_action','spiceb_wphester_testimonial_section');
/* Function for team section*/
function spiceb_wphester_testimonial_section()
{
$theme=wp_get_theme();    
$testimonial_animation_speed = get_theme_mod('testimonial_animation_speed', 3000);
$testimonial_smooth_speed = get_theme_mod('testimonial_smooth_speed', 1000);
$isRTL = (is_rtl()) ? (bool) true : (bool) false;

$slide_items = get_theme_mod('home_testimonial_slide_item', 1);
$testimonial_nav_style = get_theme_mod('testimonial_nav_style', 'bullets');
$testimonial_settings = array('design_id' => '#testimonial-carousel', 'slide_items' => $slide_items, 'animationSpeed' => $testimonial_animation_speed, 'smoothSpeed' => $testimonial_smooth_speed, 'testimonial_nav_style' => $testimonial_nav_style, 'rtl' => $isRTL);
wp_register_script('wphester-testimonial', SPICEB_PLUGIN_URL . 'inc/wphester/js/front-page/testi.js', array('jquery'), SPICEBOX_PLUGIN_VERSION, true);
wp_localize_script('wphester-testimonial', 'testimonial_settings', $testimonial_settings);
wp_enqueue_script('wphester-testimonial');

$home_testimonial_section_title = get_theme_mod('home_testimonial_section_title', __('Proin Egestas', 'spicebox'));
$home_testimonial_section_discription = get_theme_mod('home_testimonial_section_discription', __('Nam Viverra Iaculis Finibus', 'spicebox'));

$testimonial_options = get_theme_mod('wphester_testimonial_content');
if (empty($testimonial_options)) {
    $testimonial_options = json_encode(array(
                    array(
                        'title' => 'Exellent Theme & Very Fast Support',
                        'text' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem ipsum dolor sit amet, temp consectetur adipisicing elit.',
                        'clientname' => __('Amanda Smith', 'spicebox'),
                        'designation' => __('Developer', 'spicebox'),
                        'home_testimonial_star' => '4.5',
                        'link' => '#',
                        'image_url' => SPICEB_PLUGIN_URL . 'inc/busicare/images/testimonial/user1.jpg',
                        'open_new_tab' => 'no',
                        'id' => 'customizer_repeater_77d7ea7f40b96',
                        'home_slider_caption' => 'customizer_repeater_star_4.5',
                    ),
                    array(
                        'title' => 'Exellent Theme & Very Fast Support',
                        'text' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem ipsum dolor sit amet, temp consectetur adipisicing elit.',
                        'clientname' => __('Travis Cullan', 'spicebox'),
                        'designation' => __('Team Leader', 'spicebox'),
                        'home_testimonial_star' => '5',
                        'link' => '#',
                        'image_url' => SPICEB_PLUGIN_URL . 'inc/busicare/images/testimonial/user2.jpg',
                        'open_new_tab' => 'no',
                        'id' => 'customizer_repeater_88d7ea7f40b97',
                        'home_slider_caption' => 'customizer_repeater_star_5',
                    ),
                    array(
                        'title' => 'Exellent Theme & Very Fast Support',
                        'text' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem ipsum dolor sit amet, temp consectetur adipisicing elit.',
                        'clientname' => __('Victoria Wills', 'spicebox'),
                        'designation' => __('Volunteer', 'spicebox'),
                        'home_testimonial_star' => '3.5',
                        'link' => '#',
                        'image_url' => SPICEB_PLUGIN_URL . 'inc/busicare/images/testimonial/user3.jpg',
                        'id' => 'customizer_repeater_11d7ea7f40b98',
                        'open_new_tab' => 'no',
                        'home_slider_caption' => 'customizer_repeater_star_3.5',
                    ),
                    ));
}
if(get_theme_mod('testimonial_section_enable',true)==true):

$testimonial_class='testimonial-1';
?>
<section class="section-space testimonial <?php echo esc_attr($testimonial_class); ?>">

    <div class="container">
    <?php if ($home_testimonial_section_title != '' || $home_testimonial_section_discription != '') { ?>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-xs-12">
                <div class="section-header">                
                <?php if($home_testimonial_section_title):?>
                    <h2 class="section-title"><?php echo wp_kses_post($home_testimonial_section_title); ?></h2>                    
                <?php endif;?>
                <?php if ($home_testimonial_section_discription != ''):?>
                    <p class="section-subtitle"><?php echo wp_kses_post($home_testimonial_section_discription); ?></p>
                <?php endif;?>                                      
                </div>
            </div>
        </div>
    <?php } ?>

    <!--Testimonial-->

    <div class="row">        
        <div class="owl-carousel owl-theme col-md-12 owl-loaded owl-drag"  id="testimonial-carousel">
        <?php
        $testimonial_options = json_decode($testimonial_options);
        if ($testimonial_options != '') {
            $allowed_html = array(
                'br' => array(),
                'em' => array(),
                'strong' => array(),
                'b' => array(),
                'i' => array(),
            );
            foreach ($testimonial_options as $testimonial_iteam){
                $title = !empty($testimonial_iteam->title) ? apply_filters('wphester_translate_single_string', $testimonial_iteam->title, 'Testimonial section') : '';
                $test_desc = !empty($testimonial_iteam->text) ? apply_filters('wphester_translate_single_string', $testimonial_iteam->text, 'Testimonial section') : '';
                $test_link = $testimonial_iteam->link;
                $open_new_tab = $testimonial_iteam->open_new_tab;
                $clientname = !empty($testimonial_iteam->clientname) ? apply_filters('wphester_translate_single_string', $testimonial_iteam->clientname, 'Testimonial section') : '';
                $designation = !empty($testimonial_iteam->designation) ? apply_filters('wphester_translate_single_string', $testimonial_iteam->designation, 'Testimonial section') : '';
                $stars = !empty($testimonial_iteam->home_testimonial_star) ? apply_filters('wphester_translate_single_string', $testimonial_iteam->home_testimonial_star, 'Testimonial section') : '';
                    //Below Code will Run For Testimonial Design 1
                    ?>
                <div class="item">
                    <div class="testimonial-block">
                        <?php if ($testimonial_iteam->image_url != ''){ ?>
                        <figure class="avatar">
                            <?php $attachment_id = spiceb_save_image_to_media_library($testimonial_iteam->image_url);
                                $attributes = array(
                                   'alt'   => esc_attr($clientname),
                                   'class' => 'img-fluid'
                                );
                                echo !is_wp_error($attachment_id) ? wp_get_attachment_image(esc_attr($attachment_id), 'full', false, $attributes) : esc_html('Error: ' . esc_attr($attachment_id->get_error_message()));
                            ?>
                        </figure>
                        <?php } ?>
                        <?php if ($test_desc != '' || $clientname != '' || $designation != '') { ?>
                            <div class="entry-content">                                
                                <?php if (!empty($test_desc)){ ?>
                                <h4 class="name"><?php echo wp_kses(html_entity_decode($test_desc), $allowed_html); ?></h4>
                                <?php }  
                                if ($clientname != '') {?>
                                    <p><a href="<?php if (empty($test_link)) { echo '#'; } else { echo esc_url($test_link); } ?>" <?php if ($open_new_tab == "yes") { ?> target="_blank"<?php } ?>>
                                        <?php echo '- '.wp_kses(html_entity_decode($clientname), $allowed_html); ?>
                                    </a></p>
                                <?php } 
                                if ($designation != '') {?>
                                    <span class="designation"><?php echo esc_html($designation); ?></span>
                                <?php } ?>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <?php
            }
        }?>                       
        </div>
    </div>
</section>
<?php endif;?> 
<!-- /End of Testimonial Section-->
<?php } ?>
<?php
/**
 * Extensions
 */

if( ! function_exists( 'wpkites_plus_activate' ) ) {
    wp_enqueue_style( 'wpkites-info-screen-css', WPKITES_TEMPLATE_DIR_URI . '/admin/assets/css/welcome.css', array(), SPICEBOX_PLUGIN_VERSION );
	wp_enqueue_style( 'wpkites-info-css', WPKITES_TEMPLATE_DIR_URI . '/assets/css/bootstrap.css', array(), SPICEBOX_PLUGIN_VERSION );
}
?>
<div id="wpkites-extensions" class="text-center">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<h1 class="wpkites-info-title text-center">
					<?php esc_html_e('Extensions','spicebox') ?>
                </h1>
			</div>
		</div>
	</div>

	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 ">
                <?php
                $free_attachment_id = spiceb_save_image_to_media_library(SPICEB_PLUGIN_URL . 'inc/wpkites/images/free-bedge.png');
                $pro_attachment_id = spiceb_save_image_to_media_library(SPICEB_PLUGIN_URL . 'inc/wpkites/images/pro-bedge.png');
                ?>
				<div class="col-lg-4 col-md-4 col-sm-4 strater-div">   
					<div class="ribbon">
                        <?php echo wp_get_attachment_image(esc_attr($free_attachment_id), 'full'); ?>    
                    </div>
                    <?php $post_slider_attachment_id = spiceb_save_image_to_media_library(SPICEB_PLUGIN_URL . 'inc/wpkites/images/extensions/post-slider.png');
                    echo wp_get_attachment_image(esc_attr($post_slider_attachment_id), 'full'); ?>
                    <div class="col-lg-12 col-md-12 col-sm-12 panel-txt">
                        <div class="col-lg-6 col-md-12 col-sm-12 text-left">
                            <h4 class="strater-name">
                                <?php esc_html_e('Spice Post Slider','spicebox'); ?>
                            </h4>
                        </div>
                       	<div class="col-lg-6 col-md-12 col-sm-12 text-right">
                            <a href="<?php echo esc_url('https://spicethemes.com/spice-post-slider/'); ?>" class="starter-btn" target="_blank">
                                <?php esc_html_e('View More','spicebox'); ?>
                            </a>
                        </div>
                    </div> 
                </div>

                <div class="col-lg-4 col-md-4 col-sm-4 strater-div">   
					<div class="ribbon">
                        <?php echo wp_get_attachment_image(esc_attr($free_attachment_id), 'full'); ?>
                    </div>
                    <?php $social_share_attachment_id = spiceb_save_image_to_media_library(SPICEB_PLUGIN_URL . 'inc/wpkites/images/extensions/social-share.png');
                    echo wp_get_attachment_image(esc_attr($social_share_attachment_id), 'full'); ?>
                    <div class="col-lg-12 col-md-12 col-sm-12 panel-txt">
                        <div class="col-lg-6 col-md-12 col-sm-12 text-left">
                            <h4 class="strater-name">
                                <?php esc_html_e('Spice Social Share','spicebox'); ?>
                            </h4>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12 text-right">
                            <a href="<?php echo esc_url('https://spicethemes.com/social-share/'); ?>" class="starter-btn" target="_blank">
                                <?php esc_html_e('View More','spicebox'); ?>
                            </a>
                        </div>
                    </div> 
                </div>

                <div class="col-lg-4 col-md-4 col-sm-4 strater-div">   
					<div class="ribbon">
                        <?php echo wp_get_attachment_image(esc_attr($pro_attachment_id), 'full'); ?>
                    </div>
                    <?php $white_label_attachment_id = spiceb_save_image_to_media_library(SPICEB_PLUGIN_URL . 'inc/wpkites/images/extensions/white-label.png');
                    echo wp_get_attachment_image(esc_attr($white_label_attachment_id), 'full'); ?> 
                    <div class="col-lg-12 col-md-12 col-sm-12 panel-txt">
                        <div class="col-lg-6 col-md-12 col-sm-12 text-left">
                            <h4 class="strater-name">
                                <?php esc_html_e('Spice White Label','spicebox'); ?>
                            </h4>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12 text-right">
                            <a href="<?php echo esc_url('https://spicethemes.com/white-label/'); ?>" class="starter-btn" target="_blank">
                                <?php esc_html_e('View More','spicebox'); ?>
                            </a>
                        </div>
                    </div> 
                </div>

                <div class="col-lg-4 col-md-4 col-sm-4 strater-div"> 
					<div class="ribbon">
                        <?php echo wp_get_attachment_image(esc_attr($pro_attachment_id), 'full'); ?>
                    </div>
                    <?php $side_panel_attachment_id = spiceb_save_image_to_media_library(SPICEB_PLUGIN_URL . 'inc/wpkites/images/extensions/side-panel.png');
                    echo wp_get_attachment_image(esc_attr($side_panel_attachment_id), 'full'); ?>   
                    <div class="col-lg-12 col-md-12 col-sm-12 panel-txt">
                        <div class="col-lg-6 col-md-12 col-sm-12 text-left">
                            <h4 class="strater-name">
                                <?php esc_html_e('Spice Side Panel','spicebox'); ?>
                            </h4>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12 text-right">
                            <a href="<?php echo esc_url('https://spicethemes.com/side-panel/'); ?>" class="starter-btn" target="_blank">
                                <?php esc_html_e('View More','spicebox'); ?>
                            </a>
                        </div>
                    </div> 
                </div>

                <div class="col-lg-4 col-md-4 col-sm-4 strater-div">   
					<div class="ribbon">
                        <?php echo wp_get_attachment_image(esc_attr($pro_attachment_id), 'full'); ?>
                    </div>
                    <?php $popup_login_attachment_id = spiceb_save_image_to_media_library(SPICEB_PLUGIN_URL . 'inc/wpkites/images/extensions/popup-login.png');
                    echo wp_get_attachment_image(esc_attr($popup_login_attachment_id), 'full'); ?>
                    <div class="col-lg-12 col-md-12 col-sm-12 panel-txt">
                        <div class="col-lg-6 col-md-12 col-sm-12 text-left">
                            <h4 class="strater-name">
                                <?php esc_html_e('Spice Popup Login','spicebox'); ?>
                            </h4>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12 text-right">
                            <a href="<?php echo esc_url('https://spicethemes.com/popup-login/'); ?>" class="starter-btn" target="_blank">
                                <?php esc_html_e('View More','spicebox'); ?>
                            </a>
                        </div>
                    </div> 
                </div>

                <div class="col-lg-4 col-md-4 col-sm-4 strater-div">   
                    <div class="ribbon">
                        <?php echo wp_get_attachment_image(esc_attr($pro_attachment_id), 'full'); ?>
                    </div>
                    <?php $instagram_attachment_id = spiceb_save_image_to_media_library(SPICEB_PLUGIN_URL . 'inc/wpkites/images/extensions/instagram.png');
                    echo wp_get_attachment_image(esc_attr($instagram_attachment_id), 'full'); ?>
                    <div class="col-lg-12 col-md-12 col-sm-12 panel-txt">
                        <div class="col-lg-6 col-md-12 col-sm-12 text-left">
                            <h4 class="strater-name">
                                <?php esc_html_e('Spice Instagram','spicebox'); ?>
                            </h4>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12 text-right">
                            <a href="<?php echo esc_url('https://spicethemes.com/instagram/'); ?>" class="starter-btn" target="_blank">
                                <?php esc_html_e('View More','spicebox'); ?>
                            </a>
                        </div>
                    </div> 
                </div>

			</div>
		</div>
	</div>
</div>


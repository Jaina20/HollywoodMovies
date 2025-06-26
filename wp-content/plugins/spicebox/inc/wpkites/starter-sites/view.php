<?php
/**
 * Starter Sites
 */

if( ! function_exists( 'wpkites_plus_activate' ) ) {
    wp_enqueue_style( 'wpkites-info-screen-css', WPKITES_TEMPLATE_DIR_URI . '/admin/assets/css/welcome.css', array(), SPICEBOX_PLUGIN_VERSION );
	wp_enqueue_style( 'wpkites-info-css', WPKITES_TEMPLATE_DIR_URI . '/assets/css/bootstrap.css', array(), SPICEBOX_PLUGIN_VERSION );
}
?>
<div id="starter-sites" class="text-center">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<h1 class="wpkites-info-title text-center m-top-30">
					<?php esc_html_e('Starter Sites','spicebox') ?>
                </h1>
			</div>
		</div>
	</div>

	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
                <?php
                $pro_badge_id = spiceb_save_image_to_media_library(SPICEB_PLUGIN_URL . 'inc/wpkites/images/pro-bedge.png');
                ?>
				<div class="col-md-4 col-sm-4 col-xs-12 strater-div">   
					<div class="ribbon">
                        <?php echo wp_get_attachment_image(esc_attr($pro_badge_id), 'full'); ?>
                    </div>
                    <?php
                        $pthumb_id = spiceb_save_image_to_media_library('https://spicethemes.com/startersites/thumbnail/photography.png');
                        echo wp_get_attachment_image(esc_attr($pthumb_id), 'full');
                    ?>  
                    <div class="col-md-12 col-sm-12 col-xs-12 panel-txt">
                        <div class="col-md-6 col-sm-12 col-xs-12 text-left">
                            <h4 class="strater-name">
                                <?php esc_html_e('Photography','spicebox'); ?>
                            </h4>
                        </div>
                       	<div class="col-md-6 col-sm-12 col-xs-12 text-right">
                            <a href="<?php echo esc_url('https://photography-wpkites.spicethemes.com/'); ?>" class="starter-btn" target="_blank">
                                <?php esc_html_e('Demo','spicebox'); ?>
                            </a>
                        </div>
                    </div> 
                </div>

                <div class="col-md-4 col-sm-4 col-xs-12 strater-div">   
					<div class="ribbon">
                        <?php echo wp_get_attachment_image(esc_attr($pro_badge_id), 'full'); ?>
                    </div>
                    <?php
                        $jobthumb_id = spiceb_save_image_to_media_library('https://spicethemes.com/startersites/thumbnail/job-portal.png');
                        echo wp_get_attachment_image(esc_attr($jobthumb_id), 'full');
                    ?>  
                    <div class="col-md-12 col-sm-12 col-xs-12 panel-txt">
                        <div class="col-md-6 col-sm-12 col-xs-12 text-left">
                            <h4 class="strater-name">
                                <?php esc_html_e('Job Portal','spicebox'); ?>
                            </h4>
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12 text-right">
                            <a href="<?php echo esc_url('https://job-portal-wpkites.spicethemes.com/'); ?>" class="starter-btn" target="_blank">
                                <?php esc_html_e('Demo','spicebox'); ?>
                            </a>
                        </div>
                    </div> 
                </div>

                <div class="col-md-4 col-sm-4 col-xs-12 strater-div">   
					<div class="ribbon">
                        <?php echo wp_get_attachment_image(esc_attr($pro_badge_id), 'full'); ?>
                    </div>
                    <?php
                        $resthumb_id = spiceb_save_image_to_media_library('https://spicethemes.com/startersites/thumbnail/restaurant.png');
                        echo wp_get_attachment_image(esc_attr($resthumb_id), 'full');
                    ?> 
                    <div class="col-md-12 col-sm-12 col-xs-12 panel-txt">
                        <div class="col-md-6 col-sm-12 col-xs-12 text-left">
                            <h4 class="strater-name">
                                <?php esc_html_e('Restaurant','spicebox'); ?>
                            </h4>
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12 text-right">
                            <a href="<?php echo esc_url('https://food-restaurant-wpkites.spicethemes.com/'); ?>" class="starter-btn" target="_blank">
                                <?php esc_html_e('Demo','spicebox'); ?>
                            </a>
                        </div>
                    </div> 
                </div>

                <div class="col-md-4 col-sm-4 col-xs-12 strater-div">   
					<div class="ribbon">
                        <?php echo wp_get_attachment_image(esc_attr($pro_badge_id), 'full'); ?>
                    </div>
                    <?php
                        $corpthumb_id = spiceb_save_image_to_media_library('https://spicethemes.com/startersites/thumbnail/corporate.png');
                        echo wp_get_attachment_image(esc_attr($corpthumb_id), 'full');
                    ?>   
                    <div class="col-md-12 col-sm-12 col-xs-12 panel-txt">
                        <div class="col-md-6 col-sm-12 col-xs-12 text-left">
                            <h4 class="strater-name">
                                <?php esc_html_e('Corporate','spicebox'); ?>
                            </h4>
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12 text-right">
                            <a href="<?php echo esc_url('https://corporate-wpkites.spicethemes.com/'); ?>" class="starter-btn" target="_blank">
                                <?php esc_html_e('Demo','spicebox'); ?>
                            </a>
                        </div>
                    </div> 
                </div>

                <div class="col-md-4 col-sm-4 col-xs-12 strater-div">   
					<div class="ribbon">
                        <?php echo wp_get_attachment_image(esc_attr($pro_badge_id), 'full'); ?>
                    </div>
                    <?php
                        $busithumb_id = spiceb_save_image_to_media_library('https://spicethemes.com/startersites/thumbnail/business.png');
                        echo wp_get_attachment_image(esc_attr($busithumb_id), 'full');
                    ?>  
                    <div class="col-md-12 col-sm-12 col-xs-12 panel-txt">
                        <div class="col-md-6 col-sm-12 col-xs-12 text-left">
                            <h4 class="strater-name">
                                <?php esc_html_e('Business','spicebox'); ?>
                            </h4>
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12 text-right">
                            <a href="<?php echo esc_url('https://business-wpkites.spicethemes.com/'); ?>" class="starter-btn" target="_blank">
                                <?php esc_html_e('Demo','spicebox'); ?>
                            </a>
                        </div>
                    </div> 
                </div>

			</div>
		</div>
	</div>
</div>
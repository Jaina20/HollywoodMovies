<?php 
/* Call the action for team section */
add_action('innofit_team_action','innofit_team_section');
/* Function for team section*/
function innofit_team_section()
{
$team_options = get_theme_mod('innofit_team_content');
$team_section_enable = get_theme_mod('team_section_enable','on');
if($team_section_enable !='off')
{	
	
	
	
?>
<!-- Team Section -->
<section class="section-module bg-grey team-members" id="team">

	<div class="container">
	
		<?php 
		$home_team_section_title = get_theme_mod('home_team_section_title',__('Meet our superheroes','spicebox'));
		$home_team_section_discription = get_theme_mod('home_team_section_discription',__('The best team available','spicebox'));
		if(($home_team_section_title) || ($home_team_section_discription)!='' ) { 
		?>
		<div class="row">
			<div class="col-md-12">
				<div class="section-header">
					<p class="section-subtitle"><?php echo esc_html($home_team_section_title); ?></p>
					<h1 class="section-title"><?php echo esc_html($home_team_section_discription); ?></h1>
				</div>
			</div>						
		</div>
		<?php } ?>
	
	</div>

	<div class="container-fluid fullwidth">

		<div class="row">
			<?php $team_options = json_decode($team_options);
					if( $team_options!='' )
					{
					foreach($team_options as $team_item){
				
					$image    = ! empty( $team_item->image_url ) ? apply_filters( 'innofit_translate_single_string', $team_item->image_url, 'Team section' ) : '';
					$title    = ! empty( $team_item->title ) ? apply_filters( 'innofit_translate_single_string', $team_item->title, 'Team section' ) : '';
					$subtitle = ! empty( $team_item->subtitle ) ? apply_filters( 'innofit_translate_single_string', $team_item->subtitle, 'Team section' ) : '';
					$link     = ! empty( $team_item->link ) ? apply_filters( 'innofit_translate_single_string', $team_item->link, 'Team section' ) : '';
					$open_new_tab = $team_item->open_new_tab; ?>
				<div class="item">
				  <div class="col-md-3 col-sm-6 col-xs-12 p-0">
				    
					<div class="team-grid">
					<div class="img-holder">
						   <?php if ( ! empty( $image ) ) : ?>
								<?php
								if ( ! empty( $link ) ) :
									$link_html = '<a href="' . esc_url( $link ) . '"';
									if ( function_exists( 'innofit_is_external_url' ) ) {
										$link_html .= innofit_is_external_url( $link );
									}
									$link_html .= '>';
									echo wp_kses_post( $link_html );
								endif;

								$attachment_id = spiceb_save_image_to_media_library($image);
                                $attributes = array(
                                   'alt'   => esc_attr($title),
                                   'class' => 'img',
                                   'title' => esc_attr($title)
                                );
                                echo !is_wp_error($attachment_id) ? wp_get_attachment_image(esc_attr($attachment_id), 'full', false, $attributes) : esc_html('Error: ' . esc_attr($attachment_id->get_error_message()));

								if ( ! empty( $link ) ) {
									echo '</a>';
								}
								?>
						<?php endif; ?>
					   </div>
					   <div class="details">
						   <?php if ( ! empty( $title ) ) : ?>
							
							        <?php if ( ! empty( $link ) ) : ?>
							        <a href="<?php echo esc_url($link) ?>" <?php if($open_new_tab == 'yes'){ echo 'target="_blank"';}?>>
									<?php endif; ?>
										<h6 class="name"><?php echo esc_html( $title ); ?></h6>
									<?php if ( ! empty( $link ) ) : ?>	
									</a>
									<?php endif; ?>
										
									<?php endif; ?><?php if ( ! empty( $subtitle ) ) : ?>
										<span class="position"><?php echo esc_html( $subtitle ); ?></span>
									<?php endif; 
										if ( ! empty( $team_item->social_repeater ) ) :
										$icons         = html_entity_decode( $team_item->social_repeater );
										$icons_decoded = json_decode( $icons, true );
										if ( ! empty( $icons_decoded ) ) : ?>
										<ul class="social-links">
										<?php
														foreach ( $icons_decoded as $value ) {
															$social_icon = ! empty( $value['icon'] ) ? apply_filters( 'innofit_translate_single_string', $value['icon'], 'Team section' ) : '';
															$social_link = ! empty( $value['link'] ) ? apply_filters( 'innofit_translate_single_string', $value['link'], 'Team section' ) : '';

															if ( ! empty( $social_icon ) ) {
																
															?>	
																
																
														<li><a <?php if($open_new_tab == 'yes'){ echo 'target="_blank"';}?> href="<?php echo esc_url( $social_link ); ?>" class="btn btn-just-icon btn-simple"><i class="fa <?php echo esc_attr( $social_icon ); ?> "></i></a></li>
															
															<?php
															
															
															}
															
														} endif;
															endif;
													
														
														?>
										</ul>
				   </div>
				   </div>
				   </div>
				</div>
				<?php } } else { ?>
				
				
				<div class="col-md-3 col-sm-6 col-xs-12 p-0">
					<div class="team-grid">
					   <div class="img-holder">
					   		<?php $attachment_id = spiceb_save_image_to_media_library(SPICEB_PLUGIN_URL . 'inc/innofit/images/team/team1.jpg');
                                $attributes = array(
                                  'alt' => esc_attr__('Danial Wilson', 'spicebox')
                                );
                                echo !is_wp_error($attachment_id) ? wp_get_attachment_image(esc_attr($attachment_id), 'full', false, $attributes) : esc_html('Error: ' . esc_attr($attachment_id->get_error_message()));
                            ?>
					   </div>
					   <div class="details">
						   <h6 class="name"><?php echo esc_html__('Danial Wilson','spicebox'); ?></h6>
						   <span class="position"><?php esc_html_e('Senior Manager','spicebox'); ?></span>
						   <ul class="social-links">
							   <li><a href="#" class="btn btn-just-icon btn-simple"><i class="fa-brands fa-facebook-f"></i></a></li>
							   <li><a href="#" class="btn btn-just-icon btn-simple"><i class="fa-brands fa-x-twitter"></i></a></li>
							   <li><a href="#" class="btn btn-just-icon btn-simple"><i class="fa-brands fa-linkedin-in"></i></a></li>
							   <li><a href="#" class="btn btn-just-icon btn-simple"><i class="fa-brands fa-behance"></i></a></li>
						   </ul>
					   </div>
				   </div>
				</div>
				<div class="col-md-3 col-sm-6 col-xs-12 p-0">
					<div class="team-grid">
					   <div class="img-holder">
					   		<?php $attachment_id = spiceb_save_image_to_media_library(SPICEB_PLUGIN_URL . 'inc/innofit/images/team/team2.jpg');
                                $attributes = array(
                                  'alt' => esc_attr__('Amanda Smith', 'spicebox')
                                );
                                echo !is_wp_error($attachment_id) ? wp_get_attachment_image(esc_attr($attachment_id), 'full', false, $attributes) : esc_html('Error: ' . esc_attr($attachment_id->get_error_message()));
                            ?>
					   </div>
					   <div class="details">
						   <h6 class="name"><?php echo esc_html__('Amanda Smith','spicebox'); ?></h6>
						   <span class="position"><?php esc_html_e('Founder & CEO','spicebox'); ?></span>
						   <ul class="social-links">
							   <li><a href="#" class="btn btn-just-icon btn-simple"><i class="fa-brands fa-facebook-f"></i></a></li>
							   <li><a href="#" class="btn btn-just-icon btn-simple"><i class="fa-brands fa-x-twitter"></i></a></li>
							   <li><a href="#" class="btn btn-just-icon btn-simple"><i class="fa-brands fa-linkedin-in"></i></a></li>
							   <li><a href="#" class="btn btn-just-icon btn-simple"><i class="fa-brands fa-behance"></i></a></li>
						   </ul>
					   </div>
				   </div>
				</div>
				<div class="col-md-3 col-sm-6 col-xs-12 p-0">
					<div class="team-grid">
					   <div class="img-holder">
					   		<?php $attachment_id = spiceb_save_image_to_media_library(SPICEB_PLUGIN_URL . 'inc/innofit/images/team/team3.jpg');
                                $attributes = array(
                                  'alt' => esc_attr__('Victoria Wills', 'spicebox')
                                );
                                echo !is_wp_error($attachment_id) ? wp_get_attachment_image(esc_attr($attachment_id), 'full', false, $attributes) : esc_html('Error: ' . esc_attr($attachment_id->get_error_message()));
                            ?>
					   </div>
					   <div class="details">
						   <h6 class="name"><?php echo esc_html__('Victoria Wills','spicebox'); ?></h6>
						   <span class="position"><?php esc_html_e('Web Master','spicebox'); ?></span>
						   <ul class="social-links">
							   <li><a href="#" class="btn btn-just-icon btn-simple"><i class="fa-brands fa-facebook-f"></i></a></li>
							   <li><a href="#" class="btn btn-just-icon btn-simple"><i class="fa-brands fa-x-twitter"></i></a></li>
							   <li><a href="#" class="btn btn-just-icon btn-simple"><i class="fa-brands fa-linkedin-in"></i></a></li>
							   <li><a href="#" class="btn btn-just-icon btn-simple"><i class="fa-brands fa-behance"></i></a></li>
						   </ul>
					   </div>
				   </div>
				</div>
				<div class="col-md-3 col-sm-6 col-xs-12 p-0">
					<div class="team-grid">
					   <div class="img-holder">
					   		<?php $attachment_id = spiceb_save_image_to_media_library(SPICEB_PLUGIN_URL . 'inc/innofit/images/team/team4.jpg');
                                $attributes = array(
                                  'alt' => esc_attr__('Travis Marcus', 'spicebox')
                                );
                                echo !is_wp_error($attachment_id) ? wp_get_attachment_image(esc_attr($attachment_id), 'full', false, $attributes) : esc_html('Error: ' . esc_attr($attachment_id->get_error_message()));
                            ?>
					   </div>
					   <div class="details">
						   <h6 class="name"><?php echo esc_html__('Travis Marcus','spicebox'); ?></h6>
						   <span class="position"><?php esc_html_e('UI Developer','spicebox'); ?></span>
						   <ul class="social-links">
							   <li><a href="#" class="btn btn-just-icon btn-simple"><i class="fa-brands fa-facebook-f"></i></a></li>
							   <li><a href="#" class="btn btn-just-icon btn-simple"><i class="fa-brands fa-x-twitter"></i></a></li>
							   <li><a href="#" class="btn btn-just-icon btn-simple"><i class="fa-brands fa-linkedin-in"></i></a></li>
							   <li><a href="#" class="btn btn-just-icon btn-simple"><i class="fa-brands fa-behance"></i></a></li>
						   </ul>
					   </div>
				   </div>
				</div>
<?php } ?>
		</div>
	</div>
</section>
<!--/End of Team Section-->
<?php } }?>
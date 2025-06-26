<?php
/* Call the action for team section */
add_action('innofit_wooproduct_action','innofit_wooproduct_section');
/* Function for team section*/
function innofit_wooproduct_section() {
	if ( class_exists( 'WooCommerce' ) ) {
		$shop_section_enable = get_theme_mod('shop_section_enable','on');
		if($shop_section_enable !='off') { ?>
			<!-- Product & Shop Section -->
			<section class="section-module shop" id="shop">
				<div class="container">
					<?php $home_shop_section_title = get_theme_mod('home_shop_section_title',__('Featured Products','spicebox'));
					$home_shop_section_discription = get_theme_mod('home_shop_section_discription',__('Our amazing products','spicebox')); 
					if(($home_shop_section_title) || ($home_shop_section_discription)!='' ) {  ?>
					<div class="row">
					    <div class="col-md-12">
							<div class="section-header">
								<p class="section-subtitle"><?php echo esc_html($home_shop_section_title);  ?></p>
								<h1 class="section-title"><?php echo esc_html($home_shop_section_discription);  ?></h1>
							</div>
						</div>
					</div>
					<?php }
					$args = array(
					    'post_type' => 'product',
					    'posts_per_page' => 4,
					
					);
					$loop = new WP_Query($args); ?>	
					<div class="row">
						<?php if ($loop->have_posts()) :
			    			while ($loop->have_posts()) : $loop->the_post(); global $product; ?>
								<div class="item <?php echo esc_attr(get_the_title()); ?>" data-profile="<?php echo esc_attr($loop->post->ID); ?>">
									<div class="col-md-3 col-sm-6 col-xs-12">
										<div class="products">
											<div class="item-img">
												<?php the_post_thumbnail(); ?>
												<?php if ( $product->is_on_sale() ) : ?>

												<?php echo wp_kses_post( apply_filters( 'woocommerce_sale_flash', '<span class="onsale">' . esc_html__( 'On Sale!', 'spicebox' ) . '</span>', $product ) ); ?>
												<?php endif; ?>
												
												<div class="add-to-cart">
												<?php woocommerce_template_loop_add_to_cart( $loop->post, $product ); ?>
												</div>
												
											</div>
											<div class="product-price">
											<?php if ($average = $product->get_average_rating()) : ?>
												<ul class="woocommerce rating">
													<li>
											            <?php 
											            $average_escaped = $average;
											            // Translators: %s is the average rating value.
											            $rating_title = sprintf(esc_html__('Rated %s out of 5', 'spicebox'), $average_escaped);
											            $width = ( ( $average / 5 ) * 100 );
											            $width_escaped = $width . '%';
											            ?>
											            <div class="star-rating" title="<?php echo esc_attr($rating_title); ?>">
											                <span style="width: <?php echo esc_attr($width_escaped); ?>">
											                    <strong itemprop="ratingValue" class="rating"><?php echo esc_html($average_escaped); ?></strong> <?php echo esc_html__('out of 5', 'spicebox'); ?>
											                </span>
											            </div>
											        </li>
												</ul>
											<?php endif; ?>	
												<h5 class="woocommerce-loop-product__title"><a href="<?php the_permalink(); ?>" title="" tabindex="-1"><?php the_title(); ?></a></h5>
												<span class="woocommerce-Price-amount"><?php echo wp_kses_post( $product->get_price_html() ); ?></span>

											</div>
										</div>
									</div>
								</div>
							<?php endwhile; 
							wp_reset_postdata(); 
						endif;?>								
					</div>
					<!-- /Item Scroll -->
				</div>
			</section>
		<!-- /Product & Shop Section -->
		<?php } 
	} 
}?>
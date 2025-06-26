<?php

function spicebox_image_radio_button_customizer($wp_customize) {
    	/**
	 * Image Radio Button Custom Control
	 */
class Spicebox_Image_Radio_Button_Custom_Control extends WP_Customize_Control {
		/**
		 * The type of control being rendered
		 */
		public $type = 'image_radio_button';
		/**
		 * Enqueue our scripts and styles
		 */
		public function enqueue() {
			wp_enqueue_style( 'spicebox-radio-image-controls', SPICEB_PLUGIN_URL . 'inc/css/customizer.css', array(), SPICEBOX_PLUGIN_VERSION );
		}
		/**
		 * Render the control in the customizer
		 */
		public function render_content() {
		?>
			<div class="image_radio_button_control">
				<?php if( !empty( $this->label ) ) { ?>
					<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<?php } ?>
				<?php if( !empty( $this->description ) ) { ?>
					<span class="customize-control-description"><?php echo esc_html( $this->description ); ?></span>
				<?php } ?>

				<?php foreach ( $this->choices as $key => $value ) { ?>
					<label class="radio-button-label">
						<input type="radio" name="<?php echo esc_attr( $this->id ); ?>" value="<?php echo esc_attr( $key ); ?>" <?php $this->link(); ?> <?php checked( esc_attr( $key ), $this->value() ); ?>/>
						<?php 
						$attachment_id = spiceb_save_image_to_media_library($value['image']);
						$attributes = array(
							'alt'	=>	esc_attr($value['name']),
							'class' => 'img-fluid'
						);
                        echo wp_get_attachment_image($attachment_id, 'full', false, $attributes);
						?>
					</label>
				<?php	} ?>
			</div>
		<?php
		}
	}
}
        
add_action( 'customize_register', 'spicebox_image_radio_button_customizer' );
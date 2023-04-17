<?php
if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'WP_Customize_Repeater_Control' ) ) {
	class WP_Customize_Repeater_Control extends WP_Customize_Control {
		/**
		 * The control type.
		 *
		 * @access public
		 * @var string
		 */
		public $type = 'repeater';

		/**
		 * Field labels.
		 *
		 * @access public
		 * @var array
		 */
		public $labels = array();

		/**
		 * Add custom parameters to pass to the JS via JSON.
		 *
		 * @access public
		 */
		public function json() {
			$json = parent::json();

			$json['labels'] = $this->labels;

			return $json;
		}

		/**
		 * Enqueue scripts and styles
		 */
		public function enqueue() {
			wp_enqueue_script( 'jquery-ui-draggable' );
			wp_enqueue_script( 'jquery-ui-sortable' );
			wp_enqueue_script( 'customize-repeater', get_template_directory_uri() . '/assets/js/customize-repeater.js', array( 'jquery', 'jquery-ui-draggable', 'jquery-ui-sortable' ), '20151215', true );
			wp_enqueue_style( 'customize-repeater', get_template_directory_uri() . '/assets/css/customize-repeater.css', array(), '20151215' );
		}

		/**
		 * Displays the control content.
		 *
		 * @access public
		 */
		public function render_content() {
			$values = json_decode( $this->value() );
			if ( ! is_array( $values ) ) {
				$values = array();
			}
			if ( ! isset( $this->input_attrs['class'] ) ) {
				$this->input_attrs['class'] = '';
			}
			$this->input_attrs['class'] .= ' customize-repeater';
			?>
			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<ul class="customize-control-repeater">
				<?php foreach ( $values as $i => $value ) : ?>
					<li class="customize-control-repeater-item">
						<button type="button" class="customize-control-repeater-remove"></button>

						<h4 class="customize-control-repeater-header"><?php echo esc_html( $this->labels['item_name'] ); ?> <?php echo esc_html( $i + 1 ); ?></h4>

						<?php
							foreach ( $this->settings as $setting_key => $setting ) {
								$id = sprintf( '%s[%s][%s]', $this->id, $i, $setting_key );
								$setting->id = $id;
								$setting->link();
								$this->manager->add_setting( $setting );
								do_action( "customize_controls_print_after_{$setting->type}_control", $setting );
							}
						?>
					</li>
				<?php endforeach; ?>
			</ul>
			<button type="button" class="customize-control-repeater-add">add_new_item</button>

			<?php
		}
	}
}

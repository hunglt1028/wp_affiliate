<?php
/**
 * Typography control class.
 *
 * @since  1.0.0
 * @access public
 */

class affiliate_review_Control_Typography extends WP_Customize_Control {

	/**
	 * The type of customize control being rendered.
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $type = 'affiliate-review-typography';

	/**
	 * Array 
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $l10n = array();

	/**
	 * Set up our control.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @param  string  $id
	 * @param  array   $args
	 * @return void
	 */
	public function __construct( $manager, $id, $args = array() ) {

		// Let the parent class do its thing.
		parent::__construct( $manager, $id, $args );

		// Make sure we have labels.
		$this->l10n = wp_parse_args(
			$this->l10n,
			array(
				'color'       => esc_html__( 'Font Color', 'affiliate-review' ),
				'family'      => esc_html__( 'Font Family', 'affiliate-review' ),
				'size'        => esc_html__( 'Font Size',   'affiliate-review' ),
				'weight'      => esc_html__( 'Font Weight', 'affiliate-review' ),
				'style'       => esc_html__( 'Font Style',  'affiliate-review' ),
				'line_height' => esc_html__( 'Line Height', 'affiliate-review' ),
				'letter_spacing' => esc_html__( 'Letter Spacing', 'affiliate-review' ),
			)
		);
	}

	/**
	 * Enqueue scripts/styles.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue() {
		wp_enqueue_script( 'affiliate-review-ctypo-customize-controls' );
		wp_enqueue_style(  'affiliate-review-ctypo-customize-controls' );
	}

	/**
	 * Add custom parameters to pass to the JS via JSON.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function to_json() {
		parent::to_json();

		// Loop through each of the settings and set up the data for it.
		foreach ( $this->settings as $setting_key => $setting_id ) {

			$this->json[ $setting_key ] = array(
				'link'  => $this->get_link( $setting_key ),
				'value' => $this->value( $setting_key ),
				'label' => isset( $this->l10n[ $setting_key ] ) ? $this->l10n[ $setting_key ] : ''
			);

			if ( 'family' === $setting_key )
				$this->json[ $setting_key ]['choices'] = $this->get_font_families();

			elseif ( 'weight' === $setting_key )
				$this->json[ $setting_key ]['choices'] = $this->get_font_weight_choices();

			elseif ( 'style' === $setting_key )
				$this->json[ $setting_key ]['choices'] = $this->get_font_style_choices();
		}
	}

	/**
	 * Underscore JS template to handle the control's output.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function content_template() { ?>

		<# if ( data.label ) { #>
			<span class="customize-control-title">{{ data.label }}</span>
		<# } #>

		<# if ( data.description ) { #>
			<span class="description customize-control-description">{{{ data.description }}}</span>
		<# } #>

		<ul>

		<# if ( data.family && data.family.choices ) { #>

			<li class="typography-font-family">

				<# if ( data.family.label ) { #>
					<span class="customize-control-title">{{ data.family.label }}</span>
				<# } #>

				<select {{{ data.family.link }}}>

					<# _.each( data.family.choices, function( label, choice ) { #>
						<option value="{{ choice }}" <# if ( choice === data.family.value ) { #> selected="selected" <# } #>>{{ label }}</option>
					<# } ) #>

				</select>
			</li>
		<# } #>

		<# if ( data.weight && data.weight.choices ) { #>

			<li class="typography-font-weight">

				<# if ( data.weight.label ) { #>
					<span class="customize-control-title">{{ data.weight.label }}</span>
				<# } #>

				<select {{{ data.weight.link }}}>

					<# _.each( data.weight.choices, function( label, choice ) { #>

						<option value="{{ choice }}" <# if ( choice === data.weight.value ) { #> selected="selected" <# } #>>{{ label }}</option>

					<# } ) #>

				</select>
			</li>
		<# } #>

		<# if ( data.style && data.style.choices ) { #>

			<li class="typography-font-style">

				<# if ( data.style.label ) { #>
					<span class="customize-control-title">{{ data.style.label }}</span>
				<# } #>

				<select {{{ data.style.link }}}>

					<# _.each( data.style.choices, function( label, choice ) { #>

						<option value="{{ choice }}" <# if ( choice === data.style.value ) { #> selected="selected" <# } #>>{{ label }}</option>

					<# } ) #>

				</select>
			</li>
		<# } #>

		<# if ( data.size ) { #>

			<li class="typography-font-size">

				<# if ( data.size.label ) { #>
					<span class="customize-control-title">{{ data.size.label }} (px)</span>
				<# } #>

				<input type="number" min="1" {{{ data.size.link }}} value="{{ data.size.value }}" />

			</li>
		<# } #>

		<# if ( data.line_height ) { #>

			<li class="typography-line-height">

				<# if ( data.line_height.label ) { #>
					<span class="customize-control-title">{{ data.line_height.label }} (px)</span>
				<# } #>

				<input type="number" min="1" {{{ data.line_height.link }}} value="{{ data.line_height.value }}" />

			</li>
		<# } #>

		<# if ( data.letter_spacing ) { #>

			<li class="typography-letter-spacing">

				<# if ( data.letter_spacing.label ) { #>
					<span class="customize-control-title">{{ data.letter_spacing.label }} (px)</span>
				<# } #>

				<input type="number" min="1" {{{ data.letter_spacing.link }}} value="{{ data.letter_spacing.value }}" />

			</li>
		<# } #>

		</ul>
	<?php }

	/**
	 * Returns the available fonts.  Fonts should have available weights, styles, and subsets.
	 *
	 * @todo Integrate with Google fonts.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	public function get_fonts() { return array(); }

	/**
	 * Returns the available font families.
	 *
	 * @todo Pull families from `get_fonts()`.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	function get_font_families() {

		return array(
			'' => __( 'No Fonts', 'affiliate-review' ),
        'Abril Fatface' => __( 'Abril Fatface', 'affiliate-review' ),
        'Acme' => __( 'Acme', 'affiliate-review' ),
        'Anton' => __( 'Anton', 'affiliate-review' ),
        'Architects Daughter' => __( 'Architects Daughter', 'affiliate-review' ),
        'Arimo' => __( 'Arimo', 'affiliate-review' ),
        'Arsenal' => __( 'Arsenal', 'affiliate-review' ),
        'Arvo' => __( 'Arvo', 'affiliate-review' ),
        'Alegreya' => __( 'Alegreya', 'affiliate-review' ),
        'Alfa Slab One' => __( 'Alfa Slab One', 'affiliate-review' ),
        'Averia Serif Libre' => __( 'Averia Serif Libre', 'affiliate-review' ),
        'Bangers' => __( 'Bangers', 'affiliate-review' ),
        'Boogaloo' => __( 'Boogaloo', 'affiliate-review' ),
        'Bad Script' => __( 'Bad Script', 'affiliate-review' ),
        'Bitter' => __( 'Bitter', 'affiliate-review' ),
        'Bree Serif' => __( 'Bree Serif', 'affiliate-review' ),
        'BenchNine' => __( 'BenchNine', 'affiliate-review' ),
        'Cabin' => __( 'Cabin', 'affiliate-review' ),
        'Cardo' => __( 'Cardo', 'affiliate-review' ),
        'Courgette' => __( 'Courgette', 'affiliate-review' ),
        'Cherry Swash' => __( 'Cherry Swash', 'affiliate-review' ),
        'Cormorant Garamond' => __( 'Cormorant Garamond', 'affiliate-review' ),
        'Crimson Text' => __( 'Crimson Text', 'affiliate-review' ),
        'Cuprum' => __( 'Cuprum', 'affiliate-review' ),
        'Cookie' => __( 'Cookie', 'affiliate-review' ),
        'Chewy' => __( 'Chewy', 'affiliate-review' ),
        'Days One' => __( 'Days One', 'affiliate-review' ),
        'Dosis' => __( 'Dosis', 'affiliate-review' ),
        'Droid Sans' => __( 'Droid Sans', 'affiliate-review' ),
        'Economica' => __( 'Economica', 'affiliate-review' ),
        'Fredoka One' => __( 'Fredoka One', 'affiliate-review' ),
        'Fjalla One' => __( 'Fjalla One', 'affiliate-review' ),
        'Francois One' => __( 'Francois One', 'affiliate-review' ),
        'Frank Ruhl Libre' => __( 'Frank Ruhl Libre', 'affiliate-review' ),
        'Gloria Hallelujah' => __( 'Gloria Hallelujah', 'affiliate-review' ),
        'Great Vibes' => __( 'Great Vibes', 'affiliate-review' ),
        'Handlee' => __( 'Handlee', 'affiliate-review' ),
        'Hammersmith One' => __( 'Hammersmith One', 'affiliate-review' ),
        'Inconsolata' => __( 'Inconsolata', 'affiliate-review' ),
        'Indie Flower' => __( 'Indie Flower', 'affiliate-review' ),
        'IM Fell English SC' => __( 'IM Fell English SC', 'affiliate-review' ),
        'Julius Sans One' => __( 'Julius Sans One', 'affiliate-review' ),
        'Josefin Slab' => __( 'Josefin Slab', 'affiliate-review' ),
        'Josefin Sans' => __( 'Josefin Sans', 'affiliate-review' ),
        'Kanit' => __( 'Kanit', 'affiliate-review' ),
        'Lobster' => __( 'Lobster', 'affiliate-review' ),
        'Lato' => __( 'Lato', 'affiliate-review' ),
        'Lora' => __( 'Lora', 'affiliate-review' ),
        'Libre Baskerville' => __( 'Libre Baskerville', 'affiliate-review' ),
        'Lobster Two' => __( 'Lobster Two', 'affiliate-review' ),
        'Merriweather' => __( 'Merriweather', 'affiliate-review' ),
        'Monda' => __( 'Monda', 'affiliate-review' ),
        'Montserrat' => __( 'Montserrat', 'affiliate-review' ),
        'Muli' => __( 'Muli', 'affiliate-review' ),
        'Marck Script' => __( 'Marck Script', 'affiliate-review' ),
        'Noto Serif' => __( 'Noto Serif', 'affiliate-review' ),
        'Open Sans' => __( 'Open Sans', 'affiliate-review' ),
        'Overpass' => __( 'Overpass', 'affiliate-review' ),
        'Overpass Mono' => __( 'Overpass Mono', 'affiliate-review' ),
        'Oxygen' => __( 'Oxygen', 'affiliate-review' ),
        'Orbitron' => __( 'Orbitron', 'affiliate-review' ),
        'Patua One' => __( 'Patua One', 'affiliate-review' ),
        'Pacifico' => __( 'Pacifico', 'affiliate-review' ),
        'Padauk' => __( 'Padauk', 'affiliate-review' ),
        'Playball' => __( 'Playball', 'affiliate-review' ),
        'Playfair Display' => __( 'Playfair Display', 'affiliate-review' ),
        'PT Sans' => __( 'PT Sans', 'affiliate-review' ),
        'Philosopher' => __( 'Philosopher', 'affiliate-review' ),
        'Permanent Marker' => __( 'Permanent Marker', 'affiliate-review' ),
        'Poiret One' => __( 'Poiret One', 'affiliate-review' ),
        'Quicksand' => __( 'Quicksand', 'affiliate-review' ),
        'Quattrocento Sans' => __( 'Quattrocento Sans', 'affiliate-review' ),
        'Raleway' => __( 'Raleway', 'affiliate-review' ),
        'Rubik' => __( 'Rubik', 'affiliate-review' ),
        'Rokkitt' => __( 'Rokkitt', 'affiliate-review' ),
        'Russo One' => __( 'Russo One', 'affiliate-review' ),
        'Righteous' => __( 'Righteous', 'affiliate-review' ),
        'Slabo' => __( 'Slabo', 'affiliate-review' ),
        'Source Sans Pro' => __( 'Source Sans Pro', 'affiliate-review' ),
        'Shadows Into Light Two' => __( 'Shadows Into Light Two', 'affiliate-review'),
        'Shadows Into Light' => __( 'Shadows Into Light', 'affiliate-review' ),
        'Sacramento' => __( 'Sacramento', 'affiliate-review' ),
        'Shrikhand' => __( 'Shrikhand', 'affiliate-review' ),
        'Tangerine' => __( 'Tangerine', 'affiliate-review' ),
        'Ubuntu' => __( 'Ubuntu', 'affiliate-review' ),
        'VT323' => __( 'VT323', 'affiliate-review' ),
        'Varela Round' => __( 'Varela Round', 'affiliate-review' ),
        'Vampiro One' => __( 'Vampiro One', 'affiliate-review' ),
        'Vollkorn' => __( 'Vollkorn', 'affiliate-review' ),
        'Volkhov' => __( 'Volkhov', 'affiliate-review' ),
        'Yanone Kaffeesatz' => __( 'Yanone Kaffeesatz', 'affiliate-review' )
		);
	}

	/**
	 * Returns the available font weights.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	public function get_font_weight_choices() {

		return array(
			'' => esc_html__( 'No Fonts weight', 'affiliate-review' ),
			'100' => esc_html__( 'Thin',       'affiliate-review' ),
			'300' => esc_html__( 'Light',      'affiliate-review' ),
			'400' => esc_html__( 'Normal',     'affiliate-review' ),
			'500' => esc_html__( 'Medium',     'affiliate-review' ),
			'700' => esc_html__( 'Bold',       'affiliate-review' ),
			'900' => esc_html__( 'Ultra Bold', 'affiliate-review' ),
		);
	}

	/**
	 * Returns the available font styles.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	public function get_font_style_choices() {

		return array(
			'' => esc_html__( 'No Fonts Style', 'affiliate-review' ),
			'normal'  => esc_html__( 'Normal', 'affiliate-review' ),
			'italic'  => esc_html__( 'Italic', 'affiliate-review' ),
			'oblique' => esc_html__( 'Oblique', 'affiliate-review' )
		);
	}
}

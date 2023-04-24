<?php
if ( class_exists( 'WP_Customize_Control' ) ) {
    class Custom_Multiselect_Control extends WP_Customize_Control {
        public $type = 'multiselect';
        // Hiển thị mutil-select và các tùy chọn của nó
        public function render_content() {
            ?>
            <label>
                <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                <?php if ( !empty( $this->description ) ) : ?>
                    <span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
                <?php endif; ?>
                <select multiple="multiple" <?php $this->link(); ?>>
                    <?php foreach ( $this->choices as $value => $label ) : ?>
                        <option value="<?php echo esc_attr( $value ); ?>" <?php selected( in_array( $value, $this->value() ) ); ?>><?php echo esc_html( $label ); ?></option>
                    <?php endforeach; ?>
                </select>
            </label>
            <?php
        }
    }
}

<?php
/**
 * @package Boxed WP   IGthemes_Options_Framework
 */

//CUSTOMIZER
if( ! class_exists( 'WP_Customize_Control' ) )
     return;

//CUSTOM HTMl
class Html_Custom_Control extends WP_Customize_Control {
    public $type = 'custom';
    public function render_content() { ?>
        <label>
            <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
            <span class="description customize-control-description"><?php echo $this->description; ?></span>
        </label>
        <?php
    }
}

//CUSTOM RADIO IMAGE
class Radio_Image_Control extends WP_Customize_Control {

public $type = 'radio-image';

    public function render_content() {

        /* If no choices are provided, bail. */
        if ( empty( $this->choices ) )
            return; ?>

        <?php if ( !empty( $this->label ) ) : ?>
            <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
        <?php endif; ?>

        <?php if ( !empty( $this->description ) ) : ?>
            <span class="description customize-control-description"><?php echo $this->description; ?></span>
        <?php endif; ?>

        <div id="<?php echo esc_attr( "input_{$this->id}" ); ?>" class="img-buttonset">

            <?php foreach ( $this->choices as $value => $args ) : ?>

                <input type="radio" value="<?php echo esc_attr( $value ); ?>" name="<?php echo esc_attr( "_customize-radio-{$this->id}" ); ?>" id="<?php echo esc_attr( "{$this->id}-{$value}" ); ?>" <?php $this->link(); ?> <?php checked( $this->value(), $value ); ?> />

                <label for="<?php echo esc_attr( "{$this->id}-{$value}" ); ?>">
                    <span class="screen-reader-text"><?php echo esc_html( $args['label'] ); ?></span>
                    <img src="<?php echo esc_url( sprintf( $args['url'], get_template_directory_uri(), get_stylesheet_directory_uri() ) ); ?>" alt="<?php echo esc_attr( $args['label'] ); ?>" />
                </label>

            <?php endforeach; ?>

        </div><!-- .image -->
    <?php }
}

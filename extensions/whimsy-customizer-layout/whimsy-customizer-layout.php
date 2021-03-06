<?php

/**
 * Whimsy+ Box Layout Style
 *
 * @package whimsy
 */

if ( class_exists( 'Kirki' ) ) { 
    
    Kirki::add_section( 'layout', array(
        'title'          => __( 'Layout' ),
        'description'    => __( 'Add custom CSS here' ),
        'panel'          => '', // Not typically needed.
        'priority'       => 160,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '', // Rarely needed.
    ) );
    
	/**
	 * Add the configuration.
	 */
    
	Kirki::add_config( 'whimsy_box_customizer', array(
		'capability'    => 'edit_theme_options',
		'option_type'   => 'theme_mod',
	) );  
    
    /* Box layout fields. */
    
    Kirki::add_field( 'whimsy_box_customizer', array(
        'type'        => 'switch',
        'settings'    => 'box_layout',
        'label'       => __( 'Enable Box-style layout?', 'whimsy' ),
        'section'     => 'layout',
        'default'     => false,
        'priority'    => 10,
    ) );
    
    Kirki::add_field( 'whimsy_box_customizer', array(
        'type'        => 'color-alpha',
        'settings'    => 'color_box_bg',
        'label'       => __( 'Box Background Color', 'whimsy' ),
        'section'     => 'layout',
        'default'     => '#ffffff',
        'priority'    => 11,
        'required'  => array(
            array(
            'setting'  => 'box_layout',
            'operator' => '==',
            'value'    => true
            ),
        ),
        'output'      => array(
            array(
                'element'  => '#page',
                'property' => 'background-color',
            ),
        ),
		'transport'   => 'postMessage',
        'js_vars'     => array(
            array(
                'element'  => '#page',
                'function' => 'css',
                'property' => 'background-color',
            ),
        ),
    ) );

    Kirki::add_field( 'whimsy_box_customizer', array(
        'type'        => 'dimension',
        'settings'    => 'box_layout_margin',
        'label'       => __( 'Margin', 'whimsy' ),
        'description' => __( 'This controls how much blank space is between the sides of the browser window and your content.', 'whimsy' ),
        'section'     => 'layout',
        'default'     => '10px',
        'priority'    => 13,
        'required'  => array(
            array(
            'setting'  => 'box_layout',
            'operator' => '==',
            'value'    => true
            ),
        ),
        'output'      => array(
            array(
                'element'  => '#page',
                'property' => 'margin',
            ),
        ),
		'transport'   => 'postMessage',
		'js_vars'     => array(
			array(
				'element'  => '#page',
				'property' => 'margin',
				'function' => 'css',
			),
		),
    ) );

    Kirki::add_field( 'whimsy_box_customizer', array(
    	'type'        => 'slider',
    	'settings'    => 'box_layout_border_radius',
    	'label'       => __( 'Border Radius', 'kirki-demo' ),
		'description' => __( 'This will curve the corners of the box layout.', 'kirki-demo' ),
    	'section'     => 'layout',
    	'default'     => '10',
    	'priority'    => 14,
        'required'  => array(
            array(
            'setting'  => 'box_layout',
            'operator' => '==',
            'value'    => true
            ),
        ),
        'output'      => array(
            array(
                'element'  => '#page',
                'property' => 'border-radius',
                'units'    => 'px',
            ),
        ),
		'transport'    => 'postMessage',
		'js_vars'      => array(
			array(
				'element'  => '#page',
				'property' => 'border-radius',
				'units'    => 'px',
				'function' => 'css',
			),
		),
        'choices'      => array(
            'min'  => 0,
            'max'  => 30,
            'step' => 1,
        )
    ) );
    
    Kirki::add_field( 'whimsy_box_customizer', array(
        'type'        => 'toggle',
        'settings'    => 'box_shadow',
        'label'       => __( 'Enable box shadow?', 'whimsy' ),
        'section'     => 'layout',
        'default'     => false,
        'priority'    => 15,
        'required'  => array(
            array(
            'setting'  => 'box_layout',
            'operator' => '==',
            'value'    => true
            ),
        ),
    ) );
    
    Kirki::add_field( 'whimsy_box_customizer', array(
    	'type'        => 'radio-buttonset',
    	'settings'    => 'box_shadow_style',
    	'label'       => __( 'Box-Shadow Style', 'whimsy' ),
		'description' => __( 'Pick a light or dark glow around the box.', 'whimsy' ),
    	'section'     => 'layout',
    	'default'     => 'light',
    	'priority'    => 15,
        'choices'     => array(
            'light'    => __( 'Light', 'whimsy' ),
            'dark'    => __( 'Dark', 'whimsy' )
        ),
        'required'    => array(
            array(
                'setting'  => 'box_layout',
                'operator' => '==',
                'value'    => true
            ),
        )
    ) );
}
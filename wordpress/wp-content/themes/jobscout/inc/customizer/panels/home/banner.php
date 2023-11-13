<?php
/**
 * Banner Section
 *
 * @package jobscout
 */
if ( ! function_exists( 'jobscout_customize_register_frontpage_banner' ) ) :

function jobscout_customize_register_frontpage_banner( $wp_customize ) {
	
    $wp_customize->get_section( 'header_image' )->panel                    = 'frontpage_settings';
    $wp_customize->get_section( 'header_image' )->title                    = __( 'Banner Section', 'jobscout' );
    $wp_customize->get_section( 'header_image' )->priority                 = 10;
    $wp_customize->get_section( 'header_image' )->description              = '';                                               
    $wp_customize->get_setting( 'header_image' )->transport                = 'refresh';
    $wp_customize->get_setting( 'header_video' )->transport                = 'refresh';
    $wp_customize->get_setting( 'external_header_video' )->transport       = 'refresh';
    
    /** Banner Options */
    $wp_customize->add_setting(
		'ed_banner_section',
		array(
			'default'			=> true,
			'sanitize_callback' => 'jobscout_sanitize_checkbox'
		)
	);

	$wp_customize->add_control(
		new JobScout_Toggle_Control(
    		$wp_customize,
    		'ed_banner_section',
    		array(
                'label'       => __( 'Enable Banner Section', 'jobscout' ),
                'description' => __( 'Enable to show banner section.', 'jobscout' ),
                'section'     => 'header_image',
                'priority'    => 5	
     		)            
		)
	);
    
    /** Title */
    $wp_customize->add_setting(
        'banner_title',
        array(
            'default'           => __( 'FIND YOUR DREAM JOBS', 'jobscout' ),
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage'
        )
    );
    
    $wp_customize->add_control(
        'banner_title',
        array(
            'label'           => __( 'Title', 'jobscout' ),
            'section'         => 'header_image',
            'type'            => 'text',
        )
    );
    
    $wp_customize->selective_refresh->add_partial( 'banner_title', array(
        'selector' => '.site-banner .banner-caption h2.title',
        'render_callback' => 'jobscout_get_banner_title',
    ) );
    
    /** Sub Title */
    $wp_customize->add_setting(
        'banner_subtitle',
        array(
            'default'           => __( 'The secret behind our company is simple: to always put ourselves in the other person\'s shoes-employee, guest or customer. This allows us to see the world through their eyes, anticipate their needs and better understand their feelings.', 'jobscout' ),
            'sanitize_callback' => 'wp_kses_post',
            'transport'         => 'postMessage'
        )
    );
    
    $wp_customize->add_control(
        'banner_subtitle',
        array(
            'label'           => __( 'Sub Title', 'jobscout' ),
            'section'         => 'header_image',
            'type'            => 'textarea',
        )
    );
    
    $wp_customize->selective_refresh->add_partial( 'banner_subtitle', array(
        'selector'        => '.site-banner .banner-caption .description',
        'render_callback' => 'jobscout_get_banner_sub_title',
    ) );
    
}
endif;
add_action( 'customize_register', 'jobscout_customize_register_frontpage_banner' );
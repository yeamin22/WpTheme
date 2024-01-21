<?php
/**
 * Theme Option Header Settings
 */
defined( 'ABSPATH' ) || exit;

$custom_logo_id = get_theme_mod( 'custom_logo' );
$default_header_logo = "";
if($custom_logo_id){
    $default_header_logo = wp_get_attachment_image_url( $custom_logo_id, 'full');
}else{
    $default_header_logo = "https://s.wordpress.org/style/images/codeispoetry.png";
}

Redux::set_field( 
    $opt_name, 
    'yhpot-header_opt', 
    array(
        'id'       => 'yhpot_opt_header_logo',
        'type'     => 'media', 
        'url'      => true,
        'title'    => esc_html__('Header Logo', 'your-textdomain-here'),
        'desc'     => esc_html__('Basic media uploader with disabled URL input field.', 'your-textdomain-here'),        
        'default'  => array(
            'url'=> $default_header_logo
        ),
        'preview'      => true,
        'preview_size' => 'full',
    ) 
);

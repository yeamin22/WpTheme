<?php
/**
 * Theme Option Header Settings
 */
defined( 'ABSPATH' ) || exit;


Redux::set_field( $opt_name, 'yhpot-footer_opt', array(

    'id' => 'footer_copy_right_opt',
    'type' => 'textarea',
    'title' => __( 'Copy Right' , 'redux_docs_generator' )
) );
Redux::set_field( $opt_name, 'yhpot-footer_opt', array(
    'id' => 'footer_developby_opt',
    'type' => 'textarea',
    'title' => __( 'Develop By:' , 'redux_docs_generator' )
) );
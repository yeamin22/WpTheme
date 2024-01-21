<?php
/**
 * This file for enqueue assets
 * @subpackage YH_POT
 * @since YH Pot 1.0
 */

function yhpot_assets() {

    /* CSS Files */
    $css_files = [
        [
            'handle'  => 'bootstrap',
            'src'     => YHPOT_ASSETS . "/css/vendors/bootstrap.css",
            'version' => '',
        ],
        [
            'handle'  => 'font-awesome',
            'src'     => YHPOT_ASSETS . "/fonts/font-awesome/css/font-awesome.css",
            'version' => '',
        ],
        [
            'handle'  => 'magnific-popup',
            'src'     => YHPOT_ASSETS . "/css/vendors/magnific-popup.css",
            'version' => '',
        ],
        [
            'handle'  => 'splitting',
            'src'     => YHPOT_ASSETS . "/css/vendors/splitting.css",
            'version' => '',
        ],
        [
            'handle'  => 'swiper',
            'src'     => YHPOT_ASSETS . "/css/vendors/swiper.css",
            'version' => '',
        ],
        [
            'handle'  => 'animate',
            'src'     => YHPOT_ASSETS . "/css/vendors/animate.css",
            'version' => '',
        ],
        [
            'handle'  => 'main-style',
            'src'     => YHPOT_ASSETS . "/css/style.css",
            'version' => '',
        ],
        [
            'handle'  => 'dark',
            'src'     => YHPOT_ASSETS . "/css/dark.css",
            'version' => '',
        ],
    ];

    foreach ( $css_files as $css_file ) {
        wp_enqueue_style( $css_file['handle'], $css_file['src'], [], $css_file['version'], 'all' );
    }

    /* Javascript Files */

    $js_files = [
        [
            'handle'  => 'yhjquery',
            'src'     => YHPOT_ASSETS . "/js/jquery.min.js",
            'deps'    => [],
            'version' => '',
        ],
        [
            'handle'  => 'jquery-validate',
            'src'     => YHPOT_ASSETS . "/js/jquery.validate.min.js",
            'deps'    => [],
            'version' => '',
        ],
        [
            'handle'  => 'bootstrap',
            'src'     => YHPOT_ASSETS . "/js/bootstrap.js",
            'deps'    => [],
            'version' => '',
        ],
        [
            'handle'  => 'swiper',
            'src'     => YHPOT_ASSETS . "/js/swiper.js",
            'deps'    => [],
            'version' => '',
        ],
        [
            'handle'  => 'splitting',
            'src'     => YHPOT_ASSETS . "/js/splitting.js",
            'deps'    => [],
            'version' => '',
        ],
        [
            'handle'  => 'jarallax',
            'src'     => YHPOT_ASSETS . "/js/jarallax.min.js",
            'deps'    => [],
            'version' => '',
        ],
        [
            'handle'  => 'magnific-popup',
            'src'     => YHPOT_ASSETS . "/js/magnific-popup.js",
            'deps'    => [],
            'version' => '',
        ],
        [
            'handle'  => 'imagesloaded-pkgd',
            'src'     => YHPOT_ASSETS . "/js/imagesloaded.pkgd.js",
            'deps'    => [],
            'version' => '',
        ],
        [
            'handle'  => 'isotope',
            'src'     => YHPOT_ASSETS . "/js/isotope.pkgd.js",
            'deps'    => [],
            'version' => '',
        ],
        [
            'handle'  => 'scrollar',
            'src'     => YHPOT_ASSETS . "/js/jquery.scrolla.js",
            'deps'    => [],
            'version' => '',
        ],
        [
            'handle'  => 'skrollr',
            'src'     => YHPOT_ASSETS . "/js/skrollr.js",
            'deps'    => [],
            'version' => '',
        ],
        [
            'handle'  => 'jquery-cookie',
            'src'     => YHPOT_ASSETS . "/js/jquery.cookie.js",
            'deps'    => [],
            'version' => '',
        ],
        [
            'handle'  => 'typed',
            'src'     => YHPOT_ASSETS . "/js/typed.js",
            'deps'    => [],
            'version' => '',
        ],
        [
            'handle'  => 'main-script',
            'src'     => YHPOT_ASSETS . "/js/common.js",
            'deps'    => [],
            'version' => '',
        ],
    ];

    foreach ( $js_files as $js_file ) {
        wp_enqueue_script( $js_file['handle'], $js_file['src'], $js_file['deps'], $css_file['version'], true );
    }

}
add_action( "wp_enqueue_scripts", "yhpot_assets" );
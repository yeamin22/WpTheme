<?php
namespace YHPOTADMIN;
/**
 * Admin Pages Handler
 */
class Admin {

    public function __construct() {
        add_action( 'admin_menu', [$this, 'admin_menu'] );
        add_action( 'wp_ajax_yhpot_ajax_install_plugin', [$this, 'yhpot_ajax_install_plugin'] );   
    }

    /**
     * Register our menu page
     *
     * @return void
     */
    public function admin_menu() {
        global $submenu;

        $capability = 'manage_options';
        $slug = 'admin-yh-pot';

        $hook = add_menu_page( __( 'YH Pot', YHPOT_TEXTDOMAIN ), __( 'YH Pot', YHPOT_TEXTDOMAIN ), $capability, $slug, [$this, 'yhpot_admin_screens'], 'dashicons-text', 4 );
        if ( current_user_can( $capability ) ) {
            $submenu[$slug][] = [ __( 'Demo', YHPOT_TEXTDOMAIN ), $capability, 'admin.php?page=' . $slug ];
        }
        add_action( 'load-' . $hook, [$this, 'init_hooks'] );

    }

    /**
     * Initialize our hooks for the admin page
     *
     * @return void
     */
    public function init_hooks() {
        add_action( 'admin_enqueue_scripts', [$this, 'enqueue_scripts'] );
    }

    /**
     * Load scripts and styles for the app
     *
     * @return void
     */
    public function enqueue_scripts() {
        wp_enqueue_style( 'yhpot-admin', YHPOT_ASSETS . "/admin/css/yhpot-admin.css" );
        wp_enqueue_script( 'yhpot-admin', YHPOT_ASSETS . "/admin/js/yhpot-admin.js", ['jquery'], '1.0.0', true );

        $demoimport_nonce = wp_create_nonce( "demo_import_nonce" );
        wp_localize_script( "yhpot-admin", "demoObj", ['ajaxurl' => admin_url( "admin-ajax.php" ), "nonce" => $demoimport_nonce] );
    }

    /**
     * Render our admin page
     *
     * @return void
     */
    public function yhpot_admin_screens() {
        include_once YHPOT_PATH . "/templates/admin-screens/yhpot-admin-render.php";
    }

    public function yhpot_ajax_install_plugin() {

        if ( empty( $_POST['slug'] ) ) {
            wp_send_json_error(
                [
                    'slug'         => '',
                    'errorCode'    => 'no_plugin_specified',
                    'errorMessage' => __( 'No plugin specified.' ),
                ]
            );
        }

        $status = [
            'install' => 'plugin',
            'slug'    => sanitize_key( wp_unslash( $_POST['slug'] ) ),
        ];

        if ( !current_user_can( 'install_plugins' ) ) {
            $status['errorMessage'] = __( 'Sorry, you are not allowed to install plugins on this site.' );
            wp_send_json_error( $status );
        }

        require_once ABSPATH . 'wp-admin/includes/class-wp-upgrader.php';
        require_once ABSPATH . 'wp-admin/includes/plugin-install.php';

        $api = plugins_api(
            'plugin_information',
            [
                'slug'   => sanitize_key( wp_unslash( $_POST['slug'] ) ),
                'fields' => [
                    'sections' => false,
                ],
            ]
        );

        if ( is_wp_error( $api ) ) {
            $status['errorMessage'] = $api->get_error_message();
            wp_send_json_error( $status );
        }
        $status['pluginName'] = $api->name;

        $skin = new \WP_Ajax_Upgrader_Skin();
        $upgrader = new \Plugin_Upgrader( $skin );
        $result = $upgrader->install( $api->download_link );

        if ( defined( 'WP_DEBUG' ) && WP_DEBUG ) {
            $status['debug'] = $skin->get_upgrade_messages();
        }

        if ( is_wp_error( $result ) ) {
            $status['errorCode'] = $result->get_error_code();
            $status['errorMessage'] = $result->get_error_message();
            wp_send_json_error( $status );
        } elseif ( is_wp_error( $skin->result ) ) {
            $status['errorCode'] = $skin->result->get_error_code();
            $status['errorMessage'] = $skin->result->get_error_message();
            wp_send_json_error( $status );
        } elseif ( $skin->get_errors()->has_errors() ) {
            $status['errorMessage'] = $skin->get_error_messages();
            wp_send_json_error( $status );
        } elseif ( is_null( $result ) ) {
            global $wp_filesystem;

            $status['errorCode'] = 'unable_to_connect_to_filesystem';
            $status['errorMessage'] = __( 'Unable to connect to the filesystem. Please confirm your credentials.' );

            // Pass through the error from WP_Filesystem if one was raised.
            if ( $wp_filesystem instanceof \WP_Filesystem_Base && is_wp_error( $wp_filesystem->errors ) && $wp_filesystem->errors->has_errors() ) {
                $status['errorMessage'] = esc_html( $wp_filesystem->errors->get_error_message() );
            }

            wp_send_json_error( $status );
        }

        $install_status = install_plugin_install_status( $api );
        $pagenow = isset( $_POST['pagenow'] ) ? sanitize_key( $_POST['pagenow'] ) : '';

        // If installation request is coming from import page, do not return network activation link.
        $plugins_url = ( 'import' === $pagenow ) ? admin_url( 'plugins.php' ) : network_admin_url( 'plugins.php' );

        if ( current_user_can( 'activate_plugin', $install_status['file'] ) && is_plugin_inactive( $install_status['file'] ) ) {
            $status['activateUrl'] = add_query_arg(
                [
                    '_wpnonce' => wp_create_nonce( 'activate-plugin_' . $install_status['file'] ),
                    'action'   => 'activate',
                    'plugin'   => $install_status['file'],
                ],
                $plugins_url
            );
        }

        if ( is_multisite() && current_user_can( 'manage_network_plugins' ) && 'import' !== $pagenow ) {
            $status['activateUrl'] = add_query_arg( [ 'networkwide' => 1 ], $status['activateUrl'] );
        }

        if ( !is_wp_error( activate_plugin( $install_status['file'] ) ) ) {
            $status['activatedPlugin'] = true;
        }

        wp_send_json_success( $status );

    }

}

new Admin();
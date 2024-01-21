<?php
/*
Demo Page
 */
?>
<div class="wrap">
    <h2></h2>
</div>
<div class="wrap yhpot-admin-wrap">
    <?php
// Include the Avada_Importer_Data class if it doesn't exist.
if ( !class_exists( 'YHPOT_Importer_Data' ) ) {
    include_once get_template_directory() . '/includes/importer/class-yhpot-importer-data.php';
    $demos = YHPOT_Importer_Data::get_data();
    ?>
    <h1>Demo</h1>
    <section class="yhpot-container">
        <div class="demo-import-overlay"></div>      
        <h2>Choose Your Template</h2>
        <?php

    $plugin_dependencies = YHPOT_TGM_Plugin_Activation::$instance->plugins;
    foreach ( $plugin_dependencies as $key => $plugin ) {
        $plugin_dependencies[$key]['active'] = yhpot_is_plugin_activated( $plugin['file_path'] );
        $plugin_dependencies[$key]['installed'] = file_exists( WP_PLUGIN_DIR . '/' . $plugin['file_path'] );
    }
    if ( empty( $demo_details['plugin_dependencies'] ) ) {
        $demo_details['plugin_dependencies'] = [];
    }
    $import_stages = [
        [
            'value'              => 'post',
            'label'              => esc_html__( 'Posts', 'Avada' ),
            'data'               => 'content',
            'feature_dependency' => 'post',
        ],
        [
            'value'              => 'page',
            'label'              => esc_html__( 'Pages', 'Avada' ),
            'data'               => 'content',
            'feature_dependency' => 'page',
        ],        
        [
            'value' => 'attachment',
            'label' => esc_html__( 'Images', 'Avada' ),
            'data'  => 'content',
        ],
       
        [
            'value' => 'theme_options',
            'label' => esc_html__( 'Theme Options', 'Avada' ),
        ],
        [
            'value' => 'widgets',
            'label' => esc_html__( 'Widgets', 'Avada' ),
        ],
    ];

    ?>
        <div class="row">
            <?php foreach ( $demos as $demo => $demo_details ) {                
                $demoID = strtolower($demo);
            ?>
            <!-- Item <?php echo $demoID ?> -->
            <div class="yhpot-demo-item">
                <div class="yhpot_import_demo_title">
                    <h2><?php echo $demo_details['name']; ?></h2>
                </div>
                <figure class="figure">
                    <img src="<?php echo YHPOT_ASSETS . "/admin/images/demo/yhpot-demo-home.png" ?>" />
                    <div class="yhpot_import_demo_wrap on-hover">
                        <a href="#" class="btn yhpot-btn yhpot_import_demo_open"
                            data-demo-id="<?php echo $demoID; ?>"
                            id="yhpot_demo_open_<?php echo $demoID; ?>">Import Demo</a>
                        <a href="#" class="btn yhpot-btn yhpot_preview">Preview</a>
                    </div>
                </figure>
               
                <div id="demo_item_<?php echo $demoID; ?>" 
                    class="demo_item_popup <?php echo $demoID; ?> ">

                    <!-- Notice -->
                        <div class="demo-update-modal-status-bar-label"><span></span></div>


                    <a href="#" class="close_btn_wrap yhpot_close_popup"
                        data-demo-id="<?php echo $demoID; ?>">
                        <span class="dashicons dashicons-no-alt"></span>
                    </a>
                    <div class="yhpot_required_plugins">
                        <h5>The Following Plugins Are Required To Import Content</h5>
                        <div class="yhpot_required_plugins_lists">

                            <?php
$demo_details['plugin_dependencies']['yhpot-core'] = true;

        foreach ( $demo_details['plugin_dependencies'] as $slug => $required ):

            if ( true === $required ) {
                ?>
	                            <div class="yhpot_plugin_item demo-required-plugins">
	                                <span
	                                    class="name"><?php echo isset( $plugin_dependencies[$slug] ) ? esc_html( $plugin_dependencies[$slug]['name'] ) : esc_html( $slug ); ?></span>

	                                <?php
    $label = __( 'Install', 'yhpot' );
                $status = 'install'; // phpcs:ignore WordPress.WP.GlobalVariablesOverride
                if ( isset( $plugin_dependencies[$slug] ) && $plugin_dependencies[$slug]['active'] ) {
                    $label = __( 'Active', 'yhpot' );
                    $status = 'active'; // phpcs:ignore WordPress.WP.GlobalVariablesOverride
                } elseif ( isset( $plugin_dependencies[$slug] ) && $plugin_dependencies[$slug]['installed'] ) {
                $label = __( 'Activate', 'yhpot' );
                $status = 'activate'; // phpcs:ignore WordPress.WP.GlobalVariablesOverride
            }
            ?>
                                <span class="required-plugin-status <?php echo esc_attr( $status ); ?> ">
                                    <?php if ( 'activate' === $status ): ?>
                                    <a href="<?php echo esc_url( admin_url( 'themes.php?page=yhpot-plugins' ) ); ?>"
                                        target="_blank"
                                        data-nonce="<?php echo esc_attr( wp_create_nonce( 'yhpot-activate' ) ); ?>"
                                        data-plugin="<?php echo esc_attr( $slug ); ?>"
                                        data-plugin_name="<?php echo esc_attr( $plugin_dependencies[$slug]['name'] ); ?>">
                                        <?php elseif ( 'install' === $status ): ?>

                                        <a href="<?php echo esc_url( admin_url( 'themes.php?page=yhpot-plugins' ) ); ?>"
                                            target="_blank"
                                            data-nonce="<?php echo esc_attr( wp_create_nonce( 'yhpot-activate' ) ); ?>"
                                            data-plugin="<?php echo esc_attr( $slug ); ?>"
                                            data-plugin_name="<?php echo esc_attr( $plugin_dependencies[$slug]['name'] ); ?>"
                                            data-tgmpa_nonce="<?php echo esc_attr( wp_create_nonce( 'tgmpa-install' ) ); ?>">
                                            <?php endif;?>

                                            <?php echo esc_html( $label ); ?>

                                            <?php if ( 'active' !== $status ): ?>
                                        </a>

                                        <?php endif;?>
                                </span>

                            </div>

                            <?php }
        endforeach;
        ?>
                        </div>
                    </div>

                    <div class="yhpot_import_content_form">
                        <div class="demo-import-form">
                            <h4 class="demo-form-title">
                                Import Content <span>(menus only import with "All")</span>
                            </h4>
                            <form id="import-<?php echo $demoID; ?>" data-demo-id="<?php echo $demoID; ?>">
                                <div class="import_data_wrapper">
                                    <p>
                                        <input type="checkbox" value="all" id="import-all-<?php echo $demoID; ?>" /> 
                                        <label for="import-all-<?php echo $demoID; ?>">All</label>
                                    </p>
                                    <?php 
                                    foreach($import_stages as $import_stage ){
                                        if ( ! empty( $import_stage['data'] ) ) {
                                            $data = 'data-type="' . esc_attr( $import_stage['data'] ) . '"';
                                        }
                                    ?>  
                                        <p>
                                            <input type="checkbox" <?php echo $data; ?> value="all" id="import-<?php echo $import_stage['value'] .'-'. $demoID ;?>" /> 
                                            <label for="import-<?php echo $import_stage['value'] .'-'. $demoID ;?>"><?php echo $import_stage['label']; ?></label>
                                        </p>
                                    <?php
                                    }                                 
                                    ?>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="yhpot_import_data">
                        <a href="#" class="import_data_btn button_import_data" data-demo-id="<?php echo $demoID; ?>" id="import_data_<?php echo $demoID; ?>">Import</a>
                    </div>
                </div>

            </div>

            <?php }?>
        </div>
    </section>
    <?php }?>
</div>
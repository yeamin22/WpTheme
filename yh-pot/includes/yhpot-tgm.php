<?php
add_action( 'tgmpa_register', 'yhpot_register_required_plugins' );
/**
 * Register the required plugins for this theme.
 */
function yhpot_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 */
	$plugins = array(
		// This is an example of how to include a plugin bundled with a theme.
		array(
			'name'               => 'Yhpot Core', // The plugin name.
			'slug'               => 'yhpot-core', // The plugin slug (typically the folder name).
			'source'             => get_template_directory() . '/lib/plugins/yhpot-core.zip', // The plugin source.
			'required'           => true, // If false, the plugin is only 'recommended' instead of required.
			'version'            => '1.0.0', 
			'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			'external_url'       => '', // If set, overrides default API URL and points to an external URL.
			'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
		),		

		// This is an example of how to include a plugin from the WordPress Plugin Repository.
		array(
			'name'      => 'Contact Form 7',
			'slug'      => 'contact-form-7',
			'required'  => true,
		),

		// This is an example of how to include a plugin from the WordPress Plugin Repository.
		array(
			'name'      => 'Elementor',
			'slug'      => 'elementor',
			'required'  => true,
		),

	);
	/*
	 * Array of configuration settings. Amend each line as needed.
	 *
	 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
	 * strings available, please help us make TGMPA even better by giving us access to these translations or by
	 * sending in a pull-request with .po file(s) with the translations.
	 *
	 * Only uncomment the strings in the config array if you want to customize the strings.
	 */
	$config = array(
		'id'           => 'yhpot',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'yhpot-plugins', // Menu slug.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.	
		'strings'      => array(
			'page_title'                      => __( 'Install Required Plugins', 'yhpot' ),
			'menu_title'                      => __( 'Install Plugins', 'yhpot' ),		
			'installing'                      => __( 'Installing Plugin: %s', 'yhpot' ),

			'updating'                        => __( 'Updating Plugin: %s', 'yhpot' ),
			'oops'                            => __( 'Something went wrong with the plugin API.', 'yhpot' ),
			'notice_can_install_recommended'  => _n_noop(			
				'This theme recommends the following plugin: %1$s.',
				'This theme recommends the following plugins: %1$s.',
				'yhpot'
			),
			'notice_ask_to_update'            => _n_noop(		
				'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.',
				'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.',
				'yhpot'
			),
			'notice_ask_to_update_maybe'      => _n_noop(			
				'There is an update available for: %1$s.',
				'There are updates available for the following plugins: %1$s.',
				'yhpot'
			),
			'notice_can_activate_required'    => _n_noop(
				
				'The following required plugin is currently inactive: %1$s.',
				'The following required plugins are currently inactive: %1$s.',
				'yhpot'
			),
			'notice_can_activate_recommended' => _n_noop(
				
				'The following recommended plugin is currently inactive: %1$s.',
				'The following recommended plugins are currently inactive: %1$s.',
				'yhpot'
			),
			'install_link'                    => _n_noop(
				'Begin installing plugin',
				'Begin installing plugins',
				'yhpot'
			),
			'update_link' 					  => _n_noop(
				'Begin updating plugin',
				'Begin updating plugins',
				'yhpot'
			),
			'activate_link'                   => _n_noop(
				'Begin activating plugin',
				'Begin activating plugins',
				'yhpot'
			),
			'return'                          => __( 'Return to Required Plugins Installer', 'yhpot' ),
			'plugin_activated'                => __( 'Plugin activated successfully.', 'yhpot' ),
			'activated_successfully'          => __( 'The following plugin was activated successfully:', 'yhpot' ),
		
			'plugin_already_active'           => __( 'No action taken. Plugin %1$s was already active.', 'yhpot' ),		
			'plugin_needs_higher_version'     => __( 'Plugin not activated. A higher version of %s is needed for this theme. Please update the plugin.', 'yhpot' ),		
			'complete'                        => __( 'All plugins installed and activated successfully. %1$s', 'yhpot' ),
			'dismiss'                         => __( 'Dismiss this notice', 'yhpot' ),
			'notice_cannot_install_activate'  => __( 'There are one or more required or recommended plugins to install, update or activate.', 'yhpot' ),
			'contact_admin'                   => __( 'Please contact the administrator of this site for help.', 'yhpot' ),

			'nag_type'                        => '', 
		),
		 
	);

	tgmpa( $plugins, $config );
}

/**
 * Returns the user capability for showing the notices.
 *
 * @return string
 */
function yhpot_tgm_show_admin_notice_capability() {
	return 'switch_themes';
}
add_filter( 'tgmpa_show_admin_notice_capability', 'yhpot_tgm_show_admin_notice_capability' );

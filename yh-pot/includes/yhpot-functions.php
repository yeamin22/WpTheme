<?php
/**
 * A collections of functions.
 */

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

if ( ! function_exists( 'yhpot_is_plugin_activated' ) ) {	
	function yhpot_is_plugin_activated( $plugin ) {
		return in_array( $plugin, (array) get_option( 'active_plugins', [] ), true ) || is_plugin_active_for_network( $plugin );
	}
}
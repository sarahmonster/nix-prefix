<?php
/**
 * Plugin Name: Nix Prefix
 * Plugin URI:
 * Description: A super-simple plugin to remove the "Category:" prefix text on archive page titles.
 * Version: 0.1.0
 * Author: sarah semark
 * Author URI: http://triggersandsparks.com
 * License: GPLv2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */

function nix_prefix_filter_archive_title( $title ) {
	$options = get_option( 'nix_prefix_settings' );
	print_r( $options );

	if ( is_archive() ) :
		if ( array_key_exists( 'nix_prefix_wrap_in_span', $options ) ) :
			// Remove the colon and space, wrap text in a span
			$pattern = '/([a-z]*):\s?/mi';
			$replacement = '<span class="nix-prefix">${1}</span>';

		else :
			// Remove everything
			$pattern = '/([a-z]*:\s?)/mi';
			$replacement = '';
		endif;

		// Do our replacements
		$title = preg_replace( $pattern, $replacement, $title );
	endif; // is_archive()

	return $title;
}

add_filter( 'get_the_archive_title', 'nix_prefix_filter_archive_title' );

/*
 * Register a settings page for the plugin.
 */
require plugin_dir_path( __FILE__ ) . 'settings.php';

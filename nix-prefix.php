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
	if ( is_archive() ) :
		// Match any character class followed by a colon
		$pattern = '/([a-z]*):\s?/mi';

		// Return prefix text (minus the colon and space) wrapped in a span
		$replacement = '<span class="nix-prefix">${1}</span>';

		// Do our replacements
		$title = preg_replace( $pattern, $replacement, $title );
	endif; // is_archive()

	return $title;
}

add_filter( 'get_the_archive_title', 'nix_prefix_filter_archive_title' );

/**
 * Enqueue a super-simple stylesheet.
 */
function nix_prefix_scripts() {
	wp_enqueue_style( 'nix-prefix-style', plugin_dir_url( __FILE__ ) . 'style.css', array(), '20160201' );
}
add_action( 'wp_enqueue_scripts', 'nix_prefix_scripts' );

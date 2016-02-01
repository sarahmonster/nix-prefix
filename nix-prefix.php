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

function nix_prefix( $title ) {
	if ( is_archive() ) :
		$pattern = '/([a-z]*:\s?)/mi';
		$replacement = '';
		$title = preg_replace( $pattern, $replacement, $title );
	endif;

	return $title;
}

add_filter( 'get_the_archive_title', 'nix_prefix' );

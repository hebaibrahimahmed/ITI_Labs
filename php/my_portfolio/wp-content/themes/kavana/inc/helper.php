<?php
/**
 * Custom Helper For Kavana
 *
 * @package kavana
 */

if ( ! function_exists( 'wp_body_open' ) ) {
	/**
	 * Compatibility WordPress < 5.2.0 versions.
	 */
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
}

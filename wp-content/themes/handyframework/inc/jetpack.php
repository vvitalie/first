<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package Site Theme
 */

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */
function best4u_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'footer'    => 'page',
	) );
}
add_action( 'after_setup_theme', 'best4u_jetpack_setup' );

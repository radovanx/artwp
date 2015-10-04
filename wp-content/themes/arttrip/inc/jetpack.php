<?php
/**
 * Jetpack Compatibility File.
 *
 * @link https://jetpack.me/
 *
 * @package arttrip
 */

/**
 * Add theme support for Infinite Scroll.
 * See: https://jetpack.me/support/infinite-scroll/
 */
function arttrip_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'render'    => 'arttrip_infinite_scroll_render',
		'footer'    => 'page',
	) );
} // end function arttrip_jetpack_setup
add_action( 'after_setup_theme', 'arttrip_jetpack_setup' );

/**
 * Custom render function for Infinite Scroll.
 */
function arttrip_infinite_scroll_render() {
	while ( have_posts() ) {
		the_post();
		get_template_part( 'template-parts/content', get_post_format() );
	}
} // end function arttrip_infinite_scroll_render

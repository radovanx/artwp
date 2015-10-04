<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package MDLWP
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */

/**
 * Custom Read More Button
 */

function modify_read_more_link() {
	return '<br><br><a class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored mdl-js-ripple-effect" href="' . get_permalink() . '">'. __( 'Read More', 'mdlwp' ). '</a>';
}
add_filter( 'the_content_more_link', 'modify_read_more_link' );

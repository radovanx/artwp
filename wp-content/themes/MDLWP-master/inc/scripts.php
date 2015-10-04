<?php
/**
 * Enqueue scripts and styles.
 */


 

function mdlwp_scripts() {


	wp_enqueue_style( 'mdlwp-mdl-icons', '//fonts.googleapis.com/icon?family=Material+Icons' );

	wp_enqueue_style( 'mdlwp-mdl-roboto', '//fonts.googleapis.com/css?family=Noto+Sans:400,700' );

	wp_enqueue_style( 'mdlwp-style', get_stylesheet_directory_uri() . '/style.min.css', null, null );


	wp_enqueue_script( 'wdlwp-script', get_template_directory_uri() . '/js/script.js', null, null, true );

 
}

add_action( 'wp_enqueue_scripts', 'mdlwp_scripts' );

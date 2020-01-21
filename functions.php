<?php

/* Enqueue JS scripts */
function load_scripts() {
    wp_enqueue_script('jquery', get_stylesheet_directory_uri() . '/js/jquery.latest.js', array( 'jquery' ) );
    /*wp_enqueue_script('gsap', get_stylesheet_directory_uri() . '/js/gsap.min.js', array( 'jquery' ) );
    wp_enqueue_script('scrollMagic', get_stylesheet_directory_uri() . '/js/scrollMagic.min.js', array( 'jquery' ) );*/
    wp_enqueue_script('main', get_stylesheet_directory_uri() . '/js/main.js', array( 'jquery' ) );
    wp_enqueue_script('polyfill', get_stylesheet_directory_uri() . '/js/polyfill.min.js', array( 'jquery' ) );
};
add_action( 'wp_enqueue_scripts', 'load_scripts' );

?>
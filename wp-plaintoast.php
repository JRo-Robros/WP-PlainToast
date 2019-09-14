<?php
/**
 * WP Plain Toast
 *
 * @wordpress-plugin
 * Plugin Name:       WP Plain Toast
 * Description:       Simple pop-up plugin
 * Version:           1.0.0
 * Author:            Jro
 * Author URI:        https://robros.design/
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
  die;
}

// enqueue style and script
add_action('wp_enqueue_scripts','plaintoast_enqueue_scripts');

function plaintoast_enqueue_scripts() {
  wp_enqueue_script( 'wp-plaintoast', plugins_url( 'js/plaintoast.js', __FILE__ ), null, null, true);
  wp_enqueue_style( 'wp-plaintoast', plugins_url( 'css/plaintoast.css', __FILE__), null, null, null );
}

// register sidebar
add_action( 'widgets_init', 'plaintoast_widgets_init' );

function plaintoast_widgets_init(){
  register_sidebar( array(
    'name'          => 'Pop Up Message',
    'id'            => 'plaintoast',
    'before_widget' => '<div data-toast>',
    'after_widget' => '</div>'
  ) );
}


// place on homepage
add_action( 'get_footer', 'add_plaintoast_to_home');

function add_plaintoast_to_home(){
  global $post,$wp_query;
  if(is_front_page(  )){
    dynamic_sidebar( 'Pop Up Message' );
  }
}
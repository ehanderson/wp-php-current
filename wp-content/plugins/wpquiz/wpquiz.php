<?php

/*
* Plugin Name: Quiz Plugin
* Plugin URI: https://github.com/ehanderson/PHPintro
* Description: This is a quiz to get people's emails
* Version: 1.0
* Author: Emily Anderson
* Aurthor URI: https://github.com/ehanderson/PHPintro
* License: GPL2
*/
// Global Valriables
$plugin_url = WP_PLUGIN_URL . '/wpquiz' ;
// Add a link to our plugin in teh admin menu under 'Settings > Launch Plugin'

function wpquiz_menu(){

  // ues the add_options_page function
  // add_options_page( $page_title, $menu_title, $capability, $menu-slug, $function )

 add_options_page(
  'Official Quiz Plugin',
  'Quiz Plugin',
  'manage_options',
  'wpquiz',
  'wpquiz_options_page'
 );
}
// function wp_quiz_shortcode($content = null){
//   global $post;
//   ob_start();
//   require('inc/options-page-wrapper.php');
//   // $content = ob_get_clean();
//   // return $content
// };

// add_shortcode('wpquiz', 'wpquiz_shortcode')

add_action('admin_menu', 'wpquiz_menu');

function wpquiz_options_page(){
  if (!current_user_can('manage_options')){
    wp_die("you don't have access to this yo");
  }
  global $plugin_url;
  require('inc/options-page-wrapper.php');
  // require('js/options-page-wrapper.js');
};


?>
<?php
/*
Plugin Name: Imperial Technical Test
Description: Fix all bugs if possible in PHP, JS and CSS
Version: 0.1
Author: Alex Furr
*/

// Global defines
define( 'TEST_PLUGIN_URL', plugins_url('imperial-tech-test' , dirname( __FILE__ )) );

define( 'TEST_PLUGIN_PATH', plugin_dir_path(__FILE__) );

include_once( TEST_PLUGIN_PATH . '/init.php');


include_once( TEST_PLUGIN_PATH . '/ajax.php');

?>

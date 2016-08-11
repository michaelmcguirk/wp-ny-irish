<?php
/*
Plugin Name: Ny_Irish Organisations
Description: Test plugin to develop organisation database functionality
Version:     0.0.1
Author:      Michael McGirk
Author URI:  http://mcguirk.me
License:     GPL2
*/

//Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once ( plugin_dir_path(__FILE__) . 'wp-ny-orgs-cpt.php');
require_once ( plugin_dir_path(__FILE__) . 'wp-ny-orgs-fields.php');
require_once ( plugin_dir_path(__FILE__) . 'wp-ny-orgs-shortcode.php');

?>

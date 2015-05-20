<?php 
/*
Plugin Name: new Widget
Plugin URI: http://www.ameba.com.uy
Description: This is the widget descir
Version: 1.0
Author: Miguel Vallve
Author URI: http://www.ameba.com.uy
License: GPLv2 or later
*/

$prefix="mv";


class mv_new_one extends WP_Widget{

	function __construct(){

		$params = array(
			'description'=> 'This is the widget descir',
			'name'=> 'new Widget',
		);

		parent:: __construct('new Widget','',$params);

	}

	function form( $instance ){
		extract($instance);
	}

	function widget( $args , $instance ){
		extract($args);
		extract($instance);
	}

}

add_action('widgets_init','mv_register_new_one');

function mv_register_new_one(){
	register_widget('mv_new_one');
}

?>
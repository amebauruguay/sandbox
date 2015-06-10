<?php 
/*
Plugin Name: message 
Plugin URI: http://ameba.com.uy/ 
Description: Widget description 
Version: 1.0 
Author: Ameba 
Author URI: http://ameba.com.uy/ 
License: GPLv2 or later 
*/

class lilimessage extends WP_Widget{
	function __construct()
	{
		$params =array(
			'description'=>'bla bla bla',
			'name'=>'message',
		);

		parent::__construct('message','',$params);
	}

	public function form($instance)
	{
		extract($instance);
		?>
		<p>
			<label for="<?php echo $this->get_field_id('title');?>">title: </label>
			<input
				class="widefat"
				id="<?php echo $this->get_field_id('title');?>"
				name="<?php echo $this->get_field_name('title');?>"
				value="<?php if( isset($title) ) echo esc_attr($title);?>"/>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('description');?>">description: </label>
			<textarea
				class="widefat"
				rows="10"
				id="<?php echo $this->get_field_id('description');?>"
				name="<?php echo $this->get_field_name('description');?>"><?php if( isset($description) ) echo esc_attr($description);?>
			</textarea>
		</p>
		<?php
	}

	public function widget($args, $instance)
	{
		extract($args);
		extract($instance);
		echo $before_widget;
			echo $before_title. $title . $after_title;
			echo $description;
		echo $after_widget;
	}
}

add_action('widgets_init','lilimessage');

function lilimessage ()
{
	register_widget('lilimessage');
}

?>
<?php
/*
Plugin Name: al-messager
Plugin URI: http://ameba.com.uy/
Description: Messager de ale y lu
Version: 1.0
Author: Alelu
Author URI:http://ameba.com.uy/
License: GPLv2 or later
*/

class al_messager extends WP_Widget{

	function __construct()
	{
		$params =array(
			'description'=>'Messager de ale y lu',
			'name'=>'al_messager',
		);

		parent::__construct('al_messager','', $params);
	
	}

	public function form ($instance){
	extract ($instance);
	?>
	
	<p>
		<label for="<?php echo $this -> get_field_id ('title');?>">Title: </label>
		<input
			class="widefat" 
			id= "<?php echo  $this -> get_field_id ('title');?>"
			name= "<?php echo  $this -> get_field_name ('title');?>"
			value= "<?php if (isset ($title))echo esc_attr($title);?>"></input>
	</p>
		
	<p>
		<label for="<?php echo  $this -> get_field_id ('description');?>">Description: </label>
		<textarea
			class="widefat"
			row="10"
			id= "<?php echo  $this -> get_field_id ('description');?>"
			name="<?php echo  $this -> get_field_name ('description');?>"><?php if (isset ($description))echo esc_attr($description); ?></textarea>
	</p>

	<?php
	}
	
	public function widget($args, $instance)
	{
		extract ($args);
		extract ($instance);

		$title= apply_filters( 'widget_title', $title );
		$description= apply_filters('widget_descrip', $description);

		echo $before_widget;
			echo $before_title. $title. $after_title;
			echo "<p>$description </p>";
		echo $after_widget;
	}
}

add_action('widgets_init','al_register');

function al_register()
{
	register_widget('al_messager');
}


?>
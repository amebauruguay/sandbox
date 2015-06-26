<?php
/*
Plugin Name: Castle Rock Footer Menu Widget
Plugin URI: http://www.mercurycreative.net/
Description: Special widget created to work on Castle Rock's website footer
Version: 1.0
Author: Mercury Creative
Author URI:http://www.mercurycreative.net/
License: GPLv2 or later
*/

class cr_footer_widget_menu extends WP_Widget{

	function __construct()
	{
		$params =array(
			'description'=>'Special widget created to work on Castle Rock´s website footer',
			'name'=>'Castle Rock Footer Widget Menu',
		);

		parent::__construct('cr_footer_widget_menu','', $params);

	}

	public function form ($instance){
	extract ($instance);
  $menus = get_registered_nav_menus();
	?>

	<p>
		<label for="<?php echo $this -> get_field_id ('title');?>">Address Text: </label>
		<input
			class="widefat"
			id= "<?php echo  $this -> get_field_id ('title');?>"
			name= "<?php echo  $this -> get_field_name ('title');?>"
			value= "<?php if (isset ($title))echo esc_attr($title);?>"></input>
	</p>

	<p>
		<label for="<?php echo  $this -> get_field_id ('selected_menu');?>">Selected Menu: </label>
    <select
    class='widefat'
    name="<?php echo $this -> get_field_name ('selected_menu');?>"
    id= "<?php echo $this -> get_field_id ('selected_menu');?>"
    type="text">
      <option value="0">— Select —</option>
  		<?php foreach ( $menus as $location => $description ) {
       if ( $location == $instance['selected_menu'] ) {
         $sel = 'selected="selected"';
       } else {
         $sel = '';
       }

      	echo '<option '.$sel.' value="'.$location.'">'.$description.'</option>';
      } ?>
    </select>
	</p>
	<?php
	}

	public function widget($args, $instance)
	{
		extract ($args);
		extract ($instance);

		$title= apply_filters( 'widget_title', $title );

		echo $before_widget;
      //echo $selected_menu;
		echo  $selected_menu;
		echo  $instance['selected_menu'];
      wp_nav_menu(
      array(
      	'theme_location' => $selected_menu
        )
      );
			echo $before_title. $title. $after_title;
		echo $after_widget;
	}
function update($new_instance, $old_instance) {
      $instance = $old_instance;
      $instance['title'] = strip_tags( $new_instance['title'] );
      $instance['selected_menu'] = ( $new_instance['selected_menu'] );
      return $instance;
  }
}

add_action('widgets_init','cr_footer_widget_menu_register');


function cr_footer_widget_menu_register()
{
	register_widget('cr_footer_widget_menu');
}


?>



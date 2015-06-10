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

  public function __construct() {
      $widget_ops = array('classname' => 'My_City', 'description' => 'Displays a city!' );
      $this->WP_Widget('My_City', 'My city', $widget_ops);
  }
 
  function widget($args, $instance) {
    // PART 1: Extracting the arguments + getting the values
    extract($args, EXTR_SKIP);
    $title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);
    $city = empty($instance['city']) ? '' : $instance['city'];
 
    // Before widget code, if any
    echo (isset($before_widget)?$before_widget:'');
   
    // PART 2: The title and the text output
    if (!empty($title))
      echo $before_title . $title . $after_title;;
    if (!empty($city))
      echo $city;
   
    // After widget code, if any  
    echo (isset($after_widget)?$after_widget:'');
  }

  public function form( $instance ) {
   
     // PART 1: Extract the data from the instance variable
     $instance = wp_parse_args( (array) $instance, array( 'title' => '' ) );
     $title = $instance['title'];
     $city = $instance['city'];  
   
     // PART 2-3: Display the fields
     ?>
     <!-- PART 2: Widget Title field START -->
     <p>
      <label for="<?php echo $this->get_field_id('title'); ?>">Title:
        <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>"
               name="<?php echo $this->get_field_name('title'); ?>" type="text"
               value="<?php echo attribute_escape($title); ?>" />
      </label>
      </p>
      <!-- Widget Title field END -->
   
     <!-- PART 3: Widget City field START -->
     <p>
      <label for="<?php echo $this->get_field_id('text'); ?>">City:
        <select class='widefat' id="<?php echo $this->get_field_id('city'); ?>"
                name="<?php echo $this->get_field_name('city'); ?>" type="text">

          <option value='New York'<?php echo ($city=='New York')?'selected':''; ?>>
            New York
          </option>
	
		<?php  
	    	$return = array();

		  	$args = array(
		  		'post_status' => 'inherit', 
		  		'post_type' => 'attachment', 
		  		'post_mime_type' => 'image', 
		  		'order' => 'ASC', 
		  		'orderby' => 'menu_order ID'
		  		);
		  	
		  	$icons = new WP_Query( $args );

		  	if( $icons->have_posts() ) {
				while ($icons->have_posts()) {
					$icons->the_post();	
					$thumb_image = get_post_thumbnail_id();			
					$thumb_img_url = wp_get_attachment_url( $thumb_image, 'full' );
					$return[] = array('id'=>get_post_thumbnail_id(),'src'=>$thumb_img_url,'name'=>get_the_title());
				} // while
			} // if have posts

			wp_reset_query();

			foreach ($return as $iconSrc) {echo '<option value="'.$iconSrc['id'].'">'.$iconSrc['name'].'</option>';}

		?>
          
        </select>                
      </label>
     </p>
     <!-- Widget City field END -->
     <?php


   

  }

}

add_action('widgets_init','mv_register_new_one');

function mv_register_new_one(){
	register_widget('mv_new_one');
}

?>
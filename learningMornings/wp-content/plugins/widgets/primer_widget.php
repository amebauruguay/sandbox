

<?php
/*
Plugin Name: nuestro_primer_widget
Plugin URI: http://ameba.com.uy/
Description:  widget con imagen y texto
Version: 1.0
Author: Ameba
Author URI:http://ameba.com.uy/
License: GPLv2 or later
*/

class nuestro_primer_widget extends WP_Widget{
	function __construct()
	{
		 $params=array(
			'description'=>' widget con imagen y texto',
			'name'=>'nuestro_primer_widget',
		);

		parent::__construct('nuestro_primer_widget','',$params);
	
	}

	public function form($instance){
	extract ($instance);
	?>
		<p>
			<label for="<?php echo $this -> get_field_id ('campo_texto');?>">texto: </label>
			<input
			class="widefat" 
			id= "<?php echo $this -> get_field_id ('campo_texto');?>"
			name= "<?php echo $this -> get_field_name ('campo_texto');?>"
			value= "<?php if (isset ($campo_texto))echo esc_attr($campo_texto); ?>"/>
		</p>
		<p>
			<label for="<?php echo $this -> get_field_id ('campo_icono');?>">seleccione su icono: </label>
			<div class="ui dropdown">
   //ESTO NO FUNCIONA
    <div class="text">Shop</div>
      <div class="item">Clothing</div>
      <div class="item">Home Goods</div>
      <div class="item">Bedroom</div>
      <div class="item">Status</div>
      <div class="item">Cancellations</div>
  </div>
						
		</p>

		<p>
			<label for="<?php echo $this -> get_field_id ('campo_link');?>">URL del link: </label>
			<input
			class="widefat" 
			id= "<?php echo $this -> get_field_id ('campo_link');?>"
			name= "<?php echo $this -> get_field_name ('campo_link');?>"
			value="<?php if (isset ($campo_link))echo esc_attr($campo_link); ?>"/>
		</p>

		<p>
			<input 
			class="widefat" 
			id= "<?php echo $this -> get_field_id ('campo_ventana');?>"
			name="<?php echo $this -> get_field_name ('campo_ventana');?>"
			type="checkbox" 
			value="true"
			<?php if ($campo_ventana == true) {
				echo "checked";
				$campo_ventana = '_blank';
				} else { $campo_ventana = '_self';}?>>ventana nueva
		</p>
<?php
	
	}
	

	public function widget($args, $instance)
	{
		extract($args);
		extract($instance);

		$campo_texto= apply_filters( 'widget_title', $campo_texto );
		//$campo_icono= apply_filters('widget_icono', $campo_icono);
		$campo_link= apply_filters('widget_link', $campo_link);
		$campo_ventana= apply_filters('widget_ventana', $campo_ventana);

		echo $before_widget;
			echo "<a href='$campo_link' target=$campo_ventana>";
			echo "<img src='$campo_icono'/>";
			echo $before_title. $campo_texto. $after_title;
			echo "</a>";
		echo $after_widget;

		
	}
}

add_action('widgets_init','w_items');

function w_items()
{
	register_widget('nuestro_primer_widget');
}


?>

<style type="text/css">
.widget.widget_nuestro_primer_widget {
	margin-bottom: 30px;
	cursor: pointer;
}
.widget.widget_nuestro_primer_widget a {
	display: table;
}
.widget.widget_nuestro_primer_widget:hover {
	background-color: #f4f4f4; 
}
.widget_nuestro_primer_widget img, .widget_nuestro_primer_widget h2 {
	display: table-cell;
	vertical-align: middle;
}
</style>

 



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
			<label for="<?php echo $this -> get_field_id ('text');?>">Icono: 
			<select
			class='widefat' 
			name="<?php echo $this -> get_field_name ('campo_icono');?>" 
			id= "<?php echo $this -> get_field_id ('campo_icono');?>"
			type="text">
			<?php
					/**
				 	 * The WordPress Query class.
				 	 * @link http://codex.wordpress.org/Function_Reference/WP_Query
				 	 *
				 	 */

					//le pedimos argumentos (datos) a la DB (base de datos). Le estamos pidiendo las imagenes (que son post) con categoria iconos.
					//Como la categoria de las imagenes tiene un nombre que no es 'Category' significa q tiene otra taxonomy, asi q hay que llamar diferente usando 'tax_query'
					//A el array de tax_query le pedimos como argumentos el nombre de la taxonomy, el campo (field) del que vamos a tomar el nombre de la category, en esta caso es el slug
				 	   $args = array(
				 	    'post_status' => 'inherit', //es necesario para que te musetre la img (no se que es inherit, aparte de heredado)
				 	    'post_mime_type' => 'image', //es el que dice que queremos los posts imagenes
				 	    'order' => 'ASC', //es para que te ordene los posts de menor a mayor (ASC)
				 	    'orderby' => 'menu_order ID', // le dice que los ordene por el id
				 	    'tax_query' => array(
								array(
									'taxonomy' => 'image-category',
									'field'    => 'slug',
									'terms'    => 'iconos',
								),
							),
				 	    );
				 
				 $loop = new WP_Query( $args ); //llamado a la DB
				// $iconoID = get_post_ID();

				// The Loop
				if ( $loop->have_posts() ) {
					while ( $loop->have_posts() ) {
						$loop->the_post();
						//guardamos el id del post(es decir de la imag) en una variable
						$postID = get_the_id();
						//guardamos la url de la imagen en una variable
						$iconoSRC = wp_get_attachment_url( $postID );
						//mostramos las imagenes dentro del select
						echo '<option value=' . $iconoSRC . ' > ' . get_the_title() . '</option>';
					}
				} else {
					// no posts found 
					echo '<option>no posts found</option>';
				}
				/* Restore original Post Data */
				wp_reset_postdata();	
				
			?>
			</select>
			</label>
			<!--que llame a todas las imagenes con la categoria icono
			http://stackoverflow.com/questions/20664356/get-a-single-specific-image-from-wordpress-media-library
			-->
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
			<?php if ($campo_ventana == true) {echo "checked"; $campo_ventana='_blank';}else{$campo_ventana='_self';}?>>ventana nueva
		</p>
<?php
	
	}
	public function widget($args, $instance)
	{
		extract($args);
		extract($instance);

		$campo_texto= apply_filters( 'widget_title', $campo_texto );
		$campo_icono= apply_filters('widget_icono', $campo_icono);
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
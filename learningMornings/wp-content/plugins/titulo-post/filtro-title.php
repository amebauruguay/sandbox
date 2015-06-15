<?php

/*
Plugin Name: Filtro Title
Plugin URI: http://ameba.com.uy/
Description: To <strong>create</strong> super admins.
Version: 1.0
Author: Ameba
Author URI: http://ameba.com.uy/
License: GPLv2 or later
*/

add_filter ('the_title', ucwords); // que los titulos empiecen con mayusculas.


add_filter ('the_content', function ($content){   //aca te tira una array con la info de cada post
$id=  get_the_ID(); // te toma el id de cada post
if (!is_singular('post')){ //si no es un post solo muetra contenido.
	return $content; 
}

$terms = get_the_terms ($id, 'category');  
$cats=array();

foreach($terms as $term){
	$cats[]= $term -> cat_ID; // consultamos que categoria es
}
$loop = new WP_Query(
	array(
		'posts_per_page'=>3,  //aca le decimos que nos tire 3 post de la categoria
		'category__in'=> $cats, //ya sabemos que categoria tenemos, ahora le pedimos que tome una
		'order_by' => 'rand', //para que muestre de forma aleatoria
		'post__not_in' => array ($id) //no me muestre el post actual
		)
	);

if ($loop->have_posts() ){ // si el loop tiene post que empieze a correr 
	$content .= '
	<h2>You Also Might like</h2>
	<ul class="related-category-post">';
		while ($loop->have_posts()){  //mientras que el loop tenga post revisa lo de abajo
		$loop->the_post();

		$content.='
		<li>
		<a href="'. get_permalink().'">'. get_the_title () .'</a> 
		</li>'; // genera un li por post y le asigan un link y un titulo (es lo que te va a imprimir luego)
		
	}
	
	$content .= '</ul>'; 
	wp_reset_query(); //cierra y resetea la consulta.
	
}
return $content; // te tira el resultado

});

?>
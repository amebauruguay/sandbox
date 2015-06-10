<?php

/*
Plugin Name: Edit Post
Plugin URI: http://ameba.com.uy/
Description: To <strong>edit</strong> sposts.
Version: 1.0
Author: Ameba
Author URI: http://ameba.com.uy/
License: GPLv2 or later
*/

add_filter ('the_title', ucwords);

add_filter ('the_content', function($content){
	if (!is_singular('post')) {
		return $content;
	}

	//en que cat esta?
	$id = get_the_ID();
	$terms = get_the_terms( $id, 'category' );

	//definir la categoria
	foreach ($terms as $term) {
		$categoria[] = $term -> cat_ID;
	}

	//mostrar los posts de esa categoria
	$loop = new WP_Query(
		array(
			'posts_per_page' => 2,
			'category__in' 	 => $categoria,
			'post__not_in'	 => array($id)

		)
	);

	if ($loop -> have_posts()) {
		$content .= '<h2>Más posts</h2><ul>';
		while ($loop -> have_posts()){
			$loop -> the_post();
			$content .= '<li><a href="'. get_permalink() .'">'.get_the_title().'</a></li>';
		}
		
		$content .= '</ul>';
	}
	return $content;
})


?>
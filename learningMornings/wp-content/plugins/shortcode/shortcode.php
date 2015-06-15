<?php

/*
Plugin Name: Shortcode
Plugin URI: http://ameba.com.uy/
Description: To <strong>create</strong> shortcode.
Version: 1.0
Author: Ameba
Author URI: http://ameba.com.uy/
License: GPLv2 or later
*/

add_shortcode('twitter', function ($atts, $content){
	$atts = shortcode_atts(
		array('username' => 'LuciaCaffa',
			  'content'  => !empty ($content) ? $content: "Follow me on Twitter",
			  'show_tweets'=> false, // que no te mueste ningun tweet por defecto
			  'tweet_reset_time' => 10, // tiempo que demora entre una recarga y otra
			  'num_tweets' => 5 // cantidad de tweets que quiero mostrar
			), $atts
		);
	extract ($atts);

	return"<a href='http://twitter.com/$username'>
	$content</a>";
});

if($show_tweets){  //este if funciona si el usuario ingresa en el contenido [show_tweets="true"]
	$tweets=fetch_tweets();
}

function fetch_tweets ($num_tweets, $username, $show_tweets){
	$tweets=curl ("https://api.twitter.com/1.1/statuses/retweets/{id}.json");
}

function curl ($url) // es una funcion que te permite convertir una url ........... entre otras funciones mas
{
	$c = curle_mit ($url);
	curl_setopt ($c, CURLOPT_RETURNTRANSFER, 1); //tomamos la info y la guradamos
	curl_setopt ($c, CURLOPT_CONNECTTIMEOUT, 3); // tiempo de salida
	curl_setopt ($c, CURLOPT_TIMEOUT, 5); // aun que tengamos un contratiempo, sale igual

	return json_decode(curl_exec($c));

}

?>


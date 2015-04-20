<?php
require 'tmhOAuth.php'; // Get it from: https://github.com/themattharris/tmhOAuth

// Use the data from http://dev.twitter.com/apps to fill out this info
// notice the slight name difference in the last two items)

$connection = new tmhOAuth(array(
  'consumer_key' => 'UAq0BvXvjYhSbDxc0cc90CtQs',
	'consumer_secret' => 'NDUlMzy7mFGcgaosMbaBgunvRZaTb7kwlpkpbxY4hjLrT5yP87',
	'user_token' => '220059399-FcWdcmm51k728q9HCGprXeqL27c4rfCxxbMyYfLz', //access token
	'user_secret' => 'jrCnSbsQpoZxZQOVPsiEpxYsP5hnIRgAZDOEIn2qaO1Zk' //access token secret
));

// set up parameters to pass
$parameters = array();

if ($_GET['count']) {
	$parameters['count'] = strip_tags($_GET['count']);
}

if (isset($_GET['screen_name'])) {
	$parameters['screen_name'] = strip_tags($_GET['screen_name']);
}

if (isset($_GET['twitter_path'])) { $twitter_path = $_GET['twitter_path']; }  else {
	$twitter_path = '1.1/statuses/user_timeline.json';
}

$http_code = $connection->request('GET', $connection->url($twitter_path), $parameters );

if ($http_code === 200) { // if everything's good
	$response = strip_tags($connection->response['response']);

	if (isset($_GET['callback']))	 { // if we ask for a jsonp callback function
		echo $_GET['callback'],'(', $response,');';
	} else {
		echo $response;	
	}
} else {
	echo "Error ID: ",$http_code, "<br>\n";
	echo "Error: ",$connection->response['error'], "<br>\n";
}

// You may have to download and copy http://curl.haxx.se/ca/cacert.pem

?>

<a class="twitter-timeline" href="https://twitter.com/mikivallve/lists/tendencias" data-widget-id="590136729979453440">Tweets from https://twitter.com/mikivallve/lists/tendencias</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
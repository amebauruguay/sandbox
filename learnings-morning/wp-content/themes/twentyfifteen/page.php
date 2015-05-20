
<?php
/*
Template Name: Feed test
*/
?>

<?php

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php // Get RSS Feed(s)
			include_once( ABSPATH . WPINC . '/feed.php' );

			// Get a SimplePie feed object from the specified feed source.
			$rss = fetch_feed( 'http://www.tmforumlive.org/speakers-feed-xml/' );

			if ( ! is_wp_error( $rss ) ) : // Checks that the object is created correctly

			    // Figure out how many total items there are, but limit it to 5. 
			    $maxitems = $rss->get_item_quantity( 5 ); 

			    // Build an array of all the items, starting with element 0 (first element).
			    $rss_items = $rss->get_items( 0, $maxitems );

			endif;
			?>

			<ul>
			    <?php if ( $maxitems == 0 ) : ?>
			        <li><?php _e( 'No items', 'my-text-domain' ); ?></li>
			    <?php else : ?>
			        <?php // Loop through each feed item and display each item as a hyperlink. ?>
			        <?php foreach ( $rss_items as $item ) : ?>
			            <li>
			              <?php 
			              	$data = $item->data;

			              	$foto = $data['child']['']['imageurl'][0]['data'];
			              	$jobrole =($data['child']['']['job_role'][0]['data']);

			              	echo "<img src='$foto' width='50'>";
			              	echo $jobrole;
			              	echo esc_html( $item->get_title() );
			              	
			              ?>
			            </li>
			        <?php endforeach; ?>
			    <?php endif; ?>
			</ul>

			<pre>
			   <?php 
			   var_dump($data['child']['']);
			    ?>
			</pre>
					

		</main><!-- .site-main -->
	</div><!-- .content-area -->




<?php get_footer(); ?>

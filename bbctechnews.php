<?php
/*
Plugin Name: rss Technolgy News Widget
Plugin URI: http://hyperstream.co.uk/rss
Description: This plugin will show the latest 5 technolgy news stories from BBC technolgy rss feed. It's a very simple RSS reader widget. You can modify the plugin to suit your own purposes.
Version: 0.1
Author: Alan Son
Author URI: http://www.hyperstream.co.uk
 */

/*  Copyright 2011 Alan Son (email : alan@hyperstream.co.uk)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */

 class rssfeedWidget extends WP_Widget
{
	function rssfeedWidget()
	{
		$widget_options = array(
			'classname'		=>	'rss-feed-widget',
			'description'	=>	'Show the last 3 stories from rss ');
			
		parent::WP_Widget('rss_feed_widget','rssfeedWidget', $widget_options);
	}
	
	function widget($args, $instance)
	{
		extract( $args, EXTR_SKIP );
		$title = ( $instance['title'] ) ? $instance['title'] : 'Technolgy News';
		?>
		<?php echo $before_widget; ?>
		<?php echo $before_title . $title . $after_title ?>

<?php // Get RSS Feed(s)
include_once(ABSPATH . WPINC . '/feed.php');

// Get a SimplePie feed object from the specified feed source.
$rss = fetch_feed('http://feeds.rssi.co.uk/news/technology/rss.xml');
if (!is_wp_error( $rss ) ) : // Checks that the object is created correctly 
    // Figure out how many total items there are, but limit it to 5. 
    $maxitems = $rss->get_item_quantity(5); 

    // Build an array of all the items, starting with element 0 (first element).
    $rss_items = $rss->get_items(0, $maxitems); 
endif;
?>

<ul>
    <?php if ($maxitems == 0) echo '<li>No items.</li>';
    else
    // Loop through each feed item and display each item as a hyperlink.
    foreach ( $rss_items as $item ) : ?>
    <li>
        <a href='<?php echo $item->get_permalink(); ?>'
        title='<?php echo 'Posted '.$item->get_date('j F Y | g:i a'); ?>'>
        <?php echo $item->get_title(); ?></a>
    </li>
    <?php endforeach; ?>
</ul>
		<?php 
	}

}

function rss_feed_init()
{
	register_widget("rssfeedWidget");
}
add_action('widgets_init','rss_feed_init');
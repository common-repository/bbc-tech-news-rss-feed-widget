=== Alan's BBC Technolgy News RSS Widget ===
Contributors: hyperdude
Donate link: http://hyperstream.co.uk/donate
Tags: rss, feed, widget, bbc, simple
Requires at least: 2.7
Tested up to: 3.1.3
Stable tag: 0.1

This plug-in adds a very simple RSS feed from the BBC technology news section.

== Description ==

This plug-in adds a very simple RSS feed from the BBC technology news section. The reason I created this was that I wanted a very simple no-nonsense RSS feed widget which I could modify easily for each project where the client required minimal control over the widget.

A few notes about the sections above:


== Installation ==

1. Upload `bbctechnews.php` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Drag the widget to your sidebar.

== Frequently Asked Questions ==

= How do I change the number of feeds that are shown?=

From the plug-in editor look for the line: "$maxitems = $rss->get_item_quantity(5);" simply change the number in the brackets. Update the file.


= How do I change the RSS feed for something else?=

From the plug-in editor look for the line: "$rss = fetch_feed('http://feeds.rssi.co.uk/news/technology/rss.xml');" and simply change the link inside to some other feed. Update the file.

== Screenshots ==
/tags/0.1/screenshot-1.png

== Upgrade Notice ==

= 0.1 =

== Changelog ==

= 0.1 =

<a href = 'http://hyperstream.co.uk/plugins'>Hyperstream WP Plugins</a>
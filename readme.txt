=== WP Generate Password ===
Contributors: kenvilar
Donate link:
Tags: wp-generate-password, wp, generate, password, random, generator, generated, pass, wordpress, plugin,
Requires at least: 4.7
Tested up to: 4.8.1
Stable tag: 1.1.0
License: GPLv2

A simple wordpress plugin that will generate password and displays at the top of every admin pages.

== Description ==
This plugin generates random password with a default length of 16.

= Features =
* Users can use shortcode to every pages and posts
* Users can choose the number of length of their password with a minimum of 4 and maximum of 100 characters

= Developers =
* If you are a developer and you want to put some extra filter or hooks for this plugin then let me know.
* [Github repository](https://github.com/kenvilar/wp-generate-password)

== Installation ==
Install like any other plugin,

1. Decompress the file
2. Upload the directory `wp-generate-password/` to the `wp-content/plugins/` directory or upload the 'wp-generate-password.zip' file from the Plugins->Add New page in the WordPress administration panel.
3. Activate the plugin through the 'Plugins' menu in WordPress
4. That's it!

== Updates ==
Updates to the plugin will be posted here, to [Github repo](https://github.com/kenvilar/wp-generate-password) and the [WP Generate Password](https://wordpress.org/plugins/wp-generate-password/) will always link to the newest version.

== Screenshots ==

== Frequently Asked Questions ==

== Changelog ==

= 1.1.0 =
* Added conditional logic for directly access to the plugin
* Moved old generate password functions inside the admin class
* Added class to leverage the OOP concepts
* Organized plugin structure

= 1.2.0 =
* Added shortcode for user to display on their public specific page/s and post/s
* Added function for users to let them choose what number of generated password characters with a minimum of 4 and maximum of 100
* Added some stylesheet classes for user's easy to customize
* Improved conditional statements
* Filtered content with only allowed html tags
* Added and modified function to prevent script injections

# [WP Generate Password](https://wordpress.org/plugins/wp-generate-password/)
[WP Generate Password](https://wordpress.org/plugins/wp-generate-password/) A simple wordpress plugin that will generate random password and displays at the top of every admin pages.

![Plugin Version](https://img.shields.io/badge/plugin-v1.3.0-blue.svg) 
![Total Downloads](https://img.shields.io/badge/downloads-less%20than%2010-brightgreen.svg)
![WordPress Compatibility](https://img.shields.io/badge/wordpress-4.8.0%20tested-brightgreen.svg)
[![Minimum PHP Version](https://img.shields.io/badge/php-%3E=%205.2-8892BF.svg)](https://php.net/)  
[![License](https://img.shields.io/badge/license-GPL--2.0+-red.svg)](https://github.com/kenvilar/wp-generate-password/blob/master/LICENSE)

Contributors: Ken Vilar

Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=DDPBE5JZF3ASL

Tags: wp-generate-password, wp, generate, password, generator, wordpress, plugin

Stable tag: 1.3.0

Requires at least: 4.7

Tested up to: 4.8.1

## Description
This plugin generates password with a default length of 12.

### Features ###
* [x] Users can use shortcode to every pages and posts
* [x] Users can choose the number of length of their password with a minimum of 4 and maximum of 100 characters
* [ ] Users can choose if they want to include integers, big alphabetical letters, and special and advance characters or not.

## Get Help

Do you have questions about the WP Generate Password plugin? You can [send me an email](mailto:kenvilar@gmail.com) or [start a new thread in the WordPress.org support forums](https://wordpress.org/support/plugin/wp-generate-password#new-post).

## Get Started

To install the WP Generate Password plugin,

Simple:

1. Decompress the file
2. Upload the directory `wp-generate-password/` to the `wp-content/plugins/` directory.
3. Activate the plugin
4. That's it!

### Installation From Git Repo

Go to your Plugins directory

```
$ git clone https://github.com/kenvilar/wp-generate-password.git
$ cd wp-generate-password
```

## License

WP Generate Password is licensed under [GNU General Public License v2 (or later)](./LICENSE).

## Bugs ##
If you find an issue, [let me know here](https://github.com/kenvilar/wp-generate-password/issues?state=open)!

## Contributors

Ken Vilar

## Frequently Asked Questions

## Screenshots

## Changelog

= 1.3.0 = 
* Fixed calling non-static method
* Improved code benchmarking
* Improved conditional statements
* Fixed filters

= 1.2.0 =
* Added shortcode for user to display on their public specific page/s and post/s
* Added function for users to let them choose what number of generated password characters with a minimum of 4 and maximum of 100
* Added some stylesheet classes for user's easy to customize
* Improved conditional statements
* Filtered content with only allowed html tags
* Added and modified function to prevent script injections

= 1.1.0 =
* Added conditional logic for directly access to the plugin
* Moved old generate password functions inside the admin class
* Added class to leverage the OOP concepts
* Organized plugin structure

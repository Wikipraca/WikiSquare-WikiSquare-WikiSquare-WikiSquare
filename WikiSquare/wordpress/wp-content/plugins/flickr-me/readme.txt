=== Flickr Me ===
Contributors: heavyheavy, wearepixel8
Tags: flickr, images, photos, sidebar, widget
Requires at least: 3.1
Compatible up to: 4.3
Tested up to: 4.3
Stable tag: 1.0.5
License: GPLv2

Add Flickr feeds to your widget ready areas.

== Description ==

With Flickr Me, you can add Flickr feeds, from an individual account or group, to your widget ready areas. Once installed and activated the widget is an easy to manage, out of box solution for displaying a Flickr gallery of images. Each photo, in the feed, will link to its Flickr permalink and you can optionally set to display the title when stacking images.

== Installation ==

You can install Flickr Me either via the WordPress Dashboard or by uploading the extracted `flickr-me` folder to your `/wp-content/plugins/` directory. Once the plugin has been successfully installed, simply activate the plugin through the Plugins menu in your WordPress Dashboard.

== Frequently Asked Questions ==

= Is there a limit to how many photos to display =
Yes. You can display up to a maximum of 20 photos per widget.

= Can I display a feed from a Flickr Group? =
Yes. As long as the Flickr Group is public, you can stream its feed.

= Why is the widget returning No images found? =
If you encounter this message, it means there are no public images in the designated account.

== Screenshots ==

1. Flickr Me Widget
2. Example Flickr Me grid feed
3. Example Flickr Me stacked feed with title

== Changelog ==

= 1.0.0 =
* Initial release

= 1.0.1 =
* The widget not fetches feeds of HTTPS to prevent mix-content warnings (Props to Nick Dery)

= 1.0.2 =
* Fixed undefined index errors in the widget

= 1.0.3 =
* Fixed PHP Strict Standard errors in the class

= 1.0.4 =
* Changed text domain name space and updated language files
* Added error handling when variable is an instance of WP_Error

= 1.0.5 =
* Updated widget to be compatible with WordPress 4.3
=== Plugin Name ===
Plugin Name: Facebook OpenGraph meta and Google+ link rel/publisher meta
Contributors: cd34
Tags: Facebook, opengraph, Google
Requires at least: 2.6
Tested up to: 3.4-beta2
Stable tag: 0.5

Adds the Facebook OpenGraph meta tags and the Google+ link rel/publisher meta.

== Description ==

When someone pastes your URL into Facebook or Google+, both must guess what 
content should be used to comprise the link as it is displayed in your stream.
This plugin takes the data from the blog, post, and the user configured data
in the WordPress admin to assist Facebook and Google with getting a decent
post description. No longer will you see chunks of HTML pulled into your posts.

Adds the Facebook OpenGraph meta tags and the Google+ link rel/publisher meta. Optionally adds google-site-verification meta.

`
&lt;meta property="og:title" content="(taken from site config or post title)" /&gt;
&lt;meta property="og:type" content="website" /&gt;
&lt;meta property="og:url" content="http://domain.com" /&gt;
&lt;meta property="og:site_name" content="(taken from site config)" /&gt;
&lt;meta property="og:image" content="http://domain.com/configured.gif" /&gt;
&lt;meta property="fb:admins" content="(configured)" /&gt;
&lt;link href="https://plus.google.com/(configured)" rel="publisher" /&gt;
&lt;meta content="(configured)" name="google-site-verification" /&gt;
`

Make sure your image is at least 125x125 so that Google+ will pick it up. If the image is smaller, Google will take the first image it finds on your page.

To see what your site will look like with the rel="publisher" tag supported:

http://www.google.com/webmasters/tools/richsnippets

If you are getting that the page doesn't have Verified publisher markup:

http://support.google.com/webmasters/bin/answer.py?hl=en&answer=1708844

== Installation ==

1. Activate the plugin through the 'Plugins' menu in WordPress

== Screenshots ==

1. Settings for the plugin

== Changelog ==

= 0.5 = 
* Bugfix for google site verification code

= 0.4 =
* Better image thumbnail handling for Facebook on Single posts

= 0.3 = 
* Fixed bug in Google Meta handling
* better og:title handling on article pages

= 0.2 =
* Added Google Site Verification code

= 0.1 =
* Initial release

== Upgrade Notice ==

* bugfix for google-site-verification
* Will handle shares in Facebook much better when images are present.

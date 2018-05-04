=== Podbean Shortcode ===
Contributors: podbean
Tags: podbean, shortcode, audio, embed, player, podcast, music, sound
Requires at least: 2.5.0
Tested up to: 4.7.1
Stable tag: 1.0


A simple and easy way to embed Podbean player into your WordPress blog.


== Description ==

The Podbean shortcode plugin is an easy way to embed Podbean audio/video player into your WordPress blog. It works for any Podbean podcast. Once you install this plugin, it will work on all of your blog posts.

A simple example:

`[podbean type=audio-square resource="episode=g82ab-2f688" skin="5" auto="1"]`

`[podbean type=multi playlist=http%3A%2F%2Fplaylist.podbean.com%2F781097%2Fplaylist_multi.xml height=315 skin=0]`

**More Options**

Podbean shortcode requires the type of player. It can be only of the following:

* `type=X`: player type of the episode to embed (eg:audio-rectangle,audio-square,video,multi...).

Podbean shortcode requires the resource play. It can be only of the following:

* `resource="episode=X"`: X is id and id tag of the episode to embed.
* `playlist=X`: X is multiple player playlist to embed.

The plugin also supports the following optional parameters:

* `width`: player's width - can be in % or px (ie. `100%` or `400px`).
* `height`: player's height - can be in % or px (ie. `100%` or `400px`).
* `share`: enables or disables the share button in player.
* `skin`: player's UI theme.
* `auto`: enables or disables the autoplay. When `1` it automatically starts playing when the player loads. Autoplay doesn't work on most mobile browsers. Defaults to `0`.

**How to get the shortcode**

Visit your podcast site and then click on the **share button** at the bottom of each episode : you can customize the appearance of the player and get the shortcode to copy and paste to your WordPress blog.


**Help**

If you need further help, please contact us at <a href="http://support.podbean.com">support.podbean.com</a>.

== Changelog ==

= 1.0 =
* First Release

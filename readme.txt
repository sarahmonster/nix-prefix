=== Nix Prefix ===
Contributors: tinkerbelly
Plugin URI: http://sarahmonster.github.io/nix-prefix/
Tags: category, tag, text, archive, archives, page
Requires at least: 4.1
Tested up to: 4.5
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

A super-simple plugin to remove the "Category:" prefix text on archive page titles.

== Description ==

Nix Prefix is a super-simple WordPress plugin to remove or customise the prefix text on your archive pages. Go from:

> Category: Puppies and Kittens

to

> Puppies and Kittens

on your archive pages—no child themes required!

For a better visual of what this does, have a look at the screenshots tab.

= Need help? =
* Full documentation: http://sarahmonster.github.io/nix-prefix/
* Github repo: https://github.com/sarahmonster/nix-prefix
* Ask me on Twitter: https://twitter.com/sarahsemark

== Installation ==

1. Upload the plugin files to the `/wp-content/plugins/plugin-name` directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the 'Plugins' screen in WordPress
3. Presto! Your archive page titles will now display without any prefixes.

== Frequently Asked Questions ==

= Why doesn't this work with my theme? =

This plugin doesn't work with all themes—yet! It's currently filtering the standard `the_archive_title` function, which was added to core in 4.1, released December 2014. If your theme is more than a year old, there's a good chance it will be using a non-standard function instead, which is more of a challenge to filter consistently.

If you'd like to use this plugin and it doesn't work with your theme, please [create an issue on Github](https://github.com/sarahmonster/nix-prefix/issues/new) and I'll work on adding support for your particular theme.

= How do I customise the prefixes? =

The best way to customise your output is by using CSS. The [CSS snippets section here](https://github.com/sarahmonster/nix-prefix/blob/master/README.md#css-code-snippets) should help you get started.

To dequeue the plugin's custom CSS, copy the following line into your theme's `functions.php`

    function nix_prefix_dequeue_plugin_styles()  {
        wp_dequeue_style( 'nix-prefix-style' );
    }
    add_action( 'wp_print_styles', 'nix_prefix_dequeue_plugin_styles', 100 );

= What archive page types does this work with? =

This works for all archive page types:

* category archives
* tag archives
* authors archives
* date archives
* custom post types archives
* custom taxonomy archives

You can customise the display for different archive types by using targeted [CSS classes](https://github.com/sarahmonster/nix-prefix/blob/master/README.md#css-code-snippets).

== Screenshots ==

1. Twentysixteen without Nix Prefix.
2. Twentysixteen with Nix Prefix.
3. Twentysixteen with Nix Prefix and [custom CSS](https://github.com/sarahmonster/nix-prefix/blob/master/README.md#css-code-snippets).

== Changelog ==

= 0.1.0 =
* Initial release.

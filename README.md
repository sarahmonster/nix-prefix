# Nix Prefix

Nix Prefix is a super-simple WordPress plugin to remove or customise the prefix text on your archive pages. Go from:

> Category: Puppies and Kittens

to

> Puppies and Kittens

on your archives pages and more—all without a child theme!

## Requirements

WordPress 4.1. Nix Prefix filters on the standard `the_archive_title` function, which was added to core in 4.1 (released December 2014).

## Usage

Most WordPress archive pages have a title that looks something like this:

> Category: Puppies and Kittens

Ever wanted to get rid of that "Category" bit? Maybe change it to something else? Remove the colon? Change the styling a little bit? Nix Prefix allows you to do all of that—no child theme required!

This works for all archive page types:

* category archives
* tag archives
* authors archives
* date archives
* custom post types archives
* custom taxonomy archives

## Using your own CSS

The best way to customise your output is by using CSS. The CSS snippets section below should help you get started.

To dequeue the plugin's custom CSS, copy the following line into your theme's `functions.php`

```php
function nix_prefix_dequeue_plugin_styles()  {
	wp_dequeue_style( 'nix-prefix-style' );
}
add_action( 'wp_print_styles', 'nix_prefix_dequeue_plugin_styles', 100 );
```

## CSS code snippets

Hide the prefix entirely:

```css
.nix-prefix {
	display: none;
}
```

Move the prefix to another line and display as faux small-caps:

```css
.nix-prefix {
	display: block;
	font-size: 55%;
	letter-spacing: 2px;
	opacity: 0.6;
	text-transform: uppercase;
}
```

Re-add the colon and space after the prefix:

```css
.nix-prefix::after {
	content: ': ';
	display: inline;
}
```

Display the prefix differently for different archive page types:

```css
/* Category and tag archives (hide entirely) */
.category .nix-prefix,
.tag .nix-prefix {
	display: none;
}

/* Author and date archives (display on top) */
.author .nix-prefix,
.date .nix-prefix {
	display: block;
	font-weight: bolder;
	font-size: 60%;
}

/* Custom post type and custom taxonomy archives (display inline) */
.post-type-archive .nix-prefix,
.tax-<TAXONOMY> .nix-prefix {
	display: inline;
	font-style: italic;
}

.post-type-archive .nix-prefix::after,
.tax-<TAXONOMY> .nix-prefix::after {
	content: ' ';
	display: inline;
}
```

## Troubleshooting

This plugin doesn't work with all themes—yet! It's currently filtering the standard `the_archive_title` function, which was added to core in 4.1, released December 2014. If your theme is more than a year old, there's a good chance it will be using a non-standard function instead, which is more of a challenge to filter consistently.

If you'd like to use this plugin and it doesn't work with your theme, please [create an issue on Github](https://github.com/sarahmonster/nix-prefix/issues/new) and I'll work on adding support for your particular theme.

If you run across any issues with the plugin or have questions, please [create a new issue on Github](https://github.com/sarahmonster/nix-prefix/issues/new). Patches and problems always welcome!

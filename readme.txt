=== Simple Draft List ===
Contributors: dartiss
Donate link: http://artiss.co.uk/donate
Tags: Draft, List, Sidebar, Post, Page
Requires at least: 2.0.0
Tested up to: 3.0.1
Stable tag: 1.4

Simple Draft List will display a list of the titles of your posts/pages that have not yet been published

== Description ==

This is a very useful way to display the titles of your draft or scheduled posts and pages - maybe as a "coming soon" teaser for example.

To display the list on your site you will need to insert the following code, where appropriate, into your theme…

`<?php simple_draft_list('parameters'); ?>`

Where `parameters` is an optional list of parameters, each seperated by an ampersand (&)

These are as follows...

*limit=* : The maximum number of draft items to display. The default is 0, which is unlimited. A limit of just 1 will cause the `<li>` tags not to be used, allowing you to embed the result in a sentence.

*type=* : This allows you to limit the results to either `posts` or `pages`. The default is both.

*order=* : This is the sequence that you'd like to order the results in. It consists of 2 codes - the first is either `t` or `d` to represent the title or date and the second is `a` or `d` for ascending or descending. Therefore `order=td` will display the results in descending title sequence. The default is descending date.

*scheduled=* : If specified as `No` then scheduled posts will not display in the list, only drafts.

*icon=* : If scheduled posts are listed, then an icon will appear next to them to indicate this is the case. Use this to switch the icon off or define its position - `No`, `Left` or `Right` (`Left` is the default).

*folder=* : The scheduled icon will be, by default, the one in the plugin folder named `scheduled.png`. However, use this parameter to specify a folder within your theme that you'd prefer the icon to be fetched from.

The plugin will then display the list as an HTML list (i.e. with `<li>` and `</li>` around each entry).

An example would be...

`<?php simple_draft_list('limit=5&type=posts&order=da&scheduled=no'); ?>`

This would display a list of up to 5 draft posts in ascending date sequence.

The following is an example of how it could be used in the sidebar, with a `function_exists` check so that it doesn't cause problems if the plugin is not active...

`<?php if (function_exists('simple_draft_list')) : ?>`
`<h2>Coming Soon</h2>`
`<ul><?php simple_draft_list('limit=5&type=posts&order=da&scheduled=no'); ?></ul>`
`<?php endif; ?>`

If you wish to omit a page or post from the list then you can do this by simply giving the post/page a title beginning with an exlamation mark. You can then remove this before publishing the page/post.

== Screenshots ==

1. A list of draft posts, as taken from the [artiss website](http://www.artiss.co.uk "artiss").

== Installation ==

1. Upload the entire `simple-draft-list` folder to your `wp-content/plugins/` directory.
2. Activate the plugin through the 'Plugins' menu in WordPress.
3. There is no options screen - configuration is done in your code.

== Frequently Asked Questions ==

= How can I get help or request possible changes =

Feel free to report any problems, or suggestions for enhancements, to me either via [my contact form](http://www.artiss.co.uk/contact "Contact Me") or by [the plugins' homepage](http://www.artiss.co.uk/simple-feed-list "Simple Feed List").

== Changelog ==  
  
= 1.0 =  
* Initial release

= 1.1 =
* With the release of WP 3.0 different post types are possible and these can get mixed in with the results (e.g. menu items, etc). Changed the code to restrict output to pages and posts only

= 1.2 =
* Now displays scheduled posts as well
* Added new parameter to suppress scheduled posts, if required
* Fixed bug in limit default

= 1.3 =
* Date order now displays according to date of last modification

= 1.4 =
* Added icon for scheduled posts (which can be modified and switched off, if required)

== Upgrade Notice ==

= 1.0 =  
* Initial release

= 1.1 =
* Upgrade for WP 3.0 users

= 1.2 =
* Upgrade to display scheduled as well as draft posts

= 1.3 =
* Upgrade to improve data ordering sequence

= 1.4 =
* Upgrade if you wish to have the option of an icon next to scheduled posts
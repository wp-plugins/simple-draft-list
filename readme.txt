=== Simple Draft List ===
Contributors: dartiss
Donate link: http://tinyurl.com/bdc4uu
Tags: list, sidebar, draft, post
Requires at least: 2.0.0
Tested up to: 3.0
Stable tag: 1.1

Simple Draft List will display a list of the titles of your draft posts and/or pages.

== Description ==

This is a very useful way to display the titles of your drafts posts and pages - maybe as a "coming soon" teaser for 

To display the list on your site you will need to insert the following code, where appropriate, into your theme…

`<?php simple_draft_list('parameters'); ?>`

Where `parameters` is an optional list of parameters, each seperated by an ampersand (&)

These are as follows...

*limit=* : The maximum number of draft items to display. The default is 0, which is unlimited. A limit of just 1 will cause the `<li>` tags not to be used, allowing you to embed the result in a sentence.

*type=* : This allows you to limit the results to either `posts` or `pages`. The default is both.

*order=* : This is the sequence that you'd like to order the results in. It consists of 2 codes - the first is either `t` or `d` to represent the title or date and the second is `a` or `d` for ascending or descending. Therefore `order=td` will display the results in descending title sequence. The default is descending date.

The plugin will then display the list as an HTML list (i.e. with `<li>` and `</li>` around each entry).

An example would be...

`<?php simple_draft_list('limit=5&type=posts&order=da'); ?>`

This would display a list of up to 5 draft posts in ascending date sequence.

The following is an example of how it could be used in the sidebar, with a `function_exists` check so that it doesn't cause problems if the plugin is not active...

`<?php if (function_exists('simple_draft_list')) : ?>`
`<h2>Coming Soon</h2>`
`<ul><?php simple_draft_list('limit=5&type=posts&order=da'); ?></ul>`
`<?php endif; ?>`

If you wish to omit a page or post from the list then you can do this by simply giving the post/page a title beginning with an exlamation mark. You can then remove this before publishing the page/post.

== Installation ==

1. Upload the entire `simple-draft-list` folder to your wp-content/plugins/ directory.
2. Activate the plugin through the ‘Plugins’ menu in WordPress.
3. There is no options screen - configuration is done in your code.

== Frequently Asked Questions ==

= How can I get help or request possible changes =

Feel free to report any problems, or suggestions for enhancements, to me either via my contact form or by the plugins homepage at http://www.artiss.co.uk/simple-feed-list

== Changelog ==  
  
= 1.0 =  
* Initial release

= 1.1 =
* With the release of WP 3.0 different post types are possible and these can get mixed in with the results (e.g. menu items, etc). Changed the code to restrict output to pages and posts only.

== Upgrade Notice ==

= 1.0 =  
* Initial release

= 1.1 =
* Upgrade for WP 3.0 users
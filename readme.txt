=== Simple Draft List ===
Contributors: dartiss
Donate link: http://artiss.co.uk/donate
Tags: draft, list, sidebar, post, page, author
Requires at least: 2.0.0
Tested up to: 3.0.5
Stable tag: 1.6

Simple Draft List will display a list of the titles of your posts/pages that have not yet been published

== Description ==

This is a very useful way to display the titles of your draft or scheduled posts and pages - maybe as a "coming soon" teaser for example.

**Using a PHP Function**

You would use this option is you wished to display the list outside of a page or post - e.g. in a sidebar. To display the list you will need to insert the following code, where appropriate, into your theme…

`<?php simple_draft_list('parameters'); ?>`

Where `parameters` is an optional list of parameters, each seperated by an ampersand (&)

These are as follows...

*limit=* : The maximum number of draft items to display. The default is 0, which is unlimited. A limit of just 1 will cause the `<li>` tags not to be used, allowing you to embed the result in a sentence.

*type=* : This allows you to limit the results to either `post` or `page`. The default is both.

*order=* : This is the sequence that you'd like to order the results in. It consists of 2 codes - the first is either `t` or `d` to represent the title or date and the second is `a` or `d` for ascending or descending. Therefore `order=td` will display the results in descending title sequence. The default is descending date.

*scheduled=* : If specified as `No` then scheduled posts will not display in the list, only drafts.

*icon=* : If scheduled posts are listed, then an icon will appear next to them to indicate this is the case. Use this to switch the icon off or define its position - `No`, `Left` or `Right` (`Left` is the default).

*folder=* : The scheduled icon will be, by default, the one in the plugin folder named `scheduled.png`. However, use this parameter to specify a folder within your theme that you'd prefer the icon to be fetched from.

*author=* : Allows you to specify whether you want the authors name to appear next to the draft post/page item. Should be `No` or `Yes` (defaults to the former).

The plugin will then display the list as an HTML list (i.e. with `<li>` and `</li>` around each entry).

An example would be...

`<?php simple_draft_list('limit=5&type=posts&order=da&scheduled=no'); ?>`

This would display a list of up to 5 draft posts in ascending date sequence.

The following is an example of how it could be used in the sidebar, with a `function_exists` check so that it doesn't cause problems if the plugin is not active...

`<?php if (function_exists('simple_draft_list')) : ?>
<h2>Coming Soon</h2>
<ul><?php simple_draft_list('limit=5&type=posts&order=da&scheduled=no'); ?></ul>
<?php endif; ?>`

If you wish to omit a page or post from the list then you can do this by simply giving the post/page a title beginning with an exlamation mark. You can then remove this before publishing the page/post.

**Using a Shortcode**

Use this option to display the list within a post or page. Unlike the PHP Function option, the `<ul>` and `</ul>` tags will be added automatically.

An example would be...

`[drafts limit=5 type=posts order=da scheduled=no]`

Parameter are listed with a space seperating then, rather than the ampersand used before. Regardless, all the parameter used by the PHP Function are available with the shortcode.

**Edit Link**

If the current user can edit the draft item being listed then it will be linked to the appropriate edit page. The user then simply needs to click on the draft item to edit it.

There are seperate permissions for post and page editing, so an editor with just one permission may find that they can only edit some of the draft items.

**For help with this plugin, or simply to comment or get in touch, please read the appropriate section in "Other Notes" for details. This plugin, and all support, is supplied for free, but [donations](http://artiss.co.uk/donate "Donate") are always welcome.**

== Licence ==

This WordPress plugin is licensed under the [GPLv2 (or later)](http://wordpress.org/about/gpl/ "GNU General Public License
").

== Support ==

All of my plugins are supported via [my website](http://www.artiss.co.uk "Artiss.co.uk").

Please feel free to visit the site for plugin updates and development news - either visit the site regularly, follow [my news feed](http://www.artiss.co.uk/feed "RSS News Feed") or [follow me on Twitter](http://www.twitter.com/artiss_tech "Artiss.co.uk on Twitter") (@artiss_tech).

For problems, suggestions or enhancements for this plugin, there is [a dedicated page](http://www.artiss.co.uk/simple-draft-list "Simple Draft List") and [a forum](http://www.artiss.co.uk/forum "WordPress Plugins Forum"). The dedicated page will also list any known issues and planned enhancements.

Alternatively, please [contact me directly](http://www.artiss.co.uk/contact "Contact Me"). 

**This plugin, and all support, is supplied for free, but [donations](http://artiss.co.uk/donate "Donate") are always welcome.**

== Screenshots ==

1. A list of draft posts, as taken from the [artiss website](http://www.artiss.co.uk "artiss"), including author name.

== Installation ==

1. Upload the entire `simple-draft-list` folder to your `wp-content/plugins/` directory.
2. Activate the plugin through the 'Plugins' menu in WordPress.
3. There is no options screen - configuration is done in your code.

== Frequently Asked Questions ==

= Which version of PHP does this plugin work with? =

It has been tested and been found valid from PHP 4 upwards.

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

= 1.5 =
* Added option to show post/page author
* Added version details to code output
* Added shortcode option
* Code tidy

= 1.6 =
* Draft titles now have links to their edit page if the current user is allowed to edit them

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

= 1.5 =
* Upgrade to add ability to list author and added shortcode option

= 1.6 =
* Upgrade for the ability to add links for editing posts and pages
=== Artiss Draft List ===
Contributors: dartiss
Donate link: http://artiss.co.uk/donate
Tags: draft, list, coming soon, sidebar, post, page, author, widget, shortcode, function, cache, seo
Requires at least: 2.0
Tested up to: 3.3
Stable tag: 2.0

Artiss Draft List (formerly Simple Draft List) will display a list of the titles of your posts/pages that have not yet been published.

== Description ==

Artiss Draft List (formerly Simple Draft List) is a powerful method of showing draft and scheduled posts and pages on your site. Use it to show your visitors what's "coming soon" or as a great SEO tool.

You can display this information using a widget, shortcode or elsewhere in your theme using a PHP function call. Other options include:

* Output via sidebar widgets, shortcodes or PHP function calls
* Configure your own look by using a template
* Show an icon on scheduled posts
* The resulting list is cached for streamline performance
* Meta box in editor allows you to omit individual posts from the lists
* Only show drafts within a particular timeframe
* Sequence the draft list in title, created date or modified date order
* And much, much more!

Other plugins are available to do this but none are as powerful as Artiss Draft List.

For instruction on use please read the "Other Notes" tab.

**For help with this plugin, or simply to comment or get in touch, please read the appropriate section in "Other Notes" for details. This plugin, and all support, is supplied for free, but [donations](http://artiss.co.uk/donate "Donate") are always welcome.**

== Using a PHP Function Call ==

You would use this option is you wished to display the list outside of a page or post - e.g. in a sidebar. To display the list you will need to insert the following code, where appropriate, into your theme…

`<?php draft_list( 'template', 'parameters' ); ?>`

Where `template` is a default layout (see **Templates** section below) and `parameters` is an optional list of parameters, each seperated by an ampersand (&)

The following parameters are valid...

* **limit=** : The maximum number of draft items to display. The default is 0, which is unlimited.
* **type=** : This allows you to limit the results to either `post` or `page`. The default is both.
* **order=** : This is the sequence that you'd like to order the results in. It consists of 2 codes - the first is either `t, `m` or `c` to represent the title, modified date or created date and the second is `a` or `d` for ascending or descending. Therefore `order=td` will display the results in descending title sequence. The default is descending modified date.
* **scheduled=** : If specified as `No` then scheduled posts will not display in the list, only drafts.
* **folder=** : The scheduled icon will be, by default, the one in the plugin folder named `scheduled.png`. However, use this parameter to specify a folder within your theme that you'd prefer the icon to be fetched from.
* **cache=** : How long to cache the output for, in hours. Defaults to half an hour. Set to `No` to not cache at all. Whenever you save a post any cache will be cleared to ensure that any lists are updated.
* **template=** : This is the template which formats the output. See the section below on * *Templates** for further information.
* **date=** : The format of any dates output. This uses the PHP date formatting system - [read here](http://uk3.php.net/manual/en/function.date.php "date") for the formatting codes. Defaults to `F j, Y, g:i a`.

To restrict the posts/pages to a particular timeframe you can use the following 2 parameters. You simply state, in words, how long ago the posts must be dated for e.g. "2 days", "3 months", etc.

* **modified=** : This reflects how long ago the post/page must have been modified last for it to be listed. For example `6 months` would only list drafts that have been modified in the last 6 months.
* **created=** : his reflects how long ago the post/page must have been created for it to be listed. For example `6 months` would only list drafts that were created in the last 6 months.

The plugin will then display details of each draft item, depending on the parameters and template used.

An example would be...

`<?php draft_list( '%ul%%draft% %icon%', 'limit=5&type=posts&order=ma' ); ?>`

This would display a list of up to 5 draft posts in ascending modified date sequence, with an icon displayed to the right of each if the draft is scheduled.

The following is an example of how it could be used in the sidebar, with a `function_exists` check so that it doesn't cause problems if the plugin is not active...

`<?php if ( function_exists( 'draft_list' ) ) : ?>
<h2>Coming Soon</h2>
<?php draft_list( '%ul%%draft% %icon%', 'limit=5&type=posts&order=ma' ); ?>
<?php endif; ?>`

== Using a Shortcode ==

Use this option to display the list within a post or page.

An example would be...

`[drafts limit=5 type=posts order=ma scheduled=no template='%ul%%draft% %icon%']`

Parameters are listed with a space seperating then, rather than the ampersand used before. Regardless, all the parameters used by the PHP Function are available with the shortcode.

== Using a Widget ==

Sidebar widgets can be easily added. In Administration simply click on the `Widgets` option under the `Appearance` menu. `Draft Posts` will be one of the listed widgets. Drag it to the appropriate sidebar on the right hand side and then choose your options.

Save the result and that's it! You can use unlimited widgets, so you can add different lists to different sidebars.

== Templates ==

The template parameter allows you to format the output by allowing you to specify how each line of output will display. A number of tags can be added, and you can mix these with HTML. The available tags are as follows...

* **%ul%** - Specifies this is an un-ordered list (i.e. bullet point output). This MUST be specified at the beginning of the template if it is to be used.
* **%ol%** - Specifies this is an ordered list (i.e. number output). This MUST be specified at the beginning of the template if it is to be used.
* **%icon%** - This is the icon that indicates a scheduled post.
* **%draft%** - This is the draft post details. This is the only **REQUIRED** tag.
* **%author%** - This is the name of the post author.
* **%author+link%** - This is the name of the post author with, where available, a link to their URL.
* **%words%** - The number of words in the draft post.
* **%chars%** - The number of characters (exc. spaces) in the draft post.
* **%chars+space%** - The number of characters (inc. spaces) in the draft post.
* **%created%** - The date/time the post was created.
* **%modified%** - The date/time the post was last modified.

If %ul% or %ol% are specified then all the appropriate list tags will be added to the output. If neither are used then it's assumed that line output will be controlled by yourself.

== Omitting Posts/Pages from Results ==

If you wish to omit a page or post from the list then you can do this in 3 ways...

1. By giving the post/page a title beginning with an exlamation mark. You can then remove this before publishing the page/post.
2. The post and page editor has a meta box, where you can select to hide the page/post.
3. You can add a custom field to a page/post with a name of 'draft_hide' and a value of 'Yes'

== Edit Link ==

If the current user can edit the draft item being listed then it will be linked to the appropriate edit page. The user then simply needs to click on the draft item to edit it.

There are seperate permissions for post and page editing, so an editor with just one permission may find that they can only edit some of the draft items.

Drafts that don't have a title will not be shown on the list UNLESS the current user has edit privilages for the draft - in this case a title of [No Title] will be shown.

== Licence ==

This WordPress plugin is licensed under the [GPLv2 (or later)](http://wordpress.org/about/gpl/ "GNU General Public License").

== Support ==

All of my plugins are supported via [my website](http://www.artiss.co.uk "Artiss.co.uk").

Please feel free to visit the site for plugin updates and development news - either visit the site regularly or [follow me on Twitter](http://www.twitter.com/artiss_tech "Artiss.co.uk on Twitter") (@artiss_tech).

For problems, suggestions or enhancements for this plugin, there is [a dedicated page](http://www.artiss.co.uk/draft-list "Artiss Draft List") and [a forum](http://www.artiss.co.uk/forum "WordPress Plugins Forum"). The dedicated page will also list any known issues and planned enhancements.

**This plugin, and all support, is supplied for free, but [donations](http://artiss.co.uk/donate "Donate") are always welcome.**

== Installation ==

1. Upload the entire `simple-draft-list` folder to your wp-content/plugins/ directory.
2. Activate the plugin through the 'Plugins' menu in WordPress.
3. That's it, you're done - you just need to create a widget, add the function call or short code!

== Frequently Asked Questions ==

= I've been using this plugin before version 2.0 - do I need to change the code? =

No, I've paid particular attention to backwards compatibility - if you have set up your blog pre version 2 then the code you used should operate the same. However, you won't be benefitting from caching and various other improved features, so please update your code as soon as you can.

= Which version of PHP does this plugin work with? =

It has been tested and been found valid from PHP 4 upwards.

Please note, however, that the minimum for WordPress is now PHP 5.2.4. Even though this plugin supports a lower version, I am not coding specifically to achieve this - therefore this minimum may change in the future.

== Screenshots ==

1. A list of draft posts, as taken from the [artiss website](http://www.artiss.co.uk "artiss"), including author name.

== Changelog ==  

= 2.0 =
* Maintenance: Renamed plugin and brought program coding standards up-to-date
* Enhancement: Added new template system, allowing better control over output
* Enhancement: Option to display modified and/or created date
* Enhancement: Option to display word and/or character count
* Enhancement: Draft posts/pages with no title are no longer displayed
* Enhancement: Can now sort output by date created as well as the date modified
* Enhancement: Meta box added to editor to allow post/page to be excluded from list
* Enhancement: Output is now cached (and cache times are adjustable)
* Enhancement: User can now limit time period over which drafts will be displayed
* Enhancement: Added validation of the passed parameters
* Enhancement: New widget option added
* Enhancement: Added improved clock image
* Bug: Alternative icon folder option now works

= 1.6 =
* Enhancement: Draft titles now have links to their edit page if the current user is allowed to edit them

= 1.5 =
* Maintenance: Code tidy
* Enhancement: Added option to show post/page author
* Enhancement: Added version details to code output
* Enhancement: Added shortcode option

= 1.4 =
* Enhancement: Added icon for scheduled posts (which can be modified and switched off, if required)

= 1.3 =
* Enhancement: Date order now displays according to date of last modification

= 1.2 =
* Enhancement: Now displays scheduled posts as well
* Enhancement: Added new parameter to suppress scheduled posts, if required
* Bug: Fixed bug in limit default

= 1.1 =
* Maintenance: With the release of WP 3.0 different post types are possible and these can get mixed in with the results (e.g. menu items, etc). Changed the code to restrict output to pages and posts only
  
= 1.0 =  
* Initial release

== Upgrade Notice ==

= 2.0 =
* Upgrade to add many new features, including sidebar widgets and a template system

= 1.6 =
* Upgrade for the ability to add links for editing posts and pages

= 1.5 =
* Upgrade to add ability to list author and added shortcode option

= 1.4 =
* Upgrade if you wish to have the option of an icon next to scheduled posts

= 1.3 =
* Upgrade to improve data ordering sequence

= 1.2 =
* Upgrade to display scheduled as well as draft posts

= 1.1 =
* Upgrade for WP 3.0 users

= 1.0 =  
* Initial release
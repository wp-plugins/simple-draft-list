=== Draft List ===
Contributors: dartiss
Donate link: http://artiss.co.uk/donate
Tags: artiss, author, cache, coming soon, draft, function, list, page, post, SEO, shortcode, sidebar, simple, widget
Requires at least: 3.2
Tested up to: 4.3.1
Stable tag: 2.2.6
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Draft List will display a list of the titles of your posts/pages that have not yet been published.

== Description ==

Draft List is a powerful method of showing draft and scheduled posts and pages on your site. Use it to show your visitors what's "coming soon" or as a great SEO tool.

You can display this information using a widget or shortcode. Other options include:

* Configure your own look by using a template
* Show an icon on scheduled posts
* The resulting list is cached for streamline performance
* Meta box in editor allows you to omit individual posts from the lists
* Only show drafts within a particular timeframe
* Sequence the draft list in title, created date or modified date order
* Fully internationalized ready for translations
* And much, much more!

Other plugins are available to do this but none are as powerful as Draft List.

How easy is it use? Here's an example of how you could use it in a post or page...

`[drafts limit=5 type=post order=ma scheduled=no template='%ul%%draft% %icon%']`

This would display a list of up to 5 draft posts in ascending modified date sequence, with an icon displayed to the right of each if the draft is scheduled.

For further instruction on use, including a list of all the available parameters, please read the "Other Notes" tab.

== Shortcode Parameters ==

The following shortcode parameters are valid...

* **limit=** : The maximum number of draft items to display. The default is 0, which is unlimited.
* **type=** : This allows you to limit the results to either `post` or `page`. The default is both.
* **order=** : This is the sequence that you'd like to order the results in. It consists of 2 codes - the first is either `t`, `m` or `c` to represent the title, modified date or created date and the second is `a` or `d` for ascending or descending. Therefore `order=td` will display the results in descending title sequence. The default is descending modified date.
* **scheduled=** : If specified as `No` then scheduled posts will not display in the list, only drafts.
* **folder=** : The scheduled icon will be, by default, the one in the plugin folder named `scheduled.png`. However, use this parameter to specify a folder within your theme that you'd prefer the icon to be fetched from.
* **cache=** : How long to cache the output for, in hours. Defaults to half an hour. Set to `No` to not cache at all. Whenever you save a post any cache will be cleared to ensure that any lists are updated.
* **template=** : This is the template which formats the output. See the section below on * *Templates** for further information.
* **date=** : The format of any dates output. This uses the PHP date formatting system - [read here](http://uk3.php.net/manual/en/function.date.php "date") for the formatting codes. Defaults to `F j, Y, g:i a`.

To restrict the posts/pages to a particular timeframe you can use the following 2 parameters. You simply state, in words, how long ago the posts must be dated for e.g. "2 days", "3 months", etc.

* **modified=** : This reflects how long ago the post/page must have been modified last for it to be listed. For example `6 months` would only list drafts that have been modified in the last 6 months.
* **created=** : his reflects how long ago the post/page must have been created for it to be listed. For example `6 months` would only list drafts that were created in the last 6 months.

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
* **%category%** - Shows the first category assigned to the post.
* **%categories%** - Shows all categories assigned to the post, comma separated.

If %ul% or %ol% are specified then all the appropriate list tags will be added to the output. If neither are used then it's assumed that line output will be controlled by yourself.

== Omitting Posts/Pages from Results ==

If you wish to omit a page or post from the list then you can do this in 3 ways...

1. By giving the post/page a title beginning with an exclamation mark. You can then remove this before publishing the page/post.
2. The post and page editor has a meta box, where you can select to hide the page/post.
3. You can add a custom field to a page/post with a name of 'draft_hide' and a value of 'Yes'

== Edit Link ==

If the current user can edit the draft item being listed then it will be linked to the appropriate edit page. The user then simply needs to click on the draft item to edit it.

There are separate permissions for post and page editing, so an editor with just one permission may find that they can only edit some of the draft items.

Drafts that don't have a title will not be shown on the list UNLESS the current user has edit privileges for the draft - in this case a title of [No Title] will be shown.

== Using a Widget ==

Sidebar widgets can be easily added. In Administration simply click on the `Widgets` option under the `Appearance` menu. `Draft Posts` will be one of the listed widgets. Drag it to the appropriate sidebar on the right hand side and then choose your options.

Save the result and that's it! You can use unlimited widgets, so you can add different lists to different sidebars.

== Installation ==

Draft List can be found and installed via the Plugin menu within WordPress administration. Alternatively, it can be downloaded and installed manually...

1. Upload the entire `simple-draft-list` folder to your wp-content/plugins/ directory.
2. Activate the plugin through the 'Plugins' menu in WordPress.
3. That's it, you're done - you just need to create a widget, add the function call or short code!

== Screenshots ==

1. A list of draft posts, as taken from the [artiss website](http://www.artiss.co.uk "artiss"), including author name.

== Changelog ==

= 2.2.6 =
* Maintenance: Added a domain path
* Maintenance: Removed deprecated functionality
* Bug: Fixed the categories tag
* Bug: Solved a PHP bug

= 2.2.5 =
* Maintenance: Added a text domain

= 2.2.4 =
* Bug: I've just noticed that if you use the editor box to hide the post from draft list you can't switch it back off again. Untick the box, save and it's ticked again. Doh. Why did nobody notice this before? It's now fixed though.

= 2.2.3 =
* Maintenance: Resolved widget issues with version 4.3 of WordPress

= 2.2.2 =
* Maintenance: Updated support forum link

= 2.2.1 =
* Bug: Removed some debug output

= 2.2 =
* Maintenance: Updated clock icon
* Enhancement: Added `category` and `categories` template tags

= 2.1 =
* Maintenance: Moved default scheduled icon to its own folder
* Enhancement: Added internationalisation

= 2.0.2 =
* Maintenance: Removed dashboard widget

= 2.0.1 =
* Bug: Fix caching problem that prevents edit links from working correctly

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

= 2.2.6 =
* Minor update to squash some bugs

= 2.2.5 =
* Minor update to add a text domain

= 2.2.4 =
* Upgrade to fix editor box

= 2.2.3 =
* Urgent fix to resolve issues with WordPress 4.3

= 2.2.2 =
* Update to correct support forum link

= 2.2.1 =
* Update to prevent erroneous debug data appearing

= 2.2 =
* Update to add new category template tags

= 2.1 =
* Update to add internationalisation

= 2.0.2 =
* Upgrade to remove the dashboard widget

= 2.0.1 =
* Upgrade to fix a bug in the output

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
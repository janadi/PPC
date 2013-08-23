==== Black Mesa ====

Author: Stefan Kröber
Author URI: http://www.arcance.net
Theme URI: http://www.arcance.net/freebies/blackmesa
Description: A graphically intense theme with alternating, semitransparent headline-boxes, parallax moving backgrounds and beautiful text styles. Supports featured thumbnails, custom headers, custom menus and multiple widget areas.





== CONTENT

 * Installation
 * Limitations & Known Issues
 * Get Support
 * Changelog





= INSTALLATION =

To install the theme, simply copy the folder you just downloaded to your themes directory (wordpress/wp-content/themes/), using your favourite ftp tool. After that, go to Appearance > Themes in your WordPress Admin Panel and activate the theme.





= LIMITATIONS & KNOWN ISSUES =

Using a featured image (post thumbnail)
	
This theme allows you to use a thumbnail for your posts, however, it will be resized to a fixed width and height of 80 x 80 pixels to fit into the layout. Keep in mind: If your image is not quadratic, this results in an stretched image!

- - - - -

Header Navigation Menu
	
Please do not put a thousand items into the header menu, or it will break into multiple lines which is not intended. Six to nine items should easily fit into the bar. If you would like to display more items, you may use a second menu within the sidebar for this purpose.
However, it is always advisable to present as few items as possible in the primary navigation, which is why I am not thinking about adding a pretty solution for two- or more-rows header menus.

- - - - -

Removing the glass-effect overlay from the header
	
If you do not like the glassy overlay, you have to make some changes in header.php template manually.
If necessary, download the file from the themes folder to your computer, then open it with your favourite texteditor (Notepad or TextEdit will do). Search for the line "<span id="headerOverlay"></span>" (~ line 86) and delete it. Save header.php and upload it again (overwrite it, if asked).

- - - - -

Theme may be bugged in old Internet Explorer
	
Though I do not expect major issues regarding legacy Internet Explorer compatibility, there may be some minor flaws - leaving aside the fact that I am not including a PNG-Fix. I am not testing for older IE compatibility with this release. I may address this in a future minor update. If you encounter any major bugs, please contact me: http://www.arcance.net/contact





= GET SUPPORT =

I found a bug! There is a faulty translation!
	
Sorry for that. I probably drank to less coffee the night I was working on that. It would be very kind, if you could report any bugs or flaws you encounter. There are several ways to do so:
Write me an email: http://www.arcance.net/contact
Open a support thread on wordpress.org: http://wordpress.org/extend/themes/blackmesa
Email is way faster - I do not often check the wordpress.org tickets

- - - - -

I am missing a feature. Can you add it? I have another question!
	
Feel free to ask whatever you want. If I can, I will help you. But keep in mind that I am not able to help with WordPress issues in general, not directly related to my themes.
Write me an email: http://www.arcance.net/contact

	



== CHANGELOG ==

Version 1.1.7 - 29.08.2012

Fixed: The header's glass-overlay won't be pushed out to the right anymore, if a custom header image is used

- - - - -

Version 1.1.6 - 27.08.2012

Fixed: Added missing > in page.php on line 22
Fixed: Added missing space characters between the comments author and date

- - - - -

Version 1.1.5 - 27.08.2012

Added: New function blackmesa_widget_title() prevents the sidebar to collapse if a widget has no title

- - - - -

Version 1.1.4 - 23.08.2012

Changed: Removed a superfluous function in functions.php that was commented out

Added: If a post has no title, it will now use "Untitled" so that the single-post view can be reached even if comments are disabled.

- - - - -

Version 1.1.3 - 22.08.2012

Fixed: Center aligned images are now correctly centered again
Fixed: Wide, unresized images are now properly downscaled without distortion
Fixed: Corrected some wrong named textdomain references
Fixed: list-styles for ordered and unordered lists in posts, pages and comments
Fixed: Third level links in header menu are now easily accessible 

Changed: Header menu now has a background image for two-row navigations
Changed: Theme URI is now more specific: arcance.net/freebies/blackmesa
Changed: Using get_template_directory() instead of TEMPLATEPATH in functions.php
Changed: Removed inline CSS for post-thumbnails and added "with-thumbnail" class instead
Changed: Deprecated add_custom_image_header() (since WordPress 3.4) has been replaced with add_theme_support( 'custom-header')
Changed: Copyright and license informations have been adjusted

Added: A CSS class for wp_link_pages() for proper styling

- - - - -

Version 1.1.2 - 07.08.2012

Fixed: An error causing the comments template not to show up

- - - - -

Version 1.1.1 - 06.08.2012

Changed: Drastically cleaned up loop.php
Changed: Extended and updated language files for german
Changed: Renamed and commented vars for alternating article headers and comments ($bm_head, $bm_cc)

Added: Attachments can now be displayed in the theme's design
Added: Archive pages for authors
Added: License for Share Regular webfont

- - - - -

Version 1.1 - 05.08.2012

Complete rebuild based on "TwentyTen" for better compatibility with WordPress 3.x

Fixed: Posts ending with a floating element no longer appear "cut off" at the bottom
Fixed: Elements wider than the content area no longer appear "cut off" at the right side
Fixed: Admin Bar was occasionally not showing up
Fixed: Pages are now properly listed on single view when the entry is split into parts
Fixed: Tags and categories in post meta are no longer partially hidden if there are a (ridiculously) high amount of items

Changed: RSS / Atom feeds are now generated via automatic-feed-links support-function
Changed: Comments are now displayed via custom wp_list_comments function
Changed: Comments form is now displayed via comments_form function
Changed: Loading scripts via wp_enqueue_script function
Changed: Moved prominent credit link from sidebar to footer and made it a lot less flashy
Changed: Size of avatars reduced to 60x60 pixels, due to threaded comments support
Changed: Previous- and next-buttons / links now have an arrow character on them for faster recognition
Changed: Glass-effect on header image has been separated and is now displayed "on top" of an image
Changed: Improved a few text-styles for easier reading and better recognition

Added: Threaded comments
Added: Pagination for comments
Added: Custom header images
Added: Featured thumbnails support (fixed to 80x80 pixels)
Added: Very basic styles for visual editor to get closer to the themes look
Added: Localized every text output (hopefully) to allow easy translation; german already included
Added: license.txt and readme.txt

- - - - -

Version 1.0

Initial release


=== Royal Gallery ===

Contributors: xmlswf.com
Author URI: http://vm.xmlswf.com/wordpress-plugins/royal-gallery
Tags: gallery, wordpress gallery, free wp gallery, free gallery
Requires at least: 3.0
Tested up to: 3.3.1
Stable tag: trunk

Royal Gallery Plugin for WordPress a free image gallery. Use [royal] code snippet in your content to dispaly this gallery. It also supports categories and multiple iamge uploads. It is possible to use this gallery multiple instances.

== Description ==

Royal Gallery Plugin for WordPress a free image gallery. Use [royal] code snippet in your content to dispaly this gallery. It also supports categories and multiple iamge uploads. It is possible to use this gallery multiple instances.

**Features**

1. Show unlimited number of images

2. Plays youtube videos

3. Full Screen

4. Play / pause and customize the auto slider time interval

5. Customizable transition time

6. Five types of transition effects

7. Customizable pre-loader color

8. Customizable thumb rows

9. Customizable background color for gallery

10. Customizable thumb color

11. Customizable scrollbar color

12. Enable/disable short description

For a working demo, visit http://vm.xmlswf.com/wordpress-plugins/royal-gallery.

Installation video:  http://www.youtube.com/watch?v=yf8lbA4TtQc

== Installation ==

1. Install automatically through the `Plugins`, `Add New` menu in WordPress, or upload the `wp-royal-slideshow` folder to the `/wp-content/plugins/` directory. 

2. Activate the plugin through the `Plugins` menu in WordPress. Look for the "settings" link  under "royal gallery" on left side menu to configure the Options. 


= short codes to use in content =
* <code>[royal]</code> - Use this short code in the content / post to display all images under all categories which are not disabled.

* <code>[royal cats=2,3]</code> - Use this short code in the content / post to display all images under the categories with ID's 2,3.

* <code>[royal imgs=1,2,3]</code> - Use this short code in the content / post to display images which has ID's 1,2,3.

= short codes to use in template =

* <code><?php echo do_shortcode('[royal]');?></code> - Use this short code in the template (php file) to display all images under all categories which are not disabled.

* <code><?php echo do_shortcode('[royal cats=2,3]');?></code> - Use this short code in the template (php file) to display all images under the categories with ID's 2,3.

* <code><?php echo do_shortcode('[royal imgs=1,2,3]');?></code> - Use this short code in the template (php file) to display images which has ID's 1,2,3.

If you facing any issues in using this plugin please open a support ticket at http://support.xmlswf.com

For a working demo, visit http://vm.xmlswf.com/wordpress-plugins/royal-gallery.

Installation video:  http://www.youtube.com/watch?v=yf8lbA4TtQc

== Screenshots ==

1. screenshot-1.jpg - Slideshow front end. 

2. screenshot-2.gif - Add new album / category.

3. screenshot-3.gif - Edit image.

4. screenshot-4.gif - bulk upload.

5. screenshot-5.gif - edit album / category.

6. screenshot-6.gif - short code to be placed in the content.


== change log ==
1.fixed : youtube video playing with out any issue.

=2.0=
This is major change. It is not possible to upgrade from older version to this version. You must remove your old plugin and install new one. Please take backup of your images.

=2.1=
Where ever you place the short code, there only the slider shows. Previously it use to show on top of content.

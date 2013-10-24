<?php
/*
Plugin Name: Menu Social Icons
Description: Change menu links to social sites to icons automatically. Uses <a href="http://fortawesome.github.io/Font-Awesome/" target="_blank">FontAwesome</a> and supports: Bitbucket, Dribbble, Dropbox, Flickr, Foursquare, Gittip, Instagram, RenRen, Stack Overflow, Trello, Tumblr, VK, Weibo, Xing, and YouTube.
Version: 1.3
Author: Brainstorm Media
Author URI: http://brainstormmedia.com
*/

/**
 * Copyright (c) 2013 Brainstorm Media. All rights reserved.
 *
 * Released under the GPL license
 * http://www.opensource.org/licenses/gpl-license.php
 *
 * This is an add-on for WordPress
 * http://wordpress.org/
 *
 * **********************************************************************
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 * **********************************************************************
 */

add_action( 'init', 'storm_menu_social_icons_init' );

function storm_menu_social_icons_init() {

	// PHP Version Check
	if ( version_compare(PHP_VERSION, '5.2', '<') ) {

    if ( is_admin() && ( !defined('DOING_AJAX') || !DOING_AJAX ) ) {
		
			// If not PHP 5.2, and in admin, show a warning and deactivate
      require_once ABSPATH . '/wp-admin/includes/plugin.php';
      deactivate_plugins( __FILE__ );
      wp_die( sprintf( __( 'Menu Social Icons requires PHP 5.2 or higher, as does WordPress 3.2 and higher. The plugin has now disabled itself. For information on upgrading, %ssee this article%s.', 'menu-social-icons'), '<a href="http://codex.wordpress.org/Switching_to_PHP5" target="_blank">', '</a>') );

    } else {

    	// Return on front-end to avoid crashing the site
      return;

    }

	}

	require dirname ( __FILE__ ) . '/classes/menu-social-icons.php';
	
	// Front-end actions
	add_action( 'template_redirect', 'Storm_Menu_Social_Icons::get_instance' );

}

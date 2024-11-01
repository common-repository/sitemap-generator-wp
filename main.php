<?php
/*
Plugin Name: Sitemap Generator WP
Description: Sitemap Generator WP is the easy way to generate an XML or HTML or CSV sitemap to your wordpress blog.
Version: 1.09
Author: daext
Author URI: http://daext.com
License: GPLv2 or later
*/

/*  Copyright 2012  Danilo Andreini (email : andreini.danilo@gmail.com)

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/

//includes external files
require_once('includes/head.php');//add stuff to the head
require_once('includes/menu_generator.php');//menu generator
require_once('includes/menu_options.php');//menu page
require_once('includes/credits.php');//credits

//options initialization
if(strlen(get_option('sg_posts_priority'))==0){update_option('sg_posts_priority',"0.5");}
if(strlen(get_option('sg_pages_priority'))==0){update_option('sg_pages_priority',"0.5");}
if(strlen(get_option('sg_categories_priority'))==0){update_option('sg_categories_priority',"0.5");}
if(strlen(get_option('sg_tags_priority'))==0){update_option('sg_tags_priority',"0.5");}

//create the mail list menu
add_action( 'admin_menu', 'sitemap_generator_menu_handler' );
function sitemap_generator_menu_handler() {
	$form_name='Sitemap';
	add_menu_page($form_name, $form_name, 'manage_options', 'sg_menu','menu_generator_sitemap_generator',plugins_url().'/sitemap-generator-wp/img/icon16.png');
	add_submenu_page('sg_menu', $form_name.' - Generator', 'Generator', 'manage_options', 'sg_menu', 'menu_generator_sitemap_generator');
	add_submenu_page('sg_menu', $form_name.' - Options', 'Options', 'manage_options', 'sg_options', 'menu_options_sitemap_generator');
}

//delete options when the plugin is uninstalled
register_uninstall_hook( __FILE__, 'sitemap_generator_uninstall' );
function sitemap_generator_uninstall(){

	//deleting options
	delete_option('sg_posts_priority');
	delete_option('sg_pages_priority');
	delete_option('sg_categories_priority');
	delete_option('sg_tags_priority');
	
}

?>

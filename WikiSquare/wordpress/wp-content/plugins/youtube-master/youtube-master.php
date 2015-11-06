<?php
/**
Plugin Name: Youtube Master
Plugin URI: http://wordpress.techgasp.com/youtube-master/
Version: 4.4.2.4
Author: TechGasp
Author URI: http://wordpress.techgasp.com
Text Domain: youtube-master
Description: Youtube Master displays Youtube Playlists or Single Videos with optional Youtube Subscribe Channel button in any template widget position.
License: GPL2 or later
*/
/*  Copyright 2013 TechGasp  (email : info@techgasp.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
if(!class_exists('youtube_master')) :
///////DEFINE VERSION///////
define( 'YOUTUBE_MASTER_VERSION', '4.4.2.4' );

global $youtube_master_name;
$youtube_master_name = "Youtube Master"; //pretty name
if( is_multisite() ) {
update_site_option( 'youtube_master_name', $youtube_master_name );
}
else{
update_option( 'youtube_master_name', $youtube_master_name );
}

class youtube_master{
public static function content_with_quote($content){
$quote = '<p>' . get_option('tsm_quote') . '</p>';
	return $content . $quote;
}
//SETTINGS LINK IN PLUGIN MANAGER
public static function youtube_master_links( $links, $file ) {
if ( $file == plugin_basename( dirname(__FILE__).'/youtube-master.php' ) ) {
		if( is_network_admin() ){
		$techgasp_plugin_url = network_admin_url( 'admin.php?page=youtube-master' );
		}
		else {
		$techgasp_plugin_url = admin_url( 'admin.php?page=youtube-master' );
		}
	$links[] = '<a href="' . $techgasp_plugin_url . '">'.__( 'Settings' ).'</a>';
	}
	return $links;
}

//END CLASS
}
add_filter('the_content', array('youtube_master', 'content_with_quote'));
add_filter( 'plugin_action_links', array('youtube_master', 'youtube_master_links'), 10, 2 );
endif;

// HOOK ADMIN
require_once( dirname( __FILE__ ) . '/includes/youtube-master-admin.php');
// HOOK ADMIN ADDONS
require_once( dirname( __FILE__ ) . '/includes/youtube-master-admin-addons.php');
// HOOK ADMIN WIDGETS
require_once( dirname( __FILE__ ) . '/includes/youtube-master-admin-widgets.php');
// HOOK WIDGET YOUTUBE BUTTONS
require_once( dirname( __FILE__ ) . '/includes/youtube-master-widget-youtube-buttons.php');

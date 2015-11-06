<?php 
/*
*Plugin Name: Google SEO Pressor Snippet Plugin
*Plugin URI: http://www.smackcoders.com/store/google-seo-author-snippet-wordpress-plugin.html
*Description: A plugin that Manages the user's social profile details
*Version: 1.2.4
*Author: smackcoders.com
*Author URI: http://www.smackcoders.com
*
* Copyright (C) 2012 Smackcoders (www.smackcoders.com)
*

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
*
* @link http://www.smackcoders.com/store/google-seo-author-snippet-wordpress-plugin.html

***********************************************************************************************
*/

$get_debug_mode = get_option('smack_microdata_settings');
if($get_debug_mode['allowed']['debug_mode'] != 1) {
        error_reporting(0);
        ini_set('display_errors', 'Off');
}

define('GSAS_version' , '1.2.2');
if ( ! defined( 'GSAS_PATH' ) ) {
	define( 'GSAS_PATH', plugin_dir_path( __FILE__ ) );
}
if ( ! defined( 'GSAS_BASENAME' ) ) {
	define( 'GSAS_BASENAME', plugin_basename( __FILE__ ) );
}
if( !defined( 'GSAS_BASEURL' ) ) {
	define( 'GSAS_BASEURL', plugin_dir_url( __FILE__ ) ); 
}

define('WP_PLUGIN_NAME', 'Google SEO Pressor Rich Snippets');
//require_once 'create_meta_box.php';   
define('SMACK_IMAGE_URL', get_bloginfo('wpurl').'/wp-content/plugins/google-seo-author-snippets/images/');
$snippets = array('Rich snippets - Events',
    'Rich snippets - Music',
    'Rich snippets - Organizations',
    'Rich snippets - People',
    'Rich snippets - Products',
    'Rich snippets - Recipes',
    'Rich snippets - Reviews',
    'Rich snippets - Software applications',
    'Rich snippets - Videos: Facebook Share and RDFa' );

$FieldNames[0] = array(
		'g_image' => 'googleplus-icon-setone.png',
		'g_image_url' => SMACK_IMAGE_URL,
		'f_image' => 'facebook-icon-setone.png',
		'f_image_url' => SMACK_IMAGE_URL,
		't_image' => 'twitter-icon-setone.png',
		't_image_url' => SMACK_IMAGE_URL,
		'l_image' => 'linkedin-icon-setone.png',
		'l_image_url' => SMACK_IMAGE_URL,
		'location_image' => 'locator-icon-setone.png',
		'location_url' => SMACK_IMAGE_URL,
	);	
$FieldNames[1] = array(
		'g_image' => 'googleplus-icon-settwo.png',
		'g_image_url' => SMACK_IMAGE_URL,
		'f_image' => 'facebook-icon-settwo.png',
		'f_image_url' => SMACK_IMAGE_URL,
		't_image' => 'twitter-icon-settwo.png',
		't_image_url' => SMACK_IMAGE_URL,
		'l_image' => 'linkedin-icon-settwo.png',
		'l_image_url' => SMACK_IMAGE_URL,
		'location_image' => 'locator-icon-settwo.png',
		'location_url' => SMACK_IMAGE_URL,
	);	
$FieldNames[2] = array(
		'g_image' => 'googleplus-icon-setthree.png',
		'g_image_url' => SMACK_IMAGE_URL,
		'f_image' => 'facebook-icon-setthree.png',
		'f_image_url' => SMACK_IMAGE_URL,
		't_image' => 'twitter-icon-setthree.png',
		't_image_url' => SMACK_IMAGE_URL,
		'l_image' => 'linkedin-icon-setthree.png',
		'l_image_url' => SMACK_IMAGE_URL,
		'location_image' => 'locator-icon-setthree.png',
		'location_url' => SMACK_IMAGE_URL,
	);	
$FieldNames[3] = array(
		'g_image' => 'googleplus-icon-setfour.png',
		'g_image_url' => SMACK_IMAGE_URL,
		'f_image' => 'facebook-icon-setfour.png',
		'f_image_url' => SMACK_IMAGE_URL,
		't_image' => 'twitter-icon-setfour.png',
		't_image_url' => SMACK_IMAGE_URL,
		'l_image' => 'linkedin-icon-setfour.png',
		'l_image_url' => SMACK_IMAGE_URL,
		'location_image' => 'locator-icon-setfour.png',
		'location_url' => SMACK_IMAGE_URL,
	);	

register_deactivation_hook( __FILE__, 'deactivate_now' );
function deactivate_now()
{
	delete_option( 'smack_microdata_settings');
	delete_option( 'smack_microdata_imageset');
	delete_option( 'snippets_types');
	$blogusers = get_users();
	foreach($blogusers as $users){
		delete_user_meta($users->ID, 'smack_social_links' );
		delete_user_meta($users->ID, 'smack_user_geoinfo' );
	}
}
class MyPlugin {
     static function install() {
            // do not generate any output here
     }
}
register_activation_hook( __FILE__, array('MyPlugin', 'install') );
update_option( 'smack_microdata_imageset' , $FieldNames );
update_option( 'snippets_types' , $snippets );
if(is_admin()) {

require_once 'microdata_form.php';
require_once 'create_meta_box.php';
require_once 'support-form.php';

}
else {
include(GSAS_PATH. 'schema/gsas_schema_for_product.php');
include(GSAS_PATH. 'schema/gsas_schema_for_events.php');
include(GSAS_PATH. 'schema/gsas_schema_for_music.php');
include(GSAS_PATH. 'schema/gsas_schema_for_videos.php');
include(GSAS_PATH. 'schema/gsas_schema_for_software_application.php');
include(GSAS_PATH. 'schema/gsas_schema_for_receipes.php');
include(GSAS_PATH. 'schema/gsas_schema_for_organisation.php');
include(GSAS_PATH. 'schema/gsas_schema_for_people.php');
include(GSAS_PATH. 'schema/gsas_schema_for_review.php');

}

function action_google_seo_snippets_admin_init() {
	wp_enqueue_script('microdata_configuration_page', plugins_url('js/smack-microdata.js', __FILE__));
        wp_enqueue_script('microdata_configuration_pag', plugins_url('js/jquery.plugin.js', __FILE__));
        wp_enqueue_script('microdata_configuration_pa', plugins_url('js/jquery.datepick.js', __FILE__));
        wp_enqueue_style('microdata_configuration_p', plugins_url('js/jquery.datepick.css', __FILE__));
        wp_enqueue_style('microdata_configuration_meta_css', plugins_url('js/google_seo_meta_box.css', __FILE__));

	wp_enqueue_style('microdata_configuration_css', plugins_url('css/style.css', __FILE__));

}
add_action('admin_init', 'action_google_seo_snippets_admin_init');

function admin_menus() {  
	$settings = get_option('smack_microdata_settings');
	if(!is_array($settings) && empty($settings)) {
		$settings['allowed']['debug_mode'] = 0;
		update_option('smack_microdata_settings', $settings);
	}
	$contentUrl = WP_CONTENT_URL; 
	add_menu_page('Google SEO Pressor Snippets', 'Google SEO Pressor Snippets', 'manage_options','plugin_configuration','microdata_configuration_page',"$contentUrl/plugins/google-seo-author-snippets/images/icon.png" );

        add_submenu_page('plugin_configuration','Contact Us','Contact Us','manage_options','support_form', 'support_form');  
	
}  
add_action("admin_menu", "admin_menus"); 
add_filter( 'custom_menu_order', '__return_true' );
add_filter( 'menu_order', 'smackgsas_change_menu_order' );

// Move Pages above Media
function smackgsas_change_menu_order ( $menu_order ) {
	return array(
			'index.php',
			'edit.php',
			'edit.php?post_type=page',
			'upload.php',
			'plugin_configuration',
		    );
}


function send2smackers() {
require_once("sendmail.php");
	die();
}
add_action('wp_ajax_send2smackers', 'send2smackers');


//require_once('../../schema/gsas_schema_for_product.php' );

#wp_enqueue_script("microdata_configuration_page", "/wp-content/plugins/google-seo-author-snippets/js/smack-microdata.js", array("jquery"));
?>

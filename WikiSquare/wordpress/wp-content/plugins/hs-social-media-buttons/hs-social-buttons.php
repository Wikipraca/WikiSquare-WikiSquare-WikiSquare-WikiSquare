<?php

/**
 * Plugin Name: HS Social Media Buttons
 * Plugin URI: http://heliossolutions.in/
 * Description: HS Social Media Buttons plugin adds social media buttons to your site.
 * Version: 2.0.5
 * Author: Helios Solutions
 * Author URI: http://heliossolutions.in/
 */
$plugin_url = WP_PLUGIN_URL . '/hs-social-media-buttons';
$options = array();

/*
 * 	Add a link to our plugin in the admin menu
 * 	under 'Settings > HS Social Buttons'
 *
 */

function hssocial_badges_menu() {

    /*
     * 	Use the add_options_page function
     * 	add_options_page( $page_title, $menu_title, $capability, $menu-slug, $function ) 
     *
     */
    add_options_page(
            'HS Social Buttons Settings', 'HS Social Buttons Settings', 'manage_options', 'hssocial-badges', 'hssocial_badges_options_page'
    );
}

add_action('admin_menu', 'hssocial_badges_menu');

function hssocial_badges_options_page() {

    if (!current_user_can('manage_options')) {

        wp_die('You do not have sufficient permissions to access this page.');
    }

    global $plugin_url;
    global $options;

    if (isset($_POST['hssocial_form_submitted'])) {

        $hidden_field = esc_html($_POST['hssocial_form_submitted']);

        if ($hidden_field == 'Y') {

            $hssocial_facebook = esc_html($_POST['hssocial_facebook']);
            $hssocial_linkedin = esc_html($_POST['hssocial_linkedin']);
			$hssocial_youtube = esc_html($_POST['hssocial_youtube']);
            $hssocial_google = esc_html($_POST['hssocial_google']);
            $hssocial_twitter = esc_html($_POST['hssocial_twitter']);
            $hssocial_pintrest = esc_html($_POST['hssocial_pintrest']);
			$hssocial_ur_web = esc_html($_POST['hssocial_ur_web']);
			$hssocial_mail = esc_html($_POST['hssocial_mail']);
			$hssocial_skype = esc_html($_POST['hssocial_skype']);
			$hssocial_instagram = esc_html($_POST['hssocial_instagram']);
			$hssocial_flickr = esc_html($_POST['hssocial_flickr']);
                        $mobile = $_POST['mobile'];
            $hssocial_xing = esc_html($_POST['hssocial_xing']);
			$hssocial_tumblr = esc_html($_POST['hssocial_tumblr']);
			$pos_lr = esc_html($_POST['pos_lr']);
            $top_px = esc_html($_POST['top_px']);
			$effect_bt = esc_html($_POST['effect_bt']);
            $options['hssocial_facebook'] = $hssocial_facebook;
			$options['hssocial_linkedin'] = $hssocial_linkedin;
            $options['hssocial_youtube'] = $hssocial_youtube;
            $options['hssocial_twitter'] = $hssocial_twitter;
            $options['hssocial_pintrest'] = $hssocial_pintrest;
            $options['hssocial_google'] = $hssocial_google;
			$options['hssocial_ur_web'] = $hssocial_ur_web;
			$options['hssocial_mail'] = $hssocial_mail;
			$options['hssocial_skype'] = $hssocial_skype;
			$options['hssocial_instagram'] = $hssocial_instagram;
			$options['hssocial_flickr'] = $hssocial_flickr;
			$options['hssocial_xing'] = $hssocial_xing;
			$options['hssocial_tumblr'] = $hssocial_tumblr;
                        $options['mobile'] = $mobile;
            $options['pos_lr'] = $pos_lr;
            $options['top_px'] = $top_px;
			$options['effect_bt'] = $effect_bt;
            $options['last_updated'] = time();

            update_option('hssocial_badges', $options);
        }
    }

    $options = get_option('hssocial_badges');

    if ($options != '') {

        $hssocial_facebook = $options['hssocial_facebook'];
		$hssocial_linkedin = $options['hssocial_linkedin'];
        $hssocial_twitter = $options['hssocial_twitter'];
        $hssocial_google = $options['hssocial_google'];
        $hssocial_pintrest = $options['hssocial_pintrest'];
        $hssocial_youtube = $options['hssocial_youtube'];
		$hssocial_ur_web = $options['hssocial_ur_web'];
		$hssocial_mail = $options['hssocial_mail'];
		$hssocial_skype = $options['hssocial_skype'];
		$hssocial_instagram = $options['hssocial_instagram'];
		$hssocial_flickr = $options['hssocial_flickr'];
		$hssocial_xing = $options['hssocial_xing'];
		$hssocial_tumblr = $options['hssocial_tumblr'];
        $pos_lr = $options['pos_lr'];
        $top_px = $options['top_px'];
		$effect_bt = $options['effect_bt'];
    }

    require( 'inc/options-page-wrapper.php' );
}

/* Load Style-sheet for plugin */

function hssocial_badges_backend_styles() {

    wp_enqueue_style('hssocial_badges_backend_css', plugins_url('hs-social-media-buttons/hssocial-badges.css'));
    $options = get_option('hssocial_badges');
    $options['pos_lr'];
    if ($options['pos_lr'] == 'l') {
        wp_enqueue_style('general-left', plugins_url('hs-social-media-buttons/inc/css/general-left.css'));
    } else {
        wp_enqueue_style('general', plugins_url('hs-social-media-buttons/inc/css/general.css'));
    }
}

add_action('admin_head', 'hssocial_badges_backend_styles');

/* Load Javascript for plugin */

function hssocial_badges_frontend_scripts_and_styles() {

    wp_enqueue_style('hssocial_badges_frontend_css', plugins_url('hs-social-media-buttons/hssocial-badges.css'));
    $options = get_option('hssocial_badges');
    $options['pos_lr'];
    if ($options['pos_lr'] == 'l') {
        wp_enqueue_style('general-left', plugins_url('hs-social-media-buttons/inc/css/general-left.css'));
    } else {
        wp_enqueue_style('general', plugins_url('hs-social-media-buttons/inc/css/general.css'));
    }
    wp_enqueue_script('hssocial', plugins_url('hs-social-media-buttons/inc/js/hssocial.js'), array('jquery'), '', false);
}

add_action('wp_enqueue_scripts', 'hssocial_badges_frontend_scripts_and_styles');

/* Load Front End */

function front_end_load() {
    require( 'inc/front-end.php' );
}

add_action('wp_head', 'front_end_load');
?>

<?php
/**
 * Plugin Name: Add My Networks
 * Plugin URI: http://www.noobox.net
 * Description: This plugin will let you add custom social links. Simple but flexible. You can specify tags to show your links and manage them through widgets admin area.
 * Version: 1.0
 * Author: Noobox
 * Author URI: http://www.noobox.com
 * Disclaimer: Use at your own risk. No warranty expressed or implied is provided.
 * License: GPLv2 or later.
 */
 
 class wp_add_my_network_widget extends WP_Widget {

	// constructor
	function wp_add_my_network_widget() {
		parent::WP_Widget(false, $name = __('Add Social Icon', 'wp_add_my_network_widget') );
	}

	// widget form creation
	function form($social) {
		// Check values
		if( $social) {
			 $title = esc_attr($social['title']);
			 $tagStart = esc_attr($social['tagStart']);
			 $name = esc_attr($social['name']);
			 $socialLink = esc_attr($social['socialLink']);
			 $newTab = esc_attr($social['newTab']);
			 $imageUri = esc_attr($social['imageUri']);
			 $tagEnd = esc_attr($social['tagEnd']);
		} else {
			 $title = '';
			 $tagStart = '';
			 $name = '';
			 $socialLink = '';
			 $newTab = '';
			 $imageUri = '';
			 $tagEnd = '';
		}
	?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Widget Title:', 'wp_add_my_network_widget'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('tagStart'); ?>"><?php _e('Starting Tag:', 'wp_add_my_network_widget'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('tagStart'); ?>" name="<?php echo $this->get_field_name('tagStart'); ?>" type="text" value="<?php echo $tagStart; ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('name'); ?>"><?php _e('Social Icon Name:', 'wp_add_my_network_widget'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('name'); ?>" name="<?php echo $this->get_field_name('name'); ?>" type="text" value="<?php echo $name; ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('socialLink'); ?>"><?php _e('Social Link: (Include http://)', 'wp_add_my_network_widget'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('socialLink'); ?>" name="<?php echo $this->get_field_name('socialLink'); ?>" type="text" value="<?php echo $socialLink; ?>" />
        </p>
        <p>
            <input id="<?php echo $this->get_field_id('newTab'); ?>" name="<?php echo $this->get_field_name('newTab'); ?>" type="checkbox" value="1" <?php checked( '1', $newTab ); ?> />
            <label for="<?php echo $this->get_field_id('newTab'); ?>"><?php _e('Opne in New Tab', 'wp_add_my_network_widget'); ?></label>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('imageUri'); ?>"><?php _e('Social Icon:', 'wp_add_my_network_widget'); ?></label><br />
            <img class="<?php echo $this->get_field_id('imageUri'); ?>" src="<?php if(!empty($social['imageUri'])){echo $social['imageUri'];} ?>" style="margin:0; padding:0; max-width:225px; float:left; display:block" />
            <input class="widefat <?php echo $this->get_field_id('imageUri'); ?>" name="<?php echo $this->get_field_name('imageUri'); ?>" type="text" value="<?php echo $social['imageUri']; ?>">
            <input class="button custom_media_upload" id="<?php echo $this->get_field_id('imageUri'); ?>" type="button" value="<?php _e( 'Upload Image', 'wp_add_my_network_widget' ); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('tagEnd'); ?>"><?php _e('Ending Tag:', 'wp_add_my_network_widget'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('tagEnd'); ?>" name="<?php echo $this->get_field_name('tagEnd'); ?>" type="text" value="<?php echo $tagEnd; ?>" />
        </p>
	<?php
    }

	// update widget
	function update($new_social, $old_social) {
			$social = $old_social;
			// Fields
			$social['title'] = strip_tags($new_social['title']);
			$social['tagStart'] = $new_social['tagStart'];
			$social['name'] = strip_tags($new_social['name']);
			$social['socialLink'] = strip_tags($new_social['socialLink']);
			$social['newTab'] = strip_tags($new_social['newTab']);
			$social['imageUri'] = strip_tags($new_social['imageUri']);
			$social['tagEnd'] = $new_social['tagEnd'];
		return $social;
	}

	// display widget
	function widget($args, $social) {
	   extract( $args );
	   // these are the widget options
	   $title = apply_filters('widget_title', $social['title']);
	   $name = $social['name'];
	   $tagStart = $social['tagStart'];
	   $socialLink = $social['socialLink'];
	   $newTab = $social['newTab'];
	   $imageUri = $social['imageUri'];
	   $tagEnd = $social['tagEnd'];
	   echo $before_widget;

	   // Display the widget
	   // Check if title is set
	   if ( $title ) {
		  echo $before_title . $title . $after_title;
	   }
	   
	   if( $newTab != '1' && $socialLink ) {
		   echo $tagStart."<a href='".$socialLink."' title='".$name."'><img src='".$imageUri."' alt='".$name."' /></a>".$tagEnd;
	   }
	   
	   if( $newTab && $newTab == '1' && $socialLink ) {
		   echo $tagStart."<a href='".$socialLink."' title='".$name."' target='_blank'><img src='".$imageUri."' alt='".$name."' /></a>".$tagEnd;
	   }
	   echo $after_widget;
	}
}

// register widget
add_action('widgets_init', create_function('', 'return register_widget("wp_add_my_network_widget");'));

function wp_add_my_network_widget_enqueue()
{
	wp_enqueue_media();
	wp_enqueue_script('csw', plugins_url( '/js/csw.js', __FILE__ ), array( 'jquery' ), null, true);
}
add_action('admin_enqueue_scripts', 'wp_add_my_network_widget_enqueue');

//Starting Tag<a href="Social Link" title="Social Icon Name"><img src="Social Icon" alt="Social Icon Name" /></a>Ending Tag

/*
	i.e: <ul>
			<li><a href="Social Link" title="Social Icon Name"><img src="Social Icon" alt="Social Icon Name" /></a></li> <===First Widget End
			<li><a href="Social Link" title="Social Icon Name"><img src="Social Icon" alt="Social Icon Name" /></a></li> <===Second Widget End
			<li><a href="Social Link" title="Social Icon Name"><img src="Social Icon" alt="Social Icon Name" /></a></li>
		</ul> <===Third Widget End
*/
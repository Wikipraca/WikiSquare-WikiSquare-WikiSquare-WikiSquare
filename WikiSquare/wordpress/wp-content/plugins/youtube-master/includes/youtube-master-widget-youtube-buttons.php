<?php
//Hook Widget
add_action( 'widgets_init', 'youtube_master_widget_buttons' );
//Register Widget
function youtube_master_widget_buttons() {
register_widget( 'youtube_master_widget_buttons' );
}

class youtube_master_widget_buttons extends WP_Widget {
	function youtube_master_widget_buttons() {
	$widget_ops = array( 'classname' => 'Youtube Master Buttons', 'description' => __('Youtube Subscribe Channel button will make your Youtube channel grow exponentially. ', 'youtube_master') );
	$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'youtube_master_widget_buttons' );
	parent::__construct( 'youtube_master_widget_buttons', __('Youtube Master Buttons', 'youtube_master'), $widget_ops, $control_ops );
	}
	
	function widget( $args, $instance ) {
		extract( $args );
		//Our variables from the widget settings.
		$youtube_title = isset( $instance['youtube_title'] ) ? $instance['youtube_title'] :false;
		$youtube_title_new = isset( $instance['youtube_title_new'] ) ? $instance['youtube_title_new'] :false;
		$youtubespacer ="'";
		$show_youtubebutton = isset( $instance['show_youtubebutton'] ) ? $instance['show_youtubebutton'] :false;
		$youtubebutton_id = $instance['youtubebutton_id'];
		$youtubebutton_layout = $instance['youtubebutton_layout'];
		$youtubebutton_count = $instance['youtubebutton_count'];
		$youtubebutton_color = $instance['youtubebutton_color'];
		echo $before_widget;
		
// Display the widget title
	if ( $youtube_title ){
		if (empty ($youtube_title_new)){
			if(is_multisite()){
			$youtube_title_new = get_site_option('youtube_master_name');
			}
			else{
			$youtube_title_new = get_option('youtube_master_name');
			}
		echo $before_title . $youtube_title_new . $after_title;
		}
		else{
		echo $before_title . $youtube_title_new . $after_title;
		}
	}
	else{
	}
//Prepare Button Layout
	if ( $youtubebutton_layout ){
		$youtubebutton_layout_create = 'data-layout="full"';
	}
	else{
		$youtubebutton_layout_create = 'data-layout="default"';
	}
//Prepare Button Color
	if ( $youtubebutton_color ){
		$youtubebutton_color_create = 'data-theme="dark"';
	}
	else{
		$youtubebutton_color_create = '';
	}
//Prepare Button Count Bubble
	if ( $youtubebutton_count ){
		$youtubebutton_count_create = 'data-count="default"';
	}
	else{
		$youtubebutton_count_create = 'data-count="hidden"';
	}
//Display Youtube Subscribe Channel Button
		if ( $show_youtubebutton ){
		echo '<script src="https://apis.google.com/js/plusone.js"></script>' .
			'<div class="g-ytsubscribe" data-channelid="'.$youtubebutton_id.'" '.$youtubebutton_layout_create.' '.$youtubebutton_color_create.' '.$youtubebutton_color_create.'></div>';
		}
		else{
		}
	echo $after_widget;
	}
	//Update the widget
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		//Strip tags from title and name to remove HTML
		$instance['youtube_title'] = strip_tags( $new_instance['youtube_title'] );
		$instance['youtube_title_new'] = $new_instance['youtube_title_new'];
		$instance['show_youtubebutton'] = isset($new_instance['show_youtubebutton']);
		$instance['youtubebutton_id'] = $new_instance['youtubebutton_id'];
		$instance['youtubebutton_layout'] = $new_instance['youtubebutton_layout'];
		$instance['youtubebutton_count'] = $new_instance['youtubebutton_color'];
		$instance['youtubebutton_color'] = $new_instance['youtubebutton_count'];
		return $instance;
	}
	function form( $instance ) {
	//Set up some default widget settings.
	$defaults = array( 'youtube_title_new' => __('Youtube Master', 'youtube_master'), 'youtube_title' => true, 'youtube_title_new' => false, 'show_youtubebutton' => false, 'youtubebutton_id' => false, 'youtubebutton_layout' => true, 'youtubebutton_color' => false, 'youtubebutton_count' => true );
	$instance = wp_parse_args( (array) $instance, $defaults );
	?>
		<br>
		<b>Check the buttons to be displayed:</b>
	<p>
	<img src="<?php echo plugins_url('images/techgasp-minilogo-16.png', dirname(__FILE__)); ?>" style="float:left; height:16px; vertical-align:middle;" />
	&nbsp;
	<input type="checkbox" <?php checked( (bool) $instance['youtube_title'], true ); ?> id="<?php echo $this->get_field_id( 'youtube_title' ); ?>" name="<?php echo $this->get_field_name( 'youtube_title' ); ?>" />
	<label for="<?php echo $this->get_field_id( 'youtube_title' ); ?>"><b><?php _e('Display Widget Title', 'youtube_master'); ?></b></label>
	</p>
	<p>
	<label for="<?php echo $this->get_field_id( 'youtube_title_new' ); ?>"><?php _e('Change Title:', 'youtube_master'); ?></label>
	<br>
	<input id="<?php echo $this->get_field_id( 'youtube_title_new' ); ?>" name="<?php echo $this->get_field_name( 'youtube_title_new' ); ?>" value="<?php echo $instance['youtube_title_new']; ?>" style="width:auto;" />
	</p>
<div style="background: url(<?php echo plugins_url('images/techgasp-hr.png', dirname(__FILE__)); ?>) repeat-x; height: 10px"></div>
	<p>
	<img src="<?php echo plugins_url('images/techgasp-minilogo-16.png', dirname(__FILE__)); ?>" style="float:left; height:16px; vertical-align:middle;" />
	&nbsp;
	<input type="checkbox" <?php checked( (bool) $instance['show_youtubebutton'], true ); ?> id="<?php echo $this->get_field_id( 'show_youtubebutton' ); ?>" name="<?php echo $this->get_field_name( 'show_youtubebutton' ); ?>" />
	<label for="<?php echo $this->get_field_id( 'show_youtubebutton' ); ?>"><b><?php _e('Youtube Subcribe Channel Button', 'youtube_master'); ?></b></label>
	</p>
	<p>
	<label for="<?php echo $this->get_field_id( 'youtubebutton_id' ); ?>"><?php _e('insert your Youtube Username or Channel ID:', 'youtube_master'); ?></label><br>
	<input id="<?php echo $this->get_field_id( 'youtubebutton_id' ); ?>" name="<?php echo $this->get_field_name( 'youtubebutton_id' ); ?>" value="<?php echo $instance['youtubebutton_id']; ?>" style="width:auto;" />
	</p>
	<div class="description"><a href="http://www.youtube.com/account_advanced/" target="_blank" title="Youtube Channel ID">Get my Channel ID</a></div>
	<p>
	<input type="checkbox" <?php checked( (bool) $instance['youtubebutton_layout'], true ); ?> id="<?php echo $this->get_field_id( 'youtubebutton_layout' ); ?>" name="<?php echo $this->get_field_name( 'youtubebutton_layout' ); ?>" />
	<label for="<?php echo $this->get_field_id( 'youtubebutton_layout' ); ?>"><b><?php _e('Activate Full Layout', 'youtube_master'); ?></b></label>
	</p>
	<p>
	<input type="checkbox" <?php checked( (bool) $instance['youtubebutton_color'], true ); ?> id="<?php echo $this->get_field_id( 'youtubebutton_color' ); ?>" name="<?php echo $this->get_field_name( 'youtubebutton_color' ); ?>" />
	<label for="<?php echo $this->get_field_id( 'youtubebutton_color' ); ?>"><b><?php _e('Activate Dark Theme', 'youtube_master'); ?></b></label>
	</p>
	<p>
	<input type="checkbox" <?php checked( (bool) $instance['youtubebutton_count'], true ); ?> id="<?php echo $this->get_field_id( 'youtubebutton_count' ); ?>" name="<?php echo $this->get_field_name( 'youtubebutton_count' ); ?>" />
	<label for="<?php echo $this->get_field_id( 'youtubebutton_count' ); ?>"><b><?php _e('Activate Bubble Count', 'youtube_master'); ?></b></label>
	</p>
<div style="background: url(<?php echo plugins_url('images/techgasp-hr.png', dirname(__FILE__)); ?>) repeat-x; height: 10px"></div>
	<p>
	<img src="<?php echo plugins_url('images/techgasp-minilogo-16.png', dirname(__FILE__)); ?>" style="float:left; width:16px; vertical-align:middle;" />
	&nbsp;
	<b>Youtube Master Website</b>
	</p>
	<p><a class="button-secondary" href="http://wordpress.techgasp.com/youtube-master/" target="_blank" title="Youtube Master Info Page">Info Page</a> <a class="button-secondary" href="http://wordpress.techgasp.com/youtube-master-documentation/" target="_blank" title="Youtube Master Documentation">Documentation</a> <a class="button-primary" href="http://wordpress.techgasp.com/youtube-master/" target="_blank" title="Youtube Master Wordpress">Get Add-ons</a></p>
	<?php
	}
 }
?>

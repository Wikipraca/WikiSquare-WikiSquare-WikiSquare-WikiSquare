<?php

/*-----------------------------------------------------------------------------------*/
/* Flickr Class
/*-----------------------------------------------------------------------------------*/

class wap8_flickr {

	// sanitize double quotes
	public static function wap8_flickr_cleanup( $s = null ) {
		if ( !$s ) return false;

    	else {
    		return str_replace( '"', '', $s );
    	}
	}

	// return Flickr URL based on image size
	public static function wap8_flickr_photo( $url, $size ) {

		$url   = explode( '/', $url );
		$photo = array_pop( $url );

		switch( $size ) {

			case 'square':
				$r = preg_replace( '/(_(s|q|t|m|n|c|b))?\./i', '_s.', $photo );
				break;
	
			case 'lsquare':
				$r = preg_replace( '/(_(s|q|t|m|n|c|b))?\./i', '_q.', $photo );
				break;

			case 'thumb':
				$r = preg_replace( '/(_(s|q|t|m|n|c|b))?\./i', '_t.', $photo );
				break;

			case 'small':
				$r = preg_replace( '/(_(s|q|t|m|n|c|b))?\./i', '_m.', $photo );
				break;

			case 'smalln':
				$r = preg_replace( '/(_(s|q|t|m|n|c|b))?\./i', '_n.', $photo );
				break;

			case 'mediumc':
				$r = preg_replace( '/(_(s|q|t|m|n|c|b))?\./i', '_c.', $photo );
				break;

			case 'large':
				$r = preg_replace( '/(_(s|q|t|m|n|c|b))?\./i', '_b.', $photo );
				break;

			default: // medium
				$r = preg_replace( '/(_(s|q|t|m|n|c|b))?\./i', '.', $photo );
				break;

			}

		$url[] = $r;

    	return implode( '/', $url );

    }

	// find first image
	public static function wap8_find_flickr_photo( $data ) {
		preg_match_all( '/<img src="([^"]*)"([^>]*)>/i', $data, $m );
		return $m[1][0];
	}

}

/*-----------------------------------------------------------------------------------*/
/* Flickr Me Widget
/*-----------------------------------------------------------------------------------*/

add_action( 'widgets_init', 'wap8_flickr_me_widget', 10 );

/**
 * Flickr Me Widget
 *
 * Register the Flickr Me widget.
 *
 * @package Flickr Me
 * @version 1.0.0
 * @since 1.0.5 Updated widget to be compatible with WordPress 4.3
 * @author Heavy Heavy <@heavyheavyco>
 *
 */

function wap8_flickr_me_widget() {
	register_widget( 'wap8_Flickr_Me_Widget' );
}

/*-----------------------------------------------------------------------------------*/
/* Extend WP_Widget by adding This Widget Class
/*-----------------------------------------------------------------------------------*/

class wap8_Flickr_Me_Widget extends WP_Widget {

	// widget setup
	function wap8_Flickr_Me_Widget() {
		$widget_ops = array(
			'classname'   => 'wap8_flickr_me_widget',
			'description' => __( 'Display recent images from a designated Flickr account.', 'flickr-me' ),
			);
		
		parent::__construct(
            'wap8-flickr-me-widget',
            __( 'Flickr Me', 'flickr-me' ),
            $widget_ops
        );	
	}

	// widget output
	function widget( $args, $instance ) {

		extract( $args );

		// saved widget settings
		$title        = isset( $instance['title'] ) ? $instance['title'] : __( 'Flickr Feed', 'flickr-me' );
		$title        = apply_filters( 'widget_title', $title );
		$flickr_id    = isset( $instance['flickr_id'] ) ? $instance['flickr_id'] : '';
		$thumb        = isset( $instance['flickr_thumb'] ) ? $instance['flickr_thumb'] : 'lsquare';
		$flickr_title = isset( $instance['flickr_title'] ) ? $instance['flickr_title'] : 0;
		$flickr_group = isset( $instance['flickr_group'] ) ? $instance['flickr_group'] : 0;
		$flickr_count = isset( $instance['flickr_count'] ) ? $instance['flickr_count'] : 5;

		include_once( ABSPATH . WPINC . '/feed.php' ); // load feed.php

		// determine if this is a group feed or not
		if ( $flickr_group == 1 ) { // if a group feed
			$rss = fetch_feed( 'https://api.flickr.com/services/feeds/groups_pool.gne?id=' . $flickr_id . '&lang=en-us&format=rss_200' );
		} else { // if not a group feed
			$rss = fetch_feed( 'https://api.flickr.com/services/feeds/photos_public.gne?id=' . $flickr_id . '&lang=en-us&format=rss_200' );
		}

		echo $before_widget; // echo HTML set in register_sidebar by the currently active theme

		if ( !empty( $title ) ) { // if this widget has a title

			echo $before_title . esc_html( $title ) . $after_title; // display the title wrapped with the HTML set by the currently active theme

		}

		$maxitems = $rss->get_item_quantity( $flickr_count );

		$rss_items = $rss->get_items( 0, $maxitems );

		if ( is_wp_error( $rss ) ) {
			$error_string = $rss->get_error_message();
			echo "<div class='error'><p>" . $error_string . "</p></div>";
			} else {
		?>

		<div class="flickr-me-feed"><!-- Begin .flickr-me-feed -->

			<?php if ( $maxitems == 0 ) echo '<p>' . __( 'No images found.', 'flickr-me' ) . '</p>';

			else

			foreach ( $rss_items as $item ) :

  				$url       = wap8_flickr::wap8_find_flickr_photo( $item->get_description() );
  				$title     = wap8_flickr::wap8_flickr_cleanup( $item->get_title() );
  				$thumb_url = wap8_flickr::wap8_flickr_photo( $url, $thumb );

  				if ( $thumb == 'lsquare' ) {
	  				$classes = 'flickr-me-grid';
  				} else {
	  				$classes = 'flickr-me-stacked';
  				} ?>

  				<a class="<?php echo esc_attr( $classes ); ?>" href="<?php echo esc_url( $item->get_permalink() ); ?>" title="<?php echo esc_attr( $title ); ?>" target="_blank">
					<img src="<?php echo esc_url( $thumb_url ); ?>" alt="<?php echo esc_attr( $title ); ?>" />
					<?php if ( $thumb != 'lsquare' && $flickr_title == 1 ) { echo '<span class="flickr-title">' . esc_html( $title ) . '</span>'; } ?>
				</a>

			<?php endforeach; ?>	
		</div><!-- End .flickr-feed -->	

		<?php }

		echo $after_widget;		

	}

	// update widget
	function update( $new_instance, $old_instance ) {

		$instance                 = $old_instance;
		$instance['title']        = strip_tags( $new_instance['title'] );
		$instance['flickr_id']    = strip_tags( $new_instance['flickr_id'] );
		$instance['flickr_title'] = isset( $new_instance['flickr_title'] );
		$instance['flickr_thumb'] = $new_instance['flickr_thumb'];
		$instance['flickr_group'] = isset( $new_instance['flickr_group'] );
		$instance['flickr_count'] = absint( $new_instance['flickr_count'] );

		return $instance;

	}

	// widget form
	function form( $instance ) {
		$defaults = array(
			'title'        => __( 'Flickr Feed', 'flickr-me' ),
			'flickr_count' => 5,
		);
		$instance = wp_parse_args( ( array ) $instance, $defaults );

		if ( ( int ) $instance['flickr_count'] == 0 ) {
			( int ) $instance['flickr_count'] = 1;
		} ?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title', 'flickr-me' ); ?></label><br />
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'flickr_id' ); ?>"><?php _e( 'Flickr User or Group ID', 'flickr-me' ); ?> &#40;<a href="<?php echo esc_url( 'http://idgettr.com/' ); ?>" target="_blank" title="<?php esc_attr_e( 'Find your Flickr ID using idGettr', 'flickr-me' ); ?>">idGettr</a>&#41;</label><br />
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'flickr_id' ); ?>" name="<?php echo $this->get_field_name( 'flickr_id' ); ?>" value="<?php echo esc_attr( isset( $instance['flickr_id'] ) ? $instance['flickr_id'] : '' ); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'flickr_thumb' ); ?>"><?php _e( 'Thumbnail Size', 'flickr-me' ); ?></label><br />
			<select class="widefat" id="<?php echo $this->get_field_id( 'flickr_thumb' ); ?>" name="<?php echo $this->get_field_name( 'flickr_thumb' ); ?>">
			<?php
				$options = array(
					'lsquare' => __( 'Large Square 150 x 150', 'flickr-me' ),
					'small'   => __( 'Small 240 x 180', 'flickr-me' ),
					'smalln'  => __( 'Small 320 x 240', 'flickr-me' ),
				);

				foreach ( $options as $key => $value ) {
					printf( '<option value="%1$s" %2$s>%3$s</option>', esc_attr( $key ), selected( $instance['flickr_thumb'], $key ), esc_html( $value ) );
				}
			?>
			</select>
		</p>

		<p>
			<input id="<?php echo $this -> get_field_id( 'flickr_title' ); ?>" name="<?php echo $this->get_field_name( 'flickr_title' ); ?>" type="checkbox" <?php checked( isset( $instance['flickr_title'] ) ? $instance['flickr_title'] : 0 ); ?> />&nbsp;<label for="<?php echo $this -> get_field_id( 'flickr_title' ); ?>"><?php _e( 'Display title with small thumbnail', 'flickr-me' ); ?></label>
		</p>

		<p>
			<input id="<?php echo $this -> get_field_id( 'flickr_group' ); ?>" name="<?php echo $this->get_field_name( 'flickr_group' ); ?>" type="checkbox" <?php checked( isset( $instance['flickr_group'] ) ? $instance['flickr_group'] : 0 ); ?> />&nbsp;<label for="<?php echo $this -> get_field_id( 'flickr_group' ); ?>"><?php _e( 'This is a Flickr Group stream', 'flickr-me' ); ?></label>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'flickr_count' ); ?>"><?php _e( 'Images to Show', 'flickr-me' ); ?></label>
			<input type="number" min="1" max="20" id="<?php echo $this->get_field_id( 'flickr_count' ); ?>" name="<?php echo $this->get_field_name( 'flickr_count' ); ?>" value="<?php echo $instance['flickr_count'];?>" size="2" /> <small><?php _e( 'Max: 20', 'flickr-me' ); ?></small>
		</p>

		<?php	
	}

}
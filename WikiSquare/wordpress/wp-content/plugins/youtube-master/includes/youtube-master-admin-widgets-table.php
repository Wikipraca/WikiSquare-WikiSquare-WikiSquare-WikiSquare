<?php
if(!class_exists('WP_List_Table')){
	require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );
}
class youtube_master_admin_widgets_table extends WP_List_Table {
	/**
	 * Display the rows of records in the table
	 * @return string, echo the markup of the rows
	 */
	function display() {
?>
<table class="widefat fixed" cellspacing="0">
	<thead>
		<tr>
			<th id="columnname" class="manage-column column-columnname" scope="col" width="300"><legend><h3><img src="<?php echo plugins_url('images/techgasp-minilogo-16.png', dirname(__FILE__)); ?>" style="float:left; height:16px; vertical-align:middle;" /><?php _e('&nbsp;Screenshot', 'youtube_master'); ?></h3></legend></th>
			<th id="columnname" class="manage-column column-columnname" scope="col"><h3><img src="<?php echo plugins_url('images/techgasp-minilogo-16.png', dirname(__FILE__)); ?>" style="float:left; height:16px; vertical-align:middle;" /><?php _e('&nbsp;Description', 'youtube_master'); ?></h3></legend></th>
		</tr>
	</thead>

	<tfoot>
		<tr>
			<th class="manage-column column-columnname" scope="col" width="300"><a class="button-primary" href="<?php echo get_site_url(); ?>/wp-admin/widgets.php" title="To Widgets Page" style="float:left;">To Widgets Page</a></p></th>
			<th class="manage-column column-columnname" scope="col"><a class="button-primary" href="<?php echo get_site_url(); ?>/wp-admin/widgets.php" title="To Widgets Page" style="float:right;">To Widgets Page</a></p></th>
		</tr>
	</tfoot>

	<tbody>
		<tr class="alternate">
			<td class="column-columnname" width="300" style="vertical-align:middle"><img src="<?php echo plugins_url('images/techgasp-youtubemaster-admin-widget-buttons.png', dirname(__FILE__)); ?>" alt="<?php echo get_option('youtube_master_name'); ?>" align="left" width="300px" height="135px" style="padding:5px;"/></td>
			<td class="column-columnname"style="vertical-align:middle"><h3>Youtube Buttons Widget</h3><p>The perfect widget to make your Youtube channel grow exponentially.</p><p>We packed the Youtube Subscribe Channel button with <b>Full Layout</b> that shows the Youtube User Avatar or profile picture and <b>Default Layout</b> that only shows subscribe button and bubble count. This widget works great when published under any of the widget players.</p><p>Navigate to your wordpress widgets page and start using it.</p></td>
		</tr>
		<tr>
			<td class="column-columnname" width="300" style="vertical-align:middle"><img src="<?php echo plugins_url('images/techgasp-youtubemaster-admin-widget-video.png', dirname(__FILE__)); ?>" alt="<?php echo get_option('youtube_master_name'); ?>" align="left" width="300px" height="135px" style="padding:5px;"/></td>
			<td class="column-columnname"style="vertical-align:middle"><h3>Youtube Responsive Video Widget</h3><p>Fast clean html5 code advanced youtube single video player, perfect Google SEO.</p><p>Enterprise player free of Ajax and Javascript specially designed for professional, commercial, sales videos. Packed with option to turn off Related Videos when your video ends.</p><p>Check Add-ons page.</p></td>
		</tr>
		<tr class="alternate">
			<td class="column-columnname" width="300" style="vertical-align:middle"><img src="<?php echo plugins_url('images/techgasp-youtubemaster-admin-widget-playlist.png', dirname(__FILE__)); ?>" alt="<?php echo get_option('youtube_master_name'); ?>" align="left" width="300px" height="135px" style="padding:5px;"/></td>
			<td class="column-columnname"style="vertical-align:middle"><h3>Youtube Responsive Playlist Widget</h3><p>This is the "top of the line advanced Youtube Playlist Widget", use it for Supreme Google SEO and outstanding professional presentations. This advanced playlist player will take literally seconds of wordpress website page load times without any use of Javascript or Ajax.</p><p>Check Add-ons page.</p></td>
		</tr>
		
		
		<tr>
			<td class="column-columnname" width="300" style="vertical-align:middle"><img src="<?php echo plugins_url('images/techgasp-youtubemaster-admin-widget-webcam.png', dirname(__FILE__)); ?>" alt="<?php echo get_option('youtube_master_name'); ?>" align="left" width="300px" height="135px" style="padding:5px;"/></td>
			<td class="column-columnname"style="vertical-align:middle"><h3>Youtube Webcam Upload Widget</h3><p>Let's you record webcam clips and upload them to your Youtube Channel all from within your wordpress website.</p><p>Check Add-ons page.</p></td>
		</tr>
		
		
		
		<tr class="alternate">
			<td class="column-columnname" width="300" style="vertical-align:middle"><img src="<?php echo plugins_url('images/techgasp-admin-widget-blank.png', dirname(__FILE__)); ?>" alt="<?php echo get_option('amazon_master_name'); ?>" align="left" width="300px" height="135px" style="padding:5px;"/></td>
			<td class="column-columnname"style="vertical-align:middle"><h3>Suggest a Widget</h3><p>Would you like to see your widget idea added to this plugin? Just drop us a line and we will make sure it gets included in the next release.</p><p>Get in touch with TechGasp.</p></td>
		</tr>
	</tbody>
</table>
<?php
		}
}
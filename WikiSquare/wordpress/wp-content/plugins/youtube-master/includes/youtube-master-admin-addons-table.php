<?php
if(!class_exists('WP_List_Table')){
	require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );
}
class youtube_master_admin_addons_table extends WP_List_Table {
	/**
	 * Display the rows of records in the table
	 * @return string, echo the markup of the rows
	 */
	function display() {
	$path = ABSPATH . 'wp-content/plugins/youtube-master-addons/';
	if ( is_plugin_active( 'youtube-master-addons/youtube-master-addons.php' ) && file_exists($path) ) {
		$youtube_master_addon = "yes";
		$youtube_master_addon_get = '<b>All add-ons Installed</b>';
	}
	else{
		$youtube_master_addon = "no";
		$youtube_master_addon_get = '<a class="button-primary" href="http://wordpress.techgasp.com/youtube-master/" target="_blank" title="Get Add-ons" style="float:left;">Get Add-ons</a>';
	}
?>
<table class="widefat fixed" cellspacing="0">
	<thead>
		<tr>
			<th id="columnname" class="manage-column column-columnname" scope="col" width="300"><legend><h3><img src="<?php echo plugins_url('images/techgasp-minilogo-16.png', dirname(__FILE__)); ?>" style="float:left; height:16px; vertical-align:middle;" /><?php _e('&nbsp;Screenshot', 'youtube_master'); ?></h3></legend></th>
			<th id="columnname" class="manage-column column-columnname" scope="col"><h3><img src="<?php echo plugins_url('images/techgasp-minilogo-16.png', dirname(__FILE__)); ?>" style="float:left; height:16px; vertical-align:middle;" /><?php _e('&nbsp;Description', 'youtube_master'); ?></h3></legend></th>
			<th id="columnname" class="manage-column column-columnname" scope="col"><h3><img src="<?php echo plugins_url('images/techgasp-minilogo-16.png', dirname(__FILE__)); ?>" style="float:left; height:16px; vertical-align:middle;" /><?php _e('&nbsp;Installed', 'youtube_master'); ?></h3></legend></th>
		</tr>
	</thead>

	<tfoot>
		<tr>
			<th class="manage-column column-columnname" scope="col" width="300"><?php echo $youtube_master_addon_get; ?></th>
			<th class="manage-column column-columnname" scope="col"></th>
			<th class="manage-column column-columnname" scope="col"></th>
		</tr>
	</tfoot>

	<tbody>
		<tr class="alternate">
			<td class="column-columnname" width="300" style="vertical-align:middle"><img src="<?php echo plugins_url('images/techgasp-youtubemaster-admin-addons-widget-buttons.png', dirname(__FILE__)); ?>" alt="<?php echo get_option('youtube_master_name'); ?>" align="left" width="300px" height="139px" style="padding:5px;"/></td>
			<td class="column-columnname"style="vertical-align:middle"><h3>Youtube Buttons Widget</h3><p>The perfect widget to make your Youtube channel grow exponentially.</p><p>We packed the Youtube Subscribe Channel button with <b>Full Layout</b> that shows the Youtube User Avatar or profile picture and <b>Default Layout</b> that only shows subscribe button and bubble count. This widget works great when published under any of the widget players.</p><p>Navigate to your wordpress widgets page and start using it.</p></td>
			<td class="column-columnname" style="vertical-align:middle"><img src="<?php echo plugins_url('images/techgasp-check-yes.png', dirname(__FILE__)); ?>" alt="<?php echo get_option('youtube_master_name'); ?>" align="left" width="200px" height="121px" style="padding:5px;"/></td>
		</tr>
		<tr>
			<td class="column-columnname" width="300" style="vertical-align:middle"><img src="<?php echo plugins_url('images/techgasp-youtubemaster-admin-addons-widget-video.png', dirname(__FILE__)); ?>" alt="<?php echo get_option('youtube_master_name'); ?>" align="left" width="300px" height="139px" style="padding:5px;"/></td>
			<td class="column-columnname"style="vertical-align:middle"><h3>Youtube Responsive Video Widget</h3><p>Fast clean html5 code advanced youtube single video player, perfect Google SEO.</p><p>Enterprise player free of Ajax and Javascript specially designed for professional, commercial, sales videos. Packed with option to turn off Related Videos when your video ends.</p><p>Navigate to your wordpress widgets page and start using it.</p></td>
			<td class="column-columnname" style="vertical-align:middle"><img src="<?php echo plugins_url('images/techgasp-check-'.$youtube_master_addon.'.png', dirname(__FILE__)); ?>" alt="<?php echo get_option('youtube_master_name'); ?>" align="left" width="200px" height="121px" style="padding:5px;"/></td>
		</tr>
		<tr class="alternate">
			<td class="column-columnname" width="300" style="vertical-align:middle"><img src="<?php echo plugins_url('images/techgasp-youtubemaster-admin-addons-widget-playlist.png', dirname(__FILE__)); ?>" alt="<?php echo get_option('youtube_master_name'); ?>" align="left" width="300px" height="139px" style="padding:5px;"/></td>
			<td class="column-columnname"style="vertical-align:middle"><h3>Youtube Responsive Playlist Widget</h3><p>This is the "top of the line advanced Youtube Playlist Widget", use it for Supreme Google SEO and outstanding professional presentations. This advanced playlist player will take literally seconds of wordpress website page load times without any use of Javascript or Ajax.</p><p>Navigate to your wordpress widgets page and start using it.</p></td>
			<td class="column-columnname" style="vertical-align:middle"><img src="<?php echo plugins_url('images/techgasp-check-'.$youtube_master_addon.'.png', dirname(__FILE__)); ?>" alt="<?php echo get_option('youtube_master_name'); ?>" align="left" width="200px" height="121px" style="padding:5px;"/></td>
		</tr>
		<tr>
			<td class="column-columnname" width="300" style="vertical-align:middle"><img src="<?php echo plugins_url('images/techgasp-youtubemaster-admin-addons-widget-webcam.png', dirname(__FILE__)); ?>" alt="<?php echo get_option('youtube_master_name'); ?>" align="left" width="300px" height="139px" style="padding:5px;"/></td>
			<td class="column-columnname"style="vertical-align:middle"><h3>Youtube Webcam Upload Widget</h3><p>Let's you record webcam clips and upload them to your Youtube Channel all from within your wordpress website.</p><p>Navigate to your wordpress widgets page and start using it.</p></td>
			<td class="column-columnname" style="vertical-align:middle"><img src="<?php echo plugins_url('images/techgasp-check-'.$youtube_master_addon.'.png', dirname(__FILE__)); ?>" alt="<?php echo get_option('youtube_master_name'); ?>" align="left" width="200px" height="121px" style="padding:5px;"/></td>
		</tr>
		<tr class="alternate">
			<td class="column-columnname" width="300" style="vertical-align:middle"><img src="<?php echo plugins_url('images/techgasp-youtubemaster-admin-addons-shortcode-in.png', dirname(__FILE__)); ?>" alt="<?php echo get_option('youtube_master_name'); ?>" align="left" width="300px" height="139px" style="padding:5px;"/></td>
			<td class="column-columnname"style="vertical-align:middle"><h3>Individual Shortcode</h3><p>Youtube Master uses TechGasp Wordpress Framework. The <b>Individual Shortcode</b> allows you to have a different customized youtube buttons in each page or post. Easy to use it can be found when you edit a page or a post under the wordpress text editor. Once you have created your shortcode, Just insert the shortcode <b>[youtube-master]</b> anywhere inside that text.</p></td>
			<td class="column-columnname" style="vertical-align:middle"><img src="<?php echo plugins_url('images/techgasp-check-'.$youtube_master_addon.'.png', dirname(__FILE__)); ?>" alt="<?php echo get_option('youtube_master_name'); ?>" align="left" width="200px" height="121px" style="padding:5px;"/></td>
		</tr>
		<tr>
			<td class="column-columnname" width="300" style="vertical-align:middle"><img src="<?php echo plugins_url('images/techgasp-youtubemaster-admin-addons-shortcode-un.png', dirname(__FILE__)); ?>" alt="<?php echo get_option('youtube_master_name'); ?>" align="left" width="300px" height="139px" style="padding:5px;"/></td>
			<td class="column-columnname"style="vertical-align:middle"><h3>Universal Shortcode</h3><p>Youtube Master uses TechGasp Wordpress Framework. The <b>Universal Shortcode</b> allows you to have the same youtube buttons across different pages or posts. Easy to use it can be found right here under the Shortcodes menu. Once you have created your shortcode, Just insert the shortcode <b>[youtube-master-un]</b> anywhere inside the text of your pages or posts.</p></td>
			<td class="column-columnname" style="vertical-align:middle"><img src="<?php echo plugins_url('images/techgasp-check-'.$youtube_master_addon.'.png', dirname(__FILE__)); ?>" alt="<?php echo get_option('youtube_master_name'); ?>" align="left" width="200px" height="121px" style="padding:5px;"/></td>
		</tr>
		<tr class="alternate">
			<td class="column-columnname" width="300" style="vertical-align:middle"><img src="<?php echo plugins_url('images/techgasp-youtubemaster-admin-addons-updater.png', dirname(__FILE__)); ?>" alt="<?php echo get_option('youtube_master_name'); ?>" align="left" width="300px" height="139px" style="padding:5px;"/></td>
			<td class="column-columnname"style="vertical-align:middle"><h3>Advanced Updater</h3><p>The Advanced Updater allows you to easily Update / Upgrade your Advanced Plugin. You can instantly update your plugin after we release a new version with more goodies without having to wait for the nightly native wordpress updater that runs every 24/48 hours. Get it fresh, get it fast.</p></td>
			<td class="column-columnname" style="vertical-align:middle"><img src="<?php echo plugins_url('images/techgasp-check-'.$youtube_master_addon.'.png', dirname(__FILE__)); ?>" alt="<?php echo get_option('youtube_master_name'); ?>" align="left" width="200px" height="121px" style="padding:5px;"/></td>
		</tr>
		<tr>
			<td class="column-columnname" width="300" style="vertical-align:middle"><img src="<?php echo plugins_url('images/techgasp-youtubemaster-admin-addons-support.png', dirname(__FILE__)); ?>" alt="<?php echo get_option('youtube_master_name'); ?>" align="left" width="300px" height="139px" style="padding:5px;"/></td>
			<td class="column-columnname"style="vertical-align:middle"><h3>Award Winning Professional Support</h3><p>Need professional help deploying this plugin? TechGasp provides 24/7 award winning professional wordpress support for all advanced version costumers and replies to support tickets usually within minutes of being received. Support Us and we will Support You.</p></td>
			<td class="column-columnname" style="vertical-align:middle"><img src="<?php echo plugins_url('images/techgasp-check-'.$youtube_master_addon.'.png', dirname(__FILE__)); ?>" alt="<?php echo get_option('youtube_master_name'); ?>" align="left" width="200px" height="121px" style="padding:5px;"/></td>
		</tr>
	</tbody>
</table>
<?php
		}
}
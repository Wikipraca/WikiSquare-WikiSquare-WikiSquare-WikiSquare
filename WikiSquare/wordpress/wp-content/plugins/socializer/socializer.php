<?php
/*
Plugin Name: Socializer!
Version: 10.1
Plugin URI: http://www.thefreewindows.com/5598/socializer-share-wordpress-posts-pages/
Description: Socializer! is a free, fast, flexible, easy and very efficient plugin that will help your visitors share your posts on top social networks, including Facebook, Twitter, Google Plus, by eMail, even translate them, get HTML links, short links, and more! Check the <a href="http://www.thefreewindows.com/5598/socializer-share-wordpress-posts-pages/" target="_blank">Plugin Home</a>.
Author: TheFreeWindows
Author URI: http://www.thefreewindows.com
*/
	if (!empty($_SERVER['SCRIPT_FILENAME']) && basename(__file__) == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');
	if ( !defined('WP_CONTENT_URL') )
    		define( 'WP_CONTENT_URL', get_option('siteurl') . '/wp-content');
	error_reporting( error_reporting() & ~E_NOTICE );

if(! class_exists('Mobile_Detect')) {	
	require_once('mobile-detect.php');
	}
	$socdetect = new Mobile_Detect(); 
	$wp_scripts = new WP_Scripts();
	if (!is_admin()) {
	wp_enqueue_script("jquery");
	wp_deregister_script('facebooksdk');
	wp_register_script('facebooksdk', 'http://connect.facebook.net/en_US/all.js#xfbml=1');
	wp_enqueue_script("facebooksdk");
	wp_deregister_script('plusone');
	wp_register_script('plusone', 'https://apis.google.com/js/plusone.js');
	wp_enqueue_script("plusone");
	wp_deregister_script('twittersdk');
	wp_register_script('twittersdk', 'https://platform.twitter.com/widgets.js');
	wp_enqueue_script("twittersdk");
	}
	add_option('tfw_sposts', TRUE);	
	add_option('tfw_spages', TRUE);	
	add_option('tfw_sindarch', FALSE);	
	add_option('tfw_spbe', FALSE);	
	add_option('tfw_spaf', TRUE);	
	add_option('tfw_nowsize');
	add_option('tfw_floatsize');
	add_option('tfw_wsize');
	add_option('tfw_consize');
	add_option('tfw_moboption');
	add_option('tfw_stldiv', 'background: none; border: none; margin: 20px 5px 10px 5px; opacity: 1.0; border-spacing: 15px 5px; max-width: 500px;');
	add_option('tfw_stlwdiv', 'background: none; border: none; padding: 10px 5px 10px 9px; border-spacing: 15px 10px; margin: 5px;');
	add_option('tfw_stlfloatwdiv', 'box-shadow: 0 0 8px #D1D1D1; background: #F7F7F7; top: 35%; left: -1px; padding: 7px 11px 4px 7px; border-radius: 5px;');
	add_option('tfw_fbprof');
	add_option('tfw_twiprof');
	add_option('tfw_gooprof');
	add_option('tfw_myname');

function tfw_add_option_pages() {
	if (function_exists('add_options_page')) {
		add_options_page('Socializer!', 'Socializer!', 'manage_options', 'socializer!', 'tfw_options_page');
	}		
}
function tfw_options_page() {
	if (isset($_POST['info_update'])) {
		update_option('tfw_sposts', (bool)$_POST["tfw_sposts"]);
		update_option('tfw_spages', (bool)$_POST["tfw_spages"]);
		update_option('tfw_spbe', (bool)$_POST["tfw_spbe"]);
		update_option('tfw_spaf', (bool)$_POST["tfw_spaf"]);
		update_option('tfw_sindarch', (bool)$_POST["tfw_sindarch"]);
		update_option('tfw_stldiv', '' . (string)$_POST["tfw_stldiv"] . '');
		update_option('tfw_nowsize', '' . (string)$_POST["tfw_nowsize"] . '');
		update_option('tfw_floatsize', '' . (string)$_POST["tfw_floatsize"] . '');
		update_option('tfw_wsize', '' . (string)$_POST["tfw_wsize"] . '');
		update_option('tfw_consize', '' . (string)$_POST["tfw_consize"] . '');
		update_option('tfw_moboption', '' . (string)$_POST["tfw_moboption"] . '');
		update_option('tfw_stlwdiv', '' . (string)$_POST["tfw_stlwdiv"] . '');
		update_option('tfw_stlfloatwdiv', '' . (string)$_POST["tfw_stlfloatwdiv"] . '');
		update_option('tfw_fbprof', '' . (string)$_POST["tfw_fbprof"] . '');
		update_option('tfw_twiprof', '' . (string)$_POST["tfw_twiprof"] . '');
		update_option('tfw_gooprof', '' . (string)$_POST["tfw_gooprof"] . '');
		update_option('tfw_myname', '' . (string)$_POST["tfw_myname"] . '');					
		echo "<div id=\"message\" class=\"updated fade\"><p><strong>Configuration Updated!</strong></p></div>";
	} ?>
	
<div class="wrap" style="font-size:17px;padding:0 10pt 10pt 5pt;background:white;">

<h1 style="padding:15px 0 0 15px;margin-bottom:0;">


<a style="border:none;border:0;text-decoration:none;" href="http://www.socializer.info/" target="_blank"><img src="<?=WP_CONTENT_URL.'/plugins/'.plugin_basename(dirname(__FILE__)).'/'?>sclog.gif" style="border:none;border:0;padding-bottom:5px;" alt="Home of Socializer!"></a>

<span style="font-size:18px;font-weight:normal;"><a style="color:#2b95ff;text-decoration:none;letter-spacing:2px;" href="http://www.socializer.info/share.asp?docurl=http://www.thefreewindows.com/5598/socializer-share-wordpress-posts-pages/&doctitle=Socializer! for Wordpress" target="_blank">Share the Socializer!</a> &nbsp;&&nbsp; <a style="color:#2b95ff;text-decoration:none;letter-spacing:2px;" target="_blank" href="http://www.socializer.info/follow.asp?docurlf=https://www.facebook.com/TheFreeWindows&docurlt=https://twitter.com/TheFreeWindows&docurlg=https://plus.google.com/107469524242742386932&myname=TheFreeWindows">Follow!</a></span>
</h1>

<h2>&nbsp;  </h2>

<form method="post" action="<?php echo $_SERVER["REQUEST_URI"]; ?>">

	<input type="hidden" name="info_update" id="info_update" value="true" />

	<fieldset class="options"> 
	<legend style="font-size:22px;letter-spacing:7px;margin-left:5px;margin-top:23px;">		
		
		 &nbsp; Settings</legend>

<div style="padding: 20px 0 0 30px">
		
 When you finish, don't forget to save your settings (at the end of this page)

</div>


<div style="padding: 20px;">


<div style="margin:10px 0;padding:45px;box-shadow: 0 0 14px #DFDFDF;line-height:155%;">


<table><tr><td valign="top" align="left" nowrap>

<img src="<?=WP_CONTENT_URL.'/plugins/'.plugin_basename(dirname(__FILE__)).'/'?>screenshot-3.gif" style="border:none;border:0;margin:0 15px 0 0;">
<img src="<?=WP_CONTENT_URL.'/plugins/'.plugin_basename(dirname(__FILE__)).'/'?>screenshot-5.gif" style="border:none;border:0;margin:25px 20px 30px 0;">

</td>
<td valign="top">
	
<div style="margin-left:22px;margin-top:22px;line-height:170%;">

			<b>The FLOATING Bar</b> &nbsp;<span style="color:grey;"></span>

<br>&nbsp;<br>

<a href="widgets.php" target="_blank" style="text-decoration:none;color:#2b95ff;">Activate</a> the FLOATING bar dropping it anywhere in a global Sidebar; its real position is configured right here.
<br>&nbsp;<br>

<label><input type="radio" name="tfw_floatsize" value="large" <?php if(get_option('tfw_floatsize')=="large") echo "checked";?>> <span style="letter-spacing:1px;">Display counts</span> in the Floating bar</label>
<br>
<label><input type="radio" name="tfw_floatsize" value="small" <?php if(get_option('tfw_floatsize')=="small") echo "checked";?>> <span style="letter-spacing:1px;">Hide counts</span>  (the bar becomes smaller)</label>
<br>&nbsp;<br>


<b>Style Properties of the Floating Bar</b> &nbsp; <img src="<?=WP_CONTENT_URL.'/plugins/'.plugin_basename(dirname(__FILE__)).'/'?>csseditor.png" style="border:none;border:0;margin:0;height:35px;"> <a href="http://www.thefreewindows.com/socializer-style-editor/floating.php" target="_blank" style="text-decoration:none;color:#2b95ff;">Customize with the Style Editor</a>
<br>
<input type="text" style="letter-spacing:1px;padding:7px;color:#D26231;margin-left:22px;font-size:17px;height:42px;margin-top:9px;width:80%;" name="tfw_stlfloatwdiv" value="<?php echo htmlspecialchars(stripslashes(get_option('tfw_stlfloatwdiv'))) ?>">
<br>&nbsp;<br>

<label><input type="radio" name="tfw_moboption" value="showmob" <?php if(get_option('tfw_moboption')=="showmob") echo "checked";?>> <span style="letter-spacing:1px;">Show</span> the floating icons even on mobile phones if possible</label><br>

<label><input type="radio" name="tfw_moboption" value="hidemob" <?php if(get_option('tfw_moboption')=="hidemob") echo "checked";?>> <span style="letter-spacing:1px;">Do not show</span> on mobiles</label>

<div style="margin:33px 0 0 0;font-size:15px;">
Please note that for mobile detection to work your Cache plugin should serve dynamic content to mobiles

</div>

</div>

</td></tr></table>

</div>



<br>



<div style="margin:10px 0;padding:45px;box-shadow: 0 0 14px #DFDFDF;line-height:155%;">

			<b>The SIDEBAR Widgets</b> &nbsp;<span style="color:grey;">&raquo; Activate at <a href="widgets.php" target="_blank" style="text-decoration:none;color:#2b95ff;">Appearance &gt; Widgets</a></span>

<div style="margin:33px;">
	
<img src="<?=WP_CONTENT_URL.'/plugins/'.plugin_basename(dirname(__FILE__)).'/'?>screenshot-2.gif" style="border:none;border:0;margin-bottom:15px;">
<img src="<?=WP_CONTENT_URL.'/plugins/'.plugin_basename(dirname(__FILE__)).'/'?>screenshot-6.gif" style="border:none;border:0;margin-bottom:45px;padding-left:54px;">

</div>



<label style="margin-left:20px;"><input type="radio" name="tfw_wsize" value="large" <?php if(get_option('tfw_wsize')=="large") echo "checked";?>> <span style="letter-spacing:1px;">Display counts</span> in the widgets</label>
	<br>
<label style="margin-left:20px;"><input type="radio" name="tfw_wsize" value="small" <?php if(get_option('tfw_wsize')=="small") echo "checked";?>> <span style="letter-spacing:1px;">Hide counts</span> (the widgets become smaller)</label><br>


<div style="margin-left:22px;margin-top:22px;">
	<br>

<b>Style Properties of Sidebar Widgets</b> &nbsp; <img src="<?=WP_CONTENT_URL.'/plugins/'.plugin_basename(dirname(__FILE__)).'/'?>csseditor.png" style="border:none;border:0;margin:0;height:35px;"> <a href="http://www.thefreewindows.com/socializer-style-editor/sidebar.php" target="_blank" style="text-decoration:none;color:#2b95ff;">Customize with the Style Editor</a><br>
<input type="text" style="letter-spacing:1px;padding:7px;color:#D26231;margin-left:22px;font-size:17px;height:42px;margin-top:9px;width:80%;" name="tfw_stlwdiv" value="<?php echo htmlspecialchars(stripslashes(get_option('tfw_stlwdiv'))) ?>">
<br>&nbsp;<br>

</div>
</div>


<br>


<div style="margin:10px 0;padding:45px;box-shadow: 0 0 14px #DFDFDF;line-height:155%;">

			<b>The CONTENT and SHORTCODE bars</b>

<br>&nbsp;<br>

<img src="<?=WP_CONTENT_URL.'/plugins/'.plugin_basename(dirname(__FILE__)).'/'?>screenshot-1.gif" style="border:none;border:0;margin-bottom:5px;margin-bottom:14px;"><br>

<img src="<?=WP_CONTENT_URL.'/plugins/'.plugin_basename(dirname(__FILE__)).'/'?>screenshot-4.gif" style="border:none;border:0;margin-bottom:5px;margin-left:177px;"><br>&nbsp;<br>


<div style="margin-left:22px;margin-top:2px;">

<div style="padding:8px;background:#F7F7F7;border:1px solid #dddddd;">

<label><input type="radio" name="tfw_consize" value="large" <?php if(get_option('tfw_consize')=="large") echo "checked";?>> <span style="letter-spacing:1px;">Display counts</span> in Content bars</label>

 &nbsp;  &nbsp;  
<label><input type="radio" name="tfw_consize" value="small" <?php if(get_option('tfw_consize')=="small") echo "checked";?>> <span style="letter-spacing:1px;">Hide counts</span></label>
</div>

<br>

<label><input type="checkbox" name="tfw_sposts" value="checkbox" <?php if (get_option('tfw_sposts')) echo "checked='checked'"; ?>/> Display on Posts</label>
 &nbsp;  &nbsp;  
<label><input type="checkbox" name="tfw_spages" value="checkbox" <?php if (get_option('tfw_spages')) echo "checked='checked'"; ?>/> On Pages</label>
 &nbsp;  &nbsp; 
&mdash; &nbsp;&nbsp; <label><input type="checkbox" name="tfw_spbe" value="checkbox" <?php if (get_option('tfw_spbe')) echo "checked='checked'"; ?>/> Above content</label>
 &nbsp;  &nbsp;
<label><input type="checkbox" name="tfw_spaf" value="checkbox" <?php if (get_option('tfw_spaf')) echo "checked='checked'"; ?>/> Below content</label>

<div style="margin-top:25px;padding: 25px 0 0 0;border-top:1px dashed grey;">

<label style="opacity:0.7;"><input type="checkbox" name="tfw_sindarch" value="checkbox" <?php if (get_option('tfw_sindarch')) echo "checked='checked'"; ?>/> Display on Archives (Home / Index, Categories, Tags, Dates &mdash; below content)</label>

	</div>


<br>&nbsp;<br>


<b>Style Properties</b> &nbsp; <img src="<?=WP_CONTENT_URL.'/plugins/'.plugin_basename(dirname(__FILE__)).'/'?>csseditor.png" style="border:none;border:0;margin:0;height:35px;"> <a href="http://www.thefreewindows.com/socializer-style-editor/content.php" target="_blank" style="text-decoration:none;color:#2b95ff;">Customize with the Style Editor</a>
<br>
<input type="text" style="letter-spacing:1px;padding:7px;color:#D26231;margin-left:22px;margin-top:9px;font-size:17px;height:42px;width:80%;" name="tfw_stldiv" value="<?php echo htmlspecialchars(stripslashes(get_option('tfw_stldiv'))) ?>">
<br>&nbsp;<br>


The same style applies also to instances you may activate anywhere using the Shortcode&nbsp; <span style="color:grey;letter-spacing:2px;"> [SocializerNow]</span>
<br>&nbsp;<br>


<label style="margin-left:50px;"><input type="radio" name="tfw_nowsize" value="large" <?php if(get_option('tfw_nowsize')=="large") echo "checked";?>> <span style="letter-spacing:1px;">Display counts</span> in Shortcode instances</label>
 &nbsp;  &nbsp;  
<label style="margin-left:20px;"><input type="radio" name="tfw_nowsize" value="small" <?php if(get_option('tfw_nowsize')=="small") echo "checked";?>> <span style="letter-spacing:1px;">Hide counts</span></label><br>	
	
</div>
</div>


<br>


<div style="margin:10px 0;padding:45px;box-shadow: 0 0 14px #DFDFDF;line-height:155%;">

<img src="<?=WP_CONTENT_URL.'/plugins/'.plugin_basename(dirname(__FILE__)).'/'?>follow.png" style="border:none;border:0;margin-bottom:15px;">

<br>

			<b>The FOLLOW button</b>
<br>

<div style="margin-left:22px;margin-top:22px;">
	
If you have a personal or business page in Facebook, Twitter or Google Plus, you can paste here the address of each of your profiles in these networks to let Socializer! add a "Follow" button among the sharing buttons.
<br>&nbsp;<br>

FACEBOOK Profile URL <span style="color:grey;">&mdash; e.g. https://www.facebook.com/TheFreeWindows</span><br>
<input type="text" style="margin-top:5px;letter-spacing:1px;padding:7px;color:#D26231;margin-left:22px;font-size:17px;height:42px;width:80%;" name="tfw_fbprof" value="<?php echo htmlspecialchars(stripslashes(get_option('tfw_fbprof'))) ?>">
<br>&nbsp;<br>

TWITTER Profile URL <span style="color:grey;">&mdash; e.g. https://twitter.com/TheFreeWindows</span><br>
<input type="text" style="margin-top:5px;letter-spacing:1px;padding:7px;color:#D26231;margin-left:22px;font-size:17px;height:42px;width:80%;" name="tfw_twiprof" value="<?php echo htmlspecialchars(stripslashes(get_option('tfw_twiprof'))) ?>">
<br>&nbsp;<br>

GOOGLE PLUS Profile URL <span style="color:grey;">&mdash; e.g. https://plus.google.com/107469524242742386932</span><br>
<input type="text" style="margin-top:5px;letter-spacing:1px;padding:7px;color:#D26231;margin-left:22px;font-size:17px;height:42px;width:80%;" name="tfw_gooprof" value="<?php echo htmlspecialchars(stripslashes(get_option('tfw_gooprof'))) ?>">
<br>&nbsp;<br>

<div style="padding:28px 33px 33px 33px;margin:10px 0 0 0;color:grey;background:#FBFBFB;border:1px solid #FBFBFB;">
You can write here something simple, such as Your Name, especially if your account name is ugly (it contains only numbers, etc):<br>
<input type="text" style="margin-top:12px;letter-spacing:1px;padding:7px;color:#D26231;margin-left:22px;font-size:17px;height:42px;width:40%;" name="tfw_myname" value="<?php echo htmlentities(get_option('tfw_myname')) ?>">
</div>

</div>
</div>


	</div>

	</fieldset>


<div style="margin:53px;line-height:177%;font-size:15px;">

// To experiment with adjustments on your main style sheet, you can define a <b>Socializer</b>, <b>SocializerW</b>, <b>SocializerFloatW</b>, and <b>SocializerNow</b> css ID (#) tag for the content bars, the sidebar widgets, the floating bar and the shortcode instances respectively.  If you are not very familiar with CSS, don't worry and just use the <a href="http://www.thefreewindows.com/socializer-style-editor/index.php" target="_blank" style="text-decoration:none;color:#2b95ff;">Socializer! Style Editor</a> //
<br>&nbsp;<br>
 
Please note: some of your changes won't be activated before the cache of your blog is cleared. 
<br>For cosmetic (style) changes to appear, you may need also to refresh your browser (use Ctrl+F5 or Ctrl+R).

</div>



<div class="submit" style="background:#F5F5F5;padding:7pt;margin:32px 42px 32px 22px;-moz-border-radius: 17px;border-radius: 17px;">

<input style="cursor:pointer;letter-spacing:7px;color:#2b95ff;-moz-border-radius: 17px;border-radius: 17px;border:1px solid white;background:white;padding:5px 19px;font-size:18px;" type="submit" name="info_update" value="<?php _e(' Save your settings '); ?>" /> &nbsp;  &nbsp;&nbsp;  &raquo;&nbsp; <a style="color:#2b95ff;text-decoration:none;letter-spacing:2px;font-size:18px;" href="http://www.socializer.info/share.asp?docurl=http://www.thefreewindows.com/5598/socializer-share-wordpress-posts-pages/&doctitle=Socializer! for Wordpress" target="_blank">Share the Socializer!</a> &nbsp;&nbsp;  &raquo;&nbsp; <a style="color:#2b95ff;text-decoration:none;letter-spacing:2px;font-size:18px;" target="_blank" href="http://www.socializer.info/follow.asp?docurlf=https://www.facebook.com/TheFreeWindows&docurlt=https://twitter.com/TheFreeWindows&docurlg=https://plus.google.com/107469524242742386932&myname=TheFreeWindows">Follow!</a>

</div>

</form>


<div style="padding: 10px 20px 0 45px;line-height:199%;">

 &nbsp;&nbsp;  &raquo; <a style="color:#2b95ff;text-decoration:none;letter-spacing:1px;" href="http://www.thefreewindows.com/5598/socializer-share-wordpress-posts-pages/" target="_blank">Plugin Page</a> &nbsp;&&nbsp; <a style="color:#2b95ff;text-decoration:none;letter-spacing:1px;" href="http://www.thefreewindows.com/6035/socializer-wordpress-frequent-questions-answers/" target="_blank">FQA</a>
<br>
&nbsp;&nbsp;  &raquo; Check the free <a style="color:#2b95ff;text-decoration:none;letter-spacing:1px;" href="http://www.thefreewindows.com/15816/reveal-posts-visitors-share-social-networks/" target="_blank">Social Share Motivator</a> plugin, for a different sharing policy
<br>&nbsp;<br>

<div align="center" style="text-align:center;margin-top:30px;"> &nbsp;  &nbsp;  &nbsp; <a style="color:silver;text-decoration:none;font-weight:bold;font-size:20pt;letter-spacing:3px;" href="http://www.socializer.info/" target="_blank">www.socializer.info</a></div>

</div>	

</div>

<?php
}

function tfw_generate($content) {	

	$tfw_sposts = get_option('tfw_sposts');
	$tfw_spages = get_option('tfw_spages');	
	$tfw_spbe = get_option('tfw_spbe');
	$tfw_spaf = get_option('tfw_spaf');	
	$tfw_sindarch = get_option('tfw_sindarch');	
	$tfw_stldiv = get_option('tfw_stldiv');
	$tfw_consize = get_option('tfw_consize');
  	if ( $tfw_consize == "small" ) {
    		$twiconsize = "none";
    		$fbconsize = "button";
    		$gooconsize = "none";
  	} else {
    		$twiconsize = "horizontal";
    		$fbconsize = "button_count";
    		$gooconsize = "bubble";
  	};
 	$remsp = array("'","\"");  
	$trmdiv = str_replace($remsp, " ", $tfw_stldiv);
	$the_social_stldiv = stripslashes(str_replace('.',chr(46),$trmdiv));		
		$profabc = urlencode(get_option('tfw_fbprof'));
		$protwic = urlencode(get_option('tfw_twiprof'));
		$progooc = urlencode(get_option('tfw_gooprof'));
		$pronamec = urlencode(get_option('tfw_myname'));
  	if (( $progooc != "" ) ||  ( $profabc != "" ) ||  ( $protwic != "" ))  {
    	$followbuttonc = '<td align="left" style="padding:0;border:none;background-color:transparent;background-image:none;vertical-align:top !important;" valign="top"><a title="Follow!" style="border:none;" href="http://www.socializer.info/follow.asp?docurlf='. $profabc .'&docurlt='. $protwic .'&docurlg='. $progooc .'&myname='. $pronamec .'" target="_blank"><img src="'.	WP_CONTENT_URL .'/plugins/'. plugin_basename(dirname(__FILE__)) .'/follow.png" title="Follow!" style="padding:0;margin:0;border:none;border:0;box-shadow:none;background-color:transparent;background-image:none;"></a></td>';
} else {
	$followbuttonc = ' ';
};	
	$socpath = WP_CONTENT_URL.'/plugins/'.plugin_basename(dirname(__FILE__)).'/';

	$the_social = isset( $_GET['the_social'] )? $_GET['the_social']: false; 
	$id = isset( $_GET['id'] )? $_GET['id']: false; 
	$the_social = $the_social.'<div id="Socializer">	
	<div id="fb-root"></div><script type="text/javascript">
				FB.XFBML.parse();
			</script><table style="border-collapse: separate; '.$the_social_stldiv.';"><tr>			
			<td align="left" style="text-align:left;padding:0;border:none;background-color:transparent;background-image:none;vertical-align:top !important;" valign="top"><a class="twitter-share-button" data-count="'.$twiconsize.'" data-url="'.get_permalink($id).'" data-text="'.get_the_title("").'">Tweet</a></td><td align="left" style="text-align:left;padding:0;border:none;background-color:transparent;background-image:none;vertical-align:top !important;" valign="top"><fb:like href="'.get_permalink($id).'" layout="'.$fbconsize.'" action="like" show_faces="false" share="true"></fb:like></td>
			<td align="left" style="text-align:left;padding:0;border:none;background-color:transparent;background-image:none;vertical-align:top !important;" valign="top"><g:plusone size="medium" annotation="'.$gooconsize.'" data-href="'.urlencode(get_permalink($id)).'"></g:plusone></td>
			'.$followbuttonc.'
			<td align="left" valign="top" style="text-align:left;padding:0;border:none;background-color:transparent;background-image:none;vertical-align:top !important;"><a title="Share in more social networks, email, translate, and more!" style="border:none;" href="http://www.socializer.info/share.asp?docurl='.urlencode(get_permalink($id)).'&doctitle='.get_the_title("").'" target="_blank"></a></td></tr></table></div>';

	$show_socializer = FALSE;

	if (is_single() && $tfw_sposts && is_main_query() ) {
		$show_socializer = TRUE;
	}

	if (is_page() && $tfw_spages && is_main_query()) {
		$show_socializer = TRUE;
	}	

	if (is_category() && $tfw_sindarch && is_main_query()) {
		$show_socializer = TRUE;
	}	

	if (is_tag() && $tfw_sindarch && is_main_query()) {
		$show_socializer = TRUE;
	}	

	if (is_date() && $tfw_sindarch && is_main_query()) {
		$show_socializer = TRUE;
	}	

	if (is_home() && $tfw_sindarch && is_main_query()) {
		$show_socializer = TRUE;
	}	

	if (!$show_socializer) {
		return $content;
	}

	if ( (is_home() || is_category() || is_tag() || is_date() ) && $show_socializer )
		$content .= $the_social;

	if (is_single() &! $tfw_spbe && $show_socializer) 
		$content .= $the_social;

	if (is_single() && $tfw_spbe &! $tfw_spaf && $show_socializer) 
		$content = $the_social.$content;

	if (is_single() && $tfw_spbe && $tfw_spaf && $show_socializer) 
		$content = $the_social.$content.$the_social;

	if (is_page() &! $tfw_spbe && $show_socializer) 
		$content .= $the_social;

	if (is_page() && $tfw_spbe &! $tfw_spaf && $show_socializer) 
		$content = $the_social.$content;

	if (is_page() && $tfw_spbe && $tfw_spaf && $show_socializer) 
		$content = $the_social.$content.$the_social;

	return $content;

}

Function SocializerNow_func($atts){
	$MyTitle = get_the_title("");
	$tfw_nowsize = get_option('tfw_nowsize');
  	if ( $tfw_nowsize == "small" ) {
    		$twinowsize = "none";
    		$fbnowsize = "button";
    		$goonowsize = "none";
  	} else {
    		$twinowsize = "horizontal";
    		$fbnowsize = "button_count";
    		$goonowsize = "bubble";
  	};	
	$tfw_stldiv = get_option('tfw_stldiv');
	$trmdiv = str_replace($remsp, " ", $tfw_stldiv);
	$the_social_stldiv = stripslashes(str_replace('.',chr(46),$trmdiv));
		$profabn = urlencode(get_option('tfw_fbprof'));
		$protwin = urlencode(get_option('tfw_twiprof'));
		$progoon = urlencode(get_option('tfw_gooprof'));
		$proname = urlencode(get_option('tfw_myname'));
  	if (( $progoon != "" ) ||  ( $profabn != "" ) ||  ( $protwin != "" ))  {
    	$followbuttonn = '<td align="left" style="text-align:left;padding:0;border:none;background-color:transparent;background-image:none;vertical-align:top !important;" valign="top"><a title="Follow!" style="border:none;" href="http://www.socializer.info/follow.asp?docurlf='. $profabn .'&docurlt='. $protwin .'&docurlg='. $progoon .'&myname='. $proname .'" target="_blank"><img src="'.	WP_CONTENT_URL .'/plugins/'. plugin_basename(dirname(__FILE__)) .'/follow.png" title="Follow!" style="padding:0;margin:0;border:none;border:0;box-shadow:none;background-color:transparent;background-image:none;"></a></td>';
} else {
	$followbuttonn = ' ';
};	
	$theShortSoc = '<div id="SocializerNow">
	<div id="fb-root"></div><script type="text/javascript">
				FB.XFBML.parse();
			</script><table style="border-collapse: separate;'.$the_social_stldiv.'"><tr>
			<td align="left" style="text-align:left;padding:0;border:none;background-color:transparent;background-image:none;vertical-align:top !important;" valign="top"><a class="twitter-share-button" data-count="'. $twinowsize .'">Tweet</a></td><td align="left" style="text-align:left;padding:0;border:none;background-color:transparent;background-image:none;vertical-align:top !important;" valign="top"><fb:like layout="'. $fbnowsize .'" action="like" show_faces="false" share="true"></fb:like></td><td align="left" style="text-align:left;padding:0;border:none;background-color:transparent;background-image:none;vertical-align:top !important;" valign="top"><g:plusone size="medium" annotation="'. $goonowsize .'"></g:plusone></td>
			'.$followbuttonn.'
			<td align="left" style="text-align:left;padding:0;border:none;background-color:transparent;background-image:none;vertical-align:top !important;" valign="top"><a title="Share in more social networks, email, translate, and more!" style="border:none;" href="http://www.socializer.info/share.asp%3Fdocurl=http://'.
			 urlencode($_SERVER["HTTP_HOST"]) . urlencode($_SERVER["REQUEST_URI"]) .'&doctitle='. $MyTitle .'" target="_blank"></a></td></tr></table></div>';
			 
	return $theShortSoc;			
    }


class SocializerWidget extends WP_Widget {

    function SocializerWidget() {
        $widget_ops = array('classname' => 'widget_text', 'description' => __('Socializer! Widget'));
        $this->WP_Widget('SocializerWidget', __('Socializer!'), $widget_ops);
    }

    function widget($args, $instance) {

	$tfw_wsize = get_option('tfw_wsize');
  	if ( $tfw_wsize == "small" ) {
    		$twiwsize = "none";
    		$fbwsize = "button";
    		$goowsize = "none";
    		$imid = "sharemore";
    		$goover = "top";
    		$fbwshr = "false";
    		$fbwshrcodeback = WP_CONTENT_URL .'/plugins/'. plugin_basename(dirname(__FILE__)) .'/fbshareback.gif';
    		$fbwshrcode = "<span style=\"padding:0 3px 0 1px;background:url('".$fbwshrcodeback."');background-repeat:no-repeat;\"><fb:share-button></fb:share-button></span><br><br>";
  	} else {
    		$twiwsize = "vertical";
    		$fbwsize = "box_count";
    		$fbwshr = "true";
    		$goowsize = "bubble";
    		$imid = "sharemorel";
    		$goover = "bottom";    		
    		$fbwshrcode = "";
  	};
	$tfw_stlwdiv = get_option('tfw_stlwdiv');
 	$remspw = array("'","\"");  
	$trmwdiv = str_replace($remspw, " ", $tfw_stlwdiv);
	$the_social_stlwdiv = stripslashes(str_replace('.',chr(46),$trmwdiv));
		$profabw = urlencode(get_option('tfw_fbprof'));
		$protwiw = urlencode(get_option('tfw_twiprof'));
		$progoow = urlencode(get_option('tfw_gooprof'));
		$pronamew = urlencode(get_option('tfw_myname'));
  	if (( $progoow != "" ) ||  ( $profabw != "" ) ||  ( $protwiw != "" ))  {
    	$followbuttonw = '<a title="Follow!" style="border:none;" href="http://www.socializer.info/follow.asp?docurlf='. $profabw .'&docurlt='. $protwiw .'&docurlg='. $progoow .'&myname='. $pronamew .'" target="_blank"><img src="'.	WP_CONTENT_URL .'/plugins/'. plugin_basename(dirname(__FILE__)) .'/follow.png" title="Follow!" style="border:none;border:0;box-shadow:none;padding-bottom:9px;"></a><br>';
} else {
	$followbuttonw = ' ';
};	
	$socpath = WP_CONTENT_URL.'/plugins/'.plugin_basename(dirname(__FILE__)).'/';
?>

<div id="SocializerW">		
	<div id="fb-root"></div><script type="text/javascript">
				FB.XFBML.parse();
			</script><table style="border-collapse: separate;<?=$the_social_stlwdiv ?>;"><tr>
			<td align="left" style="text-align:left;padding:0;border:none;background-color:transparent;background-image:none;vertical-align:top !important;" valign="top"><fb:like layout="<?=$fbwsize ?>" action="like" show_faces="false" share="<?=$fbwshr ?>"></fb:like></td>
			<td align="left" style="text-align:left;padding:0;border:none;background-color:transparent;background-image:none;vertical-align:top !important;" valign="top"><a class="twitter-share-button" data-count="<?=$twiwsize ?>">Tweet</a></td></tr><tr>
			<td align="left" style="text-align:left;padding:0;border:none;background-color:transparent;background-image:none;vertical-align:<?=$goover?> !important;" valign="bottom"><?=$fbwshrcode ?><g:plusone size="tall" annotation="<?=$goowsize ?>"></g:plusone></td><td align="left" valign="bottom" style="text-align:left;padding:0;border:none;background-color:transparent;background-image:none;vertical-align:bottom;"><?=$followbuttonw ?><a title="Share in top social networks, email, translate, and more!" style="border:none;" href='http://www.socializer.info/share.asp?docurl=http://<?php echo urlencode($_SERVER["HTTP_HOST"]) ?><?php echo urlencode($_SERVER["REQUEST_URI"]); ?>&doctitle=<?php if (is_home() || is_front_page()) { bloginfo("name"); echo " - "; bloginfo("description"); } else { wp_title(" - ",TRUE,"right"); } ?>' target="_blank"><img src="<?=$socpath?><?=$imid?>.gif" title="Share in top social networks, email, translate, and more!" style="padding:0;margin:0;border:none;border:0;box-shadow:none;background-color:transparent;background-image:none;"></a></td></tr></table></div>        
<?php
    }
}

function SocializerWidgetInit() {
    register_widget('SocializerWidget');
}



class SocializerFloatWidget extends WP_Widget {

    function SocializerFloatWidget() {
        $widget_ops = array('classname' => 'widget_text', 'description' => __('Socializer! Float'));
        $this->WP_Widget('SocializerFloatWidget', __('Socializer! Float'), $widget_ops);
    }

    function widget($args, $instance) {

		$tfw_floatsize = get_option('tfw_floatsize');
  	if ( $tfw_floatsize == "small" ) {
    		$twifloatsize = "none";
    		$fbfloatsize = "button";
    		$goofloatsize = "none";
    		$imid = "sharemore";
  	} else {
    		$twifloatsize = "vertical";
    		$fbfloatsize = "box_count";
    		$goofloatsize = "bubble";
    		$imid = "sharemorel";
  	};
$tfw_stlfloatwdiv = get_option('tfw_stlfloatwdiv');
 	$remspfloatw = array("'","\"");
	$trmfloatwdiv = str_replace($remspfloatw, " ", $tfw_stlfloatwdiv);
	$the_social_stlfloatwdiv = stripslashes(str_replace('.',chr(46),$trmfloatwdiv));	
		$profab = urlencode(get_option('tfw_fbprof'));
		$protwi = urlencode(get_option('tfw_twiprof'));
		$progoo = urlencode(get_option('tfw_gooprof'));
		$pronamef = urlencode(get_option('tfw_myname'));
  	if (( $progoo != "" ) ||  ( $profab != "" ) ||  ( $protwi != "" ))  {
    	$followbutton = '<tr><td align="center" style="padding:0;text-align:center;border:none;background-color:transparent;background-image:none;vertical-align:top !important;" valign="top"><a title="Follow!" style="border:none;" href="http://www.socializer.info/follow.asp?docurlf='. $profab .'&docurlt='. $protwi .'&docurlg='. $progoo .'&myname='. $pronamef .'" target="_blank"><img src="'.	WP_CONTENT_URL .'/plugins/'. plugin_basename(dirname(__FILE__)) .'/follow.png" title="Follow!" style="padding:0;margin:0;border:none;border:0;box-shadow:none;background-color:transparent;background-image:none;"></a></td></tr>';
} else {
	$followbutton = ' ';
};	
	global $socdetect;
		$tfw_moboption = get_option('tfw_moboption');
	if( $socdetect->isMobile() && $tfw_moboption == "hidemob" ) {
	$socmob = "display:none;z-index:-10000;";
} else {
	$socmob = "z-index:10000;";
};	
	$socpath = WP_CONTENT_URL.'/plugins/'.plugin_basename(dirname(__FILE__)).'/';
    		$fbwshrcodeback = $socpath.'fbshareback.gif';
    		$fbwshrcode = "<span style=\"padding:3px 3px 0 1px;background:url('".$fbwshrcodeback."');background-repeat:no-repeat;\"><fb:share-button></fb:share-button></span>";
?>

<div id="SocializerFloatW" style="<?=$socmob ?>;max-width:133px;position:fixed;float:left;<?=$the_social_stlfloatwdiv ?>;">	<div id="fb-root"></div><script type="text/javascript">
				FB.XFBML.parse();
			</script><table cellpadding="0" border="0" style="padding:0;border:none;border-collapse: separate;border-spacing:0 10px;margin:0;"><tr><td align="center" style="padding:0;border:none;background-color:transparent;background-image:none;vertical-align:top !important;text-align:center;" valign="top"><fb:like layout="<?=$fbfloatsize ?>" action="like" show_faces="false" share="false"></fb:like></td></tr><tr><td align="center" style="padding:0;border:none;background-color:transparent;background-image:none;vertical-align:top !important;text-align:center;" valign="top"><?=$fbwshrcode ?></td></tr><?=$followbutton ?><tr><td align="center" style="padding:0;border:none;background-color:transparent;background-image:none;vertical-align:top !important;text-align:center;" valign="top" nowrap><a class="twitter-share-button" data-count="<?=$twifloatsize ?>">Tweet</a></td></tr><tr><td align="center" style="padding:0;border:none;background-color:transparent;background-image:none;vertical-align:top !important;text-align:center;" valign="top"><g:plusone size="tall" annotation="<?=$goofloatsize ?>"></g:plusone></td></tr><tr><td align="center" style="padding:0;border:none;background-color:transparent;background-image:none;vertical-align:bottom;text-align:center;" valign="bottom"><a title="Share in top social networks, email, translate, and more!" style="border:none;" href='http://www.socializer.info/share.asp?docurl=http://<?php echo urlencode($_SERVER["HTTP_HOST"]) ?><?php echo urlencode($_SERVER["REQUEST_URI"]); ?>&doctitle=<?php if (is_home() || is_front_page()) { bloginfo("name"); echo " - "; bloginfo("description"); } else { wp_title(" - ",TRUE,"right"); } ?>' target="_blank"><img src="<?=$socpath?><?=$imid?>.gif" title="Share in top social networks, email, translate, and more!" style="padding:0;margin:0;border:none;border:0;box-shadow:none;background-color:transparent;background-image:none;"></a></td></tr></table></div>
			
<?php
    }
}

function SocializerFloatWidgetInit() {
    register_widget('SocializerFloatWidget');
}

function add_socstyle()
{
    ?>
<style media="screen" type="text/css">
        .fb_iframe_widget span 
        {
            vertical-align: baseline !important;
        }
        </style>

    <?php
}
add_action('wp_head', 'add_socstyle');
function socializer_settings_link($links) { 
  $settings_link = '<a href="options-general.php?page=socializer!">Settings</a> | <a href="http://www.thefreewindows.com/6035/socializer-wordpress-frequent-questions-answers/">FQA</a>'; 
  array_unshift($links, $settings_link); 
  return $links; 
} 
$plugin = plugin_basename(__FILE__); 
add_filter("plugin_action_links_$plugin", 'socializer_settings_link' );
add_shortcode("SocializerNow", "SocializerNow_func");
add_filter('the_content', 'tfw_generate', PHP_INT_MAX);
add_action('admin_menu', 'tfw_add_option_pages');
add_action('widgets_init', 'SocializerWidgetInit');
add_action('widgets_init', 'SocializerFloatWidgetInit');
?>
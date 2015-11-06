<?php
/* Function for plugin configuratnion */
function microdata_configuration_page() {  
global $current_user;
global $wpdb;
//$post_var=get_option('post_check');
//echo '<pre>'; print_r($post_var); die;
//$post_var = get_option('auto');
//  foreach($post_var as $key => $value) { echo '<pre>'; print_r($value); } die;
if(isset($_POST['save_seo_settings']) && $_POST['save_seo_settings'] == 'Save Settings') {
	$snip = ''; $auto = ''; $snippet_type = '';
	if(isset($_POST['snippets'])) { $snip = $_POST['snippets'];  }
	if(isset($_POST['auto'])) { $auto = $_POST['auto']; }
	if(isset($_POST['snippets_type'])) { $snippet_type = $_POST['snippets_type']; }

	update_option('post_check',$snip);
	update_option('auto',$auto);
	update_option('snippet_settings',$_POST['snippets_type']);
}
$google_seo_config = get_option('smack_microdata_imageset');

?>
	<div class="wrap" >
	<!--<div class="icon32" id="icon-schema"><br></div>-->
	<div style="background-color: #FFFFE0;border-color: #E6DB55;border-radius: 3px 3px 3px 3px;border-style: solid;border-width: 1px;margin: 5px 15px 2px;
    padding: 5px;text-align:center"> Please check out <a href="http://www.smackcoders.com/blog/category/free-wordpress-plugins/google-seo-author-snippet-plugin" target="_blank">www.smackcoders.com</a> for the latest news and details of other great plugins and tools. </div>
	<div id="snippetsettings">
	<label><h3 style="margin-left:25px;">Google SEO Pressor Rich Snippets</h3></label>
                  <div id = "showdanger"></div>
		<form id="smack_microdata_form" name="smack_microdata_form" action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">
			<div class="smack_schema_options">
				<?php
					$status = get_option('smack_microdata_settings');

				?>
				<div class="smack_schema_form_options">
					<table><tbody>
					<tr><td>
					<label id="textalign">Enable google SEO pressor rich snippets:</label>
					</td><td>
			<!--					<label id="snippetenable" class="<?php echo $enableclass ?>"><input type="radio" id="enable" name="option" value="enable" onclick="enable_imageset();" checked="checked" />Enable</label> 
						<label id="snippetdisable" class="<?php echo $disableclass ?>"><input type="radio" id="disable" name="option" value="disable" onclick="disable_imageset();" <?php if($status['config_status'] == 2){ ?> checked <?php } ?> />Disable</label>-->
					<div class="socialaccess" style="margin-right: 542px;">
						<input type="checkbox" id="enable" name="option" value="enable" onclick="enable_imageset();" checked="checked" style="display:none">
						<label id="sociallabel" for="enable"></label>
                                        </div>
					</td></tr>
					<tr><td>
						<label id="textalign">Debug Mode</label>
					</td><td>
						<div class="socialaccess" style="margin-right: 542px;">
                                        		<input type='checkbox' name='debug_mode' <?php if($status['allowed']['debug_mode']==1){ ?> checked <?php } ?> id="debug_mode"  style="display:none" ><label id="sociallabel" for="debug_mode"> </label>
						</div>
                                	</td></tr>
					</tbody></table>
				</div>
		    	</div>  <br/>
                        
			<div id="smack-container"  <?php if(isset($status['config_status'] ) && ($status['config_status'] == 2)){ ?> style="display:none" <?php } ?> >
                                <div id="posttype" style="margin-top:-15px;">
                                 <h3> <?php _e('Available Post Types') ?>  </h3>
					<input type="radio" id="post_type" name="type" value="Posts"  onclick="choose_snippets(this.id);"  checked /><label id="textalign"><?php  _e('Post Types')  ?> </label>
                 <!--	                       <input type="radio" id="taxo_type" name = "type" value="Categories & Taxonomies" onclick = "choose_snippets(this.id);"/>&nbsp;Categories &amp; Taxonomies  &nbsp; &nbsp; &nbsp; -->
                                  </div>
                                <div id = "disp_posttype" style = "display:block;min-height:275px;">
                              <table>  
                                 <tr style="height:45px"> 
                                     <th><h3><?php _e('Post types')?></h3></th>
                                     <th><h3><?php _e('Rich snippets') ?></h3></th>
                                     <th style="width:140px;"><h3><?php _e('Manual/Auto')?></h3></th> 
                                     <th style="width:140px;"><h3><?php _e('Twitter Cards') ?></h3></th> 
                                     <th style="width:140px;"><h3><?php _e('Based On Post Format') ?></h3></th>
                                 </tr>
                                 <?php $get_type = get_post_types();  if(isset($get_type)) { foreach($get_type as $post_types => $value1 ){ 
                                if (($value1 != 'featured_image') && ($value1 != 'attachment') && ($value1 != 'wpsc-product') && ($value1 != 'wpsc-product-file') && ($value1 != 'revision') && ($value1 != 'nav_menu_item')&& ($value1 != 'wp-types-group') && ($value1 != 'wp-types-user-group') &&  ($value1 != 'product_variation') && ($value1 != 'shop_order') && ($value1 != 'shop_coupon') && ($value1 != 'acf') && ($value1 != 'createdByCCTM') && ($value1 != 'createdByTypes')) { ?>                             
                                <tr style="height:45px">
                                    <td> 
                                  <?php  $get_option = get_option('post_check');  ?>
					
                                  <input type = "checkbox" name = "snippets[<?php if(isset($value1)) { _e($value1); }?>]" id = "<?php if(isset($value1)){ _e($value1); } ?>" <?php if(!empty($get_option)){ foreach($get_option as $post_types => $val) { if( (isset($post_types) && ($post_types == $value1 ) && ( $val == 'on'))) { ?> checked <? } }} ?>  /><label id="textalign"> <?php if(isset($value1)){ _e($value1); } ?> </label>
                                  </td>
                                  <td style="padding-left:26px">
	                                   <?php $snippets = get_option('snippets_types'); ?>
        	                      <select name = "snippets_type[<?php echo $value1; ?>]" id = "<?php _e($value1) ?>" >
				<option value = "<?php _e('--select--')?>" > <?php _e('--select--') ?> </option>
                                <?php 
					$snippet_settings = get_option('snippet_settings');
	                                foreach($snippets as $key ) { ?>  
                                   <?php 
					if( trim($key) == trim($snippet_settings[$value1]) ) { ?>
		                              <option value = "<?php echo $key; ?>" selected="selected"> <?php echo $key; ?> </option>
                	               <?php } else { ?>
					      <option value = "<?php echo $key; ?>" > <?php echo $key; ?> </option>
				       <?php } 
				      } 
				   ?>
                             </select>
                                  </td>
                                  <td>
                                     		<label style = 'padding-left:40%;'><input type ="checkbox" name = "auto[<?php echo $value1;?>]" id = "<?php echo$value1;?>" onclick = 'auto(this.id);' <?php $get_auto = get_option('auto'); if(!empty($get_auto)){ foreach($get_auto as $sauto => $autoval) { if(($sauto == $value1 ) && ($autoval == 'on')) { ?> checked <?php }}} ?> /></label>
                                  </td>
                                  <td>
	                                        <label style = 'padding-left:40%;'><input type ="checkbox" name = "<?php _e($value1.'twit') ?>" id = "<?php _e($value1.'twit')?> " onclick = 'twit(this.id);' /></label>
                                  </td> 
                                  <td>
                                     		 <label style = 'padding-left:40%;'><input type ="checkbox" name = "<?php _e($value1.'pformat') ?>" id ="<?php _e($value1.'pformat') ?>"  onclick = 'post_format(this.id);' /></label>
                                  </td>
                                  </td>
                                   </tr> 
                                  <?php    } } } ?>
                                </table>
                                </div>
                            <!--    <div id = "disp_categories" style = "display:none">
                                  <table>  <tr> <th  > Categories  </th>
                              <th> Rich snippets  </th> </tr>
                                 
                                   
                                   <?php foreach(get_categories() as $cat ){ 
                                       ?>
                                    <tr><td>  
                                    <input type = "checkbox" name = "snippets" id = "<?php// echo $cat->cat_name ?>" /> <?php// echo $cat->cat_name ?> 
                                   </td>
                                   
                                       <td>
                                           <?php $snippets = get_option('snippets_types'); ?>
                                          <select> <?php foreach($snippets as $key ) { ?>  <option value = '<?php //echo $key ?>'/ > <?php// echo $key ?>  </option>  <?php } ?></select>
                                       </td>
                                   </tr> 
                                  
                                 <?php    }  ?>
                                
                                </table>
                                  <table>  <tr> <th  >  Taxonomies </th>
                              <th> Rich snippets  </th> </tr>
                                 
                                   
                                   <?php foreach(get_taxonomies('','names') as $taxo ){ 
                                       ?>
                                   <tr><td> 
                                    <?php  if (($taxo != 'category') && ($taxo != 'post_tag') && ($taxo != 'nav_menu') && ($taxo != 'link_category') && ($taxo != '') && ($taxo != 'post_format')) { ?>  
                                    <input type = "checkbox" name = "snippets" id = "<?php// echo $taxo ?>" /> <?php// echo $taxo ?> 
                                   </td>
                                   
                                       <td>
                                           <?php $snippets = get_option('snippets_types'); ?>
                                          <select> <?php foreach($snippets as $key ) { ?>  <option value = '<?php// echo $key ?>'/ > <?php// echo $key ?>  </option>  <?php } ?></select>
                                       </td>
                                   </tr> 
                                  
                                 <?php    } }  ?>
                                
                                </table>

                                </div> -->
				<input type="hidden" name="page_options" value="smack_microdata_settings" />
				<input type="hidden" name="smack_microdata_hidden" value="1" />
				<div style="text-align:center">
					<h3>Enable or Disable Social Profiles</h3>
					<div class="smack_schema_form_options" id="socialopt">
					<table><tbody>
                                        <tr><td>
							<label id="textalign">Google+</label>
					</td><td>
							<div class="socialaccess">
								<input type="checkbox" id="googleplus" name="googleplus" <?php if(isset($status['allowed']['gplus_access']) && ($status['allowed']['gplus_access']==1)){ ?> checked <?php } ?> style="display:none" /> <label id="sociallabel" for="googleplus"></label>
							</div>
					</td><td>			
							<label id="textalign">Facebook</label>
					</td><td>
							<div class="socialaccess">
								<input type="checkbox" id="facebook" name="facebook"  <?php if(isset($status['allowed']['fbook_access']) && ($status['allowed']['fbook_access'] == 1)){ ?> checked <?php } ?> style="display:none" /> <label id="sociallabel" for="facebook"></label>
							</div>
				        </td><td>
							<label id="textalign">Twitter</label>
					</td><td>
							<div class="socialaccess">
								<input type="checkbox" id="twitter" name="twitter"  <?php if(isset($status['allowed']['twit_access']) && ($status['allowed']['twit_access']==1)){ ?> checked <?php } ?> style="display:none"/> <label id="sociallabel" for="twitter" /></label>
							</div>
					</td><td>
							<label id="textalign">LinkedIn</label>
					</td><td>
							<div class="socialaccess">
								<input type="checkbox" id="linkedin" name="linkedin"  <?php if(isset($status['allowed']['linkin_access']) && ($status['allowed']['linkin_access']==1)){ ?> checked <?php } ?> style="display:none" /> <label id="sociallabel" for="linkedin"></label>
							</div>
					</td><td>
							<label id="textalign">Geo-Location</label>
					</td><td>
							<div class="socialaccess">
								<input type="checkbox" id="location" name="location"  <?php if(isset($status['allowed']['location_access']) && ($status['allowed']['location_access']==1)){ ?> checked <?php } ?> style="display:none" /> <label id="sociallabel" for="location"></label>
							</div>
					</td></tr>
					</tbody></table>
					</div>	
				</div>
				<div>
					<h3>Select the icon style</h3>
					<div id="img_set">
						<?php 
						$id=1;	
						$img_set = get_option('smack_microdata_settings');
						foreach($google_seo_config as $array){
							$gimg=$array['g_image_url'].$array['g_image'];
							$fimg=$array['f_image_url'].$array['f_image'];
							$timg=$array['t_image_url'].$array['t_image'];
							$limg=$array['l_image_url'].$array['l_image'];
							$loc=$array['location_url'].$array['location_image'];
						?>
						<label id="socialimglabel"><input type="radio" id="imageset<?php echo $id; ?>" name="imageset" value="Imageset<?php echo $id; ?>" <?php if(isset($img_set['imageset']) && ($id == $img_set['imageset'])) {?> Checked <?php } ?>/></label>
						<label id="socialimg"><img src="<?php echo $gimg; ?>" /></label>
						<label id="socialimg"><img src="<?php echo $fimg; ?>" /></label>
						<label id="socialimg"><img src="<?php echo $timg; ?>" /></label>
						<label id="socialimg"><img src="<?php echo $limg; ?>" /></label>
						<label id="socialimg"><img src="<?php echo $loc ; ?>" /></label><br />
						<?php
							$id++;
						}
						?>
					</div>
				</div>
				<input type="hidden" name="posted" value="<?php echo 'posted';?>">
			</div>
			<p class="submit">
			<input type="submit" name="save_seo_settings" value="<?php _e('Save Settings');?>" class="button-primary"/>
			</p>
		</form>
	</div>
        </div>  


<?php
}
/* Function ends */

if( sizeof($_POST) && isset($_POST["smack_microdata_hidden"]) ) {
	foreach ($FieldNames as $field=>$value){
		$google_seo_config[$field] = $value;
	}
	$value = explode('Imageset',$_POST['imageset']);
	$config_status=2;
	if($_POST['option'] == 'enable'){
		$config_status=1;
	}
	// Profile configuration
	$gplus_access=0;
	$fbook_access=0;
	$twit_access=0;
	$linkin_access=0;
	$location_access=0;
	$debug_mode=0;
	if(isset($_POST['googleplus'])){
		$gplus_access=1;
	}
	if(isset($_POST['facebook'])){
		$fbook_access=1;
	}
	if(isset($_POST['twitter'])){
		$twit_access=1;
	}
	if(isset($_POST['linkedin'])){
		$linkin_access=1;
	}	
	if(isset($_POST['location'])){
		$location_access=1;
	}
	if(isset($_POST['debug_mode'])){
                $debug_mode=1;
        }

        
	$profiles = array('gplus_access'=>$gplus_access,'fbook_access'=>$fbook_access,'twit_access'=>$twit_access,'linkin_access'=>$linkin_access,'location_access'=>$location_access,'debug_mode'=> $debug_mode);
	$update = array('config_status'=>$config_status,'imageset'=>$value[1],'allowed'=>$profiles);
	update_option('smack_microdata_settings', $update);
}

/* Form for maintain the social profile links */
$get = get_option('smack_microdata_settings');
if($get['config_status'] == 1){
	add_action( 'show_user_profile', 'yoursite_extra_user_profile_fields' );
	add_action( 'edit_user_profile', 'yoursite_extra_user_profile_fields' );
	function yoursite_extra_user_profile_fields( $user ) {
	global $current_user;

	$GET = get_user_meta($current_user->id,'smack_social_links');

	foreach($GET as $array){
		if($array['gplus']!=''){
			$gplus_url=$array['gplus'];
		}
		if($array['fbook']!=''){
			$fbook_url=$array['fbook'];
		}
		if($array['twit']!=''){
			$twit_url=$array['twit'];
		}
		if($array['linkin']!=''){
			$linkin_url=$array['linkin'];
		}
	}
	$get_geoinfo = get_user_meta($current_user->id,'smack_social_links'); 
	?>
	  <h3><?php _e("Microdata Social profile information", "blank"); ?></h3><span>(If you leave empty the fields,Profile's won't shown in frontend.)</span>
	  <table class="form-table">
	    <tr>
	      <th><label for="gplus"><?php _e("Google Plus"); ?></label></th>
	      <td>
		<span></span><input type="text" name="gplus" id="gplus" class="regular-text" 
		    value="<?php echo $gplus_url; ?>" /><br />
		<span class="description"><?php _e("https://plus.google.com/"); ?></span><br/>
		<span class="description"><?php _e("Enter your google plus profile id. (eg:- 103391386060153457333) ."); ?></span>
	      </td>
	    </tr>
	    <tr>
	      <th><label for="fbook"><?php _e("Facebook"); ?></label></th>
	      <td>
		<input type="text" name="fbook" id="fbook" class="regular-text" 
		    value="<?php echo $fbook_url; ?>" /><br />
		<span class="description"><?php _e("https://facebook.com/"); ?></span><br/>
		<span class="description"><?php _e("Enter your facebook profile name. (eg:- smackcoders) ."); ?></span>
	      </td>
	    </tr>
	    <tr>
	      <th><label for="twit"><?php _e("Twitter"); ?></label></th>
	      <td>
		<input type="text" name="twit" id="twit" class="regular-text" 
		    value="<?php echo $twit_url; ?>" /><br />
		<span class="description"><?php _e("https://twitter.com/"); ?></span><br/>
		<span class="description"><?php _e("Enter your twitter profile name. (eg:- smackcoders) ."); ?></span>
	      </td>
	    </tr>
	    <tr>
	       <th><label for="linkin"><?php _e("LinkedIn"); ?></label></th>
	       <td>
		<input type="text" name="linkin" id="linkin" class="regular-text" 
		    value="<?php echo $linkin_url; ?>" /><br />
		<span class="description"><?php _e("http://in.linkedin.com/pub/"); ?></span><br/>
		<span class="description"><?php _e("Enter your linkedin profile url. (eg:- smackcoders/22/780/529) ."); ?></span>
	       </td>
	    </tr>
	    <tr>
	      <td>
		<input type="hidden" name="currentuser" id="currentuser" class="regular-text" 
		    value="<?php echo $current_user->id; ?>" /><br />
	      </td>
	    </tr>   
	  </table>
	  <h3><?php _e("User Geo-Information", "blank"); ?></h3><span>Get your latitude,longitude value of your location from <a href="http://www.smackcoders.com/how-to-get-latitude-and-longitude-in-google-map.html" target="_blank">Here!</a></span>
	  <table class="form-table">
	    <tr>
	      <th><label for="latitude"><?php _e("Latitude"); ?></label></th>
	      <td>
		<input type="text" name="latitude" id="latitude" class="regular-text" 
		    value="<?php echo $get_geoinfo[0]['latitude']; ?>" /><br />
		<span class="description"><?php _e("Enter latitude value of your location."); ?></span>
	    </td>
	    </tr>
	    <tr>
	      <th><label for="longitude"><?php _e("Longitude"); ?></label></th>
	      <td>
		<input type="text" name="longitude" id="longitude" class="regular-text" 
		    value="<?php echo $get_geoinfo[0]['longitude']; ?>" /><br />
		<span class="description"><?php _e("Enter longitude value of your location."); ?></span>
	    </td>
	    </tr>
	   </table>
	<?php
	}
	add_action( 'personal_options_update', 'yoursite_save_extra_user_profile_fields' );
	add_action( 'edit_user_profile_update', 'yoursite_save_extra_user_profile_fields' );
	function yoursite_save_extra_user_profile_fields( $user_id ) {
	  $saved = false;
	  if ( current_user_can( 'edit_user', $user_id ) ) {
	    $profilelinks=array('gplus'=>$_POST['gplus'],'fbook'=>$_POST['fbook'],'twit'=>$_POST['twit'],'linkin'=>$_POST['linkin'],'latitude'=>$_POST['latitude'],'longitude'=>$_POST['longitude']);
	    update_user_meta( $_POST['currentuser'], 'smack_social_links', $profilelinks );
	    $saved = true;
	  }
	  return true;
	}

/* Function for getting user location */
	function geo_location($lat,$lng){
		$address_url = 'http://maps.googleapis.com/maps/api/geocode/json?latlng=' . $lat . ',' . $lng . '&sensor=false';
		$address_json = json_decode(file_get_contents($address_url));
		$address_data = $address_json->results[1]->address_components;
		$city = $address_data[1]->long_name;
		$state = $address_data[2]->long_name;
		$country = $address_data[3]->long_name;
		$geoinfo = array('city' => $city, 'state' => $state, 'country' => $country);
		return $geoinfo;
	}

	/* Function to show social profile links in Posts  */
	$get_settings = get_option('smack_microdata_settings');
	if($get_settings['config_status']==1){

		if( ! function_exists( 'author_bios') )
		{
			function author_bios($author) 
			{
				$get_info     = get_the_author_meta( 'smack_social_links' );
				$get_imageset = get_option('smack_microdata_imageset');
				$get_settings = get_option('smack_microdata_settings');
				$count =1;

				foreach($get_imageset as $img_set)
				{
					$array[$count]=$img_set;
					$count++;
				}
				$result=geo_location($get_info['latitude'],$get_info['longitude']);
				$location = $result['city'].",".$result['state'].",".$result['country'];
				$gplus_imgsrc=$array[$get_settings['imageset']]['g_image_url'].$array[$get_settings['imageset']]['g_image'];
				$fbook_imgsrc=$array[$get_settings['imageset']]['f_image_url'].$array[$get_settings['imageset']]['f_image'];
				$twit_imgsrc=$array[$get_settings['imageset']]['t_image_url'].$array[$get_settings['imageset']]['t_image'];
				$linkin_imgsrc=$array[$get_settings['imageset']]['l_image_url'].$array[$get_settings['imageset']]['l_image'];
				$location_imgsrc=$array[$get_settings['imageset']]['location_url'].$array[$get_settings['imageset']]['location_image'];
				$author_bio = '<span itemscope="itemscope" itemtype="http://schema.org/Person"> ';

				if(($get_info['gplus']!=null)&&($get_settings['allowed']['gplus_access']==1))
				{
					$author_bio .= '<span style="padding-left:2px;padding-right:2px;" ><a rel="google_profile" name="google_profile" itemprop="url" href="https://plus.google.com/'. $get_info['gplus'] .'" target="_blank" title="Google Profile"><img src="'.  $gplus_imgsrc. '" width="16" height="16" alt="Google Profile" /></a></span>';
				}

				if(($get_info['fbook']!=null)&&($get_settings['allowed']['fbook_access']==1))
				{
					$author_bio .= '<span style="padding-left:2px;padding-right:2px;" ><a rel="facebook_profile" name="facebook_profile" itemprop="url" href="https://facebook.com/'. $get_info['fbook']. '" target="_blank" title="Facebook"><img src="'. $fbook_imgsrc .'" width="16" height="16" alt="Facebook" /></a></span>';
				}

				if(($get_info['twit']!=null)&&($get_settings['allowed']['twit_access']==1))
				{
					$author_bio .= '<span style="padding-left:2px;padding-right:2px;" ><a rel="twitter_profile" name="twitter_profile" itemprop="url" href="https://twitter.com/'. $get_info['twit']. '" target="_blank" title="Follow Me on Twitter!"><img src="'. $twit_imgsrc .'" width="16" height="16" alt="Follow Me on Twitter!" /></a></span>';
				}

				if(($get_info['linkin']!=null)&&($get_settings['allowed']['linkin_access']==1))
				{
					$author_bio .= '<span style="padding-left:2px;padding-right:2px;" ><a rel="linkedin_profile" name="linkedin_profile" itemprop="url" href="http://in.linkedin.com/'. $get_info['linkin'] .'" target="_blank" title="LinkedIn"><img src="'. $linkin_imgsrc .'" width="16" height="16" alt="LinkedIn" /></a></span>';
				}
				if(($get_info['latitude']!=null) && ($get_info['longitude']!=null)&&($get_settings['allowed']['location_access']==1)){
					$author_bio .= '<span style="padding-left:2px;padding-right:2px;" ><a rel="user_location" name="user_location" itemprop="url" href="" title="'.$location.'"><img src="'. $location_imgsrc .'" width="13" height="16" alt="Location" /></a></span>';			
				}
				$author_bio .= '<span style="padding-left:2px;padding-right:2px;" ><a rel="updated" class="updated" name="comment_author" href="" title="author" style="display:none;">'.get_post_time('F jS, Y g:i a').'</a><a rel="author" name="comment_author" itemprop="name" href="" title="author">'.$author.'</a></span></span>';
				return "<a id='post_author' class='fn' itemprop='name' title='View all posts by ".$author."'>".$author."</a>".$author_bio;
			}

# Code added for verifying author name in backend
			$get_cookiename = "wordpress_".md5(get_site_option( 'siteurl' ));
			if(!isset($_COOKIE[$get_cookiename])) # Check wheather user in frontend or backend.
			{
				add_filter( 'the_author', 'author_bios' );
			}
		}
	}

	/* Function to show social profile links in Comments  */
	add_filter('comments_array','smack_custom_comments_list');

	function smack_custom_comments_list($comments){

		foreach($comments as $comment){
			$get_info = get_user_meta( $comment->user_id, 'smack_social_links' );
			$gplus_profile = $get_info[0]['gplus'];
			$fbook_profile = $get_info[0]['fbook'];
			$twit_profile = $get_info[0]['twit'];
			$linkin_profile = $get_info[0]['linkin'];
			$get_imageset = get_option('smack_microdata_imageset');
			$get_settings = get_option('smack_microdata_settings');
			$count =1;
			foreach($get_imageset as $img_set){
				$array[$count]=$img_set;
				$count++;
			}
			$result=geo_location($get_info[0]['latitude'],$get_info[0]['longitude']);
			$location = $result['city'].",".$result['state'].",".$result['country'];
			$gplus_imgsrc=$array[$get_settings['imageset']]['g_image_url'].$array[$get_settings['imageset']]['g_image'];
			$fbook_imgsrc=$array[$get_settings['imageset']]['f_image_url'].$array[$get_settings['imageset']]['f_image'];
			$twit_imgsrc=$array[$get_settings['imageset']]['t_image_url'].$array[$get_settings['imageset']]['t_image'];
			$linkin_imgsrc=$array[$get_settings['imageset']]['l_image_url'].$array[$get_settings['imageset']]['l_image'];
			$location_imgsrc=$array[$get_settings['imageset']]['location_url'].$array[$get_settings['imageset']]['location_image'];
			$author_bio = '<span itemscope="itemscope" itemtype="http://schema.org/Person"> ';
			if(($gplus_profile!=null)&&($get_settings['allowed']['gplus_access']==1)){
				$author_bio .= '<span style="padding-left:2px;padding-right:2px;" ><a rel="google_profile" name="google_profile" itemprop="url" href="https://plus.google.com/'. $gplus_profile .'" target="_blank" title="Google Profile"><img src="'.  $gplus_imgsrc. '" width="16" height="16" alt="Google Profile" /></a></span>';
			}
			if(($fbook_profile!=null)&&($get_settings['allowed']['fbook_access']==1)){
				$author_bio .= '<span style="padding-left:2px;padding-right:2px;" ><a rel="facebook_profile" name="facebook_profile" itemprop="url" href="https://facebook.com/'. $fbook_profile. '" target="_blank" title="Facebook"><img src="'. $fbook_imgsrc .'" width="16" height="16" alt="Facebook" /></a></span>';
			}
			if(($twit_profile!=null)&&($get_settings['allowed']['twit_access']==1)){
				$author_bio .= '<span style="padding-left:2px;padding-right:2px;" ><a rel="twitter_profile" name="twitter_profile" itemprop="url" href="https://twitter.com/'. $twit_profile. '" target="_blank" title="Follow Me on Twitter!"><img src="'. $twit_imgsrc .'" width="16" height="16" alt="Follow Me on Twitter!" /></a></span>';
			}
			if(($linkin_profile!=null)&&($get_settings['allowed']['linkin_access']==1)){
				$author_bio .= '<span style="padding-left:2px;padding-right:2px;" ><a rel="linkedin_profile" name="linkedin_profile" itemprop="url" href="http://in.linkedin.com/'. $linkin_profile .'" target="_blank" title="LinkedIn"><img src="'. $linkin_imgsrc .'" width="16" height="16" alt="LinkedIn" /></a></span>';
			}
			if(($get_info[0]['latitude']!=null) && ($get_info[0]['longitude']!=null)&&($get_settings['allowed']['location_access']==1)){
				$author_bio .= '<span style="padding-left:2px;padding-right:2px;" ><a rel="user_location" name="user_location" itemprop="url" href="" title="'.$location.'"><img src="'. $location_imgsrc .'" width="13" height="16" alt="Location" /></a></span>';			
			}
			$author_bio .= '<span style="display:none;"><a rel="author" name="comment_author" itemprop="name" href="" title="author">'.$comment->comment_author.'</a></span></span>';
			$comment->comment_author=$comment->comment_author." ".$author_bio;
		}
		return $comments;
	}
}
?>
